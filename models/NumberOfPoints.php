<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "number_of_points".
 *
 * @property int $id
 * @property int $min
 * @property int $max
 * @property string $type
 * @property float|null $coeff
 * @property int|null $status
 * @property int|null $limit
 */
class NumberOfPoints extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'number_of_points';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['min', 'max', 'type'], 'required'],
            [['min', 'max', 'status', 'limit'], 'integer'],
            [['coeff'], 'number'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'min' => 'Min',
            'max' => 'Max',
            'type' => 'Type',
            'coeff' => 'Coeff',
            'status' => 'Status',
        ];
    }
}
