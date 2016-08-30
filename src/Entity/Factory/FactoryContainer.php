<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Factory\FactoryContainer.
 */

namespace TheSportsDb\Entity\Factory;

/**
 * The default factory container implementation.
 *
 * @author Jelle Sebreghts
 */
class FactoryContainer implements FactoryContainerInterface {

  /**
   * Storage for factories.
   *
   * @var array
   */
  protected $factories = array();

  /**
   * The default factory for when no type-specific factory is registered.
   *
   * @var \TheSportsDb\Entity\Factory\FactoryInterface
   */
  protected $defaultFactory;

  /**
   * {@inheritdoc}
   */
  public function addFactory(FactoryInterface $factory, $entityType) {
    $this->factories[$entityType] = $factory;
  }

  /**
   * {@inheritdoc}
   */
  public function getFactory($entityType) {
    if (!isset($this->factories[$entityType]) && !($this->defaultFactory instanceof FactoryInterface)) {
      throw new \Exception('No factory registered for ' . $entityType . ' and no default factory configured.');
    }
    return isset($this->factories[$entityType]) ? $this->factories[$entityType] : $this->defaultFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function setDefaultFactory(FactoryInterface $factory) {
    $this->defaultFactory = $factory;
  }

}
