<?php

namespace helionogueir\typeBoxing\type;

use stdClass;
use helionogueir\typeBoxing\Type;

/**
 * JSON (JavaScript Object Notation) type:
 * - Boxing string type
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
abstract class Json implements Type {

  protected $text = '';
  protected $object = null;

  public function isEmpty() {
    return empty($this->text);
  }

  public function equals(Type $value) {
    return ($value == $this->text) ? true : false;
  }

  public function __toString() {
    return $this->text;
  }

  /**
   * Get var obejct:
   * - Return var object
   * 
   * @return stdClass Return var object
   */
  public final function getObject() {
    return $this->object;
  }

  /**
   * Get object value var:
   * - Get value in object var
   * 
   * @param mixed $index Namespace in object
   * @return mixed Return value in object
   */
  public function __get($index) {
    $value = null;
    if (!empty($index)) {
      if (isset($this->getObject()->{$index})) {
        $value = $this->getObject()->{$index};
      }
    }
    return $value;
  }

}
