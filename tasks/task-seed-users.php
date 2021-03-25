<?php

require_once(__DIR__.'/../protected/mariadb.php');

require_once(__DIR__.'/../faker/src/autoload.php');
$faker = Faker\Factory::create();

try{
  if( isset($_GET['truncate']) ){
    $q = $db->prepare('TRUNCATE TABLE users');
    $q->execute();
    echo 'users table truncated';
  }
}catch(Exception $ex){
  echo $ex;
  http_response_code(400);
}

// Via GET pass the number of users that should be inserted
$numberOfUsersToInsert = $_GET['numberOfUsersToInsert'] ?? 1;


$q = $db->prepare('INSERT INTO users VALUES(:user_id, :user_name, :user_last_name, 
:user_profile_name, :user_email, :user_password, :user_image_path, :user_created, 
:user_verified, :user_active, :user_last_20_posts)');
$q->bindParam(':user_id', $user_id);
$q->bindParam(':user_name', $user_name );
$q->bindParam(':user_last_name', $user_last_name );
$q->bindParam(':user_profile_name', $user_profile_name) ;
$q->bindParam(':user_email', $user_email );
$q->bindParam(':user_password', $user_password );
$q->bindParam(':user_image_path', $user_image_path );
$q->bindParam(':user_created', $user_created );
$q->bindParam(':user_verified', $user_verified );
$q->bindParam(':user_active', $user_active );
$q->bindParam(':user_last_20_posts', $user_last_20_posts );
for($i = 0; $i < $numberOfUsersToInsert; $i++){
  try{

    // Get the image
    $image_id = uniqid(true);
    $iWidth = 250 + $i;
    $iHeight = 250 + $i;
    file_put_contents(__DIR__.'/../images/'.$image_id.'.png', file_get_contents('https://source.unsplash.com/random/'.$iWidth.'x'.$iHeight.'/'));

    $user_id = null;
    $user_name = $faker->firstName();
    $user_last_name = $faker->lastName();
    $user_profile_name = $faker->firstName().$faker->lastname();
    $user_email = $faker->email();
    $user_password = $faker->password();
    $user_image_path = $image_id.'.png';
    $user_created = time();
    $user_verified = 0;
    $user_active = 0;
    $user_last_20_posts = '';
    $q->execute(); 
    echo 'done';   
  }catch(Exception $ex){
    // echo $ex;
    // http_response_code(400);
    continue;
  }
}

