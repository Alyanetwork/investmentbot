-- portfolios tablosu
CREATE TABLE portfolios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    symbol VARCHAR(10) NOT NULL,
    amount DECIMAL(18, 8) NOT NULL,
    allocation_percent FLOAT NOT NULL, -- Portföydeki varlığın yüzdelik dağılımı
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- risk_settings tablosu
CREATE TABLE risk_settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    max_daily_loss FLOAT DEFAULT NULL, -- Günlük maksimum kayıp limiti
    stop_loss_percent FLOAT DEFAULT 10, -- Stop-loss seviyesi (% olarak)
    take_profit_percent FLOAT DEFAULT 10, -- Kar-al seviyesi (% olarak)
    volatility_control ENUM('on', 'off') DEFAULT 'off', -- Volatilite kontrol durumu
    FOREIGN KEY (user_id) REFERENCES users(id)
);
