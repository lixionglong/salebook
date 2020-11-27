<?php
session_start();
if (!isset($_SESSION['username'])||$_SESSION['username']==null)
	{
		echo "<script>alert('请先登录！');window.location.href='../index.html';</script>";	
	}
else{
	if(!isset($_SESSION['status'])||($_SESSION['status']==null))
		{
			echo "<script>alert('您没有权限！');history.go(-1);</script>";	
		}	
require("../compoents/coon.php");
 $bookname=@$_POST['bookname'];
 $typeid=@$_POST['typeid'];
 $author=@$_POST['author'];
 $publish=@$_POST['publish'];
 $cbdate=@$_POST['cbdate'];
 $number=@$_POST['number'];
 $price=@$_POST['price'];
 if($bookname==""||$typeid==""||$author==""||$publish==""||$cbdate==""||$number==""||$price=="")
{
    die ("<script>alert('请输入完整!');history.go(-1);</script>");	 
}
else
{
	@$upfile=$_FILES['filename'];//获取文件名
    if(empty($typelist))
    {
        $typelist=array("image/gif","image/jpg","image/jpeg","image/png");
    }
    $res=array("error"=>false);
    if($upfile['error']>0)
    {
        switch($upfile["error"])
        {
            case 1:
                $res["info"]="上传的文件超过了 php.ini中upload_max_filesize选项大小";
					echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
                break;
            case 2:
                $res["info"]="上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项";
					echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
                break;
            case 3:
                $res["info"]="文件只有部分被上传";
					echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
                break;
            case 4:
                $res["info"]="没有文件被上传";
				echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
                break;
            case 6:
                $res["info"]="找不到临时文件夹";
					echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
                break;
            case 7:
                $res["info"]="文件写入失败";
				echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
                break;
            default:
                $res["info"]="未知错误!";
				echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
                break;

        }
    }//$upfile['error']>0
    if($upfile['size']>1000000000)
    {
        $res['info']="上传文件过大！";
		echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
    }

    if(!in_array($upfile['type'],$typelist))
    {
        $res['info']="上传类型不符！".$upfile['type'];
		//die ("图片信息上传失败:".$res['info']);
		echo "<script>alert('图片信息上传失败:".$res['info']."');history.go(-1);</script>";
    }
	else
	{
		$sql="
			insert into bookinfo(bookname,typeid,author,publish,cbdate,number,price)
			values('$bookname',$typeid,'$author','$publish','$cbdate',$number,$price)
		";
		 mysqli_query($link,$sql);
		 $bookid=mysqli_insert_id($link);
		 $pic="../picture/$bookid.jpg";
		 $rpic="$bookid.jpg";
		if(move_uploaded_file($upfile['tmp_name'],$pic))//移动上传文件
		{
			$sql="
				update bookinfo set pic='$rpic' where bookid=$bookid
			";
			 mysqli_query($link,$sql);
			 echo "<script>alert('上传图书信息成功!');window.location.href='manage.php';</script>";
		}
		else
		{
				$sql="
				delete from bookinfo where bookid=$bookid
			";
			 mysqli_query($link,$insql);
			 echo "<script>alert('上传图片失败!');history.go(-1);</script>";
		}
	}
}
}


?>