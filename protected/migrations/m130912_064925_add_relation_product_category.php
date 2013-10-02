<?php

class m130912_064925_add_relation_product_category extends ItstDbMigration {

    public function up() {
        $table = "products";
        $this->addForeignKey("fk_" . $table, $table, "category_id", "categories", "id", "CASCADE", "CASCADE");
    }

    public function down() {
        $table = "products";
        $this->dropForeignKey("fk_" . $table, $table);
    }

}