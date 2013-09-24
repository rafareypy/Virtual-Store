<?php require "_header.php" ; ?>
<?php require "details_of_the_products.php" ; ?> 
<?php verify_cart_is_not_empty () ;?>
<?php $buys = read_cookie () ;
    $value = 0 ;
?>
    <h2 class="page-buy-title">Produtos do carrinho de compras <?=  add_image ('cart.jpg','icons') ?> </h2>    

    <form action="control_cart.php" method="POST" class="form-buy">

    <table class="table table-striped">
     <tr>
                <td class="table-title">Produto</td>
                <td class="table-title">Qnt</td>
                <td class="table-title">Valor Unit.</td>
                <td class="table-title">Total</td>
                <td colspan="2" class="table-title">Minhas Opções</td>
    </tr>

        <?php for ($i = 0; $i < sizeof ($buys); $i+=2) {?>
         <tr>  
            <td><?= $buys[$i] ?></td>
            <td><input type="text" name="quantity[<?= $buys[$i] ?>]" value="<?= $buys[$i + 1] ?>" /></td>
            <td>R$ <?php $test = find_details ('name', $buys[$i],$products); echo $test['discount_price'] ;?></td>
            <td>R$ <?= $buys[$i + 1] * $test['discount_price']?></td>          
            <td><button type="submit" name="change_quantity"class="btn btn-warning" value="<?= $buys [$i]?>">Alterar Qtd</button></td>
            <td><button type="submit" name="delete" class="btn btn-danger" value="<?= $buys [$i]?>"> Excluir Produto</button></td>
        </tr>
        <?php $value += $buys[$i + 1] * $test['discount_price'] ;?>
        <?php }?>
        <tr >
            
            <td colspan="3" class="table-title">Total a Pagar</td>
            <td class="table-title" colspan="3">R$ <?= $value ?></td>
            
        </tr>

    </table>
    <button type="submit" class="btn btn-success" id="finish-buy" name="finish">Finalizar Compra</button> 

    </form>
<?php
    require "_footer.php" ;
?>
