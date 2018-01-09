<?php
namespace Core\Commands;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Core\Loader;

class GetPOS extends Command {

    public function __construct(Loader $plugin) {
        $this->core = $plugin;
        parent::__construct("position", "Get your position", "Usage: /position", ["pos"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        $playerX = $sender->getX();
        $playerY = $sender->getY();
        $playerZ = $sender->getZ();
        $outX = round($playerX, 1);
        $outY = round($playerY, 1);
        $outZ = round($playerZ, 1);
        $playerLevel = $sender->getLevel()->getName();
        $sender->sendMessage("§2X:§3 " . $outX);
        $sender->sendMessage("§2Y:§3 " . $outY);
        $sender->sendMessage("§2Z:§3 " . $outZ);
        $sender->sendMessage("§2World:§3 " . $playerLevel);
        return true;
    }
}