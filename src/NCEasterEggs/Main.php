<?php

# NC Easter Eggs by AryToNeX

# Let's do it!

namespace NCEasterEggs;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;
use CustomAlerts\CustomAlerts;
use CustomAlerts\Events\CustomAlertsJoinEvent;
use CustomAlerts\Events\CustomAlertsQuitEvent;

class NCEasterEggs extends PluginBase implements Listener{
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TextFormat::GREEN . "Enabled!");
    # CUSTOMALERTS CHECK
    if(CustomAlerts::getAPI()->getAPIVersion() == "1.2"){
    	$this->getLogger()->info(TextFormat::GREEN . "CustomAlerts API v1.2 Found!");
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
    }else{
    	$this->getLogger()->alert(TextFormat::RED . "CustomAlerts Not Found. Disabling NCEasterEggs");
    	$this->getPluginLoader()->disablePlugin($this);
    # End of CUSTOMALERTS CHECK
    }
  }
  
  public function onDisable(){
    $this->getLogger()->info(TextFormat::RED . "Disabled!");
  }
  
  public function onPlayerJoin(PlayerJoinEvent $event){
    # SantX Lag Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $this->getServer()->broadcastMessage("§a".$event->getPlayer()->getName()." §o§eè laggato dentro il server")
    }
    # End of SantX Lag Easter Egg
  }
  
  public function onCAJoinEvent(CustomAlertsJoinEvent $event){
    # CUSTOMALERTS JOIN WORKAROUND
    if(strtolower($event->getPlayer()->getName()) === "santx"){
    	$event->setCancelled(true);
    }
    # End CUSTOMALERTS JOIN WORKAROUND
  }
  
  public function onItemHeld(PlayerItemHeldEvent $event){
    # SantX MissingNo Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $player = $event->getPlayer()
      $player->sendPopup("§o§4MissingNo");
    }
    # End of SantX MissingNo Easter Egg
  }
  
  public function onPlayerChat(PlayerChatEvent $event){
    $player = $event->getPlayer()
    $message = $event->getMessage()
    # Avada Kedavra Easter Egg
    if(strtolower($message) == "avada kedavra"){
      # kill random player
    }
    # End of Avada Kedavra Easter Egg
  }
  
  public function onPlayerQuit(PlayerQuitEvent $event){
    #SantX Lag Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $this->getServer()->broadcastMessage("§a".$event->getPlayer()->getName()." §o§cè laggato fuori dal server")
    }
    # End of SantX Lag Easter Egg
  }
  
  public function onCAQuitEvent(CustomAlertsQuitEvent $event){
    # CUSTOMALERTS QUIT WORKAROUND
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $event->setCancelled(true);
    }
    # End of CUSTOMALERTS QUIT WORKAROUND
  }
}
