<?php

namespace typeBoxing\type;

use stdClass;
use typeBoxing\Type;

/**
 * JSON (JavaScript Object Notation) type:
 * - Autoboxing string type;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
abstract class Json implements Type {

  private $text = '';
  private $object = null;

  function __construct($value) {
    $this->object = new stdClass();
    if (is_string($value)) {
      $this->text = $value;
    } else if (is_object($value)) {
      $this->object = $value;
    }
    $this->convertText();
    $this->convertObject();
    return null;
  }

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
   * - Return var object;
   * 
   * @return stdClass Return var object
   */
  protected final function getObject() {
    return $this->object;
  }

  /**
   * Convert text:
   * - Convert text JSON in object;
   * 
   * @return null Without return
   */
  private final function convertText() {
    if (!is_null($this->text)) {
      $object = json_decode($this->text);
      if (JSON_ERROR_NONE === json_last_error()) {
        $this->object = $object;
      } else {
        $this->object = new stdClass();
        $this->text = '';
      }
    }
    return null;
  }

  /**
   * Convert object:
   * - Convert object in text JSON;
   * 
   * @return null Without return
   */
  private final function convertObject() {
    if (count((array) $this->object)) {
      $text = json_encode($this->object);
      if (JSON_ERROR_NONE === json_last_error()) {
        $this->text = $text;
      } else {
        $this->text = '';
        $this->object = new stdClass();
      }
    }
    return null;
  }

}
