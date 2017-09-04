<?php
/**
 * NS Clan Ranking
 * by Aqhmal
 * https://www.facebook.com/GNecross
 **/

# Import SabreAMF library
require 'SabreAMF/Client.php';

# Set content type
header('Content-Type: application/json');

# Function for sending AMF request
function AMF($amf, $array) {
	return (new SabreAMF_Client('http://app.ninjasaga.com/amf_live1/'))->sendRequest($amf, $array);
}

# Change to your character's sessionkey
$session_key = '153127228859ad09994e86c6.72781892_717032';

# AMF Request for retrieving clan list
$getWarList = AMF('ClanService.getWarList', [$session_key]);


# Insert clan list into array
$array = [];
foreach($getWarList['war_list'] as $clan) {
	array_push($array, $clan);
}

# Output JSON
echo json_encode($array, JSON_PRETTY_PRINT);