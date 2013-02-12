<div id="sidebar">
<h2>Server Status</h2>
<?php if(!isset($CreativeError)): 
#No connection error ?>
<div class="serverstats">
	<h3>Creative</h3>
	<?php if($CreativeInfo["Players"] > 0): ?>
	<p class="onlinecount"><?php echo $CreativeInfo['Players']; ?>/<?php echo $CreativeInfo['MaxPlayers']; ?> Players Online</p>
	<ul class="playerlist">
	<?php foreach ($CreativePlayers as $Player) {
			echo "<li>".$Player."</li>";
		  } ?>
	</ul>
	<?php 	
		else:
			echo '<p class="noplayers">No players online.</p>';
		endif;?>
</div>
<?php else: 
#Connection Error ?>
<div class="serverstatserror">
	<h3>Creative</h3>
	<p class="errormsg">Server connection error: <?php echo $CreativeError->getMessage(); ?> The server is likely down, visit the <a href="https://www.facebook.com/groups/nclfminecraft/">Facebook group</a> to report the error or get new information.</p>
	<p class="errorcode">Error code: <?php echo $CreativeError->getCode(); ?></p>
</div>
<?php endif; 

/********************************/

if(!isset($FTBError)):
#No connection error ?>
<div class="serverstats">
	<h3>FTB</h3>
	<?php if($FTBInfo["Players"] > 0): ?>
	<p class="onlinecount"><?php echo $FTBInfo['Players']; ?>/<?php echo $FTBInfo['MaxPlayers']; ?> Players Online</p>
	<ul class="playerlist">
	<?php foreach ($FTBPlayers as $Player) {
			echo "<li>".$Player."</li>";
		  } ?>
	</ul>
	
	<?php 
		else:
			echo '<p class="noplayers">No players online.</p>';
		endif;?>
</div>
<?php else: 
#Connection error ?>
<div class="serverstatserror">
	<h3>FTB</h3>
	<p class="errormsg">Server connection error: <?php echo $FTBError->getMessage(); ?> The server is likely down, visit the <a href="https://www.facebook.com/groups/nclfminecraft/">Facebook group</a> to report the error or get new information.</p>
	<p class="errorcode">Error code: <?php echo $FTBError->getCode(); ?></p>
</div>
<?php endif; ?>
</div>