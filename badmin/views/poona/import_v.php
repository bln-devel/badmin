	<div id="content-wrapper">
	<div id="content">
	<?php
	if(isset($players) && is_array($players)):
	?>
	
<table>
	<thead>
	<tr>
		<th>H/F</th>
		<th><img src="<?= base_url(); ?>resources/famfamfam/user.png" alt=""> Nom</th>
		<th>Prénom</th>
		<th><img src="<?= base_url(); ?>resources/famfamfam/cake.png" alt="Date de naissance"></th>
		<th><img src="<?= base_url(); ?>resources/famfamfam/sport_shuttlecock.png" alt=""> Licence</th>
		<th>Catégorie</th>
		<th><img src="<?= base_url(); ?>resources/famfamfam/chart_bar.png" alt="Classement"></th>
		<th><img src="<?= base_url(); ?>resources/famfamfam/email.png" alt="email"></th>
		<th><img src="<?= base_url(); ?>resources/famfamfam/telephone.png" alt="Téléphone"></th>
		<th colspan="2"><img src="<?= base_url(); ?>resources/famfamfam/vcard.png" alt=""> Fiche joueur</th>
	</tr>
	</thead>

	<tbody>
	<?php
		$i = -1;
		foreach($players as $player):
			$parity = (++$i % 2 == 0) ? "even" : "odd";
			
			$gender = $player["gender"];
			$male = ($gender == 0);
			$img = ($male) ? "male" : "female";
			setlocale (LC_TIME, "fr_FR.utf8"); //FIXME determined according to config? helper?
			$time = strtotime($player["birthdate"]);
			$birthdate = strftime("%e %B %Y",$time);
			$phone = preg_replace("/([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/", "$1&nbsp;$2&nbsp;$3&nbsp;$4&nbsp;$5", $player["phone"]);
	?>
	<tr class="<?= $parity; ?>">
		<td><img src="<?= base_url(); ?>resources/famfamfam/<?= $img; ?>.png" alt="<?= $gender; ?>"></td>
		<td class="text"><?= $player["name"]; ?></td>
		<td class="text"><?= $player["firstname"]; ?></td>
		<td><?= $birthdate; ?></td>
		<td><?= $player["license"]; ?></td>
		<td><?= $player["category"]; ?></td>
		<td><?= id2rank($player["rank_simple"]); ?>/<?= id2rank($player["rank_double"]); ?>/<?= id2rank($player["rank_mixed"]); ?></td>
		<td><a href="mailto:<?= $player["email"]; ?>"><?= $player["email"]; ?></a></td>
		<td><?= $phone; ?></td>
		<td><a title="voir sur databad" href="http://www.databad.com/fichejoueur.php?Licence=<?= $player["license"]; ?>" class="img"><img src="<?= base_url(); ?>resources/core/images/databad.gif" alt="Databad"></a></td>
		<td><a title="voir sur badnuke" href="http://www.badnuke.com/player.aspx?licence=<?= $player["license"]; ?>" class="img"><img src="<?= base_url(); ?>resources/core/images/badnuke.png" alt="Badnuke"></a></td>
	</tr>
	<?php endforeach; ?>
	</tbody>
</table>
	<?php endif; ?>
	
	<?php $this->load->view("poona/import_upload_v"); ?>
	</div> <!-- /#content -->
	</div> <!-- /#content-wrapper -->