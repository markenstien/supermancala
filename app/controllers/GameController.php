<?php
	use Services\GameScorerService;
	load(['GameScorerService'], SERVICES);

	class GameController extends Controller
	{
		public $gameScoreService, $userId;

		public function __construct()
		{
			parent::__construct();
			$this->gameScoreService = new GameScorerService();

			$this->userId = whoIs('id');
		}
		/**
		 *Mancalaboard 
		 */
		public function index() {
			// _requireAuth();

			return $this->catalog();
		}

		/**
		 * list games
		 */
		public function catalog() {
			$this->data['games'] = GAMES;

			return $this->view('game/catalog', $this->data);
		}

		public function show($id) {
			$game = $this->extractGameById($id);
			$this->data['game'] = $game;
			return $this->view('game/show', $this->data);
		}
		
		private function extractGameById($id) {
			$retVal = false;
			foreach(GAMES as $key => $row) {
				if($row['id'] == $id) {
					$retVal = $row;
					break;
				}
			}

			return $retVal;
		}
		public function play() {
			if(!whoIs()) {
				return redirect(_route('game:catalog'));
			}
			$req = request()->inputs();
			$game = $req['code'] ?? 'tetris';
			$gameId = $req['id'];
			$gameData = $this->extractGameById($req['id']);
			$data = [];

			$gameScoreDetails = [
				'lastPlayedScore' => $this->gameScoreService->getRecentScore($this->userId, $gameId),
				'highestScore' => $this->gameScoreService->getHighestScore($this->userId, $gameId),
				'leaderboards' => $this->gameScoreService->getGameLeaderBoard($this->userId, $gameId)
			];

			switch($game) {
				case 'tetris':
					/**
					 * create point per clear
					 */
					$gamePath = 'game/tetris';
				break;

				case 'horseracing':
					/**
					 * create point per clear
					 * add score board
					 */
					$gamePath = 'game/lucky9';
				break;


				case 'lucky9':
					/**
					 * create point per clear
					 * create computer player
					 */
					$gamePath = 'game/lucky9';
				break;

				case 'Mancala':
					/**
					 * create point per clear
					 * create computer player
					 */
					// $data['game'] = $game;	
					// $data['gameData'] = $gameData;
					// $data['gameScoreDetails'] = $gameScoreDetails;
					// $data['boardLength'] = 6;
					
					// return $this->view('game/mancala/game', $data);
				break;

				case 'hoops':
					/**
					 * create point per clear
					 * search new code
					 */
					$gamePath = 'game/hoops/game';
				break;

				case 'snake':
					/**
					 * create point per clear
					 * search project
					 */
					$gamePath = 'game/snake';
				break;
			}

			$data['game'] = $game;	
			$data['gameData'] = $gameData;
			$data['gameScoreDetails'] = $gameScoreDetails;
			
			return $this->view('game/play', $data);
		}

		public function playMancala() {
			return $this->view('game/mancala/game', [
				'boardLength' => 6
			]);
		}

		public function gameIndex() {
			$req = request()->inputs();
			$game = $req['game'] ?? 'tetris';

			switch($game) {
				case 'tetris':
					/**
					 * create point per clear
					 */
					return $this->view('game/tetris');
				break;

				case 'horseracing':
					/**
					 * create point per clear
					 * add score board
					 */
					return $this->view('game/tetris');
				break;


				case 'lucky9':
					/**
					 * create point per clear
					 * create computer player
					 */
					return $this->view('game/tetris');
				break;

				case 'hoops':
					/**
					 * create point per clear
					 * search new code
					 */
					return $this->view('game/tetris');
				break;

				case 'pool':
					/**
					 * create point per clear
					 * search project
					 */
					return $this->view('game/tetris');
				break;
			}
		}
	}