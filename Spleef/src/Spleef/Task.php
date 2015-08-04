<?php

namespace Spleef;

use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;

class Task extends PluginTask{


public function __construct($plugin){
    $this->plugin = $plugin;
    parent::__construct($plugin);
  }

  public function onRun($tick){ //ogni secondo
    $this->plugin->sec -= 1;
    if($this->plugin->min => 20){
      foreach($this->plugin->getServer()->getPlayers() as $p){
        $p->sendMessage("Game starts in ".$this->plugin->sec." seconds");
      }
    }elseif($this->plugin->min === 0){
  }
}
