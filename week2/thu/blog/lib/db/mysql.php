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
        if(mysqli_stmt_execute($statement)){
            return $data;
        }

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

/**
 * Get comments
 */
 function get_comments($con, $post_id): array{

    $QUERY = 'SELECT * FROM comments WHERE post_id=?';

    $output = [];
    $statement = mysqli_prepare($con, $QUERY);

    if(!$statement) {
        echo mysqli_error($con);
    } 

    mysqli_stmt_bind_param($statement, "i", $post_id); //bind the prepared statement parameter
    
    if(mysqli_execute($statement)){

        $result = mysqli_stmt_get_result($statement);
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

    } 
    
    return $output;
 }

 /**
  * Create comment
  */
function create_comment($con, array $data) {
    if(!isset($data['created_at'])) {
        $data['created_at'] = date('Y-m-d H:i:s');
    }

    $sql = 'INSERT INTO comments (content, user_id, post_id, created_at)
    VALUES (?,?,?,?)';

    // Step1: Prepare
   $statement = mysqli_prepare($con, $sql);

   if($statement) {

      // Step2: bind
      mysqli_stmt_bind_param($statement, 'siis', 
      $data['content'], $data['user_id'], $data['post_id'], $data['created_at']
    );

     // Step3: execute
     if(mysqli_stmt_execute($statement)){
         return $data;
     }

   }

   return false;
}

function count_comments($con, $post_id): int {
    $QUERY = 'SELECT COUNT(*) as c FROM comments WHERE post_id = ?';

     $statement = mysqli_prepare($con, $QUERY);

    if(!$statement) {
        echo mysqli_error($con);
    } 

    mysqli_stmt_bind_param($statement, "i", $post_id); //bind the prepared statement parameter
    
    if(mysqli_execute($statement)){

        $result = mysqli_stmt_get_result($statement);

        $row = mysqli_fetch_assoc($result);

        return intval($row['c']);
    } 
    

    return 0;
}