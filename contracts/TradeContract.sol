// contracts/TradeContract.sol

pragma solidity ^0.8.0;

contract TradeContract {
    address public owner;

    event TradeExecuted(address indexed trader, uint amount, string tradeType);

    constructor() {
        owner = msg.sender;
    }

    function executeTrade(uint amount, string memory tradeType) public {
        require(amount > 0, "Miktar sıfırdan büyük olmalı");
        emit TradeExecuted(msg.sender, amount, tradeType);
    }
}
