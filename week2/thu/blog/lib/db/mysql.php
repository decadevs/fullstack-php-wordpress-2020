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

         return true;

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
    * create comment
    */

    function create_comment($con, array $data){

        if(!isset($data['created_at'])) {
          $data['created_at'] = date('Y-m-d H:i:s');
      }

      $sql = "INSERT INTO comments(post_id, comment, user_id, created_at) VALUE (?,?,?,?)";

      $stmt = mysqli_prepare($con, $sql);

      if($stmt){
          mysqli_stmt_bind_param($stmt, 'dsds', 
          $data['post_id'], $data['comment'], $data['user_id'], $data['created_at']
        );

        if(!mysqli_stmt_execute($stmt)){
            return false;
        }
      }

      return false;

    }

    /**
     * 
     * return all comments on a post
     */

     function get_comments($con, int $post_id){
         $comments = [];
         $sql = 'SELECT * FROM comments WHERE post_id ='.$post_id;

         $result = mysqli_query($con, $sql);

         if($result){
            while($row = mysqli_fetch_assoc($result)) {
                array_push($comments, $row);
            }
            return $comments;
         }

         return false;
      }


     /**
      * count comments for a particular post
      */

      function count_comment($con, int $post_id){

          $sql = 'SELECT COUNT(*) AS total FROM comments WHERE post_id='.$post_id;

          $result = mysqli_query($con, $sql);

          if($result){
              $row = mysqli_fetch_array($result);
              return intval($row['total']);
          }

          return false;
      }


      /**
       * create a new user 
       */

       function create_new_user($con, array $data){
           
            if(!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
            }

            $sql = "INSERT INTO users(name, password, email, created_at) VALUE (?,?,?,?)";

            // $stmt = mysqli_stmt_init($con);

            $stmt = mysqli_prepare($con, $sql);

            if($stmt){
                mysqli_stmt_bind_param($stmt, "ssss", 
                $data['name'], $data['password'], $data['email'], $data['created_at']
                );
            }

            if(!mysqli_execute($stmt)){
                    return false;
                }

                    return false;
        }

        function authenticate($con, $email, $password){
            
            $sql = "SELECT * FROM users WHERE email='".$email."'";

            $result = mysqli_query($con, $sql);
            

            if($result){
                $user = mysqli_fetch_assoc($result);
                
                if(sha1(APP_KEY.$password) === $user['password']){
                    return $user;
            
                }
            }

            
            return false;
        }
    
    /**
     * 
     * get user by id
     * 
     */

     function getUser($con, int $userid){
         $sql = "SELECT * FROM users WHERE id =".$userid;

         $result = mysqli_query($con, $sql);

         if($result){
             $user = mysqli_fetch_assoc($result);
             return $user['name'];
         }

         return false;
     }