<?php

use yii\db\Schema;
use yii\db\Migration;

class m151024_201656_rod extends Migration
{
    public function up()
    {
        $this->execute('CREATE TABLE `rod_article_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `header` varchar(255)DEFAULT NULL,
  `content` longtext,
  `source` varchar(255) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `date_insert` datetime DEFAULT NULL,
  `id_string` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `image` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `view_counter` int(11) NOT NULL DEFAULT \'0\',
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tree_node_id_mask` bigint(20) DEFAULT NULL,
  `is_added_site_update` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tree_node_id_mask` (`tree_node_id_mask`),
  KEY `id_string` (`id_string`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8');
        $this->execute('CREATE TABLE `rod_article_tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_string` varchar(100) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `date_insert` datetime DEFAULT NULL,
  `sort_index` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin');
    }

    public function down()
    {
        echo "m151024_201656_rod cannot be reverted.\n";

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
