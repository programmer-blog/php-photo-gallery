
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            h1{
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 18px;
                color: #FFF;                    
            }
            
            body{
                background-color: #666;
            }
            
            #gallery {
                background-color: #FFF;
                border: 1px dotted #999;
            }
            
        </style>
    </head>
    <body>
<?php
        $image_dir = "images/";
        $images = [];
        if(!$dir = opendir($image_dir)){
            die("Cannot open $image_dir");
        }
        
       
        while(false !== ($image= readdir($dir))){
            if($image != "." && $image != ".." && (strtolower(substr($image, -4)) == "jpeg" || strtolower(substr($image, -3)) == "jpg") ){
                array_push($images, $image);
            }
        }
        
        echo "<h1 align='center'>PHP Photo Gallery</h1>";
        echo "<table id='gallery' width='50%' cellpadding=5 align = 'center'><tr>";
        $count = 0;
        foreach ($images as  $value) {
           
            echo "<td valign='bottom'><a href='".$image_dir.$value."'><img src='thumbnails.php?image=".$value."' border=0 /></a></td>";
            $count++;
            if($count >=4){
                echo "</tr><tr>";
                $count = 0;
            }
        }
        
        echo "</tr></table>";
        closedir($dir);
        ?>
    </body>
</html>
