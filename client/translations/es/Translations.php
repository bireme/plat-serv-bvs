<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["TITLE"] = 'Autenticación de Usuários';
        self::$trans["authentication"]["NOREGISTRY"] = 'Registro de nuevos usuarios temporariamente no disponible';
        self::$trans["authentication"]["EMAIL"] = 'e-mail';
        self::$trans["authentication"]["HOME"] = 'home';
        self::$trans["authentication"]["LOGIN_FIELD"] = 'e-mail o login';
        self::$trans["authentication"]["LOGIN"] = 'login';
        self::$trans["authentication"]["PASSWORD"] = 'contraseña';
        self::$trans["authentication"]["PRESS_HERE"] = 'clique aqui';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'usuário ou contraseña inválidos';
        self::$trans["authentication"]["INVALID_LOGIN_MAIL"] = '
<div>Error en la autenticación</div>
<ol>
<li>Tente autenticarse con su "Login SciELO"</li>
<li>Use la función "olvidé la contraseña"</li>
<li>Crie una nueva cuenta</li>
<li>Pida por ayuda, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["INVALID_LOGIN_UNAME"] = '
<div>Error en la autenticación</div>
<ol>
<li>Tente autenticarse con su cuenta de e-mail</li>
<li>Use la función "olvidé la contraseña"</li>
<li>Crie una nueva cuenta</li>
<li>Pida por ayuda, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["BIREME_LOGIN_LDAP"] = 'utilize el usuário y contaseña de la red BIREME';
        self::$trans["authentication"]["FORGOT_MY_PASSWORD"] = 'olvidé la contraseña';
        self::$trans["authentication"]["REGISTRY"] = 'registrarse';
        self::$trans["authentication"]["HELPLOGINMESSAGE"] = 'A partir de agora, os serviços personalizados estão integrados por meio do passaporte de acesso das redes BVS e SciELO. O login SciELO é válido para essa autenticação. Saiba mais.';
        self::$trans["authentication"]["KNOWMORE"] = ' saiba mais';

    // Terms of the Request Authentication Page
        self::$trans["requestauth"]["LOGIN"] = 'login';
        self::$trans["requestauth"]["FOR_SERVICES"] = 'para servícios<br />personalizados';
        self::$trans["requestauth"]["NOREGISTRY"] = 'Registro de nuevos usuarios temporariamente no disponible';

    // Terms of the new password page
        self::$trans["new_pass"]["TITLE"] = 'Enviar contraseña por email';
        self::$trans["new_pass"]["LOGIN"] = 'login';
        self::$trans["new_pass"]["SUBMIT"] = 'enviar';
        self::$trans["new_pass"]["CANCEL"] = 'cancelar';

    // Terms of the menu pages
        self::$trans["menu"]["USERS_SERVICES"] = 'Servicios Personalizados';
        self::$trans["menu"]["OLA"] = 'Hola';
        self::$trans["menu"]["LOGOUT"] = 'salir';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'Documentos del perfil';
        self::$trans["menu"]["MY_SHELF"] = 'Mi colección';
        self::$trans["menu"]["MY_LINKS"] = 'Mis enlaces';
        self::$trans["menu"]["MY_NEWS"] = 'Mis notícias';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'olvidé la contraseña';
        self::$trans["menu"]["MY_DATA"] = 'mis datos';
        self::$trans["menu"]["MY_ALERTS"] = 'Mis alertas';

    // General Terms
        self::$trans["general"]["IDENTIFICATION"] = 'Biblioteca Virtual en Salud';
        self::$trans["general"]["LOGO"] = 'es/logobvs.gif';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'Mi Colección';
        self::$trans["mydocuments"]["BY_DATE"] = 'por Fecha';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Carpeta de Entrada';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Añadir Carpeta';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'Mis Carpetas';
        self::$trans["mydocuments"]["SHOW_BY"] = 'Ver la Lista por';
        self::$trans["mydocuments"]["DATE"] = 'Fecha';
        self::$trans["mydocuments"]["MY_RANK"] = 'Mi clasificación';
        self::$trans["mydocuments"]["MOVE"] = 'mover';
        self::$trans["mydocuments"]["MOVE_TO"] = 'mover para';
        self::$trans["mydocuments"]["MOVE_DOCUMENT_TO"] = 'mover para';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'texto completo';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'retirar de mi colección';
        self::$trans["mydocuments"]["HOME"] = 'home';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'citaciones monitoradas';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'acceso monitorado';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Ningún registro localizado';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'Editar Carpeta';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'Apagar Carpeta';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = 'Tornar público';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = 'Tornar privado';
        self::$trans["mydocuments"]["PAGE"] = 'Pagina';

    // Tems of directories pages
        self::$trans["directories"]["FOLDER_NAME"] = 'Nombre de la Carpeta';
        self::$trans["directories"]["EDIT_FOLDER"] = 'Editar Carpeta';
        self::$trans["directories"]["SAVE"] = 'crear';
        self::$trans["directories"]["CANCEL"] = 'cancelar';
        self::$trans["directories"]["REMOVE"] = 'apagar';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'Apagar Carpeta';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Apagar contenído';
        self::$trans["directories"]["MOVE"] = 'mover';
        self::$trans["directories"]["MOVE_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Mover contenído para otra carpeta';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Carpeta de Entrada';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operación realizada con succeso.';

    // Tems of mylinks pages
        self::$trans["mylinks"]["HOME"] = 'home';
        self::$trans["mylinks"]["SHOW_BY"] = 'Ver la Lista por';
        self::$trans["mylinks"]["DATE"] = 'Fecha';
        self::$trans["mylinks"]["MY_RANK"] = 'Mi clasificación';
        self::$trans["mylinks"]["TOOLS"] = 'Herramientas';
        self::$trans["mylinks"]["ADD_LINK"] = 'Añadir Enlace';
        self::$trans["mylinks"]["MY_LINKS"] = 'Mis Enlaces';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'remover enlace';
        self::$trans["mylinks"]["EDIT_LINK"] = 'editar enlace';
        self::$trans["mylinks"]["HIDE_FROM_HOME"] = 'remover de la home';
        self::$trans["mylinks"]["SHOW_IN_HOME"] = 'publicar en la home';
        self::$trans["mylinks"]["LINK_TITLE"] = 'Título';
        self::$trans["mylinks"]["LINK_URL"] = 'URL';
        self::$trans["mylinks"]["LINK_DESCRIPTION"] = 'Descripción';
        self::$trans["mylinks"]["LINK_IN_HOME"] = 'publicar en la home';
        self::$trans["mylinks"]["SAVE"] = 'grabar';
        self::$trans["mylinks"]["CANCEL"] = 'cancelar';
        self::$trans["mylinks"]["MY_LINKS_NO_REGISTERS_FOUND"] = 'Ningún registro localizado';
        self::$trans["mylinks"]["ADD_LINK_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["mylinks"]["PAGE"] = 'Pagina';

    // Tems of mylinks pages
        self::$trans["mynews"]["HOME"] = 'home';
        self::$trans["mynews"]["SHOW_BY"] = 'Ver la Lista por';
        self::$trans["mynews"]["DATE"] = 'Fecha';
        self::$trans["mynews"]["MY_RANK"] = 'Mi clasificación';
        self::$trans["mynews"]["TOOLS"] = 'Herramientas';
        self::$trans["mynews"]["ADD_NEWS"] = 'Añadir RSS Feed';
        self::$trans["mynews"]["MY_NEWS"] = 'Mis Notícias';
        self::$trans["mynews"]["REMOVE_NEWS"] = 'remover rss feed';
        self::$trans["mynews"]["EDIT_NEWS"] = 'editar rss feed';
        self::$trans["mynews"]["HIDE_FROM_HOME"] = 'remover de la home';
        self::$trans["mynews"]["SHOW_IN_HOME"] = 'publicar en la home';
        self::$trans["mynews"]["NEWS_TITLE"] = 'Título';
        self::$trans["mynews"]["NEWS_URL"] = 'URL';
        self::$trans["mynews"]["NEWS_DESCRIPTION"] = 'Descripción';
        self::$trans["mynews"]["NEWS_IN_HOME"] = 'publicar en la home';
        self::$trans["mynews"]["SAVE"] = 'grabar';
        self::$trans["mynews"]["CANCEL"] = 'cancelar';
        self::$trans["mynews"]["MY_NEWS_NO_REGISTERS_FOUND"] = 'Ningún registro localizado';
        self::$trans["mynews"]["ADD_news_SUCESS"] = 'Operación realizada com succeso.';
        self::$trans["mynews"]["PAGE"] = 'Pagina';

    // Tems of myalerts pages
        self::$trans["myalerts"]["HOME"] = 'home';
        self::$trans["myalerts"]["TOOLS"] = 'Herramientas';
        self::$trans["myalerts"]["MY_ALERTS"] = 'Mis Alertas';
        self::$trans["myalerts"]["ACCESS_LIST"] = 'Estadísticas de Acceso';
        self::$trans["myalerts"]["CITED_LIST"] = 'Citaciones';
        self::$trans["myalerts"]["REMOVE_ALERT"] = 'remover alerta';
        self::$trans["myalerts"]["FULL_TEXT"] = 'texto completo';
        self::$trans["myalerts"]["SHOW_ACCESS_LIST"] = 'Presentar Estatísticas de Acesso';
        self::$trans["myalerts"]["SHOW_CITED_LIST"] = 'Presentar Citações';
        self::$trans["myalerts"]["SHOW_ALL"] = 'Presentar Ambos';
        self::$trans["myalerts"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Ningún registro localizado';
        self::$trans["myalerts"]["CITED_LIST_NO_REGISTERS_FOUND"] = 'Ningún registro localizado';

    // Terms of myprofiledocuments pages
        self::$trans["myprofiledocuments"]["LILACS.orgiahx"] = 'Base de datos LILACS';
        self::$trans["myprofiledocuments"]["SciELO.orgiahx"] = 'Rede SciELO';
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Mis Perfiles';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'ver resultados em';
        self::$trans["myprofiledocuments"]["REMOVE_PROFIVE"] = 'remover perfil';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'editar perfil';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'Adicionar perfil';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Herramientas';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similares en';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Palabras del Perfil';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Perfis';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'remover perfil';
        self::$trans["myprofiledocuments"]["HOME"] = 'home';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Nombre del perfil';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Palavras des perfil';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'Las palabras deven ser escritas separadas por espacio.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Definir como padrón';
        self::$trans["myprofiledocuments"]["SAVE"] = 'salvar';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'cancelar';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Ningún registro encontrado';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Temporariamente sin servicio';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operación realizada con succeso.';

    // Terms of mig_id_confirmation pages
        self::$trans["mig_id_confirmation"]["TITLE"] = 'Confirmación de Login';
        self::$trans["mig_id_confirmation"]["LOGIN"] = 'Login';
        self::$trans["mig_id_confirmation"]["CONFIRM"] = 'Confirmar';
        self::$trans["mig_id_confirmation"]["ALERT"] = 'Después de la confirmación, utilice esta cuenta de email para acceder al portal SciELO y otras aplicaciones de la red.';
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
