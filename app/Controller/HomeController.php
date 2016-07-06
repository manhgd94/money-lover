<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController {
    public function beforeFilter(){
        parent::beforeFilter();
        $this->set('active','home');
    }

    public function index() {
        $this->loadmodel('Wallet');
        $userlogin  = $this->Auth->user('id');
        $conditions = array('user_id' => $userlogin);
        $this->Wallet->recursive = -1;
        $wallets = $this->Wallet->find('all', array(
            'conditions' => $conditions,
            ));

        $this->loadmodel('Transaction');
        $conditions = array('Wallet.user_id' => $userlogin);
        $trans      = $this->Transaction->find('all', array(
            'conditions' => $conditions,
            ));

        $this->set('transactions', $trans);
        $this->set('wallets', $wallets);
    }
}
