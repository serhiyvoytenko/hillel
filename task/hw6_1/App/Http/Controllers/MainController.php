<?php

namespace Http\Controllers;

class MainController
{
    public function __construct()
    {
        echo get_class($this).'<br>';
    }
}
