<?php

namespace d3yii2\d3rules\dictionaries;

use Yii;
use d3yii2\d3rules\models\D3RuleSettingType;
use yii\helpers\ArrayHelper;


class D3RuleSettingTypeDictionary{

    private const CACHE_KEY_LIST = 'D3RuleSettingTypeDictionaryList';
    private const CACHE_KEY_CODES_LIST = 'D3RuleSettingTypeDictionaryCodesList';

    public static function getList(): array
    {
        return Yii::$app->cache->getOrSet(
            self::CACHE_KEY_LIST,
            static function () {
                return ArrayHelper::map(
                    D3RuleSettingType::find()
                    ->select([
                        'id' => 'id',
                        'name' => 'name',
                        //'name' => 'CONCAT(code,\' \',name)'
                    ])
                    ->orderBy([
                        'name' => SORT_ASC,
                    ])
                    ->asArray()
                    ->all()
                ,
                'id',
                'name'
                );
            }
        );
    }

    public static function getCodeList(): array
    {
        return Yii::$app->cache->getOrSet(
            self::CACHE_KEY_CODES_LIST,
            static function () {
                return ArrayHelper::map(
                    D3RuleSettingType::find()
                    ->select([
                        'id' => 'id',
                        'name' => 'code',
                        //'name' => 'CONCAT(code,\' \',name)'
                    ])
                    ->orderBy([
                        'code' => SORT_ASC,
                    ])
                    ->asArray()
                    ->all()
                ,
                'id',
                'name'
                );
            }
        );
    }

    public static function clearCache(): void
    {
        Yii::$app->cache->delete(self::CACHE_KEY_LIST);
        Yii::$app->cache->delete(self::CACHE_KEY_CODES_LIST);
    }
}
