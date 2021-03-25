<?php
//Hash the topic id
require_once(__DIR__.'/../hashids/lib/Hashids/HashGenerator.php');
require_once(__DIR__.'/../hashids/lib/Hashids/Hashids.php');

// use Hashids\Hashids; //namespace, class in Hashids.php
$hashids = new Hashids\Hashids('this is my code for the hash', 10); //second argument number of digits
// var_dump($hashids);
?>

<div class="topic" data-topic-id="<?= $hashids->encode($jTopic->topic_id)?>">
  <div>
    <img src="images/<?php echo $jTopic->topic_user_image_path ?>">
  </div>
  <div>
    <div>
      @<?php echo htmlspecialchars($jTopic->topic_user_profile_name) ?>
    </div>
    <div>
      <?php echo htmlspecialchars($jTopic->topic_message) ?>
    </div>
    <?php 
    if(isset($jTopic->topic_image_path)){
      ?>  
      <img src="<?= $jTopic->topic_image_path ?>">
      <?php
    }     
    ?>
  </div>
</div>