<!DOCTYPE html>
<html>
<head>
    <title>Oda Rezervasyonu</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <style>
        
        .php-output {
            margin-top: 0;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: larger;
        }
        
    </style>
    <div class="arka-plan">
        <h1>Sanal Otel</h1>
        <a href="Otel_hakkında.html" class="rezervasyon-butonu">Ana Sayfa</a>
        <h3>Bilgilerinizi giriniz:</h3>
        <form class="rezervasyon-formu" method="post" action="rezervasyon.php">       
            <label for="isim">Adınız Soyadınız:</label>
            <input type="text" id="isim" name="isim" class="form-input" required><br><br>
            <label for="kişi">Kişi Sayısı:</label>
            <input type="number" id="kişi" name="kişi" class="form-input" required><br><br>
            <label for="oda">Oda Numarası:</label>
            <input type="number" id="oda" name="oda" class="form-input" required><br><br>
            <label for="saat">Saat:</label>
            <input type="time" id="saat" name="saat" class="form-input" required><br><br>
            <label for="tarih">Giriş Tarihi:</label>
            <input type="date" id="tarih" name="tarih" class="form-select" required><br><br>
            <label for="cikistarih">Çıkış Tarihi:</label>
            <input type="date" id="cikistarih" name="cikistarih" class="form-select" required><br><br>
            <input type="submit" value="Rezervasyon Yap" class="rezervasyon-butonu" required><br><br><br>
        </form>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isim = $_POST["isim"];
    $kişi = $_POST["kişi"];
    $oda = $_POST["oda"];
    $tarih = $_POST["tarih"];
    $cikistarih = $_POST["cikistarih"]; 
    $saat = $_POST["saat"];

    $rezervasyonlarDosya = 'rezervasyonlar.txt';
    $rezervasyonBilgisi = "$isim -$kişi -$oda - $tarih - $saat\n";
    file_put_contents($rezervasyonlarDosya, $rezervasyonBilgisi, FILE_APPEND);

    echo '<div class="php-output">Sayın ' . htmlspecialchars($isim) . ', seçmiş olduğunuz ' . htmlspecialchars($oda) . ' numaralı oda için rezervasyonunuz ' . htmlspecialchars($saat) . ' saatinde ' . htmlspecialchars($tarih) . ' tarihi ile ' . htmlspecialchars($cikistarih) . ' tarihi arasında yapılmıştır. Bizi Tercih Ettiğiniz İçin Teşekkür Ederiz.</div>';
}
?>

            </div>
</body>
</html>
