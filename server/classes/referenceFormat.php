<?php
/**
 * Reference Formatting Class
 *
 * This class aims to return references formated in different kinds of
 * specifications.
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Fabio Batalha C. Santos (fabio.santos@bireme.org)
 * @copyright   BIREME
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */

require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/../instances_code.php");


class ReferenceFormat {
	
	function ReferenceFormat(){

	}

    /**
     * Creates the document URL giving a database style and document ID
     *
     * @param string $database SCIELO/LILACS
     * @param string $docId
     */
    static function creatingDocURL($database,$docId){
        global $collections;

        $database   = strtoupper($database);
        //$collection = strtoupper($collection);

        if(preg_match('/^(art?).+/', $docId)){
            $docId = substr($docId, 4, -5);
        }

        $url = $collections[$database]["URL"];
        $url = str_replace("#CODE#",$docId,$url);

        return $url;
    }

    /**
     * Receive an array of references metadata
     * @param <string> $refArr
     * returns an array with formatedRederences
     */
    static function ISOFormat($refArr){
        
        $count = 0;
            foreach ($refArr as $keyA => $valueA){ //registers
                $authors = null;
                $titles = null;
                $publisher = null;
                $date = null;
                $volume = null;
                $number = null;
                $issn = null;
                $isbn = null;
                foreach ($valueA as $keyB => $valueB){ //fields
                    switch($keyB){
                        case 'au':
                            $authors = implode("; ",$valueB);
                        break;
                        case 'ti':
                            $titles = implode(" / ",$valueB);
                        break;
                        case 'pu':
                            $publisher = implode(" / ",$valueB);
                        break;
                        case 'in':
                            $instance = implode(" / ",$valueB);
                        break;
                        case 'db':
                            $database = $valueB[0];
                        break;
                        case 'id':
                            $docId = implode(" / ",$valueB);
                        break;
                        case 'dp':
                            $date = implode(" / ",$valueB);
                        break;
                        case 'vi':
                            $volume = implode(" / ",$valueB);
                        break;
                        case 'ip':
                            $number = implode(" / ",$valueB);
                        break;
                        case 'is':
                            $issn = implode(" / ",$valueB);
                        break;
                        case 'isbn':
                            $isbn = implode(" / ",$valueB);
                        break;
                    }
                }

                if (!empty($titles) && !empty($authors)){

                    if(!empty($instance) && !empty($database) &&
                        $database == 'ARTIGO'){

                        $database = 'SCIELO_' . strtoupper($instance);
                    }


                    if (trim($authors) != ""){
                        $authors = '<span class="authors">'.$authors.'</span>. ';
                    }
                    if (trim($titles) != ""){
                        $titles = '<span class="titles"><a href="'.self::creatingDocURL($database,$docId).'">'.$titles.'</a></span>. ';
                    }
    /*
                    if (trim($publisher) != ""){
                        $publisher = '<span class="publisher">'.$publisher.'</span>, ';
                    }
                    if (trim($date) != ""){
                        $date = '<span class="date">'.$date.'</span>, ';
                    }
                    if (trim($volume) != ""){
                        $volume = '<span class="volume">'.$volume.'</span>, ';
                    }
                    if (trim($number) != ""){
                        $number = '<span class="number">'.$number.'</span>, ';
                    }
                    if (trim($issn) != ""){
                        $issn = '<span class="issn">'.$issn.'</span>. ';
                    }
                    if (trim($isbn) != ""){
                        $isbn = '<span class="isbn">'.$isbn.'</span>. ';
                    }
    */
                    //$reference = $authors.$titles.$publisher.$date.$volume.$number.$issn.$isbn;
                    $reference = $authors.$titles;
                    $reference = substr(trim($reference),0,-1).".";
                    $result[]=$reference;
                }

            }

        return $result;
    }
}
?>
