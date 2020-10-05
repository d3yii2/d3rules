<?php


namespace d3yii2\d3rules\models;

use d3yii2\d3rules\dictionaries\D3RuleSettingTypeDictionary;

class BaseRule extends D3RuleRule
{


    public function afterFind()
    {
        parent::afterFind();
        $list = D3RuleSettingTypeDictionary::getCodeList();
        foreach($this->d3ruleRuleSettings as $setting){
            $settingCode = $list[$setting->type_id];
            if(property_exists($this, $settingCode)) {
                $this->$settingCode = $setting;
            }
        }
    }

}
