<?php
class SearchEngine{
    public function __construct($text){
        $db = new mysqli('localhost','root','rootroot','content')or die ("Error connect!");
        if(iconv_strlen($text) <= 3 OR !$_POST['search_text']){
            setcookie("less3","Ошибка запрос не может быть менее 3-х симоволов!",time()+1);
            header("Location:http://sample.lc/index.php");
            exit();
        }
        else{
            $sql = "SELECT * FROM `comments` WHERE `body` LIKE '%$text%'";
            echo '<h1>По запросу:</h1>'.'<b style="color:#FFD700"; box-shadow:0 0 10px rgba(0,0,0,0.5);>'.$text.'</b>'.'<h1>Найдено:</h1>';   
            if($result = $db->query($sql)){
                while($row = $result->fetch_array()){
                    $this->body = $row["body"];
                    $this->name = $row["name"];
                    echo '<b>Название поста:</b>'.$this->name.'<br><b>Комментарии:</b>'.$this->body.'<br>';

                }
            
             
                  
            
            }
        }
    }

    public function __destruct(){

    }

}
$search = new SearchEngine($_POST['search_text']);
?>