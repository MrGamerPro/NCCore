<?php

# NC Easter Eggs by AryToNeX

# Let's do it!

namespace NCEasterEggs;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\Server;
use CustomAlerts\CustomAlerts;
use CustomAlerts\Events\CustomAlertsJoinEvent;
use CustomAlerts\Events\CustomAlertsQuitEvent;

class Main extends PluginBase implements Listener{
  
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
      $this->getServer()->broadcastMessage("§l§eIL SUPREMO §a".$event->getPlayer()->getName()."§e È ENTRATO NEL SERVER.");
    }
    # End of AnThOnEx Easter Egg
  }
  
  public function onCAJoinEvent(CustomAlertsJoinEvent $event){
    # CUSTOMALERTS JOIN WORKAROUND
    if(strtolower($event->getPlayer()->getName()) === ["santx","indrenx46","anthonex"]){
    	CustomAlerts::getAPI()->setJoinMessage("");
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
    # Magic Easter Eggs
    # Avada Kedavra Easter Egg
    if(strtolower($message) === "avada kedavra" and $player->getInventory()->getItemInHand()->getID() === Item::STICK){
      /** @var \pocketmine\Server $server */
      $players = $server->getOnlinePlayers();
      $target = $players[array_rand($players)];
      $targetname = $target->getName();
      if($target->hasPermission("easteregg.exempt")){
        $player->sendMessage(TextFormat::RED."Stavi per uccidere uno staffer, aonna!");
      }else{
        $target->kill();
        $this->getServer()->broadcastMessage(TextFormat::RED."Avada kedavra, ".$targetname);
      }
    }
    # End of Avada Kedavra Easter Egg
    # End of Magic Easter Eggs
    # Tiziana Cantone Easter Egg
    if(strtolower($message) === ["stai facendo un video?","sto reccando","sto registrando","sto facendo un video","sto rec"]){
      $this->getServer()->broadcastMessage(TextFormat::GREEN."Bravoh!");
    }
    # End of Tiziana Cantone Easter Egg
    # Catone Easter Egg
    if(strtolower($message) === "porco schifo"){
      $this->getServer()->broadcastMessage(TextFormat::GREEN."È uno sballo, mi piaceh!");
    }
    # End of Catone Easter Egg
    # Giuseppe Simone Easter Eggs
    if(strtolower($message) === ["monella","monellah","sei una monella","sei una monellah"]){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Monellah! Monellah! Sei una monellah!");
    }
    if(strtolower($message) === "azzorra"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Azzorra mi ha fatto incazzare!");
    }
    if(strtolower($message) === "vagina"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Neanche un chilo di vagina, avvocatoh");
    }
    if(strtolower($message) === "coda di un canguro"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Mi diventa duro duro come la coda di un canguro!");
    }
    # End of Giuseppe Simone Easter Eggs
    # Zio Michele Easter Egg
    if(strtolower($message) === "zio michele"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Ha stato lui con lu trattoreh");
    }
    # End of Zio Michele Easter Egg
    # Mattia Sangermano Easter Egg
    if(strtolower($message) === ["bordello","minchia zio","mattia sangermano","tia sangermano"]){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Se non dai fuoco ad una banca, ceh, sei coglioneh!");
    }
    # End of Mattia Sangermano Easter Egg
    # iPhone Sh.t Easter Egg
    if(strtolower($message) === ["iphone","ipad","ipod","imac"]){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Forse volevi dire ".TextFormat::GREEN."iMerd".TextFormat::YELLOW."?");
    }
    # End of iPhone Sh.t Easter Egg
    # Indrenx46 Easter Egg
    if(strtolower($message) === ["indrenx","indrenx46"]){
      $player->sendMessage(TextFormat::YELLOW."Non nominare il kebabbaro invano");
    }
    # End of Indrenx46 Easter Egg
    # AnThOnEx Easter Egg
      if(strtolower($message) === "anthonex"){
      $player->sendMessage(TextFormat::YELLOW."Non nominare il Supremo invano");
    }
    # End of AnThOnEx Easter Egg
    # Adam Kadmon Easter Egg
    if(strtolower($message) === ["illuminati","kadmon","adam kadmon","coincidenze","stolti e corrotti"]){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Coincidenze? Io non credo.");
    }
    # End of Adam Kadmon Easter Egg
    # Creepy Easter Eggs
    if(strtolower($message) === ["buried","buried alive"]){
      $this->getServer()->broadcastMessage(TextFormat::RED."I feel so lonely.. Do you want to stay with me?");
    }
    if(strtolower($message) === ["misfortune","misfortune.gb"]){
      $this->getServer()->broadcastMessage(TextFormat::RED."I AM GOD HERE.");
    }
    if(strtolower($message) === ["white hand","whitehand"]){
      $this->getServer()->broadcastMessage(TextFormat::RED."Hai una mano bianca dietro la schiena.");
    }
    # End of Creepy Easter Eggs
    # Thug Easter Egg
    if(strtolower($message) === ["thug","#thug","thug life","#thuglife","mlg","#mlg","rekt","#rekt","get rekt","#getrekt",]){
      $this->getServer()->broadcastMessage(TextFormat::RED."GET REKT ".TextFormat::YELLOW."O MY GOD ".TextFormat::GREEN."MLGGGG ".TextFormat::RED."THUG LIFE!");
    }
    # End of Thug Easter Egg
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
      $this->getServer()->broadcastMessage("§l§cIL SUPREMO §a".$event->getPlayer()->getName()."§c È USCITO DAL SERVER.");
    }
    # End of AnThOnEx Easter Egg
  }
  
  public function onCAQuitEvent(CustomAlertsQuitEvent $event){
    # CUSTOMALERTS QUIT WORKAROUND
    if(strtolower($event->getPlayer()->getName()) === ["santx","indrenx46","anthonex"]){
      CustomAlerts::getAPI()->setQuitMessage("");
    }
    # End of CUSTOMALERTS QUIT WORKAROUND
  }
}
