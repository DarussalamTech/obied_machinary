<?php

class m130920_112427_add_column_price_per_variable extends ItstDbMigration
{
	public function up() {
        $table = "products";
        $this->addColumn($table, 'price_per_variable', 'varchar(200) Default Null after price');
    }

    public function down() {
        $table = "products";
        $this->dropColumn($table, 'price_per_variable');
    }
}