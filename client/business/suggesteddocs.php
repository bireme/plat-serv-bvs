<?php
/**
 * Business suggested documents handle
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
require_once(dirname(__FILE__)."/../classes/Authentication.php");
require_once(dirname(__FILE__)."/../classes/DocsCollection.php");
require_once(dirname(__FILE__)."/../classes/MyProfiles.php");
require_once(dirname(__FILE__)."/../classes/SimilarDocs.php");
require_once(dirname(__FILE__)."/../../server/pub/include/professionalAreaLibrary.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}
$response["status"] = false;
$params["sort"]=$_REQUEST["sort"];

$docsFolders = DocsCollection::listDirs($_SESSION["userTK"]);
$profiles = MyProfiles::getProfileList($_SESSION["userTK"],$params);

switch($_REQUEST["task"]){
    case "list":
        $paginationData['pages'] = SimilarDocs::getTotalSuggestedDocsPages($_SESSION["userTK"]);
        $sdPaginator = new Paginator($paginationData['pages'],
            !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
        $params['page'] = $sdPaginator->getCurrentPage();

        $suggestedDocs = SimilarDocs::getSuggestedDocs( $_SESSION["userTK"], $params );
        $responseDocs["values"] = $suggestedDocs;
        $responseDocs["status"] = true;
    break;
    case "reference":
        switch($_REQUEST["type"]){
            case "mydocuments":
                $folder = $_REQUEST["folder"] ? $_REQUEST["folder"] : 0;

                $paginationData = DocsCollection::getTotalDocs($_SESSION["userTK"],$folder);
                $objPaginator = new Paginator($paginationData['pages'],
                    !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
                $params['page'] = $objPaginator->getCurrentPage();

                $collections = DocsCollection::listDocs( $_SESSION['userTK'], $folder, $params );
                $response["values"] = $collections;
                $response["status"] = true;
            break;
            case "myprofiledocuments":
                $similarDocs = false;
                $profile = $_REQUEST["profile"] ? $_REQUEST["profile"] : 0;
                $result = MyProfiles::getProfile($_SESSION["userTK"], $profile, false);

                if ( $result ) {
                    $paginationData['pages'] = SimilarDocs::getTotalSimilarsDocsPages($_SESSION["userTK"],$result[0]["profileID"]);
                    $objPaginator = new Paginator($paginationData['pages'],
                    !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
                    $params['page'] = $objPaginator->getCurrentPage();

                    $similarDocs = SimilarDocs::getSimilarsDocs( $_SESSION["userTK"], $result[0]["profileID"], $params );
                }

                $response["values"] = $similarDocs['similars'];
                $response["status"] = true;
            break;
            case "orcidworks":
                $paginationData['pages'] = SimilarDocs::getTotalOrcidWorksPages($_SESSION["userTK"]);
                $objPaginator = new Paginator($paginationData['pages'],
                    !empty($_REQUEST['page']) ? $_REQUEST['page'] : 1);
                $params['page'] = $objPaginator->getCurrentPage();

                $orcidWorks = SimilarDocs::getOrcidWorks( $_SESSION["userTK"], $params );
                $response["values"] = $orcidWorks;
                $response["status"] = true;
            break;
        }
    break;
    case "suggestions":
        $suggestions = false;

        if ( $_REQUEST['suggestions'] ) {
            if ( $_REQUEST['prefix'] )
                $suggestions = SimilarDocs::addSuggestedDocs($_SESSION["userTK"],$_REQUEST['suggestions'],$_REQUEST['prefix']);
            else
                $suggestions = SimilarDocs::addSuggestedDocs($_SESSION["userTK"],$_REQUEST['suggestions']);
        }

        if ( $suggestions )
            die('default');
        else
            die('error');
    break;
    case "related":
        $related = SimilarDocs::getRelatedDocs($_SESSION["userTK"],$_REQUEST['sentence']);
        die(json_encode($related));
    break;
    case "public":
        $public_related = SimilarDocs::getPublicRelatedDocs($_REQUEST['sentence']);
        
        if ( $public_related ) {
            die(json_encode($public_related));
        } else {
            die("default");
        }
    break;
    case "events":
        $data = Authentication::getUserData($_SESSION["userTK"]);
        $query_pt = $professionalArea['pt'][$data['professional_area']];
        $query_es = $professionalArea['es'][$data['professional_area']];
        $query_en = $professionalArea['en'][$data['professional_area']];
        $query = '(' . $query_pt . ' OR ' . $query_es . ' OR ' . $query_en . ')';
        $events = Events::get_events($query);

        if ( $events ) {
            $html = '<br />';
            foreach ( $events as $event ) {
                $month = (int) substr($event->start_date, 5, 2);
                $month_name = Generic::month_name($month, true);
                $start_date = substr($event->start_date, 8, 2);
                $link = $DIREVE[$_SESSION['lang']] . 'resource/?id=' . $event->django_id;
                // $link = ( $event->link ) ? $event->link[0] : $DIREVE[$_SESSION['lang']] . 'resource/?id=' . $event->django_id;
                
                $html .= '<article class="event">';
                $html .= '    <a href="'.$link.'" target="_blank">';
                $html .= '        <div class="eventDate">';
                $html .= '            <p class="eventMes">'.$month_name.'</p>';
                $html .= '            <p class="eventDia">'.$start_date.'</p>';
                $html .= '        </div>';
                $html .= '        <div class="eventText">'.$event->title.'</div>';
                $html .= '        <div class="clearfix"></div>';
                $html .= '    </a>';
                $html .= '</article>';
            }
        } else {
            $html = '<br />';
            $html .= $trans->getTrans('menu','EVENTS_NOT_FOUND');
        }

        die($html);
    break;
    case "multimedia":
        $data = Authentication::getUserData($_SESSION["userTK"]);
        $query_pt = $professionalArea['pt'][$data['professional_area']];
        $query_es = $professionalArea['es'][$data['professional_area']];
        $query_en = $professionalArea['en'][$data['professional_area']];
        $query = '(' . $query_pt . ' OR ' . $query_es . ' OR ' . $query_en . ')';
        $multimedia = Multimedia::get_media($query);

        $html = '';
        if ( $multimedia ) {
            foreach ( $multimedia as $media ) {
                $title = mb_substr($media->title, 0, 50);
                $thumb = Multimedia::get_thumbnail($media);
                $link = $MULTIMEDIA[$_SESSION['lang']] . 'resource/?id=' . $media->id;
                // $link = ( $media->link ) ? $media->link[0] : $MULTIMEDIA[$_SESSION['lang']] . 'resource/?id=' . $media->id;

                $html .= '<div class="col s12 m4">';
                $html .= '    <a href="'.$link.'" target="_blank">';
                $html .= '        <p>';
                $html .= '            <span class="left"><img src="'.$thumb.'" alt="" style="padding: 0 20px 5px 0px"></span>';
                if ( strlen($media->title) > 50 ) {
                    $html .= '                <b class="media-title">'.$title.'...</b>';
                } else {
                    $html .= '                <b class="media-title">'.$media->title.'</b>';
                }
                $html .= '        </p>';
                $html .= '        <div class="clearfix"></div>';
                $html .= '        <div class="divider"></div>';
                $html .= '    </a>';
                $html .= '</div>';
            }
            $html .= '<div class="col s12 center-align" id="verMaisMidia">';
            $html .= '    <a href="'.$MULTIMEDIA[$_SESSION['lang']].'?q='.urlencode($query).'" target="_blank">'.$trans->getTrans('menu','SEE_MORE').'</a>';
            $html .= '</div>';
        } else {
            $html .= '<div class="col s12">'.$trans->getTrans('menu','MEDIA_NOT_FOUND').'</div>';
        }

        die($html);
    break;
    case "resources":
        $data = Authentication::getUserData($_SESSION["userTK"]);
        $query_pt = $professionalArea['pt'][$data['professional_area']];
        $query_es = $professionalArea['es'][$data['professional_area']];
        $query_en = $professionalArea['en'][$data['professional_area']];
        $query = '(' . $query_pt . ' OR ' . $query_es . ' OR ' . $query_en . ')';
        $oer_query = 'ti:'.$query.' OR mh:'.$query;
        $resources = OER::get_resources($oer_query);

        $html = '';
        if ( $resources ) {
            foreach ( $resources as $oer ) {
                $title = mb_substr($oer->title, 0, 50);
                $thumb = OER::get_thumbnail($oer);
                $link = OER_DOMAIN . '/resource/' . $_SESSION['lang'] . '/oer-' . $oer->django_id;
                // $link = ( $oer->link ) ? $oer->link[0] : OER_DOMAIN.'/resource/'.$_SESSION['lang'].'/oer-'.$oer->django_id;

                $html .= '<div class="col s12 m4">';
                $html .= '    <a href="'.$link.'" target="_blank">';
                $html .= '        <p>';
                $html .= '            <span class="left"><img src="'.$thumb.'" alt="" style="padding: 0 20px 5px 0px"></span>';
                if ( strlen($oer->title) > 50 ) {
                    $html .= '                <b class="media-title">'.$title.'...</b>';
                } else {
                    $html .= '                <b class="media-title">'.$oer->title.'</b>';
                }
                $html .= '        </p>';
                $html .= '        <div class="clearfix"></div>';
                $html .= '        <div class="divider"></div>';
                $html .= '    </a>';
                $html .= '</div>';
            }
            $html .= '<div class="col s12 center-align" id="verMaisMidia">';
            $html .= '    <a href="'.OER_DOMAIN.'?q='.urlencode($oer_query).'" target="_blank">'.$trans->getTrans('menu','SEE_MORE').'</a>';
            $html .= '</div>';
        } else {
            $html .= '<div class="col s12">'.$trans->getTrans('menu','OER_NOT_FOUND').'</div>';
        }

        die($html);
    break;
    default:
        die("default");
    break;
}
?>
