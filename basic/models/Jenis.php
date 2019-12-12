<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis".
 *
 * @property int $id
 * @property string $nama
 *
 * @property Agama[] $agamas
 * @property Gelar[] $gelars
 * @property Kepemilikan[] $kepemilikans
 * @property Lulus[] $luluses
 * @property Mengulang[] $mengulangs
 * @property Putus[] $putuses
 * @property SiswaBaru[] $siswaBarus
 * @property Sma[] $smas
 * @property Smk[] $smks
 * @property Total[] $totals
 */
class Jenis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgamas()
    {
        return $this->hasMany(Agama::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGelars()
    {
        return $this->hasMany(Gelar::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepemilikans()
    {
        return $this->hasMany(Kepemilikan::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLuluses()
    {
        return $this->hasMany(Lulus::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMengulangs()
    {
        return $this->hasMany(Mengulang::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPutuses()
    {
        return $this->hasMany(Putus::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaBarus()
    {
        return $this->hasMany(SiswaBaru::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmas()
    {
        return $this->hasMany(Sma::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmks()
    {
        return $this->hasMany(Smk::className(), ['jenis' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotals()
    {
        return $this->hasMany(Total::className(), ['jenis' => 'id']);
    }
}
