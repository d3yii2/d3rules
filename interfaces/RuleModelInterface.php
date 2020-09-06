<?php


namespace d3yii2\d3rules\interfaces;


interface RuleModelInterface
{
    public static function getRuleName();
    public static function createDefaultSettings(int $ruleId);
    public function filterQuery();
}