<?php

namespace Timer;

use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;

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
     if(count($this->getServer()->getLevelByName($this->getConfig()->get("level"))->getPlayers()) => 2){
      $player->sendPopup(TextFormat::GREEN . "Spleef started! Have fun!");
//TODO give item
       }else{
//TODO can't start & teleport to lobby
    }
  }
}
