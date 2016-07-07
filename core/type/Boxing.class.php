<?php

namespace helionogueir\typeBoxing\type;

use stdClass;
use helionogueir\typeBoxing\Type;

/**
 * Casting data:
 * - Boxing data values;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
abstract class Boxing {

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
