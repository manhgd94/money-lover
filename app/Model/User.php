<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Wallet $Wallet
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'username' => array(
            'alphaNumeric' => array(
                'rule'    => 'alphaNumeric',
                'message' => 'Only alphabets and numbers allowed',
                'last'    => false
            ),
            'minLength' => array(
                'rule'    => array('minLength', 8),
                'message' => 'Minimum length of 8 characters'
            ),
            'isUnique' => array(
                'rule'    => 'isUnique',
                'message' => 'The username has already been taken',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                // 'on'      => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'notBlank' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                'on'   => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'minLength' => array(
                'rule'    => array('minLength', 8),
                'message' => 'Minimum length of 8 characters'
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => 'isUnique',
                'message' => 'The email has already been taken',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'active' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                // 'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'tokenhash' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                // 'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Wallet' => array(
            'className'    => 'Wallet',
            'foreignKey'   => 'user_id',
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

    public function beforeValidate($options = array()) {
        parent::beforeValidate($options);
        if ($this->data['User']['password'] == "") {
            unset($this->data['User']['password']);
        }
        if ($this->data['User']['avatar'] == "") {
            unset($this->data['User']['avatar']);
        }
        
    }


    public function beforeSave($options = array()) {
        if (!empty($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        } 
        return true;
    }
}
