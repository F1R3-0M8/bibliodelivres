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
?>

<html>
<head>
<meta charset="UTF-8">
<title>Gestion des livres</title>
<link href="../css/styleHome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <header>
        <!-- <div class="entete1">
            <h1>CRUD MySQLi</h1>
        </div>
        <div class="entete2">
            <div>
                <a href="../php/home.php" class="badge badge-dark">Home</a>
            </div>
        </div> -->
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
            <section class="S1"><h2>Insert Book</h2></section>
                
            <section class="S2">
                <form method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width:90px;">Title</span>
                        </div>
                        <input type="text" class="form-control" name="title" required>
                        
                    </div>

                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width:90px;">Auteur</span>
                        </div>
                        <input type="text" class="form-control" name="auteur" required>
                    </div>

                    <br>

                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="width:90px;">Publisher</span>
                        </div>
                        <input type="text" class="form-control" name="publisher" required>
                    </div>

                    <br>
                    <div class="btn-group btn-block" role="group" aria-label="Basic example">
                        <button class="btn btn-primary" type="submit" name="envoyer">Save</button>
                    </div>
                </form>

                <?php

                    if(isset($_POST['envoyer'])){
                        $title = $_POST['title'];
                        // echo $title;
                        $auteur = $_POST['auteur'];
                        // echo $auteur;
                        $publisher = $_POST['publisher'];
                        // echo $publisher;
                        if(!empty($title && $auteur && $publisher)){

                            $connec = connectionDatabase();
                            $sqlInsert = "INSERT INTO livres (book_title, author, publisher)
                                VALUES ('$title', '$auteur', '$publisher')";
            
                            $insert = mysqli_query($connec, $sqlInsert);

                            if (!$insert) {
                                echo "
                                <br><br>
                                <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                                    <center><strong>Delete failed ! Try again plz</strong></center>
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                </div>
                                ";
                            }else {
                                echo "
                                <br><br>
                                <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                                    <center><strong>Delete successfully!</strong></center>
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                </div>
                                ";
                                header( "refresh:1;url=Insert.php" );
                            }
                        }
                    }
                ?>
            </section>

        </article>
    </main>
</div>
    <footer>
    </footer>
</body>
</html>


<!-- function insertDataToDatabase () {
                        $connec = connectionDatabase();
                        $sqlInsert = "INSERT INTO livres (book_title, author, publisher)
                            VALUES ('mohammed', 'bahri', 'bahri.mgm@gmail.com')";
        
                        mysqli_query($conn, $sqlInsert);
                    } -->