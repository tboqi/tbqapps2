<?PHP
$nian = 0.05; //������
$jine = 5000; //Ͷ�ʽ��
$shijian = 12; //Ͷ��ʱ�䣬��

$i = (1+$nian/12);
$res = $i;
for($j=0; $j<$shijian; $j++) {
  $res = $res * $i;
}
echo "<br />Ͷ������: "  . ($jine * ($res-1) - $jine * 0.006 - $jine * 0.003);
echo "<br />Ͷ��������: "  . ($res-1 - 0.006 - 0.003);
echo "<br />���д�" . $jine * 0.0333;
?>