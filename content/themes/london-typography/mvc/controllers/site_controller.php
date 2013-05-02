<?php

class SiteController extends ChesterBaseController {

	public function showPostPreviews(){

		$posts = ChesterWPCoreDataHelpers::getWordpressPostsFromLoop();

		// Render the Posts
		echo $this->renderPage('post_previews', array(
	    	'posts' => $posts,
	    	'next_posts_link' => get_next_posts_link(),
	    	'previous_posts_link' => get_previous_posts_link()
	  	));
	}

	public function showPost() {

		$posts = ChesterWPCoreDataHelpers::getWordpressPostsFromLoop();
	  

		if (isset($posts[0])) {
			echo $this->renderPage('post', array(
		  		'post' => $posts[0],
		  		'next_post_link' => ChesterWPCoreDataHelpers::catchTemplateTag('next_post_link', array('%link', '%title <i class="icon-arrow-right"></i>')),
		  		'previous_post_link' => ChesterWPCoreDataHelpers::catchTemplateTag('previous_post_link',  array('%link', '<i class="icon-arrow-left"></i> %title'))
			));
		}
	}

	protected function getHeaderVars(){
		return array(
	    	'title' => get_bloginfo('blog_title'),
	    	'items' => wp_get_nav_menu_items('Main Navigation')
	    );
	}

	protected function getFooterVars(){
		return array(
		    'widgets' => ChesterWPCoreDataHelpers::catchTemplateTag('dynamic_sidebar',  array('Footer'))
	    );
	}

}

?>
