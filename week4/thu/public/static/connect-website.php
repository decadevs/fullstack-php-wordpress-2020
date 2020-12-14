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
                        <a class="link" href="/week3/tue/connect-website.html"><img src="assets/images/settings icon3.svg" alt=""><h5 class="table-title">Connect Website(s)</h5></a>
                        <a class="link" href="/week3/tue/token.html"><img src="assets/images/settings icon4.svg" alt=""><h6>Get Token</h6></a>
                    </div>
                    <div class="profile-settings">
                        <div class="profile-top">
                            <h4 class="table-title">Connect Website</h4>
                            <h5>Add website to begin tracking</h5>
                        </div>
                        <hr>
                        <input type="checkbox" id="click" style="display: none">
                        <div class="overlay"></div>
                                <div class="modal">
                                    <div class="modal-top">
                                        <h3>Add Website</h3>
                                        <label for="click">
                                            <a class="close"><img src="./assets/images/Path.png" alt="Close-image"></a>
                                        </label>
                                    </div>
                                    <div class="add-website-form">
                                        <form action="">
                                            <label for="email">Website Url</label>
                                            <input type="email" name="email" id="email" class="modal-input" placeholder="Enter Url">
                                            <input type="submit" value="Add Website" class="btn-primary">
                                        </form>
                                    </div>
                                </div>
                        <div class="profile-body">
                            <div class="form-inputs-container">
                                <label class="button" for="click">
                                    <a class="btn btn-table">Add Website</a>
                                </label>
                            </div>
                            <div class="table--body">
                                <div class="table-row">
                                    <span class="author--index">1</span>
                                    <span class="row-info">
                                        <span class="row--item">
                                            www.websiteone.com
                                        </span>
                                        <span class="delete">
                                            DELETE                   
                                        </span>
                                    </span>
                                </div>
                                <div class="table-row">
                                    <span class="author--index">2</span>
                                    <span class="row-info">
                                        <span class="row--item">
                                            www.websiteone.com
                                        </span>
                                        <span class="delete">
                                            DELETE                   
                                        </span>
                                    </span>
                                </div>
                        </div>
                    </div>
                </div>
                
</body>
</html>