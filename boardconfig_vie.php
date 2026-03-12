            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
<?
 include "../board/alexkim_config.php";

 $result=mysql_query("select * from zetyx_board_vietnam_note order by no desc limit 4");

 while($data=mysql_fetch_array($result)) {

  $no=$data[no];
  $subject=cutstr(stripslashes($data[subject]), 20);
  $memo=stripslashes($data[memo]);
  $date=date("Y/m/d",$data[reg_date]);
            echo "<tr>
                  <td width='10'><img src='img/main_notice02.jpg' width='12' height='6'></td>
                  <td width='279' height='20'><a href='../board/view.php?id=vietnam_note&no=$no'>[$date] $subject</a> </td>
                </tr>";

}
  mysql_close($connect);
?>
            </table>