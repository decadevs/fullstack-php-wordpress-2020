<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
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
                <a href="home.php">
                    <img src="/static/assets/images/dashboard.svg" alt="home">
                </a>
            </span>
            <span class="menu-item">
                <a href="author.php">
                    <img src="/static/assets/images/people.svg" alt="authors">
                </a>
            </span>
            <span class="menu-item">
                <a href="settings.php">
                    <img src="/static/assets/images/Vector-2.svg" alt="settings">
                </a>
            </span>
            <span class="menu-item logout">
                <a href="mysignin.php">
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
            <div class="authors--posttable--header">
                <div class="posttable--header--content header-section">
                    <h3 class="table-title">
                        Dashboard
                    </h3>
                </div>
                <div class="dashboard-body">
                    <div class="chart-box">
                        <div class="charts">
                            <img src="/static/assets/images/chart1.svg" alt="chart1-image">
                            <img src="/static/assets/images/piechart.svg" alt="pie-chart">
                        </div>
                        <div class="data">
                            <div class="top-shared-authors">
                                <div class="authors-heading">
                                    <h5 class="title">Top Shared Authors</h5>
                                </div>
                                <div class="table--body">
                                    <div class="table--row">
                                        <span class="small-font">1</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="table-row">
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k Shares                 
                                            </span>
                                        </span>
                                    </div>
                                    <div class="table--row">
                                        <span class="small-font">2</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="table-row">
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k Shares                 
                                            </span>
                                        </span>
                                    </div>
                                    <div class="table--row">
                                        <span class="small-font">3</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="table-row">
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k Shares                 
                                            </span>
                                        </span>
                                    </div>
                                    <div class="table--row">
                                        <span class="small-font">4</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="table-row">
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k Shares                 
                                            </span>
                                        </span>
                                    </div>
                                    <div class="table--row">
                                        <span class="small-font">5</span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="table-row">
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k Shares                 
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="top-posts">
                                <div class="authors-heading">
                                    <h5 class="title">Top Post</h5>
                                </div>
                                <div class="table--body">
                                    <div class="table--row">
                                        <span class="small-font">1</span>
                                        <span class="table-row">
                                            <span class="row--item small-font blue-post">
                                                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                            </span>
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k                    
                                            </span>
                                        </span>
                                    </div>
                                    <div class="table--row">
                                        <span class="small-font">2</span>
                                        <span class="table-row">
                                            <span class="row--item small-font blue-post">
                                                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                            </span>
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k                    
                                            </span>
                                        </span>
                                    </div>
                                    <div class="table--row">
                                        <span class="small-font">3</span>
                                        <span class="table-row">
                                            <span class="row--item small-font blue-post">
                                                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                            </span>
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k                    
                                            </span>
                                        </span>
                                    </div>
                                    <div class="table--row">
                                        <span class="small-font">4</span>
                                        <span class="table-row">
                                            <span class="row--item small-font blue-post">
                                                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                            </span>
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k                    
                                            </span>
                                        </span>
                                    </div>
                                    <div class="table--row">
                                        <span class="small-font">5</span>
                                        <span class="table-row">
                                            <span class="row--item small-font blue-post">
                                                Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                                            </span>
                                            <span class="small-font">
                                                <div class="author--image"></div>
                                                <span class="author-name small-font">Jenny Wilson</span>
                                            </span>
                                            <span class="small-font reach">
                                                3.4k                    
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="authors">
                        <div class="authors-heading">
                            <h5 class="title">Authors</h5>
                            <img src="/static/assets/images/arrow-forward.svg" alt="arrow-image">
                        </div>
                        <div class="table--body">
                            <div class="table--row">
                                <span class="small-fontn index">1</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                            <div class="table--row">
                                <span class="small-fontn index">2</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                            <div class="table--row">
                                <span class="small-fontn index">3</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                            <div class="table--row">
                                <span class="small-fontn index">4</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                            <div class="table--row">
                                <span class="small-fontn index">5</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                            <div class="table--row">
                                <span class="small-fontn index">6</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                            <div class="table--row">
                                <span class="small-fontn index">7</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                            <div class="table--row">
                                <span class="small-fontn index">8</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                            <div class="table--row">
                                <span class="small-fontn index">9</span>
                                &nbsp;&nbsp;
                                <span class="table-row">
                                    <span class="small-font">
                                        <div class="author--image"></div>
                                        <span class="author-name">
                                            <h4 class="authors-name">Jenny Wilson</h4>
                                            <p class="small-font">jennywilson@gmail.com</p>
                                        </span>
                                    </span>
                                    <span class="small-font posts">
                                        120 posts                 
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</body>
</html>