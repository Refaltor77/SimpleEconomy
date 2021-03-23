<?php

namespace SimpleEconomy\refaltor\events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use SimpleEconomy\refaltor\API\SimpleEconomyAPI;

class playerListener implements Listener
{
    public function playerJoin(PlayerJoinEvent $event){
    $player = $event->getPlayer();
    if (!SimpleEconomyAPI::acountExist($player)) SimpleEconomyAPI::createAcount($player);
    }
}