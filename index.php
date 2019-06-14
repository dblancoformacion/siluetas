<?php
Class Siluetas{
	// modelo
	public $estado=1;
	function __construct(){
		if(isset($_GET['estado']))
			$this->estado=$_GET['estado'];
	}
	function atras(){
		$this->estado--;
		if($this->estado<1)
			$this->estado=7;
	}
	function adelante(){
		$this->estado++;
		if($this->estado>7)
			$this->estado=1;		
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
	$s->adelante();
if(isset($_GET['atras']))
	$s->atras();
	
echo $s->mostrar();
echo $s->mostrar();

?>