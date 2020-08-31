<?php

namespace d3yii2\d3rules;

use Yii;
use d3system\yii2\base\D3Module;

class Module extends D3Module
{
    public $controllerNamespace = 'd3yii2\d3rules\controllers';

    public function getLabel(): string
    {
        return Yii::t('d3rules','d3rules');
    }
}
