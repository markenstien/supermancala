<?php 

	class GameController extends Controller
	{
		/**
		 *Mancalaboard 
		 */
		public function index() {
			_requireAuth();
			$this->data['boardLength'] = 6;
			return $this->view('game/index', $this->data);
		}
	}