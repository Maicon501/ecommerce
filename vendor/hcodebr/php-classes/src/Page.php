<?php

namespace Hcode;

use Rain\tpl;

class Page {
    private $tpl;
    private $options = [];
    private $defaults = [
        "header"=>true,
        "footer"=>true,
        "data"=>[]

    ];
    public function __construct($opts = array(), $tpl_dir = "/views/"){
    
         $this->optios = array_merge($this->defaults, $opts);

         $config = array(
		      "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
		      "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
		      "debug"         => false
	     );

	     Tpl::configure( $config );
     
         $this->tpl = new Tpl;
         
         $this->setData($this->options["data"]);
         
         if ($this->options["header"] === true)$this->tpl->draw("headerer");

    } 
    
    private function setData($data = array())
    {

           foreach ($data as $key => $value) {
         	$this=>tpl->assingn($key, $value);
         }       

    }

    public function setTpl($nome, $data = array(), $returnHTML = false)
    {

         $this->setData($data);

         return $this->tpl->draw($name, $returnHTML);
    }


    public function __destruct(){

              if ($this->options["footer"] === true)$this->tpl->draw("footer");

    }

}
?>