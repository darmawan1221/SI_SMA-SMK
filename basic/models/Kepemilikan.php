<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kepemilikan".
 *
 * @property int $id
 * @property int $id_daerah
 * @property int $id_tahun
 * @property double $milik_sendiri_baik
 * @property double $milik_sendiri_rusak_ringan
 * @property double $milik_sendiri_rusak_berat
 * @property double $bukan_milik
 * @property int $jenis
 *
 * @property Daerah $daerah
 * @property Jenis $jenis0
 * @property Tahun $tahun
 */
class Kepemilikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kepemilikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_daerah', 'id_tahun', 'milik_sendiri_baik', 'milik_sendiri_rusak_ringan', 'milik_sendiri_rusak_berat', 'bukan_milik', 'jenis'], 'required'],
            [['id_daerah', 'id_tahun', 'jenis'], 'integer'],
            [['milik_sendiri_baik', 'milik_sendiri_rusak_ringan', 'milik_sendiri_rusak_berat', 'bukan_milik'], 'number'],
            [['id_daerah'], 'exist', 'skipOnError' => true, 'targetClass' => Daerah::className(), 'targetAttribute' => ['id_daerah' => 'id']],
            [['jenis'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['jenis' => 'id']],
            [['id_tahun'], 'exist', 'skipOnError' => true, 'targetClass' => Tahun::className(), 'targetAttribute' => ['id_tahun' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_daerah' => 'Daerah',
            'id_tahun' => 'Tahun',
            'milik_sendiri_baik' => 'Milik Sendiri Baik',
            'milik_sendiri_rusak_ringan' => 'Milik Sendiri Rusak Ringan',
            'milik_sendiri_rusak_berat' => 'Milik Sendiri Rusak Berat',
            'bukan_milik' => 'Bukan Milik',
            'jenis' => 'Jenis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDaerah()
    {
        return $this->hasOne(Daerah::className(), ['id' => 'id_daerah']);
    }

    public function getdaerahName() {
        return $this->daerah->nama;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenises()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'jenis']);
    }

    public function getjenisName() {
        return $this->jenises->nama;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahun()
    {
        return $this->hasOne(Tahun::className(), ['id' => 'id_tahun']);
    }

    public function gettahunName() {
        return $this->tahun->nama_tahun;
    }
}
