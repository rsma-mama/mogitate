### 商品管理機能 タスクドキュメント

---

## 1. 概要

本ドキュメントは、商品管理機能（PG01〜PG06）を実装するためのタスクを一覧化し、管理しやすくするためのものです。  
各タスクは「ID / 種別 / 対象 / 内容 / 状態」を持ちます。状態は「未着手 / 進行中 / 完了」を想定しています。

---

## 2. 事前準備タスク

| ID | 種別 | 対象 | 内容 | 状態 |
| --- | --- | --- | --- | --- |
| setup-gitignore | 環境 | Git設定 | `docker/mysql/data` を `.gitignore` に追加し、DB実ファイルをGit管理対象外にする | 完了 |
| migration-products | DB | products | `products` テーブルのマイグレーション作成・実行 | 完了 |
| migration-seasons | DB | seasons | `seasons` テーブルのマイグレーション作成・実行 | 完了 |
| migration-product-season | DB | product_season | 中間テーブル `product_season` のマイグレーション作成・実行 | 完了 |
| model-product | モデル | Product | `Product` モデル作成と `seasons()` リレーション設定 | 完了 |
| model-season | モデル | Season | `Season` モデル作成と `products()` リレーション設定 | 完了 |
| seeder-seasons | データ | Season | `seasons` テーブルの初期データ Seeder 作成・実行（春・夏・秋・冬など） | 完了 |
| setup-image-storage | 環境 | 画像 | 画像保存設定（`php artisan storage:link` 等）と保存パスの方針決定 | 完了 |

---

## 3. 画面・機能別タスク

### 3.1 PG01 商品一覧 `/products`

| ID | 種別 | 対象 | 内容 | 状態 |
| --- | --- | --- | --- | --- |
| pg01-route | ルーティング | /products | 商品一覧画面のルート定義 | 未着手 |
| pg01-controller | コントローラ | ProductController@index | 商品一覧取得処理の実装（ページネーション含む） | 完了 |
| pg01-view | 画面 | 一覧Blade | 商品名・価格・画像サムネ・季節・詳細リンクを持つ一覧画面作成 | 完了 |

### 3.2 PG04 商品登録 `/products/register`

| ID | 種別 | 対象 | 内容 | 状態 |
| --- | --- | --- | --- | --- |
| pg04-route | ルーティング | /products/register | GET/POST のルート定義 | 完了 |
| pg04-form-view | 画面 | 登録フォーム | 商品名・価格・画像・説明・季節チェックボックスを持つフォーム作成 | 完了 |
| pg04-store | コントローラ | 登録処理 | バリデーション、画像アップロード、`product_season` 登録を行う登録処理実装 | 完了 |

### 3.3 PG02 商品詳細 `/products/detail/{productId}`

| ID | 種別 | 対象 | 内容 | 状態 |
| --- | --- | --- | --- | --- |
| pg02-route | ルーティング | /products/detail/{productId} | 商品詳細画面のルート定義 | 完了 |
| pg02-controller | コントローラ | ProductController@show | 単一商品の詳細取得処理実装 | 完了 |
| pg02-view | 画面 | 詳細表示 | 商品情報＋季節一覧を表示し、編集・削除リンクを配置 | 完了 |

### 3.4 PG03 商品更新 `/products/{productId}/update`

| ID | 種別 | 対象 | 内容 | 状態 |
| --- | --- | --- | --- | --- |
| pg03-route | ルーティング | /products/{productId}/update | GET（編集フォーム）と PATCH/POST（更新処理）のルート定義 | 完了 |
| pg03-form-view | 画面 | 編集フォーム | 既存値と季節の選択状態を反映した編集フォーム作成 | 完了 |
| pg03-update | コントローラ | 更新処理 | バリデーション、画像差し替え、中間テーブル再同期を含む更新処理実装 | 完了 |

### 3.5 PG05 検索 `/products/search`

| ID | 種別 | 対象 | 内容 | 状態 |
| --- | --- | --- | --- | --- |
| pg05-route | ルーティング | /products/search | 検索用ルート定義 | 未着手 |
| pg05-search-ui | 画面 | 検索フォーム | キーワード、季節（必要なら価格帯）入力UI作成 | 未着手 |
| pg05-search-logic | コントローラ | 検索処理 | 商品名部分一致・季節条件などを組み合わせた検索ロジック実装 | 未着手 |

### 3.6 PG06 削除 `/products/{productId}/delete`

| ID | 種別 | 対象 | 内容 | 状態 |
| --- | --- | --- | --- | --- |
| pg06-route | ルーティング | /products/{productId}/delete | DELETE相当のルート定義（POST＋`@method('DELETE')` など） | 未着手 |
| pg06-delete | コントローラ | 削除処理 | CSRF・確認ダイアログ・関連レコード削除を含む削除処理実装 | 未着手 |

---

## 4. 仕上げ・品質タスク

| ID | 種別 | 対象 | 内容 | 状態 |
| --- | --- | --- | --- | --- |
| validation-messages | バリデーション | 全画面 | バリデーションメッセージ・エラーメッセージの日本語対応 | 未着手 |
| error-handling | エラー処理 | 全画面 | 404/例外時の画面対応（存在しないIDアクセスなど） | 未着手 |
| common-layout | レイアウト | 共通 | ヘッダー、ナビ、フラッシュメッセージ枠など共通レイアウト整備 | 未着手 |
| integration-test | テスト | 全機能 | 登録→一覧→詳細→更新→検索→削除の一連の結合テスト | 未着手 |

