<?php

# NutellaCraft Core

# OK Let's Do It!

namespace NCCore;

use NCCore\EasterEggs;
use pocketmine\PluginBase;
use pocketmine\Listener;

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
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
  
}
  
