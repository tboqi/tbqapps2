<?php
/*
* ���ܣ�����ͳ��ͼ
* �������$statName ͳ��ͼ������
*        $labelAry ͳ����Ŀ��ǩ����
*        $dataAry  ͳ����Ŀ��������
*        $direct   ͳ��ͼ�����εķ���HΪ����VΪ����
* �򷵻أ�HTML����
* ��By Longware
*/
function rectStat($statName,$labelAry,$dataAry,$direct="H")
{
    $idx = 0;
    $lenAry = array();
    $sum = array_sum($dataAry);

    $strHTML  = "<table width='".(($direct=="H") ? "500" : "98%")."' border='0' cellspacing='1' cellpadding='1' bgcolor='#CCCCCC' align='center'>\n<tr><td bgcolor='#FFFFFF'>\n";
    $strHTML .= "<table width='100%' border='0' cellspacing='2' cellpadding='2'>\n";

    if($direct=="H")//��������ͳ��ͼ
    {
        $strHTML .= "<tr><td colspan='2' align='center'><b>".$statName."</b></td></tr>\n";

        while (list ($key, $val) = each ($dataAry))
        {
            $strHTML .= "<tr><td width='16%' align='right'>".$labelAry[$idx]."</td><td width='84%'><img src='../images/h_line2.gif' border=0 height='7' width='".(($val/$sum)*400)."'>&nbsp;".$dataAry[$idx]."</td></tr>\n";
            $idx++;
        }
    }
    elseif($direct=="V")//��������ͳ��ͼ
    {
        $dataHTML = "";
        $labelHTML = "";

        while (list ($key, $val) = each ($dataAry))
        {
            $dataHTML .= "<td>".$dataAry[$idx]."<br><img src='../images/v_line2.gif' border=0 width='9' height='".(($val/$sum)*400)."'></td>\n";
            $labelHTML .= "<td>".$labelAry[$idx]."</td>\n";
            $idx++;
        }

        $headHTML = "<tr align='center'><td colspan='".$idx."'><b>".$statName."</b></td></tr>\n<tr align='center' valign='bottom'>\n";
        $bodyHTML = "</tr>\n<tr align='center'>\n";
        $footHTML = "</tr>\n";

        $strHTML .= $headHTML.$dataHTML.$bodyHTML.$labelHTML.$footHTML;
    }

    $strHTML .= "</table>\n";
    $strHTML .= "</td></tr></table>\n";

    return $strHTML;
}

$statName = "����������ֵͳ��ͼ(��λ:��Ԫ)";
$labelAry = array("�й�","����","�ձ�","����","ӡ��","����","Ӣ��","����","���ô�","���","�Ĵ�����","�Ϸ�","�ݿ�","ɳ��","����˹");
$dataAry = array(13321,7432,123,425,577,5321,6432,123,5256,577,321,32,123,556,1577);

echo rectStat($statName,$labelAry,$dataAry);
echo "<br><br>";
echo rectStat($statName,$labelAry,$dataAry,"V");
?>

