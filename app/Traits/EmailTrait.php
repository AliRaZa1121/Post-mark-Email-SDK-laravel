<?php

namespace App\Traits;

use Postmark\PostmarkClient;

trait EmailTrait
{
    public function sendMailViaPostMark($Maildata, $to, $subject)
    {
        try {
            $client = new PostmarkClient(env("API_KEY_POSTMARK"));
            $client->sendEmail(
                env('MAIL_FROM_ADDRESS'),
                $to,
                $subject,
                $Maildata
            );
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
