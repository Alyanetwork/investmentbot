<?php

class TradingViewChart
{
    public function getChartEmbedHtml($symbol, $width = 800, $height = 600)
    {
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
                        "container_id": "tradingview_$symbol"
                    });
                </script>
            </div>
        HTML;

        return $html;
    }
}
?>
