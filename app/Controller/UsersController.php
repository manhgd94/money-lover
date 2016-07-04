<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('login', 'verify', 'add', 'forgetpwd', 'reset'); // Letting users register themselves
}
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$filename = $_SERVER['DOCUMENT_ROOT']."/cakephp/money-lover/app/webroot/img/".$this->data['User']['avatar']['name'];
	        $hash = sha1($this->request->data['User']['username'] . rand(0, 100));
	        $this->request->data['User']['tokenhash'] = $hash;
			$this->User->create();
			if (move_uploaded_file($this->data['User']['avatar']['tmp_name'],$filename)) {
				$this->request->data['User']['avatar'] = $this->data['User']['avatar']['name'];
				if ($this->User->save($this->request->data)) {
					App::uses('CakeEmail', 'Network/Email');
            		$ms = 'http://localhost/cakephp/money-lover/users/verify/t:' . $hash . '/n:' . $this->data['User']['username'] . '';
					$email = new CakeEmail('smtp');
					$email->template('clientsreport', 'clientsreport');
					$email->emailFormat('html');
					$email->viewVars(array('message' => $ms,
							'name'=>$this->request->data['User']['name'],
							'username'=>$this->request->data['User']['username'],
							'email'=>$this->request->data['User']['email']
						));
					$email->from(array('manhgd94@gmail.com' => 'Money lover'));
					$email->to($this->request->data['User']['email']);
					$email->subject(' successfully created an Money lover account');        
					$email->send();
					$this->Flash->success(__('The user has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The user could not be saved. Please, try again.'));
				}
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$filename = $_SERVER['DOCUMENT_ROOT']."/cakephp/money-lover/app/webroot/img/".$this->data['User']['avatar']['name'];
			if (move_uploaded_file($this->data['User']['avatar']['tmp_name'],$filename)) {
				$this->request->data['User']['avatar'] = $this->data['User']['avatar']['name'];
				if ($this->User->save($this->request->data)) {
					$this->Flash->success(__('The user has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The user could not be saved. Please, try again.'));
				}
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
//login-logout
	public function login() {
		if ($this->request->is('post') && !empty($this->request->data)) {
			if ($this->Auth->login()) {
				if ($this->Auth->user('active') == 0) {
			        // User has not confirmed account
			        $this->Flash->error(__('Your account has not been activated. Please check your email.'));
                    $this->redirect(array('controller'=>'users','action' => 'login'));
			    } elseif ($this->Auth->user('active') == 1) {
			        // User is active
			        $this->redirect(array('controller'=>'users','action' => 'index'));
			    }
			} else {
				$this->logout();
			}
		}
	}
	public function logout() {
		if ($this->Auth->logout()) {
			$this->redirect(array('controller'=>'users','action' => 'login'));
		}
	}

//veriry account
	public function verify(){
	    //check if the token is valid
	    if (!empty($this->passedArgs['n']) && !empty($this->passedArgs['t'])){
	        $name = $this->passedArgs['n'];
	        $tokenhash = $this->passedArgs['t'];
	        $results = $this->User->findByUsername($name);
	        if ($results['User']['active']==0){
	            //check the token
	            if ($results['User']['tokenhash']==$tokenhash){
	                $results['User']['active']=1;
	                //Save the data
	                $this->User->save($results);
	                $this->Flash->success(__('Your registration is complete'));
	                $this->redirect('/users/login');
	                exit;
	            } else {
	                $this->Flash->error(__('Your registration failed please try again'));
	                $this->redirect('/users/login');
	            }
	        } else {
	            $this->Flash->error(__('Token has alredy been used'));
	            $this->redirect('/users/login');
	        }
	    } else {
	        $this->Flash->error(__('Token corrupted. Please re-register'));
	        $this->redirect('/users/login');
	    }
	}
//forgot password
	function forgetpwd(){
		//$this->layout="signup";
		$this->User->recursive=-1;
		if(!empty($this->data))
		{
			if(empty($this->data['User']['email']))
			{
				$this->Flash->error(__('Please Provide Your Email Adress that You used to Register with Us'));
			}
			else
			{
				$email=$this->data['User']['email'];
				$fu=$this->User->find('first',array('conditions'=>array('User.email'=>$email)));
				if($fu)
				{
					//debug($fu);
					if($fu['User']['active'])
					{
						$key = Security::hash(CakeText::uuid(),'sha512',true);
						$hash=sha1($fu['User']['username'].rand(0,100));
						$url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
						$ms=$url;
						$ms=wordwrap($ms,1000);
						//debug($url);
						$fu['User']['tokenhash']=$key;
						$this->User->id=$fu['User']['id'];
						if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){

							//============Email================//
							App::uses('CakeEmail', 'Network/Email');
		            		$email = new CakeEmail('smtp');
							$email->template('resetpw');
							$email->emailFormat('html');
							$email->viewVars(array('ms' => $ms,
									'name'=>$fu['User']['name'],
									'username'=>$fu['User']['username'],
									'email'=>$fu['User']['email']
								));
							$email->from(array('manhgd94@gmail.com' => 'Money lover'));
							$email->to($fu['User']['email']);
							$email->subject('Reset Password Money lover');        
							$email->send();
							//============EndEmail=============//
							$this->Flash->success(__('Check Your Email To Reset your password', true));
							$this->redirect('/users/login');
						}
						else{
							$this->Flash->error(__("Error Generating Reset link"));
						}
					}
					else
					{
						$this->Flash->error(__('This Account is not Active yet.Check Your mail to activate it'));
					}
				}
				else
				{
					$this->Flash->error(__('Email does Not Exist'));
				}
			}
		}
	}

	function reset($token=null){
		//$this->layout="Login";
		$this->User->recursive=-1;
		if(!empty($token)){
			$u=$this->User->findBytokenhash($token);
			if($u){
				$this->User->id=$u['User']['id'];
				if(!empty($this->data)){
					$this->User->data=$this->data;
					$this->User->data['User']['username']=$u['User']['username'];
					$new_hash=sha1($u['User']['username'].rand(0,100));//created token
					$this->User->data['User']['tokenhash']=$new_hash;
					if($this->User->validates(array('fieldList'=>array('password','password_confirm')))){
						if($this->User->save($this->User->data))
						{
							$this->Flash->success(__('Password Has been Updated'));
							$this->redirect(array('controller'=>'users','action'=>'login'));
						}

					}
					else{

						$this->set('errors',$this->User->invalidFields());
					}
				}
			}
			else
			{
				$this->Flash->error(__('Token Corrupted. Please Retry the reset link work only for once.'));
			}
		}

		else{
			$this->redirect('/');
		}
	}
}
