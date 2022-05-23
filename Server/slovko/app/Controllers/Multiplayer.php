<?php

namespace App\Controllers;

/**
 * Multiplayer - pomocna klasa kontrolera potrebna zbog instanciranja servera u Server.php
 * @version 1.0
 */

class Multiplayer extends BaseController
{
    public function index()
    {
        $data = [];
        echo view('stranice/multiplayer');
    }
}
