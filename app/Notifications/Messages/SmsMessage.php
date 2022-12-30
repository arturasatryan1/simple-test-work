<?php


namespace Notification\Messages;

class SmsMessage
{
    protected array $lines;

    /**
     * SmsMessage constructor.
     * @param array $lines
     */
    public function __construct($lines = [])
    {
        $this->lines = $lines;
    }

    public function line($line = ''): self
    {
        $this->lines[] = $line;

        return $this;
    }
}
