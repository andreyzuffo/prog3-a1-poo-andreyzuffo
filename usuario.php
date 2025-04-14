<?php
  
class usuario {
  private $nome;
  private $email;
  private $senha;

  /* Constructor da classe */
  public function __construct($nome, $email, $senha) {
      $this->nome = $nome;
      $this->email = $email;
      $this->senha = $senha;
  }

  /* Autenticação da classe */ 
  public function Autenticar ($email, $senha)  {
      if ($this->email === $email && $this->senha === $senha) {
        return true; 
    } else {
        return false;
    }    
  }
}  

?>