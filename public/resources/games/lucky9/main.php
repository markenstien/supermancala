
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

        <div style="margin-bottom: 50px;"></div>
        <div style="background-color: #fff; padding:30px; display:flex; flex-direction:row; margin-bottom:25px;">
            <div style="margin-right: 20px;">Games : <span id="gamesTotal"></span> </div> 
            <div style="margin-right: 20px;">Wins: <span id="winsTotal"></span> </div>
            <div style="margin-right: 20px;">Loses: <span id="loseTotal"></span> </div>
            <div style="margin-right: 20px;">Draws: <span id="drawsTotal"></span> </div>
            <div style="text-align: right;">
                <div><button style="" onclick="saveGameToServer(this)">Save Game</button></div>
            </div>
        </div>
        </div>
        <div style="display: flex; flex-direction:row">
            <div class="player1">
                <h2>YOU</h2>

                <p id="message-el">Want to play a round?</p>

                <p id="cards-el">Your Cards: </p>
                <p id="sum-el">Sum: </p>
                <div class="btn-container">
                    <button onclick="newCard()" class="listen-click">NEW CARD</button>
                </div>
                <p id="player-el"></p>
            </div> 
            
            <div class="player2">
                <h2>ENEMY</h2>

                <p id="p2message-el">Want to play a round?</p>

                <p id="p2cards-el">Your Cards: </p>
                <p id="p2sum-el">Sum: </p>
                <div class="btn-container">
                    <button>Bot playing..</button>
                </div>
                <p id="player2-el"></p>
            </div>  
        </div>

        <div style="background-color: #fff; padding:30px; margin-top: 25px" id="gameControl">
            <button style="" onclick="startGameInit()" class="listen-click">Start Game</button>
        </div>
    </div>
    <script src="../../../js/core.js"></script>
    <script src="../../../js/jquery.js"></script>
    <script src="../../../js/global.js"></script>
    <script src="../../../js/game.js"></script>
    <script src="script.js"></script>
</body>
</html>

