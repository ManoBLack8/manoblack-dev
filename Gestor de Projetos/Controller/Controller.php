<?php 
namespace Controller;
class Controller {
    
    function __construct(){
        if (isset($_GET['action'])) {
            // Obtenha o valor do parâmetro 'action'
            $action = $_GET['action'];
            
            // Verifique se a função correspondente existe e chame-a
            if (function_exists($action)) {
                call_user_func($action);
            } else {
                echo "A função '$action' não existe.";
            }
        } else {
            echo "Nenhuma ação foi especificada.";
        }
    }

    
}