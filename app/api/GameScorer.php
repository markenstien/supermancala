<?php

    use Services\GameScorerService;
    load(['GameScorerService'], SERVICES);

    class GameScorer extends Controller
    {
        public $gameScorerService;
        public function __construct()
        {
            parent::__construct();
            $this->gameScorerService = new GameScorerService();
        }

        public function addScore() {
            $req = request()->inputs();

            if(!empty($req['game_id']) && !empty($req['score'])) {
                //insert
                // $userId = whoIs('id');
                $userId = 2;
                $gameId = $req['game_id'];
                $score = $req['score'];
                $this->gameScorerService->addScore($userId, $gameId, $score);
            }
        }

        private function authIsRequired() {

        }
    }