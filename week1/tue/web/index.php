<?php 
    $members = [

        ['firstName' => 'Mike', 'lastName' => "James", 'age' => 50],
        ['firstName' => 'Jane', 'lastName' => 'Mathew', 'age' => 35],
        ['firstName' => 'Mariam', 'lastName' => 'Lateef', 'age' => 25],
];

$border = "0";
$width = "400";

$lastPerson = $members[count($members)-1];
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

        .odd {
            background: #2b591d;
        }
        .even {
            background: green;
        }
        
    </style>
</head>
<body>


<div class="container">
    <table width="100%" border="<?php echo $border; ?>" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Age</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
         <?php
        
         $index = 0;
         foreach($members as $member) { ?>
            <tr class="<?php echo $index % 2 == 0 ? 'even' : 'odd'; ?>">
                <td><?php echo $member['firstName']; ?> (<?php echo $member['age'] >= 50 ? 'old' : 'young'; ?>)</td>
                <td><?php echo  htmlspecialchars($member['lastName']); ?></td>
                <td><?php echo $member['age']; ?></td>
                <td><button>Edit</button></td>
            </tr>
         <?php $index++; } ?>
        </tbody>
        
    </table>

    <form action="">
            <input type="text" value="<?php echo $lastPerson['lastName'] ?>">
            <button>Save</button>
    </form>

    <a href="about.php">About</a>

</div>

    
</body>
</html>