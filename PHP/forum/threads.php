<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
    .footer {
        min-height: 433px;
    }
    </style>
    <title>Forum</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="contact.php">Contact</a>
                </li>
            </ul>
            <div class=" row mx-2">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#signupModal">Login</button>
                <button class="btn btn-success mx-2" data-toggle="modal" data-target="#signupModal">SignUp</button>
            </div>


        </div>
    </nav>


    <?php include "partials/_db_connect.php"; ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE category_id =$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }

    ?>
    <?php
    
    $method = $_SERVER['REQUEST_METHOD'];
    $alert = false;
    if($method =='POST'){
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) 
                VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $alert = true;
        if($alert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Added!</strong> You thread has been recorded.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }  
        
    }
    ?>



    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to
                <?php echo $catname ?> Forum
            </h1>
            <p class="lead"><?php echo $catdesc ?></p>
            <hr class="my-4">
            <p>This is a peer to peer form to sharing knowledge with each other.Be civil.
                Don't post anything that areasonable person would consider offensive, abusive, or hate speech.
                Keep it clean. Don't post anything obscene or sexually explicit.Respect each other. Don't harass or
                grief anyone, impersonate people, or expose their
                privateinformation.Respect our forum.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <div class="container">
        <h2>Start a Discussion</h2>
        <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Problem Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp"
                    placeholder="problem title">
            </div>
            <div class="form-group">
                <label for="desc">Example textarea</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <div class="container footer">
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id =$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult =false;
            $title = $row['thread_title'];
            $id = $row['thread_id'];
            $desc = $row['thread_desc'];

            echo '<div class="media my-4">
                        <img class="mr-3" src="forum.webp" height="84px" width="84px" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0"><a class ="text-dark "href="thread.php?threadid='. $id .'">' . $title . '</a></h5>' . $desc .
                    '
                    </div>
                    </div>';
        }
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">No Results Found</h1>
              <p class="lead">Be the first person to ask question</p>
            </div>
          </div>';
        }

    ?>

    </div>

    <?php include 'partials/_footer.php' ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>