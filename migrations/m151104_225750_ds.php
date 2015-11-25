<?php

use yii\db\Schema;
use yii\db\Migration;

class m151104_225750_ds extends Migration
{
    public function up()
    {
        $this->execute('CREATE TABLE `rod_masters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `content` text DEFAULT NULL,
  `sort_index` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
    }

    public function down()
    {
        echo "m151104_225750_ds cannot be reverted.\n";

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
