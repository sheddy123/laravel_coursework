<?php

namespace App\Services;


use App\Mail\CommentsMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendEmailService
{
    
    public function sendEmail($_toName, $_fromName, $_comment_body, $_toEmail){
        //Send Email
        Mail::to($_toEmail)->send(new CommentsMailable($_toName, $_fromName, $_comment_body));

        return "Email sent successfully";
    }
}