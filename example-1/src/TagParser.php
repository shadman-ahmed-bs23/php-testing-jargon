<?php

namespace App;

class TagParser
{
  public function parse($tags)
  {
    // return explode(', ', $tags); 
    return preg_split('/ ?[,|] ?/', $tags);
  }
}