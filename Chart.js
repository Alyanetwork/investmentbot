<!-- Dashboard'da grafikler için -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('transactionChart').getContext('2d');
    var transactionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [...], // Tarih etiketleri
            datasets: [{
                label: 'İşlem Sayısı',
                data: [...], // İşlem verileri
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    });
</script>
