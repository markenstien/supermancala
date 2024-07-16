<?php

    class GameTotalScoreModel extends Model
    {
        public $table = 'game_total_scores';
        public function addNew($userId, $gameId, $score) {
            $today = nowMilitary();
            $prevScore = 0;

            $previousGame = parent::single([
                'user_id' => $userId,
                'game_id' => $gameId
            ]);

            if($previousGame) {
                return parent::update([
                    'game_score_total' => $previousGame->game_score_total + $score,
                    'last_played_dt' => $today,
                    'game_count'   => $previousGame->game_count + 1
                ], $previousGame->id);
            } else {
                return parent::store([
                    'user_id' => $userId,
                    'game_id' => $gameId,
                    'game_score_total' => $score,
                    'last_played_dt' => $today,
                    'game_count'   => 1
                ]);
            }
        }
    }