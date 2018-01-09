<?php
namespace Core;

use pocketmine\plugin\PluginBase;
/* Events */
use Core\Events\onJoinEvent;
use Core\Events\onQuitEvent;
/* Commands */
use Core\Commands\ClearLagg;

class Loader extends PluginBase {

    public function onEnable() {
        $this->onRegisterEvents();
        $this->onRegisterCommands();
        $this->onWorldTime();
    }

    public function onRegisterEvents() {
        $this->getServer()->getPluginManager()->registerEvents(new onJoinEvent($this), $this);
        $this->getServer()->getPluginManager()->registerEvents(new onQuitEvent($this), $this);
    }

    public function onRegisterCommands() {
        $this->getServer()->getCommandMap()->register("clearlagg", new ClearLagg($this));
    }

    public function onWorldTime() {
        $this->getServer()->loadLevel("World");
        $this->getServer()->getLevelByName("World")->setTime(0);
        $this->getServer()->getLevelByName("World")->stopTime();
    }
}