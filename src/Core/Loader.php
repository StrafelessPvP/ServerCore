<?php
namespace Core;

use pocketmine\plugin\PluginBase;
/* Events */
use Core\Events\onJoinEvent;
use Core\Events\onQuitEvent;
/* Commands */
use Core\Commands\ClearLagg;
use Core\Commands\GetPOS;
use Core\Commands\Spawn;

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
        $this->getServer()->getCommandMap()->register("position", new GetPOS($this));
        $this->getServer()->getCommandMap()->register("spawn", new Spawn($this));
    }

    public function onWorldTime() {
        $this->getServer()->loadLevel("World");
        $this->getServer()->getLevelByName("World")->setTime(0);
        $this->getServer()->getLevelByName("World")->stopTime();
    }
}