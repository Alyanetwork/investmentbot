-- orders tablosu
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    symbol VARCHAR(10) NOT NULL,
    order_type ENUM('buy', 'sell') NOT NULL,
    price DECIMAL(18, 8) DEFAULT NULL,
    quantity DECIMAL(18, 8) NOT NULL,
    status ENUM('pending', 'completed', 'canceled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
