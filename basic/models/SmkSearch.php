<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Smk;

/**
 * SmkSearch represents the model behind the search form of `app\models\Smk`.
 */
class SmkSearch extends Smk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nspn', 'id_daerah', 'telp', 'jenis'], 'integer'],
            [['lat', 'long'], 'number'],
            [['name', 'alamat', 'web', 'image'], 'safe'],
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
        $query = Smk::find()->joinWith('daerah')->joinWith('jenises');

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
            'nspn' => $this->nspn,
            'lat' => $this->lat,
            'long' => $this->long,
            // 'id_daerah' => $this->id_daerah,
            'telp' => $this->telp,
            // 'jenis' => $this->jenis,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'web', $this->web])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'daerah.nama', $this->id_daerah])
            ->andFilterWhere(['like', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}
