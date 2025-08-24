<?php

use App\Models\GeneralSettings;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (!function_exists('blogInfo')) {
    function blogInfo()
    {
        return GeneralSettings::find(1);
    }
}

/**
 * Data formadata em: Janeiro 12, 2025
 */
if (!function_exists('date_formatter')) {
    function date_formatter($date)
    {
        Carbon::setLocale('pt_BR');
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->isoFormat('LL');
    }
}

/**
 * Remover Tags HTML de uma determinada string e truncar para limitar o comprimento da str
 */
if (!function_exists('words')) {
    function words($value, $words = 15, $end = "...")
    {
        return Str::words(strip_tags($value), $words, $end);
    }
}

/**
 * Função auxiliar para verificar se o usuario tem internet
 */
if (!function_exists('isOnline')) {
    function isOnline($site = "https://youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Função auxiliar para contar a duração da leitura da postagem.
 */
if (!function_exists('readDuration')) {
    function readDuration(...$text)
    {
        Str::macro('timeCounter', function ($text) {
            $totalWords = str_word_count(implode(" ", $text));
            $minutesToRead = round($totalWords / 200);
            return (int)max(1, $minutesToRead);
        });
        return Str::timeCounter($text);
    }
}

/**
 * Função que retornará os detalhes dos post mais recentes
 */
if (!function_exists('single_latest_post')) {
    function single_latest_post()
    {
        return Post::with('author')
            ->with('subcategory')
            ->limit(1)
            ->orderBy('created_at', 'desc')
            ->first();
    }
}

/**
 * Função que retornará os detalhes dos 6 post mais recentes
 */
if (!function_exists('latest_home_6post')) {
    function latest_home_6post()
    {
        return Post::with('author')
            ->with('subcategory')
            ->skip(1)
            ->limit(6)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}

/**
 * Função que retornará os posts recomendados
 */
if (!function_exists('recommended_posts')) {
    function recommended_posts()
    {
        return Post::with('author')
            ->with('subcategory')
            ->limit(4)
            ->inRandomOrder()
            ->get();
    }
}

/**
 * Função que retornará as categorias
 */
if (!function_exists('categories')) {
    function categories()
    {
        return SubCategory::whereHas('posts')
            ->with('posts')
            ->orderBy('subcategory_name', 'desc')
            ->get();
    }
}

/**
 *
 */
if (!function_exists('latest_sidebar_posts')) {
    function latest_sidebar_posts($exept = null, $limit = 4)
    {
        return Post::where('id', '!=', $exept)
            ->limit($limit)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}

/**
 * Função auxiliar que encaminha email usando a lib php mailer
 * => sendMail($mailConfig);
 */
if (!function_exists('sendMail')) {
    function sendMail($mailConfig)
    {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = config('mail.mailers.smtp.host');
        $mail->SMTPAuth = true;
        $mail->Username   = config('mail.mailers.smtp.username');
        $mail->Password   = config('mail.mailers.smtp.password');
        $mail->SMTPSecure = config('mail.mailers.smtp.encryption');
        $mail->Port       = config('mail.mailers.smtp.port');
        $mail->setFrom($mailConfig['mail_from_email'], $mailConfig['mail_from_name']);
        $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);
        $mail->isHTML(true);
        $mail->Subject = $mailConfig['mail_subject'];
        $mail->Body = $mailConfig['mail_body'];
        $mail->CharSet = 'UTF-8';

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Todas as tags
 */
if (!function_exists('all_tags')) {
    function all_tags()
    {
        return Post::where('post_tags', '!=', null)->distinct()->pluck('post_tags')->join(',');
    }
}
