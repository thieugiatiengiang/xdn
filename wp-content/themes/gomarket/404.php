<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage RoeDok
 * @since WD_Responsive
 */	
get_header(); ?>
		<div class="top-page">
			<?php dimox_breadcrumbs();?>
		</div>	
		<div id="container" class="page-container container-404">
			<div id="content" role="main" class="container">		
				<div id="container-main" class="span18">
					<div class="main-content omega alpha">
						
						<div class="entry-content">
							<h1 class="heading_404">RẤT TIẾC, TRANG BẠN TÌM KIẾM KHÔNG TỒN TẠI</h1>
							<div class="alert alert-info">
								<p><strong><?php 
										_e( 'Đường dẫn bạn nhập không chính xác, chúng đã bị gỡ bỏ hoặc chuyển sang một liên kết mới. ', 'wpdance');
										_e('Thử các giải pháp dưới đây:', 'wpdance' ); 
									?></strong></p>
								<ul class="listing-style listing-style-3">
									<li><?php _e('1. Ấn nút back để quay về trang trước .','wpdance')?></li>
									<li><?php _e('2. Quay về trang chủ','wpdance')?></li>
									<li><?php _e('3. Nếu bạn cần hỗ trợ, xin liên hệ hotline 0965.479.108','wpdance')?></li>
								</ul>
							</div>
						</div>
					</div>
				</div><!-- end content -->
				
				<div id="right-sidebar" class="span6">
					<div class="right-sidebar-content alpha omega">
					<?php
						if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
							<ul class="xoxo">
								<?php dynamic_sidebar( 'primary-widget-area' ); ?>
							</ul>
					<?php endif; ?>
					</div>
				</div><!-- end right sidebar -->
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_footer(); ?>
