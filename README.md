# RandomJQMessage | RandomJoinQuitMessage
(PMMPプラグイン)プレイヤーがサーバーに入室・退室した時に表示されるメッセージをランダムに表示します。

# 使い方
1. [ここからダウンロードして下さい。](https://github.com/masatoshiko/RandomJQMessage/releases/download/v1.0/RandomJQMessage.phar)
2. `[PMMPフォルダ]/plugins`フォルダにダウンロードしたPharを突っ込みます。
3. サーバーを起動すると、プラグインによって`[PMMPフォルダ]/plugin_data/RandomJQMessage`フォルダ内に`joinmessages.txt`と`quitmessages.txt`が生成されます。
4. `[PMMPフォルダ]/plugin_data/RandomJQMessage`に移動し、`joinmessages.txt`と`quitmessages.txt`を編集して下さい。[こちらも御覧ください](#メッセージ編集)
5. 以上で完了です！サーバーに入って、実際に反映されているか確認しましょう！

# メッセージ編集
`joinmessages.txt`と`quitmessages.txt`は、1行に1つメッセージを追加できます。

他のプラグインのような、1つのメッセージのみを表示したい場合は、1行目のみにメッセージを追加して下さい。

複数メッセージを指定して、ランダムに表示したい場合は、1行毎に1つメッセージを追加して下さい。

Minecraftデフォルトのメッセージでいい場合は、txtファイルを空にして下さい。

## 特殊文字
- %player … この文字は、メッセージ表示時に*プレイヤー名に置き換えられます*。
- § … Minecraftの装飾がそのまま使用できます。

## 例
joinmessages.txt:
```txt
%playerが世界にやってきた。
§l%playerは仮想世界にやってきた。
```

quitmessages.txt:
```txt
%playerが世界を去った。
%playerは現実世界に引き戻された。
```
