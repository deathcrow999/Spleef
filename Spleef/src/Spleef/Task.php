<?php

namespace Task;

use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;

class Task extends PluginTask{
    private $seconds = 20;

    public function onRun(){
        $this->seconds = 1;
        if($seconds = 20){
            $this->getPlayer()->sendPopup(TextFormat::BLUE . "Spleef start in 20 seconds");
        }
        if($seconds = 10){
            $this->getPlayer()->sendPopup(TextFormat::BLUE . "Spleef start in 10 seconds");
        }
        if($seconds = 9){
            $this->getPlayer()->sendPopup(TextFormat::BLUE . "Spleef start in 9 seconds");
        }
        if($seconds = 8){
            $this->getPlayer()->sendPopup(TextFormat::BLUE . "Spleef start in 8 seconds");
        }
        if($seconds = 7){
            $this->getPlayer()->sendPopup(TextFormat::BLUE . "Spleef start in 7 seconds");
        }
        if($seconds = 6){
            $this->getPlayer()->sendPopup(TextFormat::BLUE . "Spleef start in 6 seconds");
        }
        if($seconds = 5){
            $this->getPlayer()->sendPopup(TextFormat::YELLOW . "Spleef start in 5 seconds");
        }
        if($seconds = 4){
            $this->getPlayer()->sendPopup(TextFormat::YELLOW . "Spleef start in 4 seconds");
        }
        if($seconds = 3){
            $this->getPlayer()->sendPopup(TextFormat::RED . "Spleef start in 3 seconds");
        }
        if($seconds = 2){
            $this->getPlayer()->sendPopup(TextFormat::RED . "Spleef start in 2 seconds");
        }
        if($seconds = 1){
            $this->getPlayer()->sendPopup(TextFormat::RED . "Spleef start in 1 seconds");
        }
        public function onMove(PlayerMoveEvent $event){
            if($seconds > 0){
                $to = clone $event->getFrom();
                $to->yaw = $event->getTo()->yaw;
                $to->pitch = $event->getTo()->pitch;
                $event->setTo($to);
            }
            if($seconds = 0){
                $event->setCancelled();
            }
        }
    }
}
