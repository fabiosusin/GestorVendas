<!DOCTYPE html>
<html>
  <head>
    <?php
    session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header('location:login.php');
      }

    $logado = $_SESSION['login'];
    ?>
    <title>Cadastro cliente</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/www/GestorVendas/app/pages/shared/css/bootstrap.min.css">
    <script type="text/javascript" src="/www/GestorVendas/app/pages/shared/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/www/GestorVendas/app/pages/shared/js/jquery.mask.min.js"></script>  
    <script type="text/javascript" src="/www/GestorVendas/app/pages/shared/js/validate.js"></script> 
  </head>
  <body>
  <div class="container">
    <form method="post" action="insert_cliente.php">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="razao_social">Nome</label>
          <input type="text" name="nome" class="form-control" id="razao_social" placeholder="Digite o nome do cliente">
        </div>
        <div class="form-group col-md-6">
          <label for="email">E-mail</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="Digite o email">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="cartao">Cartao de Crédito</label>
          <input type="text" name="cartao" class="form-control" id="cartao" placeholder="Digite o número do cartão de crédito">
        </div>
        <div class="form-group col-md-6">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control" name="telefone" id="celular" placeholder="Digite o telefone">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-10">
          <label for="inputAddress">Rua</label>
          <input type="text" name="rua" class="form-control" id="inputAddress" placeholder="Rua luis cioatto">
        </div>
        <div class="form-group col-md-2">
          <label for="numero">Numero</label>
          <input type="text" name="numero" class="form-control" id="numero">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="complemento">Complemento</label>
          <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Digite o complemento">
        </div>
        <div class="form-group col-md-6">
          <label for="cidade">Cidade</label>
          <input type="text" name="cidade" class="form-control" id="cidade">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="bairro">Bairro</label>
          <input type="text" name="bairro" class="form-control" id="bairro">
        </div>
        <div class="form-group col-md-4">
          <label for="estado">Estado</label>
          <select name="estado" id="estado" class="form-control">
            <option value="">Selecione</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espirito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MT">Mato Grosso</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="cep">CEP</label>
          <input type="text" name="cep" class="form-control" id="cep">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>