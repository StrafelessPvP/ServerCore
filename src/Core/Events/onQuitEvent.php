<?php
namespace Core\Events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use Core\Loader;

class onQuitEvent implements Listener {

    public function __construct(Loader $plugin) {
        $this->core = $plugin;
    }

    public function onQuit(PlayerQuitEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getName();
        $event->setQuitMessage("");
        $this->core->getServer()->broadcastPopup("§c-§e $name");
    }
}