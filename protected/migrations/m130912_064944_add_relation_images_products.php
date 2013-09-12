<?php

class m130912_064944_add_relation_images_products extends OMDbMigration {

    public function up() {
        $table = "product_images";
        $this->addForeignKey("fk_" . $table, $table, "product_id", "products", "id", "CASCADE", "CASCADE");
    }

    public function down() {
        $table = "product_images";
        $this->dropForeignKey("fk_" . $table, $table);
    }

}