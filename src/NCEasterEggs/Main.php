<?php

# NC Easter Eggs by AryToNeX

# Let's do it!

namespace NCEasterEggs;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\utils\TextFormat;

class NCEasterEggs extends PluginBase implements Listener{
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TextFormat::GREEN . "Enabled!");
  }
  
  public function onDisable(){
    $this->getLogger()->info(TextFormat::RED . "Disabled!");
  }
  
  public function onPlayerJoin(PlayerJoinEvent $event){
    #SantX Lag Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $event->broadcastMessage("§a".$event->getPlayer()->getName()." §o§eè laggato dentro il server")
    }
    #End of SantX Lag Easter Egg
  }
  
  public function onItemHeld(PlayerItemHeldEvent $event){
    #SantX MissingNo Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $player = $event->getPlayer()
      if($item->getId() == /* qualsiasi item */){
        $player->sendPopup("§o§4MissingNo");
      }
    }
    #End of SantX MissingNo Easter Egg
  }
  
  public function onPlayerQuit(PlayerQuitEvent $event){
    #SantX Lag Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $event->broadcastMessage("§a".$event->getPlayer()->getName()." §o§cè laggato fuori dal server")
    }
    #End of SantX Lag Easter Egg
  }
}
