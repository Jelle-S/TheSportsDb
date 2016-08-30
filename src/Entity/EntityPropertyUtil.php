<?php

/**
 * @file
 * Contains \TheSportsDb\Entity\EntityPropertyUtil;
 */

namespace TheSportsDb\Entity;

/**
 * Utility class.
 *
 * @author Jelle Sebreghts
 */
class EntityPropertyUtil {

  /**
   * Get the raw value of any value.
   *
   * @param mixed $val
   *   The value to get the raw value of.
   *
   * @return mixed
   *   The raw value.
   */
  public static function getRawValue($val) {
    $return = $val;
    if (method_exists($val, 'raw')) {
      $return = $val->raw();
    }
    elseif (is_array($val)) {
      $return = array();
      foreach ($val as $v) {
        $return[] = method_exists($v, 'raw') ? $v->raw() : $v;
      }
    }
    return $return;
  }
}
