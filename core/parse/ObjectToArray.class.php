<?php

namespace helionogueir\typeBoxing\parse;

use stdClass;
use helionogueir\typeBoxing\Parse;

/**
 * - Parse object to array
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.1.0
 */
class ObjectToArray implements Parse {

  /**
   * - Parse object to array
   * @param stdclass $object Object to be parse in array
   * @return Array Object parsed in array
   */
  public function parse(stdClass $object): Array {
    return $this->convert((Array) $object);
  }

  /**
   * - Parse object to array recurive
   * @param Array $object Object to be parse in array
   * @return Array Object parsed in array
   */
  private function convert(Array $object): Array {
    $parse = Array();
    foreach ($object as $key => $value) {
      if ($value instanceof stdClass) {
        $parse[$key] = $this->convert((Array) $value);
      } else {
        $parse[$key] = $value;
      }
    }
    return $parse;
  }

}
