<?php
require_once(dirname(__FILE__).'/../config.php');

$lang = isset($_SESSION['lang'])?$_SESSION['lang']:DEFAULT_LANG;

if($lang == 'pt'){
    /* tela de cadastro do usuário*/
    define('BIREME','BIREME | OPS | OMS');
    define('BUTTON_NEW_USER','Gravar');
    define('BUTTON_CANCEL','Cancelar');
    define('BUTTON_CLOSE','Fechar');
    define('BUTTON_SEND','Enviar');
    define("BUTTON_UPDATE_USER","Atualizar");
    define('BVSSIGLA','BVS');
    define('BVS','Passaporte BVS e SciELO');
    define('CONTACT_FORM','Formulário de contato');
    define('CHOOSE_DEGREE','selecionar');
    define('CHOOSE_COUNTRY','selecionar');
    define('DEGREE','Titulação');
    define('EMAIL_SENT','E-mail enviado.');
    define('FIELD_CONTACT_NAME','nome');
    define('FIELD_CONTACT_EMAIL','e-mail');
    define('FIELD_CONTACT_DESCRIPTION','descrição');
    define('FIELD_CONTACT_SUBJECT','assunto');
    define('FIELD_FIRST_NAME','Nome');
    define('FIELD_LAST_NAME','Sobrenome');
    define('FIELD_GENDER','Sexo');
    define('FIELD_EMAIL','E-mail alternativo');
    define('FIELD_AFILIATION','Instituição');
    define('FIELD_COUNTRY','País');
    define('FIELD_LOGIN','E-mail ou login');
    define('FIELD_LOGIN_CONFIRMATION','Confirme seu e-mail ou login');
    define('FIELD_PASSWORD','Senha');
    define('FIELD_PASSWORD_CONFIRMATION','Confirme sua senha');
    define('FIELD_GENDER_MALE','Masculino');
    define('FIELD_GENDER_FEMALE','Feminino');
    define("FIELD_FIRST_NAME_ERROR_DESCRIPTION","*");
    define("FIELD_LAST_NAME_ERROR_DESCRIPTION","*");
    define("FIELD_GENDER_ERROR_DESCRIPTION","*");
    define("FIELD_PASSWORD_ERROR_DESCRIPTION","*");
    define("FIELD_EMAIL_ERROR_DESCRIPTION","*");
    define("FIELD_LOGIN_ERROR_DESCRIPTION","*");
    define("FIELD_DEGREE","Ensino_Fundamental|Ensino Fundamental (1o Grau),Ensino_Medio|Ensino Médio (2o Grau),Ensino_Tecnico|Ensino Profissional De Nível Técnico,Graduacao|Graduação,Especializacao|Especialização,Mestrado_Profissionalizante|Mestrado Profissionalizante,Mestrado|Mestrado,Doutorado|Doutorado,MBA|MBA,Pos_Doutorado|Pós Doutorado,PHD|PHD");
    define("FREE_REGISTRY","Registre-se gratuitamente!");
    define("FREE_REGISTRY_MESSAGE","
<p>Bem-vindo ao passaporte das redes BVS e SciELO</p>
<p>O objetivo do passaporte é permitir que você utilize um único usuário e senha para ser reconhecido na rede Biblioteca Virtual em Saúde (BVS) e Scientific Eletronic Library Online (SciELO).</p>
<p>Registre-se e, além das fontes de informação da BVS e SciELO, acesse gratuitamente produtos e serviços de informação personalizados. </p>
");
    define("FOOTER_MESSAGE",'<p><a href="http://www.bireme.br/local/Site/bireme/homepage.htm" target="_blank">BIREME</a> é um Centro Especializado da OPAS, estabelecido no Brasil desde 1967, em colaboração com <a href="http://portal.saude.gov.br/saude/" target="_blank">Ministério de Saúde</a>, <a href="http://portal.mec.gov.br/" target="_blank">Ministério da Educação</a>, <a href="http://www.saude.sp.gov.br/" target="_blank">Secretaria da Saúde do Estado de São Paulo</a> e <a href="http://www.unifesp.br/" target="_blank">Universidade Federal de São Paulo</a></p>
                             <p><strong>BIREME - OPAS - OMS</strong><br/>
                                Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br/>
                                Rua Botucatu, 862 - 04023-901 - São Paulo/SP - Brasil - Tel: (55 11) 5576-9800 - Fax: (55 11) 5575-8868<br/></p>');
    define('LEARN_MORE','saiba mais');
    define('PERSONAL_DATA','Dados Pessoais');
    define('REGISTER_NEW_USER_TITLE','Cadastro de Novo Usuário');
    define('REQUIRED_FIELD_TEXT','campos obrigatórios');
    define('OPTIONAL_FIELD_TEXT','campos opcionais');
    define("TIP_LOGIN","O login de acesso deve ser o email do usuário, por exemplo: usuario@bireme.org");
    define("UPDATE_USER_TITLE","Atualização dos dados");
    define("USER_ADDED",'Usuário adicionado com sucesso.');
    define("USER_EXISTS","<b>Usuário já cadastrado</b><br />Tente se autenticar com este usuário, caso não lembre a senha de cadastro utilize o link  <b>esqueci minha senha</b> na caixa de login de usuários.");
    define("ADD_SUCCESS","<b>Usuário criado com sucesso</b><br />Seu usuário agora faz parte do passaporte da BVS<br />Você esta habilitado para se conectar nas aplicações da SciELO e BVS com este usuário");
    define("ADD_ERROR","<b>Erro no cadastro</b><br />Se seu email é um email Bireme. Neste caso seu usuário já possui login para acesso ao passaporte BVS, basta utilizar seu email e senha da Bireme para acessar esta aplicação.");
    define("USER_UPDATED",'Usuário atualizado com sucesso.');
    define("USER_UPDATE_ERROR",'<b>Problemas durante atualização</b><br />O sistema não conseguiu atualizar os dados do usuário. Tente mais tarde.');
    define("VALMSG_G_EMPTY","Campo obrigatório. Não pode ficar em branco.");
    define("VALMSG_LOGIN","Digite um email válido.");
    define("VALMSG_EMAIL","Digite um email válido.");
    define("NEWPASS_DOMAIN_NOT_PERMITTED",'Ação não permitida para este usuário. Entre em contato com o departamento de suporte da sua instituição.');
    define("NEWPASS_PASSWORD_SENT",'Uma nova senha foi enviada para o seu email.');
    define("NOTICE",'Mensagem ao usuário');
    define("NOTICE_MESSAGE",'
<h4>Seu login SciELO agora será o Passaporte das Redes BVS e SciELO</h4>
<p>Seu perfil cadastrado na plataforma SciELO também permite acesso aos produtos e serviços de informação da rede BVS. Para isso, seu usuário e senha cadastrados anteriormente estão unificados, passam a ser seu passaporte em qualquer aplicação da BVS ou da SciELO.
Se você possui usuário cadastrado no site ScIELO, na próxima vez que acessar o site SciELO ou BVS Regional, utilize sua conta de acesso, o sistema lhe indicará como atualizar seu login de usuário após sua autenticação.O e-mail cadastrado em seu usuário daqui para frente será utilizado para sua autenticação.</p>
<h4>Saiba mais</h4>
<p>A nova Plataforma de Serviços Integrada das redes Biblioteca Virtual em Saúde (BVS) e Scientific Eletronic Library Online (SciELO) permitirá que o conteúdo de ambas as redes possa ser acessado de forma integrada. Para isso, será necessário que você apenas se identifique por meio de seu passaporte, ou seja, seu usuário e senha. Se você é um novo usuário, registre-se aqui (link para o passaporte).</p>
<h4>Menor esforço para o usuário, maior uso dos conteúdos</h4>
<p>A maior novidade é que o passaporte dará acesso aos mesmos serviços personalizados na BVS ou na SciELO. Isto significa que você poderá selecionar documentos de interesse, definir sua própria coleção, acessar documentos relacionados a temas de seu interesse, selecionar notícias entre outros produtos e serviços de informação e salvá-los em seu perfil de usuário. Posteriormente, estes conteúdos continuarão acessíveis ao utilizar seu passaporte de acesso à BVS ou SciELO.</p>
<h4>Serviços gratuitos</h4>
<p>O registro e todos os produtos e serviços de informação continuarão gratuitos. As redes BVS e SciELO mantêm os princípios da modalidade de Acesso Aberto, portanto, da disponibilização da literatura científica e técnica na Internet sem custo para o usuário, licenças de uso ou barreiras restritivas de acesso.</p>
<p>Futuramente, as novidades serão aplicadas nas demais instâncias da BVS, em todas as regiões geográficas e áreas temáticas da BVS, por meio do conceito de passaporte BVS.</p>
');
    define('FIELD_LINKEDIN','LinkedIn (URL)');
    define('FIELD_RESEARCHGATE','ResearchGate (URL)');
    define('FIELD_ORCID','ORCID');
    define('FIELD_RESEARCHERID','ResearcherID');
    define('FIELD_LATTES','Lattes (URL)');

    define("DASHBOARD",'Meus Conteúdos');
    define("INDEX",'home');
    define("HOMEPAGE",'Visão Geral');
    define("WELCOME",'Bem-vindo');
    define("USERS_SERVICES",'Serviços Personalizados');
    define("OLA",'Olá');
    define("LOGOFF",'Sair');
    define("MY_PROFILE_DOCUMENTS",'Temas de Interesse');
    define("MY_SHELF",'Documentos Favoritos');
    define("MY_LINKS",'Links Favoritos');
    define("MY_NEWS",'Minhas Notícias');
    define("FORGOT_MY_PASSWORD",'esqueci minha senha');
    define("CHANGE_PASSWORD",'Alterar Senha');
    define("MY_DATA",'Editar Perfil');
    define("MY_ALERTS",'Meus Alertas');
    define("SEARCH",'Pesquisar');
    define("SEARCH_FOR",'Pesquisar por...');
    define("MY_SEARCHES",'Histórico de Buscas na BVS');
    define("KEYWORDS",'Palavras-chave');
    define("SUGGESTED_DOCS",'Documentos Relacionados');
    define("ORCID_WORKS",'ORCID - Minhas Publicações');
    define("RECENT_ACTIVITIES",'Atividades Recentes');
    define("SEE_ALL_DOCS",'Ver todos os documentos');
    define("SEE_ALL_LINKS",'Ver todos os links');
    define("SEE_ALL_PROFILES",'Ver todos os temas');
    define("ADD_COLLECTION",'Coleção adicionada');
    define("UPDATE_COLLECTION",'Coleção atualizada');
    define("REMOVE_COLLECTION",'Coleção removida');
    define("ADD_PROFILE",'Tema adicionado');
    define("UPDATE_PROFILE",'Tema atualizado');
    define("REMOVE_PROFILE",'Tema removido');
    define("ADD_LINK",'Link adicionado');
    define("UPDATE_LINK",'Link atualizado');
    define("REMOVE_LINK",'Link removido');
    define("QUERY",'Query');
    define("VIEW",'Exibir');
    define("SEARCH_WIDGET",'Buscas na BVS');
    define("PROFILE_WIDGET",'Temas de Interesse');
    define("SHELF_WIDGET",'Documentos das Coleções');
}

if($lang == 'es'){
    /* tela de cadastro do usuário*/
    define('BIREME','BIREME | OPS | OMS');
    define('BUTTON_NEW_USER','Grabar');
    define('BUTTON_CANCEL','Cancelar');
    define('BUTTON_CLOSE','Fechar');
    define('BUTTON_SEND','Enviar');
    define("BUTTON_UPDATE_USER","Actualizar");
    define('BVSSIGLA','BVS');
    define('BVS','Pasaporte BVS e SciELO');
    define('CONTACT_FORM','Formulário para contacto');
    define('CHOOSE_DEGREE','elijir');
    define('CHOOSE_COUNTRY','elijir');
    define('DEGREE','Título');
    define('EMAIL_SENT','E-mail enviado.');
    define('FIELD_CONTACT_NAME','nombre');
    define('FIELD_CONTACT_EMAIL','e-mail');
    define('FIELD_CONTACT_DESCRIPTION','descripción');
    define('FIELD_CONTACT_SUBJECT','tema');
    define('FIELD_FIRST_NAME','Nombre');
    define('FIELD_LAST_NAME','Apellido');
    define('FIELD_GENDER','Sexo');
    define('FIELD_EMAIL','E-mail alternativo');
    define('FIELD_AFILIATION','Instituición');
    define('FIELD_COUNTRY','País');
    define('FIELD_LOGIN','E-mail o login');
    define('FIELD_LOGIN_CONFIRMATION','Confirme su e-mail o login');
    define('FIELD_PASSWORD','Contraseña');
    define('FIELD_PASSWORD_CONFIRMATION','Confirme su contrasenã');
    define('FIELD_GENDER_MALE','Masculino');
    define('FIELD_GENDER_FEMALE','Feminino');
    define("FIELD_DEGREE","Ensino_Fundamental|Enseñanza o Educación Básica,Ensino_Medio|Enseñanza o Educación Media,Ensino_Tecnico|Enseñanza o Educación Técnico-Profesional,Graduacao|Superior Universitario de Grado,Especializacao|Especialización,Mestrado_Profissionalizante|Maestría Profisionalizante,Mestrado|Maestría,Doutorado|Doctorado,MBA|MBA,Pos_Doutorado|Pos Doctorado,PHD|PHD");
    define("FREE_REGISTRY","Registrese Gratuitamente!");
    define("FREE_REGISTRY_MESSAGE","
<p>Bem-vindo ao passaporte das redes BVS e SciELO</p>
<p>O objetivo do passaporte é permitir que você utilize um único usuário e senha para ser reconhecido na rede Biblioteca Virtual em Saúde (BVS) e Scientific Eletronic Library Online (SciELO).</p>
<p>Registre-se e, além das fontes de informação da BVS e SciELO, acesse gratuitamente produtos e serviços de informação personalizados. </p>
");
    define("FOOTER_MESSAGE",'<p><a href="http://www.bireme.br/local/Site/bireme/homepage.htm" target="_blank">BIREME</a> é um Centro Especializado da OPAS, estabelecido no Brasil desde 1967, em colaboração com <a href="http://portal.saude.gov.br/saude/" target="_blank">Ministério de Saúde</a>, <a href="http://portal.mec.gov.br/" target="_blank">Ministério da Educação</a>, <a href="http://www.saude.sp.gov.br/" target="_blank">Secretaria da Saúde do Estado de São Paulo</a> e <a href="http://www.unifesp.br/" target="_blank">Universidade Federal de São Paulo</a></p>
                             <p><strong>BIREME - OPAS - OMS</strong><br/>
                             Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br/>
                             Rua Botucatu, 862 - 04023-901 - São Paulo/SP - Brasil - Tel: (55 11) 5576-9800 - Fax: (55 11) 5575-8868</p>');
    define('LEARN_MORE','sepa mas');
    define('PERSONAL_DATA','Datos Personales');
    define('REGISTER_NEW_USER_TITLE','Cadastro de Nuevo Usuario');
    define('REQUIRED_FIELD_TEXT','campos obligatórios');
    define('OPTIONAL_FIELD_TEXT','campos opcionales');
    define("TIP_LOGIN","El login de acceso debrá ser el email del usuário, por ejemplo: usuario@bireme.org");
    define("UPDATE_USER_TITLE","Atualización de los datos");
    define("USER_ADDED",'Usuario añadido con succeso.');
    define("USER_EXISTS","<b>Usuário ya cadastrado</b><br />Pruebe autenticarse con ese usuário, si no te acuerdas de la contraseña utilize el link  <b>esqueci minha senha</b> en la caja de login de usuários.");
    define("ADD_ERROR","<b>Erro en el registro</b><br />Si su email es un email de Bireme. En ese caso su usuário ya tiene login para acceso a los aplicativos de la BVS, basta utilizar su email y contraseña de Bireme para acceder a esa aplicación.");
    define("ADD_SUCCESS","<b>Usuário añadido con succeso</b><br />Su usuário ahora hace parte del passaporte de la BVS<br />Usted esta habilitado para conectarse en las aplicaciones de SciELO y BVS con ese usuário.");
    define("USER_UPDATED",'Usuario actualizado con succeso.');
    define("USER_UPDATE_ERROR",'<b>Problemas en la actualización</b><br />El sistema no logro actualizar los datos del usuário. Tente mas tardera.');
    define("VALMSG_G_EMPTY","Campo obligatório. Não puede quedarse en blanco.");
    define("VALMSG_LOGIN","Digite un email válido.");
    define("VALMSG_EMAIL","Digite un email válido.");

    define("NEWPASS_DOMAIN_NOT_PERMITTED",'Acción no permitida para el usuário. Contacte el departamiento de soporte de su institución.');
    define("NEWPASS_PASSWORD_SENT",'Una nueva contraseña fue enviada para su email.');
    define("NOTICE",'Mensaje al usuário');
    define("NOTICE_MESSAGE",'
<h4>Su login SciELO ahora será el Pasaporte de las Redes BVS y SciELO</h4>
<p>Su perfil cadastrado en la plataforma SciELO también permite acceso a los productos y servícios de información de la red BVS. Para eso, su usuário y contraseña cadastrados anteriormente en SciELO ahora estan unificados, pasarán a ser su pasaporte en cualquier aplicación de la BVS o SciELO.
Si usted tiene usuário cadastrado en el sitio ScIELO, la próxima vez que acceder al sitio SciELO o BVS Regional, utilize su cuenta de acceso. El sistema le indicará como actualizar su login de usuário. El e-mail cadastrado en su usuário ahora será utilizado para su autenticación.</p>
<h4>Sepa mas</h4>
<p>La nueva Plataforma de Servicios Integrada de las redes Biblioteca Virtual em Salud (BVS) y Scientific Electronic Library Online (SciELO), permitira que se pueda acceder el contenído de ambas las redes de modo integrado. Para eso, sera neceario que usted solamente se identifique por medio de su passaporte, o sea, su usuário y contraseña. Si usted es un nuevo usuario, se registre aqui.</p>
<h4>Menor esfuerzo para el usuario, mayor uso de los contenidos</h4>
<p>La mayor novidad es que el passaporte dara acceso a los mismos servicios personalizados en la BVS y SciELO. Eso significa que usted podrá elijir documentos de  su interez, definir su propria colección, acceder documentos relacionados a temas de su interez, elijir noticias de otros productos y servicios de información y grabarlos em su perfil de usuário. Posteriormente, eses contenidos continuaran disponibles cuando autenticarse com su passaporte de acceso a BVS o SciELO.</p>
<h4>Servicios gratuitos</h4>
<p>El registro y todos los productis y servicios de información continuaran gratuitos. Las redes BVS e SciELO mantienem los princípios del Acceso Abierto, portanto, da disponibilización de la literatura cientifica e tecnica em la Iternet sin costo para el usuario, licensas de uso o barreras restritivas de acceso.</p>
<p>En el futuro, las novidades seran aplicadas en otras instancias de productos de la BVS, en todas las regiones geograficas y areas tematicas de la BVS, por medio del concepto de pasaporte BVS y SciELO</p>
');
    define('FIELD_LINKEDIN','LinkedIn (URL)');
    define('FIELD_RESEARCHGATE','ResearchGate (URL)');
    define('FIELD_ORCID','ORCID');
    define('FIELD_RESEARCHERID','ResearcherID');
    define('FIELD_LATTES','Lattes (URL)');

    define("DASHBOARD",'Meus Conteúdos');
    define("INDEX",'home');
    define("HOMEPAGE",'Visão Geral');
    define("WELCOME",'Bem-vindo');
    define("USERS_SERVICES",'Serviços Personalizados');
    define("OLA",'Olá');
    define("LOGOFF",'Sair');
    define("MY_PROFILE_DOCUMENTS",'Temas de Interesse');
    define("MY_SHELF",'Documentos Favoritos');
    define("MY_LINKS",'Links Favoritos');
    define("MY_NEWS",'Minhas Notícias');
    define("FORGOT_MY_PASSWORD",'esqueci minha senha');
    define("CHANGE_PASSWORD",'Alterar Senha');
    define("MY_DATA",'Editar Perfil');
    define("MY_ALERTS",'Meus Alertas');
    define("SEARCH",'Pesquisar');
    define("SEARCH_FOR",'Pesquisar por...');
    define("MY_SEARCHES",'Histórico de Buscas na BVS');
    define("KEYWORDS",'Palavras-chave');
    define("SUGGESTED_DOCS",'Documentos Relacionados');
    define("ORCID_WORKS",'ORCID - Minhas Publicações');
    define("RECENT_ACTIVITIES",'Atividades Recentes');
    define("SEE_ALL_DOCS",'Ver todos os documentos');
    define("SEE_ALL_LINKS",'Ver todos os links');
    define("SEE_ALL_PROFILES",'Ver todos os temas');
    define("ADD_COLLECTION",'Coleção adicionada');
    define("UPDATE_COLLECTION",'Coleção atualizada');
    define("REMOVE_COLLECTION",'Coleção removida');
    define("ADD_PROFILE",'Tema adicionado');
    define("UPDATE_PROFILE",'Tema atualizado');
    define("REMOVE_PROFILE",'Tema removido');
    define("ADD_LINK",'Link adicionado');
    define("UPDATE_LINK",'Link atualizado');
    define("REMOVE_LINK",'Link removido');
    define("QUERY",'Query');
    define("VIEW",'Exibir');
    define("SEARCH_WIDGET",'Buscas na BVS');
    define("PROFILE_WIDGET",'Temas de Interesse');
    define("SHELF_WIDGET",'Documentos das Coleções');
}

if($lang == 'en'){
    /* tela de cadastro do usuário*/
    define('BIREME','BIREME | OPS | OMS');
    define('BUTTON_NEW_USER','Create');
    define('BUTTON_CANCEL','Cancel');
    define('BUTTON_CLOSE','Close');
    define('BUTTON_SEND','Send');
    define("BUTTON_UPDATE_USER","Update");
    define('BVSSIGLA','BVS');
    define('BVS','VHL and SciELO Passport');
    define('CONTACT_FORM','Contact form');
    define('CHOOSE_DEGREE','choose');
    define('CHOOSE_COUNTRY','choose');
    define('DEGREE','Degree');
    define('EMAIL_SENT','E-mail sent.');
    define('FIELD_CONTACT_NAME','name');
    define('FIELD_CONTACT_EMAIL','e-mail');
    define('FIELD_CONTACT_DESCRIPTION','description');
    define('FIELD_CONTACT_SUBJECT','subject');
    define('FIELD_FIRST_NAME','Name');
    define('FIELD_LAST_NAME','Surname');
    define('FIELD_GENDER','Gender');
    define('FIELD_EMAIL','Secondary E-mail');
    define('FIELD_AFILIATION','Institution');
    define('FIELD_COUNTRY','Country');
    define('FIELD_LOGIN','E-mail or login');
    define('FIELD_LOGIN_CONFIRMATION','E-mail or login confirmation');
    define('FIELD_PASSWORD','Password');
    define('FIELD_PASSWORD_CONFIRMATION','Password confirmation');
    define('FIELD_GENDER_MALE','Male');
    define('FIELD_GENDER_FEMALE','Female');
    define("FIELD_DEGREE","Ensino_Fundamental|Basic Education,Ensino_Medio|High School,Ensino_Tecnico|Technical Studies,Graduacao|Graduate Study,Especializacao|Specialization,Mestrado_Profissionalizante|Professional Master's Degree,Mestrado|Master's Degree,Doutorado|Doctorate,MBA|MBA,Pos_Doutorado|Post Doctorate,PHD|PHD");
    define("FREE_REGISTRY","Register for free!");
    define("FREE_REGISTRY_MESSAGE","
<p><p>Welcome to the VHL and SciELO network passport!</p>
<p>The goal of the passport is to allow you to use a single user name and password to be recognized on the Virtual Health Library (VHL) and Scientific Electronic Library Online (SciELO) network.</p>
<p>Register and in addition to information sources in the VHL and SciELO, have access to free products and personalized information services.</p>
");
    define("FOOTER_MESSAGE",'<p><a href="http://www.bireme.br/local/Site/bireme/homepage.htm" target="_blank">BIREME</a> é um Centro Especializado da OPAS, estabelecido no Brasil desde 1967, em colaboração com <a href="http://portal.saude.gov.br/saude/" target="_blank">Ministério de Saúde</a>, <a href="http://portal.mec.gov.br/" target="_blank">Ministério da Educação</a>, <a href="http://www.saude.sp.gov.br/" target="_blank">Secretaria da Saúde do Estado de São Paulo</a> e <a href="http://www.unifesp.br/" target="_blank">Universidade Federal de São Paulo</a></p>
                             <p><strong>BIREME - OPAS - OMS</strong><br/>
                             Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br/>
                             Rua Botucatu, 862 - 04023-901 - São Paulo/SP - Brasil - Tel: (55 11) 5576-9800 - Fax: (55 11) 5575-8868<br/></p>');
    define('LEARN_MORE','learn more');
    define('PERSONAL_DATA','Personal Data');
    define('REGISTER_NEW_USER_TITLE','Subscription Form');
    define('REQUIRED_FIELD_TEXT','required fields');
    define('OPTIONAL_FIELD_TEXT','optional fields');
    define("TIP_LOGIN","The access login needs to be the user mail, eg: user@bireme.org");
    define("UPDATE_USER_TITLE","Update user");
    define("USER_ADDED",'User added');
    define("USER_EXISTS","<b>User already exists</b><br />Try to login with this user, if you have no success trying to authenticate with this user and don't remember the password, use the link  <b>forgot my password</b> in the user login box.");
    define("ADD_ERROR","<b>Registry error</b><br />Your mail is a Bireme mail. In this case your user already have on login to access the BVS aplications, just use you network login and password to have access to this application.");
    define("ADD_SUCCESS","<b>User success registered</b><br />Your user is now registered in the VHL Passport<br />You are able to connect in SciELO and BVS applications with this user.");
    define("USER_UPDATED",'User updated');
    define("USER_UPDATE_ERROR",'<b>Problems updating user data</b><br />The applications doesn\'t success to update the user data. Try again later.');
    define("VALMSG_G_EMPTY","Mandatory field.");
    define("VALMSG_LOGIN","Type a valid mail.");
    define("VALMSG_EMAIL","Type a valid mail.");

    define("NEWPASS_DOMAIN_NOT_PERMITTED",'Action not allowed for this User. Please contact the support department of your institution.');    
    define("NEWPASS_PASSWORD_SENT",'A new password was sent to your email.');
    define("NOTICE",'Notice to the users');
    define("NOTICE_MESSAGE",'
<h4>Now your SciELO Login will be the Passaport to BVS and SciELO network.</h4>
<p>Your SciELO Platform profile allow you to have access to the products and information services from VHL network. For this, your user and password previously registered  in SciELO now are unified, they become your passport in any BVS and SciELO applications.
If you have a registered user in ScIELO website, the next time you access SciELO or VHL websites, use your SciELO access acount. The application will guide you how to update your SciELO acount. The e-mail registered in you user account know will be used to you authentication.</p>
<h4>Learn More</h4>
<p>The new Integrated Services Platform for Virtual Health Library (VHL) and Scientific Electronic Library Online (SciELO) networks will allow the contents of both networks to be accessed seamlessly. This will require you to identify yourself through your passport, or your user name and password. If you are a new user, register here (link to the passport).</p>
<h4>Less work for the user, more use for contents</h4>
<p>The biggest news is that the passport will give access to the same personalized services on the VHL and SciELO network. This means you can select documents of interest, define your own collection, access documents related to your interest topics, news and other select products and services information and save them on your User Profile. Subsequently, these contents remain accessible when using your passport to access VHL and SciELO sites.</p>
<h4>Free Services</h4>
<p>The registration, all products and information services will remain free. The VHL and SciELO maintain the principles of open access, thus providing the scientific and technical literature on the Internet without cost to the user, usage license or barriers restricting access.</p>
<p>In the future, these new features will be applied in other instances of VHL in all geographical regions and thematic areas of the VHL, through the concept of passport VHL and SciELO.</p>
');
    define('FIELD_LINKEDIN','LinkedIn (URL)');
    define('FIELD_RESEARCHGATE','ResearchGate (URL)');
    define('FIELD_ORCID','ORCID');
    define('FIELD_RESEARCHERID','ResearcherID');
    define('FIELD_LATTES','Lattes (URL)');

    define("DASHBOARD",'Meus Conteúdos');
    define("INDEX",'home');
    define("HOMEPAGE",'Visão Geral');
    define("WELCOME",'Bem-vindo');
    define("USERS_SERVICES",'Serviços Personalizados');
    define("OLA",'Olá');
    define("LOGOFF",'Sair');
    define("MY_PROFILE_DOCUMENTS",'Temas de Interesse');
    define("MY_SHELF",'Documentos Favoritos');
    define("MY_LINKS",'Links Favoritos');
    define("MY_NEWS",'Minhas Notícias');
    define("FORGOT_MY_PASSWORD",'esqueci minha senha');
    define("CHANGE_PASSWORD",'Alterar Senha');
    define("MY_DATA",'Editar Perfil');
    define("MY_ALERTS",'Meus Alertas');
    define("SEARCH",'Pesquisar');
    define("SEARCH_FOR",'Pesquisar por...');
    define("MY_SEARCHES",'Histórico de Buscas na BVS');
    define("KEYWORDS",'Palavras-chave');
    define("SUGGESTED_DOCS",'Documentos Relacionados');
    define("ORCID_WORKS",'ORCID - Minhas Publicações');
    define("RECENT_ACTIVITIES",'Atividades Recentes');
    define("SEE_ALL_DOCS",'Ver todos os documentos');
    define("SEE_ALL_LINKS",'Ver todos os links');
    define("SEE_ALL_PROFILES",'Ver todos os temas');
    define("ADD_COLLECTION",'Coleção adicionada');
    define("UPDATE_COLLECTION",'Coleção atualizada');
    define("REMOVE_COLLECTION",'Coleção removida');
    define("ADD_PROFILE",'Tema adicionado');
    define("UPDATE_PROFILE",'Tema atualizado');
    define("REMOVE_PROFILE",'Tema removido');
    define("ADD_LINK",'Link adicionado');
    define("UPDATE_LINK",'Link atualizado');
    define("REMOVE_LINK",'Link removido');
    define("QUERY",'Query');
    define("VIEW",'Exibir');
    define("SEARCH_WIDGET",'Buscas na BVS');
    define("PROFILE_WIDGET",'Temas de Interesse');
    define("SHELF_WIDGET",'Documentos das Coleções');
}
?>

