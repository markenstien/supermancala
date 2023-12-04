<?php build('content') ?>
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">MANCALA</h4>
		</div>

		<div class="card-body">
			
			<div id="mancalaBoardContainer">
				<div id="mancalaBoard">
					<div style="display: flex; flex-direction: row;">
						<div id="baseSectionA" class="mancalaBase">
							<div></div>
						</div>

						<div id="mancalaStoneSection">
							<div id="mancalaSectionA" class="mancalaSection">
								<?php for($i = 0 ; $i < $boardLength; $i++) :?>
									<div class="mancalaBox" data-section="a" data-column="<?php echo $i?>" id="boxSecA_<?php echo $i?>">
										<img src="" data-position="<?php echo $i?>" data-section="a">
										<div class="box-value">4</div>
									</div>
								<?php endfor?>
							</div>	

							<div id="mancalaSectionB" class="mancalaSection">
								<?php for($i = 0 ; $i < $boardLength; $i++) :?>
									<div class="mancalaBox" data-section="b" data-column="<?php echo $i?>" id="boxSecB_<?php echo $i?>">
										<img src="" data-position="<?php echo $i?>" data-section="b">
										<div class="box-value">4</div>
									</div>
								<?php endfor?>
							</div>
						</div>
						<div id="baseSectionB" class="mancalaBase">
							<div></div>
						</div>
					</div>
				</div>
			</div>
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
			background: #B31312;
			border-radius: 20px;
			width: 200px;
			height: 400px;
		}
		.mancalaSection .mancalaBox{
			display: inline-block;
		}
		.mancalaBox{
			box-sizing: border-box;
			width: 15%;
			height: 150px;
			border-radius: 50%;
			background: #161A30;
			margin-right: 5px;
			margin-left: 5px;
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
	</style>
<?php endbuild()?>

<?php build('scripts') ?>
	<script type="text/javascript">
		$(document).ready(function(){
			const boxSize = 6;
			/**
			 * ids*/
			const mancalaBoard = $("#mancalaBoard");
			const mancalaSectionA = $("#mancalaSectionA");
			const mancalaSectionB = $("#mancalaSectionB");
			/*
			*classes
			*/
			const mancalaBox = $('.mancalaBox');
			const pebblesPath = '/uploads/pebbles/';

			const mancalaBoxClassName = 'mancalaBox';
			const mancalaBoxValueClassName = 'box-value';

			let boxes = {
				sectionA : [],
				sectionB : []
			};

			let bases = {
				sectionA : 0,
				sectionB : 0
			};

			let usersTurn = 'a';


			init();

			function init() {
				loadStartingBoxValue(2);
				reloadPebbles();
			}

			function setBoxValue(section,position,size) {
				switch(section) {
					case 'a':
						boxes.sectionA[position] = size;
					break;

					case 'b':
						boxes.sectionB[position] = size;
					break;
				}
			}

			function getBoxValue(section,position) {
				let retVal;

				switch(section) {
					case 'a':
						retVal = boxes.sectionA[position];
					break;

					case 'b':
						retVal = boxes.sectionB[position];
					break;
				}

				return retVal;
			}

			function setBaseValue(section,size) {
				switch(section) {
					case 'a':
						bases.sectionA = size;
					break;

					case 'b':
						bases.sectionB = size;
					break;
				}
			}

			function getBaseValue(section) {
				let retVal;

				switch(section) {
					case 'a':
						retVal = bases.sectionA;
					break;

					case 'b':
						retVal = bases.sectionB;
					break;
				}

				return retVal;
			}

			function loadStartingBoxValue(size) {
				for(let i = 0; i < boxSize; i++) {
					setBoxValue('a', i, size);
					setBoxValue('b', i, size);
				}
			}

			function reloadPebbles() {
				for(let i = 0; i < boxes.sectionA.length; i++) {
					let boxValue = boxes.sectionA[i];
					$(`#boxSecA_${i}`).find('img').attr('src', pebbleImage(boxValue));
					$(`#boxSecA_${i}`).find('.box-value').html(boxValue);
				}

				for(let i = 0; i < boxes.sectionB.length; i++) {
					let boxValue = boxes.sectionB[i];
					$(`#boxSecB_${i}`).find('img').attr('src', pebbleImage(boxValue));
					$(`#boxSecB_${i}`).find('.box-value').html(boxValue);
				}
			}

			function pebbleImage(size) {
				let retVal = '';

				if(size > 10) {
					retVal = `${pebblesPath}peb_many.png`;
				} else if(size > 5) {
					retVal = `${pebblesPath}peb_many.png`;
				} else if(size == 0) {
					retVal = `${pebblesPath}peb_0.png`;
				} else {
					retVal = `${pebblesPath}peb_${size}.png`;
				}

				return retVal;
			}

			function movePebbleValue(section,position) {
				let pebbleSize = getBoxValue(section, position);
				let letCurPebbleSize;

				//remove pebbles from that box
				setBoxValue(section,position,0);

				while(pebbleSize > 0) {
					if(position >= boxSize) {
						setBaseValue(section);
						//swap posistion
						section = (section == 'a') ? 'b' : 'a';
						position = -1; //so next value is 0
						pebbleSize++; //add so the pebble will move up or down
					}

					position++;
					letCurPebbleSize = getBoxValue(section, position);
					setBoxValue(section, position, letCurPebbleSize + 1);

					//deduct pebble size
					pebbleSize--;
				}

				reloadPebbles();
			}

			mancalaBox.on('click', function(e){
				if($(e.target).is('img')){
					let targetEl = $(e.target);
					let dataPosition = targetEl.data('position');
					let dataSection = targetEl.data('section');

					if(dataSection == usersTurn) {
						movePebbleValue(dataSection, dataPosition);
					}

				}
			});
		});
	</script>
<?php endbuild()?>
<?php loadTo()?>