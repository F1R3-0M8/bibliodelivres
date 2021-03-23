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

<?php
    function afficheAllToTab () {

        $connec = connectionDatabase();
    
        $sqlSelect = "SELECT id_book, book_title, author, publisher  FROM livres ORDER BY id_book";
    
        $result = mysqli_query($connec, $sqlSelect);
    
        while($row = mysqli_fetch_assoc($result)){
        echo "<tr><th>" . $row["id_book"]. "</th> <td>" . $row["book_title"]. "</td> <td>" . $row["author"]. "</td> <td>" . $row["publisher"]. "</td> <td><a href='../php/Update.php?id=".$row["id_book"]."&title=".$row["book_title"]."&author=".$row["author"]."&publisher=".$row["publisher"]."' class=\"btn btn-warning btn-sm\" style='color:white; text-shadow: 0 0 1px black;'><i class=\"fas fa-sync\"></i>&#xA0;Update</a> | <a href='../php/Delete.php?id=".$row["id_book"]."' class=\"btn btn-danger btn-sm\" style='text-shadow: 0 0 1px black;'>Delete&#xA0;<i class=\"fas fa-trash-alt\"></i></a> </td></tr>";
        }
    }
?>

<html>
<head>
<meta charset="UTF-8">
<title>Gestion des livres</title>
<link href="../css/styleHome.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div>
        <header>
            <!-- <div class="entete1">
                <h1>CRUD MySQLi</h1>
            </div>
            <div class="entete2">
                <div>
                    <a href="../php/home.php" class="badge badge-dark">Home</a>
                    <a href="../php/Insert.php" class="badge badge-dark">Insert</a>
                </div>
            </div> -->
            <nav class="navbar navbar-dark bg-dark justify-content-between">
                <a class="navbar-brand"><i class="fas fa-book-open"></i>&#xA0;CRUD MySQLi</a>
                <form class="form-inline">
                <a href="../php/home.php" class="btn btn-secondary mr-sm-2"><i class="fas fa-home"></i>&#xA0;Home</a>
                <a href="../php/Insert.php" class="btn btn-secondary"><i class="far fa-edit"></i>&#xA0;Insert</a>
                </form>
            </nav>
        </header>
    <div class="container">
        <main>
            <article>
                <section class="S1"><h2>Books list</h2></section>

                <section class="S2">
                    <table class="table table-striped text-center">
                        <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Publisher</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php afficheAllToTab ();  ?>
                        </tbody>
                    </table>
                </section>

            </article>
        </main>
    </div>
        <footer>
        </footer>
    </div>
</body>
</html>

