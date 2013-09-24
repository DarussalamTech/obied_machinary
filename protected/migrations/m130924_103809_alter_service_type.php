<?php

class m130924_103809_alter_service_type extends ItstDbMigration {

    public function up() {
        $table = "products";
        $this->alterColumn($table, 'product_service_type', 'enum("Sales","Rental") DEFAULT "Sales"');
    }

    public function down() {
        $table = "products";
        $this->alterColumn($table, 'product_service_type', 'enum("Trading","Rental") DEFAULT "Trading"');
    }

}