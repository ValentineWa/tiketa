<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Deposit;

/**
 * DepositSearch represents the model behind the search form of `common\models\Deposit`.
 */
class DepositSearch extends Deposit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transId', 'walletId', 'createdBy', 'status', 'phoneCode', 'mpesaNumber'], 'integer'],
            [['merchantrequestId', 'details', 'reciept', 'transDate'], 'safe'],
            [['transAmount'], 'number'],
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
        $query = Deposit::find();

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
            'transId' => $this->transId,
            'walletId' => $this->walletId,
            'transAmount' => $this->transAmount,
            'transDate' => $this->transDate,
            'createdBy' => $this->createdBy,
            'status' => $this->status,
            'phoneCode' => $this->phoneCode,
            'mpesaNumber' => $this->mpesaNumber,
        ]);

        $query->andFilterWhere(['like', 'merchantrequestId', $this->merchantrequestId])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'reciept', $this->reciept]);

        return $dataProvider;
    }
}
