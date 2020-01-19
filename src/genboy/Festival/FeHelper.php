<?php
/** Festival 3.0.0
 * src/genboy/Festival/FeHelper.php
 * copyright Genboy 2020
 */
declare(strict_types = 1);

namespace genboy\Festival;


class FeHelper {

    private $plugin;

    public function __construct(Festival $owner){

        $this->plugin = $owner;

        if(!is_dir($this->plugin->getDataFolder())){
            @mkdir($this->plugin->getDataFolder());
		}
        if( !is_dir($this->plugin->getDataFolder().'resources') ){
           @mkdir($this->plugin->getDataFolder().'resources'); // add resource folder for backwards compatibility
		}

    }


}

?>
