<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $postcode
 * @property string $country
 * @property string $city
 * @property string $street
 * @property int $house
 * @property int $apartment
 * @property int $user_id
 */
class Address extends \yii\db\ActiveRecord {

    public static function tableName()
    {
        return 'address';
    }

    public function rules()
    {
        return [
            [['postcode', 'country', 'city', 'street', 'house'], 'required'],
            [['house', 'apartment', 'user_id'], 'integer'],
            [['postcode'], 'number'],
            [['postcode'], 'string', 'max' => 20],
            [['country'], 'string', 'max' => 2],
            [['city', 'street'], 'string', 'max' => 30],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'postcode' => 'Postcode',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'apartment' => 'Apartment',
            'user_id' => 'User ID',
        ];
    }

    public function beforeSave($insert)
    {

        parent::beforeSave($insert);

        if ($this->isNewRecord) {
            $this->country = mb_strtoupper($this->country, 'utf-8');
        }
        return true;
    }

}
