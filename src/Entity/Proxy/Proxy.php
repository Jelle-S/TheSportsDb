<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\Proxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Entity\EntityManagerConsumerTrait;
use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\Http\TheSportsDbClientInterface;

/**
 * Default implementation of proxy objects.
 *
 * @author Jelle Sebreghts
 */
abstract class Proxy implements ProxyInterface {
  use EntityManagerConsumerTrait;
  /**
   * The sports db client.
   *
   * @var \TheSportsDb\Http\TheSportsDbClientInterface
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
   * Creates a new Proxy object.
   *
   * @param \stdClass $values
   *   The sport data.
   */
  public function __construct(\stdClass $values) {
    $this->properties = new \stdClass();
    $this->update($values);
  }

  public function update(\stdClass $values) {
    foreach ((array) $values as $prop => $val) {
      if (method_exists($this, 'get' . ucfirst($prop))) {
        $this->properties->{$prop} = $val;
      }
    }
    if ($this->entityManager && $this->entityManager->factory($this->getEntityType())->isFullObject($this->properties, $this->getEntityType())) {
      $this->entity = $this->entityManager->factory($this->getEntityType())->create($this->properties, $this->getEntityType());
    }
  }

  public function setEntityManager(EntityManagerInterface $entityManager) {
    $this->entityManager = $entityManager;
    // Check if we can create a full object once the entity manager is set.
    $stub = new \stdClass();
    $this->update($stub);
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
    // If the full entity is loaded, use it.
    if ($this->entity instanceof EntityInterface) {
      return $this->entity->{'get' . ucfirst($name)}();
    }

        // If the property exists on the proxy, use it.
    if (isset($this->properties->{$name})) {
      return $this->properties->{$name};
    }

    // The property does not exist on the proxy, and the entity is not loaded in
    // full yet, so load it first and repeat the operation.
    method_exists($this, 'load' . ucfirst($name)) ? $this->{'load' . ucfirst($name)}() : $this->load();
    return $this->get($name);
    
  }

  /**
   * Lazy loads an entity.
   *
   * @throws \Exception
   *   When the entity is not found.
   */
  abstract protected function load();

  public function raw() {
    if ($this->entity) {
      $this->_raw = $this->entity->raw();
      return $this->_raw;
    }
    if (!isset($this->_raw)) {
      $this->_raw = new \stdClass();
    }
    $reflection = new \ReflectionClass($this);
    $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
    foreach ($methods as $method) {
      $methodName = $method->getName();
      if (strpos($methodName, 'get') === 0) {
        $prop = lcfirst(substr($methodName, 3));
        if (isset($this->properties->{$prop}) && !property_exists($this->_raw, $prop)) {
          $this->_raw->{$prop} = NULL;
          $val = $this->{$methodName}();
          $this->_raw->{$prop} = $val;
          if (method_exists($val, 'raw')) {
            $this->_raw->{$prop} = $val->raw();
          }
          elseif (is_array($val)) {
            $this->_raw->{$prop} = array();
            foreach ($val as $v) {
              $this->_raw->{$prop}[] = method_exists($v, 'raw') ? $v->raw() : $v;
            }
          }
        }
      }
    }
    return $this->_raw;
  }

  public static function getEntityType() {
    $reflection = new \ReflectionClass(static::class);
    return strtolower(substr($reflection->getShortName(), 0, -5));
  }

  public static function getPropertyMapDefinition() {
    $reflection = new \ReflectionClass(substr(static::class, 0, -5));
    return $reflection->getStaticPropertyValue('propertyMapDefinition');
  }
}
