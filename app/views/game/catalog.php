<?php build('content') ?>
		<div id="about" class="about">
			<div class="container">
				<div class="row">
					<?php foreach($games as $key => $row) :?>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" 
							onclick="location.href ='<?php echo _route('game:show', $row['id'])?>'">
							<div class="about-box">
								<figure><img src="<?php echo $row['profile_icon']?>" alt="#" /></figure>
								<h3> <?php echo $row['title']?></h3>
								<p><?php echo $row['description']?></p>
							</div>
							<a class="read_more" href="#">Read More</a>
						</div>
					<?php endforeach?>
				</div>
			</div>
		</div>
<?php endbuild() ?>

<?php loadTo('tmp/landing')?>