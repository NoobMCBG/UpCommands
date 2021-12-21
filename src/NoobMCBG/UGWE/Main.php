<?php

namespace NoobMCBG\UGWE;

use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\math\Vector3;

class Main extends PluginBase {

	public function onEnable(): void {
		$this->saveDefaultCOnfig();
	}

	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		switch($cmd->getName()){
			case "/up":
			    if(!$sender instanceof Player){
			    	if(is_numeric($args[0])){
			    	    if(!isset($args[0])){
                            $sender->sendMessage("§cUsage: //up <y>");
                            return true;
                        }
				        $x = $sender->getX();
				        $y = $sender->getY();
				        $z = $sender->getZ();
				        $level = $sender->getLevel();
				        $level->setblock(new Vector3($x, $y+$args[0], $z), Block::get($this->getConfig()->get("id-block"), $this->getConfig()->get("meta-block")));
				    }else{
				    	$sender->sendMessage("§cUsage: //up <y>");
				    }
			    }else{
			    	$sender->sendMessage("Use Command in-game");
			    }
			break;
		}
		return true;
	}
}