<?php

namespace helionogueir\typeBoxing;

/**
 * Data type:
 * - Autoboxing data type;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
interface Type {

  /**
   * Construct type
   * - Contruct data type;
   * 
   * @param mixed $value Value that will convert to type
   * @return null Without return
   */
  function __construct($value);

  /**
   * Value is empty:
   * - Check if value is empty;
   * 
   * @return bool True is null, false is not null
   */
  public function isEmpty();

  /**
   * Value id equal:
   * - Check if value is equals object;
   * 
   * @return bool True is equals, false is not equals
   */
  public function equals(Type $value);

  /**
   * Invoke value:
   * - Return value in string;
   * 
   * @return mixed Return string value
   */
  public function __toString();
}
