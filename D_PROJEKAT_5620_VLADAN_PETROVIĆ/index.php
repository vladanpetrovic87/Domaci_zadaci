<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citati</title>

    <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
    
    <header>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
    
        <!-- The slideshow -->
        <div class="carousel-inner">
            <?php
            $images = array("images/1.jpg","images/2.jpg","images/3.jpg","images/4.jpg","images/5.jpg","images/6.jpg","images/7.jpg","images/8.jpg","images/9.jpg","images/10.jpg");
            $randImage = array_rand($images,3);
            ?>

          <div class="carousel-item active">
            <img src="<?php echo $images[$randImage[0]]?>">
          </div>
          <div class="carousel-item">
            <img src="<?php echo $images[$randImage[1]]?>">
          </div>
          <div class="carousel-item">
            <img src="<?php echo $images[$randImage[2]]?>">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    
    </header>
        
        <h2 class='naslov'>Citati</h2>

    <nav class="bg-warning text-center">
      <div class="container-fluid">
   
    <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#home">Posao</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu1">Zdravlje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu2">Ljubav</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu3">Motivacija</a>
            </li>
        </ul>
    </nav>

    <section class="text-center">
        <div class="tab-content jumbotron jumbotron-fluid">
          <div class="container tab-pane active"><br>
            <?php
                $citati = array_merge(file("text/ljubav.txt"), file("text/motivacija.txt"), file("text/posao.txt"), file("text/zdravlje.txt"));
                $random = rand(0,count($citati)-1);
                $misao = "";
                $autor = "";
                if($random % 2 == 0) {
                  $misao = $citati[$random];
                  $autor = $citati[$random+1];
                }
                else {
                  $misao = $citati[$random - 1];
                  $autor = $citati[$random];
                } 
            ?>
                <h2><?php echo "<p>$misao</p>"; ?> </h2>
                <h2><?php echo "<p>$autor</p>"; ?> </h2>
          </div>

          <div id="home" class="container tab-pane fade"><br>
            <?php
                $posao = file("text/posao.txt");
                $random = rand(0,count($posao)-1);
                $misao = "";
                $autor = "";
                if($random % 2 == 0) {
                  $misao = $posao[$random];
                  $autor = $posao[$random+1];
                }
                else {
                  $misao = $posao[$random - 1];
                  $autor = $posao[$random];
                }  
            ?>
                <h2><?php echo "<p>$misao</p>"; ?> </h2>
                <h2><?php echo "<p>$autor</p>"; ?> </h2>
          </div>

          <div id="menu1" class="container tab-pane fade"><br>
            <?php
                $zdravlje = file("text/zdravlje.txt");
                $random = rand(0,count($zdravlje)-1);
                $misao = "";
                $autor = "";
                if($random % 2 == 0) {
                  $misao = $zdravlje[$random];
                  $autor = $zdravlje[$random+1];
                }
                else {
                  $misao = $zdravlje[$random - 1];
                  $autor = $zdravlje[$random];
                }   
            ?>
                <h2><?php echo "<p>$misao</p>"; ?> </h2>
                <h2><?php echo "<p>$autor</p>"; ?> </h2>
          </div>

          <div id="menu2" class="container tab-pane fade"><br>
            <?php
                $ljubav = file("text/ljubav.txt");
                $random = rand(0,count($ljubav)-1);
                $misao = "";
                $autor = "";
                if($random % 2 == 0) {
                  $misao = $ljubav[$random];
                  $autor = $ljubav[$random+1];
                }
                else {
                  $misao = $ljubav[$random - 1];
                  $autor = $ljubav[$random];
                }  
            ?>
                <h2><?php echo "<p>$misao</p>"; ?> </h2>
                <h2><?php echo "<p>$autor</p>"; ?> </h2>
          </div>

          <div id="menu3" class="container tab-pane fade"><br>
            <?php
                $motivacija = file("text/motivacija.txt");
                $random = rand(0,count($motivacija)-1);
                $misao = "";
                $autor = "";
                if($random % 2 == 0) {
                  $misao = $motivacija[$random];
                  $autor = $motivacija[$random+1];
                }
                else {
                  $misao = $motivacija[$random - 1];
                  $autor = $motivacija[$random];
                }
            ?>
                <h2><?php echo "<p>$misao</p>"; ?> </h2>
                <h2><?php echo "<p>$autor</p>"; ?> </h2>
          </div>
         </div>
      </div>
    </section>

    <div class="container-fluid bg-light">
      <h2>Ostavite svoj komentar</h2>

      <form action="/action_page.php">
        <div class="form-group">
          <label for="usr">Ime:</label>
          <input type="text" class="form-control" id="usr" name="username" placeholder="Vaše ime">
        </div>
        <div class="form-group">
          <label for="comment">Komentar:</label>
          <textarea class="form-control" rows="3" id="comment" name="text" placeholder="Unesite Vaš komentar"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
 
    <footer class="bg-warning text-center">
        <?php
            echo "Datum: " . date("d/m/Y") . "<br>";
            echo "Tačno vreme:  " . date("h:i:sa");
        ?>
    </footer>
    

</body>
</html>