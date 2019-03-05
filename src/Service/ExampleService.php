<?php

namespace App\Service;

/**
 * Class ExampleService
 * @package App\Service
 */
class ExampleService
{

    /**
     * @return string
     */
    public function randomBitchyMessage() : string
  {
    $messages = [
      "Fine",
      "i dont care",
      "Whatever"
    ];

    $index = array_rand($messages);


    return $messages[$index];
  }

}
