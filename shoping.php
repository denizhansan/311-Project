<?php
include "config.php";

/*
|--------------------------------------------------------------------------
| BASE QUERY
|--------------------------------------------------------------------------
*/
$sql = "
SELECT DISTINCT 
    p.product_id,
    p.product_name,
    p.price,
    p.product_image
FROM product p
LEFT JOIN product_size ps ON p.product_id = ps.product_id
LEFT JOIN size s ON ps.size_id = s.size_id
LEFT JOIN sub_category sc ON p.sub_category_id = sc.sub_category_id
WHERE 1=1
";

/*
|--------------------------------------------------------------------------
| BEDEN FİLTRESİ (Small / Medium / Large)
|--------------------------------------------------------------------------
*/
if (!empty($_GET['size'])) {
  $sizes = array_map('intval', $_GET['size']); // size_id
  $sizeList = implode(",", $sizes);
  $sql .= " AND ps.size_id IN ($sizeList)";
}

/*
|--------------------------------------------------------------------------
| ALT / ÜST BEDEN (sub_category_id)
|--------------------------------------------------------------------------
*/
if (!empty($_GET['sub_category'])) {
  $subs = array_map('intval', $_GET['sub_category']);
  $subList = implode(",", $subs);
  $sql .= " AND p.sub_category_id IN ($subList)";
}

/*
|--------------------------------------------------------------------------
| SORGUYU ÇALIŞTIR
|--------------------------------------------------------------------------
*/
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="tr">

<head>
  <title>311-Proje/Shoping</title>
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
          Erkek Giyim
        </li>
      </ol>
    </nav>
  </div>

  <!-- CONTENT -->
  <div class="container-fluid pb-5">
    <div class="d-flex justify-content-between mb-3 px-4" style="font-size:22px; margin-left: 60px;">
      <h3>Erkek Giyim</h3>
    </div>

    <div class="row px-4" style="font-size: 18px;">

      <!-- SOL FİLTRE -->
      <div class="col-md-2" style="margin-left: 90px;">
        <div class="filter-box">

          <h4 class="mb-3">Filtreler</h4>

          <form method="GET">

            <!-- BEDEN -->
            <strong>Beden</strong>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="size[]" value="1" <?= in_array(1, $_GET['size'] ?? []) ? 'checked' : '' ?>>
              <label>Small</label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="size[]" value="2" <?= in_array(2, $_GET['size'] ?? []) ? 'checked' : '' ?>>
              <label>Medium</label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="size[]" value="3" <?= in_array(3, $_GET['size'] ?? []) ? 'checked' : '' ?>>
              <label>Large</label>
            </div>

            <!-- ALT BEDEN -->
            <strong class="mt-3 d-block">Alt Beden</strong>

            <?php
            $subsSelected = $_GET['sub_category'] ?? [];
            $alt = [
              1 => 'Pantolon',
              2 => 'Eşofman Altı'
            ];
            ?>

            <?php foreach ($alt as $id => $label): ?>
              <?php
              $checked = in_array($id, $subsSelected, true) ? 'checked' : '';
              ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sub_category[]" value="<?= $id ?>" <?= $checked ?>>
                <label><?= htmlspecialchars($label) ?></label>
              </div>
            <?php endforeach; ?>


            <!-- ÜST BEDEN -->
            <strong class="mt-3 d-block">Üst Beden</strong>

            <?php
            $ust = [
              3 => 'Tişört',
              4 => 'Mont',
              5 => 'Sweatshirt'
            ];
            ?>

            <?php foreach ($ust as $id => $label): ?>
              <?php
              $checked = in_array($id, $subsSelected, true) ? 'checked' : '';
              ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sub_category[]" value="<?= $id ?>" <?= $checked ?>>
                <label><?= htmlspecialchars($label) ?></label>
              </div>
            <?php endforeach; ?>


            <button class="btn btn-dark btn-sm mt-3 w-100" style="font-size: 18px;">
              Filtrele
            </button>
          </form>

        </div>
      </div>

      <!-- ÜRÜNLER -->
      <div class="col-md-8">
        <div class="row row-cols-1 row-cols-md-4">

          <?php
          if ($result && $result->num_rows > 0):
            while ($row = $result->fetch_assoc()):

              $imagePath = 'theme/images/default.jpg';
              if (
                !empty($row['product_image']) &&
                file_exists('theme/images/' . $row['product_image'])
              ) {
                $imagePath = 'theme/images/' . $row['product_image'];
              }
              ?>
              <div class="col p-3">
                <a href="products.php?id=<?= $row['product_id'] ?>" style="text-decoration:none; color:inherit;">

                  <div class="card h-100 product-card">

                    <div class="card-img-wrapper">
                      <img src="<?= $imagePath ?>" alt="<?= htmlspecialchars($row['product_name']) ?>"
                        onerror="this.src='theme/images/default.jpg'">
                    </div>

                    <div class="card-body">
                      <h5 class="card-title">
                        <?= htmlspecialchars($row['product_name']) ?>
                      </h5>
                      <p class="card-text fw-bold">
                        <?= number_format($row['price'], 2) ?> ₺
                      </p>
                    </div>

                  </div>
                </a>
              </div>
            <?php endwhile; else: ?>
            <p>Ürün bulunamadı.</p>
          <?php endif; ?>

        </div>
      </div>

    </div>
  </div>

  <!-- FOOTER -->
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