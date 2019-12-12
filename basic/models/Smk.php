<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smk".
 *
 * @property int $id
 * @property int $nspn
 * @property double $lat
 * @property double $long
 * @property string $name
 * @property string $alamat
 * @property int $id_daerah
 * @property int $telp
 * @property string $web
 * @property int $jenis
 * @property string $image
 *
 * @property Daerah $daerah
 * @property Jenis $jenis0
 */
class Smk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'smk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nspn', 'lat', 'long', 'name', 'alamat', 'id_daerah', 'telp', 'web', 'jenis', 'image'], 'required'],
            [['nspn', 'id_daerah', 'telp', 'jenis'], 'integer'],
            [['lat', 'long'], 'number'],
            [['name', 'alamat'], 'string'],
            [['web'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 200],
            [['id_daerah'], 'exist', 'skipOnError' => true, 'targetClass' => Daerah::className(), 'targetAttribute' => ['id_daerah' => 'id']],
            [['jenis'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['jenis' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nspn' => 'NPSN',
            'lat' => 'Lat',
            'long' => 'Long',
            'name' => 'Name',
            'alamat' => 'Alamat',
            'id_daerah' => 'Daerah',
            'telp' => 'Telp',
            'web' => 'Web',
            'jenis' => 'Jenis',
            'image' => 'Image',
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
}
