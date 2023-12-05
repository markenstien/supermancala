$(document).ready(function(){
	const boxSize = 6;
	/**
	 * ids*/
	const mancalaBoard = $("#mancalaBoard");
	const mancalaSectionA = $("#mancalaSectionA");
	const mancalaSectionB = $("#mancalaSectionB");

	const mancalaBaseA = $("#baseSectionA");
	const mancalaBaseB = $("#baseSectionB");
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
	let userLastTurn = '';
	let allowTurn = true;

	let boxCounterParts = {
		sectionA : [],
		sectionB : []
	};
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

	function movePebbleValue(section,position) {
		let pebbleSize = getBoxValue(section, position);
		let letCurPebbleSize;
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
		}

		usersTurn = invertSection(usersTurn);
	}

	function invertSection(section) {
		return (section == 'a') ? 'b' : 'a';
	}


	mancalaBox.on('click', function(e){
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
		}
	});
});