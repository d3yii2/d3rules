<?php

use yii\db\Migration;

class m200906_110707_init  extends Migration {

    public function safeUp() {

        $this->execute('
            CREATE TABLE `d3rule_setting_type`(
                `id` tinyint(3) unsigned NOT NULL  auto_increment , 
                `code` char(20) COLLATE latin1_swedish_ci NOT NULL  , 
                `name` varchar(50) COLLATE latin1_swedish_ci NOT NULL  , 
                `dict_class_id` tinyint(3) unsigned NULL  , 
                PRIMARY KEY (`id`) , 
                KEY `dict_class_id`(`dict_class_id`) , 
                CONSTRAINT `d3rule_setting_type_ibfk_1` 
                FOREIGN KEY (`dict_class_id`) REFERENCES `sys_models` (`id`) 
            ) ENGINE=InnoDB DEFAULT CHARSET=\'latin1\' COLLATE=\'latin1_swedish_ci\';
        ');

        $this->execute('
            CREATE TABLE `d3rule_rule_setting`(
                `id` smallint(5) unsigned NOT NULL  auto_increment , 
                `rule_id` smallint(5) unsigned NOT NULL  , 
                `type_id` tinyint(3) unsigned NOT NULL  , 
                `value` text COLLATE utf8_general_ci NULL  , 
                PRIMARY KEY (`id`) , 
                KEY `rule_id`(`rule_id`) , 
                KEY `type_id`(`type_id`) , 
                CONSTRAINT `d3rule_rule_setting_ibfk_1` 
                FOREIGN KEY (`rule_id`) REFERENCES `d3rule_rule` (`id`) , 
                CONSTRAINT `d3rule_rule_setting_ibfk_2` 
                FOREIGN KEY (`type_id`) REFERENCES `d3rule_setting_type` (`id`) 
            ) ENGINE=InnoDB DEFAULT CHARSET=\'latin1\' COLLATE=\'latin1_swedish_ci\';
        ');

        $this->execute('
            CREATE TABLE `d3rule_rule`(
                `id` smallint(5) unsigned NOT NULL  auto_increment , 
                `model_id` tinyint(3) unsigned NOT NULL  , 
                `model_record_id` int(10) unsigned NOT NULL  , 
                `rule_class_id` tinyint(3) unsigned NOT NULL  , 
                `name` varchar(255) COLLATE utf8_general_ci NULL  , 
                PRIMARY KEY (`id`) , 
                KEY `model_class_id`(`rule_class_id`) , 
                KEY `model_id`(`model_id`) , 
                CONSTRAINT `d3rule_rule_ibfk_2` 
                FOREIGN KEY (`rule_class_id`) REFERENCES `sys_models` (`id`) , 
                CONSTRAINT `d3rule_rule_ibfk_3` 
                FOREIGN KEY (`model_id`) REFERENCES `sys_models` (`id`) 
            ) ENGINE=InnoDB DEFAULT CHARSET=\'latin1\' COLLATE=\'latin1_swedish_ci\';
        ');

    }

    public function safeDown() {
        echo "m200906_110707_init cannot be reverted.\n";
        return false;
    }
}
