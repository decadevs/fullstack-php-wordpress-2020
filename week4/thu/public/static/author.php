<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/assets/styles/scss/main.min.css" />
</head>
<body class="d-flex">
    <div class="dashboard-sidebar">
        <div class="menu">
            <span class="logo-white">
                
            </span>
            <span class="menu-item">
                <a href="/dashboard">
                    <img src="/static/assets/images/home.svg" alt="home">
                </a>
            </span>
            <span class="menu-item">
                <a href="/author">
                    <img src="/static/assets/images/people 1.svg" alt="authors">
                </a>
            </span>
            <span class="menu-item">
                <a href="/settings">
                    <img src="/static/assets/images/Vector-2.svg" alt="settings">
                </a>
            </span>
            <span class="menu-item logout">
                <a href="/auth/login">
                    <img src="/static/assets/images/log-out 1.svg" alt="log-out">
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
            <img src="/static/assets/images/Oval.svg" alt="User-Image">
        </div>
        <div class="table--container">
            <div class="table--container--header">
                <h2 class="tabel-title">
                    Authors
                </h2>
                <input type="checkbox" id="click" style="display: none">
                <label class="button" for="click">
                    <a class="btn btn-table">Add Author</a>
                </label>
                <div class="overlay"></div>
                <div class="modal">
                    <div class="modal-top">
                        <h3>Add Author</h3>
                        <label for="click">
                            <a class="close"><img src="/static//assets/images/Path.png" alt="Close-image"></a>
                        </label>
                    </div>
                    <div>
                        <form action="">
                            <div class="author-pic">
                                <img src="/static//assets/images/Ellipse 1.svg" alt="Image">
                                <label for="pic">
                                <img class="add-image" src="/static//assets/images/Group 7236.svg" alt="add-image"/>
                                </label>
                                <input type="file" id="pic">
                            </div>
                            <label for="name">Full Name</label>
                            <input type="text" name="name" id="name" class="modal-input" placeholder="Full name">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" class="modal-input" placeholder="Email Address">
                            <label for="tel">Phone Number</label>
                            <input type="tel" name="tel" id="tel" class="modal-input" placeholder="Phone Number">
                            <input type="submit" value="Add Author" class="btn-primary">
                        </form>
                    </div>
                </div>
            </div>

            <div class="table--head">
                <span > 
                    Author’s Details
                </span>
                <span class="row--item"> 
                    Email address
                </span>
                <span class="row--item"> 
                    Phone number
                </span>
                <span class="row--item"> 
                    No. of Posts
                </span>
                <span > 
                    Total Reach
                </span>
            </div>
            <div class="table--body">
                <div class="table-row">
                    <span >
                        <span class="author--index">1</span>
                       <div class="author--image"></div>
                        <span class="author-name">Jenny Wilson</span>
                    </span>
                    <span class="row--item">
                        debra.holt@example.com
                    </span>
                    <span class="row--item">
                        070893935083
                    </span>
                    <span class="row--item">
                        120 Posts
                    </span>
                    <span >
                        3.4k Reach                    
                    </span>
                </div>
                <div class="table-row">
                    <span >
                        <span class="author--index">2</span>
                       <div class="author--image"></div>
                        Jenny Wilson
                    </span>
                    <span class="row--item">
                        debra.holt@example.com
                    </span>
                    <span class="row--item">
                        070893935083
                    </span>
                    <span class="row--item">
                        120 Posts
                    </span>
                    <span >
                        3.4k Reach                    
                    </span>
                </div>
                <div class="table-row">
                    <span >
                        <span class="author--index">3</span>
                       <div class="author--image"></div>
                        Jenny Wilson
                    </span>
                    <span class="row--item">
                        debra.holt@example.com
                    </span>
                    <span class="row--item">
                        070893935083
                    </span>
                    <span class="row--item">
                        120 Posts
                    </span>
                    <span >
                        3.4k Reach                    
                    </span>
                </div>
                <div class="table-row">
                    <span >
                        <span class="author--index">4</span>
                       <div class="author--image"></div>
                        Jenny Wilson
                    </span>
                    <span class="row--item">
                        debra.holt@example.com
                    </span>
                    <span class="row--item">
                        070893935083
                    </span>
                    <span class="row--item">
                        120 Posts
                    </span>
                    <span >
                        3.4k Reach                    
                    </span>
                </div>
                <div class="table-row">
                    <span >
                        <span class="author--index">5</span>
                       <div class="author--image"></div>
                        Jenny Wilson
                    </span>
                    <span class="row--item">
                        debra.holt@example.com
                    </span>
                    <span class="row--item">
                        070893935083
                    </span>
                    <span class="row--item">
                        120 Posts
                    </span>
                    <span >
                        3.4k Reach                    
                    </span>
                </div>
                <div class="table-row">
                    <span >
                        <span class="author--index">6</span>
                       <div class="author--image"></div>
                        Jenny Wilson
                    </span>
                    <span class="row--item">
                        debra.holt@example.com
                    </span>
                    <span class="row--item">
                        070893935083
                    </span>
                    <span class="row--item">
                        120 Posts
                    </span>
                    <span >
                        3.4k Reach                    
                    </span>
                </div>
                <div class="table-row">
                    <span >
                        <span class="author--index">7</span>
                       <div class="author--image"></div>
                        Jenny Wilson
                    </span>
                    <span class="row--item">
                        debra.holt@example.com
                    </span>
                    <span class="row--item">
                        070893935083
                    </span>
                    <span class="row--item">
                        120 Posts
                    </span>
                    <span >
                        3.4k Reach                    
                    </span>
                </div>
                <div class="table-row hide-bottom">
                    <span >
                        <span class="author--index">8</span>
                       <div class="author--image"></div>
                        Jenny Wilson
                    </span>
                    <span class="row--item">
                        debra.holt@example.com
                    </span>
                    <span class="row--item">
                        070893935083
                    </span>
                    <span class="row--item">
                        120 Posts
                    </span>
                    <span >
                        3.4k Reach                    
                    </span>
                </div>
            </div>
            <div class="pagination">
                <div class="pagination-child">
                    <a class="arrow-btn"><img src="/static/assets/images/Right Chevron.svg" alt="Left Chevron"></a>
                    
                    <a class="btn page-btn"><strong>1</strong></a>
                    <a class="btn selected"><strong>2</strong></a>
                    <a class="btn page-btn"><strong>3</strong></a>
                    <a class="btn page-btn"><strong>4</strong></a>
                    <a class="btn page-btn"><strong>•••</strong></a>
                    <a class="arrow-btn"><img src="/static/assets/images/Left Chevron.svg" alt="Right Chevron"></a>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>