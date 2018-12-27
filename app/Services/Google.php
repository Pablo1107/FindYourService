<?php

namespace App\Services;

class Google 
{
  public $apiKey;

  public function __construct() 
  {
    $this->apiKey = config('services.google.key');
  }
}
