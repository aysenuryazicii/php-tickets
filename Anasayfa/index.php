<?php
session_start();
ob_start();
$_SESSION["main_page"] = true;
unset($_SESSION["biletler"]);

?>
<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="BİLET SATIŞLARI">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>Bilet Satışları</title>
  <link rel="stylesheet" href="nicepage.css?v=<?php echo time(); ?>" media="screen">
  <link rel="stylesheet" href="Ana-Sayfa.css?v=<?php echo time(); ?>" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="generator" content="Nicepage 4.2.6, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "",
      "sameAs": []
    }
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Ana Sayfa">
  <meta property="og:type" content="website">
</head>

<body data-home-page="Ana-Sayfa.html" data-home-page-title="Ana Sayfa" class="u-body">
  <header class="u-align-left u-clearfix u-grey-10 u-header u-header" id="sec-3c78">

    <div class="u-clearfix u-sheet u-sheet-1">
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1">
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Ana Sayfa</a>
            </li>
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="../Etkinlikler/Biletler.php" style="padding: 10px 20px;">Biletler</a>
            </li>

            <?php
            if (isset($_SESSION["ID"])) {
              $f_name =  $_SESSION["First_name"] . " " . $_SESSION["Last_name"];
              echo ' <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" 
              href="#" style="padding: 10px 20px;">' . $f_name . '</a>
              </li>
              <a href="../logout.php">
                <img src="../logout.png" width=20 height=20>
              </a>
            ';
            } else {
              echo '
            <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" style="padding: 10px 20px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Giriş Yap</a>
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div class="signup-form">
                        <form method="post">
                          <h2>Giriş Ekranı</h2>
                          <p class="hint-text" style="font-size:15px">Giriş Yapmak İçin Formu Doldurunuz</p>
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" name="pass" placeholder="Şifre" required="required">
                          </div>
                          <div class="form-group">
                            <button type="submit" name="save" class="btn btn-success btn-lg btn-block u-btn u-button-style u-palette-2-base" style="background-color: #db545a; border-color: #db545a;">Giriş Yap</button>
                          </div>
                          <div class="text-center"></div>
                        </form>';

              if (isset($_POST['save'])) {
                extract($_POST);

                include '../databaseUser.php';
                $sql = mysqli_query($conn, "SELECT * FROM user where Email='$email' and Password='md5($pass)'");
                $row  = mysqli_fetch_array($sql);
                if (is_array($row)) {
                  $_SESSION["ID"] = $row['ID'];
                  $_SESSION["Email"] = $row['Email'];
                  $_SESSION["First_name"] = $row['First_name'];
                  $_SESSION["Last_name"] = $row['Last_name'];
                  header("Location: index.php");
                } else {
                  echo "Invalid Email ID/Password";
                }
              }

              echo '</div>
              Admin girişi için <a href="../Admin/adminLogin.php" >tıklayınız.</a>      
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <li class="u-nav-item">
              <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" style="padding: 10px 20px;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Kayıt Ol</a>

              <!-- Modal -->
              <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                      <div class="signup-form">
                        <form action="../signup_db.php" method="post">
                          <h2>Kayıt Ekranı</h2>
                          <p class="hint-text">Hesap Oluştur</p>
                          <div class="form-group">
                            <input type="text" class="form-control" name="first_name"placeholder="İsim" required="required">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="last_name"placeholder="Soyisim" required="required">
                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" name="pass" placeholder="Şifre" required="required">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" name="cpass" placeholder="Şifre Tekrar" required="required">
                          </div>
                          <div class="form-group">
                          <button type="submit" name="save" class="btn btn-success btn-lg btn-block u-btn u-button-style u-palette-2-base" style="background-color: #db545a; border-color: #db545a;" padding: 10px 20px;">Kayıt Ol</button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    </div>
                  </div>
                </div>
              </div>
            </li>';
            }
            ?>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <section class="u-align-center u-clearfix u-image u-shading u-section-1" src="" data-image-width="500" data-image-height="333" id="sec-b4ed">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <h1 class="u-text u-text-default u-title u-text-1">BİLET SATIŞLARI</h1>
      <p class="u-large-text u-text u-text-default u-text-variant u-text-2">Tüm Türkiye'de yapılan konserler ve festivaller için bilet satışları...</p>
      <a href="../Etkinlikler/Biletler.php" class="u-btn u-button-style u-palette-2-base u-btn-1">ETKİNLİKLER</a>
    </div>
  </section>


  <footer class="u-clearfix u-footer u-grey-80" id="sec-0399">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
        <a class="u-social-url" title="LinkedIn" target="_blank" href="https://www.linkedin.com/in/aysenuryaz%C4%B1c%C4%B1/"><span class="u-icon u-social-icon u-social-linkedin u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e22f"></use>
            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-e22f">
              <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
              <path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
            C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
            H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path>
            </svg></span>
        </a>
        <a class="u-social-url" target="_blank" data-type="Email" title="Email" href="mailto:a.y.708708@gmail.com"><span class="u-icon u-social-email u-social-icon u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-1db7"></use>
            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-1db7">
              <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
              <path id="path3864" fill="#FFFFFF" d="M27.2,28h57.6c4,0,7.2,3.2,7.2,7.2l0,0v42.7c0,3.9-3.2,7.2-7.2,7.2l0,0H27.2
	c-4,0-7.2-3.2-7.2-7.2V35.2C20,31.1,23.2,28,27.2,28 M56,52.9l28.8-17.8H27.2L56,52.9 M27.2,77.7h57.6V43.5L56,61.3L27.2,43.5V77.7z
	"></path>
            </svg></span>
        </a>
        <a class="u-social-url" target="_blank" data-type="Github" title="Github" href="https://github.com/aysenuryazicii"><span class="u-icon u-social-github u-social-icon u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e60b"></use>
            </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-e60b">
              <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
              <path fill="#FFFFFF" d="M88,51.3c0-5.5-1.9-10.2-5.3-13.7c0.6-1.3,2.3-6.5-0.5-13.5c0,0-4.2-1.4-14,5.3c-4.1-1.1-8.4-1.7-12.7-1.8
	c-4.3,0-8.7,0.6-12.7,1.8c-9.7-6.6-14-5.3-14-5.3c-2.8,7-1,12.2-0.5,13.5C25,41.2,23,45.7,23,51.3c0,19.6,11.9,23.9,23.3,25.2
	c-1.5,1.3-2.8,3.5-3.2,6.8c-3,1.3-10.2,3.6-14.9-4.3c0,0-2.7-4.9-7.8-5.3c0,0-5-0.1-0.4,3.1c0,0,3.3,1.6,5.6,7.5c0,0,3,9.1,17.2,6
	c0,4.3,0.1,8.3,0.1,9.5h25.2c0-1.7,0.1-7.2,0.1-14c0-4.7-1.7-7.9-3.4-9.4C76,75.2,88,70.9,88,51.3z"></path>
            </svg></span>
        </a>
      </div>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
      <span>Website Templates</span>
    </a>
    <p class="u-text">
      <span>created with</span>
    </p>
    <a class="u-link" href="" target="_blank">
      <span>Website Builder Software</span>
    </a>.
  </section>
</body>

</html>

<?php
ob_end_flush();
