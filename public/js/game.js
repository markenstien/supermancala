const GAMES = {
    horseracing : 1,
    tetris : 2,
    lucky9 : 3,
    mancala : 4,
    snake : 6,
    hoops : 5,
}
function gameScoreSave(gameId, score) {
    $.ajax({
        url : getURL('api/GameScorer/addScore'),
        data  : {
            game_id : gameId,
            score : score
        },
        success : function(response) {
            console.log(response);
        },

        error : function(response) {
            console.log(response);
        }
    });

    console.log('game score saved');
}