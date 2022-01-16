<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    extract($_POST);
    include '../databaseTicket.php';

    echo '
    <div>
    <div class="container-form">
        <form method="post">
            <input type="submit" name="users" class="button" value="Kullanıcılar" />
            <input type="submit" name="events" class="button" value="Etkinlikler" />
        </form>
    </div>
    <div class="section-div">
        <div>
            <table>';

    if (array_key_exists('users', $_POST)) {
        users();
    } else if (array_key_exists('events', $_POST)) {
        events();
    }

    function users()
    {
        include '../databaseUser.php';
        $sql = mysqli_query($conn, "SELECT * FROM user");

        echo ' 
        <tr class="title users-tr">
            <td>ID</td> 
            <td>Email</td> 
            <td>İsim</td>    
            <td>Soyisim</td>   
            <td>Sil</td>
        </tr>';

        while ($row = mysqli_fetch_assoc($sql)) {
            if (is_array($row)) {
                echo '
                <tr class="users-tr">
                    <td>' . $row['ID'] . ' </td> 
                    <td> ' . $row['Email'] . '</td> 
                    <td>' . $row['First_name'] . '</td>    
                    <td>' . $row['Last_name'] . '</td>   
                    <td><a href="delete.php?users=' . $row['ID'] . '" style="font-style:italic">KULLANICIYI SİL</a></td>
                </tr>';
                $_SESSION["users"] = $row['ID'];
            }
        }
    }

    function events()
    {
        include '../databaseTicket.php';
        $sql = mysqli_query($con, "SELECT * FROM tickets_info");

        echo ' 
        <tr class="title events-tr">
            <td>ID</td> 
            <td>Etkinlik Adı</td> 
            <td>Etkinlik Tarihi</td>    
            <td>Etkinlik Fiyatı</td>   
            <td>Bilet Miktarı</td>
            <td>Sil</td>
        </tr>';

        while ($row = mysqli_fetch_assoc($sql)) {
            if (is_array($row)) {
                echo '
                <tr class="events-tr">
                    <td>' . $row['id'] . ' </td> 
                    <td> ' . $row['name'] . '</td> 
                    <td>' . $row['date'] . '</td>    
                    <td>' . $row['price'] . '</td>  
                    <td>' . $row['quantity'] . '</td>
                    <td><a href="delete.php?events=' . $row['id'] . '" style="font-style:italic">ETKİNLİĞİ SİL</a></td>  
                </tr>';
                $_SESSION["events"] = $row['id'];
            }
        }
        echo '
        <a class="btn btn-events u-text-hover-palette-2-base" type="button" data-toggle="modal" data-target="#myModal1">ETKİNLİK EKLE</a>
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
                  <form method="post" action="ticket_db.php">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Etkinlik Adı" required="required">
                    </div>

                    <div class="form-group">
                      <input type="date" class="form-control" name="date" placeholder="Etkinlik Tarihi" required="required">
                    </div>

                    <div class="form-group">
                    <input type="text" class="form-control" name="price" placeholder="Etkinlik Fiyatı" required="required">
                    </div>

                    <div class="form-group">
                    <input type="text" class="form-control" name="quantity" placeholder="Bilet Sayısı" required="required">
                    </div>

                    <div class="form-group">
                    <button type="submit" name="save" class="btn btn-success btn-lg btn-block u-btn u-button-style u-palette-2-base" style="background-color: #db545a; border-color: #db545a;" padding: 10px 20px;">Etkinlik Ekle</button>
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
        ';
    }
    echo '
            </table>
        </div>
    </div>
    </div>
    ';
    ?>
</body>

<?php
ob_end_flush();
