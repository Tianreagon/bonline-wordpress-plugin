<?php 

    /*
     * Adding White Label Branding for Dashboard
     */

    // Remove some non-sense meta boxes
    function remove_dashboard_meta_boxes(){
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        // Remove the welcome panel
        remove_action('welcome_panel', 'wp_welcome_panel');
    }
    add_action('wp_dashboard_setup', 'remove_dashboard_meta_boxes');

    function admin_logo() {
        echo '<br/> <img style="margin: 2rem" src="' .plugins_url('../assets/images/bOnline-logo.png', __FILE__). '"/>';  
    }

    function remove_wp_logo( $wp_admin_bar ){
        $wp_admin_bar->remove_node( 'wp-logo' );
    }
    add_action( 'admin_bar_menu', 'remove_wp_logo', 100 );
    
    function add_bonline_logo( $wp_admin_bar ) {
        $args = array(
            'id'    => 'bonline-logo',
            'meta'  => array( 'class' => 'bonline-logo', 'title' => 'bonline logo' )
        );
        $wp_admin_bar->add_node( $args );
    }
    add_action( 'admin_bar_menu', 'add_bonline_logo', 1 );

    function bo_remove_nags(){
        if(!is_super_admin()){
            function remove_core_updates(){
                global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
            }
                add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
                add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
                add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes
                ?>  <script>
                        window.addEventListener("load", () => {
                            document.querySelectorAll(".notice").forEach(node => node.style.display = "none")
                        })
                    </script> <?php
        }
    }


    function bo_show_all_pages_widget(){
        ?>
            <ul>
                <li>
                    <span>Page Title</span>
                    <span>Last Modified</span>
                </li>
               <?php wp_list_pages( array(
                   'title_li' => '',
                   'show_date'   => 'modified' )); ?>
            </ul>
        <?php
    }

    function bo_add_as_admin_widget(){
        if(current_user_can("bonline-designers")){
            ?>  
                <div style="position: relative; height: 40px; ">
                    <a style="position: absolute; left: 50%; transform: translateX(-50%);" href="<?php echo esc_url( add_query_arg( 'admin', 'true' ) ) ?>" class="btn btn-primary">Add Current User As Admin</a>
                </div>
            <?php
            if(isset($_GET['admin'])){
                add_user_to_blog( get_current_blog_id(), get_current_user_id(), 'administrator' );
            }
        }
    }

    function bo_quick_links_widget(){
        ?>
            <ul>
                <li><a href="/wp-admin/edit.php?post_type=page" target="_blank">&bull;  All Pages</a></li>
                <li><a href="/wp-admin/options-general.php" target="_blank">&bull;  General Settings</a></li>
                <li><a href="/wp-admin/upload.php" target="_blank">&bull;  Media Library</a></li>
                <li><a href="/wp-admin/customize.php?et_customizer_option_set=theme" target="_blank">&bull;  Theme Customizer</a></li>
                <?php 
                    if(current_user_can("bonline-designers")){
                        ?>
                            <li><a href="/wp-admin/users.php" target="_blank">&bull;  Users</a></li>
                            <li><a href="/wp-admin/plugins.php" target="_blank">&bull;  Plugins</a></li> 
                        <?php
                    }
                    if(current_user_can("administrator")){
                        ?>
                            <li><a href="/wp-admin/admin.php?page=et_divi_options" target="_blank">&bull;  Theme Options</a></li>
                        <?php
                    }
                ?>
                <li></li>
                <li></li>
            </ul>
        <?php
    }

    function add_individual_sites_dashboard_widgets() {
        wp_add_dashboard_widget('bo_show_all_pages_widget', 'My Pages', 'bo_show_all_pages_widget');
        wp_add_dashboard_widget('bo_quick_links_widget', 'Quick Links', 'bo_quick_links_widget');
        if(current_user_can("bonline-designers")){
            wp_add_dashboard_widget('bo_add_as_admin_widget', 'Add As Admin', 'bo_add_as_admin_widget');
        }
    }