<?php

namespace helionogueir\typeBoxing\type;

use helionogueir\typeBoxing\Type;

/**
 * String type:
 * - Boxing string type
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class String implements Type {

  private $string = '';

  function __construct($value) {
    if (is_string($value)) {
      $this->string = $value;
    }
    return null;
  }

  public function isEmpty() {
    return empty($this->string);
  }

  public function equals(Type $value) {
    return ($value == $this->string) ? true : false;
  }

  public function __toString() {
    return $this->string;
  }

}
