
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
        <input type="hidden" name='action' value='AccountCreated'>        
        <label class='w-25' for="id">Nom : </label><input type="text" class="form-control" id="nom" name='nom' required><br/>                          
        <label class='w-25' for="id">Prenom : </label><input type="text" class="form-control" id="prenom" name='prenom' required><br/> 
        <label class='w-25' for="id">Login : </label><input type="text" class="form-control" id="login" name='login' required><br/>          
        <label class='w-25' for="id">Password : </label><input type="text" class="form-control" id="password" name='password' required><br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

<!-- ----- fin viewInsert -->



