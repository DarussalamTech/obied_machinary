<?php

class m130917_073030_handle_insert_categories extends ItstDbMigration {

    public function up() {
        $table = "categories";
        $this->delete($table);
        
        $columns = array(
            "id"=>"1",
            "category_name"=>"Cranes",
            "category_description"=>"Cranes",
            "parent_id"=>"0",
        );
        $this->insertRow($table, $columns);
        
        
        /** other four categories **/
         $columns = array(
            "id"=>"2",
            "category_name"=>"All Terrain Cranes",
            "category_description"=>"All Terrain Cranes",
            "parent_id"=>"1",
        );
        $this->insertRow($table, $columns);

        
         $columns = array(
            "id"=>"3",
            "category_name"=>"Truck Mounted Cranes",
            "category_description"=>"Truck Mounted Cranes",
            "parent_id"=>"1",
        );
        $this->insertRow($table, $columns);
        
         $columns = array(
            "id"=>"4",
            "category_name"=>"Rough Terrain Cranes",
            "category_description"=>"Rough Terrain Cranes",
            "parent_id"=>"1",
        );
        $this->insertRow($table, $columns);
        
        
         $columns = array(
            "id"=>"5",
            "category_name"=>"Crawler Cranes",
            "category_description"=>"Crawler Cranes",
            "parent_id"=>"1",
        );
        $this->insertRow($table, $columns);
        
    }

    public function down() {
      return true;   
    }

}