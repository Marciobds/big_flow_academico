<?php

class WebUser extends CWebUser {
	// Store model to not repeat query.
	private $_model;
	// Return first name.
	// access it by Yii::app()->user->_name
	function getNome(){
		$usuario = $this->loadUser(Yii::app()->user->id);
		$nome = $usuario->email;
			if($usuario->professor_id != null)
				$nome = $usuario->professor->nome;
		return $nome;
	}
	function getRole(){
		$usuario = $this->loadUser(Yii::app()->user->id);
		return $usuario->admin ? 'admin' : 'professor';
	}
 
	// admin=true para sabermos se o usuário é administrador
	function isAdmin(){
		$usuario = $this->loadUser(Yii::app()->user->id);
		if ($usuario!==null)
			return $usuario->admin;
		else return false;
	}
 
	// admin=false para sabermos se o usuário é professor
	function isProfessor(){
		$usuario = $this->loadUser(Yii::app()->user->id);
		if ($usuario!==null)
			return !$usuario->admin;
		else return false;
	}

	function getProfessor() {
		$usuario = $this->loadUser(Yii::app()->user->id);
		return $usuario->professor;
	}
 
	// carrega o model do usuário
	protected function loadUser($id=null) {
		if($this->_model===null)
		{
			if($id!==null)
				$this->_model=Usuario::model()->findByPk($id);
		}
		return $this->_model;
	}
}