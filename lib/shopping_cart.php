<?php
    /**
     *  Funções responsaveis por controlar o carrinho
     **/

    function delete_product ($name = null) {
        if ($name != null) {
            if (isset ($_COOKIE[NAME_COOKIE])) {
                $datas = read_cookie () ;
                $key = array_search ($name, $datas) ;

                if (is_numeric($key)) {
                    unset($datas[$key]) ;
                    unset($datas[$key + 1]) ;
                    $datas = implode ('|' , $datas) ;
                    unset ($_COOKIE[NAME_COOKIE]) ;
                    setcookie (NAME_COOKIE, $datas , TIME_COOKIE , PATH_COOKIE) ;                
                    return true ;
                }
            }
        }
        
        else {
            return false ;
        }
    }

    function verify_cart_is_not_empty () {
        if (total_products_in_cart () == 0) {
            flash ('info', 'Seu carrinho está vazio') ;
            redirect_to ('/index.php') ;
        }
    }


    function change_quantity ($name, $quantity) {
        
        $datas = read_cookie () ;
        $key = array_search ($name, $datas) ;
       
        if (is_numeric($key)) {          
            $datas[$key + 1] = $quantity ;
            $datas = implode ('|', $datas) ;
            unset ($_COOKIE[NAME_COOKIE]);
            setcookie (NAME_COOKIE , $datas ,TIME_COOKIE, PATH_COOKIE) ;
        }
    }

    function total_products_in_cart () {        
        if (isset($_COOKIE[NAME_COOKIE])) {            
            $datas = explode ('|', $_COOKIE[NAME_COOKIE]) ;
            $total = 0 ;

        for ($i = 1; $i < sizeof($datas); $i+=2) {
            $total += $datas[$i] ; 
        }
            return $total ;
        }
        else {
            return 0 ;
        }    
    }
 
   
?>
