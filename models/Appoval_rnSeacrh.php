<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appoval_rn;

/**
 * Appoval_rnSeacrh represents the model behind the search form of `app\models\Appoval_rn`.
 */
class Appoval_rnSeacrh extends Appoval_rn
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'instansi_id', 'jabatan_id', 'bisa_menandatangani', 'bisa_atas_nama'], 'integer'],
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
        $query = Appoval_rn::find();

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
            'instansi_id' => $this->instansi_id,
            'jabatan_id' => $this->jabatan_id,
            'bisa_menandatangani' => $this->bisa_menandatangani,
            'bisa_atas_nama' => $this->bisa_atas_nama,
        ]);

        return $dataProvider;
    }
}
