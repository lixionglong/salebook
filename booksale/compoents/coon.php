

<?php
	$link=mysqli_connect("localhost","root","password");
    mysqli_select_db($link,"database");
	mysqli_query($link,"set names 'utf8'");
	/*function convertgbk($string)
	{
		return iconv('UTF-8','GBK',$string);	
	}
	function convertutf8($string)
	{
		return iconv('GBK','UTF-8',$string);	
	}
	$serverName = "localhost";
	$connectionInfo = array( "Database"=>"", "UID"=>"", "PWD"=>"");
	$conn = sqlsrv_connect( $serverName, $connectionInfo );
 	/*while($row = sqlsrv_fetch_array($stmt))
 	{echo $row[0]."-----".$row[1]."<br/>";}*/

?>
