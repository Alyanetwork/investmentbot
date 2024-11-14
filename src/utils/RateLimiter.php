<?php

class RateLimiter
{
    private $interval;
    private $lastRequestTime = [];

    public function __construct($interval)
    {
        $this->interval = $interval; // örn. saniye cinsinden 1 saniye
    }

    public function canProceed($identifier)
    {
        $currentTime = time();
        if (!isset($this->lastRequestTime[$identifier]) || 
            ($currentTime - $this->lastRequestTime[$identifier]) >= $this->interval) {
            $this->lastRequestTime[$identifier] = $currentTime;
            return true;
        }
        return false;
    }
}
?>
