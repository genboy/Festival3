<?php
/** Festival 3.0.0
 * src/genboy/Festival/Festival.php
 * copyright Genbboy 2020
 */
declare(strict_types = 1);

namespace genboy\Festival;

use genboy\Festival\FeHelper;
use genboy\Festival\FeCommand;
use genboy\Festival\FeMenu;

use neitanod\ForceUTF8\Encoding;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Festival extends PluginBase implements Listener{

    public $menu;

    public function onEnable() : void{

        $this->getServer()->getPluginManager()->registerEvents(new FeListener($this), $this);

        $this->FeCommand = new FeCommand($this);
        $this->FeHelper = new FeHelper($this);
        $this->FeMenu = new FeMenu($this);

        $this->getLogger()->info( "Genboy copyright 2019" );

	}

    /** onJoin
	 * @param PlayerJoinEvent $event
	 */
    public function onJoin(PlayerJoinEvent $event){

        // ingame player orientation

    }

    /** onlogin
     * @param PlayerLoginEvent $event
     */
    public function onLogin(PlayerLoginEvent $event): void {

        // log player profile

    }

    /** levelChange
	 * @param EntityLevelChangeEvent $event
	 */
    public function levelChange(EntityLevelChangeEvent $event) {

        $entity = $event->getEntity();

        if ($entity instanceof Player) {
            $level = $event->getTarget();
        }

    }

    /** onQuit
	 * @param Event $event
	 * @return bool
	 */
    public function onQuit(PlayerQuitEvent $event){

        // close player orientation

    }

    /** onCommand
	 * @param CommandSender $sender
	 * @param Command $command
	 * @param string $label
	 * @param array $args
	 * @return bool
	 */
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {

        return $this->FeCommand->onCommand($sender, $command, $label, $args);

    }

}

/*


Model - config, data and structure - levels, area's, players, records
Controller - interaction View and Model, other plugins
View - commands, event handling, ui


level

area

player

       form ui XenialDan (https://github.com/thebigsmileXD/customui)

*/
