# mogitate（商品管理アプリ）

## アプリ概要
商品を登録・検索・更新・削除できる管理アプリです。

---

## 使用技術
- PHP 8.x
- Laravel 8.x
- MySQL
- HTML / CSS
- Blade

---

## 環境構築方法

① リポジトリをクローン
```
git clone （GitHubのURL）
```

② パッケージをインストール
```
composer install
```

③ .envファイルを作成
```
cp .env.example .env
```

④ アプリキー生成
```
php artisan key:generate
```

⑤ マイグレーション実行
```
php artisan migrate
```

⑥ ストレージリンク作成
```
php artisan storage:link
```

⑦ サーバー起動
```
php artisan serve
```

---

## URL

- 商品一覧: http://localhost/products
- 商品登録: http://localhost/products/register
- 商品検索: http://localhost/products/search

---

## ER図

- products
- seasons
- season_product（中間テーブル）

products と seasons は多対多の関係

![ER図] (<img width="903" height="697" alt="mogitate drawio" src="https://github.com/user-attachments/assets/d7b9d5af-9187-44e4-9134-5c54cc0707c0" />)



