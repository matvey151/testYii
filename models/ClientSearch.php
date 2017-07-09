<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form about `app\models\Client`.
 */
class ClientSearch extends Client
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'second_name', 'patronymic', 'birthday', 'sex'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Client::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->joinWith('phones');
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        /**
         * Внимание костыль!
         * TODO разобраться как правильно сделать подобный поиск
         */
        $query->andFilterWhere(['like', 'second_name', $this->second_name])
            ->orFilterWhere(['like', 'phone.phone_number', $this->second_name]);

        return $dataProvider;
    }
}
