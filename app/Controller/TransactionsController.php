<?php
App::uses('AppController', 'Controller');
/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 */
class TransactionsController extends AppController {

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
			$this->request->data['Transaction']['wallet_id'] = $id;
			if ($this->Transaction->save($this->request->data)) {
				$this->Flash->success(__('The transaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The transaction could not be saved. Please, try again.'));
			}
		}
		// $wallets = $this->Transaction->Wallet->find('list');
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
			if ($this->Transaction->save($this->request->data)) {

				$this->Transaction->virtualFields['total'] = 'SUM(Transaction.money)';
				$conditions = array('Category.type'=>true, 'Transaction.wallet_id'=>$this->request->data['Transaction']['wallet_id']);
				$total = $this->Transaction->find('all', array(
					'fields' => array('total'),
					'conditions' => $conditions,
					));
				$expense = $total[0]['Transaction']['total'];

				$conditions = array('Category.type'=>false, 'Transaction.wallet_id'=>$this->request->data['Transaction']['wallet_id']);
				$total = $this->Transaction->find('all', array(
					'fields' => array('total'),
					'conditions' => $conditions,
					));
				$income = $total[0]['Transaction']['total'];
				$this->loadmodel('Wallet');
				$this->Wallet->id = $this->request->data['Transaction']['wallet_id'];
				$this->Wallet->saveField('expense', $expense);
				$this->Wallet->saveField('income', $income);

				$this->Flash->success(__('The transaction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The transaction could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transaction.' . $this->Transaction->primaryKey => $id));
			$this->request->data = $this->Transaction->find('first', $options);
		}
		$wallets = $this->Transaction->Wallet->find('list');
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
		if ($this->Transaction->delete()) {
			$this->Flash->success(__('The transaction has been deleted.'));
		} else {
			$this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
