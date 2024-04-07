<?php build('content') ?>
	<div class="container" style="padding: 50px 0px;">
		<div class="col-sm-12 col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Forget password</h4>
					<?php echo wLinkDefault(_route('auth:login'), 'Cancel Forget Password')?>

					<?php Flash::show()?>
				</div>

				<?php if(!$isSubmitted) :?>
				<div class="card-body">
					<?php
						Form::open([
							'method' => 'post'
						]);
					?>
						<div class="form-group">
							<?php
								Form::label('Email');
								Form::email('email','', [
									'class' => 'form-control',
									'placeholder' => 'If you have account with us a reset password link will be sent to your email'
								]);
							?>
						</div>

						<div class="form-group mt-2">
							<?php
								Form::submit('btn_forget_password');
							?>
						</div>
					<?php Form::close()?>
				</div>
				<?php endif?>
			</div>
		</div>
	</div>
<?php endbuild()?>
<?php loadTo('tmp/basic')?>