<?php

namespace App\Service;

class MessageGenerator
{

  public function randomBitchyMessage()
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
