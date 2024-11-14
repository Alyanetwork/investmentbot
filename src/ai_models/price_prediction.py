import numpy as np
import pandas as pd
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import LSTM, Dense
from sklearn.preprocessing import MinMaxScaler

def load_data(file_path, sequence_length=50):
    data = pd.read_csv(file_path)
    data = data['Close'].values.reshape(-1, 1)
    scaler = MinMaxScaler()
    data = scaler.fit_transform(data)
    x, y = [], []

    for i in range(sequence_length, len(data)):
        x.append(data[i-sequence_length:i, 0])
        y.append(data[i, 0])

    return np.array(x), np.array(y), scaler

def build_model():
    model = Sequential()
    model.add(LSTM(units=50, return_sequences=True, input_shape=(50, 1)))
    model.add(LSTM(units=50))
    model.add(Dense(units=1))
    model.compile(optimizer='adam', loss='mean_squared_error')
    return model

def predict_price(file_path):
    x, y, scaler = load_data(file_path)
    model = build_model()
    model.fit(x, y, epochs=10, batch_size=32)

    # Tahmin
    last_sequence = x[-1].reshape((1, 50, 1))
    prediction = model.predict(last_sequence)
    return scaler.inverse_transform(prediction)[0][0]

# Örnek kullanım
predicted_price = predict_price('price_data.csv')
print(f"Tahmin edilen fiyat: {predicted_price}")
