<?php 
namespace Views;

class MainView{
    private $fileName;
    private $header;
    private $sidebar;
    private $head;
    private $footer;

    public function __construct($fileName,$header = 'header',$sidebar = 'sidebar',$head = 'head',$footer = 'footer'){
        $this->header = $header;
        $this->sidebar = $sidebar;
        $this->fileName = $fileName;
        $this->head = $head;
        $this->footer = $footer;
        
    }

    public function render($arr = []){
        include('pages/templates/'.$this->head.'.php');
        if(isset($_SESSION['login'])){ 
        include('pages/templates/'.$this->sidebar.'.php');
        include('pages/templates/'.$this->header.'.php');
        
    }
        
        
        include('pages/'.$this->fileName.'.php');
        include('pages/templates/'.$this->footer.'.php');
    }

}