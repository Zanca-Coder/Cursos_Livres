<?php

class Classe_Curso extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('classe_curso/classe_curso.js');
    }
    
    function index() {
        $this->view->title = 'Gerenciamento de Classes de Curso';
		$this->view->render('header');
        $this->view->render('classe_curso/index');
		$this->view->render('footer');
    }
     function insert()
    {
        $this->model->insert();
    }
    
	function listaClasse()
    {
        $this->model->listaClasse();
    }
	
	function del()
    {
        $this->model->del();
    }
	
	function loadData($id)
    {
        $this->model->loadData($id);
    }
	
	function save()
    {
        $this->model->save();
    }

    function selCodCurso()
    {
        $this->model->selCodCurso();
    }
}