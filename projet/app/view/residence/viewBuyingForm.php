
<!-- ----- début viewBuyingForm -->
 
<?php 
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?> 

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='clientBuyingResidence'>
        <input type="hidden" name='id_res' value=<?php echo($residence->getId()); ?>>
        <label class='w-25' for="compte1">Sélectionnez le compte de l'acheteur</label> <select class="form-control" id='compte1' name='compte1' style="width: 300px">
            <?php
            foreach ($comptes_acheteur as $compte) {
                echo("<option value=" . $compte['id'] . ">" . $compte['label'] . "</option>");
            }
            ?>
        </select><br/>
        <label class='w-25' for="compte2">Sélectionnez le compte du vendeur</label> <select class="form-control" id='compte2' name='compte2' style="width: 300px">
            <?php
            foreach ($comptes_vendeur as $compte) {
                echo("<option value=" . $compte['id'] . ">" . $compte['label'] . "</option>");
            }
            ?>
        </select><br/>
        <label class='w-25' for="prix">Prix de la résidence</label><br><input type="textbox" step='any' name='prix' id='prix' value='<?php echo($residence->getPrix()); ?>' style="width: 200px" readonly><br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewBuyingForm -->