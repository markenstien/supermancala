<?php 

	class GameController extends Controller
	{
		/**
		 *Mancalaboard 
		 */
		public function index() {
			// _requireAuth();
			$this->data['boardLength'] = 6;
			return $this->view('game/index', $this->data);
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
			$req = request()->inputs();
			$game = $req['code'] ?? 'tetris';

			$gameData = $this->extractGameById($req['id']);
			
			$gamePath = '';
			$data = [];
			switch($game) {
				case 'tetris':
					/**
					 * create point per clear
					 */
					$gamePath = 'game/tetris/game';
				break;

				case 'horse racing':
					/**
					 * create point per clear
					 * add score board
					 */
					$gamePath = 'game/horsegame/game';
				break;


				case 'lucky9':
					/**
					 * create point per clear
					 * create computer player
					 */
					$gamePath = 'game/lucky9/game';
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
			return $this->view($gamePath, $data);
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