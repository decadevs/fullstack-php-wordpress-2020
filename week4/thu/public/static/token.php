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
                <a href="/dashboard">
                    <img src="assets/images/home.svg" alt="home">
                </a>
            </span>
            <span class="menu-item">
                <a href="/author">
                    <img src="assets/images/people.svg" alt="authors">
                </a>
            </span>
            <span class="menu-item">
                <a href="/settings">
                    <img src="assets/images/settings.svg" alt="settings">
                </a>
            </span>
            <span class="menu-item logout">
            <a href="/auth/login">
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
                        <a class="link" href="/week3/tue/settings.html"><img src="assets/images/settings icon1.svg" alt="profile-settings-icon"><h6>Profile Settings</h6></a>
                        <a class="link" href="/week3/tue/security.html"><img src="assets/images/settings icon2.svg" alt=""><h6>Security</h6></a>
                        <a class="link" href="/week3/tue/connect-website.html"><img src="assets/images/settings icon3.svg" alt=""><h6>Connect Website(s)</h6></a>
                        <a class="link" href="/week3/tue/token.html"><img src="assets/images/settings icon4.svg" alt=""><h5 class="table-title">Get Token</h5></a>
                    </div>
                    <div class="profile-settings">
                        <div class="profile-top">
                            <h4 class="table-title">Get Token</h4>
                            <h5>Add token to begin tracking</h5>
                        </div>
                        <hr>
                        <div class="profile-body">
                            <h4 class="instruction">Copy this code and paste it on the header section of your website</h4>
                            <div class="token-container">
                                <h4>KGFHKJDHFH8377643987!@#$#$JHBCB4</h4>
                                <a class="btn btn-table">Copy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>