<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["TITLE"] = 'Utilisateur Authentification';
        self::$trans["authentication"]["EMAIL"] = 'e-mail';
        self::$trans["authentication"]["LOGIN"] = 'login';
        self::$trans["authentication"]["PASSWORD"] = 'mot de passe';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'mot de passe / utilisateur non valide';

    // Terms of the menu pages
        self::$trans["menu"]["USERS_SERVICES"] = 'Services à la demande';
        self::$trans["menu"]["OLA"] = 'Bonjour';
        self::$trans["menu"]["LOGOUT"] = 'logout';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'Documents de mon profil';
        self::$trans["menu"]["MY_SHELF"] = 'Ma collection';
        self::$trans["menu"]["MY_LINKS"] = 'Mes liens';
        self::$trans["menu"]["MY_NEWS"] = 'Mon actualité';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'Vous avez oublié votre mot de passe?';
        self::$trans["menu"]["MY_DATA"] = 'modifier les données de l\'utilisateur';
        self::$trans["menu"]["MY_ALERTS"] = 'Mes alertes';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'Ma Collection';
        self::$trans["mydocuments"]["BY_DATE"] = 'par date';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Dossier Entrantes';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Ajouter un dossier';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'Mes dossiers';
        self::$trans["mydocuments"]["SHOW_BY"] = 'Afficher la liste par';
        self::$trans["mydocuments"]["DATE"] = 'Date';
        self::$trans["mydocuments"]["MY_RANK"] = 'Mon classement';
        self::$trans["mydocuments"]["MOVE_TO"] = 'déplacer à';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'texte intégral';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'supprimer de la collection';
        self::$trans["mydocuments"]["HOME"] = 'home';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'suivi de citations';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'accès contrôlé';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Non registres trouvée';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'Modifier un dossier';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'Supprimer le dossier';

    // Tems of directories pages
        self::$trans["directories"]["FOLDER_NAME"] = 'Nom du dossier';
        self::$trans["directories"]["EDIT_FOLDER"] = 'Modifier un dossier';
        self::$trans["directories"]["SAVE"] = 'créer';
        self::$trans["directories"]["CANCEL"] = 'Annuler';
        self::$trans["directories"]["REMOVE"] = 'supprimer';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'Supprimer le dossier';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Supprimer le contenu';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Déplacer le contenu vers un autre dossier';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Dossier Entrantes';

    // Tems of mylinks pages
        self::$trans["mylinks"]["HOME"] = 'home';
        self::$trans["mylinks"]["SHOW_BY"] = 'Afficher la liste par';
        self::$trans["mylinks"]["DATE"] = 'Date';
        self::$trans["mylinks"]["MY_RANK"] = 'Mon classement';
        self::$trans["mylinks"]["TOOLS"] = 'Outils';
        self::$trans["mylinks"]["ADD_LINK"] = 'Ajouter un lien';
        self::$trans["mylinks"]["MY_LINKS"] = 'Mes liens';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'supprimer le lien';
        self::$trans["mylinks"]["EDIT_LINK"] = 'modifier un lien';
        self::$trans["mylinks"]["HIDE_FROM_HOME"] = 'supprimer de la home';
        self::$trans["mylinks"]["SHOW_IN_HOME"] = 'publie dans la home';
        self::$trans["mylinks"]["LINK_TITLE"] = 'Titre';
        self::$trans["mylinks"]["LINK_URL"] = 'URL';
        self::$trans["mylinks"]["LINK_DESCRIPTION"] = 'Description';
        self::$trans["mylinks"]["LINK_IN_HOME"] = 'publie dans la home';
        self::$trans["mylinks"]["SAVE"] = 'Enregistrer';
        self::$trans["mylinks"]["CANCEL"] = 'Annuler';
        self::$trans["mylinks"]["MY_LINKS_NO_REGISTERS_FOUND"] = 'Non registres trouvée';

    // Tems of mylinks pages
        self::$trans["mynews"]["HOME"] = 'home';
        self::$trans["mynews"]["SHOW_BY"] = 'Afficher la liste par';
        self::$trans["mynews"]["DATE"] = 'Date';
        self::$trans["mynews"]["MY_RANK"] = 'Mon classement';
        self::$trans["mynews"]["TOOLS"] = 'Outils';
        self::$trans["mynews"]["ADD_NEWS"] = 'Ajouter un RSS Feed';
        self::$trans["mynews"]["MY_NEWS"] = 'My News';
        self::$trans["mynews"]["REMOVE_NEWS"] = 'supprimer les rss feed';
        self::$trans["mynews"]["EDIT_NEWS"] = 'modifier les rss feed';
        self::$trans["mynews"]["HIDE_FROM_HOME"] = 'supprimer de la home';
        self::$trans["mynews"]["SHOW_IN_HOME"] = 'publie dans la home';
        self::$trans["mynews"]["NEWS_TITLE"] = 'Titre';
        self::$trans["mynews"]["NEWS_URL"] = 'URL';
        self::$trans["mynews"]["NEWS_DESCRIPTION"] = 'Description';
        self::$trans["mynews"]["NEWS_IN_HOME"] = 'publie dans la home';
        self::$trans["mynews"]["SAVE"] = 'enregistrer';
        self::$trans["mynews"]["CANCEL"] = 'annuler';
        self::$trans["mynews"]["MY_NEWS_NO_REGISTERS_FOUND"] = 'Non registres trouvée';

    // Tems of myalerts pages
        self::$trans["myalerts"]["HOME"] = 'home';
        self::$trans["myalerts"]["TOOLS"] = 'Outils';
        self::$trans["myalerts"]["MY_ALERTS"] = 'Mes Alertes';
        self::$trans["myalerts"]["ACCESS_LIST"] = 'Statistiques d\'accès';
        self::$trans["myalerts"]["CITED_LIST"] = 'Citation';
        self::$trans["myalerts"]["REMOVE_ALERT"] = 'supprimer d\'alerte';
        self::$trans["myalerts"]["FULL_TEXT"] = 'texte intégral';
        self::$trans["myalerts"]["SHOW_ACCESS_LIST"] = 'Afficher les statistiques d\'accès';
        self::$trans["myalerts"]["SHOW_CITED_LIST"] = 'Afficher Citations';
        self::$trans["myalerts"]["SHOW_ALL"] = 'Afficher les deux';
        self::$trans["myalerts"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Non registres trouvée';
        self::$trans["myalerts"]["CITED_LIST_NO_REGISTERS_FOUND"] = 'Non registres trouvée';

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
