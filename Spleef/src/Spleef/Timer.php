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
        $p->sendMessage("Spleef starts in ".$this->plugin->sec." seconds");
      }
    }elseif($this->plugin->sec === 0){
  }
}
