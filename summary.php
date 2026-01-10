<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>DeFacto - Sepetim</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #fafafa;
            color: #111;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* HEADER */
        header {
            background: #fff;
            border-bottom: 1px solid #e4e4e4;
        }

        .header-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 16px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 13px;
        }

        .search-box {
            border: 1px solid #ccc;
            padding: 8px 12px;
            font-size: 13px;
            min-width: 260px;
        }

        .mini-nav {
            display: flex;
            gap: 16px;
        }

        .mini-nav a {
            font-size: 12px;
            text-transform: uppercase;
        }

        /* MAIN LAYOUT */
        main {
            flex: 1;
            padding: 24px 0 60px;
        }

        .content {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 16px;
        }

        .breadcrumb-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .breadcrumb-title span {
            font-size: 14px;
            font-weight: 500;
        }


        /* Sol kolon full esner, sağ sabit */
       
        .cart-left {
            flex: 1;
        }

        /* Yeşil bar sadece sol kolona bağlı */

        /* Sağdaki kutu */
      
        .summary {
            width: 320px;   /* ne verdiysen */
            background: #fff;
            border: 1px solid #e4e4e4;
            padding: 16px;
        }

        .free-shipping {
            background: #f7faf3;        /* açık yeşil */
            padding: 12px 24px;
            border-radius: 3px;
            display: flex;              /* SATIR YAP */
            align-items: center;        /* DİKEY ORTALA */
            font-size: 14px;
            margin-bottom: 16px;
        }

        .free-dot {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 3px solid #4caf50;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: #4caf50
        }
        .free-icon::before {
           content: "";
           width: 12px;
           height: 12px;
           border-radius: 50%;
           background: #4caf50;
        }

        .cart-layout {
            display: flex;
            align-items: flex-start;
            gap: 24px;
        }

        /* CART ITEMS */
        .cart-items {
            flex: 1;
            background: #fff;
            border: 1px solid #e4e4e4;
        }

        .cart-item {
            display: flex;
            border-bottom: 1px solid #f0f0f0;
            padding: 16px;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-left {
            display: flex;
            gap: 12px;
            margin-right: 16px;
        }

        .cart-checkbox {
            margin-top: 4px;
        }

        .cart-img {
            width: 110px;
            height: 150px;
            background: #ddd;
            object-fit: cover;
        }

        .cart-item-main {
            flex: 1;
        }

        .item-name {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
            line-height: 1.4;
            max-width: 520px;
        }

        .item-price-row {
            font-size: 13px;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .price-current {
            font-weight: 600;
        }

        .price-old {
            font-size: 12px;
            text-decoration: line-through;
            color: #999;
        }

        .item-variant {
            font-size: 12px;
            margin-bottom: 8px;
        }

        .item-controls {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 12px;
        }

        .qty-box {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .qty-label {
            font-size: 12px;
        }

        .qty-btn {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid #ccc;
            background: #fff;
            font-size: 14px;
            line-height: 18px;
            padding: 0;
            cursor: pointer;
        }

        .qty-value {
            min-width: 12px;
            text-align: center;
            font-size: 12px;
        }

        .remove-btn {
            cursor: pointer;
            font-size: 14px;
            opacity: 0.8;
        }

        .delivery-text {
            font-size: 11px;
            color: #777;
            margin-top: 12px;
        }

        /* RIGHT SUMMARY */
        .summary {
            width: 320px;
            background: #fff;
            border: 1px solid #e4e4e4;
            padding: 16px;
            font-size: 13px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .summary-row strong {
            font-weight: 600;
        }

        .summary-row.small {
            font-size: 12px;
            color: #555;
        }

        .summary-highlight {
            background: #f6f6f6;
            padding: 10px 12px;
            border-radius: 3px;
            margin: 10px 0 16px;
            font-size: 12px;
        }

        .summary-highlight span {
            font-weight: 600;
            color: #4caf50;
        }

        .summary-total {
            font-size: 14px;
            font-weight: 700;
            margin-top: 6px;
        }

        .btn-checkout {
            width: 100%;
            border: none;
            padding: 12px 0;
            margin: 14px 0 18px;
            background: #111;
            color: #fff;
            font-size: 13px;
            text-transform: uppercase;
            cursor: pointer;
        }

        .discount-box {
            margin-top: 10px;
            font-size: 12px;
        }

        .discount-top {
            display: flex;
            gap: 6px;
            align-items: stretch;
            margin-bottom: 8px;
        }

        .discount-input {
            flex: 1;
            border: 1px solid #ccc;
            padding: 6px 8px;
            font-size: 12px;
        }

        .discount-btn {
            border: none;
            background: #111;
            color: #fff;
            padding: 6px 14px;
            font-size: 11px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .gift-row {
            margin-top: 8px;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* EMPTY CART */
        .empty-cart {
            max-width: 1180px;
            margin: 60px auto 0;
            padding: 0 16px;
            text-align: center;
        }

        .empty-cart h1 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .empty-cart p {
            font-size: 13px;
            margin-bottom: 26px;
        }

        .btn-home {
            display: inline-block;
            background: #111;
            color: #fff;
            padding: 14px 36px;
            font-size: 13px;
            text-transform: uppercase;
        }

        .hidden {
            display: none !important;
        }

        /* FOOTER (basit) */
        footer {
            background: #fff;
            border-top: 1px solid #e4e4e4;
            padding: 18px 0;
            font-size: 11px;
            color: #555;
        }

        .footer-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 0 16px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        @media (max-width: 960px) {
            .cart-layout {
                flex-direction: column;
            }
            .summary {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <!-- HEADER -->
    <header>
        <div class="header-inner">
            <div class="logo">DeFacto</div>
            <div class="header-right">
                <input class="search-box" placeholder="Ne aramak istersin?">
                <nav class="mini-nav">
                    <a href="#">GİRİŞ</a>
                    <a href="#">FAVORİLERİM</a>
                    <a href="#">SEPETİM (3)</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- MAIN -->
    <main>
        <div id="cart-page" class="content">
            <div class="breadcrumb-title">
                <span>SEPETİM (3 ÜRÜN)</span>
            </div>

            <div class="free-shipping">
                <div class="free-dot">●</div>
                <div><strong>ÜCRETSİZ KARGO</strong> FIRSATINI YAKALADIN!</div>
            </div>

            <div class="cart-layout">
                <!-- LEFT: ITEMS -->
                <section class="cart-items" id="cart-items">
                    <!-- JS dolduracak -->
                </section>

                <!-- RIGHT: SUMMARY -->
                <aside class="summary" id="cart-summary">
                    <div class="summary-row">
                        <span>Ürün Toplamı</span>
                        <span id="summary-product-total">0,00 TL</span>
                    </div>
                    <div class="summary-row">
                        <span>Kargo</span>
                        <span id="summary-shipping">Ücretsiz</span>
                    </div>
                    <div class="summary-row">
                        <span>Toplam İndirim</span>
                        <span id="summary-discount">-0,00 TL</span>
                    </div>

                    <div class="summary-highlight">
                        Toplam kazanç <span id="summary-savings">+0,00 TL</span>
                    </div>

                    <div class="summary-row">
                        <strong>Toplam</strong>
                        <strong id="summary-total">0,00 TL</strong>
                    </div>

                    <button class="btn-checkout" type="button">ALIŞVERİŞİ TAMAMLA</button>

                    <div class="discount-box">
                        <div class="discount-top">
                            <input class="discount-input" id="discount-code" placeholder="İndirim kodunuz">
                            <button class="discount-btn" type="button" id="discount-apply">Kullan</button>
                        </div>
                        <label class="gift-row">
                            <input type="checkbox">
                            <span>🎁 Özel hediye paketi istiyorum</span>
                        </label>
                    </div>
                </aside>
            </div>
        </div>

        <!-- EMPTY CART VIEW -->
        <div id="empty-cart" class="empty-cart hidden">
            <h1>SEPETİNİZDE ÜRÜN YOK.</h1>
            <p>Binlerce DeFacto ürünü seni bekliyor.<br>
                Aşağıdaki önerileri inceleyerek hemen alışverişe başlayabilir ya da kategori linkleriyle DeFacto’yu keşfedebilirsin.</p>
            <a href="#" class="btn-home">ANASAYFAYA GİT</a>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-inner">
            <div>MAĞAZADAN TESLİM AL • KARGO BEDAVA</div>
            <div>ÜCRETSİZ İADE • 30 GÜN İÇERİSİNDE</div>
            <div>MÜŞTERİ HİZMETLERİ 0850 333 22 86</div>
        </div>
    </footer>
</div>

<script>
    // --- VERİLER ---
    // Burada sepetteki ürünleri tanımlıyoruz
    let cart = [
        {
            id: 1,
            name: "SU İTİCİ REGULAR FİT KAPÜŞONLU FERMUARLI RÜZGAR GEÇİRMEZ KAYAK MONTU",
            price: 3999.99,
            originalPrice: 3999.99,
            color: "SİYAH",
            size: "S",
            quantity: 1,
            image: "https://via.placeholder.com/110x150?text=Mont+1",
            delivery: "TAHMİNİ TESLİMAT: 13 ARALIK - 18 ARALIK"
        },
        {
            id: 2,
            name: "USB ISITICILI SU İTİCİ RÜZGAR GEÇİRMEZ KAPÜŞONLU FERMUARLI KIŞLIK KAYAK MONTU",
            price: 3999.99,
            originalPrice: 3999.99,
            color: "SİYAH",
            size: "XL",
            quantity: 1,
            image: "https://via.placeholder.com/110x150?text=Mont+2",
            delivery: "TAHMİNİ TESLİMAT: 13 ARALIK - 18 ARALIK"
        },
        {
            id: 3,
            name: "SU İTİCİ RÜZGAR GEÇİRMEZ SLIM FİT DAR KESİM KAPÜŞONLU FERMUARLI CEPLİ KIŞLIK MONT",
            price: 2399.99,
            originalPrice: 2999.99,
            color: "SİYAH",
            size: "M",
            quantity: 1,
            image: "https://via.placeholder.com/110x150?text=Mont+3",
            delivery: "TAHMİNİ TESLİMAT: 13 ARALIK - 18 ARALIK"
        }
    ];

    const cartItemsEl = document.getElementById("cart-items");
    const cartPageEl = document.getElementById("cart-page");
    const emptyCartEl = document.getElementById("empty-cart");

    const productTotalEl = document.getElementById("summary-product-total");
    const discountEl = document.getElementById("summary-discount");
    const totalEl = document.getElementById("summary-total");
    const savingsEl = document.getElementById("summary-savings");

    // --- FORMATLAYICI ---
    function formatTL(value) {
        // 2 ondalık, virgüllü
        return value.toFixed(2).replace(".", ",") + " TL";
    }

    // --- RENDER FONKSİYONU ---
    function renderCart() {
        if (cart.length === 0) {
            cartPageEl.classList.add("hidden");
            emptyCartEl.classList.remove("hidden");
            return;
        } else {
            cartPageEl.classList.remove("hidden");
            emptyCartEl.classList.add("hidden");
        }

        cartItemsEl.innerHTML = "";

        cart.forEach(item => {
            const li = document.createElement("article");
            li.className = "cart-item";
            li.dataset.id = item.id;

            li.innerHTML = `
                <div class="cart-item-left">
                    <div class="cart-checkbox">
                        <input type="checkbox" checked>
                    </div>
                    <img class="cart-img" src="${item.image}" alt="">
                </div>
                <div class="cart-item-main">
                    <div class="item-name">${item.name}</div>
                    <div class="item-price-row">
                        <span class="price-current">${formatTL(item.price)}</span>
                        ${item.originalPrice && item.originalPrice > item.price
                            ? `<span class="price-old">${formatTL(item.originalPrice)}</span>` : ""}
                    </div>
                    <div class="item-variant">
                        <strong>SİYAH / ${item.size}</strong>
                    </div>
                    <div class="item-controls">
                        <span class="qty-box">
                            <span class="qty-label">ADET:</span>
                            <button class="qty-btn" data-action="decrease" data-id="${item.id}">-</button>
                            <span class="qty-value" id="qty-${item.id}">${item.quantity}</span>
                            <button class="qty-btn" data-action="increase" data-id="${item.id}">+</button>
                        </span>
                        <span class="remove-btn" title="Ürünü sil" data-action="remove" data-id="${item.id}">🗑</span>
                    </div>
                    <div class="delivery-text">${item.delivery}</div>
                </div>
            `;

            cartItemsEl.appendChild(li);
        });

        updateSummary();
    }

    // --- ÖZET HESAPLAMA ---
    function updateSummary() {
        let productTotal = 0;   // eski fiyatlara göre
        let finalTotal = 0;     // indirimli fiyatlar
        let discount = 0;

        cart.forEach(item => {
            const qty = item.quantity;
            const current = item.price * qty;
            const original = (item.originalPrice || item.price) * qty;

            finalTotal += current;
            productTotal += original;
            discount += (original - current);
        });

        const savings = discount; // burada sadece indirim üzerinden gösteriyoruz

        productTotalEl.textContent = formatTL(productTotal);
        discountEl.textContent = "-" + formatTL(Math.max(discount, 0)).replace("-", "");
        totalEl.textContent = formatTL(finalTotal);
        savingsEl.textContent = "+" + formatTL(Math.max(savings, 0)).replace("-", "");
    }

    // --- BUTTON EVENTLERİ (DELEGATION) ---
    cartItemsEl.addEventListener("click", function (e) {
        const actionBtn = e.target.closest("[data-action]");
        if (!actionBtn) return;

        const action = actionBtn.dataset.action;
        const id = Number(actionBtn.dataset.id);
        const item = cart.find(p => p.id === id);
        if (!item) return;

        if (action === "increase") {
            item.quantity += 1;
        } else if (action === "decrease") {
            if (item.quantity > 1) {
                item.quantity -= 1;
            } else {
                // adet 1 ise minus'a basınca ürünü komple sil
                cart = cart.filter(p => p.id !== id);
            }
        } else if (action === "remove") {
            cart = cart.filter(p => p.id !== id);
        }

        renderCart();
    });

    // İndirim kodu butonu (sadece demo)
    document.getElementById("discount-apply").addEventListener("click", function () {
        alert("Bu bir demo sepet sayfasıdır. İndirim kodu gerçek işlem yapmaz.");
    });

    // Sayfa açılınca ilk çizim
    renderCart();
</script>
</body>
</html>
    