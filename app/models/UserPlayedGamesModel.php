<?php

    class UserPlayedGamesModel extends Model
    {
        public $table = 'user_played_games';

        public function addNew($userId, $gameId) {
            $today = nowMilitary();
            $lastPlayedGame = parent::single([
                'user_id' => $userId,
                'game_id' => $gameId
            ]);

            if($lastPlayedGame) {
                return parent::update([
                    'played_count' => $lastPlayedGame->played_count + 1,
                    'last_played_dt' => $today
                ], $lastPlayedGame->id);
            } else {
                return parent::store([
                    'user_id' => $userId,
                    'game_id' => $gameId,
                    'played_count' => 1,
                    'last_played_dt' => $today
                ]);
            }
        }
    }