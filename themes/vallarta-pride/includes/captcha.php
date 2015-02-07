<?php
session_start();
function randomText($length) {
    $key='';
    $pattern = "123456789abcdefghijklmnpqrstuvwxyz";
    $qtnitems = strlen($pattern);
    for($i=0;$i<$length;$i++) {
      $key .= $pattern{rand(0,$qtnitems)};
    }
    return $key;
}

//function GeraHash($qtd){
////Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
//$Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
//$QuantidadeCaracteres = strlen($Caracteres); 
//$QuantidadeCaracteres--;
//
//$Hash=NULL; 
//     for($x=1;$x<=$qtd;$x++){ 
//         $Posicao = rand(0,$QuantidadeCaracteres); 
//         $Hash .= substr($Caracteres,$Posicao,1); 
//     } 
//
// return $Hash; 
// }
 
$_SESSION['tmptxt'] = randomText(4);
$captcha = imagecreatefromgif("bgcaptcha.gif");
$colText = imagecolorallocate($captcha, 255, 255, 255);
imagestring($captcha, 6, 30, 7, $_SESSION['tmptxt'], $colText);
header("Content-type: image/gif");
imagegif($captcha);
?>