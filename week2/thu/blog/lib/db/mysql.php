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

    $sql = 'SELECT * FROM posts ORDER BY created_at DESC';

    $output = [];

    if($result = mysqli_query($con, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
    } else {
        // Log or return error
        return false;
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
    mysqli_stmt_bind_param($statement, 'ssis', 
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

function create_user($con, array $data) {
    if(!isset($data['created_at'])) {
        $data['created_at'] = date('Y-m-d H:i:s');
    }

    $sql = 'INSERT INTO users (name, password, email, created_at)
    VALUES (?,?,?,?)';

    // Step1: Prepare
   $statement = mysqli_prepare($con, $sql);

   if($statement) {

      // Step2: bind
      mysqli_stmt_bind_param($statement, 'ssss', 
      $data['name'], $data['password'], $data['email'], $data['created_at']
       );

       // Step3: execute
       mysqli_stmt_execute($statement);
       return true;

   }

   return false;
}

function get_user($con,  int $user_id) {

    $sql  = 'SELECT * FROM users WHERE id =' . $user_id;

    if ($result = mysqli_query($con, $sql)) {
        return  mysqli_fetch_assoc($result);
    }

    return false;
    
}

function get_comment_count($con, int $post_id) {

    $sql = 'SELECT COUNT(*) as count FROM comments WHERE post_id =' . $post_id;

    if ($result = mysqli_query($con, $sql)) {
        return  mysqli_fetch_assoc($result);
    }

    return false;
}

function create_comment($con, $data) {
    if(!isset($data['created_at'])) {
        $data['created_at'] = date('Y-m-d H:i:s');
    }

    $sql = 'INSERT INTO comments (post_id, comment, user_id, created_at)VALUES(?, ?, ?, ?)';

    // Step1: Prepare
   $statement = mysqli_prepare($con, $sql);

   if($statement) {

      // Step2: bind
      mysqli_stmt_bind_param($statement, 'isis', 
      $data['post_id'], $data['comment'], $data['user_id'], $data['created_at']
       );

       // Step3: execute
       mysqli_stmt_execute($statement);

   }

   return false;
}

function get_comments($con, $post_id) {

    $sql  = 'SELECT * FROM comments WHERE post_id =' . $post_id;

    $output = [];

    if($result = mysqli_query($con, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
    } else {
        // Log or return error
        return false;
    }
    
    return $output;
}

function user_valid($con, String $email) {

    $sql  = 'SELECT * FROM users WHERE email = ?';

    // Step1: Prepare
    $statement = $con->prepare($sql);

    if($statement) {

        // Step2: bind
        $statement->bind_param("s", $email);
        
        // Step3: execute
        $statement->execute();

        $result = $statement->get_result();

        $data = $result->fetch_assoc();

        return $data;
    }

    return false;
}