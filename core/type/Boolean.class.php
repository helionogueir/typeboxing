<?php

namespace helionogueir\typeBoxing\type;

use helionogueir\typeBoxing\Type;

/**
 * Boolean type:
 * - Autoboxing boolean type;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Boolean implements Type {

  private $boolean = null;

  function __construct($value) {
    if (is_bool($value)) {
      $this->boolean = $value;
    }
    return null;
  }

  public function isEmpty() {
    return empty($this->boolean);
  }

  public function equals(Type $value) {
    return ($value == $this->boolean) ? true : false;
  }

  public function __toString() {
    return $this->boolean;
  }

}
