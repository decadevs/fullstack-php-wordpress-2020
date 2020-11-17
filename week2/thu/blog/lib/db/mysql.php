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

 function get_posts($con): array {

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

   function comment_on_post($con, $comment, int $user_id, $created_at, int $post_id) {
       $sql = 'INSERT INTO comments (comment, user_id, created_at, post_id)
       VALUES (?,?,?,?)';

       // Step1: Prepare
     $statement = mysqli_prepare($con, $sql);

     if($statement) {

        // Step2: bind
        mysqli_stmt_bind_param($statement, 'sdsd', 
        $comment, $user_id, $created_at, $post_id
         );

         // Step3: execute
         mysqli_stmt_execute($statement);

     }

     return false;

   }


   function get_comments($con): array {

    $sql = 'SELECT * FROM comments ORDER BY created_at DESC';

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

 function count_comments_per_post($con, int $id): int {

     $sql = 'SELECT COUNT(*) FROM comments WHERE post_id = ' . $id;

     if ($result = mysqli_query($con, $sql)) {
         $row = mysqli_fetch_array($result);
    
        $total = $row[0];
         return $total;
     }

 return 0;
}