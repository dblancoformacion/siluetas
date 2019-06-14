<?php
Class Siluetas{
	// modelo
	public $estado=1;
	function __construct(){
		if(isset($_GET['estado']))
			$this->estado=$_GET['estado'];
	}
	// vista
	function mostrar(){
		return '
			<div>
				<a href="?atras=1&estado='.$this->estado.'" style="font-size:4em"> < </a>
				<a href="?estado='.$this->estado.'" style="font-size:4em">
					<img src="figs/f'.$this->estado.'.jpg" style="height:300px;"> >
				</a>
			</div>		
		';
	}	
}

// controlador
$s=new Siluetas();
if(isset($_GET['estado']) && !isset($_GET['atras']))
	$s->estado++;
if($s->estado>7)
	$s->estado=1;
if(isset($_GET['atras']))
	$s->estado--;
if($s->estado<1)
	$s->estado=7;
echo $s->mostrar();
echo $s->mostrar();

?>