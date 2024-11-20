<?php
/*
class Block {
    public $index;
    public $timestamp;
    public $data;
    public $previousHash;
    public $hash;

    public function __construct($index, $timestamp, $data, $previousHash = '') {
        $this->index = $index;
        $this->timestamp = $timestamp;
        $this->data = $data;
        $this->previousHash = $previousHash;
        $this->hash = $this->calculateHash();
    }

    public function calculateHash() {
        return hash('sha256', $this->index . $this->timestamp . json_encode($this->data) . $this->previousHash);
    }
}

class Blockchain {
    public $chain;
    public function __construct() {
        $this->chain = [$this->createGenesisBlock()];
    }

    public function createGenesisBlock() {
        return new Block(0, date("Y-m-d H:i:s"), "Genesis Block", "0");
    }

    public function getLatestBlock() {
        return $this->chain[count($this->chain) - 1];
    }

    public function addBlock($newBlock) {
        $newBlock->previousHash = $this->getLatestBlock()->hash;
        $newBlock->hash = $newBlock->calculateHash();
        $this->chain[] = $newBlock;
    }

    public function isChainValid() {
        for ($i = 1; $i < count($this->chain); $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock->hash !== $currentBlock->calculateHash()) {
                return false;
            }

            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }
        return true;
    }
}

// Usage
$myBlockchain = new Blockchain();
//$myBlockchain->addBlock(new Block(1, date("Y-m-d H:i:s"), ["amount" => 10]));
//$myBlockchain->addBlock(new Block(2, date("Y-m-d H:i:s"), ["amount" => 20]));

// Output the blockchain
echo json_encode($myBlockchain, JSON_PRETTY_PRINT);
echo "================================<br>";
//echo $myBlockchain;
echo json_encode($myBlockchain); */


function calculateSHAHash($input) {
    return hash('sha256', $input);
}

// Example usage
$inputString = "Hello, world!";
$shaHash = calculateSHAHash($inputString);
echo "SHA256 hash of '$inputString' is: $shaHash";
?>