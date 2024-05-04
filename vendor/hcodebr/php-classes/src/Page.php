<?php

namespace Hcode;

use Rain\tpl;

class Page {
    private $tpl;
    private $options = [];
    private $defaults = [
        "data"=>[]

    ];
    public function __construct($opts = array()){
    
         $this->optios = array_merge($this->defaults, $opts);

         $config = array(
		      "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
		      "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
		      "debug"         => false
	     );

	     Tpl::configure( $config );
     
         $this->tpl = new Tpl;
         
         $this->setData($this->options["data"]);
         $this->tpl->draw("headerer");

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

              $this->tpl->draw("footer");

    }

}
?>