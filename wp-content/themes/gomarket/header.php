<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Roedok
 * @since WD_Responsive
 **/
?><!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en-US"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en-US"> <![endif]-->
<?php 
global $is_IE;
$ie_id ='';
if($is_IE){
	$ie_id='id="wd_ie"';
}
?>
<html <?php echo $ie_id; ?> <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'wpdance' ), max( $paged, $page ) );

	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php theme_icon();?>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>


<!--Script tuyết rơi Noel
<script type="text/javascript">
document.write('<style type="text/css">body{padding-bottom:20px}</style><img style="position:fixed;z-index:9999;top:0;left:0" src="http://ibuyonline.vn/wp-content/uploads/2014/12/ibuyonline-tet-top-left.png" _cke_saved_src="http://ibuyonline.vn/wp-content/uploads/2014/12/ibuyonline-tet-top-left.png"/><img style="position:fixed;z-index:9999;top:0;right:0" src="http://ibuyonline.vn/wp-content/uploads/2014/12/ibuyonline-tet-top-right.png"/><div style="position:fixed;z-index:9999;bottom:-50px;left:0;width:100%;height:104px;background:url(http://ibuyonline.vn/wp-content/uploads/2014/12/ibuyonline-noel-vn-footer.png) repeat-x bottom left;"></div><img style="position:fixed;z-index:9999;bottom:20px;left:20px" src="http://ibuyonline.vn/wp-content/uploads/2014/12/ibuyonline-tet-bottom-left.png"/>');
var no=100;var hidesnowtime=0;var snowdistance='pageheight';var ie4up=(document.all)?1:0;var ns6up=(document.getElementById&&!document.all)?1:0;function iecompattest(){return(document.compatMode&&document.compatMode!='BackCompat')?document.documentElement:document.body}var dx,xp,yp;var am,stx,sty;var i,doc_width=800,doc_height=600;if(ns6up){doc_width=self.innerWidth;doc_height=self.innerHeight}else if(ie4up){doc_width=iecompattest().clientWidth;doc_height=iecompattest().clientHeight}dx=new Array();xp=new Array();yp=new Array();am=new Array();stx=new Array();sty=new Array();for(i=0;i<no;++i){dx[i]=0;xp[i]=Math.random()*(doc_width-50);yp[i]=Math.random()*doc_height;am[i]=Math.random()*20;stx[i]=0.02+Math.random()/10; sty[i]=0.7+Math.random();if(ie4up||ns6up){document.write('<div id="dot'+i+'" style="POSITION:absolute;Z-INDEX:'+i+';VISIBILITY:visible;TOP:15px;LEFT:15px;"><span style="font-size:18px;color:#FFFFFF">*</span><\/div>')}}function snowIE_NS6(){doc_width=ns6up?window.innerWidth-10:iecompattest().clientWidth-10;doc_height=(window.innerHeight&&snowdistance=='windowheight')?window.innerHeight:(ie4up&&snowdistance=='windowheight')?iecompattest().clientHeight:(ie4up&&!window.opera&&snowdistance=='pageheight')?iecompattest().scrollHeight:iecompattest().offsetHeight;for(i=0;i<no;++i){yp[i]+=sty[i];if(yp[i]>doc_height-50){xp[i]=Math.random()*(doc_width-am[i]-30);yp[i]=0;stx[i]=0.02+Math.random()/10;sty[i]=0.7+Math.random()}dx[i]+=stx[i];document.getElementById('dot'+i).style.top=yp[i]+'px';document.getElementById('dot'+i).style.left=xp[i]+am[i]*Math.sin(dx[i])+'px'}snowtimer=setTimeout('snowIE_NS6()',10)}function hidesnow(){if(window.snowtimer){clearTimeout(snowtimer)}for(i=0;i<no;i++)document.getElementById('dot'+i).style.visibility='hidden'}if(ie4up||ns6up){snowIE_NS6();if(hidesnowtime>0)setTimeout('hidesnow()',hidesnowtime*1000)}
</script>
-->

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3QOdaIygw0l1UOMoG3Ka1kA4h9nTi3Vc";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->


</head>

<?php
	global $is_iphone,$wd_data,$page_datas;
	$enable_custom_preview = absint($wd_data['wd_preview_panel']);
	$wd_layout_style = '';
	if($wd_data['wd_layout_style'] != ''){
		$wd_layout_style .= $wd_data['wd_layout_style'];
	}
?>

<body <?php body_class($wd_layout_style); ?>>

<!--Google Analytics Code -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43756032-6', 'auto');
  ga('send', 'pageview');

</script>

<?php
	if( $enable_custom_preview && !is_admin() && !$is_iphone && !wp_is_mobile() /*&& !preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) */){	
		previewPanel();
	}	
	$header_layout = '';
	if(strcmp($page_datas['page_layout'],'wide') == 0){
		if($page_datas['header_layout'] == '0') { 
			$header_layout = ' class="wd_box"'; 
		} else { 
			$header_layout = ' class="wd_'.$page_datas['header_layout'].'"'; 
		}
	}	
?>
<div class="main-template-loader"></div>
<div id="template-wrapper" class="hfeed">
	<div id="header" <?php echo $header_layout; ?>>
		<div class="header-container">
			<?php do_action( 'wd_header_init' ); ?>
		</div>
	</div><!-- end #header -->

	<?php do_action( 'wd_bofore_main_container' ); ?>

	<div id="main-module-container">