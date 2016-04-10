<?php

use yii\db\Schema;
use yii\db\Migration;

class m160408_203156_cert extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_2.rod_cert CHANGE passport_num passport_num varchar(11);');
    }

    public function down()
    {
        echo "m160408_203156_cert cannot be reverted.\n";

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
