<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Penjualan</title>
    <link rel="stylesheet" href="css/histori.css">
</head>
<body>
    <div class="container">
        <h2>📜 Histori Penjualan</h2>
        <div class="filter-container">
            <label for="product-filter">Filter Produk:</label>
            <select id="product-filter" onchange="filterSales()">
                <option value="all">Semua Produk</option>
            </select>
            <label for="date-filter">Filter Tanggal:</label>
            <input type="date" id="date-filter" onchange="filterSales()">
        </div>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody id="sales-history">
              
            </tbody>
        </table>
        <div class="total">Total Penjualan: <span id="total-sales">Rp 0</span></div>
    </div>

    <script>
        const salesData = [
            { date: '2025-03-01', product: 'Kamera Canon EOS R6', quantity: 2, total: 24000000 },
            { date: '2025-03-03', product: 'Sony A7 IV', quantity: 1, total: 28000000 },
            { date: '2025-03-05', product: 'Fujifilm X-T5', quantity: 3, total: 33000000 },
            { date: '2025-03-07', product: 'Nikon Z6 II', quantity: 1, total: 25000000 }
        ];

        function loadSalesHistory() {
            const tableBody = document.getElementById('sales-history');
            const productFilter = document.getElementById('product-filter');
            let totalSales = 0;
            
            tableBody.innerHTML = '';
            const uniqueProducts = new Set();
            
            salesData.forEach(sale => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${sale.date}</td>
                    <td>${sale.product}</td>
                    <td>${sale.quantity}</td>
                    <td>Rp ${sale.total.toLocaleString()}</td>
                `;
                tableBody.appendChild(row);
                totalSales += sale.total;
                uniqueProducts.add(sale.product);
            });
            
            document.getElementById('total-sales').textContent = `Rp ${totalSales.toLocaleString()}`;
            
            productFilter.innerHTML = '<option value="all">Semua Produk</option>';
            uniqueProducts.forEach(product => {
                productFilter.innerHTML += `<option value="${product}">${product}</option>`;
            });
        }

        function filterSales() {
            const productFilter = document.getElementById('product-filter').value;
            const dateFilter = document.getElementById('date-filter').value;
            const tableBody = document.getElementById('sales-history');
            let totalSales = 0;
            
            tableBody.innerHTML = '';
            
            salesData.forEach(sale => {
                if ((productFilter === 'all' || sale.product === productFilter) &&
                    (dateFilter === '' || sale.date === dateFilter)) {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${sale.date}</td>
                        <td>${sale.product}</td>
                        <td>${sale.quantity}</td>
                        <td>Rp ${sale.total.toLocaleString()}</td>
                    `;
                    tableBody.appendChild(row);
                    totalSales += sale.total;
                }
            });
            
            document.getElementById('total-sales').textContent = `Rp ${totalSales.toLocaleString()}`;
        }

        window.onload = loadSalesHistory;
    </script>
</body>
</html>
