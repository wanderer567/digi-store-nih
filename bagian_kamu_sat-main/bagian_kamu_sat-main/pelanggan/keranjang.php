<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="css/keranjang.css">
</head>
<body>
    <div class="cart-container">
        <h2>Keranjang Belanja</h2>
        <div id="cart-items">
            <div class="cart-item">
                <img src="https://via.placeholder.com/50" alt="Produk">
                <p>Nama Produk</p>
                <p>Rp 100.000</p>
                <button>Hapus</button>
            </div>
        </div>
        <h3>Total: Rp <span id="total-price">100.000</span></h3>
        <a href="checkout.php" >  <button class="checkout-btn">Checkout</button></a>
        <h3>Tambah Produk</h3>
        <input type="text" id="product-name" placeholder="Nama Produk">
        <input type="text" id="product-price" placeholder="Harga">
        <button class="add-item-btn">Tambah ke Keranjang</button>
        <a href="produk.php" class="back-button">Back</a>
    </div>
</body>
</html>
