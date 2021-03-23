<?php

namespace SimpleEconomy\refaltor\API;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use SimpleEconomy\refaltor\Register;

class SimpleEconomyAPI
{
    /**
     * @param Player $player
     */
    public static function createAcount(Player $player): void{
    $data = new Config(Register::getInstance()->getDataFolder() . "money.yml", Config::YAML);
    $data->set($player->getName(), Register::getInstance()->getConfig()->get("base_money"));
    Server::getInstance()->getLogger()->info("the account of " . $player->getName() . " has been created");
    $data->save();
    }

    /**
     * @param Player $player
     * @return bool
     */
    public static function acountExist(Player $player): bool{
    $data = new Config(Register::getInstance()->getDataFolder() . "money.yml", Config::YAML);
    return $data->exists($player->getName());
    }

    /**
     * @param Player $player
     * @param int $money
     */
    public static function addMoney(Player $player, int $money): void{
    $data = new Config(Register::getInstance()->getDataFolder() . "money.yml", Config::YAML);
    $data->set($player->getName(), $data->get($player->getName()) + $money);
    $data->save();
    }

    /**
     * @param Player $player
     * @return int
     */
    public static function getMoney(Player $player): int{
    $data = new Config(Register::getInstance()->getDataFolder() . "money.yml", Config::YAML);
    return $data->get($player->getName());
    }

    /**
     * @param Player $player
     * @param int $money
     */
    public static function setMoney(Player $player, int $money): void{
    $data = new Config(Register::getInstance()->getDataFolder() . "money.yml", Config::YAML);
    $data->set($player->getName(), $money);
    $data->save();
    }
}