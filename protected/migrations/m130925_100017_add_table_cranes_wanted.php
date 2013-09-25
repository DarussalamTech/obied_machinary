<?php

class m130925_100017_add_table_cranes_wanted extends ItstDbMigration {

    public function up() {
        $table = 'product_wanted';
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'wanted_name' => 'varchar(255) NOT NULL',
            'wanted_description' => 'varchar(255) NOT NULL',
            'wanted_image' => 'varchar(255)  NULL',
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
        $table = 'product_wanted';
        $this->dropTable($table);
    }

}