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
                    <img src="assets/images/people 1.svg" alt="authors">
                </a>
            </span>
            <span class="menu-item">
                <a href="/settings">
                    <img src="assets/images/Vector-2.svg" alt="settings">
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
                    <a class="go-back" href="home.html"><img src="assets/images/Left Arrow.svg" alt="Arrow-image" class="arrow-image"><span class="back">Go back</span></a>
                    <h3 class="table-title">
                        Jenny Wilson
                    </h3>
                    <h4>Jenny Willson's Post</h4>
                </div>
                <div class="filter--div">
                    <input type="text" placeholder="search for posts" class="post--search">
                    <label class="filter" for="filter">
                    Filter By:&nbsp;&nbsp;
                    <select name="filter-options" id="filter" class="selectCodePen">
                        <option>Date Posted</option>
                        <option>No. of Views</option>
                        <option>No. of Shares</option>
                    </select>
                    </label>
                </div>
                
            </div>

            <div class="table--head">
                <span class="head--first"> 
                    Post Title
                </span>
                <span class="row--item"> 
                    Date Posted
                </span>
                <span class="row--item"> 
                    No. of View
                </span>
                <span > 
                    No. of Shares
                </span>
            </div>
            <div class="table--body">
                <div class="table-row">
                    <span class="row--first">
                        <span class="author--index">1</span>
                        <span class="author-name">I LEND MY VOICE: #EndSARS, #EndPoliceIntimidation #EndPoliceBrutality</span>
                    </span>
                    <span class="row--item">
                        October 17, 2020
                    </span>
                    <span class="row--item">
                        120 Views
                    </span>
                    <span >
                        20 Shares                  
                    </span>
                </div>
                <div class="table-row">
                    <span class="row--first">
                        <span class="author--index">2</span>
                        <span class="author-name">I LEND MY VOICE: #EndSARS, #EndPoliceIntimidation #EndPoliceBrutality</span>
                    </span>
                    <span class="row--item">
                        October 17, 2020
                    </span>
                    <span class="row--item">
                        120 Views
                    </span>
                    <span >
                        20 Shares                  
                    </span>
                </div>
                <div class="table-row">
                    <span class="row--first">
                        <span class="author--index">3</span>
                        <span class="author-name">I LEND MY VOICE: #EndSARS, #EndPoliceIntimidation #EndPoliceBrutality</span>
                    </span>
                    <span class="row--item">
                        October 17, 2020
                    </span>
                    <span class="row--item">
                        120 Views
                    </span>
                    <span >
                        20 Shares                  
                    </span>
                </div>
                <div class="table-row">
                    <span class="row--first">
                        <span class="author--index">4</span>
                        <span class="author-name">I LEND MY VOICE: #EndSARS, #EndPoliceIntimidation #EndPoliceBrutality</span>
                    </span>
                    <span class="row--item">
                        October 17, 2020
                    </span>
                    <span class="row--item">
                        120 Views
                    </span>
                    <span >
                        20 Shares                  
                    </span>
                </div>
                <div class="table-row">
                    <span class="row--first">
                        <span class="author--index">5</span>
                        <span class="author-name">I LEND MY VOICE: #EndSARS, #EndPoliceIntimidation #EndPoliceBrutality</span>
                    </span>
                    <span class="row--item">
                        October 17, 2020
                    </span>
                    <span class="row--item">
                        120 Views
                    </span>
                    <span >
                        20 Shares                  
                    </span>
                </div>
                <div class="table-row">
                    <span class="row--first">
                        <span class="author--index">6</span>
                        <span class="author-name">I LEND MY VOICE: #EndSARS, #EndPoliceIntimidation #EndPoliceBrutality</span>
                    </span>
                    <span class="row--item">
                        October 17, 2020
                    </span>
                    <span class="row--item">
                        120 Views
                    </span>
                    <span >
                        20 Shares                  
                    </span>
                </div>
                <div class="table-row">
                    <span class="row--first">
                        <span class="author--index">7</span>
                        <span class="author-name">I LEND MY VOICE: #EndSARS, #EndPoliceIntimidation #EndPoliceBrutality</span>
                    </span>
                    <span class="row--item">
                        October 17, 2020
                    </span>
                    <span class="row--item">
                        120 Views
                    </span>
                    <span >
                        20 Shares                  
                    </span>
                </div>
                <div class="table-row hide-bottom">
                    <span class="row--first">
                        <span class="author--index">8</span>
                        <span class="author-name">I LEND MY VOICE: #EndSARS, #EndPoliceIntimidation #EndPoliceBrutality</span>
                    </span>
                    <span class="row--item">
                        October 17, 2020
                    </span>
                    <span class="row--item">
                        120 Views
                    </span>
                    <span >
                        20 Shares                  
                    </span>
                </div>
            </div>
            <div class="pagination">
                <div class="pagination-child">
                    <a class="arrow-btn"><img src="assets/images/Right Chevron.svg" alt="Left Chevron"></a>
                    
                    <a class="btn page-btn"><strong>1</strong></a>
                    <a class="btn selected"><strong>2</strong></a>
                    <a class="btn page-btn"><strong>3</strong></a>
                    <a class="btn page-btn"><strong>4</strong></a>
                    <a class="btn page-btn"><strong>•••</strong></a>
                    <a class="arrow-btn"><img src="assets/images/Left Chevron.svg" alt="Right Chevron"></a>
                </div> 
            </div>
        </div>
    </div>
    <script src="/week3/tue/homefilter.js"></script>
</body>
</html>