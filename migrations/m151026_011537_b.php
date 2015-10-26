<?php

use yii\db\Schema;
use yii\db\Migration;

class m151026_011537_b extends Migration
{
    public function up()
    {
        $this->batchInsert('rod_article_tree',[ 'name', 'id_string' ], [
            [ 'Приход', 'in'],
            [ 'Уход', 'out'],
            [ 'Переход', 'transfere'],
            [ 'Союз', 'union'],
        ]);
    }

    public function down()
    {
        echo "m151026_011537_b cannot be reverted.\n";

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
