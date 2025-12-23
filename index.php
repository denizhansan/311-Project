<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeFacto Örnek Sayfa</title>

    <!-- BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
        }
        
        .hero-banner-top img {
            display: block;
            width: 100%;
            margin: 0;
        }
        
        body {
            margin: 0;
            padding: 0;
        }
        
        .hero-banner img {
            width: 100%;
            height: auto;
            display: block;
        }
        .categories, .fit-tech, .product-group, .deals-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        .category-card img, 
        .fit-tech img,
        .product-group img,
        .deals-grid img {
            width: 250px;
            height: auto;
            border-radius: 10px;
        }
        .category-card h3 {
            text-align: center;
            margin-top: 10px;
        }
        .promo {
            background: #f2f2f2;
            text-align: center;
            padding: 10px;
            margin: 20px 0;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="header-overlay">
    <div class="container-fluid d-flex align-items-center justify-content-between py-3">

        <a href="/" class="d-flex align-items-center text-decoration-none">
            <i class="fa fa-bars me-3" style="font-size: 30px; color: black"></i>
            <img style="width: 150px; height: 30px;" src="theme/images/logo.jpg">
        </a>

        <div class="d-flex align-items-center flex-wrap">

            <form class="me-3">
                <input type="search" class="form-control"
                       placeholder="NE ARAMAK İSTERSİN?">
            </form>

            <div class="d-flex">
                <button class="btn">Giriş</button>
                <button class="btn">Favorilerim</button>
                <button class="btn">Sepetim (0)</button>
            </div>

        </div>
    </div>
</div>

<!-- BANNER 1 - En üstte tamamen sıfır boşluk ile -->
<section class="hero-banner-top">
    <img src="images/banner1.jpg" alt="Erkek Koleksiyonu">
</section>

<br>

<!-- BANNER 2 -->
<section class="hero-banner">
    <img src="images/banner2.jpg" alt="Kış Ürünleri">
</section>

<!-- PROMO -->
<div class="promo">
    ❄ 2250 TL'YE 250 TL KOD: DF250 | 3500 TL'YE 500 TL KOD: DF500 | 5000 TL'YE ...
</div>

<!-- ÜST KATEGORİLER -->
<section class="categories">
    <div class="category-card">
        <img src="images/mont-kaban.jpg" alt="Mont | Kaban">
    </div>
    <div class="category-card">
        <img src="images/triko.jpg" alt="Triko">
    </div>
    <div class="category-card">
        <img src="images/sweatshirt.jpg" alt="Sweatshirt & Eşofman">
    </div>
    <div class="category-card">
        <img src="images/gomlek.jpg" alt="Gömlek">
    </div>
</section>

<!-- FIT TECH -->
<section class="fit-tech-section text-center mt-5">
    <h2>FİT TECH</h2>

    <div class="hero-banner">
        <img src="images/fit-tech1.jpg" alt="Fit Tech Ürün">
    </div>
</section>

<!-- YENİ YIL RAHATLIĞI -->
<section class="holiday-comfy text-center mt-5">
    <h2>YENİ YIL RAHATLIĞI EV GİYİM</h2>

    <div class="hero-banner">
        <img src="images/ev-giyim.jpg" alt="Pijama">
    </div>
</section>

<!-- KIŞ FIRSATLARI -->
<section class="winter-deals text-center mt-5">
    <h2>KIŞ FIRSATLARI BAŞLADI!</h2>

    <div class="hero-banner">
        <img src="images/kis-firsati.jpg" alt="Fırsat 1">
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center mt-5 p-4 bg-light">
    © 2025 DeFacto | Tüm Hakları Saklıdır
</footer>

</body>
</html>