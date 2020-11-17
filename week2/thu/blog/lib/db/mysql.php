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

function count_post($con, $post_id): int {
    $sql = 'SELECT COUNT(*) as c FROM comments WHERE post_id =' . $post_id;

    if ($result = mysqli_query($con, $sql)) {
        $row = mysqli_fetch_assoc($result);

        return intval($row['c']);
    }

    return 0;
}

    //get the author of the post
    function get_user($con, int $user_id){
        $sql = 'SELECT * FROM users WHERE id =' . $user_id;
        if($result = mysqli_query($con, $sql)){
            return mysqli_fetch_assoc($result);
        }
        return false;
    }

    //Create user
    function create_user($con, array $data){

        $sql = 'INSERT INTO users (name, email, password) VALUES (?,?,?)';

        // Step1: Prepare
        $statement = mysqli_prepare($con, $sql);

        if($statement) {

            // Step2: bind
            mysqli_stmt_bind_param($statement, 'sss',
                $data['name'], $data['email'], $data['password']
            );

            // Step3: execute
            mysqli_stmt_execute($statement);
            return true;
        }

        return false;
}

//get email
function get_email($con, string $user_email){
    $sql = 'SELECT * FROM users WHERE email =' . '"'.$user_email . '"';
    if($result = mysqli_query($con, $sql)){
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function get_comments($con, int $id): array{

    $sql = 'SELECT * FROM comments WHERE post_id=' . $id;

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
 * Insert comment
 */
function create_comment($con, array $data) {

    $sql = 'INSERT INTO comments (user_id, post_id, message)
      VALUES (?,?,?)';

    // Step1: Prepare
    $statement = mysqli_prepare($con, $sql);

    if($statement) {

        // Step2: bind
        mysqli_stmt_bind_param($statement, 'dds',
            $data['user_id'], $data['post_id'], $data['message']
        );

        // Step3: execute
        mysqli_stmt_execute($statement);
        return true;
    }

    return false;
}