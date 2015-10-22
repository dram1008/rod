<?php

use yii\db\Schema;
use yii\db\Migration;

class m150927_022533_users extends Migration
{
    public function up()
    {
        $this->execute('update tg_requests set status = 1');
    }

    public function down()
    {
        echo "m150927_022533_users cannot be reverted.\n";

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
