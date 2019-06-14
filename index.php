<?php
// controlador
if(isset($_GET['estado']))
	$_GET['estado']++;
else $_GET['estado']=1;

if($_GET['estado']>7)
	$_GET['estado']=1;

echo mostrar();
echo mostrar();

// vista
function mostrar(){
	return '
		<div>
			<a href="?estado='.$_GET['estado'].'">
				<img src="figs/f'.$_GET['estado'].'.jpg" style="height:300px">
			</a>
		</div>		
	';
}
?>