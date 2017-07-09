<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "phone".
 *
 * @property integer $id
 * @property string $phone_number
 * @property integer $client_id
 */
class Phone extends ActiveRecord
{


    public function scenarios()
    {
        return [
            'update' => ['phone_number'],
            'create' => ['phone_number']
        ];
    }

    public function getClient()
    {
        return $this->hasOne( Client::className(), ['id' => 'client_id']);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        /**
         * TODO проверка номера на уникальность слабая, нужно сделать или другую проверку или написать более строгую регулярку
         */
        return [
            [['phone_number', 'client_id'], 'required', 'message' => '{attribute} не может быть пустым'],
            [['client_id'], 'integer', 'message' => '{attribute} должно быть числом'],
            [['phone_number'], 'string', 'max' => 255, 'message' => '{attribute} должен быть строкой'],
            [['phone_number'],'unique', 'message' => '{attribute} {value} уже существует'],
            ['phone_number', function ($attribute, $params) {
                $isCorrectPhone = preg_match('/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $this->$attribute);
                if (!$isCorrectPhone) {
                    $this->addError($attribute, 'Неверный номер телефона ( пример: +7(999)000-00-00 )');
                }
            }],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_number' => 'Номер телефона',
            'client_id' => 'Клиент, держатель номера',
        ];
    }
}
