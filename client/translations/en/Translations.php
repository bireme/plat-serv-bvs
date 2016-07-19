<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["TITLE"] = 'User Authentication';
        self::$trans["authentication"]["NOREGISTRY"] = 'New users registry, temporary unavailable';
        self::$trans["authentication"]["EMAIL"] = 'e-mail';
        self::$trans["authentication"]["HOME"] = 'home';
        self::$trans["authentication"]["LOGIN_FIELD"] = 'e-mail or login';
        self::$trans["authentication"]["LOGIN"] = 'login';
        self::$trans["authentication"]["PASSWORD"] = 'password';
        self::$trans["authentication"]["PRESS_HERE"] = 'click here';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'password/user not valid';
        self::$trans["authentication"]["INVALID_LOGIN_MAIL"] = '
<div>Authentication Failure</div>
<ol>
<li>Try to authenticate with your "SciELO login"</li>
<li>Use "remember password" function</li>
<li>Create a new account</li>
<li>Ask for help, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["INVALID_LOGIN_UNAME"] = '
<div>Authentication Failure</div>
<ol>
<li>Try to authenticate with your e-mail</li>
<li>Use "remember password" function</li>
<li>Create a new account </li>
<li>Ask for help, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["BIREME_LOGIN_LDAP"] = 'Use the user and password from BIREME network';
        self::$trans["authentication"]["FORGOT_MY_PASSWORD"] = 'forget my password';
        self::$trans["authentication"]["REGISTRY"] = 'registry';
        self::$trans["authentication"]["HELPLOGINMESSAGE"] = 'From now, personalized services are integrated through the passport to access the VHL and SciELO network. The SciELO login is valid for this authentication.';
        self::$trans["authentication"]["KNOWMORE"] = 'Learn more';

    // Terms of the Request Authentication Page
        self::$trans["requestauth"]["LOGIN"] = 'login';
        self::$trans["requestauth"]["FOR_SERVICES"] = 'for services<br />on demand';
        self::$trans["requestauth"]["NOREGISTRY"] = 'New users registry, temporary unavailable';

    // Terms of the new password page
        self::$trans["new_pass"]["TITLE"] = 'Send password by email';
        self::$trans["new_pass"]["LOGIN"] = 'login';
        self::$trans["new_pass"]["SUBMIT"] = 'send';
        self::$trans["new_pass"]["CANCEL"] = 'cancel';

    // Terms of the menu pages
        self::$trans["menu"]["USERS_SERVICES"] = 'Services on demand';
        self::$trans["menu"]["OLA"] = 'Hello';
        self::$trans["menu"]["LOGOUT"] = 'logout';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'Documents of my profile';
        self::$trans["menu"]["MY_SHELF"] = 'My collection';
        self::$trans["menu"]["MY_LINKS"] = 'My links';
        self::$trans["menu"]["MY_NEWS"] = 'My news';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'forgot your password?';
        self::$trans["menu"]["MY_DATA"] = 'edit user data ';
        self::$trans["menu"]["MY_ALERTS"] = 'My alerts';

    // General Terms
        self::$trans["general"]["IDENTIFICATION"] = 'Virtual Health Library';
        self::$trans["general"]["LOGO"] = 'en/logobvs.gif';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'My Collection';
        self::$trans["mydocuments"]["BY_DATE"] = 'by Date';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Incoming Folder';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Add Folder';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'My Folders';
        self::$trans["mydocuments"]["SHOW_BY"] = 'View List by';
        self::$trans["mydocuments"]["DATE"] = 'Date';
        self::$trans["mydocuments"]["MY_RANK"] = 'My ranking';
        self::$trans["mydocuments"]["MOVE"] = 'move';
        self::$trans["mydocuments"]["MOVE_TO"] = 'move to';
        self::$trans["mydocuments"]["MOVE_DOCUMENT_TO"] = 'move to';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'full text';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'remove from collection';
        self::$trans["mydocuments"]["HOME"] = 'home';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'monitored citations';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'monitored access';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'Edit Folder';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'Remove Folder';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = 'Make public';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = 'Make folder private';
        self::$trans["mydocuments"]["PAGE"] = 'Page';

    // Tems of directories pages
        self::$trans["directories"]["FOLDER_NAME"] = 'Folder Name';
        self::$trans["directories"]["EDIT_FOLDER"] = 'Edit Folder';
        self::$trans["directories"]["SAVE"] = 'create';
        self::$trans["directories"]["CANCEL"] = 'cancel';
        self::$trans["directories"]["REMOVE"] = 'remove';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'Remove Folder';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Remove content';
        self::$trans["directories"]["MOVE"] = 'move';
        self::$trans["directories"]["MOVE_TO"] = 'move to';
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'move to';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Move content to another folder';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Incoming Folder';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operation success.';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operation success.';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operation success.';

    // Tems of mylinks pages
        self::$trans["mylinks"]["HOME"] = 'home';
        self::$trans["mylinks"]["SHOW_BY"] = 'View List by';
        self::$trans["mylinks"]["DATE"] = 'Date';
        self::$trans["mylinks"]["MY_RANK"] = 'My ranking';
        self::$trans["mylinks"]["TOOLS"] = 'Tools';
        self::$trans["mylinks"]["ADD_LINK"] = 'Add Link';
        self::$trans["mylinks"]["MY_LINKS"] = 'My Links';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'remove link';
        self::$trans["mylinks"]["EDIT_LINK"] = 'edit link';
        self::$trans["mylinks"]["HIDE_FROM_HOME"] = 'remove from home';
        self::$trans["mylinks"]["SHOW_IN_HOME"] = 'publish in home';
        self::$trans["mylinks"]["LINK_TITLE"] = 'Title';
        self::$trans["mylinks"]["LINK_URL"] = 'URL';
        self::$trans["mylinks"]["LINK_DESCRIPTION"] = 'Description';
        self::$trans["mylinks"]["LINK_IN_HOME"] = 'publish in home';
        self::$trans["mylinks"]["SAVE"] = 'save';
        self::$trans["mylinks"]["CANCEL"] = 'cancel';
        self::$trans["mylinks"]["MY_LINKS_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["mylinks"]["ADD_LINK_SUCESS"] = 'Operation success.';
        self::$trans["mylinks"]["PAGE"] = 'Page';

    // Tems of mylinks pages
        self::$trans["mynews"]["HOME"] = 'home';
        self::$trans["mynews"]["SHOW_BY"] = 'View List by';
        self::$trans["mynews"]["DATE"] = 'Date';
        self::$trans["mynews"]["MY_RANK"] = 'My ranking';
        self::$trans["mynews"]["TOOLS"] = 'Tools';
        self::$trans["mynews"]["ADD_NEWS"] = 'Add RSS Feed';
        self::$trans["mynews"]["MY_NEWS"] = 'My News';
        self::$trans["mynews"]["REMOVE_NEWS"] = 'remove rss feed';
        self::$trans["mynews"]["EDIT_NEWS"] = 'edit rss feed';
        self::$trans["mynews"]["HIDE_FROM_HOME"] = 'remove from home';
        self::$trans["mynews"]["SHOW_IN_HOME"] = 'publish in home';
        self::$trans["mynews"]["NEWS_TITLE"] = 'Title';
        self::$trans["mynews"]["NEWS_URL"] = 'URL';
        self::$trans["mynews"]["NEWS_DESCRIPTION"] = 'Description';
        self::$trans["mynews"]["NEWS_IN_HOME"] = 'publish in home';
        self::$trans["mynews"]["SAVE"] = 'save';
        self::$trans["mynews"]["CANCEL"] = 'cancel';
        self::$trans["mynews"]["MY_NEWS_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["mynews"]["ADD_news_SUCESS"] = 'Operation success.';
        self::$trans["mynews"]["PAGE"] = 'Page';

    // Tems of myalerts pages
        self::$trans["myalerts"]["HOME"] = 'home';
        self::$trans["myalerts"]["TOOLS"] = 'Tools';
        self::$trans["myalerts"]["MY_ALERTS"] = 'My Alerts';
        self::$trans["myalerts"]["ACCESS_LIST"] = 'Access Statistics';
        self::$trans["myalerts"]["CITED_LIST"] = 'Citation';
        self::$trans["myalerts"]["REMOVE_ALERT"] = 'remove alert';
        self::$trans["myalerts"]["FULL_TEXT"] = 'full text';
        self::$trans["myalerts"]["SHOW_ACCESS_LIST"] = 'Show Access Statistics';
        self::$trans["myalerts"]["SHOW_CITED_LIST"] = 'Show Citations';
        self::$trans["myalerts"]["SHOW_ALL"] = 'Show Both';
        self::$trans["myalerts"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["myalerts"]["CITED_LIST_NO_REGISTERS_FOUND"] = 'No registers found';

    // Terms of myprofiledocuments pages
        self::$trans["myprofiledocuments"]["LILACS.orgiahx"] = 'LILACS Database';
        self::$trans["myprofiledocuments"]["SciELO.orgiahx"] = 'SciELO Network';
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'My Profiles';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'view results in';
        self::$trans["myprofiledocuments"]["REMOVE_PROFIVE"] = 'remove profile';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'edit profile';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'Add profile';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Tools';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similars in';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Profile keywords';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Profiles';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'remove profile';
        self::$trans["myprofiledocuments"]["HOME"] = 'home';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Profile Name';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Keywords';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'The words must be written between spaces.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Define as default';
        self::$trans["myprofiledocuments"]["SAVE"] = 'save';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'cancel';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Service temporary unavailable';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operation success.';

    // Terms of mig_id_confirmation pages
        self::$trans["mig_id_confirmation"]["TITLE"] = 'Login Confirmation';
        self::$trans["mig_id_confirmation"]["LOGIN"] = 'Login';
        self::$trans["mig_id_confirmation"]["CONFIRM"] = 'Confirm';
        self::$trans["mig_id_confirmation"]["ALERT"] = 'After confirmation, use this email account to access the SciELO portal and other applications of the Network.';
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
