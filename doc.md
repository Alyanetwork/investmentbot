Proje Kurulum Dökümantasyonu
Bu dökümantasyon, proje kurulumu için gerekli tüm adımları ve konfigürasyonları içerir. Yönetim paneli, kullanıcı kimlik doğrulaması, analiz ve makine öğrenimi entegrasyonu ile birlikte eksiksiz bir kurulum süreci sunar.

Gereksinimler
Projenin çalışması için aşağıdaki yazılımların sunucuda yüklü olması gerekmektedir:

PHP 7.4 veya üzeri
Composer (PHP bağımlılık yöneticisi)
MySQL veya PostgreSQL veritabanı
Node.js ve npm (JavaScript bağımlılıkları için)
Python 3.8+ ve pip (Python bağımlılıkları için)
Kurulum Adımları
1. Laravel Projesini Kurun
Yönetim paneli ve diğer işlevleri içeren Laravel projesini kurmak için Composer kullanın.

bash
Kodu kopyala
composer create-project --prefer-dist laravel/laravel AdminPanel
cd AdminPanel
2. Proje Bağımlılıklarını Yükleyin
Laravel’in proje bağımlılıklarını kurun:

bash
Kodu kopyala
composer install
3. Çevre Dosyasını Ayarlayın
Proje ana dizinindeki .env.example dosyasını .env olarak kopyalayın ve veritabanı bilgilerinizi girin.

bash
Kodu kopyala
cp .env.example .env
.env Dosyası Örneği:

makefile
Kodu kopyala
APP_NAME="Proje Adı"
APP_ENV=local
APP_KEY=base64:GENERATED_KEY
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_adiniz
DB_USERNAME=db_kullanici
DB_PASSWORD=db_sifre
.env dosyasındaki APP_KEY’i oluşturmak için:

bash
Kodu kopyala
php artisan key:generate
4. Veritabanını Hazırlayın
Veritabanını oluşturun ve Laravel migrations çalıştırarak gerekli tabloları oluşturun:

bash
Kodu kopyala
php artisan migrate
5. Kullanıcı Yetkilendirme Ayarları
Laravel’de yönetim paneli ve kullanıcı yetkilendirmesi için aşağıdaki komutları çalıştırarak kimlik doğrulama sistemini etkinleştirin:

bash
Kodu kopyala
php artisan make:auth
Not: Laravel’in yeni sürümlerinde php artisan make:auth komutu bulunmuyorsa, laravel/ui veya laravel/jetstream paketlerini kullanarak kimlik doğrulama işlemlerini etkinleştirin.

6. JavaScript ve CSS Bağımlılıklarını Yükleyin
Proje içindeki ön uç bağımlılıklarını yüklemek için npm komutlarını çalıştırın:

bash
Kodu kopyala
npm install
npm run dev
7. Python Bağımlılıklarını Yükleyin
Makine öğrenimi ve tahmin modelleri için gereken Python bağımlılıklarını kurmak için requirements.txt dosyasını oluşturun ve gerekli paketleri ekleyin:

plaintext
Kodu kopyala
numpy
pandas
tensorflow
scipy
sklearn
Python bağımlılıklarını yükleyin:

bash
Kodu kopyala
pip install -r requirements.txt
8. WebSocket Sunucusu Kurulumu
Gerçek zamanlı bildirimler için WebSocket sunucusu kurmamız gerekiyor. PHP için Ratchet kütüphanesini kullanarak sunucuyu çalıştıracağız.

Ratchet Kurulumu:

bash
Kodu kopyala
composer require cboden/ratchet
Sunucuyu başlatmak için:

bash
Kodu kopyala
php src/server/WebSocketServer.php
Bu komut ile WebSocket sunucusu çalışır durumda olacak ve kullanıcılar gerçek zamanlı bildirim alabilecekler.

9. Yönetim Paneli Kullanıcı Arayüzünü Hazırlayın
AdminController ve admin rotaları oluşturulduktan sonra, Laravel Blade şablonları aracılığıyla yönetim paneli arayüzünü oluşturun.

Ana dizindeki resources/views/admin klasörüne dashboard, users, strategies, notifications ve settings şablonlarını ekleyin. Örneğin:

html
Kodu kopyala
<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
    <h1>Yönetim Paneli</h1>
    <!-- Burada istatistikleri ve kısa bilgileri gösterin -->
@endsection
10. Veri Görselleştirme
Chart.js veya Laravel Charts gibi bir kütüphane kullanarak yönetim panelinde verileri grafiklerle göstermek için:

Chart.js CDN’ini projenize dahil edin:

html
Kodu kopyala
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
Dashboard’da bir canvas elemanı ekleyin ve Chart.js ile verileri gösterin.

11. Güvenlik Ayarları ve İki Aşamalı Doğrulama
Kullanıcı güvenliğini artırmak için Google Authenticator gibi iki aşamalı doğrulama entegrasyonu ekleyebilirsiniz. Laravel için laravel/fortify veya laravel/jetstream paketleri iki aşamalı doğrulama desteği sunar.

Fortify Kurulumu:

bash
Kodu kopyala
composer require laravel/fortify
php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
.env dosyasında FORTIFY ayarlarını yaparak iki aşamalı doğrulamayı etkinleştirin.

12. Makine Öğrenimi Modellerini Entegre Edin
Python’da geliştirdiğiniz price_prediction.py veya portfolio_optimization.py dosyalarını proje dizinine ekleyin. Bu modelleri çalıştırmak için PHP’den shell_exec ile Python dosyasını çalıştırarak tahmin verilerini alın.

Örnek PHP Sınıfı:

php
Kodu kopyala
<?php

class PricePrediction
{
    public static function predictPrice()
    {
        $command = escapeshellcmd('python3 src/ai_models/price_prediction.py');
        $output = shell_exec($command);
        return $output;
    }
}
?>
13. Son Testler ve Güvenlik Kontrolleri
Tüm kurulum adımlarını tamamladıktan sonra, projenin düzgün çalışıp çalışmadığını kontrol etmek için kapsamlı bir test yapın. Veritabanı bağlantıları, kullanıcı oturumu, tahmin modelleri, gerçek zamanlı bildirimler ve yönetim paneli işlevselliğini gözden geçirin.

Güvenlik Adımları:

HTTPS kullanımını zorunlu hale getirin.
.env dosyasının halka açık olmadığından emin olun.
Yönetici erişimini kontrol etmek için yetkilendirme filtrelerini aktif edin.
14. Projeyi Yayınlama
Son olarak, projeyi bir canlı sunucuya veya bulut platformuna (AWS, DigitalOcean, Heroku gibi) yükleyin.

Dosyaları Sunucuya Yükleyin: FTP veya SSH ile tüm proje dosyalarını sunucuya gönderin.
Veritabanı Bağlantılarını Ayarlayın: Sunucu üzerinde veritabanını oluşturup .env dosyasında sunucuya özel veritabanı ayarlarını yapın.
SSL Sertifikası Ekleyin: Güvenli HTTPS bağlantısı sağlamak için SSL sertifikası yükleyin.
Crontab ve Zamanlanmış Görevler: Laravel task scheduling ile belirli işlerin düzenli çalışması için crontab ayarlayın.
