<?php

namespace Spleef;

use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\inventory\Inventory;

class Timer extends PluginTask{

     public function __construct($plugin){
          $this->plugin = $plugin;
          parent::__construct($plugin);
     }

     public function onRun($tick){ //ogni secondo
          $this->plugin->sec -= 1;
          if($this->plugin->sec => 20){
               foreach($this->plugin->getSerevr()->getLevelByName($this->plugin->getConfig()->get("level"))->getPlayers() as $p){
                    $p->sendMessage(TextFormat::GOLD . "Spleef starts in ".$this->plugin->sec." seconds");
               }
          }elseif($this->plugin->sec === 0){
               if(count($players = $this->plugin->getServer()->getLevelByName($this->plugin->getConfig()->get("level"))->getPlayers()) => 2){
                    foreach($players as $p){
                         $p->sendPopup(TextFormat::GREEN . "Spleef started! Have fun!");
                         $p->getInventory()->addItem(Item::get(277));
                    }
               }else{
                    if(count($players = $this->plugin->getServer()->getLevelByName($this->plugin->getConfig()->get("level"))->getPlayers()) <= 1){
                         foreach($players as $p){
                              $p->sendMessage(TextFormat::RED . "Can't start game,there aren't enough player");
                              $level = $this->plugin->getServer()->getDefaultLevel()->getSafeSpawn();
                              $p->teleport($level);
                         }
                    }
               }
          }
     }
}
