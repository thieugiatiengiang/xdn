<?php
/**
 * @package WordPress
 * @subpackage TechGo
 * @since WD_Responsive
 **/
 //error_reporting("-1");
$_template_path = get_template_directory();
require_once $_template_path."/theme/theme.php";
$theme = new Theme(array(
	'theme_name'	=>	"GoMarket",
	'theme_slug'	=>	'gomarket'
));
$theme->init();

/**
 * Slightly Modified Options Framework
 */
require_once ('admin/index.php');

function ilc_mce_buttons($buttons){
  array_push($buttons,
     "backcolor",
     "anchor",
     "hr",
     "sub",
     "sup",
     "fontselect",
     "fontsizeselect",
     "styleselect",
     "cleanup"
);
  return $buttons;
}
add_action( 'woocommerce_after_add_to_cart_button', 'ibuy_call_to_order', 50 );function ibuy_call_to_order(){echo "<a href='#contact_form_pop' class='ibuycall fancybox'> Mua Ngay </a><div style='display:none' class='fancybox-hidden'></form><div id='contact_form_pop'>";echo do_shortcode('[contact-form-7 id="4171" title="Mua Ngay"]'); echo "</div></div>";}
?>

