<?php

use yii\db\Schema;
use yii\db\Migration;

class m160408_065447_cert extends Migration
{
    public function up()
    {
        $this->execute('CREATE TABLE `rod_cert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `datetime_given` int(11) DEFAULT NULL,
  `file` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        echo "m160408_065447_cert cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
