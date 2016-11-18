<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $model
 * @property integer $oem_id
 * @property integer $year
 * @property string $warehouse
 * @property integer $count
 *
 * @property Oem $oem
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'oem_id', 'year'], 'required'],
            [['oem_id', 'year', 'count'], 'integer'],
            [['model', 'warehouse'], 'string', 'max' => 50],
            [['oem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oem::className(), 'targetAttribute' => ['oem_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'model' => Yii::t('app', 'Model'),
            'oem_id' => Yii::t('app', 'Oem ID'),
            'year' => Yii::t('app', 'Year'),
            'warehouse' => Yii::t('app', 'Warehouse'),
            'count' => Yii::t('app', 'Count'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOem()
    {
        return $this->hasOne(Oem::className(), ['id' => 'oem_id']);
    }

    /**
     * @inheritdoc
     * @return StockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StockQuery(get_called_class());
    }
}
