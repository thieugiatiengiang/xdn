<?php 
class CustomFields extends AdminTheme 
{
	public function __construct(){
		add_action("admin_init", array($this,"generateCustomFields"));
		define('THEME_ADMIN_CUSTMOM_FIELDS_TPL', THEME_ADMIN_TPL . '/custom_fields');
		add_action('save_post', array($this,'saveCustomField'));
		$this->resetArrLayout();
	}
	
	public function generateCustomFields(){
		// Add shortcode Generator

		add_meta_box("page_config", "Page Configuration", array($this,"page_configuration"), "page", "normal", "high");

		
		if(post_type_exists('product')) {
			add_meta_box("wp_cp_custom_product_layout", "Config Product", array($this,"product_layout"), "product", "normal", "high");
		}	
		if(post_type_exists('testimonial')) {		
			add_meta_box("wp_cp_custom_testimonial", "Username", array($this,"custom_field_testimonial"), "testimonial", "normal", "high");
		}
	}
	
	
	public function product_layout(){
		require_once THEME_ADMIN_CUSTMOM_FIELDS_TPL.'/custom_layout.php';
	}
	
	/* 
		Save config of custom fields for current post
		Input : int $post_id (the id of current post).
		No output.
	*/
	public function saveCustomField($post_id){
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;
		if(isset($_POST['_inline_edit'])) 
        return $post_id;
		if( isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'list' )
			return $post_id;	
		if( isset($_REQUEST['action']) &&  $_REQUEST['action'] == 'trash' )
			return $post_id;			
		// Save featured for post
		if(isset($_POST['featured_post']))
			update_post_meta($post_id,THEME_SLUG.'featured_post',$_POST['featured_post']);
			


		// Save layout for custom page
		if(isset($_POST['custom_page_layout']))
			update_post_meta($post_id,THEME_SLUG.'custom_page_layout',$_POST['custom_page_layout']);
			
		// Save product custom layout & sidebar
		if( isset($_POST['custom_product_layout']) && $_POST['custom_product_layout'] == "custom_single_prod_layout" ){
			$_default_prod_config = array(
				'layout' 					=> $_POST['single_layout']
				,'left_sidebar' 			=> $_POST['single_left_sidebar']
				,'right_sidebar' 			=> $_POST['single_right_sidebar']		
			);		
			$ret_str = serialize($_default_prod_config);
			update_post_meta($post_id,THEME_SLUG.'custom_product_config',$ret_str);	
		}
		
		if(isset($_POST['custom_sidebar']))
			update_post_meta($post_id,THEME_SLUG.'custom_sidebar',$_POST['custom_sidebar']);
		
		if(isset($_POST['username_twitter_testimonial']))
			update_post_meta($post_id,THEME_SLUG.'username_twitter_testimonial',$_POST['username_twitter_testimonial']);		
			
		// Save Gallery for slideshow
		if(isset($_POST['gal_slideshow']))
			update_post_meta($post_id,THEME_SLUG.'gal_slideshow',$_POST['gal_slideshow']);
		
		// Save select for ew_slideshow
		if(isset($_POST['slideshow_post']))
			update_post_meta($post_id,THEME_SLUG.'slideshow_post',$_POST['slideshow_post']);		
			
		// Save select for video


		// Save logo icon for service
		if(isset($_POST['ew_service_custom_logo']))
			update_post_meta($post_id,THEME_SLUG.'ew_service_custom_logo',$_POST['ew_service_custom_logo']);		

	
	
		
		if ( isset($_POST['_page_config']) && (int)$_POST['_page_config'] == 1 && wp_verify_nonce($_POST['nonce_page_config'],'_update_page_config') ){
			$_post_params = array(
										"page_layout" 			=> $_POST['page_layout']
										,"main_content_layout"	=> $_POST['main_content_layout']
										,"header_layout"		=> $_POST['header_layout']
										,"footer_layout"		=> $_POST['footer_layout']
										,"main_slider_layout"	=> $_POST['main_slider_layout']
										,"banner_layout"		=> $_POST['banner_layout']
										,"page_column" 			=> $_POST['page_column']
										,"left_sidebar" 		=> $_POST['left_sidebar']
										,"right_sidebar" 		=> $_POST['right_sidebar']
										,"page_slider" 			=> $_POST['page_slider']
										,"page_revolution" 		=> $_POST['page_revolution']
										,"page_flex" 			=> $_POST['page_flex']
										,"page_nivo" 			=> $_POST['page_nivo']
										,"product_tag" 			=> $_POST['product_tag']
										,"portfolio_columns" 	=> absint($_POST['portfolio_columns'])
										,"portfolio_filter"		=> absint($_POST['portfolio_filter'])
										,"toggle_vertical_menu" 	=> absint($_POST['toggle_vertical_menu'])
										,"hide_breadcrumb" 		=> absint($_POST['hide_breadcrumb'])
										,"hide_title" 			=> absint($_POST['hide_title'])
										,"hide_ads" 			=> absint($_POST['hide_ads'])
										,"hide_slider_hot_product"			=> absint($_POST['hide_slider_hot_product'])
									);
			//die(print_r($_post_params));						
			$_post_params = wd_array_atts(array(
										"page_layout" 			=> '0'
										,"main_content_layout"	=> 'box'
										,"header_layout"		=> 'box'
										,"footer_layout"		=> 'box'
										,"main_slider_layout"	=> 'box'
										,"banner_layout"		=> 'box'
										,"page_column"			=> '0-1-0'
										,"left_sidebar" 		=>'primary-widget-area'
										,"right_sidebar" 		=> 'primary-widget-area'
										,"page_slider" 			=> 'none'
										,"page_revolution" 		=> ''
										,"page_flex" 			=> ''
										,"page_nivo" 			=> ''		
										,"product_tag" 			=> ''	
										,"portfolio_columns" 	=> 1
										,"portfolio_filter"		=> 1
										,"toggle_vertical_menu"	=> 1
										,"hide_breadcrumb" 		=> 0		
										,"hide_title" 			=> 0											
										//,"hide_ads" 			=> 0
										,"hide_slider_hot_product"			=> 1	
									),$_post_params	);					
			$ret_str = serialize($_post_params);			
			
			update_post_meta($post_id,THEME_SLUG.'page_configuration',$ret_str);	
		}		
		
			
	}
	
	/* 
		Load shortcode options for shortcode generator.
		Options.php file is placed in 'includes' folder.
	*/ 
	public function loadShortcodeOptions(){
		global $post;
		if(file_exists(THEME_EXTENDS_ADMIN.'/includes/shortcode_options_'.$post->post_type.'.php'))
			require_once THEME_EXTENDS_ADMIN.'/includes/shortcode_options_'.$post->post_type.'.php';
		else	
			require_once THEME_ADMIN.'/includes/shortcode_options_'.$post->post_type.'.php';
	}
	

	
	/* Generate logo image field */
	public function show_custom_logo(){
		global $post;
		$image = get_template_directory_uri().'/framework/admin/images/default_logo.png';	
		$meta = get_post_meta($post->ID, THEME_SLUG.'ew_service_custom_logo', true);
		$metaLink = get_post_meta($post->ID, THEME_SLUG.'ew_service_custom_link', true);
		echo '<span class="custom_default_image" style="display:none">'.$image.'</span>';
		if ($meta) {
			$image = wp_get_attachment_image_src($meta, 'medium');	$image = $image[0]; 
		}		

		echo	'<span>Custom link : </span><input name="ew_service_custom_link" type="text" value="'.$metaLink.'" size="50"/><br>';	
		echo	'<input name="'.ew_service_custom_logo.'" type="hidden" class="custom_upload_image" value="'.$meta.'" />
				<img src="'.$image.'" class="custom_preview_image" alt="" /><br />
				<input class="custom_upload_image_button button" type="button" value="Choose Image" />
				<small>&nbsp;<a href="#" class="custom_clear_image_button">Remove Image</a></small>
				<br clear="all" /><span class="description">Upload your logo here</span>
				<br>';
		
				
				
	}
	
	
	/* Generate 'seo' field */
	public function createSeoMeta(){
		require_once THEME_ADMIN_CUSTMOM_FIELDS_TPL.'/seo_meta.php';
	}
	
	/* Generate 'custom layout' panel for chosing layout of post(portfolio) */
	public function createCustomLayout(){
		require_once THEME_ADMIN_CUSTMOM_FIELDS_TPL.'/custom_layout.php';
	}

	public function page_configuration(){
		require_once THEME_ADMIN_CUSTMOM_FIELDS_TPL.'/page_configuration.php';
	}
		
	public function custom_field_testimonial(){
		require_once THEME_ADMIN_CUSTMOM_FIELDS_TPL.'/testimonial.php';
	}
}
?>