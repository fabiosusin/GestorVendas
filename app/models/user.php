<?php
class User
{

    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $senha;
    private $cartao;
    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;

    public function __construct($id, $senha, $nome, $email, $telefone, $cartao, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado)
    {
        $this->id = $id;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cartao = $cartao;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento  = $complemento;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getCep()
    {
        return $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getRua()
    {
        return $this->rua;
    }
    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    public function getCartao()
    {
        return $this->cartao;
    }
    public function setCartao($cartao)
    {
        $this->cartao = $cartao;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
}
