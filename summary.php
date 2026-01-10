<?php
session_start();
require_once "config.php";

/* ===============================
   SEPETE EKLE (POST)
================================ */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $product_id = (int)($_POST["product_id"] ?? 0);
    $size_id    = (int)($_POST["size_id"] ?? 0);
    $price      = (float)($_POST["price"] ?? 0);
    $product_image = $_POST["product_image"] ?? '';

    if ($product_id > 0 && $size_id > 0) {

        if (!isset($_SESSION["cart"]) || !is_array($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }

        if (!isset($_SESSION["cart"][$product_id]) || !is_array($_SESSION["cart"][$product_id])) {
            $_SESSION["cart"][$product_id] = [];
        }
        
        if (isset($_SESSION["cart"][$product_id][$size_id])) {
            $_SESSION["cart"][$product_id][$size_id]["qty"]++;
        } else {
            $_SESSION["cart"][$product_id][$size_id] = [
                "qty"   => 1,
                "price" => $price
            ];
        }
    }

    // 🔒 PRG – refresh’te tekrar eklemesin
    header("Location: summary.php");
    exit;
}

/* ===============================
   ADET ARTIR / AZALT (+ / −)
================================ */
if (isset($_GET["action"])) {

    $pid = (int)($_GET["pid"] ?? 0);
    $sid = (int)($_GET["sid"] ?? 0);

    if ($pid > 0 && $sid > 0 && isset($_SESSION["cart"][$pid][$sid])) {

        if ($_GET["action"] === "plus") {
            $_SESSION["cart"][$pid][$sid]["qty"]++;

        } elseif ($_GET["action"] === "minus") {
            $_SESSION["cart"][$pid][$sid]["qty"]--;

            // 1 iken − basılırsa → sil
            if ($_SESSION["cart"][$pid][$sid]["qty"] <= 0) {
                unset($_SESSION["cart"][$pid][$sid]);

                if (empty($_SESSION["cart"][$pid])) {
                    unset($_SESSION["cart"][$pid]);
                }

                if (empty($_SESSION["cart"])) {
                    unset($_SESSION["cart"]);
                }
            }
        }
    }

    header("Location: summary.php");
    exit;
}

/* ===============================
   SEPET SAYISI (ADET BAZLI)
================================ */
$cartCount = 0;

if (!empty($_SESSION["cart"]) && is_array($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $sizes) {
        if (!is_array($sizes)) continue;

        foreach ($sizes as $item) {
            if (is_array($item) && isset($item["qty"])) {
                $cartCount += (int)$item["qty"];
            }
        }
    }
}
?>
<!doctype html>
<html lang="tr">
<head>
    <title>Sepetim</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="theme/css/style.css">

    <style>
        .product-link {
  color: #000;          /* siyah */
  text-decoration: none; /* alt çizgi yok */
}

.product-link:hover {
  color: #000;          /* hover’da da siyah */
  text-decoration: none;
}

    </style>

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
        <a href="summary.php" class="btn">Sepetim</a>
      </div>
    </div>
  </div>

  <!-- BREADCRUMB -->
  <div style="margin-left: 30px; margin-top: -10px; margin-bottom: 10px; font-size: 18px;">
    <nav aria-label="breadcrumb" class="px-4 mb-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="shoping.php">Erkek Giyim</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Sepetim
        </li>
      </ol>
    </nav>
  </div>

<div class="container mt-5">

    <h4 class="mb-3">Sepetim (<?= $cartCount ?> Ürün)</h4>

    <div class="row">

        <!-- SOL -->
        <div class="col-md-8">

            <?php if (!empty($_SESSION["cart"]) && is_array($_SESSION["cart"])): ?>
                <?php foreach ($_SESSION["cart"] as $pid => $sizes): ?>
                    <?php if (!is_array($sizes)) continue; ?>

                    <?php foreach ($sizes as $sid => $item): ?>
                        <?php if (!is_array($item)) continue; ?>

                        <?php
                        $q = $conn->query("
                        SELECT 
                            p.product_name,
                            p.product_image,
                            s.size_name
                        FROM product p
                        JOIN size s ON s.size_id = $sid
                        WHERE p.product_id = $pid

                        ");
                        $row = $q->fetch_assoc();
                        ?>
                        <div class="border p-3 mb-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p><img 
                                src="theme/images/<?= htmlspecialchars($row['product_image'] ?? 'no-image.png') ?>"
                                alt="<?= htmlspecialchars($row['product_name'] ?? '') ?>"
                                style="width:100px; height:130px; object-fit:cover; border-radius:10px;">
                                </p>
                                <strong>
                                <a href="products.php?id=<?= $pid ?>" class="product-link">
                                    <?= htmlspecialchars($row["product_name"] ?? '') ?>
                                </a>
                                </strong>
                                <p class="mb-1">Beden: <?= htmlspecialchars($row["size_name"] ?? '') ?></p>
                                <p class="mb-1"><?= number_format($item["price"],2) ?> TL</p>
                            </div>

                            <!-- + / − -->
                            <div class="d-flex align-items-center gap-2">
                                <a href="summary.php?action=minus&pid=<?= $pid ?>&sid=<?= $sid ?>"
                                   class="btn btn-sm btn-outline-secondary">−</a>

                                <strong><?= $item["qty"] ?></strong>

                                <a href="summary.php?action=plus&pid=<?= $pid ?>&sid=<?= $sid ?>"
                                   class="btn btn-sm btn-outline-secondary">+</a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Sepetiniz boş.</p>
            <?php endif; ?>

        </div>

        <!-- SAĞ -->
        <div class="col-md-4">
            <?php
            $total = 0;

            if (!empty($_SESSION["cart"]) && is_array($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $sizes) {
                    if (!is_array($sizes)) continue;

                    foreach ($sizes as $item) {
                        if (is_array($item)) {
                            $total += $item["qty"] * $item["price"];
                        }
                    }
                }
            }
            ?>
            <div class="border p-3">
                <p>Ürün Toplamı: <strong><?= number_format($total,2) ?> TL</strong></p>
                <p>Kargo: <strong>Ücretsiz</strong></p>
                <hr>
                <p>Toplam: <strong><?= number_format($total,2) ?> TL</strong></p>
                <button class="btn btn-dark w-100">Alışverişi Tamamla</button>
            </div>
        </div>

    </div>
</div>

  <!-- FOOTER -->
  <footer class="container ; py-5" style="margin-top: 150px;">
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
