<?php

namespace NoobMCBG\UGWE;

use pocketmine\player\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\math\Vector3;

class Main extends PluginBase {

	public function onEnable(): void {
		$this->saveDefaultCOnfig();
	}

	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		if($cmd->getName() == "/up"){
			    if(!$sender instanceof Player){
				$sender->sendMessage("§cUse Command in-game");
				return true;
			}
			if(isset($args[0])){
				if(!is_numeric($args[0])){
					$sender->sendMessage("§cUsage: //up <y>");
					return true;
				}
				$x = $sender->getPosition()->getX();
				$y = $sender->getPosition()->getY();
				$z = $sender->getPosition()->getZ();
				$world = $sender->getPosition()->getWorld();
				if($y + (int)$args[0] < 255){
					$sender->sendMessage("§cY coordinate should not be more than 255");
					return true;
				}
					$world->setblock(new Vector3($x, $y+$args[0], $z), BlockFactory::getInstace()->get($this->getConfig()->get("id-block"), $this->getConfig()->get("meta-block")));
			}else{
				$sender->sendMessage("§cUsage: //up <y>");
			}
		}
		return true;
	}
}
