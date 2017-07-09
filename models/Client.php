<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $second_name
 * @property string $patronymic
 * @property string $birthday
 * @property string $sex
 * @property integer $created_at
 * @property integer $updated_at
 */
class Client extends ActiveRecord
{
    public function getPhones()
    {
        return $this->hasMany( Phone::className(), ['client_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'second_name', 'patronymic', 'birthday', 'sex'], 'required', 'message' => '{attribute} не может быть пустым'],
            [['birthday'], 'safe'],
            [['sex'], 'string', 'message' => '{attribute} должен быть строкой'],
            [['created_at', 'updated_at'], 'integer', 'message' => '{attribute} должна быть числом'],
            [['first_name', 'second_name', 'patronymic'], 'string', 'max' => 255, 'message' => '{attribute} должно быть строкой'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'second_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'birthday' => 'Дата рождения',
            'sex' => 'Пол',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего обновления',
        ];
    }
}
