<?php

namespace d3yii2\d3rules\models;

use \d3yii2\d3rules\models\base\D3RuleSettingType as BaseD3RuleSettingType;
use d3yii2\d3store\dictionaries\D3RuleSettingTypeDictionary;

/**
 * This is the model class for table "d3rule_setting_type".
 */
class D3RuleSettingType extends BaseD3RuleSettingType
{
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        D3RuleSettingTypeDictionary::clearCache();
    }

    public function afterDelete()
    {
        parent::afterDelete();
        D3RuleSettingTypeDictionary::clearCache();
    }
}
