<?php
    require 'details_of_the_products.php' ;

    if (isset($_POST['add_to_cart'])) {
        create_or_update_cookie ($_POST['add_to_cart']) ;        
        counter_views ($_POST['add_to_cart'], NAME_OTHER_FILE) ;         
        flash ('success','Produto adicionado ao carrinho !') ;
        redirect_to (back()) ;
    } 

    else if (isset($_POST['buy'])) {
        create_or_update_cookie ($_POST['buy']) ;       
        redirect_to ('buy.php') ;
    }

    else if (isset($_POST['delete'])) {
        delete_product ($_POST['delete']) ;
        flash ('success' , 'Produto excluído com sucesso !!!') ;
        redirect_to (back ()) ;
    } 
    
    else if (isset($_POST['change_quantity'])){
        $index = $_POST['change_quantity'] ;

        if (!empty($_POST['quantity'][$index]) && $_POST['quantity'][$index] > 0) { 
                change_quantity ($_POST['change_quantity'], $_POST['quantity'][$index]) ;
                flash ('success', 'Quantidade alterada com sucesso !') ;
        }

        else{
                flash ('danger', 'Valor inválido') ;
        }            
    
        redirect_to (back()) ;
    }

    else if (isset($_POST['finish'])) {        
        update_most_viewed ($_COOKIE[NAME_COOKIE], NAME_FILE) ;   
        setcookie (NAME_COOKIE, '' , time () , PATH_COOKIE) ; 
        flash ('success','Compra realizada com sucesso !!!<br>Agradecemos a preferência') ;
        redirect_to ('/') ;    
    }

     ?>
