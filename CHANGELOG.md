# Changelog

このファイルには各リリースの変更点を日本語でまとめます。

**運用ルール**: バージョンを上げてリリースする際は、`[未リリース]` セクションの
内容を `## [x.y.z] - YYYY-MM-DD` として確定し、先頭に新しい空の `[未リリース]`
セクションを追加してください。GitHub Actions のリリースワークフローはこの
ファイルから該当バージョンのセクションを抽出し、GitHub Release の本文として
そのまま使用します。

## [未リリース]

## [0.2.4] - 2026-08-17

### 修正

- 不要な試験用 Filament 翻訳ファイル（`lang/ja/vendor/filament-panels/auth/multi-factor/email/provider.php`）を削除
- README の Pelican Panel 参照 URL を `pelican-dev` から `pelican` organization へ更新
- Pelican Panel v1.0.0-beta38 対応（翻訳キー差分なし）

## [0.2.3] - 2026-08-14

### 追加

- Pelican Panel v1.0.0-beta37 以降のプラグインインポート検証・パスキー・SFTP 接続に関する日本語翻訳を追加

### 修正

- Pelican Panel 側で変更・削除された翻訳キーに追従

## [0.2.2] - 2026-08-10

### 追加

- Pelican Panel v1.0.0-beta36 以降のノード・サーバー・Webhook・バックアップ通知設定に関する日本語翻訳を追加

### 修正

- Pelican Panel 側で変更・削除された翻訳キーに追従

## [0.2.1] - 2026-07-15

### 追加

- Passkeys（パスキー）関連の日本語翻訳を追加
- `admin/backuphost.php` の翻訳を新規追加（upstream に存在しファイルが欠落していた）

### 修正

- `admin/dashboard.php` のウェルカムメッセージで `:app` プレースホルダーが失われていたのを修正
- `profile.php` にあったトップレベルの重複 `passkeys` キーを削除（正しくは `tabs` 配下のみ）

## [0.2.0] - 2026-06-23

### 追加

- Pelican Panel v1.0.0-beta35 に対応する未翻訳キーを追加
- `update.json` と GitHub Actions による自動リリースの仕組みを整備

## [0.1.0] - 2026-06-21

### 追加

- 日本語言語パックプラグインの初版を公開
