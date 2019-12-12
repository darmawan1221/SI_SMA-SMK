<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tahun".
 *
 * @property int $id
 * @property string $nama_tahun
 *
 * @property Agama[] $agamas
 * @property Gelar[] $gelars
 * @property Kepemilikan[] $kepemilikans
 * @property Lulus[] $luluses
 * @property Mengulang[] $mengulangs
 * @property Putus[] $putuses
 * @property SiswaBaru[] $siswaBarus
 * @property Total[] $totals
 */
class Tahun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tahun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_tahun'], 'required'],
            [['nama_tahun'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_tahun' => 'Nama Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgamas()
    {
        return $this->hasMany(Agama::className(), ['id_tahun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGelars()
    {
        return $this->hasMany(Gelar::className(), ['id_tahun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepemilikans()
    {
        return $this->hasMany(Kepemilikan::className(), ['id_tahun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLuluses()
    {
        return $this->hasMany(Lulus::className(), ['id_tahun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMengulangs()
    {
        return $this->hasMany(Mengulang::className(), ['id_tahun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPutuses()
    {
        return $this->hasMany(Putus::className(), ['id_tahun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaBarus()
    {
        return $this->hasMany(SiswaBaru::className(), ['id_tahun' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotals()
    {
        return $this->hasMany(Total::className(), ['id_tahun' => 'id']);
    }
}
