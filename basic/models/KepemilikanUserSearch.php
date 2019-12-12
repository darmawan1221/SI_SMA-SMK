<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KepemilikanUser;

/**
 * KepemilikanUserSearch represents the model behind the search form of `app\models\KepemilikanUser`.
 */
class KepemilikanUserSearch extends KepemilikanUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_daerah', 'id_tahun', 'jenis'], 'integer'],
            [['milik_sendiri_baik', 'milik_sendiri_rusak_ringan', 'milik_sendiri_rusak_berat', 'bukan_milik'], 'number'],
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
    public function search($params, $id_daerah, $jenis)
    {
        $query = KepemilikanUser::find()->where(['id_daerah'=>$id_daerah, 'jenis'=>$jenis]);

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
            'id_daerah' => $this->id_daerah,
            'id_tahun' => $this->id_tahun,
            'milik_sendiri_baik' => $this->milik_sendiri_baik,
            'milik_sendiri_rusak_ringan' => $this->milik_sendiri_rusak_ringan,
            'milik_sendiri_rusak_berat' => $this->milik_sendiri_rusak_berat,
            'bukan_milik' => $this->bukan_milik,
            'jenis' => $this->jenis,
        ]);

        return $dataProvider;
    }
}
