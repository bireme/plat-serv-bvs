<?php
require_once(dirname(__FILE__).'/../config.php');

$lang = isset($_SESSION['lang'])?$_SESSION['lang']:DEFAULT_LANG;

if($lang == 'pt'){
    /* tela de cadastro do usuário*/
    define("MY_VHL",'Minha BVS');
    define("SERVPLAT",'Plataforma de Serviços');
    define('BIREME','BIREME | OPAS | OMS');
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
    define('DEGREE','Nível acadêmico');
    define('PROFESSIONAL_AREA','Área de atuação profissional');
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
    define('FIELD_OLD_PASSWORD','Atual');
    define('FIELD_NEW_PASSWORD','Nova');
    define('FIELD_NEW_PASSWORD_CONFIRM','Digite novamente');
    define('FIELD_PASSWORD_CONFIRMATION','Confirme sua senha');
    define('FIELD_GENDER_MALE','Masculino');
    define('FIELD_GENDER_FEMALE','Feminino');
    define('FIELD_BIRTHDAY','Data de nascimento');
    define("FIELD_DEGREE","Ensino_Fundamental|Ensino Fundamental (1o Grau),Ensino_Medio|Ensino Médio (2o Grau),Ensino_Tecnico|Ensino Profissional De Nível Técnico,Graduacao|Graduação,Especializacao|Especialização,Mestrado_Profissionalizante|Mestrado Profissionalizante,Mestrado|Mestrado,Doutorado|Doutorado,MBA|MBA,Pos_Doutorado|Pós Doutorado,PHD|PHD");
    define("FREE_REGISTRY","Registre-se gratuitamente!");
    define("FREE_REGISTRY_MESSAGE",'
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
<p>Tenha acesso gratuito aos produtos e serviços de informação da Minha BVS. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">Saiba mais</a><p>
');
    define("MY_VHL_DESCRIPTION",'
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
</ul>
');
    define('MY_VHL_ENTRY','Já está registrado na Minha BVS?');
    define('ENTER','Entrar');
    define("FOOTER_MESSAGE",'<p><strong>BIREME - OPAS - OMS</strong><br/>
Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br />
Área de Gestão do Conhecimento, Bioética e Pesquisa - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Minha BVS">http://www.paho.org/bireme/</a><br /></p>');
    define('LEARN_MORE','saiba mais');
    define('PERSONAL_DATA','Dados Pessoais');
    define('REGISTER_NEW_USER_TITLE','Cadastro de Novo Usuário');
    define('REQUIRED_FIELD_TEXT','campos obrigatórios');
    define('OPTIONAL_FIELD_TEXT','campos opcionais');
    define("TIP_LOGIN","O login de acesso deve ser o email do usuário, por exemplo: usuario@bireme.org");
    define("UPDATE_USER_TITLE","Atualização dos dados");
    define("USER_ADDED",'Usuário adicionado com sucesso.');
    define("USER_EXISTS","<b>Usuário já cadastrado</b><br />Tente autenticar-se com este usuário. Caso não lembre a senha de cadastro,<br />utilize o link  <b>\"esqueci minha senha\"</b> na caixa de login de usuários.");
    define("USER_ADD_ERROR","<b>Erro no cadastro</b><br />Se seu email é um email Bireme. Neste caso seu usuário já possui login para acesso ao passaporte BVS, basta utilizar seu email e senha da Bireme para acessar esta aplicação.");
    //define("USER_ADD_SUCCESS","<b>Usuário criado com sucesso</b><br />Seu usuário agora faz parte do passaporte da BVS<br />Você esta habilitado para se conectar nas aplicações da SciELO e BVS com este usuário");
    define("USER_ADD_SUCCESS","<b>Usuário criado com sucesso!</b>");
    define("USER_SEND_CONFIRMATION","<b>Cadastro de usuário realizado com sucesso!</b><br />Enviamos para o seu e-mail um link de confirmação da sua conta.<br />Favor clicar no link enviado para ativar sua conta na Minha BVS.");
    define("USER_UPDATED",'Usuário atualizado com sucesso.');
    define("USER_PASSWORD_UPDATE",'Senha atualizada com sucesso!');
    define("USER_UPDATE_ERROR",'<b>Problemas durante atualização</b><br />O sistema não conseguiu atualizar os dados do usuário. Tente mais tarde.');
    define("USER_CONFIRMED",'<b>Sua conta foi confirmada com sucesso!</b><br />A senha de acesso do seu usuário foi enviada por e-mail.<br />Por favor, acesse o seu perfil na Minha BVS e complete seu cadastro.');
    define("USER_ADD_CONFIRMED",'<b>Usuário criado com sucesso!</b><br />A senha de acesso do seu usuário foi enviada por e-mail.');
    define("USER_CONFIRMATION_ERROR",'<b>ERRO: Não foi possível realizar a confirmação de conta.</b');
    define("VALMSG_G_EMPTY","Campo obrigatório. Não pode ficar em branco.");
    define("VALMSG_LOGIN","Digite um email válido.");
    define("VALMSG_EMAIL","Digite um email válido.");
    
    define("NEWPASS_INVALID_PASSWORD",'Senha inválida');
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
    define("UPDATE_INFO",'<b>Por favor, revise seus dados no formulário abaixo para continuar utilizando a Minha BVS.</b>');
    define("ACCEPT_MAIL",'Gostaria de receber e-mails com informações da Minha BVS');
    define("TERMS",'Termos de uso');
    define("TERMS_AGREEMENT_MESSAGE",'Eu concordo com os <a data-toggle="modal" data-target=".bs-terms-modal-lg" style="cursor: pointer; text-decoration: underline;">Termos</a> e confirmo que li a <a data-toggle="modal" data-target=".bs-policy-modal-lg" style="cursor: pointer; text-decoration: underline;">Política de Dados</a> da Minha BVS');
    define("TERMS_MESSAGE",'
<div class="terms">
<h3>Terms and Conditions</h3>

<h4>General</h4>

<p>Servicing servicing resistor <strong>video computer</strong> element transponder prototype analog solution mainframe network. Solution video debugged feedback sampling extended, infrared, generator generator. </p>

<ul>
<li>list item number one</li>
<li>list item number two</li>
<li>list item number three</li>
</ul>

<p>Harmonic gigabyte generator in <strong>sequential interface</strong>. Services, integer device read-only supporting cascading cache capacitance. Proxy boolean solution or data overflow element overflow processor arrray video, reflective extended. Gigabyte debugged distributed, reflective controller disk encapsulated phase network arrray feedback element cache high silicon. Sampling backbone analog remote adaptive extended bridgeware n-tier integer audio femtosecond. </p>

<h4>Important Stuff</h4>

<p>Interface broadband <strong>developer backbone fragmentation</strong> messaging software transmission, sampling cascading element high silicon backbone. Reflective servicing coordinated boolean connectivity extended inversion sequential for. Data distributed backbone bridgeware connectivity logarithmic, sampling ethernet for. Extended logarithmic log video echo gigabyte. Or procedural phaselock sequential port extended deviation sequential, disk recognition gigabyte phaselock proxy messaging arrray. Encapsulated echo deviation boolean system ethernet reducer, pc. </p>

<p><strong>Backbone frequency echo ethernet</strong> patch femtosecond sampling, integer digital floating-point n-tier dithering disk. Processor reflective boolean includes phase deviation, with log, integral logistically femtosecond, in, integral infrared phaselock. Element developer pc harmonic, plasma with, integral floating-point. Reflective feedback infrared, echo anomoly integral generator reflective led, high overflow servicing gigabyte. Extended integral data, infrared frequency disk broadband transistorized processor disk anomoly, sampling potentiometer kilohertz. Bus overflow, bridgeware fragmentation bypass prototype, interface, for internet pc generator integral, bypass disk, frequency. </p>

<h4>Fees</h4>

<p>Sequential <strong>encapsulated resistor</strong> element converter pc harmonic. Feedback cache hyperlinked debugged generator infrared device network, fragmentation connectivity, debugged. For, dithering interface debugged sequential recognition bypass bridgeware processor backbone sampling logarithmic software. Anomoly infrared logarithmic logarithmic procedural plasma resistor integral silicon deviation. Computer broadband plasma, encapsulated cable kilohertz scan. With logarithmic bridgeware indeterminate sampling, port. Development procedural hyperlinked mainframe, encapsulated boolean software processor transistorized cable with backbone. </p>

<p>Reflective backbone log transmission cable logarithmic mainframe. Messaging backbone debugged feedback development phaselock metafile n-tier coordinated, cable coordinated coordinated in. <strong>Analog device</strong> transistorized, sequential transistorized with scalar normalizing. Mainframe phase cache anomoly feedback servicing harmonic. Services software pc, femtosecond bypass scalar data element extended cascading capacitance harmonic. Adaptive plasma bypass supporting cascading deviation system pulse broadband bridgeware. </p>

<h4>Agreement</h4>

<p>Servicing hyperlinked analog encapsulated disk cable with, capacitance element partitioned potentiometer read-only dithering. <strong>Normalizing kilohertz</strong> network solution logarithmic device bus connectivity system mainframe prototype phaselock phase cache. </p>

<p>Coordinated transmission overflow floating-point distributed supporting scan converter. <strong>Bridgeware backbone</strong> coordinated sampling overflow broadband normalizing connectivity or, internet transmission, bus, encapsulated. Extended element element echo messaging scan, cache video deviation debugged broadband. Pc, supporting hyperlinked coordinated patch, bridgeware transistorized, led frequency scalar. Servicing, plasma recursive boolean includes, computer, femtosecond inversion. Services integer harmonic mainframe scalar prototype broadband n-tier. Echo software application indeterminate dithering bypass plasma bus harmonic patch. Digital, mainframe scalar anomoly bypass, bus potentiometer phaselock plasma, phaselock prompt data disk inversion. </p>
</div>
');
    define('DATA_POLICY_MESSAGE',TERMS_MESSAGE);
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
    define("FORGOT_PASSWORD",'Esqueceu sua senha?');
    define("FORGOT_MY_PASSWORD",'esqueci minha senha');
    define("CHANGE_PASSWORD",'Alterar Senha');
    define("RECOVER_PASSWORD",'Recuperar Senha');
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
    define("START_TOUR",'Iniciar Tour');
}

if($lang == 'es'){
    /* tela de cadastro do usuário*/
    define("MY_VHL",'Mi BVS');
    define("SERVPLAT",'Plataforma de Servicios');
    define('BIREME','BIREME | OPS | OMS');
    define('BUTTON_NEW_USER','Grabar');
    define('BUTTON_CANCEL','Cancelar');
    define('BUTTON_CLOSE','Cerrar');
    define('BUTTON_SEND','Enviar');
    define("BUTTON_UPDATE_USER","Actualizar");
    define('BVSSIGLA','BVS');
    define('BVS','Pasaporte BVS y SciELO');
    define('CONTACT_FORM','Formulário para contacto');
    define('CHOOSE_DEGREE','elijir');
    define('CHOOSE_COUNTRY','elijir');
    define('DEGREE','Nível académico');
    define('PROFESSIONAL_AREA','Área de actuación profesional');
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
    define('FIELD_OLD_PASSWORD','Actual');
    define('FIELD_NEW_PASSWORD','Nueva');
    define('FIELD_NEW_PASSWORD_CONFIRM','Repetir contraseña nueva');
    define('FIELD_PASSWORD_CONFIRMATION','Confirme su contrasenã');
    define('FIELD_GENDER_MALE','Masculino');
    define('FIELD_GENDER_FEMALE','Feminino');
    define('FIELD_BIRTHDAY','Fecha de nacimiento');
    define("FIELD_DEGREE","Ensino_Fundamental|Enseñanza o Educación Básica,Ensino_Medio|Enseñanza o Educación Media,Ensino_Tecnico|Enseñanza o Educación Técnico-Profesional,Graduacao|Superior Universitario de Grado,Especializacao|Especialización,Mestrado_Profissionalizante|Maestría Profisionalizante,Mestrado|Maestría,Doutorado|Doctorado,MBA|MBA,Pos_Doutorado|Pos Doctorado,PHD|PHD");
    define("FREE_REGISTRY","Registrese Gratuitamente!");
    define("FREE_REGISTRY_MESSAGE",'
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
<p>Tenha acesso gratuito aos produtos e serviços de informação da Minha BVS. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">Saiba mais</a><p>
');
    define("MY_VHL_DESCRIPTION",'
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
</ul>
');
    define('MY_VHL_ENTRY','Já está registrado na Minha BVS?');
    define('ENTER','Entrar');
    define("FOOTER_MESSAGE",'<p><strong>BIREME - OPAS - OMS</strong><br/>
Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud<br />
Area de Gestión del Conocimiento, Bioética e Investigación - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Mi BVS">http://www.paho.org/bireme</a><br /></p>');
    define('LEARN_MORE','sepa mas');
    define('PERSONAL_DATA','Datos Personales');
    define('REGISTER_NEW_USER_TITLE','Cadastro de Nuevo Usuario');
    define('REQUIRED_FIELD_TEXT','campos obligatórios');
    define('OPTIONAL_FIELD_TEXT','campos opcionales');
    define("TIP_LOGIN","El login de acceso debrá ser el email del usuário, por ejemplo: usuario@bireme.org");
    define("UPDATE_USER_TITLE","Atualización de los datos");
    define("USER_ADDED",'Usuario añadido con succeso.');
    define("USER_EXISTS","<b>Usuário ya cadastrado</b><br />Pruebe autenticarse con ese usuário, si no te acuerdas de la contraseña,<br />utilize el link  <b>\"olvide mi contraseña\"</b> en la caja de login de usuários.");
    define("USER_ADD_ERROR","<b>Erro en el registro</b><br />Si su email es un email de Bireme. En ese caso su usuário ya tiene login para acceso a los aplicativos de la BVS, basta utilizar su email y contraseña de Bireme para acceder a esa aplicación.");
    //define("USER_ADD_SUCCESS","<b>Usuário añadido con succeso</b><br />Su usuário ahora hace parte del passaporte de la BVS<br />Usted esta habilitado para conectarse en las aplicaciones de SciELO y BVS con ese usuário.");
    define("USER_ADD_SUCCESS","<b>¡Usuário añadido con succeso!</b>");
    define("USER_SEND_CONFIRMATION","<b>¡Registro de usuario realizado con éxito!</b><br />Enviamos a su e-mail un enlace de confirmación de su cuenta.<br />Por favor haga clic en el enlace enviado para activar su cuenta en la Mi BVS.");
    define("USER_UPDATED",'Usuario actualizado con succeso.');
    define("USER_PASSWORD_UPDATE",'¡Contraseña actualizada con succeso!');
    define("USER_UPDATE_ERROR",'<b>Problemas en la actualización</b><br />El sistema no logro actualizar los datos del usuário. Tente mas tardera.');
    define("USER_CONFIRMED",'<b>Su cuenta ha sido confirmada con éxito!</b><br />La contraseña de acceso de su usuario ha sido enviada por e-mail.<br />Por favor, acceda a su perfil en Mi BVS y complete su registro.');
    define("USER_ADD_CONFIRMED",'<b>¡Usuário añadido con succeso!</b><br />La contraseña de acceso de su usuario ha sido enviada por e-mail.');
    define("USER_CONFIRMATION_ERROR",'<b>ERROR: No fue posible confirmar la cuenta.</b>');
    define("VALMSG_G_EMPTY","Campo obligatório. Não puede quedarse en blanco.");
    define("VALMSG_LOGIN","Digite un email válido.");
    define("VALMSG_EMAIL","Digite un email válido.");

    define("NEWPASS_INVALID_PASSWORD",'Contraseña incorrecta');
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
    define("UPDATE_INFO",'<b>Por favor, revise sus datos en el formulario abajo para continuar utilizando la Mi BVS.</b>');
    define("ACCEPT_MAIL",'Gostaria de receber e-mails com informações da Minha BVS');
    define("TERMS",'Condiciones de uso');
    define("TERMS_AGREEMENT_MESSAGE",'Estoy de acuerdo con las <a data-toggle="modal" data-target=".bs-terms-modal-lg" style="cursor: pointer; text-decoration: underline;">Condiciones</a> y confirmo que leí la <a data-toggle="modal" data-target=".bs-policy-modal-lg" style="cursor: pointer; text-decoration: underline;">Política de Datos</a> de Mi BVS');
    define("TERMS_MESSAGE",'
<div class="terms">
<h3>Terms and Conditions</h3>

<h4>General</h4>

<p>Servicing servicing resistor <strong>video computer</strong> element transponder prototype analog solution mainframe network. Solution video debugged feedback sampling extended, infrared, generator generator. </p>

<ul>
<li>list item number one</li>
<li>list item number two</li>
<li>list item number three</li>
</ul>

<p>Harmonic gigabyte generator in <strong>sequential interface</strong>. Services, integer device read-only supporting cascading cache capacitance. Proxy boolean solution or data overflow element overflow processor arrray video, reflective extended. Gigabyte debugged distributed, reflective controller disk encapsulated phase network arrray feedback element cache high silicon. Sampling backbone analog remote adaptive extended bridgeware n-tier integer audio femtosecond. </p>

<h4>Important Stuff</h4>

<p>Interface broadband <strong>developer backbone fragmentation</strong> messaging software transmission, sampling cascading element high silicon backbone. Reflective servicing coordinated boolean connectivity extended inversion sequential for. Data distributed backbone bridgeware connectivity logarithmic, sampling ethernet for. Extended logarithmic log video echo gigabyte. Or procedural phaselock sequential port extended deviation sequential, disk recognition gigabyte phaselock proxy messaging arrray. Encapsulated echo deviation boolean system ethernet reducer, pc. </p>

<p><strong>Backbone frequency echo ethernet</strong> patch femtosecond sampling, integer digital floating-point n-tier dithering disk. Processor reflective boolean includes phase deviation, with log, integral logistically femtosecond, in, integral infrared phaselock. Element developer pc harmonic, plasma with, integral floating-point. Reflective feedback infrared, echo anomoly integral generator reflective led, high overflow servicing gigabyte. Extended integral data, infrared frequency disk broadband transistorized processor disk anomoly, sampling potentiometer kilohertz. Bus overflow, bridgeware fragmentation bypass prototype, interface, for internet pc generator integral, bypass disk, frequency. </p>

<h4>Fees</h4>

<p>Sequential <strong>encapsulated resistor</strong> element converter pc harmonic. Feedback cache hyperlinked debugged generator infrared device network, fragmentation connectivity, debugged. For, dithering interface debugged sequential recognition bypass bridgeware processor backbone sampling logarithmic software. Anomoly infrared logarithmic logarithmic procedural plasma resistor integral silicon deviation. Computer broadband plasma, encapsulated cable kilohertz scan. With logarithmic bridgeware indeterminate sampling, port. Development procedural hyperlinked mainframe, encapsulated boolean software processor transistorized cable with backbone. </p>

<p>Reflective backbone log transmission cable logarithmic mainframe. Messaging backbone debugged feedback development phaselock metafile n-tier coordinated, cable coordinated coordinated in. <strong>Analog device</strong> transistorized, sequential transistorized with scalar normalizing. Mainframe phase cache anomoly feedback servicing harmonic. Services software pc, femtosecond bypass scalar data element extended cascading capacitance harmonic. Adaptive plasma bypass supporting cascading deviation system pulse broadband bridgeware. </p>

<h4>Agreement</h4>

<p>Servicing hyperlinked analog encapsulated disk cable with, capacitance element partitioned potentiometer read-only dithering. <strong>Normalizing kilohertz</strong> network solution logarithmic device bus connectivity system mainframe prototype phaselock phase cache. </p>

<p>Coordinated transmission overflow floating-point distributed supporting scan converter. <strong>Bridgeware backbone</strong> coordinated sampling overflow broadband normalizing connectivity or, internet transmission, bus, encapsulated. Extended element element echo messaging scan, cache video deviation debugged broadband. Pc, supporting hyperlinked coordinated patch, bridgeware transistorized, led frequency scalar. Servicing, plasma recursive boolean includes, computer, femtosecond inversion. Services integer harmonic mainframe scalar prototype broadband n-tier. Echo software application indeterminate dithering bypass plasma bus harmonic patch. Digital, mainframe scalar anomoly bypass, bus potentiometer phaselock plasma, phaselock prompt data disk inversion. </p>
</div>
');
    define('DATA_POLICY_MESSAGE',TERMS_MESSAGE);
    define('FIELD_LINKEDIN','LinkedIn (URL)');
    define('FIELD_RESEARCHGATE','ResearchGate (URL)');
    define('FIELD_ORCID','ORCID');
    define('FIELD_RESEARCHERID','ResearcherID');
    define('FIELD_LATTES','Lattes (URL)');

    define("DASHBOARD",'Mis Contenidos');
    define("INDEX",'home');
    define("HOMEPAGE",'Visión General');
    define("WELCOME",'Bienvenido');
    define("USERS_SERVICES",'Servicios Personalizados');
    define("OLA",'Hola');
    define("LOGOFF",'Salir');
    define("MY_PROFILE_DOCUMENTS",'Temas de Interés');
    define("MY_SHELF",'Documentos Favoritos');
    define("MY_LINKS",'Enlaces Favoritos');
    define("MY_NEWS",'Mis Noticias');
    define("FORGOT_PASSWORD",'¿Olvidó su contraseña?');
    define("FORGOT_MY_PASSWORD",'olvide mi contraseña');
    define("CHANGE_PASSWORD",'Cambiar Contraseña');
    define("RECOVER_PASSWORD",'Recuperar Contraseña');
    define("MY_DATA",'Editar Perfil');
    define("MY_ALERTS",'Mis Alertas');
    define("SEARCH",'Buscar');
    define("SEARCH_FOR",'Buscar por...');
    define("MY_SEARCHES",'Historial de Búsquedas en la BVS');
    define("KEYWORDS",'Palabras-clave');
    define("SUGGESTED_DOCS",'Documentos Relacionados');
    define("ORCID_WORKS",'ORCID - Mis Publicaciones');
    define("RECENT_ACTIVITIES",'Actividades Recientes');
    define("SEE_ALL_DOCS",'Ver todos los documentos');
    define("SEE_ALL_LINKS",'Ver todos los enlaces');
    define("SEE_ALL_PROFILES",'Ver todos los temas');
    define("ADD_COLLECTION",'Colección añadida');
    define("UPDATE_COLLECTION",'Colección actualizada');
    define("REMOVE_COLLECTION",'Colección borrada');
    define("ADD_PROFILE",'Tema añadido');
    define("UPDATE_PROFILE",'Tema actualizado');
    define("REMOVE_PROFILE",'Tema borrado');
    define("ADD_LINK",'Enlace añadida');
    define("UPDATE_LINK",'Enlace actualizado');
    define("REMOVE_LINK",'Enlace borrado');
    define("QUERY",'Query');
    define("VIEW",'Mostrar');
    define("SEARCH_WIDGET",'Búsquedas en la BVS');
    define("PROFILE_WIDGET",'Temas de Interés');
    define("SHELF_WIDGET",'Documentos Favoritos');
    define("START_TOUR",'Empezar Tour');
}

if($lang == 'en'){
    /* tela de cadastro do usuário*/
    define("MY_VHL",'My VHL');
    define("SERVPLAT",'Service Platform');
    define('BIREME','BIREME | PAHO | WHO');
    define('BUTTON_NEW_USER','Create');
    define('BUTTON_CANCEL','Cancel');
    define('BUTTON_CLOSE','Close');
    define('BUTTON_SEND','Send');
    define("BUTTON_UPDATE_USER","Update");
    define('BVSSIGLA','VHL');
    define('BVS','VHL and SciELO Passport');
    define('CONTACT_FORM','Contact form');
    define('CHOOSE_DEGREE','choose');
    define('CHOOSE_COUNTRY','choose');
    define('DEGREE','Degree');
    define('EMAIL_SENT','E-mail sent.');
    define('PROFESSIONAL_AREA','Professional area');
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
    define('FIELD_OLD_PASSWORD','Current');
    define('FIELD_NEW_PASSWORD','New');
    define('FIELD_NEW_PASSWORD_CONFIRM','Re-type new');
    define('FIELD_PASSWORD_CONFIRMATION','Password confirmation');
    define('FIELD_GENDER_MALE','Male');
    define('FIELD_GENDER_FEMALE','Female');
    define('FIELD_BIRTHDAY','Date of birth');
    define("FIELD_DEGREE","Ensino_Fundamental|Basic Education,Ensino_Medio|High School,Ensino_Tecnico|Technical Studies,Graduacao|Graduate Study,Especializacao|Specialization,Mestrado_Profissionalizante|Professional Master's Degree,Mestrado|Master's Degree,Doutorado|Doctorate,MBA|MBA,Pos_Doutorado|Post Doctorate,PHD|PHD");
    define("FREE_REGISTRY","Register for free!");
    define("FREE_REGISTRY_MESSAGE",'
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
<p>Tenha acesso gratuito aos produtos e serviços de informação da Minha BVS. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">Saiba mais</a><p>
');
    define("MY_VHL_DESCRIPTION",'
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
</ul>
');
    define('MY_VHL_ENTRY','Já está registrado na Minha BVS?');
    define('ENTER','Entrar');
    define("FOOTER_MESSAGE",'<p><strong>BIREME - PAHO - WHO</strong><br/>
Latin American and Caribbean Center on Health Sciences Information<br />
Knowledge Management, Bioethics and Research Area - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="My VHL">http://www.paho.org/bireme</a><br /></p>');
    define('LEARN_MORE','learn more');
    define('PERSONAL_DATA','Personal Data');
    define('REGISTER_NEW_USER_TITLE','Subscription Form');
    define('REQUIRED_FIELD_TEXT','required fields');
    define('OPTIONAL_FIELD_TEXT','optional fields');
    define("TIP_LOGIN","The access login needs to be the user mail, eg: user@bireme.org");
    define("UPDATE_USER_TITLE","Update user");
    define("USER_ADDED",'User added successfully');
    define("USER_EXISTS","<b>User already exists</b><br />Try to login with this user, if you have no success trying to authenticate with this user and don't remember the password,<br />use the link <b>\"forgot my password\"</b> in the user login box.");
    define("USER_ADD_ERROR","<b>Registry error</b><br />Your mail is a Bireme mail. In this case your user already have on login to access the BVS aplications, just use you network login and password to have access to this application.");
    //define("USER_ADD_SUCCESS","<b>User success registered</b><br />Your user is now registered in the VHL Passport<br />You are able to connect in SciELO and BVS applications with this user.");
    define("USER_ADD_SUCCESS","<b>User registration successful!</b>");
    define("USER_SEND_CONFIRMATION","<b>User registration successful!</b><br />We sent a confirmation link to your account for your email.<br />Please click on the link sent to activate your account in My VHL.");
    define("USER_UPDATED",'User updated successful!');
    define("USER_PASSWORD_UPDATE",'Password updated successful!');
    define("USER_UPDATE_ERROR",'<b>Problems updating user data</b><br />The applications doesn\'t success to update the user data. Try again later.');
    define("USER_CONFIRMED",'<b>Your account has been confirmed successfully!</b><br />Your user\'s password was sent by email.<br />Please, access your profile in My VHL and complete your registration.');
    define("USER_ADD_CONFIRMED",'<b>User registration successful!</b><br />Your user\'s password was sent by email.');
    define("USER_CONFIRMATION_ERROR",'<b>ERROR: Account verification failed.</b>');
    define("VALMSG_G_EMPTY","Mandatory field.");
    define("VALMSG_LOGIN","Type a valid mail.");
    define("VALMSG_EMAIL","Type a valid mail.");

    define("NEWPASS_INVALID_PASSWORD",'Invalid password');
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
    define("UPDATE_INFO",'<b>Please review your data in the form below to continue using the My VHL.</b>');
    define("ACCEPT_MAIL",'Gostaria de receber e-mails com informações da Minha BVS');
    define("TERMS",'Terms of use');
    define("TERMS_AGREEMENT_MESSAGE",'I agree to the <a data-toggle="modal" data-target=".bs-terms-modal-lg" style="cursor: pointer; text-decoration: underline;">Terms</a> and have read the <a data-toggle="modal" data-target=".bs-policy-modal-lg" style="cursor: pointer; text-decoration: underline;">Data Policy</a> of My VHL');
    define("TERMS_MESSAGE",'
<div class="terms">
<h3>Terms and Conditions</h3>

<h4>General</h4>

<p>Servicing servicing resistor <strong>video computer</strong> element transponder prototype analog solution mainframe network. Solution video debugged feedback sampling extended, infrared, generator generator. </p>

<ul>
<li>list item number one</li>
<li>list item number two</li>
<li>list item number three</li>
</ul>

<p>Harmonic gigabyte generator in <strong>sequential interface</strong>. Services, integer device read-only supporting cascading cache capacitance. Proxy boolean solution or data overflow element overflow processor arrray video, reflective extended. Gigabyte debugged distributed, reflective controller disk encapsulated phase network arrray feedback element cache high silicon. Sampling backbone analog remote adaptive extended bridgeware n-tier integer audio femtosecond. </p>

<h4>Important Stuff</h4>

<p>Interface broadband <strong>developer backbone fragmentation</strong> messaging software transmission, sampling cascading element high silicon backbone. Reflective servicing coordinated boolean connectivity extended inversion sequential for. Data distributed backbone bridgeware connectivity logarithmic, sampling ethernet for. Extended logarithmic log video echo gigabyte. Or procedural phaselock sequential port extended deviation sequential, disk recognition gigabyte phaselock proxy messaging arrray. Encapsulated echo deviation boolean system ethernet reducer, pc. </p>

<p><strong>Backbone frequency echo ethernet</strong> patch femtosecond sampling, integer digital floating-point n-tier dithering disk. Processor reflective boolean includes phase deviation, with log, integral logistically femtosecond, in, integral infrared phaselock. Element developer pc harmonic, plasma with, integral floating-point. Reflective feedback infrared, echo anomoly integral generator reflective led, high overflow servicing gigabyte. Extended integral data, infrared frequency disk broadband transistorized processor disk anomoly, sampling potentiometer kilohertz. Bus overflow, bridgeware fragmentation bypass prototype, interface, for internet pc generator integral, bypass disk, frequency. </p>

<h4>Fees</h4>

<p>Sequential <strong>encapsulated resistor</strong> element converter pc harmonic. Feedback cache hyperlinked debugged generator infrared device network, fragmentation connectivity, debugged. For, dithering interface debugged sequential recognition bypass bridgeware processor backbone sampling logarithmic software. Anomoly infrared logarithmic logarithmic procedural plasma resistor integral silicon deviation. Computer broadband plasma, encapsulated cable kilohertz scan. With logarithmic bridgeware indeterminate sampling, port. Development procedural hyperlinked mainframe, encapsulated boolean software processor transistorized cable with backbone. </p>

<p>Reflective backbone log transmission cable logarithmic mainframe. Messaging backbone debugged feedback development phaselock metafile n-tier coordinated, cable coordinated coordinated in. <strong>Analog device</strong> transistorized, sequential transistorized with scalar normalizing. Mainframe phase cache anomoly feedback servicing harmonic. Services software pc, femtosecond bypass scalar data element extended cascading capacitance harmonic. Adaptive plasma bypass supporting cascading deviation system pulse broadband bridgeware. </p>

<h4>Agreement</h4>

<p>Servicing hyperlinked analog encapsulated disk cable with, capacitance element partitioned potentiometer read-only dithering. <strong>Normalizing kilohertz</strong> network solution logarithmic device bus connectivity system mainframe prototype phaselock phase cache. </p>

<p>Coordinated transmission overflow floating-point distributed supporting scan converter. <strong>Bridgeware backbone</strong> coordinated sampling overflow broadband normalizing connectivity or, internet transmission, bus, encapsulated. Extended element element echo messaging scan, cache video deviation debugged broadband. Pc, supporting hyperlinked coordinated patch, bridgeware transistorized, led frequency scalar. Servicing, plasma recursive boolean includes, computer, femtosecond inversion. Services integer harmonic mainframe scalar prototype broadband n-tier. Echo software application indeterminate dithering bypass plasma bus harmonic patch. Digital, mainframe scalar anomoly bypass, bus potentiometer phaselock plasma, phaselock prompt data disk inversion. </p>
</div>
');
    define('DATA_POLICY_MESSAGE',TERMS_MESSAGE);
    define('FIELD_LINKEDIN','LinkedIn (URL)');
    define('FIELD_RESEARCHGATE','ResearchGate (URL)');
    define('FIELD_ORCID','ORCID');
    define('FIELD_RESEARCHERID','ResearcherID');
    define('FIELD_LATTES','Lattes (URL)');

    define("DASHBOARD",'My Contents');
    define("INDEX",'home');
    define("HOMEPAGE",'Overview');
    define("WELCOME",'Welcome');
    define("USERS_SERVICES",'Custom Services');
    define("OLA",'Hello');
    define("LOGOFF",'Exit');
    define("MY_PROFILE_DOCUMENTS",'Interest Topics');
    define("MY_SHELF",'Favorite Documents');
    define("MY_LINKS",'Favorite Links');
    define("MY_NEWS",'My News');
    define("FORGOT_PASSWORD",'Forgot your password?');
    define("FORGOT_MY_PASSWORD",'forgot my password');
    define("CHANGE_PASSWORD",'Change Password');
    define("RECOVER_PASSWORD",'Recover Password');
    define("MY_DATA",'Edit Profile');
    define("MY_ALERTS",'My Alerts');
    define("SEARCH",'Search');
    define("SEARCH_FOR",'Search for...');
    define("MY_SEARCHES",'VHL Search History');
    define("KEYWORDS",'Keywords');
    define("SUGGESTED_DOCS",'Related Documents');
    define("ORCID_WORKS",'ORCID - My Publications');
    define("RECENT_ACTIVITIES",'Recent Activities');
    define("SEE_ALL_DOCS",'See all documents');
    define("SEE_ALL_LINKS",'See all links');
    define("SEE_ALL_PROFILES",'See all topics');
    define("ADD_COLLECTION",'Collection added');
    define("UPDATE_COLLECTION",'Collection updated');
    define("REMOVE_COLLECTION",'Coleção deleted');
    define("ADD_PROFILE",'Topic added');
    define("UPDATE_PROFILE",'Topic updated');
    define("REMOVE_PROFILE",'Topic deleted');
    define("ADD_LINK",'Link added');
    define("UPDATE_LINK",'Link updated');
    define("REMOVE_LINK",'Link deleted');
    define("QUERY",'Query');
    define("VIEW",'View');
    define("SEARCH_WIDGET",'VHL Search');
    define("PROFILE_WIDGET",'Interest Topics');
    define("SHELF_WIDGET",'Favorite Documents');
    define("START_TOUR",'Start Tour');
}
?>

