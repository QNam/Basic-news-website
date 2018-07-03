<?php

function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

ob_start("sanitize_output");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	define('DOMAIN','http://'.$_SERVER['HTTP_HOST'].'/news.com');
	if ( isset($post_seo_title) && isset($post_description) ) {
		$header_seo_title =  $post_seo_title;
		$header_description = $post_description;
	} else{
		$header_seo_title = "QNamcoder - Xạo lìn về lập trình";
		$header_description = "Website về lập trình, công nghệ, kinh nghiệm lập trình cá nhân";
	}	
	?>
		<title><?= $header_seo_title ?></title>
		<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
		<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
		<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" media="none" onload="media='all'" />
		<meta name="description" content="<?= $header_description ?>"/>
	  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="canonical" href="#" />	
	  	<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?= $header_seo_title ?>" />
		<meta property="og:description" content="<?= $header_description ?>" />
		<meta property="og:url" content="<?= DOMAIN?>" />
		<meta property="og:site_name" content="Lập trình" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?= $header_description ?>" />
		<meta name="twitter:title" content="<?= $header_seo_title ?>" />  
		<!-- ------------------------------------------------------------------- -->
	<?php if ( isset($category_name) && isset($create_date) && isset($update_date) ): ?>
		<?php
			$header_category = $category_name;
			$header_create_date = $create_date;
			$header_update_date = $create_date;
		?>
		<meta property="article:tag" content="<?= $header_category ?>" />
		<meta property="article:section" content="<?= $header_category ?>" />
		<meta property="article:published_time" content="<?= $header_create_date ?>" />
		<meta property="article:modified_time" content="<?= $header_update_date ?>" />
		<meta property="og:updated_time" content="<?= $header_update_date ?>" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?= $header_description ?>" />
		<meta name="twitter:title" content="<?= $header_seo_title ?>" />	
	<?php endif ?>
	  	<style type="text/css">
	  	*{
	  		margin: 0px;
	  		padding: 0px;
	  	}
	  	html {
			height: 100%;
			box-sizing: border-box;
		}
		
	  	body{
			position: relative;
			margin: 0;
			padding-bottom: 6rem;
			min-height: 100%;
	  	}
		.bg-333{
			background-color: #333;
		}
		.text-dark{
			color: #000;
		}
		.text-dark:hover{
			color:#50596c;
		}

		.text-link-dark{
			color: #000;
			text-decoration: none!important;
		}
		.text-link-dark:hover{
			color:#828282;
		}
		.text-link-gray{
			color: #acb3c2;
			text-decoration: none!important;
		}
		.text-link-gray:hover{
			color:#828282;
		}
		.mr-bottom-8{
			margin-bottom: 8px; 
		}
		.pad-10{
			padding: 10px;
		}
		
		.pad-0{
			padding: 0px!important;
		}
		.p-relative{
			position: relative;	
		}
		
		.pagination-cover{
			padding: 10px 100px;
		}
		
		/* FOOTER STYLE */
		.footer-container{
			 position: absolute;
			  right: 0;
			  bottom: -20px;
			  left: 0;
			  padding: 1rem;
			width: 100%;
			height: auto;
			background-color: #333;		
			
		}
		.docs-footer{
			max-width: 360px;
			margin: 0 auto;
		}
		
		/* NAVBAR STYLE*/
		.navbar-container{
			   	margin-top: 0;
			   	margin-left: 0;
			   	margin-right: 0;
			   	margin-bottom: 10px; 
			    padding: 0;
			    width: 100%;
			    height: auto;
			    background-color: #333;
		}


		.navbar-container .navbar{
			max-width: 600px;
			height: 50px;
			margin: 0 auto;
		}

		.navbar-container .navbar li{
			position: relative;
			list-style: none;
			margin: 0;
			padding: 0 6px;
			float: left;
			color: #b1b1b1;
			line-height: 50px;
		}

		.navbar-container .navbar li a{
			text-decoration: none;
			color: #b1b1b1;
			
		
		}

		.navbar-container .navbar li:hover a{
			color: #cccccc;
		}
		
		
		.dropdown-content{
			display: none;
			position: absolute;
			z-index: 999;
			background-color: #333;
			width: 250px;
  			height: auto;
  			top: 34px;
			left: -40px;
		}
		
		.dropdown-content li{
			width: 250px;
			padding: 0 10px!important;
		}
		.dropdown-content li a{
			color: #b1b1b1;
		}
		
		.dropdown-content li:hover{
			background-color: #101010;
			border-left: solid;
			
		}
		.navbar-container .navbar li:hover .dropdown-content{
			display: block;
		}
		
		/* ACCORDION STYLE */
		.accordion{

			width: 100%;
			border: none;
			text-align: left;
			padding: 18px;
			transition: 0.4s;
			background-color: #333;
			color: #b1b1b1;
			border: none;
			outline: none;
		}

		.active, .accordion:hover {
		    background-color: #101010; 
		}
		
		.panel {
			
			width: 100%;
		    padding: 0 0px;
		    display: none;
		    background-color: white;
		    overflow: hidden;
		    outline: none;
		}

		.btn-panel{
			width: 100%;
			border: none;
			text-align: left;
			padding: 18px;
			transition: 0.4s;
			background-color: #fff;
			color: #000000;
			border-left: none;
			border-bottom: solid #cccccc8a 0.5px;
			border-right: none;
			border-top: none
			outline: none;
		}

		.btn-panel:hover{
			color: #b1b1b1
		}
		

		
		

