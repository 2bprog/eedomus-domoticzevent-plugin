<?
/*
 Fichier : 2B_domzevents.php 
 version : 0.0.3
*/

/*
eeip=[IP]
domipp=[IP:PORT,[user:pwd]]
action=[SET|POST|WIDGET]
api=[code API pour le SET]
val=[valeur pour le SET]
bat=[0 ou 1] pour le SET 1 = utilisation de la Fonction setBattery 
p2=[xml|[html]
*/



header("Access-Control-Allow-Origin: *");


$dompram=getArg("domipp", false, "10.66.254.101:8080,:");
$domipp="10.66.254.101:8080";
$domup=':';

$dompram = str_replace ( "plugin.parameters.DOMZUSER" , "" , $dompram);
$dompram = str_replace ( "plugin.parameters.DOMZPWD" , "" , $dompram);

$arDomz = explode(",",$dompram); 
if (count($arDomz) > 0) $domipp=$arDomz[0];
if (count($arDomz) > 1) $domup=$arDomz[1];
$domheader=array('');
if ($domup != ':') 
    $domheader = array('Authorization: Basic '.base64_encode($domup) );


$eedip = getArg("eedip",false, '10.66.254.240');

$controller_id=getArg("controller_id",false, '');
$action = strtoupper(getArg("action",false, ''));
$api = getArg("api",false, '');
$val = getArg("val",false, '');
$bat = getArg("bat",false, 0);
$fv = getArg("fv",false, 0);


$p2 = strtoupper(getArg("p2", false, 'XML'));

$doXML = ($p2 == 'XML');
$doHTML = ($p2 == 'HTML');

if ($action == 'SET')
{   
    sdk_header("text/xml");
    echo "<$action>";
    $success = '0';
    $eedomus = '';
    $ok = ($api != '');
    if ($ok) $ok=sdk_eedomusHttp("http://localhost/api/get?action=periph.caract&periph_id=".$api, 'GET', '', $eedomus, true);
    if ($ok)
    {
        $lastchange =  strtotime($eedomus['body']['last_value_change']);
        $lvduration =  (time() - $lastchange) ;
        $battery = $eedomus['body']['battery'];
        $lastvalue =  $eedomus['body']['last_value'];    
        
    	if ($bat == 1)
    	{
    	    if ($battery != $val || $lvduration >= 3600)
    		    setBattery($api, $val);
    	}
    	else
    	{	
    	    sdk_echoxml('force', $fv, true);
    	    sdk_echoxml('lastvalue', $lastvalue, true);
    	    sdk_echoxml('lvduration', $lvduration, true);
    	    
    		if ($fv != 0 || $lastvalue != $val || $lvduration >= 3600) 
    		{
    		    sdk_echoxml('api', $api, true);
    		    sdk_echoxml('valset', $val, true);
    		    setValue($api, $val, false, true);	
    		}
    	}
    	$success= '1';
    }
    
    sdk_echoxml('success', $success, true);
    echo "</$action>";
    die();
}

if ($action=='WIDGET' && $doHTML)
{
?>
<div>
    <center>
        <spam style="font: 12px tahoma;">Configuration des evenements <a href="http://<?echo $domipp?>" target="_blank">domoticz</a> vers l' <a href="http://<?echo $eedip?>" target="_blank">eedomus</a></spam><br>
        <button style="font: 12px tahoma; margin-top:10px;" onclick="javascript:window.open('http://<?echo $eedip?>/script/?exec=2B_domzevents.php&eedip=<?echo $eedip?>&domipp=<?echo $dompram?>&p2=html','domzevents','width=1280,height=700,toolbar=no');">Cliquez ici (<?echo $eedip?>)</button>
    </center>
</div>
<? 
die();
}


$defscript="
return { 
        on = {devices = { ##ITEMS## }
			  ,timer = { 'every 30 minutes' }
               },
        logging = {level = domoticz.LOG_INFO, marker = 'eedomz_plugin' },    
		execute = function(dz,item)
    
    --  BUG domoticz timedOut => besoin de timer
    -- ,timer = { 'every 5 minutes' }
    
     local _cfgjs = ''
    -- ##LINKS## 
    ##ITEMSCFG##
    -- ##LINKS##    
    
    local _u = dz.utils
   
    functions = {
      ['temp'] = function() return math.floor(item.temperature * 10) / 10 end,
      ['hum'] = function() return math.floor(item.humidity)  end,
      ['baro'] = function() return math.floor(item.barometer)  end,
      ['pres'] = function() return math.floor(item.pressure)  end,
      ['lux'] = function() return math.floor(item.lux)  end,
      ['bat'] = function() return math.floor(item.batteryLevel)  end,
	  ['ibat'] = function() return math.floor(item.batteryLevel)  end,
      ['siglvl'] = function() return math.floor(item.signalLevel)  end,
      ['nvalue'] = function() return item.nvalue  end,
      -- BUG domoticz timedOut ['com'] = function()  if (item.timedOut)  then return 0  end return 1 end,
      ['0ou1'] = function()  if (item.active)  then return 1  end return 0 end,
      ['0ou100'] = function()  if (item.active)  then return 100  end return 0 end,
      ['dzcmd'] = function()  if item.level == nil then return 0 end return item.level  end,
      ['dzbri'] = function()  val=0  if item.active then val =  math.floor(item.level / 10 + 0.5) * 10  
                              if val == 0 then val = 1 end  end return val end,
      ['eecol'] = function()  c = item.getColor()
                               ret = tostring(math.floor(c.r / 25.4) * 10) ..',' .. tostring(math.floor(c.g / 25.4) * 10) ..',' .. tostring(math.floor(c.b / 25.4) * 10)
                               dz.log(ret)
                              return ret end
							  
    }
  
    local cfgar = dz.utils.fromJSON(_cfgjs) 
    local istmr = item.isTimer
    local isdev = item.isDevice
    
    dz.log('timer:' .. tostring(istmr) .. ' device '.. tostring(isdev))
    
    cfgs = cfgar
    if (isdev) then
        cfg = cfgs[tostring(item.id)]
        cfgs = {}
        if not (cfg ==  nil) then
            cfgs[tostring(item.id)] =  cfg
        end
    end 
    
    for id, cfg in pairs(cfgs) do
        item = dz.devices(tonumber(id))
        if not (item ==  nil) then
            for k, v in pairs(cfg) do
                for ideed, elements in pairs(v) do
                    
                    for i, element in ipairs(elements) do
                    
                        iselttmr =  ((element =='bat') or  (element =='ibat'))
                        
                        -- les informations battery sont pousser toutes les X minutes via timer
                        if (istmr and not iselttmr ) then
                            goto continue 
                        end
                        
                        if (isdev and  iselttmr ) then
                            goto continue 
                        end
      
                        fn = functions[element]
                        if not (fn ==  nil) then
                            if item.changed or iselttmr  then
                                setbat = 0
        					    if (element == 'ibat') then
        							setbat = 1
        						end
                                val = fn()
                                dz.log('Elmt:'..element..' ID:' .. item.id .. ' send:' .. tostring(val) .. ' to ' .. tostring(ideed), dz.LOG_INFO) 
                                 urleedomus = 'http://".$eedip."/script/?exec=2B_domzevents.php&action=SET&api=' .. ideed .. '&val=' .. tostring(val) ..'&bat=' .. tostring(setbat)..'&fv='..tostring(istmr and 1 or 0)                                 
                                dz.openURL({ url = urleedomus , method = 'GET' })
                            end 
                        else
                            dz.log('Function : ' .. tostring(element) .. ' not found', dz.LOG_ERROR) 
                        end 
                        ::continue::
                    end
                end
            end
        else
            dz.log('ID : ' .. tostring(id) .. ' not found', dz.LOG_ERROR) 
        end 
    end
end
}";



$domzscripts = array (
    "domzevents_plugin"  => array("id" => 0, "xml" => "", "domzids" => array())
    );

$domzip = getArg('domz', false);   // IP:Port,User:pwd 

if ($doXML) sdk_header("text/xml");
if ($doXML) echo "<domzevents>\r\n";

if ($doXML) sdk_echoxml('dompram', $dompram, $doXML);  
if ($doXML) sdk_echoxml('domipp', $domipp, $doXML);  
if ($doXML) sdk_echoxml('domup', $domup, $doXML);  
if ($doXML) sdk_echoxml('domheader', $domheader[0], $doXML);  

    
$nbfound = 0;
$ok = sdk_getIDs($domheader, $domipp, $domzscripts, $nbfound, $doXML);
if ($ok && $nbfound != count($domzscripts))
{
    $ok = sdk_createOrupdateScripts($domheader, $domipp, $domzscripts, $defscript, '', '', $doXML);
    if ($ok) $ok = sdk_getIDs($domheader, $domipp, $domzscripts, $nbfound, $doXML);
}

if ($ok && $nbfound === count($domzscripts) && $action != 'POST')
{
    $ok = sdk_loadScripts($domheader, $domipp, $domzscripts, $doXML);
}

$savedone = false;
if ($action == 'POST')
{
    $data = sdk_get_input();
    $luahdr = '';
    $luacfg = '';
    if ($data != '')
    {
        sdk_decodecfg($data, $luahdr, $luacfg, $doXML);
        sdk_createOrupdateScripts($domheader, $domipp, $domzscripts, $defscript, $luahdr, $luacfg, $doXML);
    }
    else
    {
        if ($doXML) sdk_echoxml('erreur', 'pas de données dans le POST', $doXML);  
    }
    $savedone = true;
    
}

if (!$savedone && $ok)
{
    // chargement id eedomus
    $eedomus = '';
    $ok=sdk_eedomusHttp("http://localhost/api/get?action=periph.list", 'GET', '', $eedomus, $doXML);
    $eeids = &$eedomus['body'];
    $seleeids = '';
    foreach ($eeids as $key => $value)
    {
        if ($seleeids != '')
            $seleeids .= ', ';
            
        $seleeids = $seleeids.'"'.$value['periph_id'].'":"'.$value['periph_id'].' - '.$value['name'].' - '.$value['usage_name'].'"';   
    }
    $seleeids = '{'.$seleeids.'}';
    if ($doXML) sdk_echoxml('seleeids', $seleeids, $doXML);  
    
    // chargement id domoticz
    $ok=sdk_domzHttp("http://$domipp/json.htm?type=devices&filter=all&used=true&order=Name", 'GET', '', $domheader, $domz, $doXML);
    $domzids = &$domz['result'];
    $seldomzids = '';
    foreach ($domzids as $key => $value)
    {
        $swType = '';
        if (isset($value['SwitchType']))
            $swType = ' ('.$value['SwitchType'].')';
            
       if ($seldomzids != '')
            $seldomzids .= ', ';
        $seldomzids = $seldomzids.'"'.$value['idx'].'":"'.$value['idx'].' - '.$value['Name'].' - '.$value['Type'].$swType.'"';   
    }
    $seldomzids = '{'.$seldomzids.'}';
    if ($doXML) sdk_echoxml('seldomzids', $seldomzids, $doXML);  
    
    // type d'echange géré
    $selechange = '{';
    $selechange = $selechange .'"temp":"Température",';
    $selechange = $selechange .'"hum":"Humidité",';
    $selechange = $selechange .'"baro":"Pression atmosphérique",';
    $selechange = $selechange .'"pres":"Pression",';
    $selechange = $selechange .'"lux":"Luminosité",';
    $selechange = $selechange .'"bat":"Niveau de batterie",';
	$selechange = $selechange .'"ibat":"Niveau de batterie - Indicateur Eedomus",';
    $selechange = $selechange .'"siglvl":"Indicateur de signal",';
    $selechange = $selechange .'"nvalue":"Valeur numérique brute : nValue",';
    // BUG domoticz timedOut $selechange = $selechange .'"com":"Etat de la communication (O=KO ou 1=OK)",';
    $selechange = $selechange .'"0ou1":"Off/On, Ferm./Ouv. Ras/Mouv. (0 ou 1)",';
    $selechange = $selechange .'"0ou100":"Off/On, Ferm./Ouv. Ras/Mouv. (0 ou 100)",';    
    $selechange = $selechange .'"dzcmd":"deConzCap - Etat télécommande ",';
    $selechange = $selechange .'"dzbri":"deConzAct - On/Off et Luminosité ",';
	$selechange = $selechange .'"eecol":"deConzAct - Couleur au format Eedomus R,G,B (0 à 100) "';
    $selechange = $selechange . '}';
    
    if ($doXML) sdk_echoxml('selechange', $selechange, $doXML);  
}

if ($ok) $ok = 1;
else $ok=0;
if ($doXML) sdk_echoxml('ok', $ok, $doXML); 
if ($doXML) echo "</domzevents>\r\n";
if (!$doHTML) die();
?>





<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Configuration Domoticz - events </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.1.2/css/select.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.dataTables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.css" />

<script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js" ></script>
<script src="https://cdn.datatables.net/select/1.1.2/js/dataTables.select.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
<script src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.js" ></script>
<script src="https://cdn.jsdelivr.net/gh/2bprog/DataTable-AltEditor/src/dataTables.altEditor.free.js" ></script>
<script>

<? if ($ok) { ?>
$(document).ready(function() {
    
  $.fn.modal.Constructor.prototype.enforceFocus = function() {};
 
<?
    echo 'var seldomzids='.$seldomzids.";\r\n";
    echo 'var seleeids='.$seleeids.";\r\n";
    echo 'var selechange='.$selechange.";\r\n";
    
    echo 'var dataSet = [';
    foreach ($domzscripts as $key => $value)
    {
        foreach ($domzscripts[$key]['domzids'] as $keydom => $valuedom)
        {
             foreach ($valuedom as $keyidx => $valuear)
            {
                foreach ($valuear as $keyeed => $valuetype)
                {
                    $types = array();
                    if (is_string($valuetype))
                        $types[] = $valuetype;
                    else
                        $types = $valuetype;
                    foreach ($types as $type)
                    {
                        echo '{ domzid:'.$keydom.' ,','eeid:'.$keyeed.', ech:"'.$type.'"},'."\r\n";
                    }

                }
            }
        }
    }
    echo ' ];';
} 
?>

<? if ($ok) { ?>

  var columnDefs = [
   {
    data: "domzid",
    title: "Source Domoticz",
    type : "select",
    options : seldomzids,
    select2 : { width: "100%"},
    render: function (data, type, row, meta) {
        if (data == null || !(data in seldomzids)) return null;
        return seldomzids[data];   }
  },
  {
    data: "ech",
    title: "Information echangée",
    type : "select",
    options : selechange,
    select2 : { width: "100%"},
    render: function (data, type, row, meta) {
        if (data == null || !(data in selechange)) return null;
        return selechange[data];   }  
    
  },
  {
    data: "eeid",
    title: "Destination Eedomus",
    type : "select",
    options : seleeids,
    select2 : { width: "100%"},
    render: function (data, type, row, meta) {
        if (data == null || !(data in seleeids)) return null;
        return seleeids[data];   }
  }
  
  ];

  var myTable;

  myTable = $('#config').DataTable({
    "sPaginationType": "full_numbers",
    data: dataSet,
    columns: columnDefs,
	dom: 'Bfrtip',        // Needs button container
    select: 'single',
    responsive: true,
    altEditor: true,     // Enable altEditor
    buttons: [{ text: 'Ajouter', name: 'add' },
          { extend: 'selected', text: 'Modifier', name: 'edit'},
          { extend: 'selected', text: 'Supprimer', name: 'delete' }],
	language:  {
			"sEmptyTable":     "Aucune donnée disponible dans le tableau",
			"sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
			"sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
			"sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
			"sInfoPostFix":    "",
			"sInfoThousands":  ",",
			"sLengthMenu":     "Afficher _MENU_ éléments",
			"sLoadingRecords": "Chargement...",
			"sProcessing":     "Traitement...",
			"sSearch":         "Rechercher :",
			"sZeroRecords":    "Aucun élément correspondant trouvé",
			"oPaginate": {
				"sFirst":    "Premier",
				"sLast":     "Dernier",
				"sNext":     "Suivant",
				"sPrevious": "Précédent"
			},
			"oAria": {
				"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
				"sSortDescending": ": activer pour trier la colonne par ordre décroissant"
			},
			"select": {
					"rows": {
						"_": "%d lignes sélectionnées",
						"0": "Aucune ligne sélectionnée",
						"1": "1 ligne sélectionnée"
					} 
			},
			"altEditor" : {
				"modalClose" : "Fermer",
				"edit" : {
					"title" : "Modification",
					"button" : "Modifier"
				},
				"add" : {
					"title" : "Nouveau",
					"button" : "Ajouter"
				},
				"delete" : {
					"title" : "Suppression",
					"button" : "Supprimer"
				},
				"success" : "Succès.",
				"error" : {
					"message" : "Une erreur inattendue s'est produite.",
					"label" : "Erreur",
					"responseCode" : "Response code:",
					"required" : "Valeur obligatoire",
					"unique" : "Valeur dupliquée"
				}
			}
		}
  });


$("#send").on("click", function(e) {
    e.preventDefault();
	
     $.ajax({
	    type: "POST",

<? } ?>
<? if ($ok) {

            $url =  "http://$eedip/script/?exec=2B_domzevents.php&domipp=$dompram&action=POST&p2=xml";
            echo 'url: "'.$url.'",';
?>
            data: JSON.stringify(myTable.data().toArray()),
            success:function(result) {
              alert('La sauvegarde a été effectée avec succes.');
            },
            error:function(result) {
              alert('Une erreur est surevenue lors de la sauvegarde !');
            }
        });
    });
});
<? } ?>
</script>
</head>

<body>
  
 
  <div class="container">
       <h3><center>Configuration des evenements domoticz vers eedomus</center></h3>
<? if ($ok) { ?>       
  <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-striped" id="config">
  </table>
  <form method="post">
      <p><center>
  <button id="send" value="" name="send" class="dt-button">Enregistrer vos modifications...</button>  
  </center></p>
</form>
<? } else { ?>
   <div class="alert alert-danger" role="alert">
   <center>Une erreur est survenue lors du chargement des données !<br> (Vérifier les informations de connexion au serveur Domoticz)</center>
    </div>
<? } ?>


</div>
</body>
</html>
  
<?    
//
// chargement des scripts si besoin
function sdk_loadScripts($domheader, $domipp, &$domzscripts, $doXML)
{
    $ok = true;
    $fn = 'sdk_loadScripts';
    if ($doXML) echo "<$fn>\r\n";
    foreach ($domzscripts as $key => $value)
    {
        $result = '';
        if ($script['id'] == 0)
        {
            // lecture script
            $ok=sdk_domzHttp("http://$domipp/json.htm?param=load&type=events&event=".$value['id'], 'GET', '', $domheader, $result, $doXML);
            if ($ok) 
            {
                $domzscripts[$key]['xml'] = $result['result'][0]['xmlstatement'];
                $sources= &$domzscripts[$key]['xml'];
                $domzids = sdk_strbetween('-- ##LINKS##','-- ##LINKS##', $sources);
                $domzids = str_replace("'",'',$domzids);
                $domzids = str_replace('=','',$domzids);
                $domzids = str_replace('..','',$domzids);
                $domzids = str_replace('_cfgjs','',$domzids);
                if ($doXML) sdk_echoxml('domzids', $domzids, $doXML);  
                $domzids = sdk_json_decode($domzids, false);
                $domzscripts[$key]['domzids'] = $domzids;
            }
        }
    }
    if ($doXML) sdk_echoxml('success', $ok, $doXML);   
    if ($doXML) echo "</$fn>\r\n";
    return $ok;
}


// creation des scripts si besoin
function sdk_createOrupdateScripts($domheader, $domipp, &$domzscripts, $defscript, &$luahdr, &$luacfg, $doXML)
{
    $ok = true;
    $fn = 'sdk_createScripts';
    if ($doXML) echo "<$fn>\r\n";
    foreach ($domzscripts as $key => $value)
    {
        $eventid='';
        $items='';
        $itemscfg = '';
        $actif=0;
        if ($value['id'] == 0)
        {
            if ($doXML) sdk_echoxml('create', $key, $doXML);
        }
        else
        {
            $eventid= 'eventid='.$value['id'].'&';
            $items= $luahdr;
            $itemscfg = $luacfg;
            $actif=1;
            if ($doXML) sdk_echoxml('update', $key, $doXML);
        }
        $result = '';
        $defscript = str_replace('##ITEMS##',$items,$defscript);
        $defscript = str_replace('##ITEMSCFG##',$itemscfg,$defscript);
		$defscript = str_replace('%','%25',$defscript);
        $defscript = str_replace('&','%26',$defscript);		
        $params=$eventid."type=event&param=create&name=$key&interpreter=dzVents&eventtype=Device&eventstatus=$actif&xml=$defscript";
        $ok=sdk_domzHttp("http://$domipp/event_create.webem", 'POST', $params, $domheader, $result, $doXML );
        if (!$ok)     break;
    
    }
    
    if ($doXML) sdk_echoxml('success', $ok, $doXML);   
    if ($doXML) echo "</$fn>\r\n";
    return $ok;
}


// recheche id 
function sdk_getIDs($domheader, $domipp, &$domzscripts, &$nbfound, $doXML)
{
    $fn = 'sdk_getIDs';
    if ($doXML) echo "<$fn>\r\n";
    $nbfound = 0;
    $result = '';
    $ok=sdk_domzHttp("http://$domipp/json.htm?param=list&type=events", 'GET', '', $domheader, $result, $doXML);
    if ($ok)
    {
         $events = $result['result'];
        foreach ($events as $key => $value)
        {
            $script = $domzscripts[$value['name']];
            if (isset($script))
            {
                $nbfound++;
                $domzscripts[$value['name']]['id'] = $value['id'];  
                if ($doXML) sdk_echoxml('id_found', $value['id'].' - '.$value['name'], $doXML);
            }
        }
    }
    if ($doXML) sdk_echoxml('all_found', $nbfound == count($domzscripts), $doXML);   
    if ($doXML) sdk_echoxml('success', $ok, $doXML);   
    if ($doXML) echo "</$fn>\r\n";
    return $ok;
}

function sdk_decodecfg($js, &$luahdr, &$luacfg, $doXML)
{
	$fn = 'sdk_decodecfg';
    if ($doXML) echo "<$fn>\r\n";

    $newcfg = sdk_json_decode($js, true);
    $tmpitems = array();
    foreach ($newcfg  as $key => $value)
    {
        $tmpitems[$value['domzid']][$value['eeid']][] = $value['ech'];
    }
    $luaitem1 = '';
    $luaitem2 = '';
    foreach ($tmpitems  as $key => $value)
    {
        if ($luaitem1 != '') $luaitem1 = $luaitem1.',';
        $luaitem1 = $luaitem1.$key;
        
        if ($luaitem2 != '') $luaitem2 = $luaitem2.','."'\r\n";
        $luaitem2 = $luaitem2."_cfgjs =_cfgjs ..'".'"'.$key.'" : [';
        $luaitem3 = '';
        foreach ($value  as $ideed => $echanges)
        {
             if ($luaitem3 != '') $luaitem3 = $luaitem3.',';
             $luaitem3 = $luaitem3.'{ "'.$ideed.'" : [';
             
             $luaitem4 = '';
             foreach($echanges as $echange)
             {
                 if ($luaitem4 != '') $luaitem4 = $luaitem4.',';
                 $luaitem4 = $luaitem4.'"'.$echange.'"';
             }
                 
            $luaitem3 = $luaitem3.$luaitem4.']}';
                 
        }
        $luaitem2 = $luaitem2.$luaitem3.']';
    }
    if ($luaitem2 != '') $luaitem2 = $luaitem2."'";
    $luahdr = $luaitem1;
    $luacfg = "_cfgjs =_cfgjs .. '{ '\r\n".$luaitem2."\r\n"."_cfgjs =_cfgjs .. '} '\r\n";
    
    if ($doXML)
    {
        if ($doXML) sdk_echoxml('luahdr', $luahdr, $doXML); 
        if ($doXML) sdk_echoxml('luacfg', $luacfg, $doXML);
    }
	if ($doXML) echo "</$fn>\r\n";
}

function sdk_eedomusHttp($url, $method, $params,  &$result, $doXML)
{
    $fn = 'sdk_eedomusHttp';
    if ($doXML) echo "<$fn>\r\n";
    if ($doXML) sdk_echoxml('url',  "$method : $url" , $doXML);
    $result = httpQuery($url, $method , $params); 
    if ($doXML) sdk_echoxml('params',$params, $doXML);
    $result = sdk_json_decode($result, false);
    if ($doXML) echo "</$fn>\r\n";
    return $result['success'] == 1;
    
} 
function sdk_domzHttp($url, $method, $params, $domheader ,&$result, $doXML)
{
    $fn = 'sdk_domzHttp';
    if ($doXML) echo "<$fn>\r\n";
    if ($doXML) sdk_echoxml('url',  "$method : $url" , $doXML);
    $result = httpQuery($url, $method , $params, null, $domheader);  
    if ($doXML) sdk_echoxml('params',$params, $doXML);
    $result = sdk_json_decode($result, false);
    if ($doXML) echo "</$fn>\r\n";
    return $result['status'] == 'OK';
    
}

function sdk_echoxml($node, $value, $doXML)
{
     $xmlv =  htmlspecialchars(sdk_ansi_Utf8($value));
    if ($doXML) echo "<$node>$xmlv</$node>\r\n";
}

function sdk_echoattr($node, $attr, $value, $doXML)
{
    $xmlv =  htmlspecialchars(sdk_ansi_Utf8($value));
    if ($doXML) echo "<$node $attr=\"$xmlv\" />\r\n";
}

function sdk_strafter ($this, $inthat)
{
    return substr($inthat, strpos($inthat,$this)+strlen($this));
};


function sdk_strbefore ($this, $inthat)
{
    return substr($inthat, 0, strpos($inthat, $this));
};

function sdk_strbetween ($this, $that, $inthat)
{
    return sdk_strbefore ($that, sdk_strafter($this, $inthat));
};

function sdk_ansi_Utf8($valor) 
{

    $ansi_Utf8 = array(
    
    "à" => "\u00e0" ,
    "è" => "\u00e8" ,
    "é" => "\u00e9" ,
    "ê" => "\u00ea" ,
    "ë" => "\u00eb" ,
    "ù" => "\u00f9" ,
    "°" => "\u0080" );
    return strtr($valor, $ansi_Utf8); 
}

  
    
   

?>