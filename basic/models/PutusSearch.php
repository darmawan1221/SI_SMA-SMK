<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Putus;

/**
 * PutusSearch represents the model behind the search form of `app\models\Putus`.
 */
class PutusSearch extends Putus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tahun', 'lakilaki', 'perempuan'], 'integer'],
            [['kelas', 'id_daerah', 'jenis'], 'safe'],
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
        $query = Putus::find()->joinWith('daerah')->joinWith('tahun')->joinWith('jenises');

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
            // 'id_tahun' => $this->id_tahun,
            // 'id_daerah' => $this->id_daerah,
            'lakilaki' => $this->lakilaki,
            'perempuan' => $this->perempuan,
            // 'jenis' => $this->jenis,
        ]);

        $query->andFilterWhere(['like', 'daerah.nama', $this->id_daerah])
            ->andFilterWhere(['like', 'nama_tahun', $this->id_tahun])
            ->andFilterWhere(['like', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}
