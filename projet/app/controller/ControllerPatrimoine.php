<!-- ----- debut ControllerCave -->
<?php
class ControllerPatrimoine {
    
    public static function mesPropositions() {
    $results = ModelPatrimoine::getAll();
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/public/documentation/mesPropositions.php';
    if (DEBUG){
        echo ("ControllerProducteur : producteurReadAll : vue = $vue");
    }
    require ($vue);
    }
    
    public static function patrimoineAccueil() {
    include 'config.php';
    $vue = $root . '/app/view/viewPatrimoineAccueil.php';
    if (DEBUG){
        echo ("ControllerPatrimoine : patrimoineAccueil : vue = $vue");
    }
    require ($vue);
 }
    
}
?>
<!-- ----- fin ControllerCave -->