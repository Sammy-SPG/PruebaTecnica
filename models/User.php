<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class user extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }

    public function getName()
    {
        return $this->USERNAME;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
       throw new \yii\base\NotSupportedException();
    }

    public function getId()
    {
        return $this->ID;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUserName($username)
    {
        return self::findOne(['USERNAME' => $username]);
    }

    public function validatePassword($password)
    {
        return $this->PASSWORD === $password;
    }
}