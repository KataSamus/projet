
<!-- ----- début viewInsert -->
 
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
        <input type="hidden" name='action' value='compteCreated'>
        <label class='w-25' for="label">Label</label><input type="text" name='label' id='label' value='' style="width: 200px" required><br/>                    
        <label class='w-25' for="montant">Montant</label><input type="text" name='montant' id='montant' value='' style="width: 200px" required><br/>
        <label for="banque">Sélectionnez une banque</label> <select class="form-control" id='banque' name='banque' style="width: 200px" required>
            <?php
            foreach ($results as $label) {
             echo ("<option value=" . $label->getId() . ">" . $label->getLabel() . "</option>");
            }
            ?>
        </select>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewInsert -->