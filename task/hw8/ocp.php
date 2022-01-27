<?php

interface Loggers
{
    public function log(string $string): void;
}

class Logger implements Loggers
{

    private string $format;
    private string $delivery;

    public function __construct($format, $delivery)
    {
        $this->format = $format;
        $this->delivery = $delivery;
    }

    public function log(string $string): void
    {
        $this->deliver($this->format($string));
    }

    private function format(string $string): string
    {
        switch ($this->format) {
            case 'raw' :
                {
                    return $string;
                }
                break;
            case 'with_date':
                {
                    return date('Y-m-d H:i:s') . $string;
                }
                break;
            case 'with_date_and_details':
                {
                    return date('Y-m-d H:i:s') . $string . ' - With some details';
                }
                break;
            default:
            {
                die('Error format');
            }
        }
    }

    private function deliver(string $format): void
    {
        switch ($this->delivery) {
            case 'by_email' :
                {
                    echo "Вывод формата ({$format}) по имейл";
                }
                break;
            case 'by_sms':
                {
                    echo "Вывод формата ({$format}) в смс";
                }
                break;
            case 'to_console':
                {
                    echo "Вывод формата ({$format}) в консоль";
                }
                break;
            default:
            {
                die('Error deliver');
            }
        }
    }

}

class SendLog
{
    public function send(Loggers $loggers, string $text): void
    {
        $loggers->log($text);
    }
}

$logger = new Logger('raw', 'by_sms');
//$logger->log('Emergency error! Please fix me!');
$sendLog = new SendLog();
$sendLog->send($logger, 'Emergency error! Please fix me!');