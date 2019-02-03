<?php

namespace Framework;


 class Mapper
 {
     function populateWithPost($obj)
     {
         foreach ($_POST as $var => $value) {
             $obj->$var = trim($value);
         }

         return $obj;
     }
 }