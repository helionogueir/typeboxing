<?php

namespace helionogueir\typeBoxing\parse;

use stdClass;
use helionogueir\typeBoxing\Parse;

/**
 * Object To Array:
 * - Parse object to array
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.1.0
 */
class ObjectToArray implements Parse {

  public function parse(stdClass $object) {
    return $this->convert((Array) $object);
  }

  private function convert(Array $object) {
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
