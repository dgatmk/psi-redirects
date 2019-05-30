<?php
/**
 * Blog post redirects
 *   Redirecting WordPress posts in specific categories to a new location
 *
 * Created: 29 May 2019
 *      By: DG @ MKR
 */

// Use filter to add allowable locations that WP can redirect to.
// Whitelist external domains below.
function psi_allowed_redirect_hosts($content){
	$content[] = 'blog.psionline.com';
	return $content;
}
add_filter( 'allowed_redirect_hosts' , 'psi_allowed_redirect_hosts' , 10 );

// Redirection of posts in certain categories
//   Categroies we're redirecting: certification-licensing, education, and  talent-measurement
function psi_blog_cat_redirect() {
	// Location of redirect
	$new_domain = 'https://blog.psionline.com/' ;
	
	if ( is_single() ) { // Redirect only for single (posts)
		$cat_slug = ''; // Clear it, and use it as check below

		// The categories each redirect to different URL structures. We build those here.
		if ( in_category( 'certification-licensing' ) ) {
			$cat_slug = 'certification';
		} else if ( in_category( 'education' ) ) {
			$cat_slug = 'education';
		} else if ( in_category( 'talent-measurement' ) ) {
			$cat_slug = 'talent';
		}

		// Make sure post was in one of the redirect categories -- at this point it's just easiest to just check the $cat_slug
		if ( '' != $cat_slug ) {			
			// Get post slug and build URL for redirect
			$post_slug = get_post_field( 'post_name', get_post() );
			$new_url = $new_domain . $cat_slug . '/blog/' . $post_slug;
			
			// Redirect with 301 status. exit -because wp_safe_redirect doesn't exit automatically.
			wp_safe_redirect( $new_url, '301' );
			exit;
		}
	}
}
add_action( 'template_redirect', 'psi_blog_cat_redirect' );

?>