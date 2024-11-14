Proje Dökümantasyonu ve README Güncelleme
README dosyasını tamamlayıcı bilgilerle genişletelim.

markdown
Kodu kopyala
# InvestmentBot

InvestmentBot, çoklu kripto borsalarında işlem yapabilen ve kullanıcıya bildirim gönderen bir yatırım botudur.

## Özellikler
- Çoklu borsa desteği: Binance, Coinbase Pro, Kraken, KuCoin, Bitfinex
- Sosyal medya bildirimleri: Telegram, Twitter, Facebook, Discord
- Risk yönetimi ve strateji uygulama
- TradingView entegrasyonu ile piyasa verisi ve grafikler

## Kurulum

### Gerekli Ortam Değişkenleri
API anahtarlarınızı `.env` dosyasında saklayın ve `source .env` komutu ile etkinleştirin.

### Docker Kullanımı
Projeyi Docker kullanarak çalıştırmak için:
```bash
docker build -t investmentbot .
docker run investmentbot
Testler
Testleri çalıştırmak için:

bash
Kodu kopyala
php tests/IntegrationTest.php
yaml
Kodu kopyala

---

### 6. Yayınlama ve CI/CD

GitHub Actions gibi CI/CD araçları kullanarak her güncellemeden sonra otomatik testleri çalıştırabiliriz. GitHub Actions için `.github/workflows/main.yml` dosyasını ekleyin:

```yaml
name: CI

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v2
    - name: Set up PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: 7.4
    - name: Install Dependencies
      run: composer install
    - name: Run Tests
      run: php tests/IntegrationTest.php
