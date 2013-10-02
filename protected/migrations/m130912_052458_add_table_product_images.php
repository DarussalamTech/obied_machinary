<?php

/*
 * Migration for creating 
 * Products Images   table
 * Author:ubd
 */

class m130912_052458_add_table_product_images extends ItstDbMigration {

    public function up() {

        $table = 'product_images';
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'product_id' => 'int(11)  NOT NULL',
            'image_small' => 'varchar(100) NOT NULL',
            'image_detail' => 'varchar(100) NOT NULL',
            'image_large' => 'varchar(100) NOT NULL',
            'is_default' => 'tinyint(11) NOT NULL',
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
        $table = 'product_images';
        $this->dropTable($table);
    }

}