<?php declare(strict_types = 1);
/**
 * src/genboy/Festival/FeMenu.php
 */

namespace genboy\Festival;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\level\Position;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\network\mcpe\protocol\SetSpawnPositionPacket;

class FeMenu{

    private $plugin;
    /** __construct
	 * @param Festival
     */
	public function __construct(Festival $owner){

		$this->plugin = $owner;

	}

}
