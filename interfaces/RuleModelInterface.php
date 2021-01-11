<?php


namespace d3yii2\d3rules\interfaces;


interface RuleModelInterface
{
    public static function getRuleName();
    public function filterQuery($query);
}