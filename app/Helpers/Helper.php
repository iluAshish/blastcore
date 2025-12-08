<?php


use Illuminate\Support\Facades\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\SiteInformation;

function mailConf($subject)
{
    require base_path("vendor/autoload.php");
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = config('mail.encryption');
    $mail->Host = config('mail.host');
    $mail->Port = config('mail.port');
    $mail->Username = config('mail.username');
    $mail->Password = config('mail.password');
    $mail->CharSet = 'utf-8';
    $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
    $mail->Subject = $subject;
    $mail->IsHTML(true);
    return $mail;
}

if (!function_exists('SendContactMail')) {

    function SendContactMail($contact)
    {
        $siteInfo = SiteInformation::first();
        $subject = config('app.name') . ' - Contact Enquiry';
        $mail = mailConf($subject);
        $searchArr = ["{name}", "{email_id}", "{phone}", "{message}", "{site_name}"];
        $replaceArr = [$contact->name, $contact->email, $contact->phone, $contact->message, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_template/contact_enquiry.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($siteInfo->email, $siteInfo->email_name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('SendContactReply')) {

    function SendContactReply($enquiry)
    {
        $subject = config('app.name') . ' - Contact Enquiry Reply';
        $mail = mailConf($subject);
        $searchArr = ["{name}", "{message}", "{reply}", "{site_name}"];
        $replaceArr = [$enquiry->name, $enquiry->message, $enquiry->reply, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_template/contact_enquiry_reply.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($enquiry->email, $enquiry->name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('SendProductEnquiryMail')) {

    function SendProductEnquiryMail($contact)
    {
        $siteInfo = SiteInformation::first();
        $subject = config('app.name') . ' - Product Enquiry';
        $mail = mailConf($subject);
        $searchArr = ["{name}", "{product}", "{email_id}", "{phone}", "{message}", "{site_name}"];
        $replaceArr = [$contact->name, $contact->product->title, $contact->email, $contact->phone, $contact->message, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_template/product_enquiry.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($siteInfo->email, $siteInfo->email_name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('sendProductEnquiryReply')) {

    function sendProductEnquiryReply($enquiry)
    {
        $subject = config('app.name') . ' - Product Enquiry Reply';
        $mail = mailConf($subject);
        $searchArr = ["{name}", "{product}", "{message}", "{reply}", "{site_name}"];
        $replaceArr = [$enquiry->name, $enquiry->product->title, $enquiry->message, $enquiry->reply, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_template/product_enquiry_reply.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($enquiry->email, $enquiry->name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('SendServiceEnquiryMail')) {

    function SendServiceEnquiryMail($contact)
    {
        $siteInfo = SiteInformation::first();
        $subject = config('app.name') . ' - Service Enquiry';
        $mail = mailConf($subject);
        $searchArr = ["{name}", "{service}", "{email_id}", "{phone}", "{message}", "{site_name}"];
        $replaceArr = [$contact->name, $contact->service->title, $contact->email, $contact->phone, $contact->message, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_template/service_enquiry.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($siteInfo->email, $siteInfo->email_name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('sendServiceEnquiryReply')) {

    function sendServiceEnquiryReply($enquiry)
    {
        $subject = config('app.name') . ' - Service Enquiry Reply';
        $mail = mailConf($subject);
        $searchArr = ["{name}", "{service}", "{message}", "{reply}", "{site_name}"];
        $replaceArr = [$enquiry->name, $enquiry->service->title, $enquiry->message, $enquiry->reply, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_template/service_enquiry_reply.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($enquiry->email, $enquiry->name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('ForgotMail')) {
    function ForgotMail($contact)
    {
        $subject = config('app.name') . ' - Reset Password Notification';
        $link = url('/admin/reset-password/' . $contact->token);
        $mail = mailConf($subject);
        $searchArr = ["{name}", "{link}", "{site_name}"];
        $replaceArr = [$contact->name, $link, config('app.name')];
        $body = file_get_contents(resource_path('views/mail_template/forgot_password.blade.php'));
        $body = str_replace($searchArr, $replaceArr, $body);
        $mail->MsgHTML($body);
        $mail->addAddress($contact->email, $contact->name);
        $mail->send();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('getProductSubMenu')) {
    function getProductSubMenu($menuList)
    {
        $menuData = '';
        foreach ($menuList as $menu) {
            $menuData .= "<li>";
            $menuData .= "<a href=\"" . url('/product-category/' . $menu->short_url) . "\" class=\"dropdown-item\">"
                . $menu->title . "</a>";
            if ($menu->children->isNotEmpty()) {
                $menuData .= "<ul class=\"dropdown-menu\">";
                $menuData .= getProductSubMenu($menu->children);
                $menuData .= "</ul>";
            }
            $menuData .= "</li>";
        }
        return $menuData;
    }
}
