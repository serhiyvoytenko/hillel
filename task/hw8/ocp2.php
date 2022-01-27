<?php

interface Delivers
{
    public function deliver(string $format): void;
}

interface Formats
{
    public function format(string $string): string;
}

class ByEmail implements Delivers
{
    public function deliver(string $format): void
    {
        echo "Вывод формата ({$format}) по имейл <br>";
    }
}

class BySms implements Delivers
{
    public function deliver(string $format): void
    {
        echo "Вывод формата ({$format}) в смс <br>";
    }
}

class ToConsole implements Delivers
{
    public function deliver(string $format): void
    {
        echo "Вывод формата ({$format}) в консоль <br>";
    }
}

class Raw implements Formats
{
    public function format(string $string): string
    {
        return $string;
    }
}

class WithDate implements Formats
{
    public function format(string $string): string
    {
        return date('Y-m-d H:i:s ') . $string;
    }
}

class WithDateAndDetails implements Formats
{
    public function format(string $string): string
    {
        return date('Y-m-d H:i:s ') . $string . ' - With some details';
    }
}

class Logger
{
    private Formats $format;
    private Delivers $delivery;

    public function __construct(Formats $format, Delivers $delivery)
    {
        $this->format = $format;
        $this->delivery = $delivery;
    }

    public function log(string $string): void
    {
        $this->delivery->deliver($this->format->format($string));
    }
}


$logger = new Logger(new WithDateAndDetails(), new BySms());
$logger1 = new Logger(new WithDate(), new ToConsole());
$logger2 = new Logger(new Raw(), new ByEmail());

$logger->log('Emergency error! Please fix me!');
$logger1->log('Error to console');
$logger2->log('Error to email');