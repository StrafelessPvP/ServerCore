<?php
namespace Core;

use pocketmine\plugin\PluginBase;
/* Events */
use Core\Events\onJoinEvent;
use Core\Events\onQuitEvent;

class Loader extends PluginBase {

    public function onEnable() {
        $this->onRegisterEvents();
    }

    public function onRegisterEvents() {
				$this->getServer()->getPluginManager()->registerEvents(new onJoinEvent($this), $this);
				$this->getServer()->getPluginManager()->registerEvents(new onQuitEvent($this), $this);
    }
}