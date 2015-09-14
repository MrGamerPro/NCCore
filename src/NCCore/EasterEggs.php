<?php

# NC Easter Eggs by AryToNeX

# Let's do it!

use NCCore\Main;
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

class EasterEggs extends Main implements Listener{
  
  public function onPlayerJoin(PlayerJoinEvent $event){
    # SantX Lag Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $this->getServer()->broadcastMessage("§a".$event->getPlayer()->getName()."§o§e è laggato dentro il server");
    }
    # End of SantX Lag Easter Egg
    # Indrenx46 Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "indrenx46"){
      $this->getServer()->broadcastMessage("§eIl Supremo Kebabbaro §a".$event->getPlayer()->getName()."§o§e è entrato nel server");
    }
    # End of Indrenx46 Easter Egg
    # AnThOnEx Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "anthonex"){
      $this->getServer()->broadcastMessage("§l§eIL DIO §a".$event->getPlayer()->getName()."§e È ENTRATO NEL SERVER.");
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
    $message = strtolower($event->getMessage());
    # Magic Easter Eggs
    # Avada Kedavra Easter Egg
    if(strtolower($message) === "avada kedavra" and $player->getInventory()->getItemInHand()->getID() === Item::STICK){
      $players = $this->getServer()->getOnlinePlayers();
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
    if(in_array($message, ["stai facendo un video?","sto reccando","sto registrando","sto facendo un video","sto rec"])){
      $this->getServer()->broadcastMessage(TextFormat::GREEN."Bravoh!");
    }
    # End of Tiziana Cantone Easter Egg
    # Catone Easter Egg
    elseif($message === "porco schifo"){
      $this->getServer()->broadcastMessage(TextFormat::GREEN."È uno sballo, mi piaceh!");
    }
    # End of Catone Easter Egg
    # Giuseppe Simone Easter Eggs
    elseif(in_array($message, ["monella","monellah","sei una monella","sei una monellah"])){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Monellah! Monellah! Sei una monellah!");
    }
    elseif($message === "azzorra"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Azzorra mi ha fatto incazzare!");
    }
    elseif($message === "vagina"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Neanche un chilo di vagina, avvocatoh");
    }
    elseif($message === "coda di un canguro"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Mi diventa duro duro come la coda di un canguro!");
    }
    # End of Giuseppe Simone Easter Eggs
    # Zio Michele Easter Egg
    elseif(($message === "zio michele"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Ha stato lui con lu trattoreh");
    }
    # End of Zio Michele Easter Egg
    # Mattia Sangermano Easter Egg
    elseif(in_array($message, ["bordello","minchia zio","mattia sangermano","tia sangermano"])){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Se non dai fuoco ad una banca, ceh, sei coglioneh!");
    }
    # End of Mattia Sangermano Easter Egg
    # iPhone Sh.t Easter Egg
    elseif(in_array($message, ["iphone","ipad","ipod","imac"])){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Forse volevi dire ".TextFormat::GREEN."iMerd".TextFormat::YELLOW."?");
    }
    # End of iPhone Sh.t Easter Egg
    # Indrenx46 Easter Egg
    elseif(in_array($message, ["indrenx","indrenx46"])){
      $player->sendMessage(TextFormat::YELLOW."Non nominare il Supremo Kebabbaro invano");
    }
    # End of Indrenx46 Easter Egg
    # AnThOnEx Easter Egg
    elseif($message === "anthonex"){
      $player->sendMessage(TextFormat::YELLOW."Non nominare il Dio AnThOnEx invano");
    }
    # End of AnThOnEx Easter Egg
    # Adam Kadmon Easter Egg
    elseif(in_array($message, ["illuminati","kadmon","adam kadmon","coincidenze","stolti e corrotti"])){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Coincidenze? Io non credo.");
    }
    # End of Adam Kadmon Easter Egg
    # Creepy Easter Eggs
    elseif(in_array($message, ["buried","buried alive"])){
      $this->getServer()->broadcastMessage(TextFormat::RED."I feel so lonely.. Do you want to stay with me?");
    }
    elseif(in_array($message, ["misfortune","misfortune.gb"])){
      $this->getServer()->broadcastMessage(TextFormat::RED."I AM GOD HERE.");
    }
    elseif(in_array($message, ["white hand","whitehand"])){
      $this->getServer()->broadcastMessage(TextFormat::RED."Hai una mano bianca dietro la schiena.");
    }
    # End of Creepy Easter Eggs
    # Thug Easter Egg
    elseif(in_array($message, ["thug","#thug","thug life","#thuglife","mlg","#mlg","rekt","#rekt","get rekt","#getrekt",])){
      $this->getServer()->broadcastMessage(TextFormat::RED."GET REKT ".TextFormat::YELLOW."O MY GOD ".TextFormat::GREEN."MLGGGG ".TextFormat::RED."THUG LIFE!");
    }
    # End of Thug Easter Egg
    # Pancrazio Easter Egg
    elseif($message === "porca vagina"){
      $this->getServer()->broadcastMessage(TextFormat::YELLOW."Era per enfatizzare!");
    }
    # End of Pancrazio Easter Egg
  }
  
  public function onPlayerQuit(PlayerQuitEvent $event){
    #SantX Lag Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "santx"){
      $this->getServer()->broadcastMessage("§a".$event->getPlayer()->getName()." §o§cè laggato fuori dal server");
    }
    # End of SantX Lag Easter Egg
    # Indrenx46 Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "indrenx46"){
      $this->getServer()->broadcastMessage("§eIl Supremo Kebabbaro §a".$event->getPlayer()->getName()."§o§e è uscito dal server");
    }
    # End of Indrenx46 Easter Egg
    # AnThOnEx Easter Egg
    if(strtolower($event->getPlayer()->getName()) === "anthonex"){
      $this->getServer()->broadcastMessage("§l§cIL DIO §a".$event->getPlayer()->getName()."§c È USCITO DAL SERVER.");
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