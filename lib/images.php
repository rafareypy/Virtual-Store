<?php
	/*
	Funções destinadas a manipular imagens
	*/

	function add_image ($name = null, $path = null, $options = '') {
	    
        if (empty ($name) || empty ($path)) {
            exit () ;
        }
        else {
            $img = IMAGES_FOLDER . $path .'/'. $name ;
            return "<img src='{$img}' {$options} />" ;
        }      
    }


?>
