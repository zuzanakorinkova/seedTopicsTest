<?php 
require_once(__DIR__.'/../protected/mariadb.php');
?>

<div id="middle">
  <?php
  require_once(__DIR__.'/middle_create_post.php');
  
  $q = $db->prepare('SELECT * FROM topics ORDER BY RAND() LIMIT 20');
  $q->execute();
  $ajTopics = $q->fetchAll();
  foreach($ajTopics as $jTopic){    
    include(__DIR__.'/middle_topic.php');
  }
  ?>
</div>