<?php

namespace App\Resources;



class Resources
{
  public $EN = array(
     "username" => "username",

  );

 public $RO = array(
      "username" => "nume de utilizator",
  );

  public function  GetResources(string $lang)
  {
      return $this->$lang;
  }
}