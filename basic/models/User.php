<?php

namespace app\models;
use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "tbl_user".
 *
 * @property string $userid
 * @property string $username
 * @property string $password
 */
class User extends \yii\db\ActiveRecord  implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password','authKey'], 'string', 'max' => 100]            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'username' => 'username',
            'password' => 'password',
            // 'authkey' => 'authKey',
        ];
    }    
    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS**/
        /**
     * @inheritdoc
     */
    public static function findIdentity($id){
        return static::findOne($id);
    }
 
    public static function findIdentityByAccessToken($token, $type = null){
        throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
    }
 
    public function getId(){
        return $this->id;
    }
 
    public function getAuthKey(){
        return $this->authKey;//Here I return a value of my authKey column
    }
 
    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
 
    public function validatePassword($password){
        return $this->password === $password;
    }

};