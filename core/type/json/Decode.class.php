<?php

namespace helionogueir\typeBoxing\type\json;

use helionogueir\typeBoxing\type\Json;
use helionogueir\typeBoxing\type\String;

/**
 * JSON (JavaScript Object Notation) type:
 * - Boxing JSON decode
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Decode extends Json {

  /**
   * Construct JSON text:
   * - Convert JSON text in object
   * 
   * @param mixed $text Text JSON to be object
   * @return null
   */
  function __construct($text) {
    if (!empty($text)) {
      $object = json_decode($text);
      if (JSON_ERROR_NONE === json_last_error()) {
        $this->object = $object;
        $this->text = new String($text);
      }
    }
    return null;
  }

}
