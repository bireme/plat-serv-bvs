<?php
require_once(dirname(__FILE__).'/../config.php');

$lang = isset($_SESSION['lang'])?$_SESSION['lang']:DEFAULT_LANG;

if($lang == 'pt'){
    /* tela de cadastro do usuário*/
    define("MY_VHL",'Minha BVS');
    define("SERVPLAT",'Plataforma de Serviços');
    define('BIREME','BIREME | OPAS | OMS');
    define('BUTTON_NEW_USER','Enviar');
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
    define("EMAIL_FROMNAME",'Minha BVS');
    define("NEW_PASSWORD_EMAIL_SUBJECT",'Nova Senha');
    define("CONFIRM_USER_EMAIL_SUBJECT",'Confirmação de Registro: ');
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
    define('FIELD_LOGIN','E-mail ou Usuário');
    define('FIELD_LOGIN_CONFIRMATION','Confirme seu e-mail ou usuário');
    define('FIELD_PASSWORD','Senha');
    define('FIELD_OLD_PASSWORD','Atual');
    define('FIELD_NEW_PASSWORD','Nova');
    define('FIELD_NEW_PASSWORD_CONFIRM','Digite novamente');
    define('FIELD_PASSWORD_CONFIRMATION','Confirme sua senha');
    define('FIELD_GENDER_MALE','Masculino');
    define('FIELD_GENDER_FEMALE','Feminino');
    define('FIELD_BIRTHDAY','Data de nascimento');
    define("FIELD_DEGREE","Ensino_Fundamental|Ensino Fundamental (1º Grau),Ensino_Medio|Ensino Médio (2º Grau),Ensino_Tecnico|Ensino Profissional De Nível Técnico,Graduacao|Graduação,Especializacao|Especialização,Mestrado_Profissionalizante|Mestrado Profissionalizante,Mestrado|Mestrado,Doutorado|Doutorado,MBA|MBA,Pos_Doutorado|Pós Doutorado,PHD|PHD");
    define("FREE_REGISTRY","Registre-se agora!");
    define("FREE_REGISTRY_MESSAGE",'
<p>Minha BVS é um serviço gratuito disponível para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>O usuário que preferir usar o serviço Minha BVS com sua conta Facebook ou Google NÃO precisa criar nova conta de usuário na Minha BVS.</p>
<p>BIREME Account é um sistema de gestão de usuários dos cooperantes da Rede BIREME. Estes usuários NÃO precisam criar nova conta de usuário na Minha BVS.<p/>
<p>Para criar uma nova conta de usuário Minha BVS é necessário preencher o formulário abaixo com dados pessoais e concordar com os termos e condições do serviço. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">Saiba mais</a><p>
');
    define("MY_VHL_DESCRIPTION",'
<p>Minha BVS é um serviço gratuito que guarda informações e preferências do
usuário para oferecer serviços personalizados e facilidades tais como:</p>
<ul>
    <li>Criação de coleções de documentos a partir de resultado de buscas processadas nas bases de dados da BVS.</li>
    <li>Documentos encontrados nas bases de dados da BVS a partir das palavras-chaves indicadas para Temas de Interesse.</li>
    <li>Publicações de autoria do usuário recuperadas em várias fontes considerando o número ORCID informado no Perfil do Usuário.</li>
    <li>Histórico de buscas realizadas na BVS sempre que o usuário estiver logado no serviço.</li>
    <li>Lista de links favoritos indicados pelo usuário permitindo acesso rápido e direto a sites de seu interesse.</li>
</ul>
<p>Minha BVS está disponível para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>BIREME Account é um sistema de gestão de contas de usuários dos Centros Cooperantes da Rede BIREME que acessam o sistema FI-Admin, dentre outros sistemas. Esta mesma conta de usuário está habilitada para o serviço Minha BVS.</p>
<p>Se o usuário prefere uma conta própria para o serviço Minha BVS, é necessário fazer seu registro gratuitamente como usuário, além de aceitar os termos de uso e política de privacidade.</p>
');
    define('MY_VHL_ENTRY','Já tem registro de usuário da Minha BVS?');
    define('ENTER','Entrar');
    define("FOOTER_MESSAGE",'<p><strong>BIREME - OPAS - OMS</strong><br/>
Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br />
Área de Gestão do Conhecimento, Bioética e Pesquisa - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Minha BVS">http://www.paho.org/bireme/</a><br /></p>');
    define('LEARN_MORE','saiba mais');
    define('PERSONAL_DATA','Seus dados');
    define('REGISTER_NEW_USER_TITLE','Registro de novo Usuário');
    define('REQUIRED_FIELD_TEXT','campos obrigatórios');
    define('OPTIONAL_FIELD_TEXT','campos opcionais');
    define("TIP_LOGIN","O usuário deve ser seu email, por exemplo: usuario@mail.com");
    define("UPDATE_USER_TITLE","Atualização dos dados");
    define("USER_ADDED",'Usuário registrado com sucesso.');
    define("USER_EXISTS","<b>Usuário já registrado</b><br />Tente autenticar-se com este usuário ou acesse<br /><b>\"esqueci minha senha\"</b> na caixa de login de usuários.");
    define("USER_ADD_ERROR","<b>Erro no cadastro</b>");
    define("USER_ADD_SUCCESS","<b>Usuário registrado com sucesso!</b>");
    define("USER_SEND_CONFIRMATION","<b>Usuário registrado com sucesso!</b><br />Enviamos um e-mail com link de confirmação de seu registro.<br />Clic no link enviado para ativar seu registro de Usuário de Minha BVS.");
    define("USER_UPDATED",'Usuário atualizado com sucesso.');
    define("USER_PASSWORD_UPDATE",'Senha atualizada com sucesso!');
    define("USER_UPDATE_ERROR",'<b>Problemas durante atualização</b><br />Não foi possível atualizar os dados. Tente mais tarde.');
    define("USER_CONFIRMED",'<b>Usuário registrado com sucesso!</b><br />Sua senha foi enviada por e-mail.<br />Por favor, complete ou atualize seus dados e preferências no Meu Perfil.');
    define("USER_ADD_CONFIRMED",'<b>Usuário registrado com sucesso!</b><br />Sua senha foi enviada por e-mail.');
    define("USER_CONFIRMATION_ERROR",'<b>ERRO: Não foi possível realizar a confirmação de Usuário.</b');
    define("VALMSG_G_EMPTY","Campo obrigatório. Não pode ficar em branco.");
    define("VALMSG_LOGIN","Digite um email válido.");
    define("VALMSG_EMAIL","Digite um email válido.");
    
    define("NEWPASS_INVALID_PASSWORD",'Senha inválida');
    define("NEWPASS_DOMAIN_NOT_PERMITTED",'Ação não permitida para este usuário. Entre em contato com o departamento de suporte da sua instituição.');
    define("NEWPASS_PASSWORD_SENT",'Uma nova senha foi enviada para o seu email.');
    define("NOTICE",'Mensagem ao usuário');
    define("NOTICE_MESSAGE",'');
    define("UPDATE_INFO",'<b>Por favor, revise seus dados no formulário abaixo para continuar utilizando a Minha BVS.</b>');
    define("ACCEPT_MAIL",'Quero receber por email novidades sobre o serviço Minha BVS');
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
    define("FORGOT_PASSWORD",'Esqueci minha senha?');
    define("FORGOT_MY_PASSWORD",'Esqueci minha senha');
    define("FORGOT_PASSWORD_MESSAGE",'
<p>Minha BVS está disponível gratuitamente para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>Este formulário é exclusivo para recuperar senha de usuário registrado do serviço Minha BVS.</p>
<p>Informe seu e-mail ou Usuário do serviço Minha BVS para receber uma mensagem de correio eletrônico com a sua senha.</p>
');
    define("CHANGE_PASSWORD",'Alterar minha senha');
    define("RECOVER_PASSWORD",'Recuperar minha senha');
    define("MY_DATA",'Editar meu Perfil');
    define("MY_ALERTS",'Meus Alertas');
    define("SEARCH",'Pesquisar');
    define("SEARCH_FOR",'Pesquisar na BVS por...');
    define("MY_SEARCHES",'Histórico de Buscas na BVS');
    define("KEYWORDS",'Palavras-chave');
    define("SUGGESTED_DOCS",'Similares');
    define("ORCID_WORKS",'ORCID - Minhas Publicações');
    define("RECENT_ACTIVITIES",'Atividades Recentes');
    define("SEE_ALL_DOCS",'Ver todos os documentos');
    define("SEE_ALL_LINKS",'Ver todos os links');
    define("SEE_ALL_PROFILES",'Ver todos os temas');
    define("ADD_COLLECTION",'Coleção adicionada');
    define("UPDATE_COLLECTION",'Coleção atualizada');
    define("REMOVE_COLLECTION",'Coleção excluída');
    define("ADD_PROFILE",'Tema adicionado');
    define("UPDATE_PROFILE",'Tema atualizado');
    define("REMOVE_PROFILE",'Tema excluído');
    define("ADD_LINK",'Link adicionado');
    define("UPDATE_LINK",'Link atualizado');
    define("REMOVE_LINK",'Link excluído');
    define("QUERY",'Expressões de busca');
    define("VIEW",'Mostrar');
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
    define('BUTTON_NEW_USER','Enviar');
    define('BUTTON_CANCEL','Cancelar');
    define('BUTTON_CLOSE','Cerrar');
    define('BUTTON_SEND','Enviar');
    define("BUTTON_UPDATE_USER","Actualizar");
    define('BVSSIGLA','BVS');
    define('BVS','Pasaporte BVS y SciELO');
    define('CONTACT_FORM','Formulario para contacto');
    define('CHOOSE_DEGREE','elijir');
    define('CHOOSE_COUNTRY','elijir');
    define('DEGREE','Nível académico');
    define('PROFESSIONAL_AREA','Área de actuación profesional');
    define('EMAIL_SENT','E-mail enviado.');
    define("EMAIL_FROMNAME",'Mi BVS');
    define("NEW_PASSWORD_EMAIL_SUBJECT",'Nueva Contraseña');
    define("CONFIRM_USER_EMAIL_SUBJECT",'Confirmación de Registro: ');
    define('FIELD_CONTACT_NAME','nombre');
    define('FIELD_CONTACT_EMAIL','e-mail');
    define('FIELD_CONTACT_DESCRIPTION','descripción');
    define('FIELD_CONTACT_SUBJECT','tema');
    define('FIELD_FIRST_NAME','Nombre');
    define('FIELD_LAST_NAME','Apellido');
    define('FIELD_GENDER','Sexo');
    define('FIELD_EMAIL','E-mail alternativo');
    define('FIELD_AFILIATION','Institución');
    define('FIELD_COUNTRY','País');
    define('FIELD_LOGIN','E-mail o Usuario');
    define('FIELD_LOGIN_CONFIRMATION','Confirme tu e-mail o Usuario');
    define('FIELD_PASSWORD','Contraseña');
    define('FIELD_OLD_PASSWORD','Actual');
    define('FIELD_NEW_PASSWORD','Nueva');
    define('FIELD_NEW_PASSWORD_CONFIRM','Repite tu contraseña nueva');
    define('FIELD_PASSWORD_CONFIRMATION','Confirme tu contraseña');
    define('FIELD_GENDER_MALE','Masculino');
    define('FIELD_GENDER_FEMALE','Feminino');
    define('FIELD_BIRTHDAY','Fecha de nacimiento');
    define("FIELD_DEGREE","Ensino_Fundamental|Enseñanza o Educación Básica,Ensino_Medio|Enseñanza o Educación Media,Ensino_Tecnico|Enseñanza o Educación Técnico-Profesional,Graduacao|Superior Universitario de Grado,Especializacao|Especialización,Mestrado_Profissionalizante|Maestría Profisionalizante,Mestrado|Maestría,Doutorado|Doctorado,MBA|MBA,Pos_Doutorado|Pos Doctorado,PHD|PHD");
    define("FREE_REGISTRY","Registrate ahora como Usuario!");
    define("FREE_REGISTRY_MESSAGE",'
<p>Minha BVS é um serviço gratuito disponível para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>O usuário que preferir usar o serviço Minha BVS com sua conta Facebook ou Google NÃO precisa criar nova conta de usuário na Minha BVS.</p>
<p>BIREME Account é um sistema de gestão de usuários dos cooperantes da Rede BIREME. Estes usuários NÃO precisam criar nova conta de usuário na Minha BVS.<p/>
<p>Para criar uma nova conta de usuário Minha BVS é necessário preencher o formulário abaixo com dados pessoais e concordar com os termos e condições do serviço. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">Saiba mais</a><p>
');
    define("MY_VHL_DESCRIPTION",'
<p>Minha BVS é um serviço gratuito que guarda informações e preferências do
usuário para oferecer serviços personalizados e facilidades tais como:</p>
<ul>
    <li>Criação de coleções de documentos a partir de resultado de buscas processadas nas bases de dados da BVS.</li>
    <li>Documentos encontrados nas bases de dados da BVS a partir das palavras-chaves indicadas para Temas de Interesse.</li>
    <li>Publicações de autoria do usuário recuperadas em várias fontes considerando o número ORCID informado no Perfil do Usuário.</li>
    <li>Histórico de buscas realizadas na BVS sempre que o usuário estiver logado no serviço.</li>
    <li>Lista de links favoritos indicados pelo usuário permitindo acesso rápido e direto a sites de seu interesse.</li>
</ul>
<p>Minha BVS está disponível para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>BIREME Account é um sistema de gestão de contas de usuários dos Centros Cooperantes da Rede BIREME que acessam o sistema FI-Admin, dentre outros sistemas. Esta mesma conta de usuário está habilitada para o serviço Minha BVS.</p>
<p>Se o usuário prefere uma conta própria para o serviço Minha BVS, é necessário fazer seu registro gratuitamente como usuário, além de aceitar os termos de uso e política de privacidade.</p>
');
    define('MY_VHL_ENTRY','¿Es Usuario de Mi BVS?');
    define('ENTER','Entrar');
    define("FOOTER_MESSAGE",'<p><strong>BIREME - OPS - OMS</strong><br/>
Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud<br />
Area de Gestión del Conocimiento, Bioética e Investigación - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Mi BVS">http://www.paho.org/bireme</a><br /></p>');
    define('LEARN_MORE','sepa mas');
    define('PERSONAL_DATA','Datos Personales');
    define('REGISTER_NEW_USER_TITLE','Registro de Nuevo Usuario');
    define('REQUIRED_FIELD_TEXT','campos obligatórios');
    define('OPTIONAL_FIELD_TEXT','campos opcionales');
    define("TIP_LOGIN","El Usuario de acceso al servicio debe puede ser su correo electrónico, por ejemplo: usuario@bireme.org");
    define("UPDATE_USER_TITLE","Actualización de los datos");
    define("USER_ADDED",'Usuario registrado con succeso.');
    define("USER_EXISTS","<b>Ya existe registro de usuario</b><br />Pruebe autenticarse con ese usuário o acceda<br /><b>\"Olvide mi contraseña\"</b> en el area de login del servicio.");
    define("USER_ADD_ERROR","<b>Erro en el registro</b>");
    define("USER_ADD_SUCCESS","<b>¡Usuario registrado con succeso!</b>");
    define("USER_SEND_CONFIRMATION","<b>¡Registro de usuario realizado con éxito!</b><br />Enviamos un mensaje a su correo electrónico con enlace de confirmación de su registro como Usuario de Mi BVS.<br />Por favor haga clic en el enlace enviado para activar su Usuario de Mi BVS.");
    define("USER_UPDATED",'Usuario actualizado con succeso.');
    define("USER_PASSWORD_UPDATE",'¡Contraseña actualizada con succeso!');
    define("USER_UPDATE_ERROR",'<b>Problemas en la actualización</b><br />El sistema no logro actualizar los datos del usuário. Tente mas tardera.');
    define("USER_CONFIRMED",'<b>Su cuenta ha sido confirmada con éxito!</b><br />La contraseña de acceso de su usuario ha sido enviada por e-mail.<br />Por favor, acceda a su perfil en Mi BVS y complete su registro.');
    define("USER_ADD_CONFIRMED",'<b>¡Usuário añadido con succeso!</b><br />La contraseña de acceso de su usuario ha sido enviada por e-mail.');
    define("USER_CONFIRMATION_ERROR",'<b>ERROR: No fue posible confirmar el Usuario.</b>');
    define("VALMSG_G_EMPTY","Campo obligatório. No puede quedarse en blanco.");
    define("VALMSG_LOGIN","Informe un email válido.");
    define("VALMSG_EMAIL","Informe un email válido.");

    define("NEWPASS_INVALID_PASSWORD",'Contraseña incorrecta');
    define("NEWPASS_DOMAIN_NOT_PERMITTED",'Acción no permitida. Contacte el departamiento de soporte de su institución.');
    define("NEWPASS_PASSWORD_SENT",'Una nueva contraseña fue enviada para su correo electrónico.');
    define("NOTICE",'Mensaje al usuário');
    define("NOTICE_MESSAGE",'');
    define("UPDATE_INFO",'<b>Por favor, revise sus datos en el formulario para seguir utilizando el servicio Mi BVS.</b>');
    define("ACCEPT_MAIL",'Me gustaría recibir actualizaciones acerca el servicio Mi BVS');
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
    define("FORGOT_PASSWORD",'¿Se ha olvidado de su contraseña?');
    define("FORGOT_MY_PASSWORD",'¿Se ha olvidado de su contraseña?');
    define("FORGOT_PASSWORD_MESSAGE",'
<p>Minha BVS está disponível gratuitamente para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>Este formulário é exclusivo para recuperar senha de usuário registrado do serviço Minha BVS.</p>
<p>Informe seu e-mail ou Usuário do serviço Minha BVS para receber uma mensagem de correio eletrônico com a sua senha.</p>
');
    define("CHANGE_PASSWORD",'Cambiar su Contraseña');
    define("RECOVER_PASSWORD",'Recuperar su Contraseña');
    define("MY_DATA",'Editar Perfil');
    define("MY_ALERTS",'Mis Alertas');
    define("SEARCH",'Buscar');
    define("SEARCH_FOR",'Buscar en la BVS por...');
    define("MY_SEARCHES",'Historial de Búsquedas en la BVS');
    define("KEYWORDS",'Palabras-clave');
    define("SUGGESTED_DOCS",'Similares');
    define("ORCID_WORKS",'ORCID - Mis Publicaciones');
    define("RECENT_ACTIVITIES",'Actividades Recientes');
    define("SEE_ALL_DOCS",'Ver todos los documentos');
    define("SEE_ALL_LINKS",'Ver todos los enlaces');
    define("SEE_ALL_PROFILES",'Ver todos los temas');
    define("ADD_COLLECTION",'Colección añadida');
    define("UPDATE_COLLECTION",'Colección actualizada');
    define("REMOVE_COLLECTION",'Colección excluida');
    define("ADD_PROFILE",'Tema añadido');
    define("UPDATE_PROFILE",'Tema actualizado');
    define("REMOVE_PROFILE",'Tema excluido');
    define("ADD_LINK",'Enlace añadida');
    define("UPDATE_LINK",'Enlace actualizado');
    define("REMOVE_LINK",'Enlace excluido');
    define("QUERY",'Expresión de búsqueda');
    define("VIEW",'Mostrar');
    define("SEARCH_WIDGET",'Mis Búsquedas en la BVS');
    define("PROFILE_WIDGET",'Temas de Interés');
    define("SHELF_WIDGET",'Documentos Favoritos');
    define("START_TOUR",'Empezar Tour');
}

if($lang == 'en'){
    /* tela de cadastro do usuário*/
    define("MY_VHL",'My VHL');
    define("SERVPLAT",'Service Platform');
    define('BIREME','BIREME | PAHO | WHO');
    define('BUTTON_NEW_USER','Send');
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
    define("EMAIL_FROMNAME",'My VHL');
    define("NEW_PASSWORD_EMAIL_SUBJECT",'New Password');
    define("CONFIRM_USER_EMAIL_SUBJECT",'Register Confirmation: ');
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
<p>Minha BVS é um serviço gratuito disponível para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>O usuário que preferir usar o serviço Minha BVS com sua conta Facebook ou Google NÃO precisa criar nova conta de usuário na Minha BVS.</p>
<p>BIREME Account é um sistema de gestão de usuários dos cooperantes da Rede BIREME. Estes usuários NÃO precisam criar nova conta de usuário na Minha BVS.<p/>
<p>Para criar uma nova conta de usuário Minha BVS é necessário preencher o formulário abaixo com dados pessoais e concordar com os termos e condições do serviço. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">Saiba mais</a><p>
');
    define("MY_VHL_DESCRIPTION",'
<p>Minha BVS é um serviço gratuito que guarda informações e preferências do
usuário para oferecer serviços personalizados e facilidades tais como:</p>
<ul>
    <li>Criação de coleções de documentos a partir de resultado de buscas processadas nas bases de dados da BVS.</li>
    <li>Documentos encontrados nas bases de dados da BVS a partir das palavras-chaves indicadas para Temas de Interesse.</li>
    <li>Publicações de autoria do usuário recuperadas em várias fontes considerando o número ORCID informado no Perfil do Usuário.</li>
    <li>Histórico de buscas realizadas na BVS sempre que o usuário estiver logado no serviço.</li>
    <li>Lista de links favoritos indicados pelo usuário permitindo acesso rápido e direto a sites de seu interesse.</li>
</ul>
<p>Minha BVS está disponível para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>BIREME Account é um sistema de gestão de contas de usuários dos Centros Cooperantes da Rede BIREME que acessam o sistema FI-Admin, dentre outros sistemas. Esta mesma conta de usuário está habilitada para o serviço Minha BVS.</p>
<p>Se o usuário prefere uma conta própria para o serviço Minha BVS, é necessário fazer seu registro gratuitamente como usuário, além de aceitar os termos de uso e política de privacidade.</p>
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
    define("NOTICE_MESSAGE",'');
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
    define("FORGOT_PASSWORD_MESSAGE",'
<p>Minha BVS está disponível gratuitamente para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>Este formulário é exclusivo para recuperar senha de usuário registrado do serviço Minha BVS.</p>
<p>Informe seu e-mail ou Usuário do serviço Minha BVS para receber uma mensagem de correio eletrônico com a sua senha.</p>
');
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