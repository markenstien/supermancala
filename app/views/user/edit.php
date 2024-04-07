<?php build('content') ?>
	
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Edit User</h4>
		</div>

		<div class="card-body">
			<?php Flash::show()?>
			<?php echo $form->start()?>
				<div class="form-group">
					<?php __($form->getRow('firstname')) ?>
				</div>

				<div class="form-group">
					<?php __($form->getRow('lastname')) ?>
				</div>

				<div class="form-group">
					<?php __($form->getRow('password')) ?>
				</div>
				<input type="submit" name="" class="btn btn-primary btn-sm" value="Edit User">
			<?php echo $form->end()?>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo()?>