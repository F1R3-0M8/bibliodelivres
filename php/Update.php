<!DOCTYPE html>
<?php

    function connectionDatabase (){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "appli_gestion_livres";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }else {$infoConnectDatabase = "Connected successfully". "<br><br>";
        }
            
        return $conn;
    }

    function getId () {
        $id = $_GET["id"];
        echo $id;
    }

    function getTitle (){
        $title = $_GET["title"];
        echo $title;
    }

    function getAuthor (){
        $author = $_GET["author"];
        echo $author;
    }

    function getPublisher (){
        $publisher = $_GET["publisher"];
        echo $publisher;
    }
?>
<html>
<head>
<meta charset="UTF-8">
<title>Gestion des livres</title>
<link href="../css/styleHome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand"><i class="fas fa-book-open"></i>&#xA0;CRUD MySQLi</a>
            <form class="form-inline">
            <a href="../php/home.php" class="btn btn-secondary mr-sm-2"><i class="fas fa-undo"></i>&#xA0;Home</a>
            </form>
        </nav>
    </header>
<div class="container">
    <main>
        <article>
            <section class="S1"><h2>Update Book [<?php getId(); ?>]</h2></section>

            <section class="S2">
                <form method=post>

                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-center" style="width:90px;">Title</span>
                        </div>
                        <input type="text" value="<?php getTitle (); ?>" class="form-control text-center">
                        <span class="input-group-text">&#10132;</span>
                        <input type="text" name="newtitle" class="form-control text-center" placeholder="New title here"required>
                    </div>
                    <br>

                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-center"  style="width:90px;">Author</span>
                        </div>
                        <input type="text" value="<?php getAuthor (); ?>" class="form-control text-center">
                        <span class="input-group-text">&#10132;</span>
                        <input type="text" name="newautor" class="form-control text-center" placeholder="New autor here"required>
                    </div>
                    <br>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-center" style="width:90px;">Publisher</span>
                        </div>
                        <input type="text" value="<?php getPublisher (); ?>" class="form-control text-center">
                        <span class="input-group-text">&#10132;</span>
                        <input type="text" name="newpublisher" class="form-control text-center" placeholder="New publisher here"required>
                    </div>
                    <br>

                    <div class="btn-group btn-block" role="group" aria-label="Basic example">
                        <button class="btn btn-primary" type="submit" name="envoyer">Update</button>
                    </div>

                    <?php
                        if(isset($_POST['envoyer'])){
                            $id = $_GET["id"];
                            // echo $id;
                            $newTitle = $_POST['newtitle'];
                            // echo $newTitle;
                            $newAutor = $_POST['newautor'];
                            // echo $newAutor;
                            $newPublisher = $_POST['newpublisher'];
                            // echo $newPublisher;

                            if(!empty($id && $newTitle && $newAutor && $newPublisher)){
                                $connec = connectionDatabase();

                                $sqlUpdate = "UPDATE livres SET book_title='$newTitle', author='$newAutor', publisher='$newPublisher' WHERE id_book=$id";

                                $update = mysqli_query($connec, $sqlUpdate);

                                if (!$update) {
                                    echo "
                                    <br>
                                    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                                        <center><strong>Update failed ! Try again plz</strong></center>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                    </div>
                                    ";
                                }else {
                                    echo "
                                    <br>
                                    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                                        <center><strong>Update successfully!</strong></center>
                                        <center><small>'ll be redirected. If not, click <a href=\"home.php\">here</a></small></center>
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                    </div>
                                    ";
                                    header("refresh:1;url=Update.php?id=".$id."&title=".$newTitle."&author=".$newAutor."&publisher=".$newPublisher);
                                }
                            }else {
                                echo "
                                <br><br>
                                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                                    <center><strong>Update failed ! (Please fill out all fields)</strong></center>
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                </div>
                                ";
                            }
                        }
                    ?>
                </form>
            </section>

        </article>
    </main>
</div>
    <footer>
    </footer>
</body>
</html>