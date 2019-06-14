<?php
Class Siluetas{
	// modelo
	public $estado;
	private $conn;
	function __construct(){
		$this->conn=new mysqli('localhost','root','','db2019');
		$r=$this->conn->query("
			SELECT * FROM siluetas;
		")->fetch_all(MYSQLI_ASSOC);
		foreach($r as $reg)
			$this->estado[$reg['id_silueta']]=$reg['estado'];
	}
	function atras(){
		$this->estado[$_GET['atras']]--;
		if($this->estado[$_GET['atras']]<1)
			$this->estado[$_GET['atras']]=7;
		$this->conn->query("
			UPDATE siluetas SET estado=".$this->estado[$_GET['atras']]."
				WHERE id_silueta=".$_GET['atras'].";
		");
	}
	function adelante(){
		$this->estado[$_GET['adelante']]++;
		if($this->estado[$_GET['adelante']]>7)
			$this->estado[$_GET['adelante']]=1;		
		$this->conn->query("
			UPDATE siluetas SET estado=".$this->estado[$_GET['adelante']]."
				WHERE id_silueta=".$_GET['adelante'].";
		");		
	}
	// vista
	function mostrar(){
		$txt=null;
		foreach($this->estado as $id=>$estado)
			$txt.='
				<div>
					<a href="?atras='.$id.'" style="font-size:4em"> < </a>
					<a href="?adelante='.$id.'" style="font-size:4em">
						<img src="figs/f'.$estado.'.jpg" style="height:300px;"> >
					</a>
				</div>		
			';
		return $txt;
	}	
}

// controlador
$s=new Siluetas();
if(isset($_GET['adelante']))
	$s->adelante();
if(isset($_GET['atras']))
	$s->atras();
echo $s->mostrar();
?>