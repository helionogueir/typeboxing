<?php

namespace typeBoxing\type\json;

use typeBoxing\type\Json;

/**
 * JSON (JavaScript Object Notation) type:
 * - Autoboxing string type;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class Decode extends Json {

  /**
   * Get object value var:
   * - Get value in object var;
   * 
   * @param string $index Namespace in object
   * @return mixed Return value in object
   */
  public function __get($index) {
    $value = null;
    if (!empty($index)) {
      if (isset($this->getObject()->{$index})) {
        $value = $this->getObject()->{$index};
      } else if ('object' == $index) {
        $value = $this->getObject();
      }
    }
    return $value;
  }

}
