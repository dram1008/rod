<?php

use yii\db\Schema;
use yii\db\Migration;

class m151006_192015_subscribe extends Migration
{
    public function up()
    {
        $this->execute('CREATE TABLE `tg_subscribe_history` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext,
  `date_insert` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $this->execute('CREATE TABLE `tg_subscribe_mail_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `text` text NOT NULL,
  `html` text NOT NULL,
  `date_insert` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        echo "m151006_192015_subscribe cannot be reverted.\n";

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
