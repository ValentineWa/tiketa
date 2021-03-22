<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Wallet;

/**
 * WalletSearch represents the model behind the search form of `common\models\Wallet`.
 */
class WalletSearch extends Wallet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['walletId', 'userId', 'currencyId', 'createdBy'], 'integer'],
            [['walletName', 'createdAt'], 'safe'],
            [['balance'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Wallet::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'walletId' => $this->walletId,
            'userId' => $this->userId,
            'currencyId' => $this->currencyId,
            'balance' => $this->balance,
            'createdAt' => $this->createdAt,
            'createdBy' => $this->createdBy,
        ]);

        $query->andFilterWhere(['like', 'walletName', $this->walletName]);

        return $dataProvider;
    }
}
