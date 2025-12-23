<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relax Ceket Yaka Düğmeli Kaşe Parka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background: #ffffff;
            color: #111;
        }
        /* İçerik */
        .product-image img{
            width:100%;
            
        }
        /* Ürün Bilgileri */
        .product-info h1{
            font-size:26px;
            font-weight:bold;
        }
        .price{
            margin-top:10px;
            font-size:24px;
            font-weight:bold;
        }
        /* RENKLER */
        .color-wrap{
            display:flex;
            gap:10px;
            margin-top:15px;
        }
        .color-radio{
            display:none;
        }
        .color-label{
            width:22px;
            height:22px;
            border:1px solid #ccc;
            border-radius:4px;
            cursor:pointer;
            display:inline-block;
            transition:0.2s;
        }
        /* Seçili renk */
        .color-radio:checked + .color-label{
            border:2px solid black;
            transform:scale(1.1);
        }
        /* BEDENLER */
        .size-wrap{
            display:flex;
            gap:10px;
            margin-top:15px;
        }
        .size-radio{
            display:none;
        }
        .size-label{
            padding:6px 10px;
            border:1px solid #ccc;
            border-radius:4px;
            cursor:pointer;
            transition:0.2s;
            font-size:14px;
            display:inline-block;
        }
        /* Seçili beden */
        .size-radio:checked + .size-label{
            border:2px solid black;
            background:#eee;
            transform:scale(1.05);
        }
        .btnn{
            width:100%;
            background:black;
            color:white;
            padding:14px 0;
            border:none;
            border-radius:4px;
            font-size:17px;
            cursor:pointer;
            margin-top:20px;
        }
        .desc{
            margin-top:20px;
            color:#555;
            line-height:1.5;
        }
        @media (max-width:900px){
            .container{
                grid-template-columns:1fr;
            }
        } 
        .top-btn {
        background: white !important;
        color: black !important;
        border: 1px solid black !important;
        padding: 8px 18px;
        border-radius: 6px;
        }
        /* Üzerine gelince de aynı kalsın */
        .top-btn:hover {
        background: white !important;
        color: black !important;
        border: 1px solid black !important;
        }
        .product-image {
        aspect-ratio: 3 / 4;   /* dik foto için ideal */
        overflow: hidden;
        border-radius: 15px;
        }
        .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }

</style>
</head>
<body>

<div style="margin-top: 30px; margin-bottom: 50px; margin-left: 40px; margin-right: 50px" 
     class="d-flex flex-wrap align-items-center justify-content-between">

	<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
    	<i class="fa fa-bars" style="font-size: 30px; margin-right: 20px; color: black" aria-hidden="true"></i>
    	<img style="width: 150px; height: 30px;" src="theme/images/logo.jpg">
	</a>


    <!-- Arama + Sağ Kısım (ms-auto ile sağa yaslıyoruz) -->
    <div class="d-flex align-items-center ms-auto">

        <!-- Arama Kutusu -->
        <form class="me-3">
            <input type="search" class="form-control form-control-dark"
                   placeholder="Ne aramak istersin?" aria-label="Search">
        </form>

        <!-- Butonlar -->
        <div class="text-end">
            <button type="button" class="btn">Giriş</button>
            <button type="button" class="btn">Favorilerim</button>
            <button type="button" class="btn">Sepetim (0)</button>
        </div>
    </div>
</div>
<!-- İçerik -->
<div class="container py-5 mt-5">
    
    <div class="row">
        <!-- Ürün Foto -->
        <div class="product-image col-md-6">
            <img src="photos/Kaban1.jpg" alt="Ürün Resmi" class="img-fluid">
        </div>
        <!-- Ürün Bilgileri -->
        <div class="product-info col-md-6">
            
            <br><br>
            <h1>Relax Fit Ceket Yaka Düğmeli Kaşe Parka</h1><br>
            <div class="price">2499.99 TL</div><br>
            <!-- RENK SEÇİMİ -->
            <strong>Renk Seç:</strong>
            <br>
            <div class="color-wrap">
                
                <input type="radio" name="color" id="c1" class="color-radio" checked>
                <label for="c1" class="color-label" style="background:black;"></label>

                <input type="radio" name="color" id="c2" class="color-radio">
                <label for="c2" class="color-label" style="background:#ccbca8;"></label>
                
                <input type="radio" name="color" id="c5" class="color-radio">
                <label for="c5" class="color-label" style="background:#800020;"></label>

            </div><br><br>
            <!-- BEDEN SEÇİMİ -->
            <strong>Beden Seç:</strong>
            <div class="size-wrap">

                <input type="radio" name="size" id="s1" class="size-radio">
                <label for="s1" class="size-label">S</label>

                <input type="radio" name="size" id="s2" class="size-radio" checked>
                <label for="s2" class="size-label">M</label>

                <input type="radio" name="size" id="s3" class="size-radio">
                <label for="s3" class="size-label">L</label>
            </div><br><br>

            <button class="btnn">SEPETE EKLE</button>

            <div class="desc">
                Relax Fit Ceket Yaka Düğmeli Cepli Kışlık Kaşe Parka.  
                Kalın kaşe dokusu ve şık tasarımıyla soğuk havalarda stil sunar.<br><br>
                Ürün Kodu: Y8903AZBK27
            </div>
        </div>
    </div>
</div>

    <br><br><br>
<footer class="container ; py-5; mt-5">
  <div class="row">
    <div class="col-6 col-md-2 mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
      </ul>
    </div>
    <div class="col-6 col-md-2 mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
      </ul>
    </div>
    <div class="col-6 col-md-2 mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
      </ul>
    </div>
    <div class="col-md-5 offset-md-1 mb-3">
      <form>
        <h5>Subscribe to our newsletter</h5>
        <p>Monthly digest of what's new and exciting from us.</p>
        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
          <label for="newsletter1" class="visually-hidden">Email address</label>
          <input id="newsletter1" type="email" class="form-control" placeholder="Email address">
          <button class="btn btn-primary" type="button">Subscribe</button>
        </div>
      </form>
    </div>
  </div>
  <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
    <p>© 2025 Company, Inc. All rights reserved.</p>
    <ul class="list-unstyled d-flex">
      <li class="ms-3">
        <a class="link-body-emphasis" href="#" aria-label="Instagram">
          <svg class="bi" width="24" height="24">
            <use xlink:href="#instagram"></use>
          </svg>
        </a>
      </li>
      <li class="ms-3">
        <a class="link-body-emphasis" href="#" aria-label="Facebook">
          <svg class="bi" width="24" height="24" aria-hidden="true">
            <use xlink:href="#facebook"></use>
          </svg>
        </a>
      </li>
    </ul>
  </div>
</footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.9/holder.min.js"></script>
    	<script src="js/holder.min.js" type="text/javascript"></script>
</body>
</html>