<?php echo doctype('html5'); ?>
<html lang="en_us">
<head>
<?php 	
	foreach($style as $css_styles) {
	    echo link_tag('assets/css/'.$css_styles.'.css');
	}
?>
</head>
<body>
<header id="header">header
</header>