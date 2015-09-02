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
use pocketmine\Player;
use pocketmine\Server;
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
      $this->getServer()->broadcastMessage("§a".$event->getPlayer()->getName()."§o§e è laggato dentro il server");
    }
    # End of SantX Lag Easter Egg
    # Indrenx46 Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "indrenx46"){
      $this->getServer()->broadcastMessage("§eIl kebabbaro §a".$event->getPlayer()->getName()."§o§e è entrato nel server");
    }
    # End of Indrenx46 Easter Egg
    # AnThOnEx Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "anthonex"){
      $this->getServer()->broadcastMessage("§l§eIL SUPREMO §a".$event->getPlayer->getName()."§e È ENTRATO NEL SERVER.");
    }
    # End of AnThOnEx Easter Egg
  }
  
  public function onCAJoinEvent(CustomAlertsJoinEvent $event){
    # CUSTOMALERTS JOIN WORKAROUND
    if(strtolower($event->getPlayer()->getName()) === ["santx","indrenx46","anthonex"]){
    	$event->setCancelled(true);
    }
    # End CUSTOMALERTS JOIN WORKAROUND
  }
  
  public function onItemHeld(PlayerItemHeldEvent $event){
    # SantX MissingNo Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $player = $event->getPlayer();
      $player->sendPopup("§o§4MissingNo");
    }
    # End of SantX MissingNo Easter Egg
  }
  
  public function onPlayerChat(PlayerChatEvent $event){
    $player = $event->getPlayer();
    $message = $event->getMessage();
    # Avada Kedavra Easter Egg
    if(strtolower($message) == "avada kedavra"){
      /** @var \pocketmine\Server $server */
      $players = $server->getOnlinePlayers();
      $target = $players[array_rand($players)]->getName();
      if($target instanceof Player){
         $target->kill();
      }
    }
    # End of Avada Kedavra Easter Egg
    # Tiziana Cantone Easter Egg
    if(strtolower($message) == "stai facendo un video?"){
      $player->sendMessage(TextFormat::GREEN."Bravoh!");
    }
    # End of Tiziana Cantone Easter Egg
    # Zio Michele Easter Egg
    if(strtolower($message) == "zio michele"){
      $player->sendMessage(TextFormat::GREEN."Ha stato lui con lu trattoreh");
    }
    # End of Zio Michele Easter Egg
    # iPhone Sh.t Easter Egg
    if(strtolower($message) == ["iphone","ipad","ipod"]){
      $player->sendMessage(TextFormat::YELLOW."Forse volevi dire ".TextFormat::GREEN."iMerd".TextFormat::YELLOW."?");
    }
    # End of iPhone Sh.t Easter Egg
    # Indrenx46 Easter Egg
    if(strtolower($message) == ["indrenx","indrenx46"]){
      $player->sendMessage(TextFormat::YELLOW."Non nominare il kebabbaro invano");
    }
    # End of Indrenx46 Easter Egg
    # AnThOnEx Easter Egg
      if(strtolower($message) == "anthonex"){
      $player->sendMessage(TextFormat::YELLOW."Non nominare il Supremo invano");
    }
    # End of AnThOnEx Easter Egg
    # Adam Kadmon Easter Egg
    if(strtolower($message) == ["illuminati","kadmon","adam kadmon","coincidenze","stolti e corrotti"]){
      $player->sendMessage(TextFormat::YELLOW."Coincidenze? Io non credo.");
    }
    # End of Adam Kadmon Easter Egg
    # Creepy Easter Eggs
    if(strtolower($message) == ["buried","buried alive"]){
      $player->sendMessage(TextFormat::RED."I feel so lonely.. Do you want to stay with me?");
    }
    if(strtolower($message) == ["misfortune","misfortune.gb"]){
      $player->sendMessage(TextFormat::RED."I AM GOD HERE.");
    }
    if(strtolower($message) == ["white hand","whitehand"]){
      $player->sendMessage(TextFormat::RED."Hai una mano bianca dietro la schiena.");
    }
    # End of Creepy Easter Eggs
  }
  
  public function onPlayerQuit(PlayerQuitEvent $event){
    #SantX Lag Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $this->getServer()->broadcastMessage("§a".$event->getPlayer()->getName()." §o§cè laggato fuori dal server");
    }
    # End of SantX Lag Easter Egg
    # Indrenx46 Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "indrenx46"){
      $this->getServer()->broadcastMessage("§eIl kebabbaro §a".$event->getPlayer()->getName()."§o§e è uscito dal server");
    }
    # End of Indrenx46 Easter Egg
    # AnThOnEx Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "anthonex"){
      $this->getServer()->broadcastMessage("§l§cIL SUPREMO §a".$event->getPlayer->getName()."§c È USCITO DAL SERVER.");
    }
    # End of AnThOnEx Easter Egg
  }
  
  public function onCAQuitEvent(CustomAlertsQuitEvent $event){
    # CUSTOMALERTS QUIT WORKAROUND
    if(strtolower($event->getPlayer()->getName()) === ["santx","indrenx46","anthonex"]){
      $event->setCancelled(true);
    }
    # End of CUSTOMALERTS QUIT WORKAROUND
  }
}
