<?php

class m130919_110717_alter_column_servictype extends ItstDbMigration {

    public function up() {
        $table = "products";
        $this->alterColumn($table, 'product_service_type', 'enum("Trading","Rental") DEFAULT "Trading"');
    }

    public function down() {
        $table = "products";
        $this->alterColumn($table, 'product_service_type', 'enum("trade","rented") DEFAULT "trade"');
    }

}