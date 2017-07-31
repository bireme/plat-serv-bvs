<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["MY_VHL"] = 'Minha BVS';
        self::$trans["authentication"]["MY_VHL_SUMMARY"] = '
<p>O serviço Minha BVS registra as informações dos usuários e as preferências de pesquisa nas bases de dados da Rede BVS, fornecendo serviços personalizados aos usuários da BVS.</p>
<p>Isto significa que você poderá:</p>
<ul>
    <li>Selecionar documentos de interesse</li>
    <li>Criar sua própria coleção</li>
    <li>Acessar documentos relacionados aos temas de seu interesse</li>
    <li>Guardar o histórico de buscas realizadas na BVS</li>
    <li>Organizar os links dos seus sites favoritos</li>
    <li>Acessar suas publicações por meio do ORCID</li>
    <li>Ter um espaço próprio/dashboard para salvar todas as suas preferências de pesquisa</li>
</ul>
<p>Tenha acesso gratuito aos produtos e serviços de informação da Minha BVS. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg">Saiba mais</a></p>';
        self::$trans["authentication"]["MY_VHL_DESCRIPTION"] = '
<h4>Visão Geral da Minha BVS</h4>
<p>O serviço Minha BVS registra as informações dos usuários e as preferências de pesquisa nas bases de dados da Rede BVS, fornecendo serviços personalizados aos usuários da BVS.</p>
<p>Isto significa que você poderá:</p>
<ul>
    <li>Selecionar documentos de interesse</li>
    <li>Criar sua própria coleção</li>
    <li>Acessar documentos relacionados aos temas de seu interesse</li>
    <li>Guardar o histórico de buscas realizadas na BVS</li>
    <li>Organizar os links dos seus sites favoritos</li>
    <li>Acessar suas publicações por meio do ORCID</li>
    <li>Ter um espaço próprio/dashboard para salvar todas as suas preferências de pesquisa</li>
</ul>';
        self::$trans["authentication"]["NOTICE"] = 'É novo por aqui?';
        self::$trans["authentication"]["BUTTON_CLOSE"] = 'Fechar';
        self::$trans["authentication"]["RECOVER_ACCOUNTS"] = 'Se você faz parte da Rede BVS como um Centro Cooperante e já está cadastrado no BIREME Accounts como um usuário do Sistema de Administração de Fontes de Informação FI-Admin, clique no link abaixo e recupere sua senha.';
        self::$trans["authentication"]["RECOVER_ACCOUNTS_LINK"] = 'Redefinir a senha do usuário FI-ADMIN';
        self::$trans["authentication"]["RECOVER_PASSWORD"] = 'Se você é um usuário comum e deseja utilizar o serviço Minha BVS e esqueceu sua senha, clique no link abaixo para redefiní-la.';
        self::$trans["authentication"]["RECOVER_PASSWORD_LINK"] = 'Redefinir sua senha';
        self::$trans["authentication"]["TITLE"] = 'Autenticación de Usuários';
        self::$trans["authentication"]["NOREGISTRY"] = 'Registro de nuevos usuarios temporariamente no disponible';
        self::$trans["authentication"]["EMAIL"] = 'e-mail';
        self::$trans["authentication"]["HOME"] = 'home';
        self::$trans["authentication"]["LOGIN_FIELD"] = 'e-mail o login';
        self::$trans["authentication"]["LOGIN"] = 'Entrar';
        self::$trans["authentication"]["USER"] = 'usuario';
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
        self::$trans["authentication"]["FORGOT_MY_PASSWORD"] = '¿Olvidé la contraseña?';
        self::$trans["authentication"]["REGISTRY"] = 'Registrarse';
        self::$trans["authentication"]["HELPLOGINMESSAGE"] = 'A partir de agora, os serviços personalizados estão integrados por meio do passaporte de acesso das redes BVS e SciELO. O login SciELO é válido para essa autenticação. Saiba mais.';
        self::$trans["authentication"]["KNOWMORE"] = ' saiba mais';
        self::$trans["authentication"]["ACCESS_DENIED"] = 'acceso denegado';
        self::$trans["authentication"]["OR"] = 'o';
        self::$trans["authentication"]["LOGIN_WITH"] = 'entrar com';
        self::$trans["authentication"]["LOGIN_MESSAGE"] = 'Faça o login na Minha BVS';
        self::$trans["authentication"]["LOGIN_ACCESS_MESSAGE"] = 'Acesse diretamente na Minha BVS';

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
        self::$trans["menu"]["MY_VHL"] = 'Minha BVS';
        self::$trans["menu"]["SERVPLAT"] = 'Plataforma de Serviços';
        self::$trans["menu"]["DASHBOARD"] = 'Meus Conteúdos';
        self::$trans["menu"]["HOME"] = 'Visão Geral';
        self::$trans["menu"]["WELCOME"] = 'Bem-vindo';
        self::$trans["menu"]["USERS_SERVICES"] = 'Serviços Personalizados';
        self::$trans["menu"]["OLA"] = 'Olá';
        self::$trans["menu"]["LOGOUT"] = 'Sair';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'Temas de Interesse';
        self::$trans["menu"]["MY_SHELF"] = 'Documentos Favoritos';
        self::$trans["menu"]["MY_LINKS"] = 'Links Favoritos';
        self::$trans["menu"]["MY_NEWS"] = 'Minhas Notícias';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'esqueci minha senha';
        self::$trans["menu"]["CHANGE_PASSWORD"] = 'Alterar Senha';
        self::$trans["menu"]["MY_DATA"] = 'Editar Perfil';
        self::$trans["menu"]["MY_ALERTS"] = 'Meus Alertas';
        self::$trans["menu"]["SEARCH"] = 'Pesquisar';
        self::$trans["menu"]["SEARCH_FOR"] = 'Pesquisar por...';
        self::$trans["menu"]["MY_SEARCHES"] = 'Histórico de Buscas na BVS';
        self::$trans["menu"]["KEYWORDS"] = 'Palavras-chave';
        self::$trans["menu"]["SUGGESTED_DOCS"] = 'Documentos Relacionados';
        self::$trans["menu"]["ORCID_WORKS"] = 'ORCID - Minhas Publicações';
        self::$trans["menu"]["RECENT_ACTIVITIES"] = 'Atividades Recentes';
        self::$trans["menu"]["SEE_ALL_DOCS"] = 'Ver todos os documentos';
        self::$trans["menu"]["SEE_ALL_LINKS"] = 'Ver todos os links';
        self::$trans["menu"]["SEE_ALL_PROFILES"] = 'Ver todos os temas';
        self::$trans["menu"]["ADD_COLLECTION"] = 'Coleção adicionada';
        self::$trans["menu"]["UPDATE_COLLECTION"] = 'Coleção atualizada';
        self::$trans["menu"]["REMOVE_COLLECTION"] = 'Coleção removida';
        self::$trans["menu"]["ADD_PROFILE"] = 'Tema adicionado';
        self::$trans["menu"]["UPDATE_PROFILE"] = 'Tema atualizado';
        self::$trans["menu"]["REMOVE_PROFILE"] = 'Tema removido';
        self::$trans["menu"]["ADD_LINK"] = 'Link adicionado';
        self::$trans["menu"]["UPDATE_LINK"] = 'Link atualizado';
        self::$trans["menu"]["REMOVE_LINK"] = 'Link removido';
        self::$trans["menu"]["QUERY"] = 'Query';
        self::$trans["menu"]["VIEW"] = 'Exibir';
        self::$trans["menu"]["SEARCH_WIDGET"] = 'Buscas na BVS';
        self::$trans["menu"]["PROFILE_WIDGET"] = 'Temas de Interesse';
        self::$trans["menu"]["SHELF_WIDGET"] = 'Documentos Favoritos';
        self::$trans["menu"]["START_TOUR"] = 'Iniciar Tour';
        self::$trans["menu"]["NEXT_PAGE"] = 'Próxima funcionalidade';
        self::$trans["menu"]["BACK"] = '&larr; Voltar';
        self::$trans["menu"]["NEXT"] = 'Avançar &rarr;';
        self::$trans["menu"]["SKIP"] = 'Pular';
        self::$trans["menu"]["DONE"] = 'Concluir';
        self::$trans["menu"]["FOOTER_MESSAGE"] = '
<p><strong>BIREME - OPS - OMS</strong><br/>
Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud<br />
Area de Gestión del Conocimiento, Bioética e Investigación - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Mi BVS">http://www.paho.org/bireme</a><br /></p>
';

    // Terms of mysearches pages
        self::$trans["mysearches"]["FEATURE"] = 'Histórico de Buscas na BVS';
        self::$trans["mysearches"]["MY_SEARCHES"] = 'Histórico de Buscas na BVS';
        self::$trans["mysearches"]["PAGE"] = 'Página';
        self::$trans["mysearches"]["MY_SEARCHES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mysearches"]["NEXT"] = 'Próximo';
        self::$trans["mysearches"]["PREVIOUS"] = 'Anterior';
        self::$trans["mysearches"]["QUERY"] = 'Query';
        self::$trans["mysearches"]["FILTERS"] = 'Filtros';
        self::$trans["mysearches"]["ACTIONS"] = 'Ações';
        self::$trans["mysearches"]["VIEW"] = 'Exibir';
        self::$trans["mysearches"]["COMBINE"] = 'Combinar';
        self::$trans["mysearches"]["ORIGIN_SITE"] = 'Site de origem';
        self::$trans["mysearches"]["BRASIL"] = 'BVS Brasil';

    // Terms of suggesteddocs pages
        self::$trans["suggesteddocs"]["FEATURE"] = 'Similares';
        self::$trans["suggesteddocs"]["PAGE"] = 'Página';
        self::$trans["suggesteddocs"]["NEXT"] = 'Próximo';
        self::$trans["suggesteddocs"]["PREVIOUS"] = 'Anterior';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS"] = 'Documentos Relacionados';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS_NO_REGISTERS_FOUND"] = 'Nenhuma sugestão de documentos';
        self::$trans["suggesteddocs"]["REFERENCE"] = 'Escolha os documentos de referência para sugestões:';
        self::$trans["suggesteddocs"]["NO_REFERENCES"] = 'Nenhum documento encontrado com essa referência';
        self::$trans["suggesteddocs"]["ADD_COLLECTION"] = 'adicionar aos favoritos';
        self::$trans["suggesteddocs"]["CONFIG"] = 'Configurações';
        self::$trans["suggesteddocs"]["DOCS"] = 'Documentos';
        self::$trans["suggesteddocs"]["DOCS_SOURCE"] = 'Origem dos documentos';
        self::$trans["suggesteddocs"]["ORCID"] = 'ORCID - Minhas Publicações';
        self::$trans["suggesteddocs"]["COLLECTIONS"] = 'Documentos Favoritos';
        self::$trans["suggesteddocs"]["PROFILES"] = 'Temas de Interesse';
        self::$trans["suggesteddocs"]["INCOMING_FOLDER"] = 'Caixa de Entrada';
        self::$trans["suggesteddocs"]["FOLDERS_LIST"] = 'Escolha um tema:';
        self::$trans["suggesteddocs"]["PROFILES_LIST"] = 'Escolha um tema:';
        self::$trans["suggesteddocs"]["LOADING"] = 'Cargando...';
        self::$trans["suggesteddocs"]["SELECTED_DOCS"] = 'documentos selecionados';
        self::$trans["suggesteddocs"]["SEND"] = 'Enviar';
        self::$trans["suggesteddocs"]["RELATED_DOCS"] = 'documentos relacionados';
        self::$trans["suggesteddocs"]["RELATED_DOCS_ALERT"] = 'Ningún documento relacionado';

    // Terms of orcidworks pages
        self::$trans["orcidworks"]["FEATURE"] = 'Minhas Publicações';
        self::$trans["orcidworks"]["PAGE"] = 'Página';
        self::$trans["orcidworks"]["NEXT"] = 'Próximo';
        self::$trans["orcidworks"]["PREVIOUS"] = 'Anterior';
        self::$trans["orcidworks"]["ORCID_WORKS"] = 'ORCID - Minhas Publicações';
        self::$trans["orcidworks"]["ORCID_WORKS_NO_REGISTERS_FOUND"] = 'Nenhuma publicação encontrada. Para visualizar suas publicações, favor informar o ORCID ID no seu cadastro.';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR"] = 'ver no Google Scholar';

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
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'retirar de mi colección';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'citaciones monitoradas';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'acceso monitorado';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Ningún registro localizado';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'Editar Coleccións';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'Apagar Colección';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = 'Tornar público';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = 'Tornar privado';
        self::$trans["mydocuments"]["PAGE"] = 'Pagina';
        self::$trans["mydocuments"]["NEXT"] = 'Próximo';
        self::$trans["mydocuments"]["PREVIOUS"] = 'Anterior';
        self::$trans["mydocuments"]["BULK_ACTIONS"] = 'Acciones en lote';
        self::$trans["mydocuments"]["BULK_REMOVE_DOCS"] = 'Eliminar documentos';
        self::$trans["mydocuments"]["BULK_MOVE_DOCS"] = 'Mover documentos';

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
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Mover contenído para otra colección';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Caja de Entrada';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["directories"]["ADD_DIR_ERROR"] = 'Error al añadir colección';
        self::$trans["directories"]["REMOVE_DIR_ERROR"] = 'Error al borrar colección';
        self::$trans["directories"]["MOVE_DOC_ERROR"] = 'Error al mover colección';

    // Tems of mylinks pages
        self::$trans["mylinks"]["FEATURE"] = 'Mis Enlaces';
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
        self::$trans["mylinks"]["ADD_LINK_ERROR"] = 'Error al añadir enlace';
        self::$trans["mylinks"]["NEXT"] = 'Próximo';
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
        self::$trans["mynews"]["ADD_news_SUCESS"] = 'Operación realizada com succeso.';
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
        self::$trans["myprofiledocuments"]["REMOVE_PROFIVE"] = 'remover tema';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'editar tema';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'añadir tema';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Herramientas';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similares en';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Palabras-clave del tema';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Temas';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'remover tema';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Nombre del tema';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Palabras-clave';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'Los términos deven ser escritos separados por coma.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Definir como padrón';
        self::$trans["myprofiledocuments"]["SAVE"] = 'salvar';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'cancelar';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Ningún registro encontrado';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_SUGGESTIONS_FOUND"] = 'No se ha encontrado ningún documento. Intente actualizar el tema en <code>editar tema > grabar</code> o cambiar las palabras-clave.';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Temporariamente sin servicio';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operación realizada con succeso.';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_ERROR"] = 'Error al añadir tema';
        self::$trans["myprofiledocuments"]["PAGE"] = 'Pagina';
        self::$trans["myprofiledocuments"]["NEXT"] = 'Próximo';
        self::$trans["myprofiledocuments"]["PREVIOUS"] = 'Anterior';
        self::$trans["myprofiledocuments"]["ADD_COLLECTION"] = 'añadir a favoritos';
        self::$trans["myprofiledocuments"]["INCOMING_FOLDER"] = 'Caja de Entrada';

    // Terms of mig_id_confirmation pages
        self::$trans["mig_id_confirmation"]["TITLE"] = 'Confirmación de Login';
        self::$trans["mig_id_confirmation"]["LOGIN"] = 'Login';
        self::$trans["mig_id_confirmation"]["CONFIRM"] = 'Confirmar';
        self::$trans["mig_id_confirmation"]["ALERT"] = 'Después de la confirmación, utilice esta cuenta de email para acceder al portal SciELO y otras aplicaciones de la red.';

    // Terms of step-by-step guide
        self::$trans["tour"]["TOUR_EXAMPLE"] = '(Exemplo exclusivo do tour)';
        self::$trans["tour"]["INTRO"] = 'Bem-vindo ao Tour da <b>Minha BVS</b>. Conheça as funcionalidades deste serviço personalizado navegando pelos botões de Avançar e Voltar. A qualquer momento você poderá sair do Tour e, se desejar, reiniciá-lo por meio menu do seu perfil.';
        self::$trans["tour"]["FIRST"] = 'A <b>Minha BVS</b> registra as informações dos usuários e as preferências de pesquisas realizadas nas bases de dados da Rede BVS';
        self::$trans["tour"]["STEP_1"] = 'Foto do usuário quando logado pelas Redes Sociais';
        self::$trans["tour"]["STEP_2"] = 'Seus conteúdos são organizados por este Menu';
        self::$trans["tour"]["STEP_3"] = '<b>Visão Geral</b><br />Apresenta a Home do serviço com um resumo de suas ações realizadas';
        self::$trans["tour"]["STEP_4"] = 'Realize suas pesquisas no Portal Regional da BVS';
        self::$trans["tour"]["STEP_5"] = 'Mude o idioma da interface';
        self::$trans["tour"]["STEP_6"] = 'Atualize o seu Perfil';
        self::$trans["tour"]["STEP_7"] = 'Acesse a lista dos documentos salvos como seus favoritos';
        self::$trans["tour"]["STEP_8"] = 'Acesse a lista dos seus links favoritos';
        self::$trans["tour"]["STEP_9"] = 'Acesse a lista dos seus temas de interesse';
        self::$trans["tour"]["STEP_10"] = 'Lista de seus documentos favoritos adicionados por meio das pesquisas realizadas na BVS';
        self::$trans["tour"]["STEP_11"] = 'Clique no tema para visualizar os documentos que foram carregados automaticamente a partir das palavras chaves';
        self::$trans["tour"]["STEP_12"] = 'Acesso direto aos seus links favoritos';
        self::$trans["tour"]["STEP_13"] = 'Histórico de suas últimas atividades realizadas';
        self::$trans["tour"]["STEP_14"] = 'Histórico das buscas realizadas na BVS com link para o resultado';

        self::$trans["tour"]["STEP_15"] = '<b>Documentos Favoritos</b><br/>Armazena os documentos que foram salvos a partir das pesquisas realizadas na BVS';
        self::$trans["tour"]["STEP_16"] = 'Lista dos documentos adicionados à sua Biblioteca. Você pode: excluir, mover para outra coleção ou ver documentos relacionados.';
        self::$trans["tour"]["STEP_17"] = 'Use este recurso para excluir ou mover múltiplos documentos para outra coleção';
        self::$trans["tour"]["STEP_18"] = 'Organize seus documentos favoritos em coleções';
        self::$trans["tour"]["STEP_19"] = 'Os documentos podem ser listados por ordem de data ou pelo ranking atribuído por você a cada documento';

        self::$trans["tour"]["STEP_20"] = '<b>Temas de Interesse</b><br />Seus temas de interesse com palavras-chave para pesquisar e recuperar novos documentos da BVS relacionados a cada tema';
        self::$trans["tour"]["STEP_21"] = 'Lista dos últimos documentos recuperados da BVS para o respectivo tema de interesse. Você pode: editar ou excluir o tema, adicionar documentos aos favoritos ou ver documentos relacionados.';
        self::$trans["tour"]["STEP_22"] = 'Crie temas e defina palavras-chave para receber documentos relacionados da BVS';
        self::$trans["tour"]["STEP_23"] = 'Clique nos seus temas de interesse para visualizar documentos recuperados da BVS';

        self::$trans["tour"]["STEP_24"] = '<b>Histórico de busca na BVS</b><br />Armazena suas buscas realizadas na BVS sempre que estiver logado na Minha BVS';
        self::$trans["tour"]["STEP_25"] = 'Lista das últimas expressões de buscas realizadas na BVS';
        self::$trans["tour"]["STEP_26"] = 'Termos que foram utilizados na busca';
        self::$trans["tour"]["STEP_27"] = 'Filtros que foram aplicados na busca';

        self::$trans["tour"]["STEP_28"] = 'Você pode exibir o resultado de cada busca na BVS ou combinar as buscas indicando o operador de combinação';
        self::$trans["tour"]["STEP_29"] = '<b>Links Favoritos</b><br />Organiza e facilita o acesso direto a seus Links Favoritos';
        self::$trans["tour"]["STEP_30"] = 'Lista dos seus Links Favoritos, com opções para remover ou editar cada link';
        self::$trans["tour"]["STEP_31"] = 'Adicione novo Link Favorito e crie sua própria biblioteca de links';
        self::$trans["tour"]["STEP_32"] = 'Ordene seus links por data ou pelo ranking de avaliação atribuído por você a cada link';
        self::$trans["tour"]["STEP_33"] = '<b>Minhas Publicações</b><br />Visualize suas publicações a partir do ORCID ID informado no seu Perfil';
        self::$trans["tour"]["STEP_34"] = 'Lista das publicações recuperadas a partir do seu ORCID ID. Você pode acessar cada documento no Google Scholar e saber quantas vezes sua publicação foi citada. Veja também documentos da BVS relacionados a sua publicação.';
        self::$trans["tour"]["LAST"] = 'Parabéns! Você concluiu o Tour e já sabe como funciona os serviços personalizados da <b>Minha BVS</b>. Use e divulgue este serviço. Envie suas dúvidas e sugestões para o <a style="text-decoration: underline;" href="http://feedback.bireme.org/feedback/?application=my-vhl&version=1.0&lang='.$_SESSION['lang'].'">Serviço de Feedback</a>';
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
