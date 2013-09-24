<?php
    /**
     * Funções destinadas a manipulação do arquivo
     **/

    define ('NAME_FILE', 'bestsellers.txt') ; // Jogos mais vendidos
    define ('NAME_OTHER_FILE' , 'most_viewed.txt') ; // Jogos mais vizualizados
    define ('PATH_FILE', APP_ROOT_FOLDER. '/admin/files/') ; //Pasta default para arquivos txt
   
    // Cria os arquivos
    function create_files () {
        if (!file_exists(PATH_FILE . NAME_FILE)) {
            $file = fopen (PATH_FILE . NAME_FILE, 'w+') ;
            fclose ($file) ;
        }        
        if (!file_exists(PATH_FILE . NAME_OTHER_FILE)) {
            $other_file = fopen (PATH_FILE . NAME_OTHER_FILE , 'w+') ;
            fclose ($other_file) ;
        }   
    }

    function counter_views ($item , $file_name) {
        $datas = read_file ($file_name, false, true) ;
        $file_name = PATH_FILE . $file_name ;        
        $datas = explode ('|',$datas[0]) ;

            if (in_array($item , $datas)) {
            $key = array_search ($item , $datas) ;
           if (is_numeric($key)) {
                $datas[$key + 1] += 1 ;
                $data_write = implode ('|' , $datas) ;
                  $file = fopen ($file_name , 'w+') ;
                file_put_contents ($file_name , $data_write) ;
                fclose ($file) ;            
              }
        } 

        else {
              $file = fopen ($file_name , 'a+') ;
            $add = $item . '|' . 1 . '|';
            fwrite ($file, $add) ;        
            fclose ($file) ;
        } 
    }

     # void
     function update_most_viewed ($item ,$file_name) {         
         $datas = read_file ($file_name, true) ;
         $datas = explode ('|' , $datas) ;
         $itens = explode ('|' , $item) ;
        $file_name = PATH_FILE . $file_name ;
               if (in_array($itens[0] , $datas)) { 
            $data_write = enhange_existing ($datas , $itens) ;      
                   $file = fopen ($file_name , 'w+') ;
                    file_put_contents ($file_name , $data_write) ;
            fclose ($file) ;
            $test = read_file (NAME_OTHER_FILE) ;
               }
         else {
                   $file = fopen ($file_name , 'a+') ;
            $add = $item . '|' ;
            fwrite ($file, $add) ;        
            fclose ($file) ;
               }
    }

    // Lê o arquivo 
    # array ou string
    function read_file ($file_name, $string = false, $exploded = false) {
        $file_name = PATH_FILE . $file_name ;
        $file = fopen ($file_name , 'r') ;        
        if ($string) {
            $datas = file_get_contents ($file_name) ;
        }        
        
        else {
            $datas = file ($file_name) ;
        }

        if ($exploded && empty ($datas)) {
                $datas = explode ('|' , $datas) ;
        }       
        fclose ($file) ;        
        return $datas ;    
    }

    /**
     * Caso um produto exista no arquivo 
     * essa função vai preparar uma array
     * que será escrita no arquivo 
     **/
    function enhange_existing ($datas = array () , $itens = array ()) {
        $key = array_search ($itens[0], $datas) ;
        $datas [$key + 1] = $datas [$key + 1] + $itens[1] ;               
        $datas = implode ('|' , $datas) ;
        return $datas ;
    }

   

    function isEmptyFile ($file_name) {
        $datas = read_file ($file_name) ;
        return empty ($datas) ;
    } 
   
?>
