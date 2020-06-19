# AdvancedJoinQuitMessage V1.1 (PMMPプラグイン)
プレイヤーがサーバーに入室・退室した時に表示されるメッセージをランダムに表示したり、日付を表示したりできます。

# 使い方
1. [ここからダウンロードして下さい。](https://github.com/masatoshiko/RandomJQMessage/releases/download/v1.0/RandomJQMessage.phar)
2. `[PMMPフォルダ]/plugins`フォルダにダウンロードしたPharを移動(またはコピー)して下さい。
3. サーバーを起動すると、プラグインによって`[PMMPフォルダ]/plugin_data/`フォルダ内に`joinmessages.txt`と`quitmessages.txt`が生成されます。
4. `[PMMPフォルダ]/plugin_data/AdvancedJoinQuitMessage`に移動し、`joinmessages.txt`と`quitmessages.txt`を編集しましょう。[こちらも御覧ください](#メッセージ編集)
5. 以上で完了です！サーバーに入って、実際に反映されているか確認しましょう！

# メッセージ編集
最初に生成されたtxtの中身は空です。入室、退室時のメッセージをカスタマイズするには、編集する必要があります。
joinmessages.txtとquitmessages.txtは、それぞれ1行に1つメッセージを追加できます。

joinmessages.txtは、プレイヤーがサーバーに入室した時に表示されるメッセージを設定できます。
quitmessages.txtは、プレイヤーがサーバーから退室した時に表示されるメッセージを設定できます。

参加した時に1つのメッセージのみを表示したい場合は、1行目のみにメッセージを追加して下さい。
複数メッセージを指定して、ランダムに表示したい場合は、1行毎に1つメッセージを追加して下さい。
Minecraftデフォルトのメッセージでいい場合は、txtファイルを空にして下さい。

## 特殊文字
[こちらを御覧ください。](https://github.com/masatoshiko/AdvancedJoinQuitMessage/blob/master/SPESIAL_CHARACTERS.md)

## 例
joinmessages.txt:
```txt
%playerが世界にやってきた。
%playerは仮想世界にやってきた。
```

quitmessages.txt:
```txt
%playerが世界を去った。
%playerは現実世界に引き戻された。
```
