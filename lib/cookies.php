<?php
    /**
     * Funções destinadas a manipulação do cookie
     * aqui ficam apenas as funções, elas são utilizadas
     * no diretório buy
     **/

    define ('NAME_COOKIE','products') ;
    define ('TIME_COOKIE', time () + 60 * 60 * 24) ;
    define ('PATH_COOKIE', '/') ;

    function create_or_update_cookie ($item) {
               
        if (!isset($_COOKIE[NAME_COOKIE])) {
            $item .= '|' . '1' ;            
            setcookie (NAME_COOKIE , $item , TIME_COOKIE, PATH_COOKIE) ;
        }
        else {
            $datas = explode ('|', $_COOKIE[NAME_COOKIE]) ;
            $key = array_search ($item, $datas) ;

            if (is_numeric($key) ) {
                $key = $key + 1 ;
                $datas[$key] = $datas[$key] + 1 ;
                unset($_COOKIE[NAME_COOKIE]) ;
                $datas = implode ('|', $datas) ;    
                setcookie (NAME_COOKIE, $datas, TIME_COOKIE, PATH_COOKIE) ; 
            } else {
                $datas = $_COOKIE[NAME_COOKIE] ;
                $datas .= '|' . $item. '|' . '1' ;
                unset ($_COOKIE[NAME_COOKIE]) ;
                setcookie (NAME_COOKIE, $datas , TIME_COOKIE, PATH_COOKIE) ;
            }            
        }   
    }

    
    function read_cookie () {
        if (isset($_COOKIE[NAME_COOKIE])) {
            $products = explode ('|' , $_COOKIE[NAME_COOKIE]) ;
            return $products ;
        }

        else {
            return 0 ;
        }
    } 
    /*
     * type = nome do campo 
     * value = valor do campo para fazer a busca 
     */

    function find_details ($type, $value, &$products = array ()) {
        foreach ($products as $product) {
            if ($product [$type] == $value) {
                $datas = array (
                    'name' => $product['name'],
                    'img' => $product['img'],
                    'price' => $product['price'] ,
                    'discount_price' => $product ['discount_price'] 
                ) ;
            return $datas ; 
            }        
        }        
    }
?>
