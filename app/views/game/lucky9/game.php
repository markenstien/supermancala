
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky 9 Card Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>LUCKY 9 (CARD GAME)</h1>
        <div class="player1">
            <h2>PLAYER 1</h2>

            <p id="message-el">Want to play a round?</p>

            <p id="cards-el">Your Cards: </p>
            <p id="sum-el">Sum: </p>
            <div class="btn-container">
                <button onclick="startGame()">START GAME</button>
                <button onclick="newCard()">NEW CARD</button>
            </div>
            <p id="player-el"></p>
        </div>  
        <br>
        <div class="player2">
            <h2>PLAYER 2</h2>

            <p id="p2message-el">Want to play a round?</p>

            <p id="p2cards-el">Your Cards: </p>
            <p id="p2sum-el">Sum: </p>
            <div class="btn-container">
                <button onclick="p2startGame()">START GAME</button>
                <button onclick="p2newCard()">NEW CARD</button>
            </div>
            <p id="player2-el"></p>
        </div>  
    </div>
    <footer>    
        <p style="text-align: center;">Project by: Albert John Celestino | May 04, 2024</p>
    </footer>
    <script src="scriptv2.js"></script>
</body>
</html>

