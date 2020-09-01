<?
/*
 Fichier : 2B_domzevide.php 
 version : 0.1.1
*/


    // script pour obtenir la liste des id eedmus
    $url = 'http://localhost/api/get?action=periph.list';
    $result = httpQuery($url, 'GET' , ''); 
    
	// BUG sdk_json_decode si une seul \"  // corrigé au 17/02/2020 si mise a jour manuel
    $result = str_replace ( '\"' , ' ' , $result);
    $result = sdk_json_decode($result, false);
    $eeids = $result['body'];
    $seleeids = '';
    foreach ($eeids as $key => $value)
    {
        if ($seleeids != '')
            $seleeids .= ', ';
            
        $eid = $value['periph_id'];
        $ename = htmlspecialchars($value['name']);
        $eusage_name = htmlspecialchars($value['usage_name']);
        $seleeids = $seleeids.'"'.$eid.'":"'.$eid.' - '.$ename.' - '.$eusage_name.'"';   
        
    }
    echo  '{'.$seleeids.'}';


?>