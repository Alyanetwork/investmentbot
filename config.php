<?php

return [
    'binance_api_key' => getenv('BINANCE_API_KEY'),
    'binance_api_secret' => getenv('BINANCE_API_SECRET'),
    'coinbase_api_key' => getenv('COINBASE_API_KEY'),
    'coinbase_api_secret' => getenv('COINBASE_API_SECRET'),
    'coinbase_passphrase' => getenv('COINBASE_PASSPHRASE'),
    'kraken_api_key' => getenv('KRAKEN_API_KEY'),
    'kraken_api_secret' => getenv('KRAKEN_API_SECRET'),
    'kucoin_api_key' => getenv('KUCOIN_API_KEY'),
    'kucoin_api_secret' => getenv('KUCOIN_API_SECRET'),
    'kucoin_passphrase' => getenv('KUCOIN_PASSPHRASE'),
    'bitfinex_api_key' => getenv('BITFINEX_API_KEY'),
    'bitfinex_api_secret' => getenv('BITFINEX_API_SECRET'),
    'tradingview_api_url' => getenv('TRADINGVIEW_API_URL')
];
?>

<?php

/**
 * config.php
 * Bu dosya, çeşitli kripto borsalarına erişmek için gerekli olan API anahtarlarını ve diğer yapılandırma bilgilerini içerir.
 * Her bir borsaya özel API anahtarlarınızı ilgili alanlara ekleyin.
 */

return [
    // Binance API ayarları
    'binance_api_key' => 'YOUR_BINANCE_API_KEY',
    'binance_api_secret' => 'YOUR_BINANCE_API_SECRET',

    // Coinbase Pro API ayarları
    'coinbase_api_key' => 'YOUR_COINBASE_PRO_API_KEY',
    'coinbase_api_secret' => 'YOUR_COINBASE_PRO_API_SECRET',
    'coinbase_passphrase' => 'YOUR_COINBASE_PRO_PASSPHRASE',

    // Kraken API ayarları
    'kraken_api_key' => 'YOUR_KRAKEN_API_KEY',
    'kraken_api_secret' => 'YOUR_KRAKEN_API_SECRET',

    // KuCoin API ayarları
    'kucoin_api_key' => 'YOUR_KUCOIN_API_KEY',
    'kucoin_api_secret' => 'YOUR_KUCOIN_API_SECRET',
    'kucoin_passphrase' => 'YOUR_KUCOIN_PASSPHRASE',

    // Bitfinex API ayarları
    'bitfinex_api_key' => 'YOUR_BITFINEX_API_KEY',
    'bitfinex_api_secret' => 'YOUR_BITFINEX_API_SECRET',

    // TradingView veya alternatif veri sağlayıcı için API URL'si
    'tradingview_api_url' => 'YOUR_TRADINGVIEW_OR_ALTERNATIVE_API_URL'
];

?>

<?php
return [
    // Önceden tanımlanmış ayarlar
    'telegram_token' => 'YOUR_TELEGRAM_BOT_TOKEN',
    'twitter_api_key' => 'YOUR_TWITTER_API_KEY',
    'twitter_api_secret_key' => 'YOUR_TWITTER_API_SECRET',
    'facebook_access_token' => 'YOUR_FACEBOOK_ACCESS_TOKEN',
    'discord_webhook_url' => 'YOUR_DISCORD_WEBHOOK_URL'
];
?>
