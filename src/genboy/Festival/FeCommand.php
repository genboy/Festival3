<?php
/** Festival 3.0.0
 * src/genboy/Festival/FeCommand.php
 * copyright Genbboy 2020
 */
declare(strict_types = 1);

namespace genboy\Festival;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\level\Position;

class FeCommand {

    public $plugin;

    public function __construct(Festival $owner) {
        $this->plugin = $owner;
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {

        if(!($sender instanceof Player)){
            $sender->sendMessage( TextFormat::RED . "Festival Command must be used in-game." );
			return true;
		}

    }

}
?>
