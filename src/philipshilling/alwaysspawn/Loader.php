<?php
	namespace philipshilling\alwaysspawn;
	
	use pocketmine\level\Position;
    use pocketmine\plugin\PluginBase as Plugin;
	use pocketmine\event\Listener;
	use pocketmine\event\player\PlayerLoginEvent;
				
	class Loader extends Plugin implements Listener {
		public function onEnable() {
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
			$this->getServer()->getLogger()->info("AlwaysSpawn Enabled!");
		}
		
		public function onPlayerLogin(PlayerLoginEvent $event) {
			$player = $event->getPlayer();
			$x = $this->getServer()->getDefaultLevel()->getSafeSpawn()->getX();
			$y = $this->getServer()->getDefaultLevel()->getSafeSpawn()-> getY();
			$z = $this->getServer()->getDefaultLevel()->getSafeSpawn()->getZ();
			$level = $this->getServer()->getDefaultLevel();
			$player->setLevel($level);
			$player->teleport(new Position($x, $y, $z, $level));
		}

	}