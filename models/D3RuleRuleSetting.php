<?php

namespace d3yii2\d3rules\models;

use \d3yii2\d3rules\models\base\D3RuleRuleSetting as BaseD3RuleRuleSetting;
use yii\helpers\Json;

/**
 * This is the model class for table "d3rule_rule_setting".
 */
class D3RuleRuleSetting extends BaseD3RuleRuleSetting
{
    public function getValueAsList(): array
    {
        $result = [];
        if($this->value){
            $result = Json::decode($this->value);
            if(!is_array($result)){
                $result = [];
            }
        }
        return $result;
    }

    public function addToValueListItem($item): void
    {
        $list = $this->getValueAsList();
        $list[] = $item;
        $this->value = Json::encode($list);
    }

    public function removeFromValueListItem($item): void
    {
        $list = $this->getValueAsList();
        if (($key = array_search($item, $list, true)) !== false) {
            unset($list[$key]);
        }
        $this->value = Json::encode($list);
    }

}
