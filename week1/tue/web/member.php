<?php
    $border = "0";
    $width = "500";
    $message = '';  
    $error = '';
    $firstname = $lastname = "";

    if(isset($_POST["submit"])) {
        if(empty($_POST["firstname"]))  
      {  
           $error = "<label class='text-danger'>Enter First Name</label>";  
      }  
      else if(empty($_POST["lastname"]))  
      {  
           $error = "<label class='text-danger'>Enter Last Name</label>";  
      }else {
        if(file_exists('./database.json')) {
            $dbdata = file_get_contents("./database.json");
            $phpdata = json_decode($dbdata, true);
            $data = array(
            'firstName' => $_POST["firstname"], 
            'lastName' => $_POST["lastname"]
        );
        $phpdata[] = $data;
        $updated = json_encode($phpdata);
        if(file_put_contents('./database.json', $updated)) {
            $message = "<label class='text-success'>File Appended Successfully</p>";
        }
        }
      }
    }
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>

    <style>
        .container {
            width: <?php echo $width . "px;" ?>
            margin: 100px auto;
        }

        .text-danger {
            color: red;
        }

        .text-success {
            background-color: lightgreen;
        }

        .odd {
            background: #00bb55;
        }
        .even {
            background: lightgreen;
        }

        td {
            text-align: center;
            height: 35px;
        }
        
    </style>
</head>
<body>
<div>
    <a href="about.php">About</a>  
</div>

<h2>PHP - Form Assignment</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php   
    if(isset($error))  
    {  
        echo "$error <br>";  
    }  
    ?>  
    First Name: <input type="text" name="firstname">
    <br><br>
    Last Name: <input type="text" name="lastname">
    <br><br>
    <input type="submit" name="submit" value="Submit"> 
    <br>
    <?php  
        if(isset($message))  
        {  
            echo $message;  
        }  
        ?> 
</form>

<div class="container">
    <table width="100%" border="<?php echo $border; ?>" cellpadding="0" cellspacing="0">
        <thead>
            <tr class="even">
                <td>First Name</td>
                <td>Last Name</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        <?php
        $dbcontent = file_get_contents("./database.json");
        $members = json_decode($dbcontent, true);
        $index = 1;
        if ($members !== null) {
            foreach($members as $member) { ?>
                <tr class="<?php echo $index % 2 == 0 ? 'even' : 'odd'; ?>">
                    <td><?php echo $member['firstName']; ?> </td>
                    <td><?php echo  htmlspecialchars($member['lastName']); ?></td>
                    <td><button>Edit</button></td>
                </tr>
            <?php $index++; }
            } ?>
        </tbody>
    </table>
</div>

</body>
</html>