<?php
App::uses('AppController', 'Controller');
/**
 * Wallets Controller
 *
 * @property Wallet $Wallet
 * @property PaginatorComponent $Paginator
 */
class WalletsController extends AppController {
public function beforeFilter(){
    parent::beforeFilter();
    $this->set('active','wallet');
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
        $this->Wallet->recursive = 0;
        $conditions = array('Wallet.user_id' => $this->Auth->user('id'));
        $this->Paginator->settings = array(
            'conditions' => $conditions,
        );
        $this->set('wallets', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Wallet->exists($id)) {
            throw new NotFoundException(__('Invalid wallet'));
        }
        $options = array('conditions' => array('Wallet.' . $this->Wallet->primaryKey => $id));
        $this->set('wallet', $this->Wallet->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Wallet->create();
            $this->request->data['Wallet']['user_id'] = $this->Auth->user('id');
            $this->request->data['Wallet']['income'] = 0;
            $this->request->data['Wallet']['expense'] = 0;
            if ($this->Wallet->save($this->request->data)) {
                if ($this->request->data['Wallet']['current'] == true) {
                    $this->Wallet->updateAll(
                        array('Wallet.current' => 0),
                        array('Wallet.id !=' => $this->Wallet->id, 'Wallet.user_id' => $id)
                    );
                }
                $this->Flash->success(__('The wallet has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The wallet could not be saved. Please, try again.'));
            }
        }
        $users = $this->Wallet->User->find('list');
        $this->set(compact('users'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Wallet->exists($id)) {
            throw new NotFoundException(__('Invalid wallet'));
        }
        $this->request->data['Wallet']['user_id'] = $this->Auth->user('id');
        if ($this->request->is(array('post', 'put'))) {
            $user_id = $this->request->data['Wallet']['user_id'];
            if ($this->Wallet->save($this->request->data)) {
                if ($this->request->data['Wallet']['current']==true) {
                    $this->Wallet->updateAll(
                        array('Wallet.current' => 0),
                        array('Wallet.id !=' => $this->Wallet->id, 'Wallet.user_id' => $user_id)
                    );
                }
                $this->Flash->success(__('The wallet has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The wallet could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Wallet.' . $this->Wallet->primaryKey => $id));
            $this->request->data = $this->Wallet->find('first', $options);
        }
        $users = $this->Wallet->User->find('list');
        $this->set(compact('users'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Wallet->id = $id;
        if (!$this->Wallet->exists()) {
            throw new NotFoundException(__('Invalid wallet'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Wallet->delete()) {
            $this->Flash->success(__('The wallet has been deleted.'));
        } else {
            $this->Flash->error(__('The wallet could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
