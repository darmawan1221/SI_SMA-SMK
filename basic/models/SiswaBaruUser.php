<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa_baru".
 *
 * @property int $id
 * @property int $id_tahun
 * @property int $id_daerah
 * @property int $lakilaki
 * @property int $perempuan
 * @property int $jenis
 *
 * @property Daerah $daerah
 * @property Jenis $jenis0
 * @property Tahun $tahun
 */
class SiswaBaruUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siswa_baru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tahun', 'id_daerah', 'lakilaki', 'perempuan', 'jenis'], 'required'],
            [['id_tahun', 'id_daerah', 'lakilaki', 'perempuan', 'jenis'], 'integer'],
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
            'id_tahun' => 'Id Tahun',
            'id_daerah' => 'Id Daerah',
            'lakilaki' => 'Lakilaki',
            'perempuan' => 'Perempuan',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenis0()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'jenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTahun()
    {
        return $this->hasOne(Tahun::className(), ['id' => 'id_tahun']);
    }
}
