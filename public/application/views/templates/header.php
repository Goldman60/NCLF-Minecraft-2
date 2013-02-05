<?php echo doctype('html5'); ?>
<html lang="en-us">
<head>
<title>NCLF Minecraft :: <?php echo $title; ?></title>
<meta charset="UTF-8" lang="en-US"/>
<?php 	
	foreach($style as $css_styles) {
	    echo link_tag('assets/css/'.$css_styles.'.css');
	}
?>
</head>
<body>
<header id="header"><h1>NCLF Minecraft</h1>
</header>