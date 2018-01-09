<?php
namespace Core\Commands;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Human;
use pocketmine\plugin\PluginBase;
use Core\Loader;

class ClearLagg extends Command {

    public function __construct(Loader $plugin) {
        $this->core = $plugin;
        parent::__construct("clearlagg", "Clear entities", "Usage: /clearlagg", ["cl"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        $sender->sendMessage("Cleared " . $this->removeAllEntities() . " entities!");
        return true;
    }

    public function removeAllEntities() {
        $i = 0;
        foreach ($this->core->getServer()->getLevels() as $level) {
            foreach ($level->getEntities() as $entity) {
                if (!($entity instanceof Human)) {
                    $entity->close();
                    $i++;
                }
            }
        }
        return $i;
    }
}