<?php

namespace App\Controllers;

class Multiplayer extends BaseController
{
    public function index()
    {
        $data = [];
        echo view('stranice/multiplayer');
    }
}
