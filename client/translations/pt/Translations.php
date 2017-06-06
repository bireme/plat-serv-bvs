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
        self::$trans["menu"]["FOOTER_MESSAGE"] = '
<p><strong>BIREME - OPAS - OMS</strong><br/>
Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br />
Área de Gestão do Conhecimento, Bioética e Pesquisa - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Minha BVS">http://www.paho.org/bireme/</a><br /></p>
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
        self::$trans["suggesteddocs"]["LOADING"] = 'Carregando...';
        self::$trans["suggesteddocs"]["SELECTED_DOCS"] = 'documentos selecionados';
        self::$trans["suggesteddocs"]["SEND"] = 'Enviar';
        self::$trans["suggesteddocs"]["RELATED_DOCS"] = 'documentos relacionados';
        self::$trans["suggesteddocs"]["RELATED_DOCS_ALERT"] = 'Nenhum documento relacionado';

    // Terms of orcidworks pages
        self::$trans["orcidworks"]["PAGE"] = 'Página';
        self::$trans["orcidworks"]["NEXT"] = 'Próximo';
        self::$trans["orcidworks"]["PREVIOUS"] = 'Anterior';
        self::$trans["orcidworks"]["ORCID_WORKS"] = 'ORCID - Minhas Publicações';
        self::$trans["orcidworks"]["ORCID_WORKS_NO_REGISTERS_FOUND"] = 'Nenhuma publicação encontrada. Para vizualizar suas publicações, favor informar o ORCID ID no seu cadastro.';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR"] = 'ver no Google Scholar';

    // General Terms
        self::$trans["general"]["IDENTIFICATION"] = 'Biblioteca Virtual em Saúde';
        self::$trans["general"]["LOGO"] = 'pt/logobvs.gif';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'Documentos Favoritos';
        self::$trans["mydocuments"]["BY_DATE"] = 'por Data';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Caixa de Entrada';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Adicionar Coleção';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'Minhas Coleções';
        self::$trans["mydocuments"]["SHOW_BY"] = 'Visualizar Lista por:';
        self::$trans["mydocuments"]["DATE"] = 'Data';
        self::$trans["mydocuments"]["MY_RANK"] = 'Meu ranking';
        self::$trans["mydocuments"]["MOVE"] = 'mover';
        self::$trans["mydocuments"]["MOVE_TO"] = 'mover para';
        self::$trans["mydocuments"]["MOVE_DOCUMENT_TO"] = 'mover para';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'exibir documento';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'remover da coleção';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = 'citações monitoradas';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = 'acesso monitorado';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'editar coleção';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'remover coleção';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = 'Tornar público';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = 'Tornar privado';
        self::$trans["mydocuments"]["PAGE"] = 'Página';
        self::$trans["mydocuments"]["NEXT"] = 'Próximo';
        self::$trans["mydocuments"]["PREVIOUS"] = 'Anterior';
        self::$trans["mydocuments"]["BULK_ACTIONS"] = 'Ações em Massa';
        self::$trans["mydocuments"]["BULK_REMOVE_DOCS"] = 'Remover documentos';
        self::$trans["mydocuments"]["BULK_MOVE_DOCS"] = 'Mover documentos';

    // Tems of directories pages
        self::$trans["directories"]["FOLDER_NAME"] = 'Nome da coleção';
        self::$trans["directories"]["ADD_FOLDER"] = 'adicionar coleção';
        self::$trans["directories"]["EDIT_FOLDER"] = 'editar coleção';
        self::$trans["directories"]["SAVE"] = 'salvar';
        self::$trans["directories"]["CANCEL"] = 'cancelar';
        self::$trans["directories"]["REMOVE"] = 'remover';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'remover coleção';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Remover conteúdo';
        self::$trans["directories"]["MOVE"] = 'mover';
        self::$trans["directories"]["MOVE_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Mover conteúdo para outra coleção';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Caixa de Entrada';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operação realizada com sucesso.';        
        self::$trans["directories"]["ADD_DIR_ERROR"] = 'Erro ao adicionar coleção';
        self::$trans["directories"]["REMOVE_DIR_ERROR"] = 'Erro ao remover coleção';
        self::$trans["directories"]["MOVE_DOC_ERROR"] = 'Erro ao mover coleção';

    // Tems of mylinks pages
        self::$trans["mylinks"]["SHOW_BY"] = 'Visualizar Lista por';
        self::$trans["mylinks"]["DATE"] = 'Data';
        self::$trans["mylinks"]["MY_RANK"] = 'Meu ranking';
        self::$trans["mylinks"]["TOOLS"] = 'Ferramentas';
        self::$trans["mylinks"]["ADD_LINK"] = 'adicionar link';
        self::$trans["mylinks"]["MY_LINKS"] = 'Links Favoritos';
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
        self::$trans["mylinks"]["NEXT"] = 'Próximo';
        self::$trans["mylinks"]["PREVIOUS"] = 'Anterior';

    // Tems of mylinks pages
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
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Temas de Interesse';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'ver resultados em';
        self::$trans["myprofiledocuments"]["REMOVE_PROFIVE"] = 'remover tema';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'editar tema';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'adicionar tema';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Ferramentas';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similares em';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Palavras-chave do tema';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Temas';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'remover tema';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Nome do tema';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Palavras-chave';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'Os termos devem ser separados por vírgula.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Definir como padrão';
        self::$trans["myprofiledocuments"]["SAVE"] = 'salvar';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'cancelar';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_SUGGESTIONS_FOUND"] = 'Nenhum documento encontrado. Tente atualizar o tema em <code>editar tema > salvar</code> ou altere as palavras-chave.';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Serviço temporariamente indisponível';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_ERROR"] = 'Erro ao adicionar tema';
        self::$trans["myprofiledocuments"]["PAGE"] = 'Página';
        self::$trans["myprofiledocuments"]["NEXT"] = 'Próximo';
        self::$trans["myprofiledocuments"]["PREVIOUS"] = 'Anterior';
        self::$trans["myprofiledocuments"]["ADD_COLLECTION"] = 'adicionar aos favoritos';
        self::$trans["myprofiledocuments"]["INCOMING_FOLDER"] = 'Caixa de Entrada';

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

