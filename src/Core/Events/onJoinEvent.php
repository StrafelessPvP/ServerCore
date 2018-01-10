<?php
namespace Core\Events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use Core\Task\ElderGuardianTask;
use Core\Loader;

class onJoinEvent implements Listener {

    public function __construct(Loader $plugin) {
        $this->core = $plugin;
    }

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $name = $player->getName();
        if (!$player->hasPlayedBefore()) {
            $item1 = Item::get(Item::IRON_HELMET, 0, 1);
            $item2 = Item::get(Item::IRON_CHESTPLATE, 0, 1);
            $item3 = Item::get(Item::IRON_LEGGINGS, 0, 1);
            $item4 = Item::get(Item::IRON_BOOTS, 0, 1);
            $item5 = Item::get(Item::DIAMOND_SWORD, 0, 1);
            $item6 = Item::get(Item::DIAMOND, 0, 5);
            $item7 = Item::get(Item::WOOD, 0, 32);
            $item8 = Item::get(Item::STEAK, 0, 16);
            $player->getInventory()->addItem($item1, $item2, $item3, $item4, $item5, $item6, $item7, $item8);
        }
        $event->setJoinMessage("");
        $this->core->getServer()->broadcastPopup("§a+§e $name");
        $this->core->getServer()->getScheduler()->scheduleDelayedTask(new ElderGuardianTask($this->core, $event->getPlayer()), 16);
    }
}