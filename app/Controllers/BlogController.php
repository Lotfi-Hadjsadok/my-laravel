<?php

namespace App\Controllers;

class BlogController
{
    public function index()
    {
        echo 'im the hompage';
    }
    public function show(array $params)
    {
        echo "I'm the post " . $params[0] .' '. $params[1];
    }
}
