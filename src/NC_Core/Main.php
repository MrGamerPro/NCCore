<?php

# NC Core - By NutellaCraft Developers
#               <AryToNeX - fycarman>

# Note: se dobbiamo escludere qualcuno, per esempio lo staff,
#       da azioni brutte (tipo avada kedavra),
#       usiamo un if con ->hasPermission("staff.exempt").

namespace NC_Core;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getLogger()->info(TextFormat::GREEN . "NutellaCraft-Core Abilitato!");
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onLoad(){
        $this->getLogger()->info(TextFormat::YELLOW . "Caricando NutellaCraft-Core...");
    }

    public function onDisable(){
        $this->getLogger()->info(TextFormat::RED . "NutellaCraft-Core Disabilitato!");
    }

    public function onChat(PlayerChatEvent $event){
        $messaggio = strtolower($event->getMessage());
        $giocatore = $event->getPlayer();
        if(strtolower($messaggio === "avada kedavra" and $giocatore->getInventory()->getItemInHand() === Item::STICK)){
            $players = $this->getServer()->getOnlinePlayers();
            $vittima = $players[array_rand($players)];
            $nomevittima = $vittima->getName();
            if($vittima->hasPermission("staff.exempt")){
                $giocatore->sendMessage(TextFormat::RED . "Stavi per colpire uno staffer, aonnah!");
            }else{
                $vittima->kill();
                $this->getServer()->broadcastMessage("Avada Kedavra, $nomevittima");
                return true;
            }
        }
        if(in_array($messaggio, ["stai facendo un video?","sto reccando","sto registrando","sto facendo un video","sto rec"])){
            $this->getServer()->broadcastMessage(TextFormat::GREEN . "Bravoh!");
        }
        if($messaggio === "porco schifo"){
            $this->getServer()->broadcastMessage("È uno sballo, mi piaceh!");
        }
        if(in_array($messaggio, ["monella","monellah","sei una monella","sei una monellah"])){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW . "Monellah! Monellah! Sei una monellah!");
        }
        if($messaggio === "azzorra"){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW . "Azzorra mi ha fatto incazzare!");
        }
        if($messaggio === "vagina"){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW . "Neanche un chilo di vagina, avvocatoh");
        }
        if($messaggio === "coda di canguro"){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW . "Mi diventa duro duro come la coda di un canguro!");
        }
        if($messaggio = "zio michele"){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW . "Ha stato lui con lu trattoreh");
        }
        if(in_array($messaggio, ["bordello","minchia zio","mattia sangermano","tia sangermano"])){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW . "Se non dai fuoco ad una banca, ceh, sei coglioneh!");
        }
        if(in_array($messaggio, ["iphone","ipad","ipod","imac"])){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW . "Forse volevi dire ".TextFormat::GREEN . "iMerd".TextFormat::YELLOW . "?");
        }
        if(in_array($messaggio, ["indrenx","indrenx46"])){
            $giocatore->sendMessage(TextFormat::YELLOW . "Non nominare il Supremo Kebabbaro invano");
        }
        if($messaggio === "anthonex"){
            $giocatore->sendMessage(TextFormat::YELLOW . "Non nominare il Dio AnThOnEx invano");
        }
        if(in_array($messaggio, ["illuminati","kadmon","adam kadmon","coincidenze","stolti e corrotti"])){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW . "Coincidenze? Io non credo.");
        }
        if(in_array($messaggio, ["buried","buried alive"])){
            $this->getServer()->broadcastMessage(TextFormat::RED . "I feel so lonely.. Do you want to stay with me?");
        }
        if(in_array($messaggio, ["misfortune","misfortune.gb"])){
            $this->getServer()->broadcastMessage(TextFormat::RED . "I AM GOD HERE.");
        }
        if(in_array($messaggio, ["white hand","whitehand"])){
            $this->getServer()->broadcastMessage(TextFormat::RED . "Hai una mano bianca dietro la schiena.");
        }
        if(in_array($messaggio, ["thug","#thug","thug life","#thuglife","mlg","#mlg","rekt","#rekt","get rekt","#getrekt"])){
            $this->getServer()->broadcastMessage(TextFormat::RED . "GET REKT ".TextFormat::YELLOW."O MY GOD ".TextFormat::GREEN."MLGGGG ".TextFormat::RED."THUG LIFE!");
        }
        if($messaggio === "porca vagina"){
            $this->getServer()->broadcastMessage(TextFormat::YELLOW  ."Era per enfatizzare!");
        }
        return true;
    }

    public function onJoin(PlayerJoinEvent $event){
        if(strtolower($event->getPlayer()->getName()) === "santx"){
            $this->getServer()->broadcastMessage("§a".$event->getPlayer()->getName()."§o§e è laggato dentro il server");
        }
        if(strtolower($event->getPlayer()->getName()) === "indrenx46"){
            $this->getServer()->broadcastMessage("§eIl Supremo Kebabbaro §a".$event->getPlayer()->getName()."§o§e è entrato nel server");
        }
        if(strtolower($event->getPlayer()->getName()) === "anthonex"){
            $this->getServer()->broadcastMessage("§l§eIL DIO §a".$event->getPlayer()->getName()."§e È ENTRATO NEL SERVER.");
        }
        $giocatore = $event->getPlayer();
        $nome = $giocatore->getName();
        $messaggio = $this->getConfig()->get("Join_Message");
        $event->setJoinMessage($messaggio, str_replace("{player}", $nome, $messaggio));
    }

    public function onQuit(PlayerQuitEvent $event){
        if(strtolower($event->getPlayer()->getName()) === "santx"){
            $this->getServer()->broadcastMessage("§a".$event->getPlayer()->getName()." §o§cè laggato fuori dal server");
        }
        if(strtolower($event->getPlayer()->getName()) === "indrenx46"){
            $this->getServer()->broadcastMessage("§eIl Supremo Kebabbaro §a".$event->getPlayer()->getName()."§o§e è uscito dal server");
        }
        if(strtolower($event->getPlayer()->getName()) === "anthonex"){
            $this->getServer()->broadcastMessage("§l§cIL DIO §a".$event->getPlayer()->getName()."§c È USCITO DAL SERVER.");
        }
        $giocatore = $event->getPlayer();
        $nome = $giocatore->getName();
        $messaggio = $this->getConfig()->get("Quit_Message");
        $event->setQuitMessage($messaggio, str_replace("{player}", $nome, $messaggio));
    }

    public function onPreLogin(PlayerPreLoginEvent $event){
        $giocatore = $event->getPlayer();
        $messaggio = $this->getConfig()->get("Messaggio_da_bannato");
        if($giocatore->isBanned()){
            $giocatore->kick("$messaggio");
            $event->setCancelled(true);
        }
    }
}
