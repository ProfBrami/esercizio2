<?php

$conn=new mysqli('localhost','root','','contabile');

if($conn->connect_error){die("Impossibile stabilire una connessione, errore: ".$conn->connect_errno);}

$key=isset($_POST['chiave'])?$_POST['chiave']:null;
$valore=isset($_POST['val'])?$_POST['val']:null;

$sql="SELECT * FROM fattura WHERE $key='$valore'";

$result=$conn->query($sql);

if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		echo "fattura numero: ".$row['ID_fattura']."<br>";
		echo "data: ".$row['data']."<br>";
		echo "importo: ".$row['importo'];
		if($row['pagata']==0) echo "  <font color=\"red\">Fattura da pagare</font>";
	}
}







?>