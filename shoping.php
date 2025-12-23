<?php
include "config.php";
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
	
  <title>ISE311-Proje</title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>


<body>
	
<div style="margin-top: 30px; margin-bottom: 50px; margin-left: 40px; margin-right: 50px" 
     class="d-flex flex-wrap align-items-center justify-content-between">

    <i class="fa fa-bars" style="font-size: 30px; margin-right: 20px; color: black" aria-hidden="true"></i>
    <a href="index.php"><img src="theme/images/logo.jpg" alt="Logo" style="height:40px;"></a>

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
	
<div class="container pb-5">

	<div style="display: flex; justify-content: space-between; font-size: 18px">
		<span>Erkek Giyim</span>
		<span>Filtreler</span>
	
  </div>	
  
        <div class="row row-cols-1 row-cols-md-4">
            <div class="col p-3">
            <div class="card h-10" style="height: 520px;">
                    <img src="holder.js/370x555" class="card-img-top img-fluid" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Ürün adı</h5>
						<p class="card-text">Ürün fiyatı</p>
                    </div>
                </div>
            </div>
            <div class="col p-3">
            <div class="card h-10" style="height: 520px;">
                    <img src="holder.js/370x555" class="card-img-top img-fluid" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Ürün adı</h5>
                        <p class="card-text">Ürün fiyatı</p>
                    </div>
                </div>
            </div>
            <div class="col p-3">
            <div class="card h-10" style="height: 520px;">
                    <img src="holder.js/370x555" class="card-img-top img-fluid" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Ürün adı</h5>
                        <p class="card-text">Ürün fiyatı</p>
                    </div>
                </div>
            </div>
			<div class="col p-3">
            <div class="card h-10" style="height: 520px;">
                    <img src="holder.js/370x555" class="card-img-top img-fluid" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Ürün adı</h5>
                        <p class="card-text">Ürün fiyatı</p>
                    </div>
                </div>
            </div>
        </div>
	
</div>
	
	
<footer class="container ; py-5; mt-5">
  <div class="row">

    <div class="col-6 col-md-2 mb-3">
      <h5>Defacto</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">KURUMSAL</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">HAKKIMIZDA</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">İNSAN KAYNAKLARI</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">KURUMSAL SATIŞ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">TOPTAN SATIŞ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">DEFACTO TEKNOLOJİ</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">SİTEMAP</a></li>
      </ul>
    </div>

    <div class="col-6 col-md-2 mb-3">
      <h5>YARDIM</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Sıkça Sorulan Sorular</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Siparişimi Nasıl Takip Ederim?</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Nasıl İade Ederim?</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Gift Club Sıkça Sorulan Sorular</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">İşlem Rehberi</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Kampanyalar</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Kişisel Verilerin Korunması ve Gizlilik</a></li>
      </ul>
    </div>

    <div class="col-6 col-md-2 mb-3">
      <h5>BİZE ULAŞIN</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Mağazalarımız</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">İletişim Formu</a></li>
      </ul>
    </div>

    <div class="col-md-5 offset-md-1 mb-3">
      <form>
        <h5>BİZDEN HABERDAR OLUN</h5>
        <p>Aylık bültenimizle yeniliklerden ve gelişmelerden haberdar olun.</p>
        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
          <label for="newsletter1" class="visually-hidden">Email address</label>
          <input id="newsletter1" type="email" class="form-control" placeholder="Email address">
          <button class="btn" style="border: 1px solid lightgrey" type="button">Abone Ol</button>
        </div>
      </form>
    </div>

  </div>

  <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
    <p>© 2025 defacto.com Her Hakkı Saklıdır.</p>
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
  
</body>
</html>