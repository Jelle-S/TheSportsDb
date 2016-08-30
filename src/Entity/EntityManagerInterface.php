<?php
/**
 * @file
 * Contains \TheSportsDb\Entity\EntityManagerInterface
 */

namespace TheSportsDb\Entity;

/**
 * Interface for entity managers.
 *
 * @author Jelle Sebreghts
 */
interface EntityManagerInterface {

  /**
   * Returns the repository object for the given entity type.
   *
   * @param string $entityType
   *   The entity type to get the repository for.
   *
   * @return TheSportsDb\Entity\Repository\EntityRepositoryInterface
   *   The repository for the given entity type.
   */
  public function repository($entityType);

  /**
   * Returns the repository object for the given entity type.
   *
   * @param string $entityType
   *   The entity type to get the factory for.
   *
   * @return Factory\FactoryInterface
   *   The repositort for the given entity type.
   */
  public function factory($entityType);

  /**
   * Register real and proxy classes for an entity type.
   *
   * @param string $entityType
   *   The entity type to register the classes for.
   *
   * @param string|null $realClass
   *   The real class to register.
   * @param string|null $proxyClass
   *   The proxy class to register.
   *
   * @return array
   *   The registered classes for this entity type.
   */
  public function registerClass($entityType, $realClass = NULL, $proxyClass = NULL);

  /**
   * Get the property map definition.
   *
   * @param string $entityType
   *   The entity type to get the definition for.
   *
   * @return \TheSportsDb\PropertyMapper\PropertyMapDefinition
   *   The property map definition.
   */
  public function getPropertyMapDefinition($entityType);

  /**
   * Get the registered class for an entity type.
   *
   * @param string $entityType
   *   The entity type to get the class for.
   * @param string $type
   *   The type of class to get 'real' or 'proxy'.
   *
   * @return string
   *   The registered class of the given type for this entity type.
   */
  public function getClass($entityType, $type = 'real');

  /**
   * Maps properties.
   *
   * @param \stdClass $values
   *   The properties to map.
   * @param string $entityType
   *   The entity type to map properties for.
   *
   * @return \stdClass
   *   The mapped properties.
   */
  public function mapProperties(\stdClass $values, $entityType);


  /**
   * Reverse maps properties.
   *
   * @param \stdClass $values
   *   The properties to reverse map.
   * @param string $entityType
   *   The entity type to reverse map properties for.
   *
   * @return \stdClass
   *   The reverse mapped properties.
   */
  public function reverseMapProperties(\stdClass $values, $entityType);


  /**
   * Checks whether a fully loaded entity can be created with given values.
   *
   * @param \stdClass $object
   *   The values to check.
   * @param string $entityType
   *   The entity type to check
   *
   * @return bool
   *   TRUE if we can create a fully loaded entity, FALSE otherwise.
   */
  public function isFullObject(\stdClass $object, $entityType);

  /**
   * Sanitizes values before passing them to the factory.
   *
   * @param \stdClass $values
   *   Values to sanitize.
   * @param string $entityType
   *   The entity type to sanitize the values for.
   *
   * @return void
   */
  public function sanitizeValues(\stdClass &$values, $entityType);

  /**
   * Check if a value is considered to be empty.
   *
   * @param mixed $value
   *   The value to check.
   *
   * @return bool
   *   Whether or not this value is considered to be empty.
   */
  public function isEmptyValue($value);

}
