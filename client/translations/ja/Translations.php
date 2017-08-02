<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["TITLE"] = 'ユーザー認証';
        self::$trans["authentication"]["EMAIL"] = 'メール';
        self::$trans["authentication"]["LOGIN"] = 'ログイン';
        self::$trans["authentication"]["PASSWORD"] = 'パスワード';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'パスワード/ユーザー\'が有効でない';

    // Terms of the menu pages
        self::$trans["menu"]["USERS_SERVICES"] = 'サービス要求に応じて';
        self::$trans["menu"]["OLA"] = 'こんにちは';
        self::$trans["menu"]["LOGOUT"] = 'ログアウト';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = '私のプロフィールのドキュメント';
        self::$trans["menu"]["MY_SHELF"] = 'マイコレクション';
        self::$trans["menu"]["MY_LINKS"] = 'マイリンク';
        self::$trans["menu"]["MY_NEWS"] = 'マイニュース';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'パスワードをお忘れですか';
        self::$trans["menu"]["MY_DATA"] = 'ユーザーのデータを編集する';
        self::$trans["menu"]["MY_ALERTS"] = 'マイ警告';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'マイコレクション';
        self::$trans["mydocuments"]["BY_DATE"] = '日付順';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = '受信フォルダ';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'フォルダの追加';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'マイフォルダ';
        self::$trans["mydocuments"]["SHOW_BY"] = '表示：リストで';
        self::$trans["mydocuments"]["DATE"] = '日付';
        self::$trans["mydocuments"]["MY_RANK"] = 'マイ\'ランキング';
        self::$trans["mydocuments"]["MOVE_TO"] = 'に移動する';
        self::$trans["mydocuments"]["FULL_TEXT"] = '全文';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'コレクションから削除';
        self::$trans["mydocuments"]["HOME"] = 'ホーム';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = '監視引用';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = '監視アクセス';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'いいえレジスタが見つかりました';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'フォルダを編集';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'フォルダを削除';

    // Tems of directories pages
        self::$trans["directories"]["FOLDER_NAME"] = 'フォルダ名';
        self::$trans["directories"]["EDIT_FOLDER"] = 'フォルダを編集';
        self::$trans["directories"]["SAVE"] = '作成';
        self::$trans["directories"]["CANCEL"] = 'キャンセル';
        self::$trans["directories"]["REMOVE"] = '取り外す';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'フォルダを削除';
        self::$trans["directories"]["REMOVE_CONTENT"] = '削除コンテンツ';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = '別のフォルダにコンテンツを移動する';
        self::$trans["directories"]["INCOMING_FOLDER"] = '受信フォルダ';

    // Tems of mylinks pages
        self::$trans["mylinks"]["HOME"] = 'ホーム';
        self::$trans["mylinks"]["SHOW_BY"] = '表示：リストで';
        self::$trans["mylinks"]["DATE"] = '日付';
        self::$trans["mylinks"]["MY_RANK"] = 'マイランキング';
        self::$trans["mylinks"]["TOOLS"] = 'ツール';
        self::$trans["mylinks"]["ADD_LINK"] = 'リンクを追加';
        self::$trans["mylinks"]["MY_LINKS"] = 'マイリンク';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'リンクを削除';
        self::$trans["mylinks"]["EDIT_LINK"] = '[編集]リンク';
        self::$trans["mylinks"]["HIDE_FROM_HOME"] = '自宅から削除';
        self::$trans["mylinks"]["SHOW_IN_HOME"] = '自宅で公開';
        self::$trans["mylinks"]["LINK_TITLE"] = 'タイトル';
        self::$trans["mylinks"]["LINK_URL"] = 'ホームページ';
        self::$trans["mylinks"]["LINK_DESCRIPTION"] = '説明';
        self::$trans["mylinks"]["LINK_IN_HOME"] = '自宅で公開';
        self::$trans["mylinks"]["SAVE"] = '保存する';
        self::$trans["mylinks"]["CANCEL"] = 'キャンセル';
        self::$trans["mylinks"]["MY_LINKS_NO_REGISTERS_FOUND"] = 'ないレジスタを発見';

    // Tems of mylinks pages
        self::$trans["mynews"]["HOME"] = 'ホーム';
        self::$trans["mynews"]["SHOW_BY"] = '表示：リストで';
        self::$trans["mynews"]["DATE"] = '日付';
        self::$trans["mynews"]["MY_RANK"] = 'マイランキング';
        self::$trans["mynews"]["TOOLS"] = 'ツール';
        self::$trans["mynews"]["ADD_NEWS"] = 'フィードに追加';
        self::$trans["mynews"]["MY_NEWS"] = 'マイニュース';
        self::$trans["mynews"]["REMOVE_NEWS"] = 'フィードを削除する';
        self::$trans["mynews"]["EDIT_NEWS"] = 'フィードを編集';
        self::$trans["mynews"]["HIDE_FROM_HOME"] = '自宅から削除';
        self::$trans["mynews"]["SHOW_IN_HOME"] = '自宅で公開';
        self::$trans["mynews"]["NEWS_TITLE"] = 'タイトル';
        self::$trans["mynews"]["NEWS_URL"] = 'ホームページ';
        self::$trans["mynews"]["NEWS_DESCRIPTION"] = '説明';
        self::$trans["mynews"]["NEWS_IN_HOME"] = '自宅で公開';
        self::$trans["mynews"]["SAVE"] = '保存する';
        self::$trans["mynews"]["CANCEL"] = 'キャンセル';
        self::$trans["mynews"]["MY_NEWS_NO_REGISTERS_FOUND"] = 'ないレジスタを発見';

    // Tems of myalerts pages
        self::$trans["myalerts"]["HOME"] = 'ホーム';
        self::$trans["myalerts"]["TOOLS"] = 'ツール';
        self::$trans["myalerts"]["MY_ALERTS"] = 'マイアラート';
        self::$trans["myalerts"]["ACCESS_LIST"] = 'アクセス統計';
        self::$trans["myalerts"]["CITED_LIST"] = '引用';
        self::$trans["myalerts"]["REMOVE_ALERT"] = 'アラートを削除する';
        self::$trans["myalerts"]["FULL_TEXT"] = '全文';
        self::$trans["myalerts"]["SHOW_ACCESS_LIST"] = 'アクセス統計を表示する';
        self::$trans["myalerts"]["SHOW_CITED_LIST"] = 'の引用を表示する';
        self::$trans["myalerts"]["SHOW_ALL"] = 'の両方を表示する';
        self::$trans["myalerts"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'ないレジスタを発見';
        self::$trans["myalerts"]["CITED_LIST_NO_REGISTERS_FOUND"] = 'ないレジスタを発見';

    // Terms of myprofiledocuments pages
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Meus Perfis';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'ver resultados em';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'remover perfil';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'editar perfil';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'Adicionar perfil';
        self::$trans["myalerts"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["myalerts"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
    }

/**
 * @param <type> $term
 * @return <type>
 */
    public function getTrans($page,$term){
        $output=self::$trans[$page][$term];
        if (trim($output) == ""){
            $output = "translate_".$term;
        }
        return $output;
    }
}

?>
