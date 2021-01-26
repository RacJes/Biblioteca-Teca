<?php

    include("../conectar.php");

	$PicNum = $_GET["PicNum"];
    //$PicNum = $_Post["PicNum"];

    $condition =    ' AND idImagem = "'.$PicNum.'" ';
    $imprime4   =    $db->SelectCRUD('imagem','	imagem',$condition,'');
    if(count($imprime4)>0){
        $s	=	'';
        foreach($imprime4 as $val1){
         $s++;
         Header( "Content-type: image/gif");
         echo $val1['imagem'];
        }
    }else{}
	
?>