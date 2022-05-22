<?php

namespace App\Controllers;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Libraries\Multiplayer;

class Server extends BaseController
{
    public function index()
    {

        require dirname(__DIR__) . '\vendor\autoload.php';

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Multiplayer()
                )
            ),
            8080
        );

        $server->run();
    }
        
}
