<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Card</title>
</head>
<style>
*{
    box-sizing: border-box;
        margin: 0;
        padding: 0;
}
    body{
        font-family: verdana, garamond;
        text-decoration: none;
       
    }
    .container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fafafa;
    }

    .member-form{
        background: #fff;
        width: 50%;
        height: 70vh;
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        box-shadow: 0 6px 10px rgba(200,200,200,0.8);
    }

    .form-content-wrapper>*{
        margin: 20px auto;
        width: 100%;
        padding: 5px 25px;
        /* border: 1px solid red; */
    }

    input{
        width: 100%;
        height: 2.4rem;
        border: 1px solid;
        border-radius: 6px;
        padding: 5px;
        font-family: verdana;
        outline: none;
    }

    button{
        padding: 10px;
        border-radius: 5px;
        color: #fff;
        background-color: rgba(190,190,190,0.9);
        cursor: pointer;
        font-size: 1.2rem;
        font-family: verdana;
        border: none;
        transition: 'background-color' 0.8s;
        outline: none;
    }

    button:hover{
        background-color: rgba(150,150,150,0.7);
    }

    button:focus{
        outline: none;
    }

</style>
<body>
    <div class="container">
        <form action="./save.php" class="member-form" method="post">
            <div class="form-content-wrapper">
                <div class="inp-grp">
                    <input type="text" name="firstname" placeholder="Enter firstname of member">
                </div>
                <div class="inp-grp">
                    <input type="text" name="lastname" placeholder="Enter your lastname of member">
                </div>
                <div class="send-grp">
                    <button name="add" type="submit">Add Member</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>