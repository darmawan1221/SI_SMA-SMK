<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SiswaBaruUser;

/**
 * SiswaBaruUserSearch represents the model behind the search form of `app\models\SiswaBaruUser`.
 */
class SiswaBaruUserSearch extends SiswaBaruUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tahun', 'id_daerah', 'lakilaki', 'perempuan', 'jenis'], 'integer'],
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
        $query = SiswaBaruUser::find()->where(['id_daerah'=>$id_daerah, 'jenis'=>$jenis]);

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
            'id_tahun' => $this->id_tahun,
            'id_daerah' => $this->id_daerah,
            'lakilaki' => $this->lakilaki,
            'perempuan' => $this->perempuan,
            'jenis' => $this->jenis,
        ]);

        return $dataProvider;
    }
}
