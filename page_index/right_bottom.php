<div id="bottom">
  <div id="title">
    People you should follow
  </div>
  
  <?php 
  require_once(__DIR__.'/../protected/mariadb.php');
  $q = $db->prepare('SELECT * FROM users ORDER BY RAND() LIMIT 5');
  $q->execute();
  $ajUsers = $q->fetchAll();
  foreach($ajUsers as $jUser){    
    include(__DIR__.'/right_bottom_user.php');
  }
  ?>



  <div id="more">
    Show more
  </div>

</div>