<?php

if(isset($_GET['silueta']))
	$_GET['silueta']++;
else $_GET['silueta']=1;

if($_GET['silueta']>7)
	$_GET['silueta']=1;

echo '
	<a href="?silueta='.$_GET['silueta'].'">
		<img src="figs/f'.$_GET['silueta'].'.jpg">
	</a>
';

?>