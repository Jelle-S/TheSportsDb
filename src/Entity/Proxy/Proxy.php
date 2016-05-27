<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\Proxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Http\TheSportsDbClientInterface;
use TheSportsDb\Factory\FactoryInterface;
use TheSportsDb\Entity\EntityInterface;

/**
 * Default implementation of proxy objects.
 *
 * @author Jelle Sebreghts
 */
abstract class Proxy implements ProxyInterface {
  /**
   * The sports db client.
   *
   * @var TheSportsDb\Http\TheSportsDbClientInterface
   */
  protected $sportsDbClient;

  /**
   * The already available properties.
   *
   * @var \stdClass
   */
  protected $properties;

  /**
   * The fully loaded entity object (lazy-loaded when needed).
   *
   * @var mixed
   */
  protected $entity;

  /**
   * The factory.
   *
   * @var \TheSportsDb\Factory\FactoryInterface
   */
  protected $factory;

  /**
   * Creates a new Proxy object.
   *
   * @param \stdClass $values
   *   The sport data.
   * @param \TheSportsDb\Http\TheSportsDbClientInterface $sportsDbClient
   *   A sports db client
   * @param \TheSportsDb\Factory\FactoryInterface $factory
   *   The sport factory.
   */
  public function __construct(\stdClass $values) {
    $this->properties = $values;
  }

  public function setFactory(FactoryInterface $factory) {
    $this->factory = $factory;
  }

  public function setSportsDbClient(TheSportsDbClientInterface $sportsDbClient) {
    $this->sportsDbClient = $sportsDbClient;
  }

  /**
   * Gets a property, if it exists, loads it if necessary.
   *
   * @param string $name
   *   The property name.
   *
   * @return mixed
   *   The property value.
   */
  protected function get($name) {
    if (isset($this->properties->{$name})) {
      return $this->properties->{$name};
    }
    if (!$this->entity) {
      // Do request & create league.
      if (method_exists($this, 'load' . ucfirst($name))) {
        $this->{'load' . ucfirst($name)}();
      }
      else {
        $this->load();
      }
    }
    return $this->entity->{'get' . ucfirst($name)}();
  }

  /**
   * Lazy loads an entity.
   *
   * @throws \TheSportsDb\Exception\TheSportsDbException
   *   When the entity is not found.
   */
  abstract protected function load();

  public function raw() {
    if ($this->entity) {
      return $this->entity->raw();
    }
    $raw = new \stdClass();
    $reflection = new \ReflectionClass($this);
    $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
    foreach ($methods as $method) {
      $methodName = $method->getName();
      if (strpos($methodName, 'get') === 0) {
        $prop = lcfirst(substr($methodName, 3));
        if (isset($this->properties->{$prop})) {
          $val = $this->{$methodName}();
          $raw->{$prop} = $val;
          if (method_exists($val, 'raw')) {
            $raw->{$prop} = $val->raw();
          }
          elseif (is_array($val)) {
            $raw->{$prop} = array();
            foreach ($val as $v) {
              $raw->{$prop}[] = method_exists($v, 'raw') ? $v->raw() : $v;
            }
          }
        }
      }
    }
    return $raw;
  }

  public static function getEntityType() {
    $reflection = new \ReflectionClass(substr(static::class, 0, -5));
    return strtolower($reflection->getShortName());
  }

  public static function getPropertyMapDefinition() {
    $reflection = new \ReflectionClass(substr(static::class, 0, -5));
    return $reflection->getStaticPropertyValue('propertyMapDefinition');
  }
}
