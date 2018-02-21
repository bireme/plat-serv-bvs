<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["MY_VHL"] = 'Mi BVS';
        self::$trans["authentication"]["MY_VHL_SUMMARY"] = '
<p>Mi BVS es un servicio gratuito que guarda informaciones y preferencias del usuario para ofrecer servicios personalizados tales como:</p>
<ul>
    <li>Creación de colecciones de documentos seleccionados de la BVS</li>
    <li>Definición de temas de interés para recibir alertas de nuevos documentos</li>
    <li>Publicaciones del usuario recuperadas por ORCID</li>
    <li>Histórico de búsquedas realizadas en la BVS</li>
    <li>Lista de links favoritos</li>
</ul>
<p>Mi BVS está disponible a cualquier usuario a través de su cuenta Facebook, Google, BIREME Account o del propio servicio Mi BVS. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg">¡Conozca más!</a></p>
';
        self::$trans["authentication"]["MY_VHL_DESCRIPTION"] = '
<p>Mi BVS es un servicio gratuito que guarda informaciones y preferencias del usuario para ofrecer servicios personalizados y facilidades tales como:</p>
<ul>
    <li>Creación de colecciones de documentos a partir del resultado de búsquedas procesadas en las bases de datos de la BVS.</li>
    <li>Documentos recuperados en las bases de datos de la BVS a partir de palabras-claves indicadas en los Temas de Interés.</li>
    <li>Publicaciones de autoria del usuario recuperadas en varias fuentes considerando el número ORCID informado en el Perfil del usuario.</li>
    <li>Histórico de búsquedas realizadas en la BVS desde que el usuario se inscribió en el servicio.</li>
    <li>Lista de links favoritos indicados por el usuario que posibilita el acceso rápido y directo a sitios de su interés.</li>
</ul>
<p>Mi BVS está disponible a cualquier usuario a través de su cuenta Facebook, Google, BIREME Account o del propio servicio Mi BVS.</p>
<p>BIREME Account es un sistema de gestión de cuentas de usuarios de los centros cooperantes de la Red BIREME que acceden al sistema FI-Admin y otros. Esta misma cuenta de usuario está habilitada para el servicio Mi BVS.</p>
<p>Si el usuario prefiere una cuenta propia para el Servicio Mi BVS es necesario hacer su registro gratuitamente como usuario, y además aceptar a los términos de uso y política de privacidad.</p>
';
        self::$trans["authentication"]["NOTICE"] = '¿Es nuevo por aquí?';
        self::$trans["authentication"]["BUTTON_CLOSE"] = 'Cerrar';
        self::$trans["authentication"]["RECOVER_ACCOUNTS"] = 'Si Usted es un Centro Cooperante de la Red BIREME y tiene cuenta BIREME Accounts, pero se olvidó su contraseña...';
        self::$trans["authentication"]["RECOVER_ACCOUNTS_LINK"] = 'Recuperar su contraseña';
        self::$trans["authentication"]["RECOVER_PASSWORD"] = 'Si Usted es un usuario ya registrado del servicio Mi BVS, pero se olvidó su contraseña...';
        self::$trans["authentication"]["RECOVER_PASSWORD_LINK"] = 'Recuperar su contraseña';
        self::$trans["authentication"]["TITLE"] = 'Autenticación de Usuários';
        self::$trans["authentication"]["NOREGISTRY"] = 'Registro de nuevos usuarios temporariamente no disponible';
        self::$trans["authentication"]["EMAIL"] = 'e-mail';
        self::$trans["authentication"]["HOME"] = 'home';
        self::$trans["authentication"]["LOGIN_FIELD"] = 'e-mail o login';
        self::$trans["authentication"]["LOGIN"] = 'Entrar';
        self::$trans["authentication"]["USER"] = 'usuario';
        self::$trans["authentication"]["PASSWORD"] = 'contraseña';
        self::$trans["authentication"]["PRESS_HERE"] = 'clic aquí';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'usuário o contraseña inválidos';
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
        self::$trans["authentication"]["BIREME_LOGIN_LDAP"] = 'utilize el usuário y contraseña de la red BIREME';
        self::$trans["authentication"]["FORGOT_MY_PASSWORD"] = '¿Olvidé la contraseña?';
        self::$trans["authentication"]["REGISTRY"] = 'Registrarse';
        self::$trans["authentication"]["HELPLOGINMESSAGE"] = '';
        self::$trans["authentication"]["KNOWMORE"] = 'sepa más';
        self::$trans["authentication"]["ACCESS_DENIED"] = 'acceso denegado';
        self::$trans["authentication"]["OR"] = 'o';
        self::$trans["authentication"]["LOGIN_WITH"] = 'entrar con';
        self::$trans["authentication"]["LOGIN_MESSAGE"] = 'Iniciar sesión en Mi BVS';
        self::$trans["authentication"]["LOGIN_ACCESS_MESSAGE"] = 'Acceda directamente a Mi BVS';

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
        self::$trans["menu"]["FEATURE"] = 'Visão Geral';
        self::$trans["menu"]["MY_VHL"] = 'Mi BVS';
        self::$trans["menu"]["SERVPLAT"] = 'Plataforma de Servicios';
        self::$trans["menu"]["COLLAPSE_MENU"] = 'Retraer Menú';
        self::$trans["menu"]["DASHBOARD"] = 'Mis Contenidos';
        self::$trans["menu"]["HOME"] = 'Visión General';
        self::$trans["menu"]["WELCOME"] = 'Bienvenido';
        self::$trans["menu"]["USERS_SERVICES"] = 'Servicios Personalizados';
        self::$trans["menu"]["OLA"] = 'Hola';
        self::$trans["menu"]["LOGOUT"] = 'Salir';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'Temas de Interés';
        self::$trans["menu"]["MY_SHELF"] = 'Documentos Favoritos';
        self::$trans["menu"]["MY_LINKS"] = 'Enlaces Favoritos';
        self::$trans["menu"]["MY_NEWS"] = 'Mis Noticias';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'olvidé mi contraseña';
        self::$trans["menu"]["CHANGE_PASSWORD"] = 'Cambiar contraseña';
        self::$trans["menu"]["MY_DATA"] = 'Editar Perfil';
        self::$trans["menu"]["MY_ALERTS"] = 'Mis Alertas';
        self::$trans["menu"]["SEARCH"] = 'Buscar';
        self::$trans["menu"]["SEARCH_FOR"] = 'Buscar en la BVS por...';
        self::$trans["menu"]["MY_SEARCHES"] = 'Historial de Búsquedas en BVS';
        self::$trans["menu"]["KEYWORDS"] = 'Palabras clave';
        self::$trans["menu"]["SUGGESTED_DOCS"] = 'Similares';
        self::$trans["menu"]["ORCID_WORKS"] = 'Mis Publicaciones';
        self::$trans["menu"]["RECENT_ACTIVITIES"] = 'Actividades Recientes';
        self::$trans["menu"]["SEE_ALL_DOCS"] = 'Ver todos los documentos';
        self::$trans["menu"]["SEE_ALL_LINKS"] = 'Ver todos los enlaces';
        self::$trans["menu"]["SEE_ALL_PROFILES"] = 'Ver todos los temas';
        self::$trans["menu"]["ADD_COLLECTION"] = 'Colección añadida';
        self::$trans["menu"]["UPDATE_COLLECTION"] = 'Colección actualizada';
        self::$trans["menu"]["REMOVE_COLLECTION"] = 'Colección removida';
        self::$trans["menu"]["ADD_PROFILE"] = 'Tema añadido';
        self::$trans["menu"]["UPDATE_PROFILE"] = 'Tema actualizado';
        self::$trans["menu"]["REMOVE_PROFILE"] = 'Tema removido';
        self::$trans["menu"]["ADD_LINK"] = 'Enlace añadido';
        self::$trans["menu"]["UPDATE_LINK"] = 'Enlace actualizado';
        self::$trans["menu"]["REMOVE_LINK"] = 'Enlace removido';
        self::$trans["menu"]["ADD_RSS"] = 'RSS añadido';
        self::$trans["menu"]["UPDATE_RSS"] = 'RSS actualizado';
        self::$trans["menu"]["REMOVE_RSS"] = 'RSS removido';
        self::$trans["menu"]["QUERY"] = 'Consulta';
        self::$trans["menu"]["VIEW"] = 'Mostrar';
        self::$trans["menu"]["RSS"] = 'RSS';
        self::$trans["menu"]["SEARCH_WIDGET"] = 'Búsquedas en la BVS';
        self::$trans["menu"]["PROFILE_WIDGET"] = 'Temas de Interés';
        self::$trans["menu"]["SHELF_WIDGET"] = 'Documentos Favoritos';
        self::$trans["menu"]["START_TOUR"] = 'Iniciar Tour';
        self::$trans["menu"]["NEXT_PAGE"] = '<span>Siguiente</span> <span>funcionalidad</span>';
        self::$trans["menu"]["BACK"] = '&larr; Volver';
        self::$trans["menu"]["NEXT"] = 'Siguiente &rarr;';
        self::$trans["menu"]["SKIP"] = 'Omitir';
        self::$trans["menu"]["DONE"] = 'Concluir';
        self::$trans["menu"]["LEAVE_COMMENT"] = 'Enviar Comentario';
        self::$trans["menu"]["REPORT_ERROR"] = 'Informar Error';
        self::$trans["menu"]["FOOTER_MESSAGE"] = '
<p><strong>BIREME - OPS - OMS</strong><br/>
Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud<br />
Area de Gestión del Conocimiento, Bioética e Investigación - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Mi BVS">http://www.paho.org/bireme</a><br /></p>
';

    // Terms of searchresults pages
        self::$trans["searchresults"]["FEATURE"] = 'RSS';
        self::$trans["searchresults"]["RSS"] = 'RSS';
        self::$trans["searchresults"]["ADD_RSS"] = 'añadir RSS';
        self::$trans["searchresults"]["EDIT_RSS"] = 'editar RSS';
        self::$trans["searchresults"]["REMOVE_RSS"] = 'borrar RSS';
        self::$trans["searchresults"]["PREVIOUS"] = 'Anterior';
        self::$trans["searchresults"]["NEXT"] = 'Siguiente';
        self::$trans["searchresults"]["ADD_RSS_SUCCESS"] = 'Operación realizada con succeso.';
        self::$trans["searchresults"]["ADD_RSS_ERROR"] = 'Error al añadir RSS';
        self::$trans["searchresults"]["RSS_NOT_FOUND"] = 'Ninguna RSS localizado';
        self::$trans["searchresults"]["RSS_NO_REGISTERS_FOUND"] = 'Ningún registro localizado';
        self::$trans["searchresults"]["INCOMING_FOLDER"] = 'Caja de Entrada';
        self::$trans["searchresults"]["ADD_COLLECTION"] = 'añadir a favoritos';
        self::$trans["searchresults"]["TITLE"] = 'Título';
        self::$trans["searchresults"]["URL"] = 'URL';
        self::$trans["searchresults"]["SAVE"] = 'guardar';
        self::$trans["searchresults"]["CANCEL"] = 'cancelar';

    // Terms of mysearches pages
        self::$trans["mysearches"]["FEATURE"] = 'Histórico de Buscas na BVS';
        self::$trans["mysearches"]["MY_SEARCHES"] = 'Historial de búsquedas en BVS';
        self::$trans["mysearches"]["PAGE"] = 'Página';
        self::$trans["mysearches"]["MY_SEARCHES_NO_REGISTERS_FOUND"] = 'No se encontraron registros';
        self::$trans["mysearches"]["NEXT"] = 'Siguiente';
        self::$trans["mysearches"]["PREVIOUS"] = 'Anterior';
        self::$trans["mysearches"]["QUERY"] = 'Consulta';
        self::$trans["mysearches"]["FILTERS"] = 'Filtros';
        self::$trans["mysearches"]["ACTIONS"] = 'Acciones';
        self::$trans["mysearches"]["VIEW"] = 'Mostrar';
        self::$trans["mysearches"]["COMBINE"] = 'Combinar';
        self::$trans["mysearches"]["REMOVE"] = 'Borrar';
        self::$trans["mysearches"]["ORIGIN_SITE"] = 'Sitio web de origen';
        self::$trans["mysearches"]["BRASIL"] = 'BVS Brasil';

    // Terms of suggesteddocs pages
        self::$trans["suggesteddocs"]["FEATURE"] = 'Similares';
        self::$trans["suggesteddocs"]["PAGE"] = 'Página';
        self::$trans["suggesteddocs"]["NEXT"] = 'Siguiente';
        self::$trans["suggesteddocs"]["PREVIOUS"] = 'Anterior';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS"] = 'Similares';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS_NO_REGISTERS_FOUND"] = 'Ninguna sugerencia de documentos';
        self::$trans["suggesteddocs"]["REFERENCE"] = 'Seleccione los documentos de referencia para sugerencias:';
        self::$trans["suggesteddocs"]["NO_REFERENCES"] = 'Ningún documento encontrado con esta referencia';
        self::$trans["suggesteddocs"]["ADD_COLLECTION"] = 'Añadir a favoritos';
        self::$trans["suggesteddocs"]["CONFIG"] = 'Configuraciones';
        self::$trans["suggesteddocs"]["DOCS"] = 'Documentos';
        self::$trans["suggesteddocs"]["DOCS_SOURCE"] = 'Origen de los documentos';
        self::$trans["suggesteddocs"]["ORCID"] = 'Mis Publicaciones';
        self::$trans["suggesteddocs"]["COLLECTIONS"] = 'Documentos Favoritos';
        self::$trans["suggesteddocs"]["PROFILES"] = 'Temas de Interés';
        self::$trans["suggesteddocs"]["INCOMING_FOLDER"] = 'Bandeja de Entrada';
        self::$trans["suggesteddocs"]["FOLDERS_LIST"] = 'Seleccione un tema:';
        self::$trans["suggesteddocs"]["PROFILES_LIST"] = 'Seleccione un tema:';
        self::$trans["suggesteddocs"]["LOADING"] = 'Cargando...';
        self::$trans["suggesteddocs"]["SELECTED_DOCS"] = 'Documentos seleccionados';
        self::$trans["suggesteddocs"]["SEND"] = 'Enviar';
        self::$trans["suggesteddocs"]["RELATED_DOCS"] = 'similares';
        self::$trans["suggesteddocs"]["VHL_RELATED_DOCS"] = 'similares en la BVS';
        self::$trans["suggesteddocs"]["RELATED_DOCS_ALERT"] = 'Ningún documento relacionado';

    // Terms of orcidworks pages
        self::$trans["orcidworks"]["FEATURE"] = 'Minhas Publicações';
        self::$trans["orcidworks"]["PAGE"] = 'Página';
        self::$trans["orcidworks"]["NEXT"] = 'Siguiente';
        self::$trans["orcidworks"]["PREVIOUS"] = 'Anterior';
        self::$trans["orcidworks"]["ORCID_WORKS"] = 'Mis Publicaciones';
        self::$trans["orcidworks"]["ORCID_WORKS_NO_REGISTERS_FOUND"] = 'No se ha encontrado ninguna publicación. Para ver sus publicaciones, por favor informe el ORCID ID en su Perfil.';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR"] = 'ver en Google Scholar';

    // General Terms
        self::$trans["general"]["IDENTIFICATION"] = 'Biblioteca Virtual en Salud';
        self::$trans["general"]["LOGO"] = 'es/logobvs.gif';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["FEATURE"] = 'Documentos Favoritos';
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'Documentos Favoritos';
        self::$trans["mydocuments"]["BY_DATE"] = 'por Fecha';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Caja de Entrada';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Añadir Colección';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'Mis Colecciones';
        self::$trans["mydocuments"]["SHOW_BY"] = 'Ver la Lista por';
        self::$trans["mydocuments"]["DATE"] = 'Fecha';
        self::$trans["mydocuments"]["MY_RANK"] = 'Mi clasificación';
        self::$trans["mydocuments"]["MOVE"] = 'mover';
        self::$trans["mydocuments"]["MOVE_TO"] = 'mover para';
        self::$trans["mydocuments"]["MOVE_DOCUMENT_TO"] = 'mover para';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'texto completo';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'borrar';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'citaciones monitoradas';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'acceso monitorado';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Ningún registro localizado';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'editar colección';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'borrar colección';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = 'Hacer público';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = 'Hacer privado';
        self::$trans["mydocuments"]["PAGE"] = 'Pagina';
        self::$trans["mydocuments"]["NEXT"] = 'Siguiente';
        self::$trans["mydocuments"]["PREVIOUS"] = 'Anterior';
        self::$trans["mydocuments"]["BULK_ACTIONS"] = 'Acciones en lote';
        self::$trans["mydocuments"]["BULK_REMOVE_DOCS"] = 'Borrar';
        self::$trans["mydocuments"]["BULK_MOVE_DOCS"] = 'Mover';
        self::$trans["mydocuments"]["SHARE_COLLECTION"] = 'compartir colección';
        self::$trans["mydocuments"]["SHARED_COLLECTION"] = 'colección compartida';
        self::$trans["mydocuments"]["BUTTON_CLOSE"] = 'Cerrar';
        self::$trans["mydocuments"]["CREATED_BY"] = 'Creado por:';
        self::$trans["mydocuments"]["PUBLISHED_IN"] = 'Publicado en:';
        self::$trans["mydocuments"]["UPDATED_IN"] = 'Actualizado en:';
        self::$trans["mydocuments"]["TOTAL_DOCS"] = 'Total de documentos:';
        self::$trans["mydocuments"]["COLLECTION_DOCS"] = 'Colección de Documentos';

    // Tems of directories pages
        self::$trans["directories"]["FEATURE"] = 'Documentos Favoritos';
        self::$trans["directories"]["FOLDER_NAME"] = 'Nombre de la colección';
        self::$trans["directories"]["ADD_FOLDER"] = 'añadir colección';
        self::$trans["directories"]["EDIT_FOLDER"] = 'editar colección';
        self::$trans["directories"]["SAVE"] = 'crear';
        self::$trans["directories"]["CANCEL"] = 'cancelar';
        self::$trans["directories"]["REMOVE"] = 'borrar';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'borrar colección';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Borrar contenído';
        self::$trans["directories"]["MOVE"] = 'mover';
        self::$trans["directories"]["MOVE_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'mover para colección';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Mover contenído para otra colección';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Caja de Entrada';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["directories"]["ADD_DIR_ERROR"] = 'Error al añadir colección';
        self::$trans["directories"]["REMOVE_DIR_ERROR"] = 'Error al borrar colección';
        self::$trans["directories"]["MOVE_DOC_ERROR"] = 'Error al mover colección';

    // Tems of mylinks pages
        self::$trans["mylinks"]["FEATURE"] = 'Mis Enlaces Favoritos';
        self::$trans["mylinks"]["SHOW_BY"] = 'Ver la Lista por';
        self::$trans["mylinks"]["DATE"] = 'Fecha';
        self::$trans["mylinks"]["MY_RANK"] = 'Mi clasificación';
        self::$trans["mylinks"]["TOOLS"] = 'Mis Enlaces';
        self::$trans["mylinks"]["ADD_LINK"] = 'añadir enlace';
        self::$trans["mylinks"]["MY_LINKS"] = 'Enlaces Favoritos';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'borrar';
        self::$trans["mylinks"]["EDIT_LINK"] = 'editar';
        self::$trans["mylinks"]["EDIT_LINK_POPUP"] = 'editar enlace';
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
        self::$trans["mylinks"]["ADD_LINK_ERROR"] = 'Error al añadir enlace';
        self::$trans["mylinks"]["NEXT"] = 'Siguiente';
        self::$trans["mylinks"]["PREVIOUS"] = 'Anterior';

    // Tems of mylinks pages
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
        self::$trans["mynews"]["ADD_NEWS_SUCESS"] = 'Operación realizada com succeso.';
        self::$trans["mynews"]["PAGE"] = 'Pagina';

    // Tems of myalerts pages
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
        self::$trans["myprofiledocuments"]["FEATURE"] = 'Temas de Interés';
        self::$trans["myprofiledocuments"]["LILACS.orgiahx"] = 'Base de datos LILACS';
        self::$trans["myprofiledocuments"]["SciELO.orgiahx"] = 'Rede SciELO';
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Temas de Interés';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'ver resultados em';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'borrar tema';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'editar tema';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'añadir tema';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Mis Temas';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similares en';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Palabras-clave del tema';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Temas';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Nombre del tema';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Palabras-clave';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'Los términos deven ser escritos separados por coma.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Definir como padrón';
        self::$trans["myprofiledocuments"]["SAVE"] = 'salvar';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'cancelar';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Ningún registro encontrado';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_SUGGESTIONS_FOUND"] = 'No se ha encontrado ningún documento. Intente actualizar el tema en <code>editar tema > grabar</code> o cambiar las palabras-clave.';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Temporalmente sin servicio. Intente actualizar este tema más tarde.';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_ERROR"] = 'Error al añadir tema';
        self::$trans["myprofiledocuments"]["PAGE"] = 'Pagina';
        self::$trans["myprofiledocuments"]["NEXT"] = 'Siguiente';
        self::$trans["myprofiledocuments"]["PREVIOUS"] = 'Anterior';
        self::$trans["myprofiledocuments"]["ADD_COLLECTION"] = 'añadir a favoritos';
        self::$trans["myprofiledocuments"]["INCOMING_FOLDER"] = 'Caja de Entrada';
        self::$trans["myprofiledocuments"]["UPDATE_ALERT"] = '<p>Los documentos de interés abajo pueden cambiar según la actualización de las fuentes de información de la BVS.</p><p>Por lo tanto, si algún documento es de su interés, añádalo a los favoritos.</p>';

    // Terms of mig_id_confirmation pages
        self::$trans["mig_id_confirmation"]["TITLE"] = 'Confirmación de Login';
        self::$trans["mig_id_confirmation"]["LOGIN"] = 'Login';
        self::$trans["mig_id_confirmation"]["CONFIRM"] = 'Confirmar';
        self::$trans["mig_id_confirmation"]["ALERT"] = 'Después de la confirmación, este e-mail será su usuario de acceso al servicio.';

    // Terms of step-by-step guide
        self::$trans["tour"]["TOUR_EXAMPLE"] = '(Ejemplo exclusivo del Tour)';
        self::$trans["tour"]["INTRO"] = 'Bienvenido al Tour de <b>Mi BVS</b>. Conozca las características de este servicio personalizado navegando por los botones de Siguiente y Anterior. En cualquier momento usted podrá salir del Tour y, si lo desea, reiniciarla por medio del menú de su perfil.';
        self::$trans["tour"]["FIRST"] = '<b>Mi BVS</b> registra las informaciones de los usuarios y las preferencias de búsqueda realizadas en las bases de datos de la Red BVS';
        self::$trans["tour"]["STEP_1"] = 'Foto del usuario cuando se inicia con las redes sociales';
        self::$trans["tour"]["STEP_2"] = 'Su contenido está organizado por este menú';
        self::$trans["tour"]["STEP_3"] = '<b>Vision General</b><br />Presenta la Página de inicio del servicio con un resumen de sus acciones realizadas';
        self::$trans["tour"]["STEP_4"] = 'Realice sus búsquedas en el Portal Regional de la BVS';
        self::$trans["tour"]["STEP_5"] = 'Cambie el idioma de la interfaz';
        self::$trans["tour"]["STEP_6"] = 'Actualiza su perfil';
        self::$trans["tour"]["STEP_7"] = 'Accede a la lista de documentos guardados como favoritos';
        self::$trans["tour"]["STEP_8"] = 'Accede a la lista de sus enlaces favoritos';
        self::$trans["tour"]["STEP_9"] = 'Accede a la lista de sus temas de interés';
        self::$trans["tour"]["STEP_10"] = 'Lista de sus documentos favoritos añadidos a través de las búsquedas realizadas en la BVS';
        self::$trans["tour"]["STEP_11"] = 'Haga clic en el tema para ver los documentos que se cargan automáticamente de las palabras clave';
        self::$trans["tour"]["STEP_12"] = 'Acceso directo a sus enlaces favoritos';
        self::$trans["tour"]["STEP_13"] = 'Historial de sus últimas actividades realizadas';
        self::$trans["tour"]["STEP_14"] = 'Historial de las búsquedas realizadas en la BVS con enlace al resultado';

        self::$trans["tour"]["STEP_15"] = '<b>Documentos Favoritos</b><br/>Almacena los documentos que se han guardado a partir de las búsquedas realizadas en la BVS';
        self::$trans["tour"]["STEP_16"] = 'Lista de los documentos añadidos a su biblioteca. Usted puede: eliminar, mover a otra colección o ver documentos relacionados.';
        self::$trans["tour"]["STEP_17"] = 'Utilice esta función para eliminar o mover varios documentos a otra colección';
        self::$trans["tour"]["STEP_18"] = 'Organiza tus documentos favoritos en colecciones';
        self::$trans["tour"]["STEP_19"] = 'Los documentos se pueden enumerar por orden de fecha o por el ranking asignado por usted a cada documento';

        self::$trans["tour"]["STEP_20"] = '<b>Temas de Interés</b><br />Sus temas de interés con palabras clave para buscar y recuperar nuevos documentos de la BVS relacionados con cada tema';
        self::$trans["tour"]["STEP_21"] = 'Lista de los últimos documentos recuperados de la BVS para el respectivo tema de interés. Usted puede: editar o eliminar el tema, agregar documentos a favoritos o ver documentos relacionados.';
        self::$trans["tour"]["STEP_22"] = 'Cree temas y defina palabras clave para recibir documentos relacionados de la BVS';
        self::$trans["tour"]["STEP_23"] = 'Haga clic en sus temas de interés para visualizar documentos recuperados de la BVS';

        self::$trans["tour"]["STEP_24"] = '<b>Historial de búsqueda en la BVS</b><br />Almacena sus búsquedas realizadas en la BVS siempre que esté conectado a Mi BVS';
        self::$trans["tour"]["STEP_25"] = 'Lista de las últimas expresiones de búsqueda realizadas en la BVS';
        self::$trans["tour"]["STEP_26"] = 'Términos que se utilizaron en la búsqueda';
        self::$trans["tour"]["STEP_27"] = 'Filtros que se aplicaron en la búsqueda';
        self::$trans["tour"]["STEP_28"] = 'Puede visualizar el resultado de cada búsqueda en la BVS o combinar las búsquedas indicando el operador de combinación';
        self::$trans["tour"]["STEP_S1"] = 'Haga clic en este botón para ver los filtros que se han aplicado en la búsqueda. Aquí también puede mostrar el resultado de cada búsqueda en la BVS (botón Mostrar) o combinar las búsquedas indicando el operador de combinación (botón Combinar).';

        self::$trans["tour"]["STEP_29"] = '<b>Enlaces Favoritos</b><br />Organiza y facilita el acceso directo a tus Enlaces Favoritos';
        self::$trans["tour"]["STEP_30"] = 'Lista de sus Enlaces Favoritos, con opciones para eliminar o editar cada enlace';
        self::$trans["tour"]["STEP_31"] = 'Añada nuevo enlace Favorito y cree su propia biblioteca de enlaces';
        self::$trans["tour"]["STEP_32"] = 'Ordene sus enlaces por fecha o por el ranking de evaluación asignado por usted a cada enlace';

        self::$trans["tour"]["STEP_33"] = '<b>Mi Publicaciones</b><br />Visualiza tus publicaciones desde el ORCID ID en tu perfil';
        self::$trans["tour"]["STEP_34"] = 'Lista de las publicaciones recuperadas de su ORCID ID. Usted puede acceder a cada documento en Google Académico y saber cuántas veces su publicación ha sido citada. Véase también documentos de la BVS relacionados con su publicación.';

        self::$trans["tour"]["STEP_35"] = '<b>RSS</b><br />(...)';
        self::$trans["tour"]["STEP_36"] = 'Haga clic en este botón para añadir una nueva RSS';
        self::$trans["tour"]["STEP_37"] = '(...)';
        self::$trans["tour"]["LAST"] = 'Felicitaciones! Usted ha completado el Tour y ya sabe cómo funciona los servicios personalizados de <b>Mi BVS</b>. Utilice y divulgue este servicio. Envíe sus dudas y sugerencias para el <a style="text-decoration: underline;" href="http://feedback.bireme.org/feedback/?application=my-vhl&version=2.10-77&site=servplat&lang='.$_SESSION['lang'].'">Servicio de Feedback</a>';
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
