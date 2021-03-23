<?php

namespace SimpleEconomy\refaltor;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use SimpleEconomy\refaltor\events\playerListener;

class Register extends PluginBase
{
    private static $instance;

    public function onEnable()
    {
        self::$instance = $this;
        $this->saveDefaultConfig();
        Server::getInstance()->getLogger()->info("The plugin is currently in beta");
        Server::getInstance()->getPluginManager()->registerEvents(new playerListener(), $this);
    }

    public static function getInstance(): Register{
        return self::$instance;
    }

}