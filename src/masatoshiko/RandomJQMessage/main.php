<?php
    namespace masatoshiko\RandomJQMessage;

    use pocketmine\Player;
    use pocketmine\Server;
    use pocketmine\plugin\PluginBase;
    use pocketmine\event\Listener;
    use pocketmine\event\player\PlayerJoinEvent;
    use pocketmine\event\player\PlayerQuitEvent;

    class Main extends PluginBase implements Listener  {

        public function onEnable() {
            $this->getServer()->getPluginManager()->registerEvents($this, $this);

            if(!file_exists($this->getDataFolder()))  mkdir($this->getDataFolder(), 0744, true);

            // ファイルチェック
            if (!file_exists(($this->getDataFolder()."joinmessages.txt"))){
                touch($this->getDataFolder()."joinmessages.txt");
                print("joinmessages.txtを生成しました。");
            }
            if (!file_exists(($this->getDataFolder()."quitmessages.txt"))){
                touch($this->getDataFolder()."quitmessages.txt");
                print("quitmessages.txtを生成しました。");
            }
        }
          
        public function onJoin(PlayerJoinEvent $event) {
            $player = $event->getPlayer();
            $name = $player->getName();
            // ファイル読み込み
            $joinarray = file($this->getDataFolder()."joinmessages.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            if (count($joinarray) == 0){
                array_push($joinarray, "§e%player が世界にやってきました");
            }

            $jm_number = mt_rand(1, count($joinarray)) - 1;
            $JoinMessage = str_replace("%player", $name, $joinarray[$jm_number]);
            $event->setJoinMessage($JoinMessage);
        }

        public function onQuit(PlayerQuitEvent $event) {
            $player = $event->getPlayer();
            $name = $player->getName();
            // ファイル読み込み
            $quitarray = file($this->getDataFolder()."quitmessages.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            if (count($quitarray) == 0){
                array_push($quitarray, "§e%player が世界を去りました");
            }

            $qm_number = mt_rand(1, count($quitarray)) - 1;
            $QuitMessage = str_replace("%player", $name, $quitarray[$qm_number]);
            $event->setQuitMessage($QuitMessage);
        }
    }
?>