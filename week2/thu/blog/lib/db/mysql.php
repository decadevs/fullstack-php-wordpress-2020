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

   function count_post($con): int {
       $sql = 'SELECT COUNT(*) as c FROM posts';

        if ($result = mysqli_query($con, $sql)) {
            $row = mysqli_fetch_assoc($result);

            return intval($row['c']);
        }

    return 0;
<<<<<<< HEAD
   }

/**
 * Get comments
 */

 function get_comments($con, $post_id) {

    // $sql = 'SELECT * FROM comments WHERE post_id = ?';

    // /* create a prepared statement */
    //     $statement = mysqli_prepare($con, $sql);

    //     if($statement) {
    //         /* bind parameters for markers */
    //         mysqli_stmt_bind_param($statement, 'd', $post_id);
            
    //         /* execute query */
    //         mysqli_stmt_execute($statement);
            
    //         /* bind result variables */
    //         mysqli_stmt_bind_result($statement, $comments);
            
    //         /* fetch value */
    //         mysqli_stmt_fetch($statement);

    //         /* close statement */
    //         mysqli_stmt_close($statement);
            
    //         return $comments;
    //     }

    $sql  = 'SELECT * FROM comments WHERE post_id =' . $post_id;

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
  function create_comment($con, $content, int $user_id, $created_at, int $post_id) {
      if(!isset($data['created_at'])) {
          $data['created_at'] = date('Y-m-d H:i:s');
      }

      $sql = 'INSERT INTO comments (content, user_id, created_at, post_id)
      VALUES (?,?,?,?)';

      // Step1: Prepare
     $statement = mysqli_prepare($con, $sql);

     if($statement) {

        // Step2: bind
        mysqli_stmt_bind_param($statement, 'sdsd', 
         $content, $user_id, $created_at, $post_id
         );

         // Step3: execute
         mysqli_stmt_execute($statement);

     }

     return false;
  }

  function count_comments($con, int $post_id) {

    $sql = 'SELECT COUNT(*) FROM comments WHERE post_id = ?';
        
        /* create a prepared statement */
        $statement = mysqli_prepare($con, $sql);

        if($statement) {
            /* bind parameters for markers */
            mysqli_stmt_bind_param($statement, 'd', $post_id);
  
            /* execute query */
            mysqli_stmt_execute($statement);
            
            /* bind result variables */
            mysqli_stmt_bind_result($statement, $count);
            
            /* fetch value */
            mysqli_stmt_fetch($statement);

            /* close statement */
            mysqli_stmt_close($statement);
            
            return $count;
        }

  }


  /**
   * Get user
  */

   function get_user($con,   $user_id) {

        $sql  = 'SELECT * FROM users WHERE id =' . $user_id;

        if ($result = mysqli_query($con, $sql)) {
            return  mysqli_fetch_assoc($result);
        }

        return false;
        
   }
/**
 * Get posts with comment count
 */

 function get_posts_with_comment_count($con): array{

    $sql = "SELECT posts.*, u.name, COUNT(c.id) AS comments_count FROM posts
            INNER JOIN comments c
            ON c.post_id = posts.id
            INNER JOIN users u
            ON u.id = posts.user_id
            GROUP BY posts.id
            ";

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
=======
   }
>>>>>>> 345b5f962581a174e1c96a07d08b7b3999b1c537
