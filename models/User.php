<?php

namespace app\models;

use DateTime;
use Yii;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property int $gender
 * @property string $date
 * @property string $email
 */
class User extends ActiveRecord {

    const GENDER_FEMALE = 'female';
    const GENDER_MALE = 'male';
    const GENDER_UNKNOWN = 'unknown';

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['login', 'password', 'first_name', 'last_name', 'gender', 'email'], 'required'],
            [['login'], 'string', 'min' => 4, 'max' => 20],
            [['password'], 'string', 'min' => 6, 'max' => 20],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 30],
            [['gender'], 'string', 'max' => 15],
            [['date'], 'safe'],
            [['login', 'password'], 'string', 'max' => 20],
            [['login'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'date' => 'Date',
            'email' => 'Email',
        ];
    }

    public function beforeSave($insert)
    {

        parent::beforeSave($insert);

        if ($this->isNewRecord) {
            $this->date = Yii::$app->formatter->asDate(new DateTime(), 'yyyy-MM-dd HH:mm:ss');
            $this->first_name = self::ucfirst($this->first_name, $e = 'utf-8');
            $this->last_name = self::ucfirst($this->last_name, $e = 'utf-8');
        }
        return true;
    }

    public static function ucfirst($string, $e = 'utf-8')
    {
        if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string)) {
            $string = mb_strtolower($string, $e);
            $upper = mb_strtoupper($string, $e);
            preg_match('#(.)#us', $upper, $matches);
            $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e);
        } else {
            $string = ucfirst($string);
        }
        return $string;
    }

    public static function listGenders()
    {
        return [
            self::GENDER_UNKNOWN => Yii::t('app', 'No Information'),
            self::GENDER_FEMALE => Yii::t('app', 'Female'),
            self::GENDER_MALE => Yii::t('app', 'Male'),
        ];
    }

    public function getUserAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }

    public function beforeDelete()
    {

        $addresses = $this->userAddresses;
        foreach ($addresses as $address) {
            $address->delete();
        }
        // call the parent implementation so that this event is raise properly
        return parent::beforeDelete();
    }

}
