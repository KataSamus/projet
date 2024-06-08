
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu0.html';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?> 

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='banqueCreated'>        
        <label class='w-25' for="id">label : </label><input type="text" name='label' value='Crédit de Troyes'> <br/>                          
        <label class='w-25' for="id">pays : </label><input type="text" name='pays' value='France'> <br/>        
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewInsert -->



