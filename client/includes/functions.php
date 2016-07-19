<?
/**
 * Generic functions that sholud be in more than onde code.
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Fabio Batalha C. Santos (fabio.santos@bireme.org)
 * @author      Gustavo Fonseca (gustavo.fonseca@bireme.org)
 * @copyright   BIREME
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
function stdToArray ($std) {
    if(is_object($std)){
        $arr = get_object_vars($std);
    }else{
        $arr = $std;
    }

    foreach($arr as $indice => $valor)
    {
        if(is_object($valor) || is_array($valor))
        {
            $arr[$indice] = objectToArray($valor);
        }
    }

    return $arr;
} 
?>
