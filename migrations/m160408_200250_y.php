<?php

use yii\db\Schema;
use yii\db\Migration;

class m160408_200250_y extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_2.rod_cert ADD passport_num VARCHAR(10) NULL;');
        $this->execute('ALTER TABLE galaxysss_2.rod_cert ADD passport_date date NULL;');
        $this->execute('ALTER TABLE galaxysss_2.rod_cert ADD passport_vidan VARCHAR(255) NULL;');
    }

    public function down()
    {
        echo "m160408_200250_y cannot be reverted.\n";

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
