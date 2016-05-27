<?php
/**
 * @file
 * Contains \TheSportsDb\Factory\FactoryContainerInterface.
 */

namespace TheSportsDb\Factory;

/**
 * An interface for factory containers.
 *
 * @author Jelle Sebreghts
 */
interface FactoryContainerInterface {

  /**
   * Add a factory for a class.
   *
   * @param \TheSportsDb\Factory\FactoryInterface $factory
   *   The factory to add.
   */
  public function addFactory(FactoryInterface $factory);

  /**
   * Get the factory for a class.
   *
   * @param string $class
   *   The fully qualified classname this factory is for.
   *
   * @throws \Exception
   *   When the factory for this class is not registered.
   *
   * @return \TheSportsDb\Factory\FactoryInterface
   *   The factory for this class.
   */
  public function getFactory($class);
}
