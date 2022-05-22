<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Libraries\Multiplayer;

    require dirname(__DIR__) . '/../vendor/autoload.php';

    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new Multiplayer()
            )
        ),
        8081
    );

    $server->run();