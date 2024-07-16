<?php 
    namespace Services;

    class GameScorerService {

        public $gameScoreModel,
        $gameTotalScoreModel,
        $userPlayedGamesModel;

        public function __construct()
        {
            $this->gameScoreModel = model('GameScoreModel');
            $this->gameTotalScoreModel = model('GameTotalScoreModel');
            $this->userPlayedGamesModel = model('UserPlayedGamesModel');
        }

        public function addScore($userId, $gameId, $score) {
            $gameScoreResp = $this->gameScoreModel->addScore($userId, $gameId, $score);

            if($gameScoreResp) {
                //add total score
                $this->gameTotalScoreModel->addNew($userId, $gameId, $score);
                $this->userPlayedGamesModel->add($userId, $gameId);
            }
        }
    }