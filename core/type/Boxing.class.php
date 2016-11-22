<?php

namespace helionogueir\typeBoxing\type;

use stdClass;
use helionogueir\typeBoxing\Type;

/**
 * Casting data:
 * - Boxing data values;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.1.0
 */
class Boxing {

  /**
   * Block construct the class, because this class is static
   * @return false
   */
  public function __construct() {
    return false;
  }

  /**
   * Casting data:
   * - Boxing data values;
   * 
   * @param Array $data Data values
   * @param Array $map Map of values find
   * @return stdClass Elemets were boxing
   */
  public static final function cast(Array $data, Array $map) {
    $parameter = new stdClass();
    foreach ($map as $field => $type) {
      $parameter->{$field} = null;
      if (isset($data[$field])) {
        $classname = "helionogueir\\typeBoxing\\type\\{$type}";
        $class = new $classname($data[$field]);
        if (($class instanceof Type)) {
          $parameter->{$field} = $class;
        }
      }
    }
    return $parameter;
  }

}
