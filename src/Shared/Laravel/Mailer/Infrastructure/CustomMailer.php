<?php

namespace Src\Shared\Laravel\Mailer\Infrastructure;

use Illuminate\Support\Facades\Mail;
use Src\Shared\Laravel\Mailer\Domain\CustomBaseEmail;

class CustomMailer
{
    public static function create(CustomBaseEmail $emailEntity)
    {
        Mail::mailer('mailtrap')->to($emailEntity->destinatario)
            ->send($emailEntity);
    }

    public static function async(CustomBaseEmail $emailEntity)
    {
        Mail::mailer('mailtrap')->to($emailEntity->destinatario)
            ->queue($emailEntity);
    }
}
