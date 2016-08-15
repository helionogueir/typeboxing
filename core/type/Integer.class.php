<?php

namespace helionogueir\typeBoxing\type;

use helionogueir\typeBoxing\Type;

/**
 * Integer type:
 * - Boxing integer type
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Integer implements Type {

  private $integer = 0;

  function __construct($value) {
    if (!empty($value)) {
      $this->integer = intval($value);
    }
    return null;
  }

  public function isEmpty() {
    return (('' == $this->integer) && (null == $this->integer));
  }

  public function equals(Type $value) {
    return ($value == $this->integer) ? true : false;
  }

  public function __toString() {
    return (string) $this->integer;
  }

}
