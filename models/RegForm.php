<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int|null $admin
 */
class RegForm extends User
{  
    public $passwordConfirm;
    public $agree;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'login', 'email', 'password'], 'required'],
            ['name', 'match', 'pattern' => '/^[А-Яа-я\s\-]{5,}$/u' , 'message' => 'только кириллица' ],
            ['surname', 'match', 'pattern' => '/^[А-Яа-я\s\-]{5,}$/u' , 'message' => 'только кириллица' ],
            ['login', 'match', 'pattern' => '/^[a-zA-Z]{1,}$/u' , 'message' => 'только латиница' ],
            ['email', 'email', 'message' => 'не корректный емэил'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'пароли должны совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'подтвердите'],

            [['admin'], 'integer'],
            [['name', 'surname', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ИМЯ',
            'surname' => 'ФАМИЛИ',
            'login' => 'ЛОГИН',
            'email' => 'Email',
            'password' => 'ПАРОЛЬ',
            'passwordConfirm' =>'повторите пароль',
            'agree' => 'подтвердите личные данные',

        ];
    }
}
