<?php

/*
 * Migration for creating 
 * Products  table
 * Author:ubd
 */

class m130912_052442_add_table_product extends OMDbMigration {

    public function up() {
        $table = 'products';
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'category_id' => 'int(11)  NOT NULL',
            'product_service_type' => 'enum("trade","rented") DEFAULT "trade"',
            'product_name' => 'varchar(50) NOT NULL',
            'product_description' => 'LONGTEXT NOT NULL',
            'product_overview' => 'varchar(255) NOT NULL',
            'slug' => 'varchar(50) NOT NULL',
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
        $table = 'products';
        $this->dropTable($table);
    }

}