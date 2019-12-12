<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gelar".
 *
 * @property int $id
 * @property int $id_tahun
 * @property int $id_daerah
 * @property int $lakilaki
 * @property int $perempuan
 * @property int $jenis
 * @property string $kelas
 */
class GelarUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gelar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tahun', 'id_daerah', 'lakilaki', 'perempuan', 'jenis', 'gelar'], 'required'],
            [['id_tahun', 'id_daerah', 'lakilaki', 'perempuan', 'jenis'], 'integer'],
            [['gelar'], 'string'],
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
            'gelar' => 'Gelar',
        ];
    }
}
