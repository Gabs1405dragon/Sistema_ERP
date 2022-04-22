<?php  
namespace Models;

class ChatModel{
    
    public static function pegarPost($post){
        if(isset($_POST[$post])){
            echo $_POST[$post];
        }
    }
}