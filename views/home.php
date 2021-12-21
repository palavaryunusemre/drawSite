<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta description="deneme şablon">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/fonts.googleapis.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styless.css">
</head>
<body>

  <!--Navigation-->
  <div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a  href="#">Navbar</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
          <ul class="navbar-nav ">
            <li class="nav-item active">
              <a class="nav-link" id="navbar-li-a"  href="#">Home <span class="sr-only">(current)</span></a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!--Navigation-->
  <section class="section">
    <img src="https://i.pinimg.com/originals/2b/e1/70/2be170c1f36c574f1a3bd3f9f8c7fc25.jpg"></img>
    <div class="section-text">Welcome<br><br>
      <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
    </div>
  </section>
  <!--Header-->
  <header>
    <div class="container">
      <div class="row" id="inception-row">
        <div class="col-md-6 col-sm-12 col-lg-6 "><img src="https://i.pinimg.com/originals/2b/e1/70/2be170c1f36c574f1a3bd3f9f8c7fc25.jpg" class="inception-img"></img></div>
        <div class="col-md-6 col-sm-12 col-lg-6 " id="inception-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
        </div>
      </div>
      <div class="parallax-scrolling">
        <a href="#">LOREM IPSUM</a>
      </div>
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
          <section class="draw" style="text-align:center">

            <h2>Katılımcı Ekle</h2>
            <form action="" method="post">
              <input type="hidden" name="katilimciEkle" value="katilimciEkle" />
              <table>
                <tr>
                  <td>Katılımcı Adı</td>
                  <td>:</td>
                  <td><input type="text" name="isim" /> * Harf ve Sayı kullanılabilir.</td>
                </tr>
                <tr>
                  <td>Katılım Hakkı</td>
                  <td>:</td>
                  <td><select name="hak">
                    <?php
                    for($i=1;$i<=100;$i++)
                    {
                      echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                  </select></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input type="submit" value="Ekle" /></td>
                </tr>
                <?php if(isset($_POST['katilimciEkle'])){ ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><?php katilimciEkle();  ?></td>
                  </tr>

                <?php } ?>
              </table>
            </form>
            <?php
            $katilimciSorgu= mysqli_query($conn,"SELECT * FROM katilimcilar ORDER BY katilimci ASC");
            $katilimciSay	= mysqli_num_rows($katilimciSorgu);
            if($katilimciSay > 0)
            {
              ?>

              <h2>Katılımcılar ( <?php echo $katilimciSay; ?> )</h2>
              <ul>
                <?php
                while($katilimciYaz = mysqli_fetch_object($katilimciSorgu))
                {
                  echo '<li>'.$katilimciYaz->katilimci.' ('.$katilimciYaz->hak.') <a href="'.$url.'app/participantDelete.php?sil='.$katilimciYaz->id.'">Sil</a></li>';
                }
                ?>
              </ul>
              <?php
            }
            ?>

            <h2>Çekilişi Bitir</h2>
            <form action="" method="post">
              <input type="hidden" id="cekilisBitir" name="cekilisBitir" value="cekilisBitir" />
              <table>
                <tr>
                  <td>Kazanacak sayısı</td>
                  <td>:</td>
                  <td><select name="kazanacak">
                    <?php
                    for($i=1;$i<=100;$i++)
                    {
                      echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                  </select></td>
                </tr>

              </table>
              <input type="submit" value="Çekilişi Bitir" />
            </form>
            <?php

            if(isset($_POST['cekilisBitir']))
            {
                $kacKisi = intval($_POST['kazanacak']);
                cekilisBitir($kacKisi);
            }
            ?>

              <form action="" method="post">
                <input type="hidden" name="sifirla" value="sifirla" />
                <button type="submit"> Çekilişi Sıfırla </button>
                <br><br>
                <div class="alert alert-warning" role="alert">
                  çekilişi sıfırla ile çekiliş sonuçları sıfırlanır!
                </div>
              </form>
              <?php

              if(isset($_POST['sifirla']))
              {
                cekilisSifirla();

              }

             ?>

            </section>

          </header>
          <!--Header-->
        </div>
      </div>


      <footer class="footer text-center" >
        <div class="container" id="footer">
          <h3>Our Social Sites</h3>
          <div class="" id="social-btn-row" >
            <a href="#" class="btn btn-default btn-lg bg-light " id="social-btn"><i class="fa fa-twitter"> <span class="network-name">Twitter</span></i></a>
            <a href="#" class="btn btn-default btn-lg bg-light"id="social-btn"><i class="fa fa-facebook"> <span class="network-name">Facebook</span></i></a>
            <a href="#" class="btn btn-default btn-lg bg-light "id="social-btn"><i class="fa fa-youtube-play"> <span class="network-name">Youtube</span></i></a>
          </div>
          <div class="row" id="signature">
            <div class="col-lg-12 ">
              <h6> Copyright &copy; 2021 | Developed by
                <a href="">Yunus Emre Palavar</a>
              </h6>
            </div>
          </div>
        </footer>
        <script src="js/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="js/myscript.js"></script>

      </body>
      </html>
