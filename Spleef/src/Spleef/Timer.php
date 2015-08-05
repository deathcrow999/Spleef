<?php

namespace Timer;

use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\inventory\Inventory;

class Task extends PluginTask{


public function __construct($plugin){
    $this->plugin = $plugin;
    parent::__construct($plugin);
  }

  public function onRun($tick){ //ogni secondo
    $this->plugin->sec -= 1;
    if($this->plugin->sec => 20){
      foreach($this->getLevelByName($this->getConfig()->get("level"))->getPlayer() as $p){
        $p->sendMessage(TextFormat::GOLD . "Spleef starts in ".$this->plugin->sec." seconds");
      }
    }elseif($this->plugin->sec === 0){
     if(count($this->getServer()->getLevelByName($this->getConfig()->get("level"))->getPlayers()) as $p => 2){
      $p->sendPopup(TextFormat::GREEN . "Spleef started! Have fun!");
      $p->getInventory()->addItem(277, 1);
       }else{
      if(count($this->getServer()->getLevelByName($this->getConfig()->get("level"))->getPlayers()) as $p < 1){
      $->sendMessage(TextFormat::RED . "Can't start game,there aren't enough player");
      $level = $this->getServer()->getDefaultSpawn();
      $p->teleport($level);
      }
    }
  }
}
