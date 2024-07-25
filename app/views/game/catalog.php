<?php build('content') ?>
		<div id="about" class="about">
			<div class="container">
				<div class="row">
					<?php foreach($games as $key => $row) :?>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-5">
							<div class="about-box">
								<figure><img src="<?php echo $row['profile_icon']?>" alt="#" /></figure>
								<h3> <?php echo $row['title']?></h3>
								<p><?php echo $row['description']?></p>
							</div>

							<?php if(whoIs()) :?>
								<button class="btn btn-primary btn-block" onclick="location.href ='<?php echo _route('game:play', [
									'code' => $row['code'],
									'id' => $row['id'],
								])?>'">
									Play
								</button>
							<?php else :?>
								<p>Login to play</p>
							<?php endif?>
						</div>
					<?php endforeach?>
				</div>
			</div>
		</div>
<?php endbuild() ?>

<?php loadTo('tmp/landing')?>