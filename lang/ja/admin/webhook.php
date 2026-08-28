<?php

return [
    'nav_title' => 'Webhook',
    'model_label' => 'Webhook',
    'model_label_plural' => 'Webhook',
    'endpoint' => 'エンドポイント',
    'description' => '説明',
    'no_webhooks' => 'Webhook がありません',
    'name' => '名前',
    'type' => 'タイプ',
    'server' => 'サーバー',
    'scope' => [
        'global' => 'グローバル',
        'server' => 'サーバー',
    ],
    'tabs' => [
        'global' => 'グローバル Webhook',
        'server' => 'サーバー Webhook',
    ],
    'information' => '情報',
    'payload' => 'ペイロード',
    'help' => 'ヘルプ',
    'help_text' => '変数名を {{ }} で囲んで使用します。例えば API から名前を取得したい場合は {{name}} を使用します。',
    'test_now' => '今すぐテスト',
    'test_now_help' => 'これにより `created: Server` イベントが発行されます',
    'table' => [
        'description' => '説明',
        'endpoint' => 'エンドポイント',
    ],
    'headers' => 'ヘッダー',
    'events' => 'イベント',
    'regular' => '通常',
    'reset_headers' => 'ヘッダーをリセット',
    'unavailable_type' => '利用できないタイプ',
    'unavailable_type_option' => ':type（利用不可）',
    'unavailable_type_text' => 'この Webhook は、インストールされていない、または有効ではないプラグインが提供する「:type」タイプを使用しています。保存されているペイロードで引き続き送信されますが、そのプラグインが再び利用可能になるまで編集できません。',
];
