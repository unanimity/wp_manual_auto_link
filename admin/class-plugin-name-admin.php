<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}






}

add_action('admin_menu', 'add_plugin_page');
function add_plugin_page(){
	add_options_page( 'Настройки AutoLink', 'AutoLink', 'manage_options', 'primer_slug', 'primer_options_page_output' );
}



function primer_options_page_output(){
     ?>
     <textarea rows="10" cols="45" name="autolink_submit_form_text" id="autolink_submit_form_text" style="
    width:  95%;
    background-color: #23282d;
    color: #3284bb;
    text-align: 22px;
    font-size: larger;
    font-weight: 500;
    margin:14px;
"></textarea>

    <form action="" id="ajax_form" style=" margin:14px;">
            <label for="visitor_name"><h3>Запустить автоматическую простановку ссылок (полный цикл)?</h3></label>
            <button type="button" name="autolink_submit_form" id="autolink_submit_form"  class="btn btn-dark">Запустить</button>
    </form>
    
    
    <form action="" id="ajax_form_d_m" style=" margin:40px;">
            <label for="visitor_name"><h3>Удалить "Ctrl+ENTER"</h3></label>
            <button type="button" name="autolink_submit_form_dell_m" id="autolink_submit_form_dell_m"  class="btn btn-dark">Запустить</button>
    </form>
    <form action="" id="ajax_form_d_l" style=" margin:40px;">
            <label for="visitor_name"><h3>Удалить Ссылки</h3></label>
            <button type="button" name="autolink_submit_form_dell_l" id="autolink_submit_form_dell_l"  class="btn btn-dark">Запустить</button>
    </form>
    <form action="" id="ajax_form_i_m" style=" margin:40px;">
            <label for="visitor_name"><h3>Проставить "Ctrl+ENTER"</h3></label>
            <button type="button" name="autolink_submit_form_insert_m" id="autolink_submit_form_insert_m"  class="btn btn-dark">Запустить</button>
    </form>
    <form action="" id="ajax_form_i_l" style=" margin:40px;">
            <label for="visitor_name"><h3>Проставить Ссылки</h3></label>
            <button type="button" name="autolink_submit_form_insert_l" id="autolink_submit_form_insert_l"  class="btn btn-dark">Запустить</button>
    </form>

    <script>
    jQuery( "#autolink_submit_form" ).click(function() {
        // alert('Start coll');
        jQuery( "#autolink_submit_form_text" ).append("Start delete mistape. Waiting . . . \n"); 
    	var data = {
		'action': 'autolink_submit_form_dell_m' ,
		 'log':'off'
    	};
    
    
       jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
          
            jQuery( "#autolink_submit_form_text" ).append(response);
            jQuery(function() {
                // alert('autolink_submit_form_dell_l');
                jQuery( "#autolink_submit_form_text" ).append("Start delete links. Waiting . . . \n");   
            	var data = {
        		'action': 'autolink_submit_form_dell_l' ,
        	    'log':'off'
            	};
            
            
               jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
                    jQuery( "#autolink_submit_form_text" ).append(response);   
                    jQuery(function() {
                         //alert('autolink_submit_form_insert_m');
                        jQuery( "#autolink_submit_form_text" ).append("Start insert mistape. Waiting . . . \n"); 
                    	var data = {
                		'action': 'autolink_submit_form_insert_m' ,
                	    'log':'off'
                    	};
                    
                    
                       jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
                          jQuery( "#autolink_submit_form_text" ).append(response);        
                          jQuery(function() {
                                // alert('autolink_submit_form_insert_l');
                                jQuery( "#autolink_submit_form_text" ).append("Start insert links. Waiting . . . \n"); 
                            	var data = {
                        		'action': 'autolink_submit_form_insert_l' ,
                        	    'log':'off'
                            	};
                            
                            
                               jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
                                     jQuery( "#autolink_submit_form_text" ).append(response);         
                                });
                              
                              
                            });
                           
                       });
                      
                      
                    });
                });
              
              
            });
            
        });
      
      
    });
    
    jQuery( "#autolink_submit_form_dell_m" ).click(function() {
         //alert('autolink_submit_form_dell_m');
        jQuery( "#autolink_submit_form_text" ).append("Start delete mistape. Waiting . . . \n"); 
    	var data = {
		'action': 'autolink_submit_form_dell_m' ,
	    'log':'off'
    	};
    
    
       jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
            jQuery( "#autolink_submit_form_text" ).append(response);         
        });
      
      
    });
    jQuery( "#autolink_submit_form_dell_l" ).click(function() {
         // alert('autolink_submit_form_dell_l');
        jQuery( "#autolink_submit_form_text" ).append("Start delete links. Waiting . . . \n");   

    	var data = {
		'action': 'autolink_submit_form_dell_l' ,
	    'log':'off'
    	};
    
    
       jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
            jQuery( "#autolink_submit_form_text" ).append(response);       
        });
      
      
    });
    jQuery( "#autolink_submit_form_insert_m" ).click(function() {
         //alert('autolink_submit_form_insert_m');
         jQuery( "#autolink_submit_form_text" ).append("Start insert mistape. Waiting . . . \n"); 

    	var data = {
		'action': 'autolink_submit_form_insert_m' ,
	    'log':'off'
    	};
    
    
       jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
          jQuery( "#autolink_submit_form_text" ).append(response);        
        });
      
      
    });
    jQuery( "#autolink_submit_form_insert_l" ).click(function() {
        // alert('autolink_submit_form_insert_l');
        jQuery( "#autolink_submit_form_text" ).append("Start insert links. Waiting . . . \n"); 

    	var data = {
		'action': 'autolink_submit_form_insert_l' ,
	    'log':'off'
    	};
    
    
       jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
             jQuery( "#autolink_submit_form_text" ).append(response);         
        });
      
      
    });
    </script>
    <!-- The result of the search will be rendered inside this div -->
 
    <?php
 
}
/*------------------------------------------------------------------------------------------------------------------------------------*/
// Обработчики по AJAX
/*------------------------------------------------------------------------------------------------------------------------------------*/
//add_action( 'wp_ajax_Autolink_Start', 'Autolink_Start' );
function Autolink_Start() {
   global $wpdb;
   $log=true;
   $count=0;
   $_posts =   $wpdb->get_results('SELECT * FROM wp_users;');
    if($log) {echo "posts:".$_posts."\n";};
    foreach($_posts as $dp)
    {
         

     //   $wc->query("call `new.swiftbook`.clean_pagination('%s','%s');" ,$dp["ID"]  , parce_clear_pagin_next($dp["post_content"]) );

       $count=$count+1;
       echo $dp->ID."\n";
       if($log) {echo "ID:".$dp->ID."\n";};
    }     
        echo  $count;
	wp_die();
}

add_action( 'wp_ajax_autolink_submit_form_dell_m', 'autolink_submit_form_dell_m' );
function autolink_submit_form_dell_m() {
    global $wpdb;
    $start_time = date(time());
    $count=0;
    $log=false; 
    $_posts =   $wpdb->get_results('SELECT * FROM `getMDoc`;');
        if($log) {echo "posts:".$_posts."\n";};
    foreach($_posts as $dp)
    {  if($log) {echo "ID:".$dp->ID."\n";};
       $result= $wpdb->get_results(	$wpdb->prepare( "call  clean_pagination(%s,%s);" ,$dp->ID  ,parce_clear_empty_pre( parce_clear_mistape($dp->post_content)) ));
       if($log) {echo "result:".$result.";\n";};
        $count=$count+1;
     $wpdb->print_error();
    }
   
   echo 'Deleted '.$count.' mistape;'."\n".'Time: '.gmdate("H:i:s", date(time())-$start_time).";\n";
   
	wp_die();
}

add_action( 'wp_ajax_autolink_submit_form_dell_l', 'autolink_submit_form_dell_l' );
function autolink_submit_form_dell_l() {
    global $wpdb;
    $start_time = date(time());
    $count=0;
     $log=false; 
 //   $_posts =   $wpdb->get_results('SELECT * FROM `get_docs`;');
     $_posts= $wpdb->get_results(	$wpdb->prepare("call  get_docs();"  ));
     if($log) {echo "posts:".$_posts."\n";};
    foreach($_posts as $dp)
    {
        $result= $wpdb->get_results(	$wpdb->prepare("call  clean_pagination('%s','%s');" ,$dp->ID  , parce_clear_pagin_next( $dp->post_content) ));
         if($log) {echo "result:".$result."\n";};
        $count=$count+1;
        
    }
   
   echo 'Deleted '.$count.' Pagination ;'."\n".'Time: '.gmdate("H:i:s", date(time())-$start_time).";\n";
   
	wp_die();
}

add_action( 'wp_ajax_autolink_submit_form_insert_m', 'autolink_submit_form_insert_m' );
function autolink_submit_form_insert_m() {
    global $wpdb;
    $start_time = date(time());
    $count=0;
    $_posts =   $wpdb->get_results('SELECT * FROM `get_post_doc`;');
    foreach($_posts as $dp)
    {
        $result= $wpdb->get_results(	$wpdb->prepare("call  insert_mistape('%s');" ,$dp->ID ));
        $count=$count+1;
        
    }
   
   echo 'Insert '.$count.' mistape ;'."\n".'Time: '.gmdate("H:i:s", date(time())-$start_time).";\n";
   
	wp_die();
}

add_action( 'wp_ajax_autolink_submit_form_insert_l', 'autolink_submit_form_insert_l' );
function autolink_submit_form_insert_l() {
    global $wpdb;
    $start_time = date(time());
    $log=false;
    $link_pre=site_url()."/content/";
    $count=0;
    $list[0]=[

        "link"=>'',
        "num"=>0,
        "caption"=>'',
        "parts"=>''

    ];
    
    $_posts =   $wpdb->get_results('SELECT * FROM `get_post_0_lvl` group by ID;');
    if($log) {echo "result:".$_posts."\n";};
    foreach($_posts as $dp)
    {
        

        if($log) {echo "post_name:". $dp->post_name."\n";};
        
        $list[$count]["link"]=$link_pre . $dp->post_name;
        $list[$count]["num"]=$dp->ID;
        $list[$count]["caption"]=$dp->post_title;
        $list[$count]["parts"]=$dp->term_taxonomy_id;
        $parent=$dp->post_name;
        if($log) {echo "list[count][link]:". $list[$count]["link"]."\n";};
 
 
        
        $result= $wpdb->get_results(	$wpdb->prepare("call get_post_n_lvl('%s');", $dp->ID));

        $count=$count+1;

        foreach($result as $cp)
        {
           
            $list[$count]["link"]=$link_pre . $parent. '/' . $cp->post_name;
            if($log) {echo " get_post_n_lvl link:".$list[$count]["link"]."\n";};
            $list[$count]["num"]=$cp->ID;
            $list[$count]["caption"]=$cp->post_title;
            $list[$count]["parts"]=$dp->term_taxonomy_id;

           $count=$count+1;
        }


    }
    
    for ($i=1; $i< $count-2; $i++){

  

      if ( $list[$i]["parts"]!=$list[$i+1]["parts"]) {

          $result= $wpdb->get_results(	$wpdb->prepare(" call insert_link_to_article('%s','%s','%s','%s','%s','%s','%s');" ,$list[$i]["num"]
              ,$list[$i-1]["link"],$list[$i-1]["num"],$list[$i-1]["caption"]
              ,'#',0,' '));


      } else
          if ($list[$i]["parts"]!=$list[$i-1]["parts"]) {

             $result= $wpdb->get_results(	$wpdb->prepare(" call insert_link_to_article('%s','%s','%s','%s','%s','%s','%s');" ,$list[$i]["num"]
                  ,'#',0,' '
                  ,$list[$i+1]["link"],$list[$i+1]["num"],$list[$i+1]["caption"]));

          } else {

              $result= $wpdb->get_results(	$wpdb->prepare(" call insert_link_to_article('%s','%s','%s','%s','%s','%s','%s');" ,$list[$i]["num"]
                  ,$list[$i-1]["link"],$list[$i-1]["num"],$list[$i-1]["caption"]
                  ,$list[$i+1]["link"],$list[$i+1]["num"],$list[$i+1]["caption"]));

          }



    }
    
    
   echo 'Insert '.$count.' links ;'."\n".'Time: '.gmdate("H:i:s", date(time())-$start_time).";\n";
   
	wp_die();
}
/*------------------------------------------------------------------------------------------------------------------------------------*/
// Впомагательные функции парсеры и т д
/*------------------------------------------------------------------------------------------------------------------------------------*/
function parce_clear_empty_pre($s)
{

    $pattern = '/<pre><code class="swift language-swift"><\/code><\/pre>/i';
    $replacement = '';
    $s= preg_replace($pattern, $replacement, $s);
    return $s;

}
function parce_clear_mistape($s)
{

    $pattern = '/<div class="mistape_caption"><p>Если вы нашли ошибку, пожалуйста, выделите фрагмент текста и нажмите <em>Ctrl\+Enter<\/em>\.<\/p><\/div>/i';
    //TODO -- modernisation regexp
    $replacement = '';
    $s= preg_replace($pattern, $replacement, $s);
    return $s;

}
function parce_clear_pagin_next($s)
{


    $pattern = '/<section.+id="next_previous".+>(.*|\n)*?<\/section>/i';
    $replacement = '';
    $s= preg_replace($pattern, $replacement, $s);

    return $s;

}