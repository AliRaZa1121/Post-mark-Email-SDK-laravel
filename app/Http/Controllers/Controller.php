<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\EmailTrait;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, EmailTrait;


    public function sendMail()
    {
        $to = "info@mail.com";
        $subject = "Test Subject";
        $data['name'] = "USER NAME";
        $data['buttons'] = [
            ['link' => url(), 'text' => 'TEST BUTTON']
        ];
        $data['body'] = 'Test Body.';
        $html = view('mail', $data)->render();
        $check = $this->sendMailViaPostMark($html, $to, $subject);
    }
}
