<?php

class TradingViewChart
{
    public function getChartWithCustomIndicators($symbol, $indicators, $width = 800, $height = 600)
    {
        $indicatorsJs = json_encode($indicators);
        $html = <<<HTML
            <div class="tradingview-widget-container">
                <div id="tradingview_$symbol"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                    new TradingView.widget({
                        "width": $width,
                        "height": $height,
                        "symbol": "$symbol",
                        "interval": "D",
                        "timezone": "Etc/UTC",
                        "theme": "light",
                        "style": "1",
                        "locale": "en",
                        "toolbar_bg": "#f1f3f6",
                        "enable_publishing": false,
                        "allow_symbol_change": true,
                        "studies": $indicatorsJs,
                        "container_id": "tradingview_$symbol"
                    });
                </script>
            </div>
        HTML;

        return $html;
    }
}

// Örnek kullanım
$chart = new TradingViewChart();
echo $chart->getChartWithCustomIndicators("BTCUSD", ["RSI", "MACD"]);
?>
