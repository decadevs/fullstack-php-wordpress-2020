<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/assets/styles/scss/main.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="d-flex">
    <div class="dashboard-sidebar">
        <div class="menu">
            <span class="logo-white">
                
            </span>
            <span class="menu-item">
                <a href="home.html">
                    <img src="assets/images/home.svg" alt="home">
                </a>
            </span>
            <span class="menu-item">
                <a href="author.html">
                    <img src="assets/images/people.svg" alt="authors">
                </a>
            </span>
            <span class="menu-item">
                <a href="settings.html">
                    <img src="assets/images/settings.svg" alt="settings">
                </a>
            </span>
            <span class="menu-item logout">
                <a href="mysignin.html">
                    <img src="assets/images/log-out 1.svg" alt="log-out">
                </a>
            </span>
        </div>
        <div class="signout"></div>
    </div>
    <div class="dashboard--authors">
        <div class="searchbar">
            <div>
                <input type="text" class="search--area" placeholder="Search for author">
            </div>
            <img src="assets/images/Oval.svg" alt="User-Image">
        </div>
        <div class="table--container">
            <div class="authors--posttable--header">
                <div class="posttable--header--content">
                    <h3 class="table-title">
                        Settings
                    </h3>
                    <div class="settings-options">
                        <a class="link" href="/week3/tue/settings.html"><img src="assets/images/settings icon1.svg" alt="profile-settings-icon"><h5 class="table-title">Profile Settings</h5></a>
                        <a class="link" href="/week3/tue/security.html"><img src="assets/images/settings icon2.svg" alt=""><h6>Security</h6></a>
                        <a class="link" href="/week3/tue/connect-website.html"><img src="assets/images/settings icon3.svg" alt=""><h6>Connect Website(s)</h6></a>
                        <a class="link" href="/week3/tue/token.html"><img src="assets/images/settings icon4.svg" alt=""><h6>Get Token</h6></a>
                    </div>
                    <div class="profile-settings">
                        <div class="profile-top">
                            <h4 class="table-title">Profile Settings</h4>
                            <h5>Edit basic information about you</h5>
                        </div>
                        <hr>
                        <div class="profile-body">
                            <form action="">
                                <div class="author-pic">
                                    <img src="./assets/images/Ellipse 1.svg" alt="Image">
                                    <label for="pic">
                                    <img class="add-image" src="./assets/images/Group 7236.svg" alt="add-image"/>
                                    </label>
                                    <input type="file" id="pic">
                                </div>
                                <div class="form-inputs-container">
                                    <label for="firstname">Enter your First Name
                                    <input type="text" name="firstname" id="firstname" class="modal-input" placeholder="John">
                                    </label>
                                    <label for="lastname">Enter your Last Name
                                    <input type="text" name="lastname" id="lastname"  class="modal-input" placeholder="John">
                                    </label>
                                </div>
                                <div class="form-inputs-container">
                                    <label for="email">Email Address
                                    <input type="email" name="email" id="email" class="modal-input" placeholder="John@gmail.com">
                                    </label>
                                    <label for="phone">Phone number
                                    <input type="tel" name="phone" id="phone" class="modal-input" placeholder="070680373937">
                                    </label>
                                </div>
                                <div class="form-inputs-container form-submit">
                                    <div class="form-submit-container">
                                        <button>Cancel</button>
                                        <input type="submit" value="Save Changes" class="btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>