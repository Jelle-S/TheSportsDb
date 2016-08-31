<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\Factory\FactoryContainerInterface.
 */

namespace TheSportsDb\Entity\Factory;

/**
 * An interface for factory containers.
 *
 * @author Jelle Sebreghts
 */
interface FactoryContainerInterface {

  /**
   * Add a factory for a class.
   *
   * @param \TheSportsDb\Entity\Factory\FactoryInterface $factory
   *   The factory to add.
   *
   * @param string $entityType
   *   The entity type this factory is for.
   *
   * @return void
   */
  public function addFactory(FactoryInterface $factory, $entityType);

  /**
   * Get the factory for a class.
   *
   * @param string $entityType
   *   The entity type this factory is for.
   *
   * @throws \Exception
   *   When the factory for this class is not registered.
   *
   * @return \TheSportsDb\Entity\Factory\FactoryInterface
   *   The factory for this class.
   */
  public function getFactory($entityType);

  /**
   * Set the default factory to use.
   *
   * @param \TheSportsDb\Entity\Factory\FactoryInterface $factory
   *   The default factory.
   *
   * @return void
   */
  public function setDefaultFactory(FactoryInterface $factory);
}
