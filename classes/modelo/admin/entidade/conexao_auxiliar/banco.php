<?php
$servidor		= "localhost";
$usuario		= "root";
$senha			= "";
$banco			= "dbprojur";

$conn = mysql_connect($servidor,$usuario,$senha);
if ($conn){
	$banco = mysql_select_db($banco);
	if (!$banco){
		echo "Erro no banco";
	}
}
else{
	echo "Erro no servidor";
}

?>