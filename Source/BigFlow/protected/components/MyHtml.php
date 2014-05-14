<?php

class MyHtml extends CHtml {

	public static $afterRequiredLabel=' <span class="required">obrigatório</span>';

	public static function __callStatic($name, $arguments) {
    	return call_user_func_array( array('CHtml',$name), $arguments );
  	}
}