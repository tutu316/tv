 <?php
 include('password.php');
 
function check_param($value=null) { 
    $str = 'select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile';
    if(eregi($str, $value)) { 
        $vals=str_replace($value,"",$value);
    }
    return $vals; 
}

 ?>

<html>
    <head>
    	
    <title>欢迎使用管理页面</title></head>
<style type="text/css" style="display: none ">
textarea#styled {
	width: 800px;
	height: 400px;
	border: 3px solid #31c4cb;
	border-radius: 0px;
	padding: 20px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
}
.style2 {
	color: #f3f3f3;
	font-size: 14px;
}
</style>
    <body>
        <?php
			header('Content-Type:text/html;charset=UTF-8');
		

			   function Read() {
                   $file = file_get_contents("list/10001.txt");
				   echo $file;
               }

        ?>

        <?php
			   if (isset($_POST['submit']))
			{
                   $file = 'list/10001.txt';
			   if (file_exists($file) && time() < (filemtime($file)))
               {
                   $url = file_get_contents($file);
               } 		   
				   else
               {   
                   $data = $_POST['styled-textarea'];
                   $upload = $data;
			   file_put_contents($file,$upload); 
               } 
			}			   

        ?>
        <img src="" width="150" height="45">    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <p align="center">
              <textarea name="styled-textarea" id="styled"><?php Read(); ?>
            </textarea>
          </p>
          <p align="center"><br>
            <input type="submit" name="submit" value="点击立刻更新">
            <input type="hidden" name="submit_check" value="1">
          </p>
          <p>&nbsp;          </p>
        </form>
    </body>
    
</html>

