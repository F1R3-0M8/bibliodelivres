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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            <section class="S1"><h2>Delete Book</h2></section>
                
            <section class="S2">
                <form method=post>
                        <div>
                            <div class="alert alert-secondary text-center" role="alert">
                                <strong>Êtes-vous sûr de vouloir supprimer ce livre ?</strong>
                              </div>
                            <br>
                        </div>
    
                        <div class="btn-group btn-block" role="group" aria-label="Basic example">
                            <a href="../php/home.php" class="btn btn-danger">NON</a>
                            <button type="submit" name="oui" class="btn btn-success">OUI</button>
                        </div>

                        <?php
                            if(isset($_POST['oui'])){
                                $id = $_GET["id"];
                                // echo $id;
                                if(!empty($id)){
                                    $connec = connectionDatabase();

                                    $sqlDelete = "DELETE FROM livres WHERE id_book=$id";

                                    $delete = mysqli_query($connec, $sqlDelete);

                                    if (!$delete) {
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
                                            <center><small>'ll be redirected. If not, click <a href=\"home.html\">here</a></small></center>
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                            <span aria-hidden=\"true\">&times;</span>
                                            </button>
                                        </div>
                                        ";
                                        header( "refresh:1;url=home.php" );
                                    }
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