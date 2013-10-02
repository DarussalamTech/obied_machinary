<?php

/*
 * Migration for creating 
 * category table
 * Author:ubd
 */

class m130912_052431_add_table_category extends ItstDbMigration {

    public function up() {
        $table = 'categories';
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'category_name' => 'varchar(50) NOT NULL',
            'category_description' => 'varchar(255) NOT NULL',
            'category_image' => 'varchar(255) NOT NULL',
            'parent_id' => 'int(11) unsigned NOT NULL',
            'deleted' => 'tinyint(1) NOT NULL DEFAULT 0',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'PRIMARY KEY (`id`)',
        );
        $options = "ENGINE=InnoDB";
        $this->createTable($table, $columns, $options);
    }

    public function down() {
        $table = 'categories';
        $this->dropTable($table);
    }

}