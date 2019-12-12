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
 */
class KepemilikanUser extends \yii\db\ActiveRecord
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
            [['id_daerah', 'id_tahun', 'jenis'], 'integer'],
            [['id_daerah', 'id_tahun', 'milik_sendiri_baik', 'milik_sendiri_rusak_ringan', 'milik_sendiri_rusak_berat', 'bukan_milik', 'jenis'], 'required'],
            [['milik_sendiri_baik', 'milik_sendiri_rusak_ringan', 'milik_sendiri_rusak_berat', 'bukan_milik'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_daerah' => 'Id Daerah',
            'id_tahun' => 'Id Tahun',
            'milik_sendiri_baik' => 'Milik Sendiri Baik',
            'milik_sendiri_rusak_ringan' => 'Milik Sendiri Rusak Ringan',
            'milik_sendiri_rusak_berat' => 'Milik Sendiri Rusak Berat',
            'bukan_milik' => 'Bukan Milik',
            'jenis' => 'Jenis',
        ];
    }
}
