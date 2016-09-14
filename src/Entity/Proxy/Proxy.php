<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Proxy\Proxy.
 */

namespace TheSportsDb\Entity\Proxy;

use TheSportsDb\Entity\EntityInterface;
use TheSportsDb\Entity\EntityManagerConsumerTrait;
use TheSportsDb\Entity\EntityManagerInterface;
use TheSportsDb\Entity\EntityPropertyUtil;
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
   * {@inheritdoc}
   */
  public function __construct(\stdClass $values) {
    $this->properties = new \stdClass();
    $this->update($values);
  }

  /**
   * {@inheritdoc}
   */
  public function update(\stdClass $values) {
    if ($this->entity instanceof EntityInterface) {
      $this->entity->update($values);
      return;
    }
    foreach ((array) $values as $prop => $val) {
      if (method_exists($this, 'get' . ucfirst($prop))) {
        $this->properties->{$prop} = $val;
      }
    }
    if ($this->entityManager && $this->entityManager->isFullObject($this->properties, $this->getEntityType())) {
      $this->entity = $this->entityManager->factory($this->getEntityType())->create($this->properties, $this->getEntityType());
    }
  }

  /**
   * {@inheritdoc}
   */
  public function setEntityManager(EntityManagerInterface $entityManager) {
    $this->entityManager = $entityManager;
    // Check if we can create a full object once the entity manager is set.
    $stub = new \stdClass();
    $this->update($stub);
  }

  /**
   * {@inheritdoc}
   */
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
   *
   * @return void
   */
  abstract protected function load();

  /**
   * {@inheritdoc}
   */
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
          $this->_raw->{$prop} = EntityPropertyUtil::getRawValue($val);
        }
      }
    }
    return $this->_raw;
  }

  /**
   * {@inheritdoc}
   */
  public static function getEntityType() {
    $reflection = new \ReflectionClass(static::class);
    return strtolower(substr($reflection->getShortName(), 0, -5));
  }

  /**
   * {@inheritdoc}
   */
  public static function getPropertyMapDefinition() {
    $selfReflection = new \ReflectionClass(static::class);
    $namespace = substr($selfReflection->getNamespaceName(), 0, -5);
    $reflection = new \ReflectionClass($namespace . substr($selfReflection->getShortName(), 0, -5));
    return $reflection->getMethod('getPropertyMapDefinition')->invoke(NULL);
  }
}
