<?php

class m130918_064902_add_new_attributes_product extends ItstDbMigration {

    public function up() {
        $table = 'products';
        $this->addColumn($table, 'serial_number', 'varchar(200)  after product_overview');
        $this->addColumn($table, 'capacity', 'varchar(200)  after serial_number');
        $this->addColumn($table, 'status', 'enum("available","sold","comming soon")  after capacity');
        $this->addColumn($table, 'year', 'YEAR(4)  after status');
        $this->addColumn($table, 'crane_boom', 'DECIMAL(10,2)  after year');
        $this->addColumn($table, 'crane_jib', 'DECIMAL(10,2)  after crane_boom');
    }

    public function down() {
        $table = 'products';
        $this->dropColumn($table, 'serial_number');
        $this->dropColumn($table, 'capacity');
        $this->dropColumn($table, 'status');
        $this->dropColumn($table, 'year');
        $this->dropColumn($table, 'crane_boom');
        $this->dropColumn($table, 'crane_jib');
    }

}