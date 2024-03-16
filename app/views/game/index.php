<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">MANCALA BOARD</h4>
		</div>

		<div class="card-body">
			<div id="roboImageContainer">
				<img src="/public/uploads/robots/robo_a.png" alt="" id="roboImage">
				<h4 class="mt-3">Bot is thinking ..</h4>
			</div>
			<div id="mancalaBoardContainer">
				<div id="gameMessage"></div>
				<div id="mancalaBoard">
					<div style="display: flex; flex-direction: row;">
						<div id="baseSectionB" class="mancalaBase">
							<div class="player-b">
								<h1>0</h1>
							</div>
						</div>

						<div id="mancalaStoneSection">
							<div id="mancalaSectionA" class="mancalaSection">
								<?php for($i = 0 ; $i < $boardLength; $i++) :?>
									<div class="mancalaBox player-a" data-section="a" data-column="<?php echo $i?>" id="boxSecA_<?php echo $i?>">
										<img src="" data-position="<?php echo $i?>" data-section="a">
										<div class="box-value">4</div>
									</div>
								<?php endfor?>
							</div>	

							<div id="mancalaSectionB" class="mancalaSection">
								<?php for($i = ($boardLength -1) ; $i >= 0; $i--) :?>
									<div class="mancalaBox player-b" data-section="b" data-column="<?php echo $i?>" id="boxSecB_<?php echo $i?>">
										<img src="" data-position="<?php echo $i?>" data-section="b">
										<div class="box-value">4</div>
									</div>
								<?php endfor?>
							</div>
						</div>
						<div id="baseSectionA" class="mancalaBase">
							<div class="player-a">
								<h1>0</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<p>Instructions</p>
			<ul>
				<li>Choose your side blue or pink.</li>
				<li>The game will end if there are no more pebbles on either side.</li>
				<li>The highest pebbles on their base will win.</li>
				<li>Mechanics
					<ul>
						<li>The players has 1 turn each.</li>
						<li>If the pebble last stop is on players turnee base the player will have another turn.</li>
						<li>If the pebble returns back to your base and the box is empty, you will be able to steal
							the counter part of that box and put it to your base.</li>
					</ul>
				</li>
			</ul>
			<h1>Happy Gaming.</h1>

			<div class="mt-3" id="gameLogs"></div>
		</div>
	</div>
<?php endbuild()?>

<?php build('styles') ?>
	<style type="text/css">
		#mancalaBoard{
			box-sizing: border-box;
		}
		#mancalaBoard{
			padding-top: 30px;
			border-radius: 10px;
			height: 500px;
			background-image:    url(/uploads/mancala_board.jpg);
		    background-size:     cover;                      /* <------ */
		    background-repeat:   no-repeat;
		    background-position: center center;
		}
		#mancalaStoneSection{
			flex: 10;
		}

		#mancalaStoneSection > div {
			padding: 7px;
		}
		.mancalaBase{
			flex: 1;

		}
		.mancalaBase div {
			border-radius: 20px;
			width: 200px;
			height: 400px;
			color: #fff;
			padding-top: 150px;
		}

		.mancalaBase div.player-a{
			background: #132043;
		}

		.mancalaBase div.player-b{
			background: #C70039;
		}

		.mancalaBase h1{
			text-align: center;
		}
		.mancalaSection .mancalaBox{
			display: inline-block;
		}
		.mancalaBox{
			box-sizing: border-box;
			width: 15%;
			height: 150px;
			border-radius: 50%;
			margin-right: 5px;
			margin-left: 5px;
		}

		.mancalaBox.player-a {
			background: #132043;
		}

		.mancalaBox.player-b {
			background: #C70039;
		}

		.mancalaBox img{
			display: block;
			margin-top: 30px;
			margin-left: 20px;
			cursor: pointer;
		}

		.mancalaBox .box-value{
			color: #fff;
			font-weight: bold;
			text-align: center;
			font-size: 15pt;
		}

		#gameMessage{
			text-align: center;
			font-size: 2em;
			background-color: #5ae55a;
		}

		#roboImageContainer{
			display: block;
			position: absolute;
			text-align: center;
			padding-top: 70px;
			z-index: 1000;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, .5);
			color: #fff;

			display: none;
		}
	</style>
<?php endbuild()?>

<?php build('scripts') ?>
	<script type="text/javascript" src="/public/js/mancalaboard/main.js"></script>
<?php endbuild()?>
<?php loadTo()?>