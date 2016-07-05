<?php
App::uses('AppModel', 'Model');
/**
 * Wallet Model
 *
 * @property User $User
 * @property Transaction $Transaction
 */
class Wallet extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notBlank' => array(
				"rule"    =>array("checkUnique", array("name", "user_id")),
				'message' => 'The name has already been taken',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'current' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className'  => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Transaction' => array(
			'className'    => 'Transaction',
			'foreignKey'   => 'wallet_id',
			'dependent'    => false,
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => ''
		)
	);

	function checkUnique($data, $fields) {
        if (!is_array($fields)) { 
            $fields = array($fields); 
        } foreach ($fields as $key) { 
            $tmp[$key] = $this->data[$this->name][$key]; 
        } if (isset($this->data[$this->name][$this->primaryKey])) {
            $tmp[$this->primaryKey] = "<>".$this->data[$this->name][$this->primaryKey]; 
        }
        return $this->isUnique($tmp, false); 
    }

}
