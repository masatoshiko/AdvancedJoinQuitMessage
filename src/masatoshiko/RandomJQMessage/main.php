<?php
    namespace masatoshiko\RandomJQMessage;

    use pocketmine\Player;
    use pocketmine\Server;
    use pocketmine\plugin\PluginBase;
    use pocketmine\event\Listener;
    use pocketmine\event\player\PlayerJoinEvent;
    use pocketmine\event\player\PlayerQuitEvent;
    use pocketmine\utils\Config;

    class Main extends PluginBase implements Listener  {

        public function onEnable() {
            $this->getServer()->getPluginManager()->registerEvents($this, $this);

            if(!file_exists($this->getDataFolder()))  mkdir($this->getDataFolder(), 0744, true);

            // ファイルチェック
            if (!file_exists(($this->getDataFolder()."config.yml"))){
                new Config($this->getDataFolder()."config.yml", Config::YAML, array(
                    "timezone" => "UTC",
                ));
            }

            if (!file_exists(($this->getDataFolder()."joinmessages.txt"))){
                touch($this->getDataFolder()."joinmessages.txt");
                print("[RandomJQMessage] joinmessages.txtを生成しました。\n");
            }
            
            if (!file_exists(($this->getDataFolder()."quitmessages.txt"))){
                touch($this->getDataFolder()."quitmessages.txt");
                print("[RandomJQMessage] quitmessages.txtを生成しました。\n");
            }
        }
          
        public function onJoin(PlayerJoinEvent $event) {
            $main = new Main();
            // ファイル読み込み
            $joinarray = file($this->getDataFolder()."joinmessages.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            if (count($joinarray) == 0){
                array_push($joinarray, "§e%player が世界にやってきました");
            }

            $jm_number = mt_rand(1, count($joinarray)) - 1;
            $JoinMessage = $main->MessageReplacer($joinarray[$jm_number]);
            $event->setJoinMessage($JoinMessage);
        }

        public function onQuit(PlayerQuitEvent $event) {
            $main = new Main();
            // ファイル読み込み
            $quitarray = file($this->getDataFolder()."quitmessages.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            if (count($quitarray) == 0){
                array_push($quitarray, "§e%player が世界を去りました");
            }

            $qm_number = mt_rand(1, count($quitarray)) - 1;
            $QuitMessage = $main->MessageReplacer($quitarray[$qm_number]);
            $event->setQuitMessage($QuitMessage);
        }

        public function MessageReplacer($string) {
            $main = new Main();
            $main->Timezone();
            
            $name = $player->getName();
            $year4 = date("Y");         //4桁の年 (例:2020)
            $year2 = date("y");         //2桁の年 (例:20)
            $month = date("m");         //先頭に0を付けた月 (例:10, 02)
            $month_nozero = date("n");  //先頭に0を付けない月 (例:10, 2)
            $day = date("d");           //先頭に0を付けた日 (例:01, 20)
            $day_nozero = date("D");    //先頭に0を付けない日 (例:1, 20)

            $hour24 = date("H");        //24時間形式の先頭に0を付けた時間 (例: 06, 23)
            $hour24_nozero = date("G"); //24時間形式の先頭に0を付けない時間 (例: 6, 23)
            $hour12 = date("h");        //12時間形式の先頭に0を付けた時間 (例: 06, 11)
            $hour12_nozero = date("g"); //12時間形式の先頭に0を付けない時間 (例: 6, 11)
            $minute = date("i");        //先頭に0を付ける分 (例: 03, 30)
            $second = date("s");        //先頭に0を付ける秒 (例: 03, 50)

            $string = str_replace("%yyyy", $string, $year4);
            $string = str_replace("%yy", $string, $year2);
            $string = str_replace("%mm", $string, $month);
            $string = str_replace("%m", $string, $month_nozero);
            $string = str_replace("%dd", $string, $day);
            $string = str_replace("%d", $string, $day_nozero);
            $string = str_replace("%hh24", $string, $hour24);
            $string = str_replace("%hh12", $string, $hour12);
            $string = str_replace("%h24", $string, $hour24_nozero);
            $string = str_replace("%h12", $string, $hour12_nozero);
            $string = str_replace("%mm", $string, $minute);
            $string = str_replace("%ss", $string, $second);
        }
        public function Timezone() {
            $config = new Config($this->getDataFolder()."config.yml", Config::YAML);
            $timezone = $config->get("timezone");

            if ($timezone == null){
                date_default_timezone_set("UTF");
            }

            switch ($timezone) {
                case 'Asia/Tokyo':
                    date_default_timezone_set("Asia/Tokyo");
                    break;
                
                case 'UTF':
                default:
                    date_default_timezone_set("UTF");
                    break;
            }


        }
    }
?>