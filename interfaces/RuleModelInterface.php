<?php


namespace d3yii2\d3rules\interfaces;


interface RuleModelInterface
{
    public function filterQuery();
    public function saveSettings();
    public function loadSettinigs();
    public function calculate();
    public function registerCalculation();
}