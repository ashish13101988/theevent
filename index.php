      
<?php  

    require __DIR__.'/vendor/autoload.php';
     
    $currentPage = findCurrentPage();
     
    $templateLogin = ['login','register','404'];

    if(in_array($currentPage,$templateLogin)){
        require('templates/loginTemplate.php');
    }else{
        require('templates/homeTemplate.php');
    }
   
    
?>
    
    

   
  


