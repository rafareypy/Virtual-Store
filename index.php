<?php require '_header.php'; ?>
<?php require 'details_of_the_products.php' ;?>
<?php create_files () ; ?>

<div class="clearfix">
    <div class="total-cart">
    <p><?= (total_products_in_cart () == 0)? '' : total_products_in_cart ()?></p>
    <?php $img =  add_image ('cart.jpg','icons') ; 
        echo  link_to ('buy/buy.php', $img) ;
    ?>
    </div>
</div>

<section class="container">
    <header class="page-header">
        <h2>Shop Games</h2>
    </header>
    <article>

        <form method="POST" action="buy/control_cart.php">
            
            <div class="row">
                      
            <?php foreach ($products as $product) {?>
            
             <div class="col-md-4">
                <div class="product-presentation"> 

                <?= add_image ($product['img'], 'products') ?>

               
                <p class="product-name"><?= $product['name'] ?></p>
                <p class="product-price">De: R$ <?= $product['price'] ?></p>
                <p class="product-discount">Por: R$ <?= $product['discount_price'] ?></p>
                
 
                <button type="submit" class="btn btn-primary" name="add_to_cart" value="<?= $product ['name'] ?>">
                + <span class="glyphicon glyphicon-shopping-cart"></span>
                </button>

                <button type="submit" class="btn btn-success" name="buy" value="<?= $product ['name'] ?>">Comprar</button>
              </div>
             </div>
             
            <?php }?> 
             </div>           
        
            </form>   
            
     </article>
</section>

<?php require '_footer.php'; ?>
