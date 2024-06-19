
<!-- ----- début viewTransfertForm -->
 
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
        <input type="hidden" name='action' value='compteTransfered'>        
        <label class='w-25' for="compte1">Sélectionnez le compte de retrait : </label> <select class="form-control" id='compte1' name='compte1' style="width: 100px">
            <?php
            foreach ($accounts as $compte) {
                printf("<option value='%s'>%s</option>", $compte['id'], $compte['label']);
            }
            ?>
        </select><br/>
        <label class='w-25' for="compte2">Sélectionnez le compte de dépôt : </label> <select class="form-control" id='compte2' name='compte2' style="width: 300px">
            <?php
            foreach ($accounts as $compte) {
                printf("<option value='%s'>%s</option>", $compte['id'], $compte['label']);
            }
            ?>
        </select><br/>
        <label class='w-25' for="montant">Montant</label><input type="number" step='any' name='montant' id='montant' value='100'><br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewTransfertForm -->