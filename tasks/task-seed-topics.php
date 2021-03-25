<?php

require_once(__DIR__.'/../protected/mariadb.php');

// Via GET pass the number of users that should be inserted
$numberOfTopicsToInsert = $_GET['numberOfTopicsToInsert'] ?? 1;
require_once(__DIR__.'/../faker/src/autoload.php');
$faker = Faker\Factory::create();


if( isset($_GET['truncate']) ){
  $q = $db->prepare('TRUNCATE TABLE topics');
  $q->execute();
}

$q = $db->prepare('INSERT INTO topics 
VALUES(:topic_id, :topic_message, :topic_image_path, :topic_total_likes, 
:topic_total_dislikes, :topic_total_loves, :topic_total_hates, :topic_created, 
:topic_active, 
:topic_user_fk, :topic_user_profile_name, :topic_user_image_path )');

$q->bindParam(':topic_id', $topic_id);
$q->bindParam(':topic_message', $topic_message);
$q->bindParam(':topic_image_path', $topic_image_path);
$q->bindParam(':topic_total_likes', $topic_total_likes);
$q->bindParam(':topic_total_dislikes', $topic_total_dislikes);
$q->bindParam(':topic_total_loves', $topic_total_loves);
$q->bindParam(':topic_total_hates', $topic_total_hates);
$q->bindParam(':topic_created', $topic_created);
$q->bindParam(':topic_active', $topic_active);
$q->bindParam(':topic_user_fk', $topic_user_fk);
$q->bindParam(':topic_user_profile_name', $topic_user_profile_name);
$q->bindParam(':topic_user_image_path', $topic_user_image_path);

// We will create x amount of topics
for($i = 0; $i < $numberOfTopicsToInsert; $i++){
  try{

    $topic_id = null;
    $topic_message = $faker->realText($maxNbChars = 140, $indexSize = 5);
    $topic_image_path = rand(0, 3) == 1 ? 'https://source.unsplash.com/random?sig='.$i.'/600x250/' : '';
    $topic_total_likes = $faker->randomNumber($nbDigits = NULL, $strict = false);
    $topic_total_dislikes = $faker->randomNumber($nbDigits = NULL, $strict = false);
    $topic_total_loves = $faker->randomNumber($nbDigits = NULL, $strict = false);
    $topic_total_hates = $faker->randomNumber($nbDigits = NULL, $strict = false);
    $topic_created = time();
    $topic_active = 1;

    // The max rand number cannot be greater than the highest id in the users table
    $topic_user_fk = rand(1, 30);
    // Get data from the random selected user
    try{
      $userQuery = $db->prepare('SELECT * FROM users WHERE user_id = :user_id LIMIT 1');
      $userQuery->bindValue(':user_id', $topic_user_fk);
      $userQuery->execute();
      $jUser = $userQuery->fetchAll()[0];
      $topic_user_profile_name = $jUser->user_profile_name;
      $topic_user_image_path = $jUser->user_image_path;
    }catch(Exception $ex){
      echo 'Error getting user';
    }
    $q->execute();
  }catch(Exception $ex){
    echo $ex;
    // continue;
  }      
}
echo 'done';

