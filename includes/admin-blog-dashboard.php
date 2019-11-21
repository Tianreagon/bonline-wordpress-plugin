<?php

function bonline_admin_info() {

    $value = get_blog_option( $blog_id, 'designer', $new_field_value );


    //must check that the user has the required capability
    if (!current_user_can('manage_options')) {
        wp_die( __('You do not have sufficient permissions to access this page.') );
      }

      $current_user_id = get_current_user_id();
      $currentUserName = $current_user->user_firstname;
    

      ?>
        <!-- /. NAV SIDE  -->
        <div id="bo-page-wrapper" >
            <div id="bo-page-inner container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-dashboard">
                            <div class="dash-comp-logo">
                                <?php _e( '<img src="//lh3.googleusercontent.com/hvmAJAwiDQNi8gEOtLvWPphcXrze3DhuqKVIG25UNWWCBpilw6ZKAG0iN1w4qDGBpC6S3_vJBmXXx7-DEnAZKSup1wsJYDBl=s0" alt="bOnline logo">' ); ?>
                            </div>
                        </div>
                        <h1><?php _e( 'Welcome to your bOnline dashboard!!!!' ); ?></h1>
            <p><?php _e( 'Here is the information that you need.' ); ?></p>
            </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome <?php echo $currentUserName; ?> ! </strong> Pending Task For Today.
                        </div>
                       
                    </div>
                    </div>
                <!-- /. ROW  -->
                        

                  <!-- /. ROW  --> 
                            <div class="row text-center bo-pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-circle-o-notch fa-5x"></i>
                      <h4>Check Data</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-envelope-o fa-5x"></i>
                      <h4>Mail Box</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-lightbulb-o fa-5x"></i>
                      <h4>New Issues</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>See Users</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-key fa-5x"></i>
                      <h4>Admin </h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="blank.html" >
 <i class="fa fa-comments-o fa-5x"></i>
                      <h4>Support</h4>
                      </a>
                      </div>
                     
                     
                  </div>
              </div>
                 <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                        <div class="alert alert-danger">
                             <strong>Be sure to check that </strong> All the clients infomation is pulled in. <a target="_blank" href="#">Click Here</a>.
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>

<?php 


}

