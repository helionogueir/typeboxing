<?php

namespace typeBoxing\type;

use typeBoxing\Type;

/**
 * Integer type:
 * - Autoboxing integer type;
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
    return !(bool) $this->integer;
  }

  public function equals(Type $value) {
    return ($value == $this->integer) ? true : false;
  }

  public function __toString() {
    return (string) $this->integer;
  }

  /**
   * Get value:
   * - Get value integer;
   * 
   * @param string $index Namespace of index
   * @return int Return the value
   */
  public function __get($index) {
    return ('value' == $index) ? $this->integer : null;
  }

}