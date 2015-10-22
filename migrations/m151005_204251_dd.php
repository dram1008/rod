<?php

use yii\db\Schema;
use yii\db\Migration;

class m151005_204251_dd extends Migration
{
    public function up()
    {
        $rows = \app\models\User::query(['subscribe_is_tesla' => 1])->select('id,email')->all();
        foreach($rows as $row) {
            (new \yii\db\Query())->createCommand()->update(\app\models\User::TABLE, ['email' => strtolower($row['email'])], ['id' => $row['id']]);
        }
    }

    public function down()
    {
        echo "m151005_204251_dd cannot be reverted.\n";

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
