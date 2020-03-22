<?php

//Este arquivo deve ser alterado para as configurações corretas da base de dados para uso no KaniNet. Dúvidas, favor consultar documentação disponibilizada junto ao sistema.

class db {

	//host. Aqui deve ser definido o endereço IP do BD MySQL.
	private $host = 'localhost';
    
    //usuario. Aqui deve ser definido um usuário para a conexão com o BD MySQL.
    private $usuario = 'root';

    //senha. Aqui deve ser definida a senha para conexão com o BD MySQL.
    private $senha = '';
     
    //banco de dados. NÃO deve ser alterado!
    private $database ='kaninet';

public function conecta_banco(){

   //conexao com o banco. Referenciado proprio arquivo. Não é necessário alterar
   $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

   mysqli_set_charset ($con, 'utf8');

   //valida erros de conexão ao BD
   if(mysqli_connect_errno()){
      echo 'Erro ao tentar conexão com MySQL, verifique as configurações. Erro: ' .mysqli_connect_error();
   

   }

     return $con;

}


}

?>