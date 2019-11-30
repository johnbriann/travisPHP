<?php if(isset($riders)){ ?>
	<select class="form-control select-rider-dropdown">
		<option value="">Choose Rider</option>
		<?php if(!empty($users)){ ?>
			<?php foreach($users as $key => $user){ ?>
				<option value="<?= $user['id']?>"><?= $user['first_name'].' '.$user['last_name']?></option>
			<?php } ?>
		<?php } ?>
	</select>
<?php } ?>