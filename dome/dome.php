<?php
use LSYS\View;
use LSYS\View\Widget;
include __DIR__."/Bootstarp.php";
class testbb extends Widget{
	public function render($data=NULL){
		$data=$this->proxyData("aa", function(){
			return "tt";
		});
		return $this->_render(['test'=>$data]);
	}
}

echo View::factory("test")->render();