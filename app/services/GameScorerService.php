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
                $this->userPlayedGamesModel->addNew($userId, $gameId);
            }
        }
        
        public function getGameLeaderBoard($userId, $gameId) {
            return $this->gameTotalScoreModel->getAll([
                'where' => [
                    'user_id' => $userId,
                    'game_id' => $gameId
                ]
            ]);
        }

        public function getHighestScore($userId, $gameId) {
            return $this->gameScoreModel->getHighest($userId, $gameId);
        }

        public function getRecentScore($userId, $gameId) {
            return $this->gameScoreModel->getRecent($userId, $gameId);
        }
    }