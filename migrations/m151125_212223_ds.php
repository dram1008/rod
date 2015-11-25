<?php

use yii\db\Schema;
use yii\db\Migration;

class m151125_212223_ds extends Migration
{
    public function up()
    {
        $this->execute('ALTER TABLE galaxysss_1.rod_article_list MODIFY COLUMN image varchar(255) NULL;');
    }

    public function down()
    {
        echo "m151125_212223_ds cannot be reverted.\n";

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
