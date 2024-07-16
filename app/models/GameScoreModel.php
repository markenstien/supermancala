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
    }