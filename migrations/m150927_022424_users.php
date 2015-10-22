<?php

use yii\db\Schema;
use yii\db\Migration;

class m150927_022424_users extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_1.tg_requests ADD status TINYINT NULL;');
    }

    public function down()
    {
        echo "m150927_022424_users cannot be reverted.\n";

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
