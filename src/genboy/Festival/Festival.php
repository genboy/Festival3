<?php
/** Festival 3.0.0
 * src/genboy/Festival/Festival.php
 * copyright Genbboy 2020
 *
 * Setup for Festival 3
 *
 */
declare(strict_types = 1);

namespace genboy\Festival;

// Language Encoding utf8 (php thingy)
use neitanod\ForceUTF8\Encoding;

// Festival classes
use genboy\Festival\FeHelper;
use genboy\Festival\FeMessenger;
use genboy\Festival\FeCommand;
use genboy\Festival\FeMenu;
use genboy\Festival\FeLanguage as Language;

// PMMP classes
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\Player;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerQuitEvent;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

// Festival main class
class Festival extends PluginBase implements Listener{

    public $help, $menu;

    public function onEnable() : void{

        $this->getServer()->getPluginManager()->registerEvents(new FeListener($this), $this);

        $this->help = new FeHelper($this);
        $this->menu = new FeMenu($this);

        // check current version, config & data (update old version or new install)

        // load data

        // set default language
        $this->loadLanguage( "en" );

        $this->getLogger()->info( Language::translate("enabled-console-msg") );

        $this->getLogger()->info( "Genboy copyright 2020" );

	}

    /** load language
	 * @var plugin config[]
     * @file resources en.json
     * @file resources nl.json
	 * @var obj Language
	 */
    public function loadLanguage( $languageCode = false ){

        if( !$languageCode ){
            $languageCode = 'en';
        }

        $resources = $this->getResources(); // read files in resources folder
        foreach($resources as $resource){
            if($resource->getFilename() === "en.json"){
              //$text = utf8_encode( file_get_contents($resource->getPathname(), true) ); // json content in utf-8
              $text = Encoding::toUTF8( file_get_contents($resource->getPathname(), true) );
              $default = json_decode($text, true); // php decode utf-8
            }
            if($resource->getFilename() === $languageCode.".json"){
              //$text = utf8_encode( file_get_contents($resource->getPathname(), true) );
              $text = Encoding::toUTF8( file_get_contents($resource->getPathname(), true) );
              $setting = json_decode($text, true); // php decode utf-8
            }
          }
          if(isset($setting)){
            $langJson = $setting;
          }else{
            $langJson = $default;
          }
          new Language($this, $langJson);
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


        if(!($sender instanceof Player)){
            $sender->sendMessage( TextFormat::RED . Language::translate("cmd-ingameonly-msg") );
			return true;
		}

        if(!isset($args[0])){
			return false;
		}

        $playerName = strtolower($sender->getName());
		$action = strtolower($args[0]);
		$o = "";
		switch($action){
            case "menu":
                $o = "Menu in development";
                break;

            default:
            return false;
		}
        $sender->sendMessage($o);
		return true;


    }

    /** playerChat
    * define chat message type
    * @param string $msg
    * @param Player $player

    public function playerChat( Player $player, string $msg ) : void {

        $player->sendMessage($msg);

    }
    */

    /** operatorChat
    * define chat message type
    * @param string $msg

    public function operatorChat( string $msg ) : void {

        $players = $this->plugin->getServer()->getOnlinePlayers();
        foreach($players as $player) {
            if($player->isOp() ) {
                //if($sender->getName() === $player->getName() || $to_player->getName() === $player->getName()) {
                $player->sendMessage($msg);
            }
        }

    }
    */

}

/*


Model - config, data and structure - levels, area's, players, records

Controller - interaction View and Model, other plugins

View - commands, event handling, ui

Listener +




level

area

player



form ui XenialDan (https://github.com/thebigsmileXD/customui)

*/
