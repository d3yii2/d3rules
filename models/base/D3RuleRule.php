<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace d3yii2\d3rules\models\base;

use d3yii2\d3rules\models\D3RuleRuleQuery;
use d3yii2\d3rules\models\SysModels;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;


/**
 * This is the base-model class for table "d3rule_rule".
 *
 * @property integer $id
 * @property integer $model_id
 * @property integer $model_record_id
 * @property integer $rule_class_id
 * @property string $name
 *
 * @property \d3yii2\d3rules\models\D3ruleRuleSetting[] $d3ruleRuleSettings
 * @property SysModels $model
 * @property SysModels $ruleClass
 * @property string $aliasModel
 */
abstract class D3RuleRule extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return 'd3rule_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'required' => [['model_id', 'model_record_id', 'rule_class_id'], 'required'],
            'tinyint Unsigned' => [['model_id','rule_class_id'],'integer' ,'min' => 0 ,'max' => 255],
            'smallint Unsigned' => [['id'],'integer' ,'min' => 0 ,'max' => 65535],
            'integer Unsigned' => [['model_record_id'],'integer' ,'min' => 0 ,'max' => 4294967295],
            [['name'], 'string', 'max' => 255],
            [['rule_class_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysModels::className(), 'targetAttribute' => ['rule_class_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysModels::className(), 'targetAttribute' => ['model_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('d3rules', 'ID'),
            'model_id' => Yii::t('d3rules', 'Model ID'),
            'model_record_id' => Yii::t('d3rules', 'Model Record ID'),
            'rule_class_id' => Yii::t('d3rules', 'Rule Class ID'),
            'name' => Yii::t('d3rules', 'Name'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getD3ruleRuleSettings()
    {
        return $this->hasMany(\d3yii2\d3rules\models\D3RuleRuleSetting::className(), ['rule_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(SysModels::className(), ['id' => 'model_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRuleClass()
    {
        return $this->hasOne(SysModels::className(), ['id' => 'rule_class_id']);
    }


    
    /**
     * @inheritdoc
     * @return D3RuleRuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new D3RuleRuleQuery(get_called_class());
    }


}
