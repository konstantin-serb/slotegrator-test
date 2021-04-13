<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "things".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property int|null $available
 */
class Things extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'things';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price'], 'required'],
            [['price', 'available'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Price',
            'available' => 'Available',
        ];
    }
}
