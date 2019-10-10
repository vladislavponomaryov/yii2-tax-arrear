<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TaxData;

/**
 * TaxDataSearch represents the model behind the search form of `app\models\TaxData`.
 */
class TaxDataSearch extends TaxData
{

    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'tax_data';
    }


    public function rules()
    {
        return [
            [['id', 'pensionContributionArrear', 'socialContributionArrear', 'appealledAmount', 'modifiedTermsAmount', 'rehabilitaionProcedureAmount'], 'integer'],
            [['nameRu', 'nameKk', 'iinBin', 'sendTime'], 'safe'],
            [['totalArrear', 'totalTaxArrear'], 'number'],
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
        $query = TaxData::find();

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
            'id' => $this->id,
            'totalArrear' => $this->totalArrear,
            'totalTaxArrear' => $this->totalTaxArrear,
            'pensionContributionArrear' => $this->pensionContributionArrear,
            'socialContributionArrear' => $this->socialContributionArrear,
            'appealledAmount' => $this->appealledAmount,
            'modifiedTermsAmount' => $this->modifiedTermsAmount,
            'rehabilitaionProcedureAmount' => $this->rehabilitaionProcedureAmount,
        ]);

        $query->andFilterWhere(['ilike', 'nameRu', $this->nameRu])
            ->andFilterWhere(['ilike', 'nameKk', $this->nameKk])
            ->andFilterWhere(['ilike', 'iinBin', $this->iinBin])
            ->andFilterWhere(['ilike', 'sendTime', $this->sendTime]);

        return $dataProvider;
    }
}
