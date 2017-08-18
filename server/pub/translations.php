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
    define('CHOOSE_PROFESSIONAL_AREA','selecionar');
    define('CHOOSE_COUNTRY','selecionar');
    define('DEGREE','Nível acadêmico');
    define('PROFESSIONAL_AREA','Área de atuação profissional');
    define('EMAIL_SENT','E-mail enviado.');
    define("EMAIL_FROMNAME",'Minha BVS');
    define("NEW_PASSWORD_EMAIL_SUBJECT",'Serviços Personalizados Minha BVS: Senha');
    define("CONFIRM_USER_EMAIL_SUBJECT",'Serviços Personalizados Minha BVS: Confirmação de Registro - ');
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
    define("FREE_REGISTRY","Registre-se agora!");
    define("FREE_REGISTRY_MESSAGE",'
<p>Minha BVS é um serviço gratuito disponível para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>O usuário que preferir usar o serviço Minha BVS com sua conta Facebook ou Google NÃO precisa criar nova conta de usuário na Minha BVS.</p>
<p>BIREME Account é um sistema de gestão de usuários dos Centros Cooperantes da Rede BIREME. Estes usuários NÃO precisam criar nova conta de usuário na Minha BVS.</p>
<p>Para criar uma nova conta de usuário Minha BVS é necessário preencher o formulário abaixo com dados pessoais e concordar com os termos de uso e política de privacidade. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">Saiba mais</a></p>
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
    define('OR_ENTER_WITH','ou entre com');
    define('ENTER','Entrar');
    define("FOOTER_MESSAGE",'<p><strong>BIREME - OPAS - OMS</strong><br/>
Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde<br />
Área de Gestão do Conhecimento, Bioética e Pesquisa - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Tel: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="Minha BVS">http://www.paho.org/bireme/</a><br /></p>');
    define('LEARN_MORE','saiba mais');
    define('PERSONAL_DATA','Seus dados');
    define('REGISTER_NEW_USER_TITLE','Registro de Novo Usuário');
    define('REQUIRED_FIELD_TEXT','campos obrigatórios');
    define('OPTIONAL_FIELD_TEXT','campos opcionais');
    define("TIP_LOGIN","O usuário deve ser seu email, por exemplo: usuario@mail.com");
    define("UPDATE_USER_TITLE","Atualização dos dados");
    define("USER_ADDED",'Usuário registrado com sucesso.');
    define("USER_EXISTS","<b>Usuário já registrado</b><br />Tente autenticar-se com este usuário ou acesse<br /><b>\"esqueci minha senha\"</b> na caixa de login de usuários.");
    define("USER_ADD_ERROR","<b>Erro no cadastro</b>");
    define("USER_ADD_SUCCESS","<b>Usuário registrado com sucesso!</b>");
    define("USER_SEND_CONFIRMATION","<b>Usuário registrado com sucesso!</b><br />Enviamos um e-mail com link de confirmação de seu registro.<br />Se demorar para chegar, confira sua caixa de SPAM e lixo eletrônico.<br />Clique no link enviado para ativar seu registro de usuário da Minha BVS.");
    define("USER_UPDATED",'Usuário atualizado com sucesso.');
    define("USER_PASSWORD_UPDATE",'Senha atualizada com sucesso!');
    define("USER_UPDATE_ERROR",'<b>Problemas durante atualização</b><br />Não foi possível atualizar os dados. Tente mais tarde.');
    define("USER_CONFIRMED",'<b>Sua conta foi confirmada com sucesso!</b><br />Por favor, complete ou atualize seus dados e preferências no seu Perfil.<br />Em breve, você receberá um e-mail com sua senha de acesso da Minha BVS.<br />Se demorar para chegar, confira sua caixa de SPAM e lixo eletrônico.');
    define("USER_ADD_CONFIRMED",'<b>Usuário registrado com sucesso!</b><br />Sua senha foi enviada por e-mail.<br />Se demorar para chegar, confira sua caixa de SPAM e lixo eletrônico.');
    define("USER_CONFIRMATION_ERROR",'<b>ERRO: Não foi possível realizar a confirmação de Usuário.</b>');
    define("VALMSG_G_EMPTY","Campo obrigatório. Não pode ficar em branco.");
    define("VALMSG_LOGIN","Digite um email válido.");
    define("VALMSG_EMAIL","Digite um email válido.");
    define("NEWPASS_CREATE_ERROR",'<b>ERRO: Não foi possível gerar uma nova senha.</b>');
    define("NEWPASS_CHANGE_ERROR",'<b>ERRO: Não foi possível alterar sua senha.</b>');
    define("NEWPASS_INVALID_PASSWORD",'Senha inválida');
    define("NEWPASS_DOMAIN_NOT_PERMITTED",'Ação não permitida para este usuário.');
    define("NEWPASS_PASSWORD_SENT",'Uma nova senha foi enviada para o seu email.<br />Se demorar para chegar, confira sua caixa de SPAM e lixo eletrônico.');
    define("NOTICE",'Mensagem ao usuário');
    define("NOTICE_MESSAGE",'');
    define("UPDATE_INFO",'<b>Por favor, revise seus dados no formulário abaixo para continuar utilizando a Minha BVS.</b>');
    define("ACCEPT_MAIL",'Quero receber por email novidades sobre o serviço Minha BVS');
    define("TERMS",'Termos de uso');
    define("TERMS_AGREEMENT_MESSAGE",'Eu concordo com os <a data-toggle="modal" data-target=".bs-terms-modal-lg" style="cursor: pointer; text-decoration: underline;">Termos de Uso</a> e confirmo que li a <a data-toggle="modal" data-target=".bs-policy-modal-lg" style="cursor: pointer; text-decoration: underline;">Política de Privacidade</a> da Minha BVS');
    define("TERMS_MESSAGE",'
<div class="terms">

    <h3>TERMOS E CONDIÇÕES DE USO DOS SITES E SISTEMAS WEB DA BIREME/OPAS</h3>

    <p>A utilização dos produtos, serviços e/ou ferramentas disponibilizados aos usuários pelo Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde (BIREME), Centro Especializado da Organização Pan-Americana da Saúde, Escritório Regional para as Américas da Organização Mundial da Saúde, doravante BIREME/OPAS, envolve a aceitação dos seguintes Termos e Condições. Em caso de discrepância destes Termos e Condições entre o texto em espanhol e qualquer outro idioma, prevalecerá o documento em espanhol.</p>

    <p>A BIREME/OPAS se reserva o direito de acionar legalmente para evitar qualquer infração ou descumprimento dos presentes Termos e Condições. A BIREME/OPAS poderá modificar estes Termos e Condições a seu total critério e publicará estas modificações no presente site. O uso deste site, dos produtos, serviços e/ou ferramentas após a realização destas mudanças constitui aceitação por parte do usuário dos novos Termos e Condições. A OPAS se reserva o direito exclusivo de cancelar o acesso de qualquer usuário por infração de direitos ou descumprimento dos presentes Termos e Condições.</p>

    <h4>Uso do nome BIREME e/ou OPAS</h4>

    <p>O nome, acrônimo e/ou logotipo BIREME e OPAS estão protegidos pelo direito internacional. Salvo para propósitos de atribuição autoral, eles não podem ser utilizados sem autorização prévia expressa e por escrito da BIREME/OPAS. O nome, acrônimo e/ou logo BIREME/ OPAS também não podem ser utilizados com fins promocionais ou em nenhuma forma que indique, sugira ou possa ser interpretada como associação, filiação, patrocínio ou respaldo da BIREME/OPAS.</p>

    <h4>Limitação de Responsabilidade</h4>

    <p>Os produtos, serviços e/ou ferramentas que BIREME/OPAS disponibiliza aos usuários não possuem nenhum tipo de garantia, explícita ou implícita. A BIREME/OPAS não oferece garantias nem responde pela exatidão ou veracidade da informação, produtos, serviços e/ou ferramentas proporcionados. A BIREME/ OPAS poderá modificar os mesmos periodicamente, sem aviso prévio. Sob nenhuma circunstância a BIREME/OPAS será responsável pelas perdas, danos e/ou prejuízos que supostamente possam derivar de sua utilização ou não disponibilidade. Os usuários devem utilizar esses produtos, serviços e/ou ferramentas por sua própria conta e risco. Em nenhum caso a BIREME/OPAS será responsável por perdas e/ou danos, mesmo se estes pudessem ter sido advertidos e/ou prevenidos.</p>

    <p>A BIREME/OPAS se reserva o direito de modificar ou descontinuar qualquer informação, produtos, serviços e/ou ferramentas disponibilizados aos seus membros e/ou usuários através deste site, com ou sem aviso prévio.</p>

    <p>O uso de designações de países ou territórios não deverá ser considerado indicativo da posição da BIREME/OPAS com relação à situação jurídica de nenhum país ou território, de suas autoridades e instituições nem ao reconhecimento de nenhuma fronteira.</p>

    <p>A BIREME/OPAS não será responsável por nenhum dano ou perda que possa derivar ou se relacionar com o uso ou falha do site, informação, produtos, serviços e/ou ferramentas presentes no mesmo, inclusive nos casos derivados de uso inapropriado, impróprio ou fraudulento. Também não será responsável pela precisão, disponibilidade ou veracidade da informação aqui contida.</p>

    <p>A BIREME/OPAS não oferece garantias de nenhum tipo com relação aos materiais, informação, produtos, serviços e/ou ferramentas disponíveis no site e não será responsável por qualquer infecção com vírus informático ou qualquer outro programa que possa afetar o funcionamento de computadores ou sistemas.</p>

    <p>Alguns materiais, informação, produtos, serviços e/ou ferramentas aos quais os usuários poderão ter acesso através deste site podem ser de titularidade de terceiros; a BIREME/OPAS não garante sua titularidade e não será responsável perante os usuários ou terceiros por qualquer reclamação derivada de seu uso. É possível que no site, materiais, informação, produtos, serviços e/ou ferramentas sejam incluídos links para sites externos não manejados pela BIREME/OPAS. Esses links são incluídos à guisa de referência e sua incorporação não implica em aprovação ou endosso por parte da BIREME/OPAS. A BIREME/OPAS não assume responsabilidade no tocante à informação contida nesses sites.</p>

    <p>A utilização deste site pelos usuários implica a aceitação da obrigação de defender, manter a salvo e indenizar a BIREME/OPAS e seus filiados por qualquer ação, reclamação ou dano, perda e/ou gasto (inclusive os honorários de advogados) derivados de tal uso.</p>

    <p>A BIREME/OPAS se reserva o direito de utilizar ou divulgar informação sobre seus usuários. Também se reserva o direito de editar, não publicar ou remover qualquer produto, serviços, ferramenta, informação ou material, em parte ou em sua totalidade, a seu total critério.</p>

    <h4>Usos não permitidos</h4>

    <p>Os usuários garantem que o site, informação, produtos, serviços e/ou ferramentas aqui contidos não serão utilizados com propósitos contrários às leis ou que infrinjam os presentes termos e condições. Os usuários não utilizarão o site, informação, produtos, serviços e/ou ferramentas de maneira que possa prejudicar, desabilitar, sobrecarregar ou deteriorar o site, a informação, produtos, serviços e/ou ferramentas ou seu uso por parte de terceiros. Os usuários não tentarão obter nenhuma informação, produtos, serviços e/ou ferramentas por meios não intencionalmente disponíveis ou habilitados neste site.</p>

    <p>Os usuários também se comprometem a respeitar os direitos de terceiros, bem como as leis de propriedade intelectual durante qualquer uso do site, informação, produtos, serviços e/ou ferramentas aqui contidos.</p>

    <h4>Privilégios e Imunidades</h4>

    <p>Nada do aqui exposto constituirá ou poderá ser interpretado como renúncia, expressa ou tácita, aos privilégios, imunidades e exonerações que a OPAS goza, de conformidade com o Direito Internacional, tratados ou acordos internacionais, ou a legislação de seus Países Membros.</p>

    <h4>Espaços de diálogo</h4>

    <p>A BIREME/OPAS poderá oferecer espaços de diálogo ou outros instrumentos de comunicação. Ao utilizarem esses instrumentos, os usuários se comprometem se abster de:</p>

    <ul style="list-style-type: lower-alpha;">
        <li>Difamar, injuriar, assediar, ameaçar ou assumir qualquer outro tipo de comportamento que vulnere os direitos dos outros;</li>
        <li>Difundir, publicar, distribuir ou divulgar informações ou materiais difamatórios, obscenos, indecentes, ilícitos ou imorais;</li>
        <li>Baixar no site ou enviar como anexos de uma mensagem arquivos que contenham programas informáticos ou outros materiais amparados pelas leis de propiedade intelectual (ou pelo direito à intimidade e à publicidade), sem contar com a autorização correspondente;</li>
        <li>Não incluir a referência do autor ou notificações legais, mentir sobre a origem ou apresentar como próprio programas informáticos ou outros materiais presentes em um arquivo baixado no site;</li>
        <li>Anunciar ou colocar à venda bens ou serviços, realizar ou promover pesquisas, concursos ou correntes, baixar de um fórum um arquivo enviado por outro usuário que o usuário saiba, ou deva saber, que não pode ser distribuído licitamente dessa maneira.</li>
    </ul>

    <p>Os usuários reconhecem que todos os espaços de diálogo constituem um meio de comunicação pública e não privada. Reconhecem também que os diálogos e o material publicado no site não contam com o respaldo da BIREME/OPAS e não serão considerados revisados, examinados nem aprovados pela BIREME/OPAS.</p>

    <h4>Reclamações por possíveis infrações</h4>

    <p>A BIREME/OPAS se esforçará para impedir em seu site atividades ilícitas e contrárias aos presentes Termos e Condições. Entretanto, se o usuário acreditar que alguma informação contida no site ou em seus materiais poderia estar infringindo seus direitos ou os de terceiros, incluindo, sem limitação, direitos de propriedade intelectual, deverá entrar em contato com a BIREME/OPAS enviando una descrição detalhada da suposta violação para o seguinte email: online@bireme.org</p>

    <h4>Resolução de controvérsias</h4>

    <p>Qualquer disputa, controvérsia ou reclamação surgida ou derivada do uso do site ou de sua informação, produtos, serviços e/ou ferramentas será resolvida de forma amistosa entre a BIREME/OPAS e o usuário. A menos que as disputas ou controvérsias se solucionem de forma amistosa nos sessenta (60) dias posteriores ao recebimento por uma das partes da solicitação da outra de tentar una resolução amistosa, tal disputa, controvérsia ou reclamação será remitida por qualquer uma das partes para arbitragem, de conformidade com as Regras de Arbitragem da Comissão das Nações Unidas para o Direito Mercantil Internacional (CNUDMI) vigentes. O tribunal arbitral não estará autorizado a impor danos punitivos. Qualquer laudo arbitral emitido em virtude da mencionada arbitragem será considerado como a adjudicação definitiva da disputa, controvérsia ou reclamação e terá caráter vinculante para as partes.</p>

    <p><strong>SE NÃO ESTIVER CONFORME COM ALGUM DOS TERMOS E CONDIÇÕES PRESENTES DEVERÁ SE ABSTER DE UTILIZAR O SITE E QUALQUER MATERIAL CONTIDO NO MESMO.</strong></p>

</div>
');
    define('DATA_POLICY_MESSAGE','
<div class="terms">

    <h2>POLÍTICA DE PRIVACIDADE DOS SITES E SISTEMAS WEB DA BIREME/OPAS</h2>

    <p>A utilização dos produtos, serviços e/ou ferramentas que o Centro Latino-Americano e do Caribe de Informação em Ciências da Saúde (BIREME), Centro Especializado da Organização Pan-Americana da Saúde, Escritório Regional para as Américas da Organização Mundial da Saúde, doravante BIREME/OPAS, coloca à disposição dos usuários, constitui aceitação da seguinte Política de Privacidade. Em caso de discrepância entre o texto em espanhol e qualquer outro idioma desta Política de Privacidade, prevalecerá o documento em espanhol.</p>

    <p>Esta Política de Privacidade complementa a Política Geral de Privacidade da OPAS, disponível em <a href="http://www.paho.org/hq/index.php?option=com_content&view=article&id=3201%3Apah o-website-privacy-policy&catid=6822%3Acorporate-pages&Itemid=2410&lang=pt" target="_blank">http://www.paho.org/hq/index.php?option=com_content&view=article&id=3201%3Apah o-website-privacy-policy&catid=6822%3Acorporate-pages&Itemid=2410&lang=pt</a></p>

    <h3>PRIVACIDADE</h3>

    <p>Sua privacidade na Internet é de suma importância para a BIREME/OPAS. Nesta declaração de privacidade descreve-se a política da BIREME/OPAS no tocante à compilação e troca de informação das pessoas que utilizam o presente site da BIREME/OPAS.</p>

    <h4>Que tipo de informação é compilada pela BIREME/OPAS?</h4>

    <p style="text-decoration: underline;">Uso normal dos sites</p>

    <p>Em geral você pode consultar os sites da BIREME/OPAS sem dizer quem é nem revelar nenhum tipo de informação pessoal. A única informação que compilamos durante uma consulta geral provém dos registros ordinários do servidor e inclui seu endereço IP (protocolo da internet), o nome do domínio, o tipo de navegador, o sistema operacional e informação sobre como chegou a nós, os arquivos que baixou, os sites que consultou e a data e hora dessas consultas.</p>

    <p style="text-decoration: underline;">Compilação de informação que permite identificar a pessoa</p>

    <p>Se você se registrar para acessar algum site, produto ou serviço da BIREME/OPAS, como os Serviços Personalizados Mi BVS e FI-Admin, deverá oferecer informação pessoal como seu nome, email, instituição em que trabalha, país de origem, nível acadêmico, área de atuação profissional, sexo, data de nascimento e dados das suas redes sociais. Esta informação só será compilada com seu conhecimento e permissão e será mantida nas bases de dados da BIREME/OPAS, bem como nas listas de endereços.</p>

    <p>Para certos sites da BIREME/OPAS, o registro ou certas informações pessoais fazem com que seja instalado um cookie* em seu computador, que permitirá que a BIREME/OPAS lembre suas informações da próxima vez que consultar o site, para que não seja preciso colocar novamente seus dados, ajudando-nos a lhe oferecer um serviço melhor.</p>

    <p>Se você se incorporar a um grupo de discussão eletrônica, outros participantes do grupo (inclusive funcionários que não pertencem à OPAS) poderão ver suas informações pessoais. No caso dos grupos de debate abertos, esta informação será pública.</p>

    <h4>O que a BIREME/OPAS faz com a informação que compila?</h4>

    <p>A informação compilada durante uma consulta geral é usada para analisar tendências e o uso dos sites da BIREME/OPAS, bem como para melhorar a utilidade desses sites. Não está conectada a nenhum tipo de dados pessoais.</p>

    <p style="text-decoration: underline;">Informação que permite identificar as pessoas</p>

    <p>A BIREME/OPAS pode usar a informação pessoal proporcionada para:</p>

    <ul>
        <li>entrar em contato com você a fim de responder uma consulta ou sugestão, ou para lhe enviar boletins informativos, documentos, publicações etc.;</li>
        <li>confirmar sua informação de registro no site;</li>
        <li>"lembrar" seu perfil e preferências on-line;</li>
        <li>ajudá-lo a encontrar rapidamente informação útil conforme seus interesses e ajudarnos a criar um conteúdo que lhe seja mais proveitoso;</li>
        <li>realizar uma análise estatística.</li>
    </ul>

    <h4>Que acontece se não quiser oferecer informação pessoal?</h4>

    <p>É opcional fornecer informação pessoal nos sites da BIREME/OPAS. Se optar por não fornecer esse tipo de informação, de qualquer forma pode consultar e usar os sites da BIREME/OPAS, porém não poderá utilizar certas opções, como acessar os Serviços Personalizados Mi BVS ou gerir fontes de informação da BVS através do sistema web FI-Admin.</p>

    <p style="text-decoration: underline;">Opção de modificar a informação ou solicitar que ela seja eliminada</p>

    <p>A qualquer momento você pode modificar sua informação ou solicitar que seja eliminada; para isso deve entrar novamente no site onde inseriu a informação pela primeira vez e comunicar-se com o ponto focal desse site. Se não forem proporcionados dados de contato no site, pode contatar a online@bireme.org.</p>

    <h3>SEGURANÇA</h3>

    <p>Não vendemos nem trocamos nenhum tipo de informação pessoal proporcionada voluntariamente nos sites da BIREME/OPAS a terceiros. Toda a informação fornecida à BIREME/OPAS pelos usuários dos sites da BIREME/OPAS é guardada com grande cuidado e segurança, e não se usará de maneira diferente das estabelecidas por essa política de privacidade, em qualquer política própria do site, ou das que você autorizou explicitamente. A BIREME/OPAS usa uma grande variedade de tecnologias e medidas de segurança para proteger a informação que se encontra nos nossos sistemas a fim de evitar perdas, uso indevido, acesso não autorizado ou divulgação, modificação ou destruição.</p>

    <p>Todos os nossos funcionários que têm acesso aos dados pessoais e estão ligados ao seu processamento são obrigados a respeitar o sigilo dos assuntos oficiais, inclusive dos dados pessoais.</p>

    <p>Os sites da BIREME/OPAS contêm links para sites externos. A BIREME/OPAS não é responsável pelas práticas de privacidade nem pelo conteúdo de tais sites.</p>

    <h4>Notificação de mudanças</h4>

    <p>A BIREME/OPAS poderá modificar esta Política de Privacidade e publicará estas modificações no presente site.</p>

    <h4>Contato</h4>

    <p>Para perguntas ou consultas no tocante a essa política de privacidade, comunique-se conosco no online@bireme.org.</p>

    <p style="margin-bottom: 0;">* Cookie</p>

    <p>Um cookie é um pequeno conjunto de dados enviado de um servidor da web para seu navegador. É usado normalmente para atribuir uma identificação única ao seu computador e armazenar de forma segura informações como o ID do usuário, senhas, preferências e perfis eletrônicos. É armazenado no disco rígido de seu computador. Você tem a opção de não permitir a instalação de cookies da OPAS/OMS se isso mudar a configuração de seu navegador. Diversos sites podem enviar seus próprios cookies a seu computador. Para proteger sua privacidade, o navegador permite apenas que um site obtenha acesso a seus próprios cookies e não permite o acesso aos instalados por outros sites.</p>

    <p><strong>SE NÃO ESTIVER CONFORME COM ALGUM DOS TERMOS E CONDIÇÕES DESTA POLÍTICA DE PRIVACIDADE DEVERÁ SE ABSTER DE UTILIZAR O SITE E QUALQUER MATERIAL NELE CONTIDO.</strong></p>

</div>
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
    define("FORGOT_PASSWORD",'Esqueci minha senha?');
    define("FORGOT_MY_PASSWORD",'Esqueci minha senha');
    define("FORGOT_PASSWORD_MESSAGE",'
<p>Minha BVS está disponível gratuitamente para qualquer usuário por meio de sua conta Facebook, Google, BIREME Account ou do próprio serviço Minha BVS.</p>
<p>Este formulário é exclusivo para recuperar senha de usuário registrado do serviço Minha BVS.</p>
<p>Informe seu e-mail ou usuário do serviço Minha BVS para receber uma mensagem de correio eletrônico com a sua senha.</p>
');
    define("CHANGE_PASSWORD",'Alterar Senha');
    define("RECOVER_PASSWORD",'Recuperar Senha');
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
    define("LEAVE_COMMENT",'Enviar Comentário');
    define("REPORT_ERROR",'Comunicar Erro');
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
    define('CHOOSE_PROFESSIONAL_AREA','elejir');
    define('CHOOSE_COUNTRY','elijir');
    define('DEGREE','Nível académico');
    define('PROFESSIONAL_AREA','Área de actuación profesional');
    define('EMAIL_SENT','E-mail enviado.');
    define("EMAIL_FROMNAME",'Mi BVS');
    define("NEW_PASSWORD_EMAIL_SUBJECT",'Servicios Personalizados Mi BVS: Contraseña');
    define("CONFIRM_USER_EMAIL_SUBJECT",'Servicios Personalizados Mi BVS: Confirmación de Registro - ');
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
    define("FREE_REGISTRY","¡Registrate ahora!");
    define("FREE_REGISTRY_MESSAGE",'
<p>Mi BVS es un servicio gratuito disponible a cualquier usuario a través de su cuenta Facebook, Google, BIREME Account o del propio servicio Mi BVS.</p>
<p>El usuario que prefiere usar el servicio Mi BVS con su cuenta Facebook o Google NO requiere crear una nueva cuenta de usuario en Mi BVS.</p>
<p>BIREME Account es un sistema de gestión de usuarios de los Centros Cooperantes de la Red BIREME. Estos usuarios NO requieren crear una nueva cuenta de usuario en Mi BVS.</p>
<p>Para crear una nueva cuenta de usuario Mi BVS es necesario llenar el formulario abajo con datos personales y concordar con los términos de uso y política de privacidad. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">¡Conozca más!</a></p>
');
    define("MY_VHL_DESCRIPTION",'
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
');
    define('MY_VHL_ENTRY','¿Es usuario de Mi BVS?');
    define('OR_ENTER_WITH','o entre con');
    define('ENTER','Entrar');
    define("FOOTER_MESSAGE",'<p><strong>BIREME - OPS - OMS</strong><br/>
Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud<br />
Area de Gestión del Conocimiento, Bioética y Investigación - KBR<br />
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
    define("USER_SEND_CONFIRMATION","<b>¡Registro de usuario realizado con éxito!</b><br />Enviamos un mensaje a su correo electrónico con enlace de confirmación de su registro como usuario de Mi BVS.<br />Si tarda en llegar, compruebe su caja de SPAM y basura electrónica.<br />Por favor haga clic en el enlace enviado para activar su usuario de Mi BVS.");
    define("USER_UPDATED",'Usuario actualizado con succeso.');
    define("USER_PASSWORD_UPDATE",'¡Contraseña actualizada con succeso!');
    define("USER_UPDATE_ERROR",'<b>Problemas en la actualización</b><br />El sistema no logro actualizar los datos del usuário. Tente mas tardera.');
    define("USER_CONFIRMED",'<b>Su cuenta ha sido confirmada con éxito!</b><br />Por favor, acceda a su perfil en Mi BVS y complete su registro.<br />Pronto, Usted recibirá un e-mail con su contraseña de acceso a Mi BVS.<br />Si tarda en llegar, compruebe su caja de SPAM y basura electrónica.');
    define("USER_ADD_CONFIRMED",'<b>¡Usuário añadido con succeso!</b><br />La contraseña de acceso de su usuario ha sido enviada por e-mail.<br />Si tarda en llegar, compruebe su caja de SPAM y basura electrónica.');
    define("USER_CONFIRMATION_ERROR",'<b>ERROR: No fue posible confirmar el Usuario.</b>');
    define("VALMSG_G_EMPTY","Campo obligatório. No puede quedarse en blanco.");
    define("VALMSG_LOGIN","Informe un email válido.");
    define("VALMSG_EMAIL","Informe un email válido.");
    define("NEWPASS_CREATE_ERROR",'<b>ERROR: No se pudo generar una nueva contraseña.</b>');
    define("NEWPASS_CHANGE_ERROR",'<b>ERROR: No se pudo cambiar su contraseña.</b>');
    define("NEWPASS_INVALID_PASSWORD",'Contraseña incorrecta');
    define("NEWPASS_DOMAIN_NOT_PERMITTED",'Acción no permitida para este usuario.');
    define("NEWPASS_PASSWORD_SENT",'Una nueva contraseña fue enviada para su correo electrónico.<br />Si tarda en llegar, compruebe su caja de SPAM y basura electrónica.');
    define("NOTICE",'Mensaje al usuário');
    define("NOTICE_MESSAGE",'');
    define("UPDATE_INFO",'<b>Por favor, revise sus datos en el formulario para seguir utilizando el servicio Mi BVS.</b>');
    define("ACCEPT_MAIL",'Me gustaría recibir actualizaciones acerca del servicio Mi BVS');
    define("TERMS",'Condiciones de uso');
    define("TERMS_AGREEMENT_MESSAGE",'Estoy de acuerdo con los <a data-toggle="modal" data-target=".bs-terms-modal-lg" style="cursor: pointer; text-decoration: underline;">Términos de Uso</a> y confirmo que leí la <a data-toggle="modal" data-target=".bs-policy-modal-lg" style="cursor: pointer; text-decoration: underline;">Política de Privacidad</a> de Mi BVS');
    define("TERMS_MESSAGE",'
<div class="terms">

    <h3>TÉRMINOS Y CONDICIONES DE USO DE LOS SITIOS Y SISTEMAS WEB DE BIREME/OPS</h3>

    <p>La utilización de los productos, servicios y/o herramientas que pone a disposición El Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud (BIREME), Centro Especializado de la Organización Panamericana de la Salud, Oficina Regional para las Américas de la Organización Mundial de la Salud, en adelante BIREME/OPS, a disposición de los usuarios constituye aceptación de los siguientes Términos y Condiciones. En caso de discrepancia entre el texto en español y cualquier otro idioma de estos Términos y Condiciones, prevalecerá el documento en español.</p>

    <p>BIREME/OPS se reserva el derecho a accionar legalmente para frenar cualquier infracción o incumplimiento de los presentes Términos y Condiciones. BIREME/OPS podrá modificar estos Términos y Condiciones a su entera discreción y publicará estas modificaciones en el presente sitio. Usar este sitio, los productos, servicios y/o herramientas luego de efectuados éstos cambios constituye aceptación por parte del usuario de los nuevos Términos y Condiciones. La OPS se reserva el derecho exclusivo de cancelar el acceso de cualquier usuario por infracción de derechos o incumplimiento de los presentes Términos y Condiciones.</p>

    <h4>Uso del nombre de BIREME y/o la OPS</h4>

    <p>El nombre, acrónimo y/o logo de BIREME y la OPS, están protegidos por el derecho internacional. Excepto para propósitos de atribución autoral éstos no pueden ser utilizados sin autorización previa expresa y por escrito de BIREME/OPS. El nombre, acrónimo, logo BIREME/ OPS tampoco pueden ser utilizados con fines promocionales o en ninguna forma que indique, sugiera o pueda interpretarse como asociación, afiliación, patrocinio o respaldo de BIREME/OPS.</p>

    <h4>Limitación de Responsabilidad</h4>

    <p>Los productos, servicios y/o herramientas que BIREME/OPS pone a disposición de los usuarios se proporcionan sin ningún tipo de garantía, explícita o implícita. BIREME/OPS no ofrece garantías ni responderá por la exactitud o veracidad de la información, productos, servicios y/o herramientas proporcionados. BIREME/ OPS podrá modificar éstos periódicamente sin previo aviso. Bajo ninguna circunstancia BIREME/OPS será responsable de las pérdidas, daños y/o perjuicios que puedan presuntamente derivarse de su utilización o su no disponibilidad. Los usuarios deben utilizar estos productos, servicios y/o herramientas por su propia cuenta y riesgo. En ningún caso BIREME/OPS será responsable por daños y/o perjuicios aún cuando éstos pudieran haber sido advertidos y/o prevenidos.</p>

    <p>BIREME/OPS se reserva el derecho de modificar o descontinuar cualquier información, productos, servicios y/o herramientas que ponga a disposición de sus miembros y/o usuarios a través de este sitio, con o sin previo aviso.</p>

    <p>La utilización de designaciones de países o territorios no deberán considerarse como indicativo de la posición por parte de BIREME/OPS con relación a la situación jurídica de ningún país o territorio, de sus autoridades e instituciones ni el reconocimiento de ninguna frontera.</p>

    <p>BIREME/OPS no será responsable de ningún daño o pérdida que pueda derivarse o relacionarse con el uso o falla del sitio, información, productos, servicios y/o herramientas aquí contenidos, incluso en los casos derivados de uso inapropiado, impropio o fraudulento. Tampoco será responsable de la precisión, disponibilidad o veracidad de la información aquí contenida.</p>

    <p>BIREME/OPS no ofrece garantías de ningún tipo respecto de los materiales, información, productos, servicios y/o herramientas disponibles en el sitio y no será responsable por cualquier infección con virus informático o cualquier otro programa que pueda afectar el funcionamiento de computadoras o sistemas.</p>

    <p>Algunos materiales, información, productos, servicios y/o herramientas a los cuales los usuarios podrán acceder a través de este sitio podrían ser de titularidad de terceros, la BIREME/OPS no garantiza la titularidad de éstos y no será responsable ante los usuarios o terceros por cualquier reclamo derivado de su uso. Es posible que en el sitio, materiales, información, productos, servicios y/o herramientas se incluyan enlaces a sitios externos no manejados por la BIREME/OPS. Estos enlaces se incluyen a modo de referencia y su incorporación no implica aprobación o endoso por parte de BIREME/OPS. BIREME/OPS no asume responsabilidad respecto de la información contenida en estos sitios.</p>

    <p>La utilización de este sitio por los usuarios implica la aceptación de la obligación de defender, mantener a salvo e indemnizar a BIREME/OPS y a sus afiliados por cualquier acción, reclamo daño, pérdida y/o gasto (incluidos los honorarios de abogados) que se deriven de dicha utilización.</p>

    <p>BIREME/OPS se reserva el derecho de utilizar o divulgar información sobre sus usuarios. Asimismo se reserva el derecho de editar, no publicar o remover cualquier producto, servicios, herramienta o información o material en parte o en su totalidad a su entera discreción.</p>

    <h4>Usos no permitidos</h4>

    <p>Los usuarios garantizan que el uso de del sitio, información, productos, servicios y/o herramientas aquí contenidos, no serán utilizados con propósitos que sean contrarios a las leyes o que contravengan los presentes términos y condiciones. Los usuarios no utilizaran el sitio, información, productos, servicios y/o herramientas de manera que pueda perjudicar, inhabilitar, sobrecargar o deteriorar el sitio, información, productos, servicios y/o herramientas o su uso por parte de terceros. Los usuarios no intentarán obtener ninguna información, productos, servicios y/o herramientas por medios no intencionalmente disponibles o habilitados en este sitio.</p>

    <p>Asimismo los usuarios se comprometen a respetar los derechos de terceros así como las leyes de propiedad intelectual durante cualquier uso de del sitio, información, productos, servicios y/o herramientas aquí contenidos.</p>

    <h4>Privilegios e Inmunidades</h4>

    <p>Nada de lo aquí expuesto constituirá o podrá ser interpretado como renuncia, expresa o tácita, de los privilegios, inmunidades, y exoneraciones de que goza, la OPS, de conformidad con el Derecho Internacional, tratados o convenios internacionales, o la legislación de sus Países Miembros.</p>

    <h4>Espacios de diálogo</h4>

    <p>BIREME/OPS podrá ofrecer espacios de diálogo u otros instrumentos de comunicación. Los usuarios al hacer uso de estos instrumentos se comprometen a abstenerse de:</p>

    <ul style="list-style-type: lower-alpha;">
        <li>Difamar, injuriar, acosar, amenazar o asumir cualquier otro tipo de conducta que vulnere los derechos de otros;</li>
        <li>Difundir, publicar, distribuir o divulgar informaciones o materiales difamatorios, obscenos, indecentes, ilícitos o inmorales;</li>
        <li>Cargar en el sitio o enviar como anexos de un mensaje archivos que contengan programas informáticos u otros materiales amparados por las leyes de propiedad intelectual (o por el derecho a la intimidad y la publicidad), sin contar con la autorización correspondiente;</li>
        <li>No incluir la referencia del autor o notificaciones legales, mentir acerca del origen o presentar como propio programas informáticos u otros materiales contenidos en un archivo que se cargue en el sitio;</li>
        <li>Anunciar o poner a la venta bienes o servicios, o realizar o promover encuestas, concursos o cadenas de cartas, o descargar de un foro un archivo enviado por otro usuario que el usuario sepa, o razonablemente deba saber, que no se puede distribuir lícitamente de esa manera.</li>
    </ul>

    <p>Los usuarios reconocen que todos los espacios de diálogo constituyen un medio de comunicación pública y no privada. Asimismo, reconocen que los diálogos y el material publicado en el sitio no cuentan con el respaldo de BIREME/OPS y no se considerarán como revisados, examinados ni aprobados por BIREME/OPS.</p>

    <h4>Reclamaciones por posibles infracciones</h4>

    <p>BIREME/OPS se esforzará por impedir en su sitio actividades ilícitas y contrarias a los Términos y Condiciones aquí contenidos. No obstante, si usted creyera que alguna información contenida en el sitio o sus materiales pudiera estar infringiendo sus derechos o de terceros, incluyendo, sin limitación, derechos de propiedad intelectual, deberá ponerse en contacto con la BIREME/OPS enviando una descripción detallada de la violación alegada a la siguiente dirección: online@bireme.org</p>

    <h4>Resolución de controversias</h4>

    <p>Cualquier disputa, controversia o reclamo que surja o se derive del uso del sitio o su información, productos, servicios y/o herramientas será resuelta en forma amistosa entre BIREME/OPS y usuario. A menos que las disputas o controversias se solucionen en forma amistosa dentro de los sesenta (60) días posteriores a la recepción por una de las partes de la solicitud de la otra de intentar una resolución amistosa, dicha disputa, controversia, o reclamo será remitida por cualquiera de las partes a arbitraje de conformidad con las Reglas de Arbitraje de la Comisión de las Naciones Unidas para el Derecho Mercantil Internacional (CNUDMI) vigentes. El tribunal arbitral no estará autorizado a imponer daños punitivos. Cualquier laudo arbitral emitido en virtud del arbitraje referido se considerará como la adjudicación definitiva a la disputa, controversia o reclamo y tendrá carácter vinculante para las partes.</p>

    <p><strong>SI NO ESTUVIERA CONFORME CON ALGUNO DE LOS TÉRMINOS Y CONDICIONES AQUÍ CONTENIDOS DEBERÁ ABSTENERSE DE UTILIZAR EL SITIO Y CUALQUIER MATERIAL AQUÍ CONTENIDO.</strong></p>
    
</div>
');
    define('DATA_POLICY_MESSAGE','
<div class="terms">

    <h2>POLÍTICA DE PRIVACIDAD DE LOS SITIOS Y SISTEMAS WEB DE BIREME/OPS</h2>

    <p>La utilización de los productos, servicios y/o herramientas que pone a disposición El Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud (BIREME), Centro Especializado de la Organización Panamericana de la Salud, Oficina Regional para las Américas de la Organización Mundial de la Salud, en adelante BIREME/OPS, a disposición de los usuarios constituye aceptación de la siguiente Política de Privacidad. En caso de discrepancia entre el texto en español y cualquier otro idioma de esta Política de Privacidad, prevalecerá el documento en español.</p>

    <p>Esta Política de Privacidad es complementaria a la Política General de Privacidad de la OPS, disponible en <a href="http://www.paho.org/hq/index.php?option=com_content&view=article&id=3201%3Apah o-website-privacy-policy&catid=6822%3Acorporate-pages&Itemid=2410&lang=es" target="_blank">http://www.paho.org/hq/index.php?option=com_content&view=article&id=3201%3Apah o-website-privacy-policy&catid=6822%3Acorporate-pages&Itemid=2410&lang=es</a></p>

    <h3>PRIVACIDAD</h3>

    <p>Su privacidad en la Internet es de suma importancia para la BIREME/OPS. En esta declaración de privacidad se describe la política de BIREME/OPS en cuanto a la recopilación y el intercambio de información de las personas que utilizan el presente sitio de BIREME/OPS.</p>

    <h4>¿Qué tipo de información recopila BIREME/OPS?</h4>

    <p style="text-decoration: underline;">Uso normal de sitios web</p>

    <p>En general, usted puede consultar los sitios de BIREME/OPS sin decirnos quién es ni revelar ningún tipo de información personal. La única información que recopilamos durante una consulta general proviene de los registros ordinarios del servidor e incluye su dirección de IP (protocolo de internet), el nombre del dominio, el tipo de navegador, el sistema operativo e información como el sitio web a través del cual llegó a nosotros, los archivos que descargó, los sitios que consultó y la fecha y hora de esas consultas.</p>

    <p style="text-decoration: underline;">Recopilación de información que permite identificar a la persona</p>

    <p>Si usted se registra para acceder a algún sitio, producto o servicio de BIREME/OPS, como los Servicios Personalizados Mi BVS y el FI-Admin, se le pedirá que suministre información personal como su nombre, dirección de correo electrónico, institución a la cual pertenece, país de origen, nivel académico, área de actuación profesional, sexo, fecha de nacimiento e datos de sus redes sociales. Esta información se recopila solo con su conocimiento y permiso, y se mantiene en las bases de datos de BIREME/OPS y listas de direcciones.</p>

    <p>Para ciertos sitios de BIREME/OPS, registrarse o proporcionar cierta información personal hace que se instale una cookie* en su computadora, que permitirá que BIREME/OPS recuerde su información la próxima vez que usted consulte el sitio, de  manera que no tenga que volver a ingresar sus datos, lo que nos ayuda a brindarle un servicio mejor.</p>

    <p>Si se incorpora a un grupo de debate electrónico puede que otros participantes del grupo (incluidos funcionarios que no pertenecen a la OPS) vean la información personal que usted haya proporcionado. En el caso de los grupos de debate abiertos, esta información será pública.</p>

    <h4>¿Qué hace BIREME/OPS con la información que recopila?</h4>

    <p>La información recopilada durante una consulta general se usa para analizar tendencias y uso de los sitios de BIREME/OPS, y para mejorar la utilidad de estos sitios. No está conectada con ningún tipo de datos personales.</p>

    <p style="text-decoration: underline;">Información que permite identificar a la persona</p>

    <p>BIREME/OPS puede usar la información personal que usted proporciona para:</p>

    <ul>
        <li>ponerse en contacto con usted: ya sea para responder a una consulta o sugerencia, o para enviarle boletines informativos, documentos, publicaciones, etc.;</li>
        <li>confirmar su información de registro en el sitio;</li>
        <li>"recordar" su perfil y preferencias en línea;</li>
        <li>ayudarlo a encontrar rápidamente información útil según sus intereses y ayudarnos a crear un contenido que le resulte más provechoso;</li>
        <li>realizar un análisis estadístico.</li>
    </ul>

    <h4>¿Qué sucede si no quiero suministrar información personal?</h4>

    <p>Suministrar información personal en los sitios de BIREME/OPS es optativo. Si decide no suministrar información personal, puede de todas formas consultar y usar los sitios de BIREME/OPS, pero no podrá utilizar ciertas opciones como acceder a los Servicios Personalizados Mi BVS o hacer gestión de las fuentes de información de la BVS a través del sistema web FI-Admin.</p>

    <p style="text-decoration: underline;">Opción de modificar la información o solicitar que sea eliminada</p>

    <p>En cualquier momento, usted puede modificar su información o solicitar que sea eliminada: para ello debe ingresar nuevamente al sitio donde ingresó la información por primera vez y comunicarse con el punto focal de ese sitio. Si no se proporcionan datos de contacto en el sitio, puede contactar a online@bireme.org.</p>

    <h3>SEGURIDAD</h3>

    <p>No vendemos ni intercambiamos ningún tipo de información personal proporcionada voluntariamente en los sitios de BIREME/OPS a terceros. Toda información suministrada a BIREME/OPS por los usuarios de los sitios de BIREME/OPS se guarda con gran  cuidado y seguridad, y no se usará de manera distinta de las establecidas en esta política de privacidad, en cualquier política propia del sitio, o de las que usted ha autorizado explícitamente. BIREME/OPS emplea una variedad de tecnologías y medidas de seguridad para proteger la información que se encuentra en nuestros sistemas a fin de evitar pérdidas, uso indebido, acceso no autorizado o divulgación, modificación o destrucción.</p>

    <p>Todos nuestros empleados que tienen acceso a los datos personales y están asociados con su procesamiento están obligados a respetar la confidencialidad de los asuntos oficiales, incluidos los datos personales.</p>

    <p>Los sitios de BIREME/OPS contienen enlaces a sitios externos. BIREME/OPS no es responsable de las prácticas de privacidad ni del contenido de tales sitios.</p>

    <h4>Notificación de cambios</h4>

    <p>BIREME/OPS podrá modificar esta Política de Privacidad a su entera discreción y publicará estas modificaciones en el presente sitio.</p>

    <h4>Contacto</h4>

    <p>Para preguntas o consultas con respecto a esta política de privacidad, sírvase comunicarse con nosotros en online@bireme.org</p>

    <p style="margin-bottom: 0;">* Cookie</p>

    <p>Una cookie es un pequeño conjunto de datos que se envía de un servidor de la web a su navegador. Se usa normalmente para asignar una identificación única a su computadora y almacenar de manera segura información como el ID del usuario, contraseñas, preferencias y perfiles electrónicos. Se almacena en el disco duro de su computadora. Usted tiene la opción de no permitir que se instalen cookies de la OPS/OMS si cambia la configuración de su navegador. Distintos sitios web pueden enviar sus propias cookies a su computadora. Para proteger su privacidad, el navegador solo permite que un sitio web obtenga acceso a sus propias cookies y no permite el acceso a las instaladas por otros sitios.</p>

    <p><strong>SI NO ESTUVIERA CONFORME CON ALGUNO DE LOS TÉRMINOS Y CONDICIONES DE ESTA POLÍTICA DE PRIVACIDAD DEBERÁ ABSTENERSE DE UTILIZAR EL SITIO Y CUALQUIER MATERIAL AQUÍ CONTENIDO.</strong></p>

</div>
');
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
<p>Mi BVS está disponible gratuitamente para cualquier usuario a través de su cuenta de Facebook, Google, BIREME Account o del propio servicio Mi BVS.</p>
<p>Este formulario es exclusivo para recuperar seña de usuario registrado del servicio Mi BVS.</p>
<p>Informe su e-mail o usuario del servicio Mi BVS para recibir un mensaje de correo electrónico con su seña.</p>
');
    define("CHANGE_PASSWORD",'Cambiar Contraseña');
    define("RECOVER_PASSWORD",'Recuperar Contraseña');
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
    define("LEAVE_COMMENT",'Enviar Comentario');
    define("REPORT_ERROR",'Informar Error');
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
    define('CHOOSE_PROFESSIONAL_AREA','choose');
    define('CHOOSE_COUNTRY','choose');
    define('DEGREE','Degree');
    define('EMAIL_SENT','E-mail sent.');
    define("EMAIL_FROMNAME",'My VHL');
    define("NEW_PASSWORD_EMAIL_SUBJECT",'Custom Services My VHL: Password');
    define("CONFIRM_USER_EMAIL_SUBJECT",'Custom Services My VHL: Register Confirmation - ');
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
    define('FIELD_LOGIN','E-mail or User');
    define('FIELD_LOGIN_CONFIRMATION','E-mail or login confirmation');
    define('FIELD_PASSWORD','Password');
    define('FIELD_OLD_PASSWORD','Current');
    define('FIELD_NEW_PASSWORD','New');
    define('FIELD_NEW_PASSWORD_CONFIRM','Re-type new');
    define('FIELD_PASSWORD_CONFIRMATION','Password confirmation');
    define('FIELD_GENDER_MALE','Male');
    define('FIELD_GENDER_FEMALE','Female');
    define('FIELD_BIRTHDAY','Date of birth');
    define("FREE_REGISTRY","Register for free!");
    define("FREE_REGISTRY_MESSAGE",'
<p>My VHL is a free service available to any user through their Facebook, Google, BIREME Account or the My VHL service itself.</p>
<p>Users who prefer to use the My VHL service with their Facebook or Google account do NOT need to create a new user account in My VHL.</p>
<p>BIREME Account is a system of account management of users of BIREME Network Cooperating Centers. These users do NOT need to create a new user account in My VHL.<p/>
<p>To create a new My VHL user account, you must complete with personal data and agree to the terms of use and privacy policy. <a href="javascript:;" class="decor" data-toggle="modal" data-target=".bs-modal-lg" style="text-decoration: underline;">Know more</a></p>
');
    define("MY_VHL_DESCRIPTION",'
<p>My VHL is a free service that stores information and user preferences to offer customized services and facilities such as:</p>
<ul>
    <li>Creation of collections of documents from the results of searches processed in the VHL databases.</li>
    <li>Documents found in the VHL databases from the keywords indicated for Topics of Interest.</li>
    <li>User-authored publications retrieved from multiple sources by considering the ORCID number entered in the User Profile.</li>
    <li>History of searches performed on the VHL whenever the user is logged into the service.</li>
    <li>List of favorite links indicated by the user allowing quick and direct access to sites of interest.</li>
</ul>
<p>My VHL is available to any user through their Facebook, Google, BIREME Account or the My VHL service itself.</p>
<p>BIREME Account is a system of account management of users of BIREME Network Cooperating Centers that access the FI-Admin system, among other systems. This same user account is enabled for the My VHL service.</p>
<p>If you prefer a separate account for the My VHL service, you must make your free registration as a user, and accept the terms of use and privacy policy.</p>
');
    define('MY_VHL_ENTRY','Already registered in My VHL?');
    define('OR_ENTER_WITH','or sign in with');
    define('ENTER','Sign in');
    define("FOOTER_MESSAGE",'<p><strong>BIREME - PAHO - WHO</strong><br/>
Latin American and Caribbean Center on Health Sciences Information<br />
Knowledge Management, Bioethics and Research Area - KBR<br />
Rua Vergueiro, 1759 | cep: 04101-000 | São Paulo - SP | Phone: (55 11) 5576-9800 | Fax: (55 11) 5575-8868<br />
<a href="http://new.paho.org/bireme" title="My VHL">http://www.paho.org/bireme</a><br /></p>');
    define('LEARN_MORE','Learn more');
    define('PERSONAL_DATA','Personal Data');
    define('REGISTER_NEW_USER_TITLE','New User Registration');
    define('REQUIRED_FIELD_TEXT','Required fields');
    define('OPTIONAL_FIELD_TEXT','Optional fields');
    define("TIP_LOGIN","The access login needs to be the user e-mail, eg: user@bireme.org");
    define("UPDATE_USER_TITLE","Update user");
    define("USER_ADDED",'User added successfully');
    define("USER_EXISTS","<b>User already exists</b><br />Try to log in with this user, if you have no success trying to authenticate with this user and don\'t remember the password,<br />use the link <b>\"forgot my password\"</b> in the user login box.");
    define("USER_ADD_ERROR","<b>Registry error</b>");
    define("USER_ADD_SUCCESS","<b>User registration successful!</b>");
    define("USER_SEND_CONFIRMATION","<b>User registration successful!</b><br />We sent a confirmation link to your account for your e-mail.<br />If it takes too long to get there, check out your SPAM box and junk mail.<br />Please click on the link sent to activate your account in My VHL.");
    define("USER_UPDATED",'User successfully updated!');
    define("USER_PASSWORD_UPDATE",'Password successfully updated!');
    define("USER_UPDATE_ERROR",'<b>Problems updating user data</b><br />The applications could not update the user data. Please try again later.');
    define("USER_CONFIRMED",'<b>Your account has been successfully confirmed!</b><br />Please access your profile in My VHL and complete your registration.<br />Soon, you will receive an email with your My VHL access password.<br />If it takes too long to get there, check out your SPAM box and junk mail.');
    define("USER_ADD_CONFIRMED",'<b>User registration was successful!</b><br />Your user password was sent by e-mail.<br />If it takes too long to get there, check out your SPAM box and junk mail.');
    define("USER_CONFIRMATION_ERROR",'<b>ERROR: Account verification failed.</b>');
    define("VALMSG_G_EMPTY","Mandatory field.");
    define("VALMSG_LOGIN","Type a valid e-mail.");
    define("VALMSG_EMAIL","Type a valid e-mail.");
    define("NEWPASS_CREATE_ERROR",'<b>ERROR: Could not generate a new password.</b>');
    define("NEWPASS_CHANGE_ERROR",'<b>ERROR: Could not be changed your password.</b>');
    define("NEWPASS_INVALID_PASSWORD",'Invalid password');
    define("NEWPASS_DOMAIN_NOT_PERMITTED",'Action not allowed for this user.');    
    define("NEWPASS_PASSWORD_SENT",'A new password was sent to your e-mail.<br />If it takes too long to get there, check out your SPAM box and junk mail.');
    define("NOTICE",'Notice to the users');
    define("NOTICE_MESSAGE",'');
    define("UPDATE_INFO",'<b>Please review your data in the form below to continue using the My VHL.</b>');
    define("ACCEPT_MAIL",'I would like to receive e-mails with information from My VHL.');
    define("TERMS",'Terms of use');
    define("TERMS_AGREEMENT_MESSAGE",'I agree to the <a data-toggle="modal" data-target=".bs-terms-modal-lg" style="cursor: pointer; text-decoration: underline;">Terms of Use</a> and have read the <a data-toggle="modal" data-target=".bs-policy-modal-lg" style="cursor: pointer; text-decoration: underline;">Privacy Policy</a> of My VHL');
    define("TERMS_MESSAGE",'
<div class="terms">

    <h3>TÉRMINOS Y CONDICIONES DE USO DE LOS SITIOS Y SISTEMAS WEB DE BIREME/OPS</h3>

    <p>La utilización de los productos, servicios y/o herramientas que pone a disposición El Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud (BIREME), Centro Especializado de la Organización Panamericana de la Salud, Oficina Regional para las Américas de la Organización Mundial de la Salud, en adelante BIREME/OPS, a disposición de los usuarios constituye aceptación de los siguientes Términos y Condiciones. En caso de discrepancia entre el texto en español y cualquier otro idioma de estos Términos y Condiciones, prevalecerá el documento en español.</p>

    <p>BIREME/OPS se reserva el derecho a accionar legalmente para frenar cualquier infracción o incumplimiento de los presentes Términos y Condiciones. BIREME/OPS podrá modificar estos Términos y Condiciones a su entera discreción y publicará estas modificaciones en el presente sitio. Usar este sitio, los productos, servicios y/o herramientas luego de efectuados éstos cambios constituye aceptación por parte del usuario de los nuevos Términos y Condiciones. La OPS se reserva el derecho exclusivo de cancelar el acceso de cualquier usuario por infracción de derechos o incumplimiento de los presentes Términos y Condiciones.</p>

    <h4>Uso del nombre de BIREME y/o la OPS</h4>

    <p>El nombre, acrónimo y/o logo de BIREME y la OPS, están protegidos por el derecho internacional. Excepto para propósitos de atribución autoral éstos no pueden ser utilizados sin autorización previa expresa y por escrito de BIREME/OPS. El nombre, acrónimo, logo BIREME/ OPS tampoco pueden ser utilizados con fines promocionales o en ninguna forma que indique, sugiera o pueda interpretarse como asociación, afiliación, patrocinio o respaldo de BIREME/OPS.</p>

    <h4>Limitación de Responsabilidad</h4>

    <p>Los productos, servicios y/o herramientas que BIREME/OPS pone a disposición de los usuarios se proporcionan sin ningún tipo de garantía, explícita o implícita. BIREME/OPS no ofrece garantías ni responderá por la exactitud o veracidad de la información, productos, servicios y/o herramientas proporcionados. BIREME/ OPS podrá modificar éstos periódicamente sin previo aviso. Bajo ninguna circunstancia BIREME/OPS será responsable de las pérdidas, daños y/o perjuicios que puedan presuntamente derivarse de su utilización o su no disponibilidad. Los usuarios deben utilizar estos productos, servicios y/o herramientas por su propia cuenta y riesgo. En ningún caso BIREME/OPS será responsable por daños y/o perjuicios aún cuando éstos pudieran haber sido advertidos y/o prevenidos.</p>

    <p>BIREME/OPS se reserva el derecho de modificar o descontinuar cualquier información, productos, servicios y/o herramientas que ponga a disposición de sus miembros y/o usuarios a través de este sitio, con o sin previo aviso.</p>

    <p>La utilización de designaciones de países o territorios no deberán considerarse como indicativo de la posición por parte de BIREME/OPS con relación a la situación jurídica de ningún país o territorio, de sus autoridades e instituciones ni el reconocimiento de ninguna frontera.</p>

    <p>BIREME/OPS no será responsable de ningún daño o pérdida que pueda derivarse o relacionarse con el uso o falla del sitio, información, productos, servicios y/o herramientas aquí contenidos, incluso en los casos derivados de uso inapropiado, impropio o fraudulento. Tampoco será responsable de la precisión, disponibilidad o veracidad de la información aquí contenida.</p>

    <p>BIREME/OPS no ofrece garantías de ningún tipo respecto de los materiales, información, productos, servicios y/o herramientas disponibles en el sitio y no será responsable por cualquier infección con virus informático o cualquier otro programa que pueda afectar el funcionamiento de computadoras o sistemas.</p>

    <p>Algunos materiales, información, productos, servicios y/o herramientas a los cuales los usuarios podrán acceder a través de este sitio podrían ser de titularidad de terceros, la BIREME/OPS no garantiza la titularidad de éstos y no será responsable ante los usuarios o terceros por cualquier reclamo derivado de su uso. Es posible que en el sitio, materiales, información, productos, servicios y/o herramientas se incluyan enlaces a sitios externos no manejados por la BIREME/OPS. Estos enlaces se incluyen a modo de referencia y su incorporación no implica aprobación o endoso por parte de BIREME/OPS. BIREME/OPS no asume responsabilidad respecto de la información contenida en estos sitios.</p>

    <p>La utilización de este sitio por los usuarios implica la aceptación de la obligación de defender, mantener a salvo e indemnizar a BIREME/OPS y a sus afiliados por cualquier acción, reclamo daño, pérdida y/o gasto (incluidos los honorarios de abogados) que se deriven de dicha utilización.</p>

    <p>BIREME/OPS se reserva el derecho de utilizar o divulgar información sobre sus usuarios. Asimismo se reserva el derecho de editar, no publicar o remover cualquier producto, servicios, herramienta o información o material en parte o en su totalidad a su entera discreción.</p>

    <h4>Usos no permitidos</h4>

    <p>Los usuarios garantizan que el uso de del sitio, información, productos, servicios y/o herramientas aquí contenidos, no serán utilizados con propósitos que sean contrarios a las leyes o que contravengan los presentes términos y condiciones. Los usuarios no utilizaran el sitio, información, productos, servicios y/o herramientas de manera que pueda perjudicar, inhabilitar, sobrecargar o deteriorar el sitio, información, productos, servicios y/o herramientas o su uso por parte de terceros. Los usuarios no intentarán obtener ninguna información, productos, servicios y/o herramientas por medios no intencionalmente disponibles o habilitados en este sitio.</p>

    <p>Asimismo los usuarios se comprometen a respetar los derechos de terceros así como las leyes de propiedad intelectual durante cualquier uso de del sitio, información, productos, servicios y/o herramientas aquí contenidos.</p>

    <h4>Privilegios e Inmunidades</h4>

    <p>Nada de lo aquí expuesto constituirá o podrá ser interpretado como renuncia, expresa o tácita, de los privilegios, inmunidades, y exoneraciones de que goza, la OPS, de conformidad con el Derecho Internacional, tratados o convenios internacionales, o la legislación de sus Países Miembros.</p>

    <h4>Espacios de diálogo</h4>

    <p>BIREME/OPS podrá ofrecer espacios de diálogo u otros instrumentos de comunicación. Los usuarios al hacer uso de estos instrumentos se comprometen a abstenerse de:</p>

    <ul style="list-style-type: lower-alpha;">
        <li>Difamar, injuriar, acosar, amenazar o asumir cualquier otro tipo de conducta que vulnere los derechos de otros;</li>
        <li>Difundir, publicar, distribuir o divulgar informaciones o materiales difamatorios, obscenos, indecentes, ilícitos o inmorales;</li>
        <li>Cargar en el sitio o enviar como anexos de un mensaje archivos que contengan programas informáticos u otros materiales amparados por las leyes de propiedad intelectual (o por el derecho a la intimidad y la publicidad), sin contar con la autorización correspondiente;</li>
        <li>No incluir la referencia del autor o notificaciones legales, mentir acerca del origen o presentar como propio programas informáticos u otros materiales contenidos en un archivo que se cargue en el sitio;</li>
        <li>Anunciar o poner a la venta bienes o servicios, o realizar o promover encuestas, concursos o cadenas de cartas, o descargar de un foro un archivo enviado por otro usuario que el usuario sepa, o razonablemente deba saber, que no se puede distribuir lícitamente de esa manera.</li>
    </ul>

    <p>Los usuarios reconocen que todos los espacios de diálogo constituyen un medio de comunicación pública y no privada. Asimismo, reconocen que los diálogos y el material publicado en el sitio no cuentan con el respaldo de BIREME/OPS y no se considerarán como revisados, examinados ni aprobados por BIREME/OPS.</p>

    <h4>Reclamaciones por posibles infracciones</h4>

    <p>BIREME/OPS se esforzará por impedir en su sitio actividades ilícitas y contrarias a los Términos y Condiciones aquí contenidos. No obstante, si usted creyera que alguna información contenida en el sitio o sus materiales pudiera estar infringiendo sus derechos o de terceros, incluyendo, sin limitación, derechos de propiedad intelectual, deberá ponerse en contacto con la BIREME/OPS enviando una descripción detallada de la violación alegada a la siguiente dirección: online@bireme.org</p>

    <h4>Resolución de controversias</h4>

    <p>Cualquier disputa, controversia o reclamo que surja o se derive del uso del sitio o su información, productos, servicios y/o herramientas será resuelta en forma amistosa entre BIREME/OPS y usuario. A menos que las disputas o controversias se solucionen en forma amistosa dentro de los sesenta (60) días posteriores a la recepción por una de las partes de la solicitud de la otra de intentar una resolución amistosa, dicha disputa, controversia, o reclamo será remitida por cualquiera de las partes a arbitraje de conformidad con las Reglas de Arbitraje de la Comisión de las Naciones Unidas para el Derecho Mercantil Internacional (CNUDMI) vigentes. El tribunal arbitral no estará autorizado a imponer daños punitivos. Cualquier laudo arbitral emitido en virtud del arbitraje referido se considerará como la adjudicación definitiva a la disputa, controversia o reclamo y tendrá carácter vinculante para las partes.</p>

    <p><strong>SI NO ESTUVIERA CONFORME CON ALGUNO DE LOS TÉRMINOS Y CONDICIONES AQUÍ CONTENIDOS DEBERÁ ABSTENERSE DE UTILIZAR EL SITIO Y CUALQUIER MATERIAL AQUÍ CONTENIDO.</strong></p>
    
</div>
');
    define('DATA_POLICY_MESSAGE','
<div class="terms">

    <h2>POLÍTICA DE PRIVACIDAD DE LOS SITIOS Y SISTEMAS WEB DE BIREME/OPS</h2>

    <p>La utilización de los productos, servicios y/o herramientas que pone a disposición El Centro Latinoamericano y del Caribe de Información en Ciencias de la Salud (BIREME), Centro Especializado de la Organización Panamericana de la Salud, Oficina Regional para las Américas de la Organización Mundial de la Salud, en adelante BIREME/OPS, a disposición de los usuarios constituye aceptación de la siguiente Política de Privacidad. En caso de discrepancia entre el texto en español y cualquier otro idioma de esta Política de Privacidad, prevalecerá el documento en español.</p>

    <p>Esta Política de Privacidad es complementaria a la Política General de Privacidad de la OPS, disponible en <a href="http://www.paho.org/hq/index.php?option=com_content&view=article&id=3201%3Apah o-website-privacy-policy&catid=6822%3Acorporate-pages&Itemid=2410&lang=en" target="_blank">http://www.paho.org/hq/index.php?option=com_content&view=article&id=3201%3Apah o-website-privacy-policy&catid=6822%3Acorporate-pages&Itemid=2410&lang=en</a></p>

    <h3>PRIVACIDAD</h3>

    <p>Su privacidad en la Internet es de suma importancia para la BIREME/OPS. En esta declaración de privacidad se describe la política de BIREME/OPS en cuanto a la recopilación y el intercambio de información de las personas que utilizan el presente sitio de BIREME/OPS.</p>

    <h4>¿Qué tipo de información recopila BIREME/OPS?</h4>

    <p style="text-decoration: underline;">Uso normal de sitios web</p>

    <p>En general, usted puede consultar los sitios de BIREME/OPS sin decirnos quién es ni revelar ningún tipo de información personal. La única información que recopilamos durante una consulta general proviene de los registros ordinarios del servidor e incluye su dirección de IP (protocolo de internet), el nombre del dominio, el tipo de navegador, el sistema operativo e información como el sitio web a través del cual llegó a nosotros, los archivos que descargó, los sitios que consultó y la fecha y hora de esas consultas.</p>

    <p style="text-decoration: underline;">Recopilación de información que permite identificar a la persona</p>

    <p>Si usted se registra para acceder a algún sitio, producto o servicio de BIREME/OPS, como los Servicios Personalizados Mi BVS y el FI-Admin, se le pedirá que suministre información personal como su nombre, dirección de correo electrónico, institución a la cual pertenece, país de origen, nivel académico, área de actuación profesional, sexo, fecha de nacimiento e datos de sus redes sociales. Esta información se recopila solo con su conocimiento y permiso, y se mantiene en las bases de datos de BIREME/OPS y listas de direcciones.</p>

    <p>Para ciertos sitios de BIREME/OPS, registrarse o proporcionar cierta información personal hace que se instale una cookie* en su computadora, que permitirá que BIREME/OPS recuerde su información la próxima vez que usted consulte el sitio, de  manera que no tenga que volver a ingresar sus datos, lo que nos ayuda a brindarle un servicio mejor.</p>

    <p>Si se incorpora a un grupo de debate electrónico puede que otros participantes del grupo (incluidos funcionarios que no pertenecen a la OPS) vean la información personal que usted haya proporcionado. En el caso de los grupos de debate abiertos, esta información será pública.</p>

    <h4>¿Qué hace BIREME/OPS con la información que recopila?</h4>

    <p>La información recopilada durante una consulta general se usa para analizar tendencias y uso de los sitios de BIREME/OPS, y para mejorar la utilidad de estos sitios. No está conectada con ningún tipo de datos personales.</p>

    <p style="text-decoration: underline;">Información que permite identificar a la persona</p>

    <p>BIREME/OPS puede usar la información personal que usted proporciona para:</p>

    <ul>
        <li>ponerse en contacto con usted: ya sea para responder a una consulta o sugerencia, o para enviarle boletines informativos, documentos, publicaciones, etc.;</li>
        <li>confirmar su información de registro en el sitio;</li>
        <li>"recordar" su perfil y preferencias en línea;</li>
        <li>ayudarlo a encontrar rápidamente información útil según sus intereses y ayudarnos a crear un contenido que le resulte más provechoso;</li>
        <li>realizar un análisis estadístico.</li>
    </ul>

    <h4>¿Qué sucede si no quiero suministrar información personal?</h4>

    <p>Suministrar información personal en los sitios de BIREME/OPS es optativo. Si decide no suministrar información personal, puede de todas formas consultar y usar los sitios de BIREME/OPS, pero no podrá utilizar ciertas opciones como acceder a los Servicios Personalizados Mi BVS o hacer gestión de las fuentes de información de la BVS a través del sistema web FI-Admin.</p>

    <p style="text-decoration: underline;">Opción de modificar la información o solicitar que sea eliminada</p>

    <p>En cualquier momento, usted puede modificar su información o solicitar que sea eliminada: para ello debe ingresar nuevamente al sitio donde ingresó la información por primera vez y comunicarse con el punto focal de ese sitio. Si no se proporcionan datos de contacto en el sitio, puede contactar a online@bireme.org.</p>

    <h3>SEGURIDAD</h3>

    <p>No vendemos ni intercambiamos ningún tipo de información personal proporcionada voluntariamente en los sitios de BIREME/OPS a terceros. Toda información suministrada a BIREME/OPS por los usuarios de los sitios de BIREME/OPS se guarda con gran  cuidado y seguridad, y no se usará de manera distinta de las establecidas en esta política de privacidad, en cualquier política propia del sitio, o de las que usted ha autorizado explícitamente. BIREME/OPS emplea una variedad de tecnologías y medidas de seguridad para proteger la información que se encuentra en nuestros sistemas a fin de evitar pérdidas, uso indebido, acceso no autorizado o divulgación, modificación o destrucción.</p>

    <p>Todos nuestros empleados que tienen acceso a los datos personales y están asociados con su procesamiento están obligados a respetar la confidencialidad de los asuntos oficiales, incluidos los datos personales.</p>

    <p>Los sitios de BIREME/OPS contienen enlaces a sitios externos. BIREME/OPS no es responsable de las prácticas de privacidad ni del contenido de tales sitios.</p>

    <h4>Notificación de cambios</h4>

    <p>BIREME/OPS podrá modificar esta Política de Privacidad a su entera discreción y publicará estas modificaciones en el presente sitio.</p>

    <h4>Contacto</h4>

    <p>Para preguntas o consultas con respecto a esta política de privacidad, sírvase comunicarse con nosotros en online@bireme.org</p>

    <p style="margin-bottom: 0;">* Cookie</p>
    
    <p>Una cookie es un pequeño conjunto de datos que se envía de un servidor de la web a su navegador. Se usa normalmente para asignar una identificación única a su computadora y almacenar de manera segura información como el ID del usuario, contraseñas, preferencias y perfiles electrónicos. Se almacena en el disco duro de su computadora. Usted tiene la opción de no permitir que se instalen cookies de la OPS/OMS si cambia la configuración de su navegador. Distintos sitios web pueden enviar sus propias cookies a su computadora. Para proteger su privacidad, el navegador solo permite que un sitio web obtenga acceso a sus propias cookies y no permite el acceso a las instaladas por otros sitios.</p>

    <p><strong>SI NO ESTUVIERA CONFORME CON ALGUNO DE LOS TÉRMINOS Y CONDICIONES DE ESTA POLÍTICA DE PRIVACIDAD DEBERÁ ABSTENERSE DE UTILIZAR EL SITIO Y CUALQUIER MATERIAL AQUÍ CONTENIDO.</strong></p>

</div>
');
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
<p>My VHL is freely available to any user through their Facebook, Google, BIREME Account or the My VHL service itself.</p>
<p>This form is unique for recovering registered user password from the My VHL service.</p>
<p>Enter your e-mail or My VHL Service User to receive an e-mail with your password.</p>
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
    define("REMOVE_COLLECTION",'Collection deleted');
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
    define("LEAVE_COMMENT",'Leave Comment');
    define("REPORT_ERROR",'Report Error');
}
?>