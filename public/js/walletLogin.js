async function connectWallet() {
    if (window.ethereum) {
        const web3 = new Web3(window.ethereum);
        try {
            // Kullanıcıdan cüzdanı bağlaması için izin iste
            await window.ethereum.request({ method: 'eth_requestAccounts' });
            const accounts = await web3.eth.getAccounts();
            const account = accounts[0];

            // Kullanıcıdan mesajı imzalamasını iste
            const message = "Giriş işlemi için bu mesajı imzalayın.";
            const signature = await web3.eth.personal.sign(message, account);

            // Giriş doğrulaması için sunucuya imza ve adres gönder
            verifySignature(account, signature);
        } catch (error) {
            console.error("Cüzdan bağlanırken hata oluştu:", error);
        }
    } else {
        alert("Lütfen Web3 uyumlu bir cüzdan kullanın (MetaMask, Trust Wallet, vb.).");
    }
}

async function verifySignature(account, signature) {
    // Sunucuya gönderim örneği (fetch veya AJAX ile)
    const response = await fetch('/verify-wallet-login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ account, signature })
    });

    const data = await response.json();
    if (data.success) {
        alert("Giriş başarılı!");
    } else {
        alert("Giriş doğrulaması başarısız.");
    }
}
