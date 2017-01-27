<?php
/*
 * Edit this file only in UTF-8 format
 *
 */
class Translations {

    static $trans = null;    

    public function translations(){
    // Terms of authentication pages
        self::$trans["authentication"]["TITLE"] = 'Autenticação de Usuários';
        self::$trans["authentication"]["NOREGISTRY"] = 'Registro de novos usuários indisponível temporariamente';
        self::$trans["authentication"]["HOME"] = 'home';
        self::$trans["authentication"]["EMAIL"] = 'e-mail ou';
        self::$trans["authentication"]["LOGIN_FIELD"] = 'e-mail ou login';
        self::$trans["authentication"]["LOGIN"] = 'login';
        self::$trans["authentication"]["PASSWORD"] = 'password';
        self::$trans["authentication"]["PRESS_HERE"] = 'clique aqui';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'usuario ou senha inválidos';
        self::$trans["authentication"]["INVALID_LOGIN_MAIL"] = '
<div>Falha de autenticação</div>
<ol>
<li>Tente se autenticar com seu "SciELO login"</li>
<li>Use a função "esqueci minha senha"</li>
<li>Crie uma nova conta</li>
<li>Peça por ajuda, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["INVALID_LOGIN_UNAME"] = '
<div>Falha de autenticação</div>
<ol>
<li>Tente se autenticar com sua conta de e-mail</li>
<li>Use a função "esqueci minha senha"</li>
<li>Crie uma nova conta</li>
<li>Peça por ajuda, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["BIREME_LOGIN_LDAP"] = 'utilize seu usuário e senha da rede BIREME';
        self::$trans["authentication"]["FORGOT_MY_PASSWORD"] = 'esqueci minha senha';
        self::$trans["authentication"]["REGISTRY"] = 'cadastrar-se';
        self::$trans["authentication"]["HELPLOGINMESSAGE"] = 'A partir de agora, os serviços personalizados estão integrados por meio do passaporte de acesso das redes BVS e SciELO. O login SciELO é válido para essa autenticação.';
        self::$trans["authentication"]["KNOWMORE"] = ' saiba mais';
        self::$trans["authentication"]["ACCESS_DENIED"] = 'acesso negado';
        self::$trans["authentication"]["OR"] = 'ou';

    // Terms of the Request Authentication Page
        self::$trans["requestauth"]["LOGIN"] = 'login';
        self::$trans["requestauth"]["FOR_SERVICES"] = 'para serviços<br />personalizados';
        self::$trans["requestauth"]["NOREGISTRY"] = 'Registro de novos usuários indisponível temporariamente';

    // Terms of the new password page
        self::$trans["new_pass"]["TITLE"] = 'Enviar senha por email';
        self::$trans["new_pass"]["LOGIN"] = 'login';
        self::$trans["new_pass"]["SUBMIT"] = 'enviar';
        self::$trans["new_pass"]["CANCEL"] = 'cancelar';

    // Terms of the menu pages
        self::$trans["menu"]["HOME"] = 'Home';
        self::$trans["menu"]["WELCOME"] = 'Bem vindo';
        self::$trans["menu"]["USERS_SERVICES"] = 'Serviços Personalizados';
        self::$trans["menu"]["OLA"] = 'Olá';
        self::$trans["menu"]["LOGOUT"] = 'Sair';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'Documentos do Perfil';
        self::$trans["menu"]["MY_SHELF"] = 'Minhas Coleções';
        self::$trans["menu"]["MY_LINKS"] = 'Meus Links';
        self::$trans["menu"]["MY_NEWS"] = 'Minhas Notícias';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'esqueci minha senha';
        self::$trans["menu"]["CHANGE_PASSWORD"] = 'Alterar Senha';
        self::$trans["menu"]["MY_DATA"] = 'Editar Perfil';
        self::$trans["menu"]["MY_ALERTS"] = 'Meus Alertas';
        self::$trans["menu"]["SEARCH"] = 'Pesquisar';
        self::$trans["menu"]["SEARCH_FOR"] = 'Pesquisar por...';
        self::$trans["menu"]["MY_SEARCHES"] = 'Minhas Pesquisas';
        self::$trans["menu"]["KEYWORDS"] = 'Palavras-chave';
        self::$trans["menu"]["SUGGESTED_DOCS"] = 'Documentos Sugeridos';
        self::$trans["menu"]["ORCID_WORKS"] = 'ORCID Works';
        self::$trans["menu"]["RECENT_ACTIVITIES"] = 'Atividades Recentes';
        self::$trans["menu"]["SEE_ALL_DOCS"] = 'Ver todas as coleções';
        self::$trans["menu"]["SEE_ALL_LINKS"] = 'Ver todos os links';
        self::$trans["menu"]["SEE_ALL_PROFILES"] = 'Ver todos os perfis';
        self::$trans["menu"]["ADD_COLLECTION"] = 'Coleção adicionada';
        self::$trans["menu"]["UPDATE_COLLECTION"] = 'Coleção atualizada';
        self::$trans["menu"]["REMOVE_COLLECTION"] = 'Coleção removida';
        self::$trans["menu"]["ADD_PROFILE"] = 'Perfil adicionado';
        self::$trans["menu"]["UPDATE_PROFILE"] = 'Perfil atualizado';
        self::$trans["menu"]["REMOVE_PROFILE"] = 'Perfil removido';
        self::$trans["menu"]["ADD_LINK"] = 'Link adicionado';
        self::$trans["menu"]["UPDATE_LINK"] = 'Link atualizado';
        self::$trans["menu"]["REMOVE_LINK"] = 'Link removido';

    // Terms of mysearches pages
        self::$trans["mysearches"]["PAGE"] = 'Página';
        self::$trans["mysearches"]["MY_SEARCHES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mysearches"]["NEXT"] = 'Próximo';
        self::$trans["mysearches"]["PREVIOUS"] = 'Anterior';

    // Terms of suggesteddocs pages
        self::$trans["suggesteddocs"]["PAGE"] = 'Página';
        self::$trans["suggesteddocs"]["NEXT"] = 'Próximo';
        self::$trans["suggesteddocs"]["PREVIOUS"] = 'Anterior';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS"] = 'Documentos Sugeridos';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS_NO_REGISTERS_FOUND"] = 'Nenhuma sugestão de documentos';
        self::$trans["suggesteddocs"]["ADD_COLLECTION"] = 'Adicionar Coleção';

    // Terms of orcidworks pages
        self::$trans["orcidworks"]["PAGE"] = 'Página';
        self::$trans["orcidworks"]["NEXT"] = 'Próximo';
        self::$trans["orcidworks"]["PREVIOUS"] = 'Anterior';
        self::$trans["orcidworks"]["ORCID_WORKS"] = 'ORCID Works';
        self::$trans["orcidworks"]["ORCID_WORKS_NO_REGISTERS_FOUND"] = 'Nenhum trabalho publicado no ORCID';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR"] = 'Ver no Google Scholar';

    // General Terms
        self::$trans["general"]["IDENTIFICATION"] = 'Biblioteca Virtual em Saúde';
        self::$trans["general"]["LOGO"] = 'pt/logobvs.gif';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'Meus Documentos';
        self::$trans["mydocuments"]["BY_DATE"] = 'por Data';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Pasta de Entrada';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Adicionar Pasta';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'Minhas Pastas';
        self::$trans["mydocuments"]["SHOW_BY"] = 'Visualizar Lista por';
        self::$trans["mydocuments"]["DATE"] = 'Data';
        self::$trans["mydocuments"]["MY_RANK"] = 'Meu ranking';
        self::$trans["mydocuments"]["MOVE"] = 'mover';
        self::$trans["mydocuments"]["MOVE_TO"] = 'mover para';
        self::$trans["mydocuments"]["MOVE_DOCUMENT_TO"] = 'mover para';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'texto completo';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'remover da coleção';
        self::$trans["mydocuments"]["HOME"] = 'Home';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'citações monitoradas';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'acesso monitorado';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'editar pasta';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'remover pasta';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = 'Tornar público';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = 'Tornar privado';
        self::$trans["mydocuments"]["PAGE"] = 'Página';

    // Tems of directories pages
        self::$trans["directories"]["FOLDER_NAME"] = 'Nome da pasta';
        self::$trans["directories"]["EDIT_FOLDER"] = 'editar pasta';
        self::$trans["directories"]["SAVE"] = 'salvar';
        self::$trans["directories"]["CANCEL"] = 'cancelar';
        self::$trans["directories"]["REMOVE"] = 'remover';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'remover pasta';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Remover conteúdo';
        self::$trans["directories"]["MOVE"] = 'mover';
        self::$trans["directories"]["MOVE_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Mover conteúdo para outra pasta';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Pasta de Entrada';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operação realizada com sucesso.';        
        self::$trans["directories"]["ADD_DIR_ERROR"] = 'Erro ao adicionar pasta';
        self::$trans["directories"]["REMOVE_DIR_ERROR"] = 'Erro ao remover pasta';
        self::$trans["directories"]["MOVE_DOC_ERROR"] = 'Erro ao mover pasta';

    // Tems of mylinks pages
        self::$trans["mylinks"]["HOME"] = 'Home';
        self::$trans["mylinks"]["SHOW_BY"] = 'Visualizar Lista por';
        self::$trans["mylinks"]["DATE"] = 'Data';
        self::$trans["mylinks"]["MY_RANK"] = 'Meu ranking';
        self::$trans["mylinks"]["TOOLS"] = 'Ferramentas';
        self::$trans["mylinks"]["ADD_LINK"] = 'Adicionar Link';
        self::$trans["mylinks"]["MY_LINKS"] = 'Meus Links';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'remover link';
        self::$trans["mylinks"]["EDIT_LINK"] = 'editar link';
        self::$trans["mylinks"]["HIDE_FROM_HOME"] = 'remover da home page';
        self::$trans["mylinks"]["SHOW_IN_HOME"] = 'publicar na home page';
        self::$trans["mylinks"]["LINK_TITLE"] = 'Título';
        self::$trans["mylinks"]["LINK_URL"] = 'URL';
        self::$trans["mylinks"]["LINK_DESCRIPTION"] = 'Descrição';
        self::$trans["mylinks"]["LINK_IN_HOME"] = 'publicar na home page';
        self::$trans["mylinks"]["SAVE"] = 'salvar';
        self::$trans["mylinks"]["CANCEL"] = 'cancelar';
        self::$trans["mylinks"]["MY_LINKS_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mylinks"]["ADD_LINK_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["mylinks"]["PAGE"] = 'Página';
        self::$trans["mylinks"]["ADD_LINK_ERROR"] = 'Erro ao adicionar link';

    // Tems of mylinks pages
        self::$trans["mynews"]["HOME"] = 'Home';
        self::$trans["mynews"]["SHOW_BY"] = 'Visualizar Lista por';
        self::$trans["mynews"]["DATE"] = 'Data';
        self::$trans["mynews"]["MY_RANK"] = 'Meu ranking';
        self::$trans["mynews"]["TOOLS"] = 'Ferramentas';
        self::$trans["mynews"]["ADD_NEWS"] = 'Adicionar RSS Feed';
        self::$trans["mynews"]["MY_NEWS"] = 'Minhas Notícias';
        self::$trans["mynews"]["REMOVE_NEWS"] = 'remover rss feed';
        self::$trans["mynews"]["EDIT_NEWS"] = 'editar rss feed';
        self::$trans["mynews"]["HIDE_FROM_HOME"] = 'remover da home page';
        self::$trans["mynews"]["SHOW_IN_HOME"] = 'publicar na home page';
        self::$trans["mynews"]["NEWS_TITLE"] = 'Título';
        self::$trans["mynews"]["NEWS_URL"] = 'URL';
        self::$trans["mynews"]["NEWS_DESCRIPTION"] = 'Descrição';
        self::$trans["mynews"]["NEWS_IN_HOME"] = 'publicar na home page';
        self::$trans["mynews"]["SAVE"] = 'salvar';
        self::$trans["mynews"]["CANCEL"] = 'cancelar';
        self::$trans["mynews"]["MY_NEWS_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mynews"]["ADD_news_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["mynews"]["PAGE"] = 'Página';

    // Tems of myalerts pages
        self::$trans["myalerts"]["HOME"] = 'Home';
        self::$trans["myalerts"]["TOOLS"] = 'Ferramentas';
        self::$trans["myalerts"]["MY_ALERTS"] = 'Meus Alertas';
        self::$trans["myalerts"]["ACCESS_LIST"] = 'Estatísticas de Acesso';
        self::$trans["myalerts"]["CITED_LIST"] = 'Citações';
        self::$trans["myalerts"]["REMOVE_ALERT"] = 'remover alerta';
        self::$trans["myalerts"]["FULL_TEXT"] = 'texto completo';
        self::$trans["myalerts"]["SHOW_ACCESS_LIST"] = 'Mostrar Estatísticas de Acesso';
        self::$trans["myalerts"]["SHOW_CITED_LIST"] = 'Mostrar Citações';
        self::$trans["myalerts"]["SHOW_ALL"] = 'Mostrar Ambos';
        self::$trans["myalerts"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["myalerts"]["CITED_LIST_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';

    // Terms of myprofiledocuments pages
        self::$trans["myprofiledocuments"]["LILACS.orgiahx"] = 'Base de dados LILACS';
        self::$trans["myprofiledocuments"]["SciELO.orgiahx"] = 'Rede SciELO';
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Meus Perfis';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'ver resultados em';
        self::$trans["myprofiledocuments"]["REMOVE_PROFIVE"] = 'remover perfil';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'editar perfil';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'Adicionar perfil';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Ferramentas';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similares em';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Palavras-chave do Perfil';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Perfis';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'remover perfil';
        self::$trans["myprofiledocuments"]["HOME"] = 'Home';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Nome do perfil';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Palavras-chave';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'As palavras devem ser inseridas separadas por espaços.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Definir como padrão';
        self::$trans["myprofiledocuments"]["SAVE"] = 'salvar';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'cancelar';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Serviço temporariamente indisponível';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_ERROR"] = 'Erro ao adicionar perfil';

    // Terms of mig_id_confirmation pages
        self::$trans["mig_id_confirmation"]["TITLE"] = 'Confirmação de Login';
        self::$trans["mig_id_confirmation"]["LOGIN"] = 'Login';
        self::$trans["mig_id_confirmation"]["CONFIRM"] = 'Confirmar';
        self::$trans["mig_id_confirmation"]["ALERT"] = 'Após a confirmação, este email será o seu login para acessar o portal SciELO e as demais aplicações da Rede BVS.';
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

