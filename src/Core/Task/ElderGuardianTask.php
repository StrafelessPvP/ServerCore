<?php
namespace Core\Task;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\network\mcpe\protocol\LevelEventPacket;
use Core\Loader;

class ElderGuardianTask extends PluginTask {

    private $player;
    private $plugin;

    public function __construct(Loader $plugin, Player $player) {
        parent::__construct($plugin);
        $this->core = $plugin;
        $this->player = $player;
    }

    public function onRun(int $currentTick) {
        $pk = new LevelEventPacket();
        $pk->evid = LevelEventPacket::EVENT_GUARDIAN_CURSE;
        $pk->data = 0;
        $pk->position = $this->player->asVector3();
        $this->player->dataPacket($pk);
    }
}