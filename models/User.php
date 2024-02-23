<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $role
 * @property string $first_name
 * @property string $last_name
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role', 'first_name', 'last_name'], 'required'],
            [['username', 'password', 'role', 'first_name', 'last_name'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }


    /**
     * Trouve une identité à partir de l'identifiant donné.
     *
     * @param string|int $id l'identifiant à rechercher
     * @return IdentityInterface|null l'objet identité qui correspond à l'identifiant donné
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @return int|string l'identifiant de l'utilisateur courant
     */
    public function getId()
    {
        return $this->id;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }


    public function validatePassword($password){
       return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Not needed for basic authentication
        return null;
    }

    public function getAuthKey()
    {
        // Not implemented for basic authentication
        return null;
    }

    public function validateAuthKey($authKey)
    {
        // Not needed for basic authentication
        return true;
    }
}
