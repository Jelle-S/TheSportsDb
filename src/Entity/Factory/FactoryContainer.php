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
  protected $factories = array();

  protected $defaultFactory;

  public function addFactory(FactoryInterface $factory, $entityType) {
    $this->factories[$factory->getEntityTypeName()] = $factory;
  }

  public function getFactory($entityType) {
    if (!isset($this->factories[$entityType]) && !($this->defaultFactory instanceof FactoryInterface)) {
      throw new \Exception('No factory registered for ' . $entityType . ' and no default factory configured.');
    }
    return isset($this->factories[$entityType]) ? $this->factories[$entityType] : $this->defaultFactory;
  }

  public function setDefaultFactory(FactoryInterface $factory) {
    $this->defaultFactory = $factory;
  }

}
