


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
    // 7. creating summation so that all the sum will be written accordingly
    sumEl.textContent = "Sum: " + sumCards

    // 8. creates conditional statements for Lucky 9 
    if (sumCards === 9 || sumCards === 19 || sumCards === 29) {
        messageEl.textContent = "You got Lucky 9!";
        hasLucky9 = true
    } else if (sumCards >= 10) {
        sumCards - 10;
        messageEl.textContent = "Want to draw 'New Card' ?";
    } else if (sumCards >= 20) {
        sumCards - 20;
        messageEl.textContent = "Want to draw 'New Card' ?";
    } else {
        messageEl.textContent = "Want to draw 'New Card' ?";
    }
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

    p2sumEl.textContent = "Sum: " + p2sumCards
    if (p2sumCards === 9 || p2sumCards === 19 || p2sumCards === 29) {
        p2messageEl.textContent = "You got Lucky 9!";
        p2hasLucky9 = true
    } else if (p2sumCards >= 10) {
        p2sumCards - 10;
        p2messageEl.textContent = "Want to draw 'New Card' ?";
    } else if (p2sumCards >= 20) {
        p2sumCards - 20;
        p2messageEl.textContent = "Want to draw 'New Card' ?";
    } else {
        p2messageEl.textContent = "Want to draw 'New Card' ?";
    }


}

function p2newCard() { 
    if (psIsAlive === true) {
        let p2newCard = p2getRandomCard()
        p2sumCards += p2newCard
        p2cards.push(p2newCard)
        p2renderGame()  
        if (p2hasLucky9 === false) { 
            p2messageEl.textContent = "Try Again";
        }
        p2hasLucky9 = false
        psIsAlive = false
    }
   
}

