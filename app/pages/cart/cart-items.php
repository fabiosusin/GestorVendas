<?php
include_once("../../../app/scripts/conexao/conexao.php");

$ids = $_POST['ids'];
$ids = isset($ids) && is_array($ids) ? implode(",", $ids) : null;

if (isset($ids)) {

  $query = "SELECT * FROM produto LEFT JOIN estoque ON produto.id = estoque.ProdutoID  WHERE produto.id IN ($ids)";
  $consulta_products = mysqli_query($conexao, $query);
}

?>

<?php
if (isset($consulta_products))
  while ($linha = mysqli_fetch_array($consulta_products)) {
    $image = $linha['fotoUrl'] ? '<img src="../../' . $linha['fotoUrl'] . '" alt="Imagem">' : '';
    echo '<div class="product">
            <div class="item">
              <div class="photo">
              ' . $image . '
              </div>
              <span>' . $linha['nome'] . '</span>
            </div>
            <div class="item">
              <span>R$ ' . $linha['preco'] . '</span>
              <div class="quantity">
                <input class="default-input" value="1" type="tel" name="quantity" />
              </div>
            </div>
            <div class="item">
              <span>R$ ' . $linha['preco'] . '</span>
              <a class="remove-product" name="remove-product"><i class="fas fa-trash"></i></a>
            </div>
          </div>';
  }
else
  echo '<div class="empty-cart">
          <i class="fas fa-shopping-bag"></i>
          <span>O seu Carrinho de Compras se encontra vazio</span>
        </div>';
?>

