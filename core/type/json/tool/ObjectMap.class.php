<?php

namespace typeBoxing\type\json\tool;

use stdClass;
use Exception;
use core\Lang;
use typeBoxing\type\String;

/**
 * Check object map:
 * - Test object map;
 *
 * @author Helio Nogueira <helio.nogueir@gmail.com>
 * @version v1.0.0
 */
class ObjectMap {

  private $langPackage = null;
  private $langData = array();

  /**
   * Construct map object
   * - Construct map object var;
   * 
   * @param typeBoxing\type\String $langPackage Package of language
   * @param Array $langData Data repalce of language
   * @return null Without return
   */
  public function __construct(String $langPackage, Array $langData = array()) {
    $this->langPackage = $langPackage;
    $this->langData = $langData;
  }

  /**
   * Check object map:
   * - Check if map is valid;
   * 
   * @param stdClass $object Module object
   * @param Array $map Map of object
   * @param typeBoxing\type\String $lang Lang TAG
   * @return bool Return if object map is valid
   */
  public function checkObject(stdClass $object, $map, String $lang) {
    $auth = true;
    foreach ($map as $index => $subMap) {
      $_lang = new String("{$lang}:{$index}");
      if ((isset($object->{$index}))) {
        if (is_array($subMap)) {
          $this->checkObject($object->{$index}, $subMap, $_lang);
        }
      } else {
        throw new Exception(Lang::get($_lang, $this->langPackage, $this->langData));
        $auth = false;
      }
    }
    return $auth;
  }

}
