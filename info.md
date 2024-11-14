Kod Kontrolleri ve Testler
Projede her bir modül için test dosyaları oluşturduk. Şimdi tüm test dosyalarını çalıştırarak proje işlevselliğini doğruluyoruz. Her bir modül için testleri aşağıdaki gibi tek bir komutla çalıştırabilirsiniz:

bash
Kodu kopyala
php tests/DataFetcherTest.php
php tests/StrategyTest.php
php tests/OrderTest.php
php tests/RiskManagerTest.php
php tests/AnalysisTest.php
php tests/NotificationTest.php
php tests/SocialMediaTest.php
Not: Her bir test dosyasının hata vermediğinden ve beklenen çıktıları ürettiğinden emin olun. Gerekli API anahtarlarının doğru eklendiğini, veritabanı bağlantılarının çalıştığını ve yapılandırmaların doğru yapıldığını kontrol edin.

2. README ve Proje Dökümantasyonu
Projenin README.md dosyasını hazırlayalım. Bu dosya, GitHub’da projenin nasıl çalıştığını ve nasıl kurulması gerektiğini açıklayan ana dökümantasyon dosyası olacak.

README.md İçeriği

markdown
Kodu kopyala
# InvestmentBot - PHP Tabanlı Yatırım Robotu

InvestmentBot, PHP ile geliştirilmiş, otomatik yatırım stratejilerini uygulayan ve yatırım sinyallerini yöneten bir projedir. Proje, Telegram, Twitter, Facebook, Discord gibi sosyal medya platformlarında yatırım sinyalleri paylaşabilir ve strateji sonuçlarını analiz ederek raporlar üretebilir.

## Özellikler

- **Veri Toplama ve İşleme**: Gerçek zamanlı piyasa verilerini alır ve işler.
- **Strateji Yönetimi**: Kullanıcı tarafından tanımlanan veya hazır stratejileri uygular.
- **Sipariş Yönetimi**: Al-sat emirlerini otomatik olarak yürütür.
- **Risk Yönetimi**: Stop-loss, kar-al gibi risk kontrolleri sağlar.
- **Analiz ve Raporlama**: Yatırım performansını analiz eder ve raporlar sunar.
- **Bildirim ve Uyarı Sistemi**: Kullanıcıya e-posta, SMS ve sosyal medya üzerinden bildirim gönderir.
- **Sosyal Medya Entegrasyonları**: Telegram, Twitter, Facebook, Discord platformlarına yatırım sinyalleri gönderir.

## Kurulum

1. **Gereksinimler**
   - PHP 7.4 veya üzeri
   - MySQL veya PostgreSQL
   - cURL ve Composer

2. **Veritabanı Ayarları**
   - `src/models/Database.php` dosyasındaki veritabanı ayarlarını kendi sunucunuza göre güncelleyin.
   - `config.php` dosyasındaki API anahtarlarını ve token değerlerini güncelleyin.

3. **Gerekli Kütüphanelerin Yüklenmesi**
   - Twitter API için `twitteroauth` kütüphanesini yükleyin:
     ```bash
     composer require abraham/twitteroauth
     ```

4. **Veritabanı Tablolarını Oluşturma**
   - Projede kullanılan SQL komutlarını veritabanınızda çalıştırarak gerekli tabloları oluşturun.

5. **Testler**
   - Tüm test dosyalarını çalıştırarak kurulumun doğru yapıldığından emin olun:
     ```bash
     php tests/DataFetcherTest.php
     php tests/StrategyTest.php
     php tests/OrderTest.php
     php tests/RiskManagerTest.php
     php tests/AnalysisTest.php
     php tests/NotificationTest.php
     php tests/SocialMediaTest.php
     ```

## Kullanım

- Kullanıcı, projenin ana sayfasında strateji seçip uygulamaya alabilir.
- **Sosyal Medya Bildirimleri**: Kullanıcıya yatırım sinyalleri Telegram, Twitter, Facebook veya Discord üzerinden ulaşır.
- **Risk Yönetimi**: Stop-loss veya kar-al seviyelerine ulaşıldığında otomatik olarak işlem yapılır ve kullanıcıya uyarı gönderilir.

## Katkıda Bulunma
