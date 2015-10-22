<?php

use yii\db\Schema;
use yii\db\Migration;

class m150926_234638_users extends Migration
{
    public function up()
    {
        $users = \app\models\Request::query()->select('email')->column();
        $rows = [];
        foreach($users as $i) {
            $rows[] = [$i, 1, 1, 1, gmdate('Y-m-d H:i:m')];
        }
        $this->batchInsert('gs_users', ['email', 'is_confirm', 'is_active',  'subscribe_is_tesla', 'datetime_reg'], $rows);
    }

    public function down()
    {
        echo "m150926_234638_users cannot be reverted.\n";

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
