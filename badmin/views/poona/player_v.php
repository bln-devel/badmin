	<div id="content-wrapper">
	<div id="content">
	
	<?php if(isset($error)): ?>
		<div class="error"><?= $error; ?></div>
	<?php else:
		$gender = $player->gender;
		$male = ($gender == 0);
		$img = ($male) ? "male" : "female";
		$sexe = ($male) ? "Homme" : "Femme";
		$people = ($male) ? "user" : "user_female";
		setlocale (LC_TIME, "fr_FR.utf8"); //FIXME determined according to config? helper?
		$time = strtotime($player->birthdate);
		$birthdate = strftime("%e %B %Y",$time);
		$phone = preg_replace("/([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/", "$1&nbsp;$2&nbsp;$3&nbsp;$4&nbsp;$5", $player->phone);
	?>
	<h2><img src="<?= base_url(); ?>resources/famfamfam/<?= $people; ?>.png" alt=""> Fiche de
		<span class="firstname"><?= $player->firstname; ?></span>
		<span class="name"><?= $player->name; ?></span>
	</h2>

	<ul>
		<li>Sexe&nbsp;: <img src="<?= base_url(); ?>resources/famfamfam/<?= $img; ?>.png" alt="<?= $sexe; ?>"></li>
		<li>License&nbsp;: <?= $player->license; ?></li>
		<li>Anniversaire&nbsp;: <?= $birthdate; ?></li>
		<li>Catégorie&nbsp;: <?= $player->category; ?></li>
		<li>Classement de simple&nbsp;: <?= id2rank($player->rank_simple); ?></li>
		<li>Classement de double&nbsp;: <?= id2rank($player->rank_double); ?></li>
		<li>Classement de double mixte&nbsp;: <?= id2rank($player->rank_mixed); ?></li>
		<li>Adresse email&nbsp;: <a href="mailto:<?= $player->email; ?>"><?= $player->email; ?></a></li>
		<li>Numéro de téléphone&nbsp;: <?= $phone; ?></li>
		<li><a title="voir sur databad" href="http://www.databad.com/fichejoueur.php?Licence=<?= $player->license; ?>" class="img"><img src="<?= base_url(); ?>resources/core/images/databad.gif" alt="Databad"></a></li>
		<li><a title="voir sur badnuke" href="http://www.badnuke.com/player.aspx?licence=<?= $player->license; ?>" class="img"><img src="<?= base_url(); ?>resources/core/images/badnuke.png" alt="Badnuke"></a></li>
	</ul>
	
	<?php endif; ?>
	</div> <!-- /#content -->
	</div> <!-- /#content-wrapper -->