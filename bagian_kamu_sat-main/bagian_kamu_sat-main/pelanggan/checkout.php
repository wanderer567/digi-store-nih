<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/checkout.css">
    <style>
        .payment-details {
            display: none;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <form>
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" required>

            <label for="product">Barang</label>
            <input type="text" id="product" name="product" required>
            
            <label for="address">Alamat</label>
            <input type="text" id="address" name="address" required>

            <label for="voucher">Kode Voucher Diskon</label>
            <input type="text" id="voucher" name="voucher">
            
            <label for="payment">Metode Pembayaran</label>
            <select id="payment" name="payment" onchange="showPaymentDetails()">
                <option value="">Pilih Metode Pembayaran</option>
                <option value="credit_card">Kartu Kredit</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="ewallet">E-Wallet</option>
                <option value="cod">COD</option>
            </select>
            
            <div id="payment-details" class="payment-details">
                <p id="payment-info"></p>
                <p id="payment-price"></p>
            </div>
            
            <button type="submit" class="checkout-btn">Bayar Sekarang</button>
            
        </form>
        
    </div>
    <a href="keranjang.php" class="back-button">Back</a>
    <script>
        function showPaymentDetails() {
            var paymentMethod = document.getElementById("payment").value;
            var detailsContainer = document.getElementById("payment-details");
            var paymentInfo = document.getElementById("payment-info");
            var paymentPrice = document.getElementById("payment-price");

            let totalPrice = 500000; // Contoh harga total
            let fee = 0;

            if (paymentMethod === "credit_card") {
                paymentInfo.textContent = "Silakan masukkan detail kartu kredit Anda di halaman berikutnya.";
                fee = 0.02 * totalPrice; // Biaya 2%
            } else if (paymentMethod === "bank_transfer") {
                paymentInfo.textContent = "Silakan transfer ke rekening yang akan kami kirimkan melalui email.";
                fee = 5000; // Biaya tetap
            } else if (paymentMethod === "ewallet") {
                paymentInfo.textContent = "Pilih e-wallet Anda dan lakukan pembayaran melalui aplikasi terkait.";
                fee = 3000; // Biaya tetap
            } else if (paymentMethod === "cod") {
                paymentInfo.textContent = "Anda akan membayar langsung kepada kurir saat barang diterima.";
                fee = 10000; // Biaya COD
            } else {
                detailsContainer.style.display = "none";
                return;
            }

            let finalPrice = totalPrice + fee;
            paymentPrice.textContent = `Total yang harus dibayar: Rp ${finalPrice.toLocaleString("id-ID")}`;

            detailsContainer.style.display = "block";
        }
    </script>
</body>
</html>
