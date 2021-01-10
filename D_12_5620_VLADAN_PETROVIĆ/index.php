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
            $folder = "images";
            $images = array('1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg');

            $slike = count($images) -1;
            $s1 = $images[rand(0,$slike)]; 
            $s2 = $images[rand(0,$slike)];
            $s3 = $images[rand(0,$slike)];
            ?>

          <div class="carousel-item active">
            <img src="<?php echo $folder. "/". $s1?>">
          </div>
          <div class="carousel-item">
            <img src="<?php echo $folder. "/". $s2?>">
          </div>
          <div class="carousel-item">
            <img src="<?php echo $folder. "/". $s3?>">
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
                $text = file_get_contents('text/svi_citati.txt');
                $textArray = explode ("\n", $text);
                $randArrayNum = array_rand($textArray);
                $randPhraseSvi = $textArray[$randArrayNum];
            ?>
                 <h2><?php echo $randPhraseSvi; ?> </h2>
          </div>

          <div id="home" class="container tab-pane fade"><br>
            <?php
                $text = file_get_contents('text/posao.txt');
                $textArray = explode ("\n", $text);
                $randArrayNum = array_rand($textArray);
                $randPhrasePosao = $textArray[$randArrayNum];
            ?>
                 <h2><?php echo $randPhrasePosao; ?> </h2>
          </div>

          <div id="menu1" class="container tab-pane fade"><br>
            <?php
                $text = file_get_contents('text/zdravlje.txt');
                $textArray = explode ("\n", $text);
                $randArrayNum = array_rand($textArray);
                $randPhraseZdravlje = $textArray[$randArrayNum];
            ?>
                 <h2><?php echo $randPhraseZdravlje; ?> </h2>
          </div>

          <div id="menu2" class="container tab-pane fade"><br>
            <?php
                $text = file_get_contents('text/ljubav.txt');
                $textArray = explode ("\n", $text);
                $randArrayNum = array_rand($textArray);
                $randPhraseLjubav = $textArray[$randArrayNum];
            ?>
                 <h2><?php echo $randPhraseLjubav; ?> </h2>
          </div>

          <div id="menu3" class="container tab-pane fade"><br>
            <?php
                $text = file_get_contents('text/motivacija.txt');
                $textArray = explode ("\n", $text);
                $randArrayNum = array_rand($textArray);
                $randPhraseMotivacija = $textArray[$randArrayNum];
            ?>
                 <h2><?php echo $randPhraseMotivacija; ?> </h2>
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