<?php

class Professor extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('professor/professor.js');
    }
    
    function index() {
        $this->view->title = 'Gerenciamento de Professores';
		$this->view->render('header');
        $this->view->render('professor/index');
		$this->view->render('footer');
    }
     function addProfessor()
    {
        $this->model->insert();
    }
    
	function listaProfessor()
    {
        $this->model->listaProfessor();
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
}