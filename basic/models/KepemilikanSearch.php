<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kepemilikan;

/**
 * KepemilikanSearch represents the model behind the search form of `app\models\Kepemilikan`.
 */
class KepemilikanSearch extends Kepemilikan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tahun'], 'integer'],
            [['milik_sendiri_baik', 'milik_sendiri_rusak_ringan', 'milik_sendiri_rusak_berat', 'bukan_milik'], 'number'],
            [['id_daerah', 'jenis'], 'safe']
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
        $query = Kepemilikan::find()->joinWith('daerah')->joinWith('tahun')->joinWith('jenises');

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
            // 'id_daerah' => $this->id_daerah,
            // 'id_tahun' => $this->id_tahun,
            'milik_sendiri_baik' => $this->milik_sendiri_baik,
            'milik_sendiri_rusak_ringan' => $this->milik_sendiri_rusak_ringan,
            'milik_sendiri_rusak_berat' => $this->milik_sendiri_rusak_berat,
            'bukan_milik' => $this->bukan_milik,
            // 'jenis' => $this->jenis,
        ]);

        $query->andFilterWhere(['like', 'daerah.nama', $this->id_daerah])
            ->andFilterWhere(['like', 'nama_tahun', $this->id_tahun])
            ->andFilterWhere(['like', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}
