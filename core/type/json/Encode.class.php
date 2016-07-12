<?php

namespace helionogueir\typeBoxing\type\json;

use stdClass;
use helionogueir\typeBoxing\type\Json;

/**
 * JSON (JavaScript Object Notation) type:
 * - Autoboxing string type;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Encode extends Json {

  function __construct(stdClass $object) {
    if (count((array) $object)) {
      $text = json_encode($object);
      if (JSON_ERROR_NONE === json_last_error()) {
        $this->text = $text;
        $this->object = $object;
      }
    }
    return null;
  }

}
