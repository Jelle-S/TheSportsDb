<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\FactoryContainer.
 */

namespace TheSportsDb\Factory;

/**
 * The default factory container implementation.
 *
 * @author Jelle Sebreghts
 */
class FactoryContainer implements FactoryContainerInterface {
  protected $factories = array();

  public function addFactory(FactoryInterface $factory) {
    $this->factories[$factory->getEntityTypeName()] = $factory;
  }

  public function getFactory($entityType) {
    if (!isset($this->factories[$entityType])) {
      throw new \Exception('No factory registered for ' . $entityType);
    }
    return $this->factories[$entityType];
  }
}
