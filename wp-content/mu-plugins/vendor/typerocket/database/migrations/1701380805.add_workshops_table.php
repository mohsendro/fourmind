<?php
use TypeRocket\Database\Migration;

return new class($wpdb) extends Migration
{
    
    public function up()
    {
        global $wpdb;
        $table_name_samples   = $wpdb->prefix . 'samples'; 

        $table_name_samples_up = "CREATE TABLE IF NOT EXISTS " . $table_name_samples . " (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `title` varchar(255) COLLATE utf8_general_ci NOT NULL,
        `samples` longtext COLLATE utf8_general_ci DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        dbDelta($table_name_samples_up);
    }

    public function down()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'samples'; 

        $table = "DROP TABLE IF EXISTS " . $table_name;
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($table);

    }
};