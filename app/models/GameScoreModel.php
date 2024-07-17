<?php 

    class GameScoreModel extends Model
    {
        public $table = 'game_scores';

        public function addScore($userId, $gameId, $score) {
            $today = nowMilitary();
            return parent::store([
                'user_id' => $userId,
                'game_id' => $gameId,
                'game_score'   => $score,
                'last_played_dt' => $today
            ]);
        }

        public function getHighest($userId, $gameId) {
            return parent::single([
                'user_id' => $userId,
                'game_id' => $gameId
            ], '*', 'game_score desc');
        }

        public function getRecent($userId, $gameId) {
            return parent::single([
                'user_id' => $userId,
                'game_id' => $gameId
            ], '*', 'id desc');
        }
    }