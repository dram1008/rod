<?php

use yii\db\Schema;
use yii\db\Migration;

class m151006_003149_referal extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_1.gs_users ADD referal_code VARCHAR(50) NULL;');
        $this->execute('CREATE TABLE `tg_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` int(11) DEFAULT NULL,
  `referal_code` varchar(20) DEFAULT NULL,
  `is_paid` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        echo "m151006_003149_referal cannot be reverted.\n";

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
