<?php

class m130919_110733_add_column_price extends ItstDbMigration {

    public function up() {
        $table = "products";
        $this->addColumn($table, 'price', 'DECIMAL(10,2) Default Null after product_overview');
    }

    public function down() {
        $table = "products";
        $this->dropColumn($table, 'price');
    }

}