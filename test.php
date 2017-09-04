<?php
/**
 * Sample output in table
 */
$ch = curl_init();
$options = array(
	CURLOPT_URL => 'http://' . $_SERVER['HTTP_HOST'] . '/clan_ranking/json.php',
	CURLOPT_RETURNTRANSFER => true
);
curl_setopt_array($ch, $options);
$res = curl_exec($ch);
curl_close($ch);
$list = json_decode($res);
?>

<table border="1">
	<tr>
		<th>Rank</th>
		<th>ID</th>
		<th>Name</th>
		<th>Master</th>
		<th>Member</th>
		<th>Reputation</th>
	</tr>
	<?php foreach($list as $index => $clan): ?>
		<tr>
			<td><?=($index + 1);?></td> 
			<td><?=$clan->id;?></td>
			<td><?=$clan->name;?></td>
			<td><?=$clan->master_name;?></td>
			<td><?=$clan->member_number;?> / <?=$clan->member_slots;?></td>
			<td><?=$clan->reputation;?>
		</tr>
	<?php endforeach; ?>
</table>