<?php


namespace App\Util;


class EmailSender
{
    public function __construct()
    {
        //
    }

    public function sendEmail($emailReceiver, $content): bool
    {
        echo ("Email is send". PHP_EOL);

        return true;
    }
}
