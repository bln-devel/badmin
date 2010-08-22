	<div id="content-wrapper">
	<div id="content">
<?php if(count($players) > 0): ?>
	<table>
	<thead>
	<tr>
		<th>H/F</th>
		<th><img src="<?= base_url(); ?>resources/famfamfam/user.png" alt=""> Nom</th>
		<th>Prénom</th>
		<th><img src="<?= base_url(); ?>resources/famfamfam/sport_shuttlecock.png" alt=""> Licence</th>
	</tr>
	</thead>

	<tbody>
<?php
$i = -1;
foreach($players as $player):
	$parity = (++$i % 2 == 0) ? "even" : "odd";
	$gender = $player->gender;
	$male = ($gender == 0);
	$img = ($male) ? "male" : "female";
?>

	<tr class="<?= $parity; ?>">
		<td><img src="<?= base_url(); ?>resources/famfamfam/<?= $img; ?>.png" alt="<?= $gender; ?>"></td>
		<td class="text"><?= $player->name; ?></td>
		<td class="text"><?= $player->firstname; ?></td>
		<td><?= anchor(site_url("poona/poona/player/".$player->license), $player->license); ?></td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>
	</div> <!-- /#content -->
	</div> <!-- /#content-wrapper -->