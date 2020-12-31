<?php

namespace MVC\core;

use Dcblogdev\PdoWrapper\Database;

class controller
{
     public function view($path, $parms)
     {
          extract($parms);
          //$hello;
          require_once(VIEWS . "\\" . $path . ".php");
     }

}
