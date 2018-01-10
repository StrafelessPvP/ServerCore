<?php
namespace Core\Commands;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\math\Vector3;
use Core\Loader;

class Spawn extends Command {

    public function __construct(Loader $plugin) {
        $this->core = $plugin;
        parent::__construct("spawn", "Teleport to main spawn", "Usage: /spawn", []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        $x = $this->core->getServer()->getDefaultLevel()->getSafeSpawn()->getX();
        $y = $this->core->getServer()->getDefaultLevel()->getSafeSpawn()->getY();
        $z = $this->core->getServer()->getDefaultLevel()->getSafeSpawn()->getZ();
        $level = $this->core->getServer()->getDefaultLevel();
        $sender->setLevel($level);
        $sender->teleport(new Vector3($x + .5, $y, $z + .5, $level));
        return true;
    }
}