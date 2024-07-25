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
<script defer>
	$(document).ready(function(){
	const boxSize = 6;

	const mancalaBaseA = $("#baseSectionA");
	const mancalaBaseB = $("#baseSectionB");
	let FIRST_INSTANCE = true;
	/*
	*classes
	*/
	const mancalaBox = $('.mancalaBox');
	const pebblesPath = '/uploads/pebbles/';
	const robotPath = '/uploads/robots/';

	let matchType = 'AI';

	let boxes = {
		sectionA : [],
		sectionB : []
	};

	let bases = {
		sectionA : 0,
		sectionB : 0
	};

	let usersTurn = 'a';
	let userLastTurn = '';
	let boxCounterParts = {
		sectionA : [],
		sectionB : []
	};

	let messages = {
		playerATurn: 'Player A Turn to Move',
		playerAMoved : 'Player A Moving Pebbles',
		playerBTurn : 'Player B Turn to Move',
		playerBMoved : 'Player B Moving Pebbles'
	};

	let aiMoveLogs = [];

	init();

	function init() {
		
		loadStartingBoxValue(4);

		for(let i = 0; i < boxSize ; i++) {
			boxCounterParts.sectionB[i] = i;
		}

		let counter = 0;
		for(let i = (boxSize-1); i >= 0 ; i--) {
			boxCounterParts.sectionA[counter] = i;
			counter++;
		}
		reloadPebbles();
		gameMessage(messages['playerATurn']);

		FIRST_INSTANCE = false;
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

	function getCounterPartValue(section, position) {
		switch(section) {
			case 'a':
				retVal = boxCounterParts.sectionB;
			break;

			case 'b':
				retVal = boxCounterParts.sectionA;
			break;
		}

		return retVal[position];
	}

	function getTotalPebbles(section) {
		let total = 0;
		for(let i = 0; i < boxSize; i++) {
			total += getBoxValue(section, i);
		}
		return total;
	}

	function loadStartingBoxValue(size) {
		for(let i = 0; i < boxSize; i++) {
			setBoxValue('a', i, size);
			setBoxValue('b', i, size);
		}
	}

	function reloadPebbles() {
		for(let i = 0; i < boxes.sectionA.length; i++) {
			let boxValue = parseInt(boxes.sectionA[i]);
			let boxValueHTML = $(`#boxSecA_${i}`).find('.box-value');

			let oldBoxValue = parseInt(boxValueHTML.html());
			animateBoxValueChange(`#boxSecA_${i}`, boxValue, i, '#132043', boxValue != oldBoxValue);
		}

		for(let i = 0; i < boxes.sectionB.length; i++) {
			let boxValue = boxes.sectionB[i];
			let boxValueHTML = $(`#boxSecA_${i}`).find('.box-value');
			let oldBoxValue = parseInt(boxValueHTML.html());
			animateBoxValueChange(`#boxSecB_${i}`, boxValue, i, '#C70039', boxValue != oldBoxValue);
		}
	}

	function animateBoxValueChange(boxId, boxValue, index, defaultColor, valueChange = false) {
		// $(boxId).css('background-color', defaultColor);
		$(boxId).find('img').attr('src', pebbleImage(boxValue));
		$(boxId).find('.box-value').html(boxValue);
		console.log(FIRST_INSTANCE);

	}


	// function animateBoxValueChange(index, boxId, defaultColor, valueChange = false) {
	// 	if(valueChange) {
	// 		setTimeout(function(){
	// 			$(boxId).css('background-color', 'yellow');
	// 			setTimeout(function(){
	// 				$(boxId).css('background-color', defaultColor);
	// 			}, 200);
	// 		}, (index+1) * 200);
	// 	}
	// }

	function reloadBase() {
		mancalaBaseA.find('h1').html(bases.sectionA);
		mancalaBaseB.find('h1').html(bases.sectionB);
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

	function robotImage() {
		let images = [
			'robo_b',
			'robo_a'
		];

		let randomImage = Math.floor(Math.random() * 2);
		let selectedImage = images[randomImage];
		return selectedImage;
	}

	/**
	 * action show or hide
	 */
	function toggleRoboImage(action) {
		if(action == 'hide') {
			$('#roboImageContainer').hide();
		} else {
			let roboImage =  robotPath + '/' + robotImage() + '.png';
			$('#roboImage').attr('src', roboImage);
			$('#roboImageContainer').show();
		}
		
	}

	function movePebbleValue(section,position) {
		let pebbleSize = getBoxValue(section, position);
		let turnIteration = 0;

		//remove pebbles from that box
		setBoxValue(section,position,0);

		do{
			position++;
			if(position == boxSize) {
				/*
				*ADD POINTS TO BASE
				*/
				setBaseValue(section, getBaseValue(section) + 1);
				pebbleSize--;
				if(pebbleSize > 0) {
					section = invertSection(section);
					turnIteration++;
				}else if(pebbleSize == 0 && (usersTurn == section)) {
					usersTurn = invertSection(usersTurn);
				}
				position = -1;
			} else {
				setBoxValue(section, position, getBoxValue(section, position) + 1);
				pebbleSize--;
			}

			reloadPebbles();

		}while(pebbleSize > 0);
		/*
		*check if last position
		*is on user side and the box if empty
		*then fetch the stones counterpart
		*/

		if(position >= 0) {
			let boxLandedValue = getBoxValue(section,position);
			/*
			*steal mancala box logic
			*if the pbble landed on users base and without pebble
			*it will grab the box counter part pebbles and move to users base
			*/
			if(boxLandedValue == 1 && (userLastTurn == section) && turnIteration >= 2) {
				console.log('steal logic run');
				let boxLandedValueCounterPartPosition = getCounterPartValue(section, position);
				let boxLandedValueCounterPartValue = getBoxValue(invertSection(section), boxLandedValueCounterPartPosition);

				if(boxLandedValueCounterPartValue > 0) {
					setBaseValue(section, getBaseValue(section) + boxLandedValueCounterPartValue);
					setBoxValue(invertSection(section), position, 0);
				}
			}
		}
		
		if($(`#boxSec${section.toUpperCase()}_${position}`).find('img')) {
			$(`#boxSec${section.toUpperCase()}_${position}`).find('img').fadeTo("slow", 0.15).fadeTo("fast", 1);
		}

		//after turn
		let totalPebblesRemaining = getTotalPebbles(section);

		if(totalPebblesRemaining == 0) {
			alert('Game Over');

			if(getTotalPebbles('a') > getTotalPebbles('b')) {
				alert('PLAYER A WINS!');
			} else {
				alert('PLAYER B WINS');
			}
			gameScoreSave(4, getTotalPebbles('a'));
		}

		usersTurn = invertSection(usersTurn);
	}

	function invertSection(section) {
		return (section == 'a') ? 'b' : 'a';
	}


	/**
	 * AI ACTIONS
	 */
	//this action will select shortest way to score a point
	function shortestMoveLogic() {
		let aiboxes = boxes['sectionB'];
		let boxPositionMove = undefined;

		for(let i in aiboxes) {
			console.log(i);
			let boxValue = aiboxes[i];
			//calculate distance by getting the value and deducting the range
			let boxDistance = boxValue - i;

			if(typeof boxPositionMove == 'undefined') {
				boxPositionMove = boxValue;
			}else{
				if((boxDistance < boxPositionMove) && boxDistance > 0) {
					boxPositionMove = boxDistance;
				}
			}
		}

		return boxPositionMove;
	}

	function randomMoveLogic() {
		let aiboxes = boxes['sectionB'];
		//boxes with values
		let boxesToLoop = [];

		for(let i in aiboxes) {
			if(aiboxes[i] > 0) {
				boxesToLoop.push(i);
			}	
		}

		if(boxesToLoop.length > 0) {
			let randomMove = Math.round(Math.random() * (boxesToLoop.length - 1));
			console.log([
				'randomMove',
				randomMove,
				boxesToLoop
			]);
			randomPosition = boxesToLoop[randomMove];
		} else {
			//game over
			return false;
		}

		return randomPosition;
	}

	function aiMove() {
		let clickOnSection = randomMoveLogic();
		aiMoveLogs.push("AI Move: CLICK BOX # " + (parseInt(clickOnSection) + 1));
		gameMessage(messages['playerBMoved']);
		movePebbleValue('b', clickOnSection);
		reloadBase();

		userLastTurn = 'b';
		gameLogs();
		if(usersTurn == 'b') {
			gameMessage(messages['playerBTurn']);
			setTimeout(function() {
				aiMove();
			}, 3000);
		} else {
			gameMessage(messages['playerATurn']);
		}
	}


	function gameMessage(message) {
		$("#gameMessage").html(message);
	}

	function gameLogs() {
		let logs = '<ol>';
		for(let i in aiMoveLogs) {
			logs += '<li>' +aiMoveLogs[i]+ '</li>';
		}
		logs += '</ol>';

		console.log(aiMoveLogs);
		$("#gameLogs").html(logs);
	}
	mancalaBox.on('click', function(e){
		gameLogs();
		if(matchType == 'AI' && usersTurn == 'b') {

		} else {
			if($(e.target).is('img')){
				let targetEl = $(e.target);
				let dataPosition = targetEl.data('position');
				let dataSection = targetEl.data('section');
	
				if(dataSection == usersTurn) {
					//click animation
					targetEl.fadeTo("slow", 0.15).fadeTo("fast", 1);
	
					userLastTurn = usersTurn;
					movePebbleValue(dataSection, dataPosition);
					reloadBase();
				}

				if(usersTurn == 'b') {
					setTimeout(function(){
						toggleRoboImage('show');
					}, 1000);
					gameMessage(messages['playerBTurn']);
					setTimeout(function(){
						toggleRoboImage('hide');
					}, 3000);
					setTimeout(function() {
						aiMove();
					  }, 4000);
				}
			}
		}
		
	});
});
</script>
<?php endbuild()?>

<?php loadTo()?>