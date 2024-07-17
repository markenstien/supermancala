


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

let aiMove = false;
let cardDrawn = 1;
let winner = 0; //if 1 or 2 then there is a winner
let draw = false; //if 1 or 2 then there is a winner

let startGameButton = true;

let isGameEnded = false;

//keep score all time
let keepScore = {
    gamesTotal : 0,
    win : 0
};

let gameAddedLogic = {
    winner : '',
    p1Lucky9 : false,
    p2Lucky9 : false,
    cardDrawn : 0,
    scoreKeeping : {
        gamesTotal : 0,
        win : 0
    },
    gameStarting : false,
    gameEnded : false
};

var gameControlElement = document.getElementById('gameControl');

// 4. create a function that generate Random numbers || application for more than 1 variable 
function getRandomCard() {
    let randomNumber = Math.floor( Math.random()*13 ) + 1
    if (randomNumber > 10) {
        return randomNumber 
    } else {
        return randomNumber
    }

}

function startGameInit() {
    gameAddedLogic['gameStarting'] = true;
    gameAddedLogic['scoreKeeping']['gamesTotal']++;

    startGame();
    p2startGame();

    //to delete
    startGameButton = false;
    keepScore['gamesTotal']++;
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
    let totalCardDrawSum = 0;
    if(sumCards > 9) {
        while(sumCards > 9) {
            sumCards -= 10;
        }
    }
    // 7. creating summation so that all the sum will be written accordingly
    sumEl.textContent = "Sum: " + sumCards
    // 8. creates conditional statements for Lucky 9 
    if (sumCards === 9) {
        gameAddedLogic['p1Lucky9'] = true;
        messageEl.textContent = "You got Lucky 9!";
        hasLucky9 = true
    } {
        messageEl.textContent = "Want to draw 'New Card' ?";
    }

    checkGameWinner();
    checkGameWinnerUI();
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
        cardDrawn++;
        renderGame();

        bothAdvantage();

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
let p2hasLucky9 = false;
let p2sumCards = 0

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
        gameAddedLogic['p2Lucky9'] = true;
        p2messageEl.textContent = "You got Lucky 9!";
        p2hasLucky9 = true
    } else {
        p2messageEl.textContent = "Want to draw 'New Card' ?";
    }
    checkGameWinner();
    checkGameWinnerUI();
}

function p2newCard() { 
    if (psIsAlive === true) {
        let p2newCard = p2getRandomCard()
        p2sumCards += p2newCard
        p2cards.push(p2newCard)
        p2renderGame();
        p2hasLucky9 = false
        psIsAlive = false
    }
}

function bothAdvantage() {
    //if less than the card only
    if(p2sumCards < 5) {
        if(sumCards > 6) {
            p2newCard();
        }
    }
}


function cleanUp() {
    if(p2sumCards === 9) {
        winner = 2;
    }

    if(sumCards === 9) {
        winner = 1;
    }

    //get winner base on number
    if(cardDrawn == 2) {
        if(sumCards == p2sumCards) {
            draw = true;
        } else if(sumCards > p2sumCards) {
            winner = 1;
        } else {
            winner = 2;
        }
    }

    if(winner > 0 || draw == true) {
        isGameEnded = true;
    }
    cleanUpLogic();
}


function cleanUpLogic (){
    
    //score
    //
    startGameButton = true;
    if(winner == 1) {
        keepScore['win']++;
    }
    //reset
    sumCards = 0;
    p2sumCards = 0;
    isAlive = true;
    psIsAlive = true;
    cardDrawn = 1;
    winner = 0;

    console.log(keepScore);

    cleanUpUI();
}


function cleanUpUI () {
    document.getElementById('gamesTotal').innerHTML = keepScore['gamesTotal'];
    document.getElementById('winsTotal').innerHTML = keepScore['win'];
    // document.getElementById('message-el').innerHTML = 'Want to play a round?';
    // document.getElementById('cards-el').innerHTML = 'Your Cards:';
    // document.getElementById('sum-el').innerHTML = 'Sum:';

    // document.getElementById('p2message-el').innerHTML = 'Want to play a round?';
    // document.getElementById('p2cards-el').innerHTML = 'Your Cards:';
    // document.getElementById('p2sum-el').innerHTML = 'Sum:';

    if(isGameEnded) {
        document.getElementById('gameControl').innerHTML = isGameEnded ? asForNewGame() : gamePlaying();
    }
}

function asForNewGame() {
    let message = '';
    if(winner === 1) {
        message = 'You Won!';
    } else if(winner === 2) {
        message = 'You lose!';
    }

    isGameEnded = false;
    return `
        ${message} ${winner}
        <div> <button onClick = 'startGameInit()'>Play Again</button> </div>
    `;
}


function GameAddedLogic () {

    this.gamePlayingAndControlUI = document.getElementById('gameControl');

    this.gamePlayingUI = function() {
        let message = 'You Lose';
        if((gameAddedLogic['gameEnded'] == false) && gameAddedLogic['gameStarting']) {
            if(gameAddedLogic['winner'] == 'player1') {
                message = 'You Win';
            }
            this.gamePlayingAndControlUI.innerHTML = `
                <h3> ${message} </h3>
                <div> <button onClick = 'startGameInit()'>Play Again</button> </div>
            `;
        }
    }

    this.gameControlUI = function () {
        if(gameAddedLogic['gameEnded']) {
            this.gamePlayingAndControlUI.innerHTML = `
                <button style="" onclick="startGameInit()">Start Game</button>
                <button style="" onclick="startGameInit()">Save Game</button>
            `;
        }
    }

    this.gameCheckWinner = function() {
        //has a winner
        if((gameAddedLogic['cardDrawn'] == 1) || gameAddedLogic['p1Lucky9'] || gameAddedLogic['p2Lucky9']) {
            if(gameAddedLogic['p1Lucky9']) {
                //p1 lucky9
                if(gameAddedLogic['p2Lucky9']) {
                    //draw
                }
            } else if(gameAddedLogic['p2Lucky9']) {
                 //p1 lucky9
                 if(gameAddedLogic['p1Lucky9']) {
                    //draw
                }
            } else {
                //winner
                if(sumCards > p2sumCards) {
                    gameAddedLogic['winner'] = 'player1';
                } else if(p2sumCards > sumCards) {
                    gameAddedLogic['winner'] = 'player2';
                }
            }

            gameAddedLogic['gameEnded'] = true;
        }
    }

    this.gameReset = function() {

    }
}


function checkGameWinnerUI() {
    if(gameAddedLogic['gameStarting'] && gameAddedLogic['winner'] == '') {
        gameControlElement.innerHTML = gameStarting();
    }else if(gameAddedLogic['gameStarting'] == false) {
        gameControlElement.innerHTML = gameOnHold();
    }else if(gameAddedLogic['winner'] != '') {
        gameControlElement.innerHTML = gameWinner(gameAddedLogic['winner']);
    }

    function gameStarting() {
        return `<h3>Game Playing..</h3> `;
    }

    function gameOnHold() {
        return `
            <button style="" onclick="startGameInit()">Start Game</button>
            <button style="" onclick="startGameInit()">Save Game</button>
        `;
    }

    function gameWinner(winner) {
        let message;
        if(winner == 'player1') {
            message = 'You Won!';
        } else {
            message = 'You Lose';
        }
        return `
            <h3> ${message} </h3>
            <div> <button onClick = 'startGameInit()'>Play Again</button> </div>
        `;
    }
}
function checkGameWinner() {
    if((gameAddedLogic['cardDrawn'] == 1) || gameAddedLogic['p1Lucky9'] || gameAddedLogic['p2Lucky9']) {
        console.log('gamewinner');
        if(gameAddedLogic['p1Lucky9']) {
            //p1 lucky9
            if(gameAddedLogic['p2Lucky9']) {
                //draw
            }

            gameAddedLogic['winner'] = 'player1';
        } else if(gameAddedLogic['p2Lucky9']) {
             //p1 lucky9
             if(gameAddedLogic['p1Lucky9']) {
                //draw
            }
            gameAddedLogic['winner'] = 'player2';
        } else {
            //winner
            if(sumCards > p2sumCards) {
                gameAddedLogic['winner'] = 'player1';
            } else if(p2sumCards > sumCards) {
                gameAddedLogic['winner'] = 'player2';
            }
        }

        gameAddedLogic['gameEnded'] = true;
    }
}

