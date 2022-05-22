<?php

namespace App\Controllers;

class Mp extends BaseController
{
    public function index()
    {
        $data = [];
        echo view('stranice/index');
    }
}
