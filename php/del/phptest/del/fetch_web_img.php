<?php

// ����˵��:
// $url ��Զ��ͼƬ������URL��ַ������Ϊ�ա�
// $filename �ǿ�ѡ����: ���Ϊ�գ������ļ���������ʱ��������Զ�����.

function GrabImage($url,$filename="") {
if($url==""):return false;endif;

if($filename=="") {
$ext=strrchr($url,".");
if($ext!=".gif" && $ext!=".jpg"):return false;endif;
$filename=date("dMYHis").$ext;
}

ob_start();
readfile($url);
$img = ob_get_contents();
ob_end_clean();
$size = strlen($img);

$fp2=@fopen($filename, "a");
fwrite($fp2,$img);
fclose($fp2);

return $filename;
}

$img=GrabImage("http://images.meishij.net/p/20100908/9dd4682a972021758980c9725520e4b9.jpg","d:/1.jpg");
?>