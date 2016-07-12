<?php
App::uses('AppController', 'Controller');
/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 */
class TransactionsController extends AppController {
    public $thu = false;
    public $chi = true;
public function beforeFilter(){
    parent::beforeFilter();
    $this->set('active','transaction');
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
        $this->Transaction->recursive = 0;
        $conditions = [];
        if ($this->request->query) {
            $search_name  = $this->request->query['name'];
            $search_year  = $this->request->query['time']['year'];
            $search_month = $this->request->query['time']['month'];
            $search_day   = $this->request->query['time']['day'];
            if ($search_name) {
                $conditions['Transaction.name LIKE']     = '%'.$search_name.'%';
            }
            if ($search_year) {
                $conditions['YEAR(Transaction.created)']  = $search_year;
            }
            if ($search_month) {
                $conditions['MONTH(Transaction.created)'] = $search_month;
            }
            if ($search_day) {
                $conditions['DAY(Transaction.created)']   = $search_day;
            }
        }
        $conditions['Wallet.user_id'] = $this->Auth->user('id');
        $conditions['Wallet.current'] = true;
        $this->Paginator->settings = array(
            'conditions' => $conditions,
        );
        $this->set('transactions', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transaction->exists($id)) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		$options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
		$this->set('transaction', $this->Transaction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
    public function add($id = null) {
        if ($this->request->is('post')) {
            $this->Transaction->create();
            if ($this->Transaction->save($this->request->data)) {
                //add expense-income new wallet
                $this->loadmodel('Category');
                $this->Category->recursive = -1;
                $cat = $this->Category->findById($this->request->data['Transaction']['category_id']);
                $data = array(
                    'wallet_id' => $this->request->data['Transaction']['wallet_id'],
                    'money'     => $this->request->data['Transaction']['money'],
                    'type'      => $cat['Category']['type'],
                    );
                $this->expenseincome($data);

                $this->Flash->success(__('The transaction has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
            }
        }
        $cond = array('conditions' => array('Wallet.user_id' => $this->Auth->user('id')));
        $wallets = $this->Transaction->Wallet->find('list', $cond);
        $categories = $this->Transaction->Category->find('list');
        $this->set(compact('wallets', 'categories'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Transaction->exists($id)) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $trans = $this->Transaction->findById($id);

            if ($this->Transaction->save($this->request->data)) {
                //subtract expense-income in old-wallet
                $data = array(
                    'wallet_id' => $trans['Transaction']['wallet_id'],
                    'money'     => -$trans['Transaction']['money'],
                    'type'      => $trans['Category']['type'],
                    );
                $this->expenseincome($data);
                
                //add expense-income in new-wallet
                $this->loadmodel('Category');
                $this->Category->recursive = -1;
                $cat = $this->Category->findById($this->request->data['Transaction']['category_id']);
                $data = array(
                    'wallet_id' => $this->request->data['Transaction']['wallet_id'],
                    'money'     => $this->request->data['Transaction']['money'],
                    'type'      => $cat['Category']['type'],
                    );
                $this->expenseincome($data);

                $this->Flash->success(__('The transaction has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
            $this->request->data = $this->Transaction->find('first', $options);
        }
        $cond = array('conditions' => array('Wallet.user_id' => $this->Auth->user('id')));
        $wallets = $this->Transaction->Wallet->find('list', $cond);
        $categories = $this->Transaction->Category->find('list');
        $this->set(compact('wallets', 'categories'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Transaction->id = $id;
        if (!$this->Transaction->exists()) {
            throw new NotFoundException(__('Invalid transaction'));
        }
        $this->request->allowMethod('post', 'delete');
            $trans = $this->Transaction->findById($id);
            $data = array(
                        'wallet_id' => $trans['Transaction']['wallet_id'],
                        'money'     => -$trans['Transaction']['money'],
                        'type'      => $trans['Category']['type'],
                        );
        if ($this->Transaction->delete()) {
            $this->expenseincome($data);
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

//change expense-income
    public function expenseincome($data){
        $this->loadmodel('Wallet');
        $this->Wallet->id = $data['wallet_id'];
        if ($data['type'] == $this->chi) {
            $this->Wallet->updateAll(
                array('Wallet.expense' => 'Wallet.expense + ' . $data['money']),                    
                array('Wallet.id' => $data['wallet_id'])
            );
        }
        if ($data['type'] == $this->thu) {
            $this->Wallet->updateAll(
                array('Wallet.income' => 'Wallet.income + ' . $data['money']),                    
                array('Wallet.id' => $data['wallet_id'])
            );
        }
    }
}
