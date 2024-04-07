<?php 
	load(['UserForm'] , APPROOT.DS.'form');
	use Form\UserForm;
	class UserController extends Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->model = model('UserModel');
			
			$this->data['page_title'] = ' Users ';
			$this->data['form'] = new UserForm();
		}

		public function index()
		{
			_requireAuth();
			$params = request()->inputs();

			if(!empty($params))
			{
				$this->data['users'] = $this->model->getAll([
					'where' => $params
				]);
			}else{
				$this->data['users'] = $this->model->getAll( );
			}
			

			return $this->view('user/index' , $this->data);
		}

		public function create()
		{
			_requireAuth();
			if(isSubmitted()) {
				$post = request()->posts();
				$user_id = $this->model->create($post , 'profile');
				if(!$user_id){
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				Flash::set('User Record Created');
				if( isEqual($post['user_type'] , 'patient') )
				{
					Flash::set('Patient Record Created');
					return redirect(_route('patient-record:create' , null , ['user_id' => $user_id]));
				}

				return redirect( _route('user:show' , $user_id , ['user_id' => $user_id]) );
			}
			$this->data['user_form'] = new UserForm('userForm');

			return $this->view('user/create' , $this->data);
		}

		public function edit($id)
		{
			_requireAuth();
			if(isSubmitted()) {
				$post = request()->posts();

				$res = $this->model->update($post , $post['id']);

				if($res) {
					Flash::set( $this->model->getMessageString());
					return redirect( _route('user:edit' , $id) );
				}else
				{
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}
			}

			$user = $this->model->get($id);

			$this->data['id'] = $id;
			$this->data['form']->init([
				'url' => _route('user:edit',$id)
			]);

			$this->data['form']->setValueObject($user);
			$this->data['form']->addId($id);
			$this->data['form']->remove('submit');
			$this->data['form']->remove('user_type');

			$this->data['form']->add([
				'name' => 'password',
				'type' => 'password',
				'class' => 'form-control',
				'options' => [
					'label' => 'Password'
				]
			]);

			if(!isEqual(whoIs('user_type'), 'admin'))
				$this->data['form']->remove('user_type');

			return $this->view('user/edit' , $this->data);
		}

		public function show($id)
		{
			return $this->edit($id);
			
			_requireAuth();
			$user = $this->model->get($id);
			return $this->view('user/show' , $this->data);
		}

		public function profile() {
			$this->show(whoIs('id'));
		}

		public function sendCredential($id)
		{
			$this->model->sendCredential($id);
			Flash::set("Credentials has been set to the user");
			return request()->return();
		}
	}