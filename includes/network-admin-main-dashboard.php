<?php

function bo_network_admin_calendar(){
   ?><iframe src="https://calendar.google.com/calendar/embed?showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=WEEK&amp;height=700&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=bonline.com_4v1l18bcbtev071ame2dp553lo%40group.calendar.google.com&amp;color=%23182C57&amp;ctz=Europe%2FLondon" style="border-width:0" width="100%" height="700" frameborder="0" scrolling="no"></iframe><?php
}

function bo_my_sites(){
    $sites = get_blogs_of_user(get_current_user_id());
    foreach($sites as $site){
        ?>
            <div class="bo-my-sites-widget">
                <span><?php echo $site->domain; ?></span>
                <span>
                    <a class="mr-1" target="_blank" href="https://<?php echo $site->domain; ?>/wp-admin">Dashboard</a>
                    <a target="_blank" href="https://<?php echo $site->domain; ?>">Visit</a>
                    <a target="_blank" href="<?php echo get_site_url() ?>/wp-admin/network/site-info.php?id=<?php echo $site->site_id; ?>">Edit</a>
                </span>
            </div>
        <?php
    }
}

function bo_create_site(){
    ?>
        <div class="bo-create-site-widget">
            <iframe id="create-site-frame" height="650px" width="100%" src="site-new.php"></iframe>
        </div>
        <script>
            window.addEventListener("load", function() {
                var iframe = document.getElementById('create-site-frame');
                var innerDoc = iframe.contentDocument || iframe.contentWindow.document;
                innerDoc.querySelector("#wpadminbar").style.display = "none";
                innerDoc.querySelector("#wpbody").style.padding = "0px";
                innerDoc.querySelector(".update-nag").style.display = "none";
                innerDoc.querySelector("#add-new-site").style.display = "none";
                iframe.addEventListener("load", () => {
                    let innerDoc = iframe.contentDocument || iframe.contentWindow.document;
                    innerDoc.querySelector("#wpadminbar").style.display = "none";
                    innerDoc.querySelector("#wpbody").style.padding = "0px";
                    innerDoc.querySelector(".update-nag").style.display = "none";
                    innerDoc.querySelector("#add-new-site").style.display = "none";
                })    
            } )
        </script>
    <?php
}

function bo_add_user(){
    ?>
        <div class="bo-create-site-widget">
            <iframe id="add-user-frame" height="340px" width="100%" src="user-new.php"></iframe>
        </div>
        <script>
            window.addEventListener("load", function() {
                var iframe = document.getElementById('add-user-frame');
                var innerDoc = iframe.contentDocument || iframe.contentWindow.document;
                innerDoc.querySelector("#wpadminbar").style.display = "none";
                innerDoc.getElementById("wpbody").style.padding = "0px";
                innerDoc.querySelector(".update-nag").style.display = "none";
                innerDoc.getElementById("wpbody-content").style.padding = "0px";
                innerDoc.querySelector("#add-new-user").style.display = "none";
                iframe.addEventListener("load", () => {
                    let innerDoc = iframe.contentDocument || iframe.contentWindow.document;
                    innerDoc.querySelector("#wpadminbar").style.display = "none";
                    innerDoc.querySelector("#wpbody").style.padding = "0px";
                    innerDoc.querySelector(".update-nag").style.display = "none";
                    innerDoc.querySelector("#add-new-user").style.display = "none";
                })   
            } )
        </script>
    <?php
}

function add_custom_dashboard_widgets() {
    wp_add_dashboard_widget('bo_my_sites', 'My Sites', 'bo_my_sites');
    wp_add_dashboard_widget('bo_create_site', 'Create Site', 'bo_create_site');
    wp_add_dashboard_widget('bo_add_user', 'Add New User', 'bo_add_user');
    wp_add_dashboard_widget('bo_network_admin_calendar', 'Designer Calendar', 'bo_network_admin_calendar');
}