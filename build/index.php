<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Produtos — Irani Delivery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:       #0C0F14;
            --surface:  #141820;
            --card:     #1A1F2B;
            --border:   rgba(255,255,255,0.07);
            --accent:   #00E5A0;
            --accent2:  #FF6B35;
            --text:     #F0EEE8;
            --muted:    #7A8090;
            --badge-bg: rgba(0,229,160,0.12);
            --badge-tx: #00E5A0;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: -30vh; left: 50%;
            transform: translateX(-50%);
            width: 80vw; height: 60vh;
            background: radial-gradient(ellipse at center, rgba(0,229,160,0.06) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* ── HEADER ── */
        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(12,15,20,0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
        }

        .header-inner {
            max-width: 1200px;
            margin: 0 auto;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.2rem;
            letter-spacing: -0.03em;
            color: var(--text);
            text-decoration: none;
        }
        .logo span { color: var(--accent); }
        .logo-dot {
            display: inline-block;
            width: 6px; height: 6px;
            background: var(--accent);
            border-radius: 50%;
            margin-left: 3px;
            vertical-align: middle;
            position: relative; top: -1px;
        }

        /* ── CART BUTTON (header) ── */
        .cart-btn {
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 8px 16px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            font-weight: 500;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
        }
        .cart-btn:hover { border-color: rgba(0,229,160,0.3); background: #1e2330; }
        .cart-btn svg { width: 18px; height: 18px; flex-shrink: 0; }

        .cart-count {
            background: var(--accent);
            color: #0C0F14;
            font-size: 0.7rem;
            font-weight: 700;
            width: 18px; height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            display: none;
        }
        .cart-count.visible { display: flex; }

        /* ── HERO ── */
        .hero {
            position: relative; z-index: 10;
            max-width: 1200px;
            margin: 0 auto;
            padding: 4.5rem 2rem 2.5rem;
            text-align: center;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--badge-bg);
            color: var(--badge-tx);
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 100px;
            border: 1px solid rgba(0,229,160,0.2);
            margin-bottom: 1.25rem;
        }
        .hero-eyebrow::before {
            content: '';
            width: 6px; height: 6px;
            background: var(--accent);
            border-radius: 50%;
            animation: blink 2s ease-in-out infinite;
        }
        @keyframes blink {
            0%,100% { opacity: 1; transform: scale(1); }
            50%      { opacity: 0.4; transform: scale(0.8); }
        }

        h1 {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: clamp(2rem, 5vw, 3.5rem);
            line-height: 1.08;
            letter-spacing: -0.04em;
            margin-bottom: 0.9rem;
        }
        h1 em { font-style: normal; color: var(--accent); }

        .hero-sub {
            font-size: 1rem;
            color: var(--muted);
            font-weight: 300;
            max-width: 400px;
            margin: 0 auto 2.2rem;
            line-height: 1.6;
        }

        /* ── SEARCH ── */
        .search-wrap { max-width: 560px; margin: 0 auto; }

        form {
            display: flex;
            gap: 8px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 7px;
            transition: border-color 0.2s;
        }
        form:focus-within {
            border-color: rgba(0,229,160,0.35);
            box-shadow: 0 0 0 3px rgba(0,229,160,0.06);
        }
        .search-icon {
            flex-shrink: 0; width: 40px;
            display: flex; align-items: center; justify-content: center;
            color: var(--muted);
        }
        .search-icon svg { width: 17px; height: 17px; }

        input[type="text"] {
            flex: 1;
            background: transparent;
            border: none; outline: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.93rem;
            color: var(--text);
            padding: 4px 0;
        }
        input[type="text"]::placeholder { color: var(--muted); }

        button[type="submit"] {
            background: var(--accent);
            color: #0C0F14;
            border: none;
            border-radius: 9px;
            padding: 9px 22px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.88rem;
            cursor: pointer;
            white-space: nowrap;
            transition: background 0.15s, transform 0.1s;
            flex-shrink: 0;
        }
        button[type="submit"]:hover  { background: #00fdb3; }
        button[type="submit"]:active { transform: scale(0.97); }

        /* ── LAYOUT: sidebar + main ── */
        .layout {
            position: relative; z-index: 10;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        /* ── RESULTS ── */
        .results-header {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            padding: 2rem 0 1.25rem;
            border-top: 1px solid var(--border);
        }
        .results-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
        }
        .results-count { font-size: 0.8rem; color: var(--muted); }

        /* ── GRID ── */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 14px;
        }

        /* ── PRODUCT CARD ── */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            transition: transform 0.2s, border-color 0.2s, box-shadow 0.2s;
            animation: fadeUp 0.35s ease both;
            position: relative;
        }
        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(0,229,160,0.25);
            box-shadow: 0 10px 36px rgba(0,0,0,0.4);
        }
        .card.in-cart {
            border-color: rgba(0,229,160,0.4);
        }

        .card-in-cart-badge {
            position: absolute;
            top: 10px; right: 10px;
            background: var(--accent);
            color: #0C0F14;
            font-size: 0.65rem;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 100px;
            display: none;
            z-index: 5;
        }
        .card.in-cart .card-in-cart-badge { display: block; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .card:nth-child(1){animation-delay:.04s} .card:nth-child(2){animation-delay:.08s}
        .card:nth-child(3){animation-delay:.12s} .card:nth-child(4){animation-delay:.16s}
        .card:nth-child(5){animation-delay:.20s} .card:nth-child(6){animation-delay:.24s}

        .card-img {
            width: 100%; aspect-ratio: 1/1;
            object-fit: contain;
            background: #0e1117;
            padding: 1rem;
            transition: transform 0.3s;
        }
        .card:hover .card-img { transform: scale(1.05); }

        .card-img-placeholder {
            width: 100%; aspect-ratio: 1/1;
            background: #0e1117;
            display: flex; align-items: center; justify-content: center;
            color: #2a2f3a;
        }
        .card-img-placeholder svg { width: 36px; height: 36px; }

        .card-body {
            padding: 0.85rem 1rem 0.9rem;
            display: flex; flex-direction: column; gap: 5px;
            flex: 1;
        }
        .card-dept {
            font-size: 0.68rem; font-weight: 500;
            text-transform: uppercase; letter-spacing: 0.07em;
            color: var(--muted);
        }
        .card-name {
            font-family: 'Syne', sans-serif;
            font-weight: 600; font-size: 0.88rem;
            line-height: 1.3; color: var(--text); flex: 1;
        }
        .card-brand { font-size: 0.75rem; color: var(--muted); font-weight: 300; }

        .card-footer {
            padding: 0.75rem 1rem;
            border-top: 1px solid var(--border);
            display: flex; align-items: flex-end;
            justify-content: space-between; gap: 6px;
        }
        .price-original {
            font-size: 0.72rem; color: var(--muted);
            text-decoration: line-through; line-height: 1; margin-bottom: 2px;
        }
        .price-final {
            font-family: 'Syne', sans-serif;
            font-weight: 700; font-size: 1.05rem;
            color: var(--accent); line-height: 1;
        }
        .discount-badge {
            background: rgba(255,107,53,0.15); color: var(--accent2);
            font-size: 0.68rem; font-weight: 600;
            padding: 2px 7px; border-radius: 5px;
            white-space: nowrap; flex-shrink: 0; align-self: flex-end;
        }
        .stock-ok {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 0.68rem; color: var(--accent); font-weight: 400;
        }
        .stock-out {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 0.68rem; color: #e24b4a; font-weight: 400;
        }
        .stock-dot {
            width: 5px; height: 5px;
            border-radius: 50%; background: currentColor; flex-shrink: 0;
        }

        /* ── ADD TO CART OVERLAY ── */
        .card-add {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 14px;
            opacity: 0;
            transition: opacity 0.2s;
            pointer-events: none;
        }
        .card:hover .card-add { opacity: 1; pointer-events: auto; }

        .btn-add {
            background: var(--accent);
            color: #0C0F14;
            border: none;
            border-radius: 10px;
            padding: 9px 20px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.82rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.5);
            transition: background 0.15s, transform 0.1s;
            pointer-events: auto;
        }
        .btn-add:hover  { background: #00fdb3; }
        .btn-add:active { transform: scale(0.95); }
        .btn-add svg { width: 15px; height: 15px; }

        /* ── EMPTY STATE ── */
        .state-empty {
            text-align: center; padding: 4rem 2rem; color: var(--muted);
        }
        .state-empty svg {
            width: 44px; height: 44px;
            margin: 0 auto 1rem; opacity: 0.3; display: block;
        }
        .state-empty p { font-size: 0.88rem; }

        /* ─────────────────────────────
           CART DRAWER
        ───────────────────────────── */
        .cart-overlay {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.6);
            z-index: 200;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s;
        }
        .cart-overlay.open { opacity: 1; pointer-events: auto; }

        .cart-drawer {
            position: fixed;
            top: 0; right: 0; bottom: 0;
            width: min(420px, 100vw);
            background: var(--surface);
            border-left: 1px solid var(--border);
            z-index: 201;
            display: flex;
            flex-direction: column;
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        .cart-drawer.open { transform: translateX(0); }

        .drawer-head {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }
        .drawer-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700; font-size: 1.05rem;
            display: flex; align-items: center; gap: 10px;
        }
        .drawer-qty-pill {
            background: var(--badge-bg);
            color: var(--badge-tx);
            font-size: 0.72rem; font-weight: 600;
            padding: 2px 9px; border-radius: 100px;
        }
        .drawer-close {
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 8px;
            width: 32px; height: 32px;
            display: flex; align-items: center; justify-content: center;
            color: var(--muted);
            cursor: pointer;
            transition: border-color 0.15s, color 0.15s;
        }
        .drawer-close:hover { border-color: rgba(255,255,255,0.2); color: var(--text); }
        .drawer-close svg { width: 15px; height: 15px; }

        .drawer-body {
            flex: 1;
            overflow-y: auto;
            padding: 1rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .drawer-body::-webkit-scrollbar { width: 4px; }
        .drawer-body::-webkit-scrollbar-track { background: transparent; }
        .drawer-body::-webkit-scrollbar-thumb { background: var(--border); border-radius: 2px; }

        .cart-empty-state {
            flex: 1;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            color: var(--muted); text-align: center; gap: 10px;
            padding: 3rem 0;
        }
        .cart-empty-state svg { width: 44px; height: 44px; opacity: 0.25; }
        .cart-empty-state p { font-size: 0.85rem; }

        /* Cart item row */
        .cart-item {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 12px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            animation: fadeUp 0.2s ease both;
        }
        .cart-item-img {
            width: 56px; height: 56px;
            object-fit: contain;
            background: #0e1117;
            border-radius: 8px;
            padding: 6px;
            flex-shrink: 0;
        }
        .cart-item-img-ph {
            width: 56px; height: 56px;
            background: #0e1117;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: #2a2f3a; flex-shrink: 0;
        }
        .cart-item-img-ph svg { width: 22px; height: 22px; }

        .cart-item-info { flex: 1; min-width: 0; }
        .cart-item-name {
            font-family: 'Syne', sans-serif;
            font-weight: 600; font-size: 0.82rem;
            line-height: 1.3; color: var(--text);
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .cart-item-brand { font-size: 0.72rem; color: var(--muted); margin-top: 2px; }
        .cart-item-price {
            font-family: 'Syne', sans-serif;
            font-weight: 700; font-size: 0.9rem;
            color: var(--accent); margin-top: 6px;
        }

        /* Qty controls */
        .qty-row {
            display: flex; align-items: center; gap: 8px; margin-top: 8px;
        }
        .qty-btn {
            width: 26px; height: 26px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 7px;
            color: var(--text);
            font-size: 1rem; font-weight: 500;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: border-color 0.15s, background 0.15s;
            flex-shrink: 0;
        }
        .qty-btn:hover { border-color: rgba(0,229,160,0.3); background: #1e2330; }
        .qty-val {
            font-size: 0.88rem; font-weight: 500;
            min-width: 20px; text-align: center;
        }
        .cart-item-remove {
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 7px;
            width: 26px; height: 26px;
            display: flex; align-items: center; justify-content: center;
            color: var(--muted);
            cursor: pointer;
            transition: border-color 0.15s, color 0.15s;
            flex-shrink: 0;
            margin-left: auto;
            align-self: center;
        }
        .cart-item-remove:hover { border-color: rgba(226,75,74,0.4); color: #e24b4a; }
        .cart-item-remove svg { width: 13px; height: 13px; }

        /* Drawer footer */
        .drawer-foot {
            padding: 1.25rem 1.5rem;
            border-top: 1px solid var(--border);
            flex-shrink: 0;
        }
        .summary-row {
            display: flex; justify-content: space-between; align-items: baseline;
            margin-bottom: 6px;
        }
        .summary-label { font-size: 0.8rem; color: var(--muted); }
        .summary-val   { font-size: 0.85rem; color: var(--text); }
        .summary-total-label {
            font-family: 'Syne', sans-serif;
            font-weight: 700; font-size: 0.95rem;
        }
        .summary-total-val {
            font-family: 'Syne', sans-serif;
            font-weight: 700; font-size: 1.2rem; color: var(--accent);
        }
        .divider { border: none; border-top: 1px solid var(--border); margin: 10px 0; }

        .btn-clear {
            width: 100%;
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px;
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem; font-weight: 400;
            cursor: pointer;
            margin-top: 8px;
            transition: border-color 0.15s, color 0.15s;
        }
        .btn-clear:hover { border-color: rgba(226,75,74,0.3); color: #e24b4a; }

        /* ── TOAST ── */
        .toast {
            position: fixed;
            bottom: 24px; left: 50%;
            transform: translateX(-50%) translateY(80px);
            background: var(--card);
            border: 1px solid rgba(0,229,160,0.25);
            border-radius: 12px;
            padding: 10px 18px;
            font-size: 0.85rem;
            color: var(--text);
            display: flex; align-items: center; gap: 8px;
            z-index: 300;
            transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), opacity 0.3s;
            opacity: 0;
            pointer-events: none;
            white-space: nowrap;
        }
        .toast.show { transform: translateX(-50%) translateY(0); opacity: 1; }
        .toast-icon { color: var(--accent); flex-shrink: 0; }
        .toast-icon svg { width: 15px; height: 15px; display: block; }

        /* ── FOOTER ── */
        footer {
            position: relative; z-index: 10;
            text-align: center; padding: 1.4rem;
            color: var(--muted); font-size: 0.75rem;
            border-top: 1px solid var(--border);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 640px) {
            header { padding: 0 1.25rem; }
            .hero  { padding: 3rem 1.25rem 2rem; }
            .layout { padding: 0 1.25rem 3rem; }
            .grid  { grid-template-columns: repeat(2, 1fr); gap: 10px; }
            .cart-drawer { width: 100vw; }
        }
    </style>
</head>
<body>

<!-- HEADER -->
<header>
    <div class="header-inner">
        <a href="?" class="logo">irani<span>.delivery</span><span class="logo-dot"></span></a>
        <button class="cart-btn" onclick="openCart()">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
            </svg>
            <span>Carrinho</span>
            <span class="cart-count" id="cart-count">0</span>
        </button>
    </div>
</header>

<!-- HERO + SEARCH -->
<section class="hero">
    <div class="hero-eyebrow">Catálogo ao vivo</div>
    <h1>Encontre seus<br><em>produtos favoritos</em></h1>
    <p class="hero-sub">Pesquise no estoque completo em tempo real e garanta o melhor preço.</p>

    <div class="search-wrap">
        <form method="GET" autocomplete="off">
            <span class="search-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </span>
            <input
                type="text"
                name="busca"
                placeholder="Ex: arroz, leite, chocolate..."
                value="<?= isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : '' ?>"
                autofocus
            >
            <button type="submit">Buscar</button>
        </form>
    </div>
</section>

<?php
if (isset($_GET["busca"]) && trim($_GET["busca"]) !== ''):
    $busca = trim($_GET["busca"]);

    $query = [
        "operationName" => "ProductsSearch",
        "variables" => [
            "storeId"  => "4",
            "search"   => $busca,
            "pageSize" => 100,
            "page"     => 1
        ],
        "query" => '
        query ProductsSearch(
            $storeId: String!,
            $search: String!,
            $pageSize: Int!,
            $page: Int!
        ) {
            ecommerceProducts(
                storeId: $storeId
                search: $search
                pageSize: $pageSize
                page: $page
            ) {
                products {
                    id code modelId name slug image
                    price priceWithDiscount quantityDescription
                    discount initialWeight incrementalWeight
                    brand stock limitSaleCart expirationDate department
                }
            }
        }'
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => "https://fed-gateway.mercafacil.com/graphql",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_HTTPHEADER     => [
            "accept: */*",
            "content-type: application/json",
            "x-custom-origin: irani.delivery",
            "x-request-source: client"
        ],
        CURLOPT_POSTFIELDS => json_encode($query)
    ]);

    $resultado = curl_exec($ch);
    $erro      = curl_error($ch);
    curl_close($ch);

    $produtos = [];
    if (!$erro) {
        $dados    = json_decode($resultado, true);
        $produtos = $dados["data"]["ecommerceProducts"]["products"] ?? [];
    }

    $total = count($produtos);
?>

<div class="layout">
    <div>
        <div class="results-header">
            <span class="results-title">
                <?= $total > 0
                    ? 'Resultados para "' . htmlspecialchars($busca) . '"'
                    : 'Nenhum resultado' ?>
            </span>
            <?php if ($total > 0): ?>
                <span class="results-count"><?= $total ?> produto<?= $total !== 1 ? 's' : '' ?></span>
            <?php endif; ?>
        </div>

        <?php if ($total === 0): ?>
            <div class="state-empty">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
                <p>Nenhum produto para <strong>"<?= htmlspecialchars($busca) ?>"</strong>. Tente outro termo.</p>
            </div>
        <?php else: ?>
            <div class="grid" id="product-grid">
            <?php foreach ($produtos as $p):
                $temDesconto = isset($p['priceWithDiscount']) && $p['priceWithDiscount'] > 0
                               && $p['priceWithDiscount'] < $p['price'];
                $precoFinal  = $temDesconto ? $p['priceWithDiscount'] : $p['price'];
                $emEstoque   = isset($p['stock']) && $p['stock'] > 0;
                $dept        = $p['department'] ?? '';
                $marca       = $p['brand'] ?? '';
                $desconto    = isset($p['discount']) && $p['discount'] > 0 ? $p['discount'] : 0;

                // Serialize product data for JS
                $prodData = json_encode([
                    'id'    => $p['id'] ?? $p['code'],
                    'code'  => $p['code'] ?? '',
                    'name'  => $p['name'],
                    'image' => $p['image'] ?? '',
                    'price' => $precoFinal,
                    'brand' => $marca,
                    'dept'  => $dept,
                ], JSON_HEX_APOS | JSON_HEX_QUOT);
            ?>
                <article
                    class="card"
                    id="card-<?= htmlspecialchars($p['id'] ?? $p['code']) ?>"
                    onclick="addToCart(<?= htmlspecialchars($prodData, ENT_QUOTES) ?>)"
                >
                    <span class="card-in-cart-badge">No carrinho</span>

                    <?php if (!empty($p['image'])): ?>
                        <img class="card-img"
                             src="<?= htmlspecialchars($p['image']) ?>"
                             alt="<?= htmlspecialchars($p['name']) ?>"
                             loading="lazy">
                    <?php else: ?>
                        <div class="card-img-placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="3"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <polyline points="21,15 16,10 5,21"/>
                            </svg>
                        </div>
                    <?php endif; ?>

                    <div class="card-body">
                        <?php if ($dept): ?>
                            <span class="card-dept"><?= htmlspecialchars($dept) ?></span>
                        <?php endif; ?>
                        <h2 class="card-name"><?= htmlspecialchars($p['name']) ?></h2>
                        <?php if ($marca): ?>
                            <span class="card-brand"><?= htmlspecialchars($marca) ?></span>
                        <?php endif; ?>
						<?php if ($p['code']): ?>
                            <span class="card-brand">#<?= htmlspecialchars($p['code']) ?></span>
                        <?php endif; ?>
						
                    </div>

                    <div class="card-footer">
                        <div class="price-block">
                            <?php if ($temDesconto): ?>
                                <div class="price-original">R$ <?= number_format($p['price'], 2, ',', '.') ?></div>
                            <?php endif; ?>
                            <div class="price-final">R$ <?= number_format($precoFinal, 2, ',', '.') ?></div>
                            <?php if ($emEstoque): ?>
                                <span class="stock-ok"><span class="stock-dot"></span>Em estoque</span>
                            <?php else: ?>
                                <span class="stock-out"><span class="stock-dot"></span>Indisponível</span>
                            <?php endif; ?>
                        </div>
                        <?php if ($desconto > 0): ?>
                            <span class="discount-badge">-<?= $desconto ?>%</span>
                        <?php endif; ?>
                    </div>

                    <div class="card-add">
                        <button class="btn-add" onclick="addToCart(<?= htmlspecialchars($prodData, ENT_QUOTES) ?>); event.stopPropagation();">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Adicionar
                        </button>
                    </div>
                </article>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php endif; ?>

<!-- ── CART OVERLAY + DRAWER ── -->
<div class="cart-overlay" id="cart-overlay" onclick="closeCart()"></div>

<aside class="cart-drawer" id="cart-drawer">
    <div class="drawer-head">
        <span class="drawer-title">
            Carrinho
            <span class="drawer-qty-pill" id="drawer-qty">0 itens</span>
        </span>
        <button class="drawer-close" onclick="closeCart()">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    <div class="drawer-body" id="drawer-body">
        <div class="cart-empty-state" id="cart-empty">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
            </svg>
            <p>Seu carrinho está vazio.<br>Pesquise e clique em um produto.</p>
        </div>
    </div>

    <div class="drawer-foot" id="drawer-foot" style="display:none">
        <div class="summary-row">
            <span class="summary-label">Itens</span>
            <span class="summary-val" id="foot-items">—</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Subtotal</span>
            <span class="summary-val" id="foot-sub">—</span>
        </div>
        <hr class="divider">
        <div class="summary-row">
            <span class="summary-total-label">Total</span>
            <span class="summary-total-val" id="foot-total">R$ 0,00</span>
        </div>
        <button class="btn-clear" onclick="clearCart()">Limpar carrinho</button>
    </div>
</aside>

<!-- ── TOAST ── -->
<div class="toast" id="toast">
    <span class="toast-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12"/>
        </svg>
    </span>
    <span id="toast-msg">Produto adicionado!</span>
</div>

<footer>&copy; <?= date('Y') ?> Irani Delivery — Todos os direitos reservados</footer>

<!-- ── CART LOGIC ── -->
<script>
const CART_KEY = 'irani_cart_v1';

function loadCart() {
    try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; }
    catch(e) { return []; }
}

function saveCart(cart) {
    localStorage.setItem(CART_KEY, JSON.stringify(cart));
}

function addToCart(prod) {
    let cart = loadCart();
    const idx = cart.findIndex(i => i.id === prod.id);
    if (idx > -1) {
        cart[idx].qty += 1;
    } else {
        cart.push({ ...prod, qty: 1 });
    }
    saveCart(cart);
    renderCart();
    markCardsInCart();
    showToast(prod.name);
}

function changeQty(id, delta) {
    let cart = loadCart();
    const idx = cart.findIndex(i => i.id === id);
    if (idx < 0) return;
    cart[idx].qty += delta;
    if (cart[idx].qty <= 0) cart.splice(idx, 1);
    saveCart(cart);
    renderCart();
    markCardsInCart();
}

function removeItem(id) {
    let cart = loadCart().filter(i => i.id !== id);
    saveCart(cart);
    renderCart();
    markCardsInCart();
}

function clearCart() {
    saveCart([]);
    renderCart();
    markCardsInCart();
}

function fmtBRL(val) {
    return 'R$ ' + Number(val).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function renderCart() {
    const cart   = loadCart();
    const total  = cart.reduce((s, i) => s + i.price * i.qty, 0);
    const qtdTotal = cart.reduce((s, i) => s + i.qty, 0);

    // Header badge
    const countEl = document.getElementById('cart-count');
    if (countEl) {
        countEl.textContent = qtdTotal;
        countEl.classList.toggle('visible', qtdTotal > 0);
    }

    // Drawer qty pill
    const qtyPill = document.getElementById('drawer-qty');
    if (qtyPill) qtyPill.textContent = qtdTotal + (qtdTotal === 1 ? ' item' : ' itens');

    const body    = document.getElementById('drawer-body');
    const empty   = document.getElementById('cart-empty');
    const foot    = document.getElementById('drawer-foot');
    if (!body) return;

    if (cart.length === 0) {
        // clear items, show empty msg
        Array.from(body.querySelectorAll('.cart-item')).forEach(el => el.remove());
        if (empty) { empty.style.display = ''; body.appendChild(empty); }
        if (foot) foot.style.display = 'none';
        return;
    }

    if (empty) empty.style.display = 'none';
    if (foot)  foot.style.display  = '';

    // Rebuild items
    Array.from(body.querySelectorAll('.cart-item')).forEach(el => el.remove());

    cart.forEach(item => {
        const div = document.createElement('div');
        div.className = 'cart-item';
        div.id = 'ci-' + item.id;

        const imgHtml = item.image
            ? `<img class="cart-item-img" src="${escHtml(item.image)}" alt="${escHtml(item.name)}">`
            : `<div class="cart-item-img-ph"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="3" y="3" width="18" height="18" rx="3"/>
                <circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21,15 16,10 5,21"/>
               </svg></div>`;

        div.innerHTML = `
            ${imgHtml}
            <div class="cart-item-info">
                <div class="cart-item-name">${escHtml(item.name)}</div>
                ${item.brand ? `<div class="cart-item-brand">${escHtml(item.brand)}</div>` : ''}
                <div class="cart-item-price">${fmtBRL(item.price * item.qty)}</div>
                <div class="qty-row">
                    <button class="qty-btn" onclick="changeQty('${escHtml(item.id)}',-1)">−</button>
                    <span class="qty-val">${item.qty}</span>
                    <button class="qty-btn" onclick="changeQty('${escHtml(item.id)}',1)">+</button>
                </div>
            </div>
            <button class="cart-item-remove" onclick="removeItem('${escHtml(item.id)}')" title="Remover">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"/>
                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                    <path d="M10 11v6M14 11v6"/>
                    <path d="M9 6V4h6v2"/>
                </svg>
            </button>`;
        body.appendChild(div);
    });

    // Footer summary
    const footItems = document.getElementById('foot-items');
    const footSub   = document.getElementById('foot-sub');
    const footTotal = document.getElementById('foot-total');
    if (footItems) footItems.textContent = qtdTotal + (qtdTotal === 1 ? ' item' : ' itens');
    if (footSub)   footSub.textContent   = fmtBRL(total);
    if (footTotal) footTotal.textContent = fmtBRL(total);
}

function markCardsInCart() {
    const cart = loadCart();
    const ids  = new Set(cart.map(i => i.id));
    document.querySelectorAll('.card[id^="card-"]').forEach(card => {
        const cid = card.id.replace('card-', '');
        card.classList.toggle('in-cart', ids.has(cid));
    });
}

function openCart() {
    document.getElementById('cart-overlay').classList.add('open');
    document.getElementById('cart-drawer').classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeCart() {
    document.getElementById('cart-overlay').classList.remove('open');
    document.getElementById('cart-drawer').classList.remove('open');
    document.body.style.overflow = '';
}

let toastTimer;
function showToast(name) {
    const toast = document.getElementById('toast');
    const msg   = document.getElementById('toast-msg');
    if (msg) msg.textContent = (name.length > 30 ? name.slice(0,30)+'…' : name) + ' adicionado!';
    toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => toast.classList.remove('show'), 2500);
}

function escHtml(str) {
    return String(str)
        .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')
        .replace(/"/g,'&quot;').replace(/'/g,'&#039;');
}

// Init on page load
document.addEventListener('DOMContentLoaded', () => {
    renderCart();
    markCardsInCart();
});
</script>
</body>
</html>