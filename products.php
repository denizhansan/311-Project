<?php
require_once "config.php";

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
  die("Geçersiz ürün");
}

/* ÜRÜN */
$sql = "SELECT * FROM product WHERE product_id = $id";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  die("Ürün bulunamadı");
}
$product = $result->fetch_assoc();

/* BEDENLER */
$sizeSql = "
    SELECT s.size_id, s.size_name, ps.stock_quantity
    FROM product_size ps
    JOIN size s ON ps.size_id = s.size_id
    WHERE ps.product_id = $id
";
$sizes = $conn->query($sizeSql);

/* TOPLAM STOK */
$totalStock = $conn->query("
    SELECT SUM(stock_quantity) AS total_stock
    FROM product_size
    WHERE product_id = $id
")->fetch_assoc();

/* SEÇİLEN BEDEN STOĞU */
$selectedStock = null;
if (isset($_POST['size_id'])) {
  $selectedSizeId = (int) $_POST['size_id'];
  $stockRes = $conn->query("
        SELECT s.size_name, ps.stock_quantity
        FROM product_size ps
        JOIN size s ON ps.size_id = s.size_id
        WHERE ps.product_id = $id
        AND ps.size_id = $selectedSizeId
    ");
  $selectedStock = $stockRes->fetch_assoc();
}
?>
<!doctype html>
<html lang="tr">
<head>
    <title>311-Proje/Products</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="theme/css/style.css">
</head>

<body>

  <!-- HEADER -->
  <div class="d-flex flex-wrap align-items-center justify-content-between" style="margin:30px 50px 50px 40px;">

    <i class="fa fa-bars" style="font-size:30px;color:black"></i>

    <a href="index.php">
      <img src="theme/images/logo.jpg" alt="Logo" style="height:40px; margin-left: 15px;">
    </a>

    <div class="d-flex align-items-center ms-auto">
      <form class="me-3">
        <input type="search" class="form-control" placeholder="Ne aramak istersin?">
      </form>

      <div class="text-end">
        <button class="btn">Giriş</button>
        <button class="btn">Favorilerim</button>
        <a href="summary.php" class="btn">Sepetim (0)</a>
      </div>
    </div>
  </div>

  <!-- BREADCRUMB -->
   <div style="margin-left: 30px; margin-top: -10px; margin-bottom: 10px; font-size: 18px;">
      <nav aria-label="breadcrumb" class="px-4 mb-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Anasayfa</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <a href="shoping.php">Erkek Giyim</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <?= htmlspecialchars($product['product_name']) ?>
        </ol>
      </nav>
    </div>

  <div class="container py-5">
    <div class="row">

      <!-- FOTO -->
      <div class="col-md-6">
        <img src="theme/images/<?= htmlspecialchars($product['product_image']) ?>" class="img-fluid">
      </div>

      <!-- BİLGİ -->
      <div class="col-md-6">
        <h1><?= htmlspecialchars($product['product_name']) ?></h1>

        <div class="fs-4 fw-bold mb-2">
          <?= number_format($product['price'], 2) ?> TL
        </div>

        <!-- BEDEN SEÇİM FORMU -->
        <form method="post">
          <strong>Beden:</strong><br>

          <div class="btn-group mt-2">
            <?php while ($size = $sizes->fetch_assoc()): ?>
              <input type="radio" class="btn-check" name="size_id" id="size<?= $size['size_id'] ?>"
                value="<?= $size['size_id'] ?>" onchange="this.form.submit()" <?= isset($_POST['size_id']) && $_POST['size_id'] == $size['size_id'] ? 'checked' : '' ?>>
              <label class="btn btn-outline-dark" for="size<?= $size['size_id'] ?>">
                <?= htmlspecialchars($size['size_name']) ?>
              </label>
            <?php endwhile; ?>
          </div>
        </form>

        <!-- STOK BİLGİSİ -->
        <div class="mt-3 text-muted">
          <?php if ($selectedStock): ?>
            Seçilen beden (<?= htmlspecialchars($selectedStock['size_name']) ?>) stoğu:
            <strong><?= $selectedStock['stock_quantity'] ?> adet</strong>
          <?php else: ?>
            Lütfen beden seçiniz
          <?php endif; ?>
        </div>

        <!-- SEPETE EKLE -->
        <form action="summary.php" method="post" class="mt-3">
          <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
          <input type="hidden" name="price" value="<?= $product['price'] ?>">

          <?php if ($selectedStock): ?>
            <input type="hidden" name="size_id" value="<?= $_POST['size_id'] ?>">
          <?php endif; ?>

          <button class="btn btn-dark w-100" <?= !$selectedStock ? 'disabled' : '' ?>>
            SEPETE EKLE
          </button>
        </form>

        <div class="mt-3 text-secondary">
          Toplam stok: <strong><?= $totalStock['total_stock'] ?? 0 ?> adet</strong>
          <div class="desc">
                <br>
                Relax Fit Ceket Yaka Düğmeli Cepli Kışlık Kaşe Parka.
                Kalın kaşe dokusu ve şık tasarımıyla soğuk havalarda stil sunar.<br><br>
                Ürün Kodu: AZ1327F<?= htmlspecialchars($product['product_id']) ?><br>
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
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Siparişimi Nasıl Takip
              Ederim?</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Nasıl İade Ederim?</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Gift Club Sıkça Sorulan
              Sorular</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">İşlem Rehberi</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Kampanyalar</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Kişisel Verilerin Korunması ve
              Gizlilik</a></li>
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

</body>

</html>