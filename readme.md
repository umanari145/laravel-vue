# laravel-vue

## Laravel+vue のアプリ

例
URL
laravel-vue.localを登録した場合

npm run watch-pollで自動反映+ブラウザ読み込み(ブラウザ自動読み込みに関して今はコメントアウト)

http://laravel-vue.local/以下は全対象になる

## legacyブランチ blade+vueのパターン

bladeとvueを共存させる場合

bladeのなかでvue変数を展開する場合は@{{city}}などと@をつける
{{prefs| json}}としてあげれば画面に表示させることができる


県→市区町村→字

コンポーネント化せずに素のJSにかく

メリット
- 読みこみ順番に気をつければ既存のjQueryが生きる
- コンパイル不要でデバッグが簡単

## masterブランチ 画面側は全てvueで

一覧画面 http://laravel-vue.local/#/ <br>
新規登録 http://laravel-vue.local/#/regist

## マイグレーション
テーブル作成
php artisan migrate

データ入力
php artisan db:seed


### APIテスト

#都道府県リスト
curl http://localhost:8080/api/getPref 

#千葉県の一覧リスト
curl http://localhost:8080/api/getCity?pref_cd=12

＃千葉県船橋市のリスト
curl http://localhost:8080/api/getTown?pref_cd=12&&city_cd=12204

#郵便番号での検索
curl http://localhost:8080/api/getAddress?zip=2740077