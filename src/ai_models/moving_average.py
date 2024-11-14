import numpy as np
import pandas as pd

def moving_average_forecast(prices, window=5):
    prices_series = pd.Series(prices)
    moving_average = prices_series.rolling(window=window).mean()
    return moving_average.iloc[-1]  # Son tahmin edilen değeri döndürür

# Örnek kullanım
prices = [45000, 45200, 44900, 45300, 45500]
forecast = moving_average_forecast(prices)
print(f"Tahmin edilen fiyat: {forecast}")
