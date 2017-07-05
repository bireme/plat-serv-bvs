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
<p>Tenha acesso gratuito aos produtos e serviços de informação da Minha BVS. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg">Saiba mais</a><p>';
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
        self::$trans["authentication"]["FORGOT_MY_PASSWORD"] = 'Forgot password?';
        self::$trans["authentication"]["REGISTRY"] = 'Register yourself';
        self::$trans["authentication"]["HELPLOGINMESSAGE"] = 'From now, personalized services are integrated through the passport to access the VHL and SciELO network. The SciELO login is valid for this authentication.';
        self::$trans["authentication"]["KNOWMORE"] = 'Learn more';
        self::$trans["authentication"]["ACCESS_DENIED"] = 'access denied';
        self::$trans["authentication"]["OR"] = 'or';

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
        self::$trans["menu"]["NEXT_PAGE"] = 'Próxima página';
        self::$trans["menu"]["BACK"] = '&larr; Voltar';
        self::$trans["menu"]["NEXT"] = 'Avançar &rarr;';
        self::$trans["menu"]["SKIP"] = 'Pular';
        self::$trans["menu"]["DONE"] = 'Concluir';
        self::$trans["menu"]["FOOTER_MESSAGE"] = '
<p><strong>BIREME - PAHO - WHO</strong><br/>
Latin American and Caribbean Center on Health Sciences Information<br />
Knowledge Management, Bioethics and Research Area - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="My VHL">http://www.paho.org/bireme</a><br /></p>
';

    // Terms of mysearches pages
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
        self::$trans["suggesteddocs"]["LOADING"] = 'Loading...';
        self::$trans["suggesteddocs"]["SELECTED_DOCS"] = 'documentos selecionados';
        self::$trans["suggesteddocs"]["SEND"] = 'Enviar';
        self::$trans["suggesteddocs"]["RELATED_DOCS"] = 'related documents';
        self::$trans["suggesteddocs"]["RELATED_DOCS_ALERT"] = 'No related documents';

    // Terms of orcidworks pages
        self::$trans["orcidworks"]["PAGE"] = 'Página';
        self::$trans["orcidworks"]["NEXT"] = 'Próximo';
        self::$trans["orcidworks"]["PREVIOUS"] = 'Anterior';
        self::$trans["orcidworks"]["ORCID_WORKS"] = 'ORCID - Minhas Publicações';
        self::$trans["orcidworks"]["ORCID_WORKS_NO_REGISTERS_FOUND"] = 'Nenhuma publicação encontrada. Para visualizar suas publicações, favor informar o ORCID ID no seu cadastro.';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR"] = 'ver no Google Scholar';

    // General Terms
        self::$trans["general"]["IDENTIFICATION"] = 'Virtual Health Library';
        self::$trans["general"]["LOGO"] = 'en/logobvs.gif';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'Favorite Documents';
        self::$trans["mydocuments"]["BY_DATE"] = 'by Date';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Incoming Box';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Add Collection';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'My Collections';
        self::$trans["mydocuments"]["SHOW_BY"] = 'View List by';
        self::$trans["mydocuments"]["DATE"] = 'Date';
        self::$trans["mydocuments"]["MY_RANK"] = 'My ranking';
        self::$trans["mydocuments"]["MOVE"] = 'move';
        self::$trans["mydocuments"]["MOVE_TO"] = 'move to';
        self::$trans["mydocuments"]["MOVE_DOCUMENT_TO"] = 'move to';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'full text';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'remove from collection';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'monitored citations';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'monitored access';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'Edit Collection';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'Remove Collection';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = 'Make public';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = 'Make private';
        self::$trans["mydocuments"]["PAGE"] = 'Page';
        self::$trans["mydocuments"]["NEXT"] = 'Next';
        self::$trans["mydocuments"]["PREVIOUS"] = 'Previous';
        self::$trans["mydocuments"]["BULK_ACTIONS"] = 'Bulk actions';
        self::$trans["mydocuments"]["BULK_REMOVE_DOCS"] = 'Remove documents';
        self::$trans["mydocuments"]["BULK_MOVE_DOCS"] = 'Move documents';

    // Tems of directories pages
        self::$trans["directories"]["FOLDER_NAME"] = 'Collection Name';
        self::$trans["directories"]["ADD_FOLDER"] = 'add collection';
        self::$trans["directories"]["EDIT_FOLDER"] = 'edit collection';
        self::$trans["directories"]["SAVE"] = 'create';
        self::$trans["directories"]["CANCEL"] = 'cancel';
        self::$trans["directories"]["REMOVE"] = 'remove';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'remove collection';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Remove content';
        self::$trans["directories"]["MOVE"] = 'move';
        self::$trans["directories"]["MOVE_TO"] = 'move to';
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'move to';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Move content to another collection';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Incoming Box';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operation success.';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operation success.';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operation success.';
        self::$trans["directories"]["ADD_DIR_ERROR"] = 'There was an error adding the collection';
        self::$trans["directories"]["REMOVE_DIR_ERROR"] = 'There was an error removing the collection';
        self::$trans["directories"]["MOVE_DOC_ERROR"] = 'There was an error moving the collection';

    // Tems of mylinks pages
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
        self::$trans["mylinks"]["ADD_LINK_ERROR"] = 'There was an error adding the link';
        self::$trans["mylinks"]["NEXT"] = 'Next';
        self::$trans["mylinks"]["PREVIOUS"] = 'Previous';

    // Tems of mylinks pages
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
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Interest Topics';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'view results in';
        self::$trans["myprofiledocuments"]["REMOVE_PROFIVE"] = 'remove topic';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'edit topic';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'add topic';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Tools';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similars in';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Topics keywords';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Topics';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'remove topic';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Topic Name';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Keywords';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'The terms must be separated by commas.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Define as default';
        self::$trans["myprofiledocuments"]["SAVE"] = 'save';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'cancel';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'No registers found';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_SUGGESTIONS_FOUND"] = 'No documents found. Try updating topic by <code>edit topic > save</code> or change your keywords.';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Service temporary unavailable';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operation success.';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_ERROR"] = 'There was an error adding the topic';
        self::$trans["myprofiledocuments"]["PAGE"] = 'Page';
        self::$trans["myprofiledocuments"]["NEXT"] = 'Next';
        self::$trans["myprofiledocuments"]["PREVIOUS"] = 'Previous';
        self::$trans["myprofiledocuments"]["ADD_COLLECTION"] = 'add to favorites';
        self::$trans["myprofiledocuments"]["INCOMING_FOLDER"] = 'Incoming Box';

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
