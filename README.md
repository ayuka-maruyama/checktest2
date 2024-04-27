# FashionablyLate（お問い合わせフォーム）

## 環境構築
**Dockerビルド**<br>
1.`git clone git@github.com:coachtech-material/laravel-docker-template.git`<br>
2.Docker Desktopアプリを立ち上げる<br>
3.`docker-compose up -d --build`<br>
<br>
<br>
**Laravel環境構築**
1.`docker-compose ecex php bash`でPHPコンテナへログイン<br>
2.`composer install`<br>
3.「.env.example」ファイルを「.env」ファイルに命名を変更。新しく.envファイルを作成<br>
4.「.env」に以下の環境変数を追加<br>
`DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass`

## 使用技術（実行環境）

##ER図

## URL
- 開発環境:
- phpMyAdmin：
