<?php
class Json{
    public function __construct($url,$filename){
        $ch =  curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $content = curl_exec($ch);
        curl_close($ch);
        file_put_contents($filename,($content));
        echo 'Файл '.$filename.'успешно загружен!<br>';
    }
    public function __destruct(){

    }
    public function uploadDb($file){
            $mysqli = new mysqli('localhost','root','rootroot','content') or die ("Error connect!");
            $decode = json_decode(file_get_contents($file));
            if($file === "posts.json"){
                foreach($decode as $posts){
                    $userId = $posts->userId;
                    $idPost = $posts->id;
                    $titlePost= $posts->title;
                    $bodyPost = $posts->body;
                    $sql = "INSERT INTO `posts`(`userId`,`id`,`title`,`body`) VALUES ('$userId','$idPost','$titlePost','$bodyPost')";
                    $query = mysqli_query($mysqli,$sql);
                    }
                      setcookie("posts_success","Посты успешно загружены в БД posts всего постов:.$idPost.<br>",time()+1);
             
          }
          elseif($file == "comments.json"){
            foreach($decode as $comments){
                $post_id = $comments->postId;
                $id_post = $comments->id;
                $name_post = $comments->name;
                $email_post = $comments->email;
                $body_post = $comments->body;
                $sql = "INSERT INTO `comments`(`postId`,`id`,`name`,`email`,`body`) VALUES ('$post_id','$id_post','$name_post','$email_post','$body_post')";
                $query = mysqli_query($mysqli,$sql);
                }
                setcookie("comments_success","Комментарии успешно загружены в БД posts всего комментариев:.$id_post.<br>",time()+1);
                $mysqli->close();
                header('Location:http://sample.lc/index.php');
            }
            
        
            

       

}
}

$posts = new Json('https://jsonplaceholder.typicode.com/posts','posts.json');
$posts->uploadDb('posts.json');
$comments = new Json('https://jsonplaceholder.typicode.com/comments','comments.json');
$comments->uploadDb('comments.json');
?>