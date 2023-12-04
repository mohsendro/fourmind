<?php

if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

// Table: table-workshop - جدول کارگاه

// Plugin menu callback function
function table_workshop_list_table_init() {

    // Creating an instance   
    $tableWorkshop = new Table_Workshop_List_Table();

    echo "<div class='wrap'>";
      echo "<h1 class='wp-heading-inline'>رزرو کارگاه‌ها</h1>";
      echo "<hr class='wp-header-end'>";
          // Prepare table
          $tableWorkshop->prepare_items();
          echo "<form method='get'>";
                echo "<input type='hidden' name='page' value='table-sample' />";
                $tableWorkshop->search_box('جستجو', 'search_id');
                //Display table
                // if( isset( $_GET['table_sample_id'] ) ) {
                      $tableWorkshop->display();
                // } else {
                    //   echo 'پیغام دلخواه...';
                // }
          echo "</form>";
    echo "</div>";

}
table_workshop_list_table_init();


// Loading table class
if( !class_exists('WP_List_Table') ) {

    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');

}

// Extending class
class Table_Workshop_List_Table extends WP_List_Table {

    private $table_data;

    private function get_table_workshop_data($search = "") {

        $TableWorkshopController = new \App\Controllers\ReservationController;
        $this->table_data = $TableWorkshopController::archive();
        return $this->table_data;
          
    }

    // Define table columns
    function get_columns() {

          $columns = array(
                // 'cb'           => '<input type="checkbox" />',
                'ID'          => 'شناسه',
                'course_id'   => 'شناسه کارگاه',
                'full_name'   => 'نام',
                'job'         => 'شغل',
                'tel'         => 'تلفن' ,
                'email'       => 'ایمیل',
                'more'        => '',
          );
          return $columns;

    }

    // Bind table with columns, data and all
    function prepare_items() {

          if ( isset( $_GET['page'] ) && isset( $_GET['s'] ) ) {
            $this->table_data = $this->get_table_workshop_data($_GET['s']);
          } else {
            $this->table_data = $this->get_table_workshop_data();
          }

          $columns = $this->get_columns();
          $hidden = array();
          $sortable = $this->get_sortable_columns();
          $this->_column_headers = array($columns, $hidden, $sortable);

          /* pagination */
          $per_page = $this->get_items_per_page('table_workshop_per_page', 20);
          $current_page = $this->get_pagenum();
          $total_items = count($this->table_data);

          // edit
          // if (isset($_GET['action']) && $_GET['page'] == "table_sample" && $_GET['action'] == "edit") {
          //       $empID = intval($_GET['employee']);

          //       //... do operation
          // }

          // delete
          // if (isset($_GET['action']) && $_GET['page'] == "table_sample" && $_GET['action'] == "delete") {
          //       $empID = intval($_GET['employee']);

          //       //... do operation
          // }

          // bulk action
          // if (isset($_GET['action']) && $_GET['page'] == "table_sample" && $_GET['action'] == "delete_all") {
          //       $empIDs = $_GET['user'];
                
          //       //... do operation
          // }

          // if (isset($_GET['action']) && $_GET['page'] == "table_sample" && $_GET['action'] == "draft_all") {
          //       $empIDs = $_GET['user'];
                
          //       //... do operation
          // }

          $this->table_data = array_slice($this->table_data, (($current_page - 1) * $per_page), $per_page);

          $this->set_pagination_args(array(
                'total_items' => $total_items, // total number of items
                'per_page'    => $per_page // items to show on a page
          ));

          // $this->table_data = $this->get_table_workshop_data();
          // $this->items = $this->table_data;
          $this->items = $this->table_data;

    }

    // bind data with column
    function column_default($item, $column_name) {       

        switch ($column_name) {

            case 'ID':
                return $item['ID'];

            case 'course_id':
                return "<a href='". admin_url('post.php?post='.$item['course_id'].'&action=edit') ."'>". get_the_title($item['course_id']) ."</a>";

            case 'full_name':
                return $item['full_name'];                       

            case 'job':
                return $item['job'];

            case 'tel':
                return $item['tel'];

            case 'email':
                return $item['email'];

            case 'more':
                return "<a href='". admin_url('admin.php?page=workshops&ID='.$item['ID']) ."'>جزئیات</a>";

            default:
                return print_r($item, true); //Show the whole array for troubleshooting purposes

        }

    }

    // To show checkbox with each row
    function column_cb($item) {

          return sprintf(
                '<input type="checkbox" name="order[]" value="%s" />',
                $item->ID
          );

    }

    // Add sorting to columns
    protected function get_sortable_columns() {

          $sortable_columns = array(
                // 'ID'           => array('ID', false),
                // 'post_author'  => array('post_author', false),
                // 'post_date'    => array('post_date', false),
                // 'post_title'   => array('post_title', false),
                // 'post_content' => array('post_content', false),
                // 'post_status'  => array('post_status', false),
          );
          return $sortable_columns;

    }

    // Adding action buttons to column
    // function column_ID($item) {

        //   $actions = array(
        //         'edit'      => sprintf('<a href="?page=%s&action=%s&employee=%s">Edit</a>', $_REQUEST['page'], 'edit', $item->ID),
        //         'delete'    => sprintf('<a href="?page=%s&action=%s&employee=%s">Delete</a>', $_REQUEST['page'], 'delete', $item->ID),
        //   );

        //   return sprintf('%1$s %2$s', $item->ID, $this->row_actions($actions));

    // }

    // To show bulk action dropdown
    // function get_bulk_actions() {

        //   $actions = array(
        //       'edit_all'      => "ویرایش",
        //       'draft_all'     => "پیشنویس",
        //       'delete_all'    => 'انتقال به زباله‌دان',
        //   );
        //   return $actions;

    // }

}