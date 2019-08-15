# laravel-vue

## Laravel+vue のアプリ

例
URL
laravel-vue.localを登録した場合

住所一覧
県→市区町村→字の展開

npm run watch-pollで自動反映+ブラウザ読み込み
http://laravel-vue.local/以下は全対象になる

## デバッグ
bladeとvueを共存させる場合
bladeのなかでvue変数を展開する場合は@{{city}}などと@をつける
{{prefs| json}}としてあげれば画面に表示させることができる
=======
県→市区町村→字

コンポーネント化せずに素のJSにかく

メリット
- 読みこみ順番に気をつければ既存のjQueryが生きる
- コンパイル不要でデバッグが簡単
