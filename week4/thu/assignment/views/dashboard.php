<?php
    include_once 'partials/header.php';
?>
<body class="body">
<div class="wrapper">
    <div class="sidebar">
        <div class="menu">
                <span class="logo-white">
                    
                </span>
            <span class="menu-item highlight">
                        <a href="dashboard.html">
                            <img src="/images/home.svg" alt="">
                        </a>
                    </span>
            <span class="menu-item">
                    <a href="home.html">
                        <img src="/images/people.svg" alt="">
                    </a>
                </span>
            <span class="menu-item">
                    <a href="settings.html">
                        <img src="/images/settings.svg" alt="">
                    </a>
                </span>
        </div>
        <div class="signout">
                <span class="">
                    <a href="/auth/login" class="signout-link">
                        <img src="/images/signout.svg" alt="">
                    </a>
                </span>
        </div>
    </div>
    <main class="main">
        <div class="header">
            <div class="search-width ">
                <div class="input-control ">
                    <form action="">
                        <label for="search"></label>
                        <input type="text" placeholder="Search for author" class="search--area">
                    </form>
                </div>
                <div class="avatar">
                    <a href="#">
                        <img src="/images/avatar.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-wrapper">
                <div class="title-wrap">
                    <h3 class="page-title">Dashboard</h3>
                    <?php include_once 'partials/flash-messages.php'?>
                </div>
                <div class="content-area">
                    <div class="grid-area">
                        <div class="card">
                            <img src="/images/graph.svg" alt="" width="100%" height="100%">
                        </div>
                        <div class="card">
                            <img src="/images/pie-chart.svg" alt="" width="100%" height="100%">
                        </div>
                        <div class="card">
                            <div class="card-title">
                                <p class="card-heading">Top Shared Author</p>
                                <div class="card-content">
                                    <div class="row-container">
                                        <div class="card-rows">
                                            <div class="span-text digit">1</div>

                                            <div class="card-rows underline ">
                                                <div class="span-text img">
                                                    <img src="/images/author.svg" alt="">
                                                </div>
                                                <div class="card-rows  spread">
                                                    <div class="span-text">Jenny Wilson</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row-container">
                                        <div class="card-rows">
                                            <div class="span-text digit">2</div>

                                            <div class="card-rows underline">
                                                <div class="span-text img">
                                                    <img src="/images/author.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Savannah Nguyen</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-container">
                                        <div class="card-rows">
                                            <div class="span-text digit">3</div>

                                            <div class="card-rows underline">
                                                <div class="span-text img">
                                                    <img src="/images/henry.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Courtney Henry</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-container">
                                        <div class="card-rows">
                                            <div class="span-text digit">4</div>

                                            <div class="card-rows underline">
                                                <div class="span-text img">
                                                    <img src="/images/robert.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Robert Fox</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-container">
                                        <div class="card-rows">
                                            <div class="span-text digit">5</div>

                                            <div class="card-rows underline">
                                                <div class="span-text img ">
                                                    <img src="/images/bell.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Jerome Bell</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <p class="card-heading">Top Post</p>
                            <div class="card-content">
                                <div class="row-container">
                                    <div class="card-rows">
                                        <div class="span-text digit">1</div>
                                        <div class="card-rows-post">
                                            <div class="link-text"> <a href="#" target="_blank" >Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</a> </div>
                                            <div class="card-rows-author link-text-right">
                                                <div class="span-text img">
                                                    <img src="/images/author.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Jenny Wilson</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-container">
                                    <div class="card-rows">
                                        <div class="span-text digit">2</div>
                                        <div class="card-rows-post">
                                            <div class="link-text"> <a href="#" target="_blank" >Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</a> </div>
                                            <div class="card-rows-author link-text-right">
                                                <div class="span-text img">
                                                    <img src="/images/author.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Jenny Wilson</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-container">
                                    <div class="card-rows">
                                        <div class="span-text digit">3</div>
                                        <div class="card-rows-post">
                                            <div class="link-text"> <a href="#" target="_blank" >Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</a> </div>
                                            <div class="card-rows-author link-text-right">
                                                <div class="span-text img">
                                                    <img src="/images/author.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Jenny Wilson</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-container">
                                    <div class="card-rows">
                                        <div class="span-text digit">4</div>
                                        <div class="card-rows-post">
                                            <div class="link-text"> <a href="#" target="_blank" >Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</a> </div>
                                            <div class="card-rows-author link-text-right">
                                                <div class="span-text img">
                                                    <img src="/images/author.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Jenny Wilson</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-container">
                                    <div class="card-rows">
                                        <div class="span-text digit">5</div>
                                        <div class="card-rows-post">
                                            <div class="link-text"> <a href="#" target="_blank" >Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</a> </div>
                                            <div class="card-rows-author link-text-right">
                                                <div class="span-text img">
                                                    <img src="/images/author.svg" alt="">
                                                </div>
                                                <div class="card-rows spread">
                                                    <div class="span-text">Jenny Wilson</div>
                                                    <div class="span-text right">3.4K Shares</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right-sidebar">
                        <div class="right-sidebar-title">
                            <div class="card-heading author-title">Authors</div>
                            <div class="author-arrow">
                                <a href="home.html"><img src="/images/arrow.svg" alt=""></a>
                            </div>
                        </div>
                        <div class="author-content-container">
                            <div class="right-sidebar-content">
                                <div class="text number">1</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Jenny Wilson</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">jennywilson@gmail.com</div>
                                </div>
                            </div>
                            <div class="right-sidebar-content">
                                <div class="text number">2</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Cameron Williamson</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">debra.holt@example.com</div>
                                </div>
                            </div>
                            <div class="right-sidebar-content">
                                <div class="text number">3</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Esther Howard</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">willie.jennings@example.com</div>
                                </div>
                            </div>
                            <div class="right-sidebar-content">
                                <div class="text number">4</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Darrell Steward</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">alma.lawson@example.com</div>
                                </div>
                            </div>
                            <div class="right-sidebar-content">
                                <div class="text number">5</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Devon Lane</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">tim.jennings@example.com</div>
                                </div>
                            </div>
                            <div class="right-sidebar-content">
                                <div class="text number">6</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Annette Black</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">kenzi.lawson@example.com</div>
                                </div>
                            </div>
                            <div class="right-sidebar-content">
                                <div class="text number">7</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Dianne Russell</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">kenzi.lawson@example.com</div>
                                </div>
                            </div>
                            <div class="right-sidebar-content">
                                <div class="text number">8</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Bessie Cooper</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">georgia.young@example.com</div>
                                </div>
                            </div>
                            <div class="right-sidebar-content">
                                <div class="text number">9</div>
                                <div class="span-content">
                                    <div class="author-details">
                                        <div class="author-image">
                                            <img src="/images/author.svg" alt="">
                                        </div>
                                        <div class="author-name-row">
                                            <div class="text author-name">Leslie Alexander</div>
                                            <div class="text author-rate">120 posts</div>
                                        </div>
                                    </div>
                                    <div class="text author-email">georgia.young@example.com</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
