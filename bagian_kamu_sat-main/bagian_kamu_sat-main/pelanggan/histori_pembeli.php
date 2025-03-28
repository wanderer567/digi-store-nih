<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Pembeli</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.8s ease-out forwards;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .filter-container {
            margin-bottom: 20px;
        }
        select, input {
            padding: 8px;
            margin-right: 10px;
        }
        .total {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .product-img {
            width: 50px;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }
        .product-img:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📜 Histori Pembeli</h2>
        <div class="filter-container">
            <label for="buyer-filter">Filter Pembeli:</label>
            <select id="buyer-filter" onchange="filterBuyers()">
                <option value="all">Semua Pembeli</option>
            </select>
            <label for="date-filter">Filter Tanggal:</label>
            <input type="date" id="date-filter" onchange="filterBuyers()">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>Produk</th>
                    <th>Gambar</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody id="buyer-history">
                <!-- Data akan diisi oleh JavaScript -->
            </tbody>
        </table>
        <div class="total">Total Pembelian: <span id="total-buyers">Rp 0</span></div>
    </div>

    <script>
        const buyerData = [
            { date: '2025-03-01', buyer: 'Andi', product: 'Kamera Canon EOS R6', image: 'https://via.placeholder.com/50', quantity: 1, total: 12000000 },
            { date: '2025-03-02', buyer: 'Budi', product: 'Sony A7 IV', image: 'https://via.placeholder.com/50', quantity: 2, total: 56000000 },
            { date: '2025-03-05', buyer: 'Citra', product: 'Fujifilm X-T5', image: 'https://via.placeholder.com/50', quantity: 1, total: 11000000 },
            { date: '2025-03-07', buyer: 'Dewi', product: 'Nikon Z6 II', image: 'https://via.placeholder.com/50', quantity: 1, total: 25000000 }
        ];

        function loadBuyerHistory() {
            const tableBody = document.getElementById('buyer-history');
            const buyerFilter = document.getElementById('buyer-filter');
            let totalBuyers = 0;
            tableBody.innerHTML = '';
            const uniqueBuyers = new Set();
            
            buyerData.forEach(buy => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${buy.date}</td>
                    <td>${buy.buyer}</td>
                    <td>${buy.product}</td>
                    <td><img src="${buy.image}" class="product-img" alt="${buy.product}"></td>
                    <td>${buy.quantity}</td>
                    <td>Rp ${buy.total.toLocaleString()}</td>
                `;
                tableBody.appendChild(row);
                totalBuyers += buy.total;
                uniqueBuyers.add(buy.buyer);
            });
            
            document.getElementById('total-buyers').textContent = `Rp ${totalBuyers.toLocaleString()}`;
            
            buyerFilter.innerHTML = '<option value="all">Semua Pembeli</option>';
            uniqueBuyers.forEach(buyer => {
                buyerFilter.innerHTML += `<option value="${buyer}">${buyer}</option>`;
            });
        }

        window.onload = loadBuyerHistory;
    </script>
</body>
</html>
