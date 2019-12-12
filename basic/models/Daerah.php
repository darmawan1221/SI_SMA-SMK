<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "daerah".
 *
 * @property int $id
 * @property string $nama
 * @property double $lat
 * @property double $long
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
class Daerah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daerah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'lat', 'long'], 'required'],
            [['nama'], 'string'],
            [['lat', 'long'], 'number'],
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
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgamas()
    {
        return $this->hasMany(Agama::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGelars()
    {
        return $this->hasMany(Gelar::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepemilikans()
    {
        return $this->hasMany(Kepemilikan::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLuluses()
    {
        return $this->hasMany(Lulus::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMengulangs()
    {
        return $this->hasMany(Mengulang::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPutuses()
    {
        return $this->hasMany(Putus::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswaBarus()
    {
        return $this->hasMany(SiswaBaru::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmas()
    {
        return $this->hasMany(Sma::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmks()
    {
        return $this->hasMany(Smk::className(), ['id_daerah' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotals()
    {
        return $this->hasMany(Total::className(), ['id_daerah' => 'id']);
    }
}
