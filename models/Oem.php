<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oem".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Stock[] $stocks
 */
class Oem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['oem_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return OemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OemQuery(get_called_class());
    }
}
