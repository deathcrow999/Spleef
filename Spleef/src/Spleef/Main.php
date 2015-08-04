<?php

namespace Spleef;

use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Server;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\block\Block;
use pocketmine\level\Level;


class Main extends PluginBase implements Listener{

    public function onLoad(){
        $this->getLogger()->info(TextFormat::YELLOW . "Loading Spleef by Fycarman");
    }

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN . "Spleef by Fycarman loaded!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }

    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED . "Spleef by Fycarman disabled");
        $this->getConfig()->save();
    }

    public function onTouch(PlayerInteractEvent $event){
        if($event->getItem()->getId() == 277){
            $event->getBlock()->getLevel()->setBlock(new Vector3($event->getBlock()->getX(),$event->getBlock()->getY(),$event->getBlock()->getZ()), Block::get(0));
        }
    }

    public function onDeath(PlayerDeathEvent $event){
        $level = $this->getDefaultLevel()->getSpawn();
        $player = $event->getPlayer();
        $player->teleport($level);

    if(count($this->getServer()->getLevelByName($this->getConfig()->get("level"))->getPlayers()) === 1){
    $player = $event->getPlayer();
    $level = $this->getDefaultLevel()->getSpawn();
    $player->teleport($level);
}
    if(count($this->getServer()->getLevelByName($this->getConfig()->get("level"))->getPlayers()) === 0){

		$originalMap = $this->getConfig()->get("level");

		$zipPath = $this->getDataFolder("worlds/$originalMap/");

		$this->extractWorld($zipPath, $level);
     return true;
}
}

	private function extractWorld($zipPath, $worldName){

		$zip = new \ZipArchive;

		$errId = $zip->open($zipPath);

		$zip->extractTo($this->getServer()->getDataPath() . "worlds/$worldName/");

		$zip->close();

	}


    }


