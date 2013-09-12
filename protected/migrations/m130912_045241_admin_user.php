<?php

/*
 * Migration for adding data to  
 * admin  user's table
 * Author:ubd
 */

class m130912_045241_admin_user extends OMDbMigration {

    public function up() {
        $table = "users";
        $columns = array(
            "username" => "admin",
            "password" => md5("admin"),
            "email" => "admin@admin.com",
            "ip_address" => "",
            "type" => "admin",
            "is_active" => "1",
            "create_time" => date("Y-m-d h:m:s"),
            "create_user_id" => "1",
            "update_time" => date("Y-m-d h:m:s"),
            "update_user_id" => "1",
        );
        $this->insert($table, $columns);
    }

    public function down() {
        $table = "users";
        $this->delete($table, "username='admin'");
    }

}