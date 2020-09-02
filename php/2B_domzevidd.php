<?

/*
 Fichier : 2B_domzevidd.php 
 version : 0.1.2
*/

// script pour obtenir la liste des id domoticz
// domipp : ip+poster serveur domoticz
// domheader : header pour l'identification

    $domipp = getarg("domipp");
    $domheader = array( getarg("domheader",false, '') );
    
    $url = "http://$domipp/json.htm?type=devices&filter=all&used=true&order=Name";
    $result = httpQuery($url, 'GET' , '', null, $domheader);  
    //echo $result;
    $result = str_replace ( '\"' , ' ' , $result);
    $result = sdk_json_decode($result, false);
    $seldomzids = '';
    foreach ($result['result'] as $key => $value)
    {
        $swType = '';
        if (isset($value['SwitchType']))
            $swType = ' ('.htmlspecialchars($value['SwitchType']).')';
            
       if ($seldomzids != '')
            $seldomzids .= ', ';
            
        $didx=$value['idx'];
        $dname=htmlspecialchars($value['Name']);
        $dtype=htmlspecialchars($value['Type']);
        $seldomzids = $seldomzids.'"'.$didx.'":"'.$value['idx'].' - '.$dname.' - '.$dtype.$swType.'"';   
    }
    echo '{'.$seldomzids.'}';
    

?>