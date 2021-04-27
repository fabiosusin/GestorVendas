<?php
$page_title = 'Cadastro de Fornecedor';
$page_css_links = ['provider/register/register-provider.css'];
$page_scripts_links = ['provider/register/register-provider.js'];

include '../../../scripts/provider/register/get_provider.php';

/*session_start();

if ((isset($_SESSION['login']) == true) and (isset($_SESSION['senha']) == true)) {
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:../login/login.php');
}*/

include_once("../../base/header.php");
?>

<div class="register-provider" name="registerProvider">
  <div class="tab">
    <button type="button" class="tablinks" name="personal-data">Dados Pessoais</button>
    <button type="button" class="tablinks" name="address">Endereço</button>
  </div>
  <form class="form" method="post" action="../../../scripts/provider/register/insert_fornecedor.php">
    <input type="hidden" name="id" value="<?php echo $id ?>" />
    <div name="personal-data-info" class="template">
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-lock icon"></i>
        <input class="default-input" type="text" name="nome" class="form-control" id="razao_social" placeholder="Nome" value="<?php echo $nome ?>">
      </div>
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-envelope icon"></i>
        <input class="default-input" type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email ?>">
      </div>
      <div class="col-md-12 textarea-with-icon">
        <i class="fas fa-credit-card icon"></i>
        <textarea class="default-textarea" type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição" value="<?php echo $descricao ?>"></textarea>
      </div>
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-phone-alt icon"></i>
        <input class="default-input" type="text" class="form-control" name="telefone" id="celular" placeholder="Telefone" value="<?php echo $telefone ?>">
      </div>
    </div>
    <div class="template" name="address-info">
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-road icon"></i>
        <input class="default-input" type="text" name="rua" class="form-control" id="inputAddress" placeholder="Rua" value="<?php echo $rua ?>">
      </div>
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-list-ol icon"></i>
        <input class="default-input" type="text" name="numero" class="form-control" id="numero" placeholder="Número" value="<?php echo $numero ?>">
      </div>
      <div class=" col-md-12 input-with-icon">
        <i class="fas fa-info-circle icon"></i>
        <input class="default-input" type="text" name="complemento" class="form-control" id="complemento" placeholder="Complemento" value="<?php echo $complemento ?>">
      </div>
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-city icon"></i>
        <input class="default-input" type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" value="<?php echo $cidade ?>">
      </div>
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-city icon"></i>
        <input class="default-input" type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro" value="<?php echo $bairro ?>">
      </div>
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-city icon"></i>
        <input class="default-input" list="estados" name="estado" id="estado" placeholder="Estado" value="<?php echo $estado ?>">
        <datalist id="estados">
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
        </datalist>
      </div>
      <div class="col-md-12 input-with-icon">
        <i class="fas fa-list-ol icon"></i>
        <input class="default-input" type="text" name="cep" class="form-control" id="cep" placeholder="CEP" value="<?php echo $cep ?>">
      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" class="col-md-12 default-button">Salvar</button>
    </div>
  </form>
</div>

<?php
include_once("../../base/footer.php");
?>