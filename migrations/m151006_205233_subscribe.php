<?php

use yii\db\Schema;
use yii\db\Migration;

class m151006_205233_subscribe extends Migration
{
    public function up()
    {
        $this->execute('CREATE TABLE `gs_users_role_link` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $this->execute('CREATE TABLE `gs_users_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `code` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $this->batchInsert('gs_users_role', ['name', 'code'], [
            ['Админ', 'admin'],
            ['Редактор', 'editor'],
            ['Тесла Админ', 'tesla-admin'],
        ]);

    }

    public function down()
    {
        echo "m151006_205233_subscribe cannot be reverted.\n";

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
