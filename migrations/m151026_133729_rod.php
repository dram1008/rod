<?php

use yii\db\Schema;
use yii\db\Migration;

class m151026_133729_rod extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_1.gs_users ADD subscribe_is_rod TINYINT NULL;');
    }

    public function down()
    {
        echo "m151026_133729_rod cannot be reverted.\n";

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
