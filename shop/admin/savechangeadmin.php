<?php  
$n0=$_POST['n0'];
$n1=$_POST['n1'];
$p0=md5($_POST['p0']);
$p1=trim($_POST['p1']);
include("conn/conn.php");

  $sql=mysql_query("select * from tb_admin where name='".$n0."'",$conn);
  $info=mysql_fetch_array($sql);
  if($info==false)
   {
     echo "<script>alert('Not Exist 此User !');history.back();</script>";
     exit;
   }
   else
   {
    if($info['pwd']==$p0)
	 {
	  if($n1!="")
	   {
	   
	  mysql_query("update tb_admin set name='".$n1."'where id=".$info['id']." ",$conn);
	  }
	  if($p1!="")
	   {
	    $p1=md5($p1);
	     mysql_query("update tb_admin set pwd='".$p1."' where id=".$info['id']."",$conn);
	   
	   }
	 }
	 else
	 {
	   echo "<script>alert('原 Password  type in   Error!');history.back();</script>";
       exit;
	 }
   }


echo "<script>alert('更改成功!');history.back();</script>";




?>