	<div id="content-wrapper">
	<div id="content">
		<h2><?= $pageTitle; ?></h2>
		
		
		<form action="" method="">
		<table>
			<caption>Membership for <?= $category; ?> <?= $season; ?></caption>
			<thead>
			<tr>
				<th class="col_name"><label for="f_name">Name</label></th>
				<th class="col_firstname"><label for="f_firstname">First name</label></th>
				<th class="col_birthdate"><label for="f_birthdate">Birthdate</label></th>
				<th class="col_contact"><label for="f_contact">eMail or phone number</label></th>
				<th class="col_timeslot"><label for="f_timeslot">Time slot</label></th>
				<th class="col_docs_ok"><label for="f_docs_ok">Docs?</label></th>
				<th class="col_certif_ok"><label for="f_certif_ok">Certif?</label></th>
				<th class="col_pay_ok"><label for="f_pay_ok">Pay?</label></th>
				<th class="col_valid_ok">Valid?</th>
				<th class="col_reception_date"><label for="f_date">Reception date</label></th>
				<th class="col_controls"><span>Controls</span></th>
			</tr>
			</thead>
			
			<?php
			$i = -1;
			$check = array("ko","ok");
			$img = array("cross", "tick");
			
			//FIXME STUB
			$members = array();
			for($i = 20; --$i >= 0; ){
				$members[] = array("name"=>"Bidou"
							,"firstname"=>"Michel"
							,"birthdate"=>"25/07/1999"
							,"contact"=>"bidou@bidu.com"
							,"timeslot"=>"Time slot ".rand(1,3)
							,"docs_ok"=>rand(0,1)
							,"certif_ok"=>rand(0,1)
							,"pay_ok"=>rand(0,1)
							,"date"=>"03/10/2010");
			}
			
			foreach($members as $member):
				$parityClass = ($i++ % 2 == 0) ? "even" : "odd";
				
				$docOk = $member["docs_ok"];
				$docOkStr = $check[$docOk];
				$docOkImg = $img[$docOk];
				$certifOk = $member["certif_ok"];
				$certifOkStr = $check[$certifOk];
				$certifOkImg = $img[$certifOk];
				$payOk = $member["pay_ok"];
				$payOkStr = $check[$payOk];
				$payOkImg = $img[$payOk];
				$validOk = ($docOk + $certifOk + $payOk == 3) ? 1 : 0;
				$validOkStr = $check[$validOk];
				$validOkImg = $img[$validOk];
				
				//TODO format date properly (CI date helper?)
				//FIXME determines if contact is a mail or not (<a mailto:)
			?>
			
			<tr class="<?= $parityClass; ?>">
				<td><?= $member["name"]; ?></td>
				<td><?= $member["firstname"]; ?></td>
				<td class="col_date"><?= $member["birthdate"]; ?></td>
				<td><?= $member["contact"]; ?></td>
				<td><?= $member["timeslot"]; ?></td>
				<td class="col_check"><span class="check_<?= $docOkStr; ?>"><img src="<?= base_url(); ?>/resources/core/images/famfamfam/<?= $docOkImg; ?>.png" alt="<?= $docOkStr; ?>"></span></td>
				<td class="col_check"><span class="check_<?= $certifOkStr; ?>"><img src="<?= base_url(); ?>/resources/core/images/famfamfam/<?= $certifOkImg; ?>.png" alt="<?= $certifOkStr; ?>"></span></td>
				<td class="col_check"><span class="check_<?= $payOkStr; ?>"><img src="<?= base_url(); ?>/resources/core/images/famfamfam/<?= $payOkImg; ?>.png" alt="<?= $payOkStr; ?>"></span></td>
				<td class="col_check"><span class="check_<?= $validOkStr; ?>"><img src="<?= base_url(); ?>/resources/core/images/famfamfam/<?= $validOkImg; ?>.png" alt="<?= $validOkStr; ?>"></span></td>
				<td class="col_date"><?= $member["date"]; ?></td>
				<td>
					<a href="<?= site_url("TODO") ?>" class="img"><img src="<?= base_url(); ?>/resources/core/images/famfamfam/user_edit.png" alt="Edit" title="Edit"></a>
					<a href="<?= site_url("TODO") ?>" class="img"><img src="<?= base_url(); ?>/resources/core/images/famfamfam/user_delete.png" alt="Delete" title="Delete"></a>
				</td>
			</tr>
			<?php endforeach; ?>
			
			<!-- last line is for addition -->
			<tr class="special">
				<td><input type="text" class="text" id="f_name" name="f_name"></td>
				<td><input type="text" class="text" id="f_firstname" name="f_firstname"></td>
				<td><input type="text" class="text date w8em format-d-m-y highlight-days-67 no-transparency" id="f_birthdate" name="f_birthdate"></td>
				<td><input type="text" class="text" id="f_contact" name="f_contact"></td>
				<td>
					<select id="f_timeslot" name="f_timeslot">
						<option>Time slot 1</option>
						<option>Time slot 2</option>
						<option>Time slot 3</option>
					</select>
				</td>
				<td class="col_check"><input type="checkbox" class="checkbox" id="f_docs_ok" name="f_docs_ok"></td>
				<td class="col_check"><input type="checkbox" class="checkbox" id="f_certif_ok" name="f_certif_ok"></td>
				<td class="col_check"><input type="checkbox" class="checkbox" id="f_pay_ok" name="f_pays_ok"></td>
				<td class="disabled"></td>
				<td><input type="text" class="text date w8em format-d-m-y highlight-days-67 no-transparency" id="f_date" name="f_date" value="<?= date("d/m/Y")?>"></td>
				<td>
					<input type="image" name="add_user" src="<?= base_url()?>/resources/core/images/famfamfam/user_add.png" alt="Add" title="Add">
				</td>
			</tr>
			</form>
		</table>
		
		<p>Back to <a href="<?= site_url("membership/manage/display/".$season); ?>">categories list of <?= $season; ?></a>.</p>
	</div> <!-- /#content -->
	</div> <!-- /#content-wrapper -->
