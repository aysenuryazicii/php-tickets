<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css?v=<?php echo time(); ?>" media="screen">
    <title>Ödeme Ekranı</title>
</head>

<body>
    <?php
    session_start();
    ob_start();

    include "databaseTicket.php";
    include "databaseUser.php";

    $id = $_GET['id'];
    $sorgu = mysqli_query($con, "SELECT * FROM tickets_info WHERE id=$id");
    while ($str = mysqli_fetch_assoc($sorgu)) {
        $name = $str['name'];
        $price = $str['price'];
    }

    echo ' 
    <h2>Ödeme Bilgileri</h2>
    <div class="payment">
    <form method="POST" action="">
        <table>
            <tr>
                <td>Bilet alınan etkinlik</td>
                <td><p>' . $name . '</p></td>
            </tr>
            <tr>
                <td>Ödenecek Tutar</td>
                <td><p>' . $price . '₺</p></td>
            </tr>
            <tr>
                <td>Ad Soyad</td>
                <td><input type="text" name="name" required="required" /></td>
            </tr>
            <tr>
                <td>Kart Numarası</td>
                <td><input type="text" name="card_no" pattern="(4\d{12}(?:\d{3})?)" required="required"/></td>
            </tr>
            <tr>
                <td>Son Kullanım Tarihi (aa/yy)</td>
                <td><input type="text" pattern="(?:0[1-9]|1[0-2])/[0-9]{2}" title="AA/YY formatında giriniz!" name="last_date" required="required"/></td>
            </tr>
            <tr>
                <td>CVV</td>
                <td><input type="text" name="cvv" required="required" /></td>
            </tr>
        </table>
        <input class="btn" type="submit" name="gonder" value="Öde"/>
    </form>
</div>';

    if (isset($_POST["gonder"])) {
        $name = $_POST["name"];
        $card_no = $_POST["card_no"];
        $last_date = $_POST["last_date"];
        $cvv = $_POST["cvv"];

        $update = mysqli_query($con, "UPDATE tickets_info SET quantity=quantity-1 WHERE id=$id");
        header('Location:Etkinlikler/Biletler.php');
    }

    mysqli_close($con);
    ob_end_flush();
    ?>
</body>

</html>