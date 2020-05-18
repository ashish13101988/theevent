<?php

function findCurrentPage(){
     
      $request = trim($_SERVER['REQUEST_URI'],'/');
  
      $urlPage = explode('/',$request);
  
      if(!empty($urlPage[1])){
        
          $page = $urlPage[1]; 

          if(!file_exists('pages/'.$page.'.php')){
            $currentPage = 404;
          }else{
            $currentPage = strtolower($urlPage[1]);
          }

      }else{
        $currentPage = 'home';
      }
      return $currentPage;
  }