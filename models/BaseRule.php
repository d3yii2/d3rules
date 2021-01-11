<?php


namespace d3yii2\d3rules\models;

use d3yii2\d3rules\dictionaries\D3RuleSettingTypeDictionary;

class BaseRule extends D3RuleRule
{


    public function afterFind()
    {
        parent::afterFind();
        $list = D3RuleSettingTypeDictionary::getCodeList();

        /**
         * load rule settings
         */
        foreach($this->d3ruleRuleSettings as $setting){
            $settingCode = $list[$setting->type_id];
            if(property_exists($this, $settingCode)) {
                $this->$settingCode = $setting;
            }
            unset($list[$setting->type_id]);
        }
        foreach($list as $typeId => $settingCode){
            $createMethod = 'createSetting' . $settingCode;
            if(property_exists($this, $settingCode)) {
                $ruleClass = get_class($this);
                if (method_exists($ruleClass, $createMethod)) {
                    $this->$settingCode = $ruleClass::$createMethod($this->id);
                }
            }
        }
    }

}
