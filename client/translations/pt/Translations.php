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
<p>Minha BVS é um serviço gratuito que guarda informações e preferências do usuário para oferecer serviços personalizados tais como:</p>
<ul>
    <li>Criação de coleções de documentos selecionados da BVS</li>
    <li>Definição de temas de interesse</li>
    <li>Publicações do usuário recuperadas por ORCID</li>
    <li>Histórico de buscas realizadas na BVS</li>
    <li>Lista de links favoritos</li>
</ul>
<p>Minha BVS está disponível para qualquer usuário por meio de sua conta
Facebook, Google, BIREME Account ou do próprio serviço Minha BVS. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg">Saiba mais</a></p>
';
        self::$trans["authentication"]["MY_VHL_DESCRIPTION"] = '
<p>Minha BVS é um serviço gratuito que guarda informações e preferências do
usuário para oferecer serviços personalizados e facilidades tais como:</p>
<ul class="listDefault">
    <li>Criação de coleções de documentos a partir de resultado de buscas processadas nas bases de dados da BVS.</li>
    <li>Documentos encontrados nas bases de dados da BVS a partir das palavras-chaves indicadas para Temas de Interesse.</li>
    <li>Publicações de autoria do usuário recuperadas em várias fontes considerando o número ORCID informado no Perfil do Usuário.</li>
    <li>Histórico de buscas realizadas na BVS sempre que o usuário estiver logado no serviço.</li>
    <li>Lista de links favoritos indicados pelo usuário permitindo acesso rápido e direto a sites de seu interesse.</li>
</ul>
<p>Minha BVS está disponível para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>BIREME Account é um sistema de gestão de contas de usuários dos Centros Cooperantes da Rede BIREME que acessam o sistema FI-Admin, dentre outros sistemas. Esta mesma conta de usuário está habilitada para o serviço Minha BVS.</p>
<p>Se o usuário prefere uma conta própria para o serviço Minha BVS, é necessário fazer seu registro gratuitamente como usuário, além de aceitar os termos de uso e política de privacidade.</p>
';
        self::$trans["authentication"]["NOTICE"] = 'É novo por aqui?';
        self::$trans["authentication"]["BUTTON_CLOSE"] = 'Fechar';
        self::$trans["authentication"]["RECOVER_ACCOUNTS"] = 'Se você é um Centro Cooperante da Rede BIREME, tem conta no BIREME Accounts, mas esqueceu sua senha...';
        self::$trans["authentication"]["RECOVER_ACCOUNTS_LINK"] = 'Redefinir minha senha';
        self::$trans["authentication"]["RECOVER_PASSWORD"] = 'Se você é um usuário já registrado no serviço Minha BVS, mas esqueceu sua senha...';
        self::$trans["authentication"]["RECOVER_PASSWORD_LINK"] = 'Redefinir minha senha';
        self::$trans["authentication"]["TITLE"] = 'Autenticação de Usuários';
        self::$trans["authentication"]["NOREGISTRY"] = 'Registro de novos usuários indisponível temporariamente';
        self::$trans["authentication"]["HOME"] = 'home';
        self::$trans["authentication"]["EMAIL"] = 'e-mail ou';
        self::$trans["authentication"]["LOGIN_FIELD"] = 'e-mail ou usuário';
        self::$trans["authentication"]["LOGIN"] = 'Entrar';
        self::$trans["authentication"]["USER"] = 'Usuário';
        self::$trans["authentication"]["PASSWORD"] = 'Senha';
        self::$trans["authentication"]["PRESS_HERE"] = 'clique aqui';
        self::$trans["authentication"]["INVALID_LOGIN"] = 'usuário ou senha inválidos';
        self::$trans["authentication"]["INVALID_LOGIN_MAIL"] = '
<div>Falha de autenticação</div>
<ol>
<li>Use a função "esqueci minha senha"</li>
<li>Crie uma nova conta de usuário</li>
<li>Preciso de ajuda, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["INVALID_LOGIN_UNAME"] = '
<div>Falha de autenticação</div>
<ol>
<li>Tente entrar com seu e-mail</li>
<li>Use a função "esqueci minha senha"</li>
<li>Crie uma nova conta de usuário</li>
<li>Preciso de ajuda, HELP_FORM</li>
</ol>
';
        self::$trans["authentication"]["BIREME_LOGIN_LDAP"] = 'utilize seu usuário e senha da rede BIREME';
        self::$trans["authentication"]["FORGOT_MY_PASSWORD"] = 'Esqueci minha senha';
        self::$trans["authentication"]["REGISTRY"] = 'Registre-se';
        self::$trans["authentication"]["HELPLOGINMESSAGE"] = '';
        self::$trans["authentication"]["KNOWMORE"] = 'saiba mais';
        self::$trans["authentication"]["ACCESS_DENIED"] = 'acesso negado';
        self::$trans["authentication"]["OR"] = 'OU';
        self::$trans["authentication"]["LOGIN_WITH"] = 'entrar com';
        self::$trans["authentication"]["LOGIN_MESSAGE"] = 'FAÇA O LOGIN NA MINHA BVS';
        self::$trans["authentication"]["LOGIN_ACCESS_MESSAGE"] = 'Acesse diretamente na Minha BVS';
        self::$trans["authentication"]["REMEMBER_ME"] = 'Lembrar-me';

    // Terms of the Request Authentication Page
        self::$trans["requestauth"]["LOGIN"] = 'login';
        self::$trans["requestauth"]["FOR_SERVICES"] = 'para serviços<br />personalizados';
        self::$trans["requestauth"]["NOREGISTRY"] = 'Registro de novos usuários indisponível temporariamente';

    // Terms of the new password page
        self::$trans["new_pass"]["TITLE"] = 'Enviar senha por email';
        self::$trans["new_pass"]["LOGIN"] = 'usuário';
        self::$trans["new_pass"]["SUBMIT"] = 'enviar';
        self::$trans["new_pass"]["CANCEL"] = 'cancelar';

    // Terms of the menu pages
        self::$trans["menu"]["VHL_PORTAL"] = 'Portal Regional da BVS';
        self::$trans["menu"]["FEATURE"] = 'Home';
        self::$trans["menu"]["MY_VHL"] = 'Minha BVS';
        self::$trans["menu"]["SERVPLAT"] = 'Plataforma de Serviços';
        self::$trans["menu"]["COLLAPSE_MENU"] = 'Recolher Menu';
        self::$trans["menu"]["DASHBOARD"] = 'Meus Conteúdos';
        self::$trans["menu"]["HOME"] = 'Home';
        self::$trans["menu"]["WELCOME"] = 'Bem-vindo';
        self::$trans["menu"]["USERS_SERVICES"] = 'Serviços Personalizados';
        self::$trans["menu"]["OLA"] = 'Olá';
        self::$trans["menu"]["LOGOUT"] = 'Sair';
        self::$trans["menu"]["MY_PROFILE_DOCUMENTS"] = 'Temas de Interesse';
        self::$trans["menu"]["MY_SHELF"] = 'Documentos Favoritos';
        self::$trans["menu"]["MY_LINKS"] = 'Links Favoritos';
        self::$trans["menu"]["MY_NEWS"] = 'Minhas Notícias';
        self::$trans["menu"]["FORGOT_MY_PASSWORD"] = 'Esqueci minha senha';
        self::$trans["menu"]["CHANGE_PASSWORD"] = 'Alterar Senha';
        self::$trans["menu"]["MY_DATA"] = 'Editar Perfil';
        self::$trans["menu"]["MY_ALERTS"] = 'Meus Alertas';
        self::$trans["menu"]["SEARCH"] = 'Pesquisar';
        self::$trans["menu"]["SEARCH_FOR"] = 'Pesquisar na BVS por...';
        self::$trans["menu"]["MY_SEARCHES"] = 'Histórico de Buscas na BVS';
        self::$trans["menu"]["KEYWORDS"] = 'Palavras-chave';
        self::$trans["menu"]["SUGGESTED_DOCS"] = 'Documentos Relacionados';
        self::$trans["menu"]["ORCID_WORKS"] = 'Minhas Publicações';
        self::$trans["menu"]["RECENT_ACTIVITIES"] = 'Atividades Recentes';
        self::$trans["menu"]["SEE_ALL_DOCS"] = 'Ver todos os documentos';
        self::$trans["menu"]["SEE_ALL_LINKS"] = 'Ver todos os links';
        self::$trans["menu"]["SEE_ALL_PROFILES"] = 'Ver todos os temas';
        self::$trans["menu"]["ADD_COLLECTION"] = 'Coleção adicionada';
        self::$trans["menu"]["UPDATE_COLLECTION"] = 'Coleção atualizada';
        self::$trans["menu"]["REMOVE_COLLECTION"] = 'Coleção excluída';
        self::$trans["menu"]["ADD_PROFILE"] = 'Tema adicionado';
        self::$trans["menu"]["UPDATE_PROFILE"] = 'Tema atualizado';
        self::$trans["menu"]["REMOVE_PROFILE"] = 'Tema excluído';
        self::$trans["menu"]["ADD_LINK"] = 'Link adicionado';
        self::$trans["menu"]["UPDATE_LINK"] = 'Link atualizado';
        self::$trans["menu"]["REMOVE_LINK"] = 'Link excluído';
        self::$trans["menu"]["ADD_RSS"] = 'RSS adicionado';
        self::$trans["menu"]["UPDATE_RSS"] = 'RSS atualizado';
        self::$trans["menu"]["REMOVE_RSS"] = 'RSS excluído';
        self::$trans["menu"]["QUERY"] = 'Expressão de busca';
        self::$trans["menu"]["VIEW"] = 'Buscar';
        self::$trans["menu"]["RSS"] = 'RSS';
        self::$trans["menu"]["SEARCH_WIDGET"] = 'Histórico de Buscas';
        self::$trans["menu"]["PROFILE_WIDGET"] = 'Temas de Interesse';
        self::$trans["menu"]["SHELF_WIDGET"] = 'Documentos Favoritos';
        self::$trans["menu"]["INFO_WIDGET"] = 'Isso pode lhe interessar';
        self::$trans["menu"]["TOUR"] = 'Tour Virtual';
        self::$trans["menu"]["START_TOUR"] = 'Iniciar Tour';
        self::$trans["menu"]["NEXT_PAGE"] = '<span>Próxima</span> <span>funcionalidade</span>';
        self::$trans["menu"]["BACK"] = '&larr; Voltar';
        self::$trans["menu"]["NEXT"] = 'Avançar &rarr;';
        self::$trans["menu"]["SKIP"] = 'Pular';
        self::$trans["menu"]["DONE"] = 'Concluir';
        self::$trans["menu"]["LEAVE_COMMENT"] = 'Enviar Comentário';
        self::$trans["menu"]["REPORT_ERROR"] = 'Comunicar Erro';
        self::$trans["menu"]["SUGGESTIONS"] = 'Sugestões';
        self::$trans["menu"]["EVENTS"] = 'Eventos';
        self::$trans["menu"]["MORE"] = 'Mais';
        self::$trans["menu"]["PROFILE"] = 'Perfil';
        self::$trans["menu"]["CONFIGURATIONS"] = 'Configurações';
        self::$trans["menu"]["FOOTER_MESSAGE"] = '
<p><strong>BIREME - OPAS - OMS</strong><br/>
Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br />
Departamento de Evidência e Inteligência para a Ação em Saúde – EIH<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Minha BVS">http://www.paho.org/bireme/</a><br /><br />
<strong><a href="http://politicas.bireme.org/terminos/pt/">Termos e Condições de Uso</a> | <a href="http://politicas.bireme.org/privacidad/pt/">Políticas de Privacidade</a></strong></p>
';
        self::$trans["menu"]["FOOTER_MESSAGE_DEFAULT"] = '
<br /><b>BIREME - OPAS - OMS</b><br />
Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br />
Departamento de Evidência e Inteligência para a Ação em Saúde – EIH<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Minha BVS" target="_blank">http://www.paho.org/bireme/</a><br />
<b><a href="http://politicas.bireme.org/terminos/pt/" target="_blank">Termos e Condições de Uso</a> | <a href="http://politicas.bireme.org/privacidad/pt/" target="_blank">Políticas de Privacidade</a></b>
';

    // Terms of searchresults pages
        self::$trans["searchresults"]["FEATURE"] = 'RSS';
        self::$trans["searchresults"]["RSS"] = 'RSS';
        self::$trans["searchresults"]["ADD_RSS"] = 'adicionar RSS';
        self::$trans["searchresults"]["EDIT_RSS"] = 'editar RSS';
        self::$trans["searchresults"]["REMOVE_RSS"] = 'excluir RSS';
        self::$trans["searchresults"]["PREVIOUS"] = 'Anterior';
        self::$trans["searchresults"]["NEXT"] = 'Próximo';
        self::$trans["searchresults"]["ADD_RSS_SUCCESS"] = 'Operação realizada com sucesso.';
        self::$trans["searchresults"]["ADD_RSS_ERROR"] = 'Erro ao adicionar RSS';
        self::$trans["searchresults"]["RSS_NOT_FOUND"] = 'Nenhuma RSS encontrada';
        self::$trans["searchresults"]["RSS_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["searchresults"]["INCOMING_FOLDER"] = 'Caixa de Entrada';
        self::$trans["searchresults"]["ADD_COLLECTION"] = 'adicionar aos favoritos';
        self::$trans["searchresults"]["TITLE"] = 'Título';
        self::$trans["searchresults"]["URL"] = 'URL';
        self::$trans["searchresults"]["SAVE"] = 'salvar';
        self::$trans["searchresults"]["CANCEL"] = 'cancelar';
        self::$trans["searchresults"]["ADD"] = 'adicionar';
        self::$trans["searchresults"]["TO_COLLECTION"] = 'à coleção';

    // Terms of mysearches pages
        self::$trans["mysearches"]["FEATURE"] = 'Histórico de Buscas na BVS';
        self::$trans["mysearches"]["MY_SEARCHES"] = 'Histórico de Buscas na BVS';
        self::$trans["mysearches"]["PAGE"] = 'Página';
        self::$trans["mysearches"]["MY_SEARCHES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mysearches"]["NEXT"] = 'Próximo';
        self::$trans["mysearches"]["PREVIOUS"] = 'Anterior';
        self::$trans["mysearches"]["QUERY"] = 'Expressão de busca';
        self::$trans["mysearches"]["FILTERS"] = 'Filtros';
        self::$trans["mysearches"]["ACTIONS"] = 'Ações';
        self::$trans["mysearches"]["VIEW"] = 'Exibir';
        self::$trans["mysearches"]["COMBINE"] = 'Combinar';
        self::$trans["mysearches"]["REMOVE"] = 'Remover';
        self::$trans["mysearches"]["ORIGIN_SITE"] = 'BVS de origem';
        self::$trans["mysearches"]["BRASIL"] = 'Brasil';

    // Terms of suggesteddocs pages
        self::$trans["suggesteddocs"]["FEATURE"] = 'Similares';
        self::$trans["suggesteddocs"]["PAGE"] = 'Página';
        self::$trans["suggesteddocs"]["NEXT"] = 'Próximo';
        self::$trans["suggesteddocs"]["PREVIOUS"] = 'Anterior';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS"] = 'Similares';
        self::$trans["suggesteddocs"]["SUGGESTED_DOCS_NO_REGISTERS_FOUND"] = 'Nenhuma sugestão de documentos';
        self::$trans["suggesteddocs"]["REFERENCE"] = 'Escolha os documentos de referência para sugestões:';
        self::$trans["suggesteddocs"]["NO_REFERENCES"] = 'Nenhum documento encontrado com essa referência';
        self::$trans["suggesteddocs"]["ADD_COLLECTION"] = 'Adicionar aos favoritos';
        self::$trans["suggesteddocs"]["CONFIG"] = 'Configurações';
        self::$trans["suggesteddocs"]["DOCS"] = 'Documentos';
        self::$trans["suggesteddocs"]["DOCS_SOURCE"] = 'Origem dos documentos';
        self::$trans["suggesteddocs"]["ORCID"] = 'Minhas Publicações';
        self::$trans["suggesteddocs"]["COLLECTIONS"] = 'Documentos Favoritos';
        self::$trans["suggesteddocs"]["PROFILES"] = 'Temas de Interesse';
        self::$trans["suggesteddocs"]["INCOMING_FOLDER"] = 'Caixa de Entrada';
        self::$trans["suggesteddocs"]["FOLDERS_LIST"] = 'Escolha um tema:';
        self::$trans["suggesteddocs"]["PROFILES_LIST"] = 'Escolha um tema:';
        self::$trans["suggesteddocs"]["LOADING"] = 'Carregando...';
        self::$trans["suggesteddocs"]["SELECTED_DOCS"] = 'documentos selecionados';
        self::$trans["suggesteddocs"]["SEND"] = 'Enviar';
        self::$trans["suggesteddocs"]["RELATED_DOCS"] = 'similares';
        self::$trans["suggesteddocs"]["VHL_RELATED_DOCS"] = 'similares na BVS';
        self::$trans["suggesteddocs"]["RELATED_DOCS_ALERT"] = 'Nenhum documento similar';

    // Terms of orcidworks pages
        self::$trans["orcidworks"]["FEATURE"] = 'Minhas Publicações';
        self::$trans["orcidworks"]["PAGE"] = 'Página';
        self::$trans["orcidworks"]["NEXT"] = 'Próximo';
        self::$trans["orcidworks"]["PREVIOUS"] = 'Anterior';
        self::$trans["orcidworks"]["ORCID_WORKS"] = 'Minhas Publicações';
        self::$trans["orcidworks"]["ORCID_WORKS_NO_REGISTERS_FOUND"] = 'Nenhuma publicação encontrada. Suas publicações são recuperadas a partir do ORCID ID indicado no seu Perfil.';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR"] = 'ver no Google Scholar';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR_CITED"] = 'citado por';
        self::$trans["orcidworks"]["GOOGLE_SCHOLAR_RELATED"] = 'artigos relacionados';

    // General Terms
        self::$trans["general"]["IDENTIFICATION"] = 'Biblioteca Virtual em Saúde';
        self::$trans["general"]["LOGO"] = 'pt/logobvs.gif';

    // Tems of mydocuments pages
        self::$trans["mydocuments"]["FEATURE"] = 'Documentos Favoritos';
        self::$trans["mydocuments"]["COLLECTION"] = 'Coleção';
        self::$trans["mydocuments"]["COLLECTION_NAME"] = 'nome da coleção';
        self::$trans["mydocuments"]["MY_COLLECTION"] = 'Documentos Favoritos';
        self::$trans["mydocuments"]["BY_DATE"] = 'por Data';
        self::$trans["mydocuments"]["INCOMING_FOLDER"] = 'Caixa de Entrada';
        self::$trans["mydocuments"]["ADD_FOLDER"] = 'Adicionar';
        self::$trans["mydocuments"]["MY_FOLDERS"] = 'Minhas Coleções';
        self::$trans["mydocuments"]["SHOW_BY"] = 'Ordenar lista por:';
        self::$trans["mydocuments"]["DATE"] = 'Data';
        self::$trans["mydocuments"]["MY_RANK"] = 'Meu ranking';
        self::$trans["mydocuments"]["MOVE"] = 'mover';
        self::$trans["mydocuments"]["MOVE_TO"] = 'mover para';
        self::$trans["mydocuments"]["MOVE_DOCUMENT_TO"] = 'para coleção';
        self::$trans["mydocuments"]["FULL_TEXT"] = 'mostrar';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION"] = 'excluir';
        self::$trans["mydocuments"]["REMOVE_FROM_COLLECTION_CONFIRM"] = 'Tem certeza que deseja excluir';
        self::$trans["mydocuments"]["MONITOR_CITATION"] = '';
        self::$trans["mydocuments"]["MONITOR_ACCESS"] = '';
        self::$trans["mydocuments"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mydocuments"]["EDIT_FOLDER"] = 'editar coleção';
        self::$trans["mydocuments"]["REMOVE_FOLDER"] = 'excluir coleção';
        self::$trans["mydocuments"]["PUBLISH_FOLDER"] = '';
        self::$trans["mydocuments"]["MAKE_FOLDER_PRIVATE"] = '';
        self::$trans["mydocuments"]["PAGE"] = 'Página';
        self::$trans["mydocuments"]["NEXT"] = 'Próximo';
        self::$trans["mydocuments"]["PREVIOUS"] = 'Anterior';
        self::$trans["mydocuments"]["BULK_ACTIONS"] = 'Ações em massa';
        self::$trans["mydocuments"]["BULK_REMOVE_DOCS"] = 'Excluir';
        self::$trans["mydocuments"]["BULK_MOVE_DOCS"] = 'Mover';
        self::$trans["mydocuments"]["SHARE_COLLECTION"] = 'compartilhar coleção';
        self::$trans["mydocuments"]["SHARED_COLLECTION"] = 'coleção compartilhada';
        self::$trans["mydocuments"]["SHARED_COLLECTION_DESC"] = "Coleção disponível na <a href='http://platserv.bvsalud.org/client/controller/authentication/?lang=pt'>Minha BVS<a/>.";
        self::$trans["mydocuments"]["INVITE"] = 'Ainda não tem conta na Minha BVS? <a href="/client/controller/authentication/?lang=pt" target="_blank">Acesse nosso site e registre-se!';
        self::$trans["mydocuments"]["BUTTON_CLOSE"] = 'Fechar';
        self::$trans["mydocuments"]["CREATED_BY"] = 'Criado por:';
        self::$trans["mydocuments"]["PUBLISHED_IN"] = 'Publicado em:';
        self::$trans["mydocuments"]["UPDATED_IN"] = 'Atualizado em:';
        self::$trans["mydocuments"]["TOTAL_DOCS"] = 'Total de documentos:';
        self::$trans["mydocuments"]["COLLECTION_DOCS"] = 'Coleção de Documentos';
        self::$trans["mydocuments"]["AVAILABLE_IN"] = 'Disponível em:';
        self::$trans["mydocuments"]["CANCEL"] = 'cancelar';
        self::$trans["mydocuments"]["REMOVE"] = 'excluir';
        self::$trans["mydocuments"]["CLOSE"] = 'fechar';

    // Tems of directories pages
        self::$trans["directories"]["FEATURE"] = 'Documentos Favoritos';
        self::$trans["directories"]["COLLECTION_NAME"] = 'nome da coleção';
        self::$trans["directories"]["FOLDER_NAME"] = 'Nome da coleção';
        self::$trans["directories"]["ADD_FOLDER"] = 'adicionar coleção';
        self::$trans["directories"]["EDIT_FOLDER"] = 'editar coleção';
        self::$trans["directories"]["SAVE"] = 'salvar';
        self::$trans["directories"]["CANCEL"] = 'cancelar';
        self::$trans["directories"]["REMOVE"] = 'excluir';
        self::$trans["directories"]["REMOVE_FOLDER"] = 'excluir coleção';
        self::$trans["directories"]["REMOVE_CONTENT"] = 'Apagar conteúdo';
        self::$trans["directories"]["MOVE"] = 'mover';
        self::$trans["directories"]["MOVE_TO"] = 'mover para';
        self::$trans["directories"]["MOVE_DOCUMENT_TO"] = 'para coleção';
        self::$trans["directories"]["MOVE_CONTENT_TO_OTHER_FOLDER"] = 'Mover para outra coleção';
        self::$trans["directories"]["INCOMING_FOLDER"] = 'Caixa de Entrada';
        self::$trans["directories"]["ADD_DIR_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["directories"]["REMOVE_DIR_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["directories"]["MOVE_DOC_SUCESS"] = 'Operação realizada com sucesso.';        
        self::$trans["directories"]["ADD_DIR_ERROR"] = 'Erro ao adicionar coleção';
        self::$trans["directories"]["REMOVE_DIR_ERROR"] = 'Erro ao excluir coleção';
        self::$trans["directories"]["MOVE_DOC_ERROR"] = 'Erro ao mover coleção';

    // Tems of mylinks pages
        self::$trans["mylinks"]["FEATURE"] = 'Links Favoritos';
        self::$trans["mylinks"]["SHOW_BY"] = 'Visualizar Lista por';
        self::$trans["mylinks"]["DATE"] = 'Data';
        self::$trans["mylinks"]["MY_RANK"] = 'Meu ranking';
        self::$trans["mylinks"]["TOOLS"] = 'Meus Links';
        self::$trans["mylinks"]["ADD_LINK"] = 'adicionar link';
        self::$trans["mylinks"]["MY_LINKS"] = 'Links Favoritos';
        self::$trans["mylinks"]["REMOVE_LINK"] = 'excluir';
        self::$trans["mylinks"]["EDIT_LINK"] = 'editar';
        self::$trans["mylinks"]["EDIT_LINK_POPUP"] = 'editar link';
        self::$trans["mylinks"]["HIDE_FROM_HOME"] = 'excluir da home page';
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

    // Tems of mynews pages
        self::$trans["mynews"]["SHOW_BY"] = 'Ordenar por';
        self::$trans["mynews"]["DATE"] = 'Data';
        self::$trans["mynews"]["MY_RANK"] = 'Meu ranking';
        self::$trans["mynews"]["TOOLS"] = 'Ferramentas';
        self::$trans["mynews"]["ADD_NEWS"] = 'Adicionar RSS Feed';
        self::$trans["mynews"]["MY_NEWS"] = 'Minhas Notícias';
        self::$trans["mynews"]["REMOVE_NEWS"] = 'excluir';
        self::$trans["mynews"]["EDIT_NEWS"] = 'editar';
        self::$trans["mynews"]["HIDE_FROM_HOME"] = 'excluir da home page';
        self::$trans["mynews"]["SHOW_IN_HOME"] = 'publicar na home page';
        self::$trans["mynews"]["NEWS_TITLE"] = 'Título';
        self::$trans["mynews"]["NEWS_URL"] = 'URL';
        self::$trans["mynews"]["NEWS_DESCRIPTION"] = 'Descrição';
        self::$trans["mynews"]["NEWS_IN_HOME"] = 'publicar na home page';
        self::$trans["mynews"]["SAVE"] = 'salvar';
        self::$trans["mynews"]["CANCEL"] = 'cancelar';
        self::$trans["mynews"]["MY_NEWS_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["mynews"]["ADD_NEWS_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["mynews"]["PAGE"] = 'Página';

    // Tems of myalerts pages
        self::$trans["myalerts"]["TOOLS"] = 'Ferramentas';
        self::$trans["myalerts"]["MY_ALERTS"] = 'Meus Alertas';
        self::$trans["myalerts"]["ACCESS_LIST"] = 'Estatísticas de Acesso';
        self::$trans["myalerts"]["CITED_LIST"] = 'Citações';
        self::$trans["myalerts"]["REMOVE_ALERT"] = 'excluir';
        self::$trans["myalerts"]["FULL_TEXT"] = 'texto completo';
        self::$trans["myalerts"]["SHOW_ACCESS_LIST"] = 'Mostrar Estatísticas de Acesso';
        self::$trans["myalerts"]["SHOW_CITED_LIST"] = 'Mostrar Citações';
        self::$trans["myalerts"]["SHOW_ALL"] = 'Mostrar Ambos';
        self::$trans["myalerts"]["ACCESS_LIST_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["myalerts"]["CITED_LIST_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';

    // Terms of myprofiledocuments pages
        self::$trans["myprofiledocuments"]["FEATURE"] = 'Temas de Interesse';
        self::$trans["myprofiledocuments"]["LILACS.orgiahx"] = '';
        self::$trans["myprofiledocuments"]["SciELO.orgiahx"] = '';
        self::$trans["myprofiledocuments"]["MY_PROFILES"] = 'Temas de Interesse';
        self::$trans["myprofiledocuments"]["VIEW_RESULTS_IN"] = 'ver resultados em';
        self::$trans["myprofiledocuments"]["REMOVE_PROFILE"] = 'excluir tema';
        self::$trans["myprofiledocuments"]["EDIT_PROFILE"] = 'editar tema';
        self::$trans["myprofiledocuments"]["ADD_PROFILE"] = 'adicionar tema';
        self::$trans["myprofiledocuments"]["TOOLS"] = 'Meus temas';
        self::$trans["myprofiledocuments"]["SIMILARS_IN"] = 'Similares';
        self::$trans["myprofiledocuments"]["PROFILE_KEYWORDS"] = 'Palavras-chave';
        self::$trans["myprofiledocuments"]["PROFILE"] = 'Tema';
        self::$trans["myprofiledocuments"]["PROFILES"] = 'Temas';
        self::$trans["myprofiledocuments"]["PROFILE_NAME"] = 'Nome do tema';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT"] = 'Palavras-chave';
        self::$trans["myprofiledocuments"]["PROFILE_TEXT_HELP"] = 'Separe as palavras-chave por vírgula.';
        self::$trans["myprofiledocuments"]["PROFILE_DEFAULT"] = 'Definir como padrão';
        self::$trans["myprofiledocuments"]["SAVE"] = 'salvar';
        self::$trans["myprofiledocuments"]["CANCEL"] = 'cancelar';
        self::$trans["myprofiledocuments"]["REMOVE"] = 'excluir';
        self::$trans["myprofiledocuments"]["CLOSE"] = 'fechar';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_REGISTERS_FOUND"] = 'Nenhum registro encontrado';
        self::$trans["myprofiledocuments"]["MY_PROFILES_NO_SUGGESTIONS_FOUND"] = 'Nenhum documento encontrado. Tente atualizar o tema em <code>editar tema > salvar</code> ou altere as palavras-chave.';
        self::$trans["myprofiledocuments"]["SERVICE_TEMPORARY_UNAVAILABLE"] = 'Serviço temporariamente indisponível. Tente atualizar esse tema mais tarde.';
        self::$trans["myprofiledocuments"]["ADD"] = 'adicionar';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_SUCESS"] = 'Operação realizada com sucesso.';
        self::$trans["myprofiledocuments"]["ADD_PROFILE_ERROR"] = 'Erro ao adicionar tema';
        self::$trans["myprofiledocuments"]["PAGE"] = 'Página';
        self::$trans["myprofiledocuments"]["NEXT"] = 'Próximo';
        self::$trans["myprofiledocuments"]["PREVIOUS"] = 'Anterior';
        self::$trans["myprofiledocuments"]["ADD_COLLECTION"] = 'adicionar aos favoritos';
        self::$trans["myprofiledocuments"]["TO_COLLECTION"] = 'à coleção';
        self::$trans["myprofiledocuments"]["INCOMING_FOLDER"] = 'Caixa de Entrada';
        self::$trans["myprofiledocuments"]["ALERT"] = '<b>Atualização dos Temas de Interesse</b>';
        self::$trans["myprofiledocuments"]["UPDATE_ALERT"] = '<p>Os documentos exibidos nos temas de interesse podem mudar conforme a atualização das fontes de informação da BVS.</p><p>Por tanto, se algum documento é de seu interesse, adicione-o aos favoritos.</p>';
        self::$trans["myprofiledocuments"]["REMOVE_TOPIC"] = 'excluir';
        self::$trans["myprofiledocuments"]["REMOVE_TOPIC_CONFIRM"] = 'Tem certeza que deseja excluir';

    // Terms of mig_id_confirmation pages
        self::$trans["mig_id_confirmation"]["TITLE"] = 'Confirmação de Usuário';
        self::$trans["mig_id_confirmation"]["LOGIN"] = 'Usuário';
        self::$trans["mig_id_confirmation"]["CONFIRM"] = 'Confirmar';
        self::$trans["mig_id_confirmation"]["ALERT"] = 'Após a confirmação, este e-mail será o seu usuário de acesso ao serviço.';

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
        self::$trans["tour"]["STEP_S1"] = 'Clique nesse botão para visualizar os filtros que foram aplicados na busca. Aqui você também poderá exibir o resultado de cada busca na BVS (botão Exibir) ou combinar as buscas indicando o operador de combinação (botão Combinar).';

        self::$trans["tour"]["STEP_29"] = '<b>Links Favoritos</b><br />Organiza e facilita o acesso direto a seus Links Favoritos';
        self::$trans["tour"]["STEP_30"] = 'Lista dos seus Links Favoritos, com opções para remover ou editar cada link';
        self::$trans["tour"]["STEP_31"] = 'Adicione novo Link Favorito e crie sua própria biblioteca de links';
        self::$trans["tour"]["STEP_32"] = 'Ordene seus links por data ou pelo ranking de avaliação atribuído por você a cada link';
        
        self::$trans["tour"]["STEP_33"] = '<b>Minhas Publicações</b><br />Visualize suas publicações a partir do ORCID ID informado no seu Perfil';
        self::$trans["tour"]["STEP_34"] = 'Lista das publicações recuperadas a partir do seu ORCID ID. Você pode acessar cada documento no Google Scholar e saber quantas vezes sua publicação foi citada. Veja também documentos da BVS relacionados a sua publicação.';

        self::$trans["tour"]["STEP_35"] = '<b>RSS</b><br />Apresenta as últimas atualizações de documentos a partir do RSS de seus portais favoritos';
        self::$trans["tour"]["STEP_36"] = 'Clique nesse botão para adicionar uma nova RSS';
        self::$trans["tour"]["STEP_37"] = 'Visualize a lista dos RSS cadastrados';
        self::$trans["tour"]["STEP_38"] = 'Lista dos últimos documentos recuperados via RSS do seu portal favorito. Você pode: adicionar, editar ou excluir um RSS, adicionar aos favoritos ou ver documentos relacionados.';
        self::$trans["tour"]["LAST"] = 'Parabéns! Você concluiu o Tour e já sabe como funciona os serviços personalizados da <b>Minha BVS</b>. Use e divulgue este serviço. Envie suas dúvidas e sugestões para o <a style="text-decoration: underline;" href="http://feedback.bireme.org/feedback/?application=my-vhl&version=2.10-77&site=servplat&lang='.$_SESSION['lang'].'">Serviço de Feedback</a>';
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