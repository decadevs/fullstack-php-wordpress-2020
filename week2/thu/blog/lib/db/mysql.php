<?php 
if(!defined('__INCLUDED__')) die('You can not run this file');



/**
 * Connect to mysql
 * 
 * @return resource|boolean
 */
function con() {
    
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$con) {
        die( "error dey");
        return false;
    }

    return $con;
}

/**
 * Get posts
 */

 function get_posts($con): array{

    $sql = 'SELECT * FROM posts';

    $output = [];

    if($result = mysqli_query($con, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
    } else {
        // Log or return error

    }
    
    return $output;
 }

 /**
  * Insert post
  */
  function create_post($con, array $data) {
      if(!isset($data['created_at'])) {
          $data['created_at'] = date('Y-m-d H:i:s');
      }

      $sql = 'INSERT INTO posts (title, content, user_id, created_at)
      VALUES (?,?,?,?)';

      // Step1: Prepare
     $statement = mysqli_prepare($con, $sql);

     if($statement) {

        // Step2: bind
        mysqli_stmt_bind_param($statement, 'ssds', 
        $data['title'], $data['content'], $data['user_id'], $data['created_at']
         );

         // Step3: execute
         mysqli_stmt_execute($statement);

     }

     return false;
  }


  /**
   * Get single post
   */


   function get_post($con,  int $post_id) {

        $sql  = 'SELECT * FROM posts WHERE id =' . $post_id;

        if ($result = mysqli_query($con, $sql)) {
            return  mysqli_fetch_assoc($result);
        }

        return false;
        
   }

   function count_post($con): int {
       $sql = 'SELECT COUNT(*) as c FROM posts';

        if ($result = mysqli_query($con, $sql)) {
            $row = mysqli_fetch_assoc($result);

            return intval($row['c']);
        }

    return 0;
   }

   function get_comment($con, $post_id): array{

    $sql = 'SELECT * FROM comments WHERE post_id='.$post_id;

    $output = [];

    if($result = mysqli_query($con, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
    } else {
        // Log or return error

    }
    
    return $output;
 }

 function create_comment($con, array $data) {
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $sql = 'INSERT INTO comments (post_id, comment, user_id)
        VALUES (?,?,?)';
    $statement = mysqli_prepare($con, $sql);

   
    if($statement) {

      mysqli_stmt_bind_param($statement, 'dsd', 
      $data['post_id'], $data['comment'], $data['user_id']
       );
       mysqli_stmt_execute($statement);
       
    }

   }

   return false;
}

function count_comments($con, $post_id): int {
    $sql = 'SELECT COUNT(*) as cont FROM comments WHERE post_id='.$post_id;

     if ($result = mysqli_query($con, $sql)) {
         $row = mysqli_fetch_assoc($result);

         return intval($row['cont']);
     }

 return 0;
}

function get_user($con, $name, $password) {

    $sql  = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";

    if ($result = mysqli_query($con, $sql)) {
        return mysqli_fetch_assoc($result);

    }

    return false;
    
}

function get_username($con, $post_id) {

    $sql  = "SELECT users.name 
    FROM comments 
    INNER JOIN users ON comments.user_id = users.id
    WHERE comments.user_id =".$post_id ;

    if ($result = mysqli_query($con, $sql)) {
        return mysqli_fetch_assoc($result);

    }

    return false;
    
}

function create_user($con, array $data) {
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $sql = 'INSERT INTO users (name, password, email)
        VALUES (?,?,?)';
    $statement = mysqli_prepare($con, $sql);
    if($statement) {
      mysqli_stmt_bind_param($statement, 'sss', 
       $data['name'], $data['password'], $data['email']
       );
       mysqli_stmt_execute($statement);
       
    }

   }

   return false;
}
