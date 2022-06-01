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
    
    /*
     * Input output server koji se pokrece kao odvojen proces.
     * Sluzi za prihvatanje konekcija od igraca za multiplayer
     * preko socketa, spajanje i sinhronizovanje protivnika, i obavestavanje
     * o ishodu odigrane partije.
     */