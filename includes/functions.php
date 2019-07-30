<?php
add_action('admin_menu', 'wpfkrDashboard');
function wpfkrDashboard(){
    add_menu_page( 'wpfkr dashboard', 'wp faker', 'manage_options', 'wpfkr-dashboard', 'wpfkrMainDashboard',plugin_dir_url( __DIR__ ).'admin/images/logo-plugin.png',58);
    add_submenu_page ( 'wpfkr-dashboard', 'Users', 'Users', 'read', 'wpfkr-users', 'wpfkrUsers');
    add_submenu_page ( 'wpfkr-dashboard', 'Posts', 'Posts', 'read', 'wpfkr-posts', 'wpfkrPosts');
    add_submenu_page ( 'wpfkr-dashboard', 'Products', 'Products', 'read', 'wpfkr-products', 'wpfkrProducts');
    add_submenu_page ( 'wpfkr-dashboard', 'Thumbnails', 'Thumbnails', 'read', 'wpfkr-thumbnails', 'wpfkrThumbnails');
}
function wpfkrMainDashboard(){
    include( WP_PLUGIN_DIR.'/'.plugin_dir_path(WPFKR_PLUGIN_BASE_URL) . 'admin/template/wpfkr-dashboard.php');
}
function dcs_print($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

add_action('admin_bar_menu', 'wpfkr_add_toolbar_items', 100);
function wpfkr_add_toolbar_items($admin_bar){
    $admin_bar->add_menu( array(
        'id'    => 'wpfkrManageDummyData',
        // 'title' => 'Manage dummy data',
        'title' => '<span class="ab-icon dashicons dashicons-hammer"></span>' . _( 'Manage dummy data' ),
        'href'  => 'javascript:void(0)',
        'meta'  => array(
            'title' => __('Manage dummy data'),            
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'wpfkrDeleteUsers',
        'parent' => 'wpfkrManageDummyData',
        'title' => 'Delete Dummy Users',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Delete Dummy Users generated by wp faker '),
            'class' => 'wpfkrDeleteUsers wpfkrDataCleaner'
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'wpfkrDeletePosts',
        'parent' => 'wpfkrManageDummyData',
        'title' => 'Delete Dummy Posts',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Delete Dummy Posts generated by wp faker '),
            'class' => 'wpfkrDeletePosts wpfkrDataCleaner'
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'wpfkrDeleteProducts',
        'parent' => 'wpfkrManageDummyData',
        'title' => 'Delete Dummy Products',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Delete Dummy Products generated by wp faker '),
            'class' => 'wpfkrDeleteProducts wpfkrDataCleaner'
        ),
    ));
    $admin_bar->add_menu( array(
        'id'    => 'wpfkrDeleteThumbnails',
        'parent' => 'wpfkrManageDummyData',
        'title' => 'Delete Dummy Thumbnails',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Delete Dummy Thumbnails generated by wp faker '),
            'class' => 'wpfkrDeleteThumbnails wpfkrDataCleaner'
        ),
    ));
}
