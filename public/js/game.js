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
}