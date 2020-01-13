<?php
/** Festival 3.0.0
 * src/genboy/Festival/FeListener.php
 * copyright Genboy 2020
 */
declare(strict_types = 1);

namespace genboy\Festival;


use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;

use pocketmine\Server;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\entity\Entity;
use pocketmine\entity\Human;
use pocketmine\block\Block;
use pocketmine\math\Vector3;

use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\block\BlockUpdateEvent;


class FeListener implements Listener {

    public $plugin;

    public function __construct(Festival $owner) {

        $this->plugin = $owner;

    }

    /**
     * @param PlayerItemHeldEvent $event
     */
    public function onHold(PlayerItemHeldEvent $event): void { //onItemHeld

        if ($event->isCancelled()) {
            return;
        }

        $player = $event->getPlayer();
        $playerLevel = $player->getLevel()->getName();
		$playerName = $player->getName();
        $playerPos = new Vector3( $player->getX(), $player->getY(), $player->getZ() );

        $itemheld = $event->getItem()->getID();

    }

    /** onInteract
	 * @param PlayerInteractEvent $event
	 * @ignoreCancelled true
	 */
    public function onInteract( PlayerInteractEvent $event ): void{

        $player = $event->getPlayer();
        $playerLevel = $player->getLevel()->getName();
		$playerName = $player->getName();
        $playerPos = new Vector3( $player->getX(), $player->getY(), $player->getZ() );

        $itemhand = $player->getInventory()->getItemInHand();

    }

	/** onBlockTouch
	 * @param PlayerInteractEvent $event
	 * @ignoreCancelled true
	 */
	public function onBlockTouch(PlayerInteractEvent $event) : void{

		$player = $event->getPlayer();
        $playerLevel = $player->getLevel()->getName();
		$playerName = $player->getName();
        $playerPos = new Vector3( $player->getX(), $player->getY(), $player->getZ() );

		$itemhand = $player->getInventory()->getItemInHand();

		$block = $event->getBlock();
        $blockPos = $block->asVector3();

	}


    /** Block break
	 * @param BlockBreakEvent $event
	 * @ignoreCancelled true
	 */
	public function onBlockBreak(BlockBreakEvent $event) : void{

		$player = $event->getPlayer();
        $playerLevel = $player->getLevel()->getName();
		$playerName = $player->getName();
        $playerPos = new Vector3( $player->getX(), $player->getY(), $player->getZ() );

		$itemhand = $player->getInventory()->getItemInHand();

        $block = $event->getBlock();
        $blockPos = $block->asVector3();

    }


	/** Block Place
	 * @param BlockPlaceEvent $event
	 * @ignoreCancelled true
	 */
	public function onBlockPlace(BlockPlaceEvent $event) : void{

		$player = $event->getPlayer();
        $playerLevel = $player->getLevel()->getName();
		$playerName = $player->getName();
        $playerPos = new Vector3( $player->getX(), $player->getY(), $player->getZ() );

		$itemhand = $player->getInventory()->getItemInHand();

        $block = $event->getBlock();
        $blockPos = $block->asVector3();

    }

    /** onMove
	 * @param PlayerMoveEvent $ev
	 * @var string inArea
	 * @return true
	 */
	public function onMove(PlayerMoveEvent $event) : void{

		$player = $event->getPlayer();
        $playerLevel = $player->getLevel()->getName();
		$playerName = $player->getName();
        $playerPos = new Vector3( $player->getX(), $player->getY(), $player->getZ() );

    }

    /** onBlockUpdate
     * @param BlockUpdateEvent $event
     * @return void
     */
    public function onBlockUpdate( BlockUpdateEvent $event ): void{ // BlockUpdateEvent

        $block = $event->getBlock();
        $blockPos = $block->asVector3();
        $position = new Position($block->getFloorX(), $block->getFloorY(), $block->getFloorZ(), $block->getLevel());
        $levelname = $block->getLevel()->getName();

    }

}
