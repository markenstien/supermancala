


// 1. Declare variable which soon to be replaced
let cardEl = document.getElementById("cards-el")
let sumEl = document.getElementById("sum-el")
let messageEl= document.getElementById("message-el")
// 2. Declare boolean for On/Off activation 
let hasLucky9 = false
let isAlive = false
// 3. Declare initial values of Variables
let cards = []
let sumCards = 0

let gameAddedObject = {
    newCardCount : 0,
    winner : '',
    isGamePlaying : false
};

var gameControl = document.getElementById('gameControl'); 
var uiGameTotal = document.getElementById('gamesTotal'); 
var uiGameWin = document.getElementById('winsTotal'); 
var uiGameDraw = document.getElementById('drawsTotal'); 
var uiGameLose = document.getElementById('loseTotal'); 

displayScoreLocalStorage();

function startGameInit(){
    gameAddedObject['isGamePlaying'] = true;
    startGame();
    p2startGame();
}
// 4. create a function that generate Random numbers || application for more than 1 variable 
function getRandomCard() {
    let randomNumber = Math.floor( Math.random()*13 ) + 1
    if (randomNumber > 10) {
        return randomNumber 
    } else {
        return randomNumber
    }

}

// 5. create a function that initialize the Game
function startGame() {
    isAlive = true
    let randomCardOne = getRandomCard()
    let randomCardTwo = getRandomCard() 

    cards = [randomCardOne, randomCardTwo]
    sumCards = randomCardOne + randomCardTwo
    
    renderGame()
}

// 6. create another function (inside a function) that do not override the another function 

function renderGame() {
    // 7. creating loop so that the index of Cards will be written accordingly
    cardEl.textContent = "Cards: " 
    for (let i = 0; i < cards.length; i++) {
        cardEl.textContent += cards[i] + " "
    }
    if(sumCards > 9) {
        while(sumCards > 9) {
            sumCards -= 10;
        }
    }
    // 7. creating summation so that all the sum will be written accordingly
    sumEl.textContent = "Sum: " + sumCards
    // 8. creates conditional statements for Lucky 9 
    if (sumCards === 9) {
        messageEl.textContent = "You got Lucky 9!";
        hasLucky9 = true
    } {
        messageEl.textContent = "Want to draw 'New Card' ?";
    }

    checkWinner();
}

// 9. create function for drawing new card without overriding the above code, just adding new index and sum to the initial code.
function newCard() { 
    // setting condition based on the declared boolean
    if (isAlive === true) {
        // introducing new variable to suffice the equation
        let newCard = getRandomCard()
        // adding the new variable to the existing variable
        sumCards += newCard
        cards.push(newCard)
        gameAddedObject['newCardCount']++;
        bothAdvantage();
        renderGame()  
        // adding new condition to avoid redundancy
        if (hasLucky9 === false) { 
            messageEl.textContent = "Try Again";
        }
        // reverting the boolean again to complete the Game
        hasLucky9 = false
        isAlive = false
    }
   
}

// adding player2 for interaction purposes, same process above but different variables


let p2cardEl = document.getElementById("p2cards-el")
let p2sumEl = document.getElementById("p2sum-el")
let p2messageEl= document.getElementById("p2message-el")
let p2cards = []
let p2sumCards = 0
let p2hasLucky9 = false;

function p2getRandomCard() {
    let randomNumber = Math.floor( Math.random()*13 ) + 1
    if (randomNumber > 10) {
        return randomNumber 
    } else {
        return randomNumber
    }

}

function p2startGame() {
    psIsAlive = true
    let p2randomCardOne = p2getRandomCard()
    let p2randomCardTwo = p2getRandomCard() 

    p2cards = [p2randomCardOne, p2randomCardTwo]
    p2sumCards = p2randomCardOne + p2randomCardTwo
    
    p2renderGame()
}


function p2renderGame() {
    p2cardEl.textContent = "Cards: " 
    for (let i = 0; i < p2cards.length; i++) {
        p2cardEl.textContent += p2cards[i] + " "
    }

    let totalCardDrawSum = 0;
    if(p2sumCards > 9) {
        while(p2sumCards > 9) {
            p2sumCards -= 10;
        }
    }

    p2sumEl.textContent = "Sum: " + p2sumCards
    if (p2sumCards === 9) {
        p2messageEl.textContent = "You got Lucky 9!";
        p2hasLucky9 = true
    } else {
        p2messageEl.textContent = "Want to draw 'New Card' ?";
    }
    checkWinner();
}

function p2newCard() { 
    if (psIsAlive === true) {
        let p2newCard = p2getRandomCard()
        p2sumCards += p2newCard
        p2cards.push(p2newCard)
        gameAddedObject['newCardCount']++;
        p2renderGame()  
        if (p2hasLucky9 === false) { 
            p2messageEl.textContent = "Try Again";
        }
        p2hasLucky9 = false
        psIsAlive = false
    }
}


function checkWinner() {
    if(p2hasLucky9 || hasLucky9) {
        p2hasLucky9 == hasLucky9 ? gameAddedObject['winner'] = 'draw' :  
        gameAddedObject['winner'] = checkGameWinner();
    } if(gameAddedObject['newCardCount'] > 0) {
        gameAddedObject['winner'] = checkGameWinner();
    }
    controlDisplay();
    console.log(gameAddedObject);
}

function checkGameWinner() {
    let retval = '';
    if(p2sumCards > sumCards) {
        retval = 'player2';
    } else if(sumCards > p2sumCards) {
        retval = 'player1';
    } else {
        retval = 'draw'
    }

    return retval;
}

function bothAdvantage() {
    //if less than the card only
    if(p2sumCards < 5) {
        if(sumCards > 6) {
            p2newCard();
        }
    }
}

function controlDisplay() {
    //if no winner
    if(gameAddedObject['isGamePlaying'] && gameAddedObject['winner'] == '') {
        gameControl.innerHTML = '<h3>Game Playing..</h3>';
    } else if(gameAddedObject['winner'] != '') {
        let message = '';
        if(gameAddedObject['winner'] == 'player1') {
            message = 'You Won!!';
        } else if(gameAddedObject['winner'] == 'player2') {
            message = 'You lose..'
        } else {
            message = 'Draw';
        }

        isAlive = false;
        psIsAlive = false;
        
        applyScoreTemporary();
        gameControl.innerHTML = `
            <h3>${message}</h3>
            <button onclick='playAgain()'> Play Again .</button>
        `;
    }
    //game playing

    //result + new game
}

function applyScoreTemporary() {
    var localStorageLucky9 = localStorage.getItem("game_lucky9");
    var localStorageLucky9SetValue = {
        'gameCount' : 0,
        'win' : 0,
        'draw' : 0,
        'lose' : 0
    };
    
    let win = gameAddedObject['winner'] == 'player1' ? 1 : 0;
    let draw = gameAddedObject['winner'] == 'draw' ? 1 : 0;
    let lose = gameAddedObject['winner'] == 'player2' ? 1 : 0;


    if(localStorageLucky9 == null) {
        setValues(1, win, draw, lose)
    } else {
        let localStorageToJson = JSON.parse(localStorageLucky9);
        setValues(localStorageToJson['gameCount'] + 1,
            localStorageToJson['win'] + win,
            localStorageToJson['draw'] + draw,
            localStorageToJson['lose'] + lose,
        );
    }
    
    function setValues(gameCount, win, draw, lose) {
        localStorageLucky9SetValue['gameCount'] = gameCount;
        localStorageLucky9SetValue['win'] = win;
        localStorageLucky9SetValue['draw'] = draw;
        localStorageLucky9SetValue['lose'] = lose;
    }

    localStorage.setItem("game_lucky9", JSON.stringify(localStorageLucky9SetValue));
}


function saveGameToServer() {
    var localStorageLucky9 = localStorage.getItem("game_lucky9");
    let localStorageScore = getLocalStorageScore();

    let totalGames = localStorageScore['totalGames'];
    let win = localStorageScore['win'];
    let draw = localStorageScore['draw'];
    let lose = localStorageScore['lose'];

    if(win > 0) {
        gameScoreSave(3, win);
        playAgain();
        alert('Game Saved');
    } else {
        return alert('nothing to save');
    }
    

    var localStorageLucky9SetValue = {
        'gameCount' : 0,
        'win' : 0,
        'draw' : 0,
        'lose' : 0
    };
    localStorage.setItem("game_lucky9", JSON.stringify(localStorageLucky9SetValue));
}

function getLocalStorageScore() {
    var localStorageLucky9 = localStorage.getItem("game_lucky9");
    let totalGames = 0;
    let win = 0;
    let lose = 0;
    let draw = 0;
    if(localStorageLucky9 != null) {
        localStorageLucky9Json = JSON.parse(localStorageLucky9);
        totalGames = localStorageLucky9Json['gameCount'];
        win = localStorageLucky9Json['win'];
        lose = localStorageLucky9Json['lose'];
        draw = localStorageLucky9Json['draw'];
    }

    return {
        totalGames : totalGames,
        win: win,
        lose : lose,
        draw : draw
    };
}

function displayScoreLocalStorage() {
    let localStorageScore = getLocalStorageScore();
    let totalGames = localStorageScore['totalGames'];
    let win = localStorageScore['win'];
    let draw = localStorageScore['draw'];
    let lose = localStorageScore['lose'];

    uiGameTotal.innerHTML = totalGames;
    uiGameWin.innerHTML = win;
    uiGameDraw.innerHTML = draw;
    uiGameLose.innerHTML = lose;
}

function applyScoreServer() {

}

function playAgain() {
    location.reload();
}
