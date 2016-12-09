<?php

use PHPUnit\Framework\TestCase;
use helionogueir\typeBoxing\parse\ObjectToArray;

class ObjectToArrayTest extends TestCase {

  public function testParse() {
    $Object = new \stdClass();
    $Object->d1 = new \stdClass();
    $Object->d1->d2 = null;
    $array = (new ObjectToArray())->parse($Object);
    $this->assertArrayHasKey("d1", $array);
    $this->assertArrayHasKey("d2", $array["d1"]);
  }

}
