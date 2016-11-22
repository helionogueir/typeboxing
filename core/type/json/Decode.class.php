<?php

namespace helionogueir\typeBoxing\type\json;

use helionogueir\typeBoxing\type\Str;
use helionogueir\typeBoxing\type\Json;

/**
 * JSON (JavaScript Object Notation) type:
 * - Boxing JSON decode
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.1.0
 */
class Decode extends Json {

  /**
   * Construct JSON text:
   * - Convert JSON text in object
   * 
   * @param string $text Text JSON to be object
   * @return null
   */
  function __construct($text) {
    if (!empty($text)) {
      $object = json_decode($text);
      if (JSON_ERROR_NONE === json_last_error()) {
        $this->object = $object;
        $this->text = new Str($text);
      }
    }
    return null;
  }

}
