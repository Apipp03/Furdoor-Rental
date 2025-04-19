<?php
//sertakan file koneksi ke database
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validasi input 
    if (empty($_POST['name']) || empty($_POST['email'])) {
        $message="mohonisi semua kolom.";
    } else {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        //simpan data kedatabase
        try {
            $stmt = $pdo->prepare("INSERT INTO rentals (name, email) VALUES (:name, :email)");
            $stmt->execute(['name' => $name, 'email' => $email ]);
            $message = "Terimakasih, $name! penyewaan anda telah diterima.";
        } catch (Exception $e) {
            $message = "Terjadi kedsalahan: " . $e->getmessage();
        }

        //menggunakan alert box untuk menampilkan
        echo "<script>
            alert ('$message');
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furdoor Adventure</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <div class="logo">
                <img src="https://png.pngtree.com/png-clipart/20221006/original/pngtree-adventure-hiking-logo-concept-template-png-image_8658741.png" width="90" height="90" alt="Profil Picture">
            </div>
            <ul class="nav-links">
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#products">Produk</a></li>
                <li><a href="#testimonials">Testimoni</a></li>
                <li><a href="#location">Lokasi</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
            <a href="tampildata.php" class="rent-now">Lihat Data</a>
        </nav>
        <div class="hero-section">
            <h1>Unleash Your Adventure</h1>
            <p>Selamat datang di Rental Perlengkapan Pendakian kami, destinasi terpercaya bagi para petualang yang siap menjelajahi keindahan alam dengan mendaki gunung.</p>
            <a href="#" class="rent-now">Rent Now</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about">
        <h2>Tentang Kami</h2>
        <p>Furdoor Adventure adalah penyedia layanan penyewaan alat camping terpercaya. Dengan fokus pada pengalaman luar ruangan yang tak terlupakan, kami menyediakan alat camping berkualitas untuk memastikan Anda merasakan petualangan dengan maksimal.</p>
        <div class="features">
            <div class="feature-item">
                <h3>Harga Terjangkau</h3>
                <p>Furdoor menyediakan harga sewa yang terjangkau dan terhitung sangat ramah dikantong.</p>
            </div>
            <div class="feature-item">
                <h3>Higenis dan Wangi</h3>
                <p>Furdoor menyediakan barang dengan kebersihan tinggi serta wangi demi kenyamanan pelanggan.</p>
            </div>
            <div class="feature-item">
                <h3>Bisa Di Antar</h3>
                <p>Furdoor menyediakan jasa pengantaran bagi teman-teman yang tidak bisa datang ke tempat.</p>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section id="products">
        <h2>Produk Kami</h2>
        <div class="product-slider">
            <div class="product-item">
                <img src="img/tenda-java.png" alt="Tenda Dome Borneo 4 Red">
                <p><b>TENDAKI - Tenda Dome Borneo 4 Red</b></p>
                <p>Rp20000/hari - Kabupaten Malang</p>
            </div>
            <div class="product-item">
                <img src="img/Aircontact Lite 50 Plus 10 Backpack.jpeg" width="300" height="225" alt="Tas Deuter AC Lite 50+10">
                <p><b>TENDAKI - Tas Deuter AC Lite 50+10</b></p>
                <p>Rp30000/hari - Kabupaten Malang</p>
            </div>
            <div class="product-item">
                <img src="img/Trekking Poles Outdoor Hiking Anti Shock Walking Sticks Telescopic Trekking Climbing Poles Ultralight Walking Canes With Rubber Tips Protectors HKD23.jpeg" alt="Sepatu Eiger">
                <p><b>TRACING POLE</b></p>
                <p>Rp2000000 - Kabupaten Malang</p>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonials">
        <h2>Testimoni</h2>
        <div class="testimonial-item">
            <p>"Tempat persewaan perlengkapan outdoor di kecamatan Bululawang. Lokasi yang tidak jauh dari jalan raya Bululawang (jalan utama menuju pantai selatan), cocok apabila ada teman-teman yang hendak melakukan aktivitas camping atau outbound di daerah Malang Selatan."</p>
            <p>- Clarissa Merise, Local Guide</p>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location">
        <h2>Lokasi Kami</h2>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1763777781844!2d112.62114897434886!3d-8.039870994102025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6286b634c552b%3A0x54db1268a1c2d7cd!2sBululawang%2C%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1692617173747!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- Formulir Penyewaan -->
    <section>
        <h2>Formulir Penyewaan</h2>
        <form id="rent-form" method="POST" action="">
            <input type="text" id="name" name="name" placeholder="Nama" require>
            <input type="email" id="email" name="email" placeholder="Email" require>
            <button type="submit">Submit</button>
        </form>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="join-us">
            <h2>Ayo Gabung Bersama Kami</h2>
            <a href="#" class="join-now">Gabung sekarang</a>
        </div>
        <div class="footer-info">
            <div class="company-info">
                <p>Kunjungi Kami</p>
                <p>Jl. Suropati Raya No. 20 RT. 29 RW. 07 Bululawang, Kecamatan Bululawang</p>
                <p>Malang, Jawa Timur, 65171</p>
                <p>0895-8751-8985</p>
                <p>furdoor-adventure@gmail.com</p>
            </div>
            <div class="footer-links">
                <p>Links</p>
                <ul>
                    <li><a href="#products">Produk</a></li>
                    <li><a href="#contact">Kontak</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Made with ❤ by Furdoor Adventure</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>