<?php

class Professor_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function listaProfessor() 
    {
        $sql = "SELECT * from professor_curso_livre";
        $result = $this->db->select($sql);
        echo (json_encode($result));
    }

    public function insert()
    {
        $x=json_decode(file_get_contents('php://input'));
        $user=$x->user;
        $curLiv=$x->curLiv;
        $nomeProf=$x->nomeProf;
        $txtCriado=$x->txtCriado;
        // var_dump($x->username); exit;

        $result=$this->db->insert('professor_curso_livre',
            array('username' => $user,
                  'cursolivre' => $curLiv,
                  'nomecompleto' => $nomeProf,
                  'criado' => $txtCriado));
        if($result){
            $msg=array("codigo"=>1, "texto"=>"Registro inserido com sucesso.");
        }
        else{
            $msg=array("codigo"=>0, "texto"=>"Erro ao inserir.");
        }
        echo(json_encode($msg));
    }
	
	public function del() 
    {  
        $curLiv=(int)$_GET['id'];
        $msg=array("codigo"=>0, "texto"=>"Erro ao Excluir.");
        if($curLiv>0){
            $result=$this->db->delete('professor_curso_livre', "cursolivre='$curLiv'");
            if($result){
                $msg=array("codigo"=>1, "texto"=>"Registro excluído com sucesso.");
            }
        }
        echo(json_encode($msg));
	}
	
	public function loadData($id)
    {  
		$cod=(int)$id;
        $result=$this->db->select('SELECT * from professor_curso_livre where cursolivre=:cod', array(":cod"=>$cod));
        $result = json_encode($result);
        echo($result);
	}
	
	public function save() 
    {
	   $x=file_get_contents('php://input');
       $x=json_decode($x);
       $curLiv=(int)$x->curLiv;
       $user=$x->user;
        $nomeProf=$x->nomeProf;
        $txtCriado=$x->txtCriado;
        $msg=array("codigo"=>0, "texto"=>"Erro ao atualizar.");
        if($curLiv>0){
            $dadosSave=array('nomecompleto' => $nomeProf,
                             'criado' => $txtCriado);
                            
            $result=$this->db->update('professor_curso_livre', $dadosSave, "cursolivre='$curLiv' and username='$user'");
            if($result){
                    $msg=array("codigo"=>1, "texto"=>"Registro atualizado com sucesso.");
            }
        }
        echo(json_encode($msg));
    }
}