<?php
App::uses('AppController', 'Controller');
/**
 * Transactions Controller
 *
 * @property Transaction $Transaction
 * @property PaginatorComponent $Paginator
 */
class TransactionsController extends AppController {
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
        $this->Paginator->settings = array(
            'conditions' => $conditions,
        );
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
            // $this->request->data['Transaction']['wallet_id'] = $id;
            if ($this->Transaction->save($this->request->data)) {

                $this->Transaction->virtualFields['total'] = 'SUM(Transaction.money)';
                $conditions = array('Category.type' => true, 'Transaction.wallet_id' => $this->request->data['Transaction']['wallet_id']);
                $total      = $this->Transaction->find('all', array(
                    'fields'     => array('total'),
                    'conditions' => $conditions,
                    ));
                if ($total[0]['Transaction']['total']==null) {
                    $total[0]['Transaction']['total']=0;
                }
                $expense = $total[0]['Transaction']['total'];

                $conditions = array('Category.type' => false, 'Transaction.wallet_id' => $this->request->data['Transaction']['wallet_id']);
                $total      = $this->Transaction->find('all', array(
                    'fields'     => array('total'),
                    'conditions' => $conditions,
                    ));
                if ($total[0]['Transaction']['total'] == null) {
                    $total[0]['Transaction']['total'] = 0;
                }
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
            if ($this->Transaction->save($this->request->data)) {

                $this->Transaction->virtualFields['total'] = 'SUM(Transaction.money)';

                $conditions = array('Category.type' => true, 'Transaction.wallet_id' => $this->request->data['Transaction']['wallet_id']);
                $total = $this->Transaction->find('all', array(
                    'fields'     => array('total'),
                    'conditions' => $conditions,
                    ));
                if ($total[0]['Transaction']['total'] == null) {
                    $total[0]['Transaction']['total'] = 0;
                }
                $expense = $total[0]['Transaction']['total'];

                $conditions = array('Category.type' => false, 'Transaction.wallet_id' => $this->request->data['Transaction']['wallet_id']);
                $total      = $this->Transaction->find('all', array(
                    'fields'     => array('total'),
                    'conditions' => $conditions,
                    ));
                if ($total[0]['Transaction']['total'] == null) {
                    $total[0]['Transaction']['total'] = 0;
                }
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
        if ($this->Transaction->delete()) {
            $this->Flash->success(__('The transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
