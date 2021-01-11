<?php

namespace d3yii2\d3rules\models;

use d3system\dictionaries\SysModelsDictionary;
use \d3yii2\d3rules\models\base\D3RuleRule as BaseD3RuleRule;

/**
 * This is the model class for table "d3rule_rule".
 */
class D3RuleRule extends BaseD3RuleRule
{
    public function getRule()
    {
        $ruleClass = SysModelsDictionary::getClassList()[$this->rule_class_id];
        return $ruleClass::findOne($this->id);
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $isNewRecord = $this->isNewRecord;
        if(!$result = parent::save($runValidation, $attributeNames)){
            return $result;
        }
        if($isNewRecord){
            $ruleClassName = SysModelsDictionary::getClassList()[$this->rule_class_id];
        }

        return true;
    }

    public function delete()
    {
        foreach($this->d3ruleRuleSettings as $setting){
            $setting->delete();
        }
        return parent::delete();
    }
}
