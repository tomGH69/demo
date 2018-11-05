<?php


namespace BackBundle\Utils;

use Psr\Log\LoggerInterface;

/**
 * Class Mailer
 * @package BackBundle\Utils
 */
class Mailer
{

    private $mailer;

    private $logger;

    /**
     * Mailer constructor.
     * @param $mailer
     * @param $logger
     */
    public function __construct($mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }


    public function send($from, $to, $subject, $body)
    {
        $message = (new \Swift_Message($subject))
            ->setFrom($from)
            ->setTo($to)
            ->setBody($body);
        if ($this->mailer->send($message) > 0) {
            $this->logger->info("Mail sent");
        } else {
            $this->logger->critical("Mail sent error");
        }


    }

}