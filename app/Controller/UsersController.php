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
	$this->Auth->allow('login', 'verify', 'add'); // Letting users register themselves
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
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
	        $hash = sha1($this->request->data['User']['username'] . rand(0, 100));
	        $this->request->data['User']['verifiecation_code'] = $hash;
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
					$email->subject('Email tu app moneylover');        
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
				if ($this->Auth->user('verified') == 0) {
			        // User has not confirmed account
			        $this->Flash->error(__('Your account has not been activated. Please check your email.'));
                    $this->redirect(array('controller'=>'users','action' => 'login'));
			    } elseif ($this->Auth->user('verified') == 1) {
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
	        if ($results['User']['verified']==0){
	            //check the token
	            if ($results['User']['verifiecation_code']==$tokenhash){
	                $results['User']['verified']=1;
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
}
