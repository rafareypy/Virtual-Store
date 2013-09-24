 <?php should_be_autenticated() ?>

<?php require '_header.php'; ?>

<section>
    <article class="admin-main">
    <?php require '_menu.php' ;?>
        
       <!-- Conteúdo Principal --> 
        <div class="col-md-9" role="main">
        <h1>Produtos Mais Vendidos</h1>
        <?php if (!isEmptyFile(NAME_FILE)) {?> <!-- Aqui -->
            <p>Abaixo uma tabela com nossos produtos mais vendidos</p>
           
            <table class="table table-striped">
                <tr>
                    <td class="table-views-title">Produto</td>
                    <td class="table-views-title-quantity">Qnt Vendida</td><!-- Aqui -->
                </tr>                 <!--Aqui ... -->
             <?php $datas = read_file (NAME_FILE) ;$datas = explode ('|',$datas[0]) ;?>
                <?php for ($i = 0; $i < sizeof($datas) - 1 ; $i+=2) {?>
                
                <tr>
                   <td><?= $datas[$i]?></td>                                 
                   <td class="table-views-quantity"><?= $datas[$i + 1]?></td>   
                </tr>             
            <?php }?>
            </table>
    <?php } else {?> <!-- Aqui .. -->
            <h4>Nenhum Produto Vendido até o momento</h4>
        <?php }?>
        </div>
           </div>
       </article>
</section>

<?php require '_footer.php'; ?>
