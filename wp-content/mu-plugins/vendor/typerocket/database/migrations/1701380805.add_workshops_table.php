<?php
use TypeRocket\Database\Migration;

return new class($wpdb) extends Migration
{
    
    public function up()
    {
        global $wpdb;
        $table_name_workshps   = $wpdb->prefix . 'samples'; 

        $table_name_workshps_up = "CREATE TABLE IF NOT EXISTS " . $table_name_workshps . " (
            `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            `course_id` bigint(20) NOT NULL,
            `full_name` text NOT NULL,
            `job` text NOT NULL,
            `field` text NOT NULL,
            `tel` text NOT NULL,
            `email` text NOT NULL,
            `date` date NOT NULL,
            `textarea1` varchar(255) NOT NULL,
            `textarea2` varchar(255) NOT NULL,
            `textarea3` varchar(255) NOT NULL,
            `textarea4` varchar(255) NOT NULL,
            `textarea5` varchar(255) NOT NULL,
            `textarea6` varchar(255) NOT NULL,
            `textarea7` varchar(255) NOT NULL,
            `textarea8` varchar(255) NOT NULL,
            `textarea9` int(255) NOT NULL,
            `textarea10` varchar(255) NOT NULL,
            `checkList` varchar(255) NOT NULL,
        PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        dbDelta($table_name_workshps_up);
    }

    public function down()
    {
        global $wpdb;
        $table_name_workshps = $wpdb->prefix . 'workshops'; 

        $table = "DROP TABLE IF EXISTS " . $table_name_workshps;
        
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($table);

    }
};