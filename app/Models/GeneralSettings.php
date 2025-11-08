<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_name',
        'blog_email',
        'blog_description',
        'blog_logo',
        'blog_logo_dark',
        'blog_favicon',
    ];

    // Caminho do logo principal
    public function getBlogLogoAttribute($value)
    {
        return $value ? asset('backend/dist/img/logo-favicon/' . $value) : null;
    }

    // Caminho do logo escuro
    public function getBlogLogoDarkAttribute($value)
    {
        return $value ? asset('backend/dist/img/logo-favicon/' . $value) : $this->blog_logo;
    }

    // Caminho do favicon
    public function getBlogFaviconAttribute($value)
    {
        return $value ? asset('backend/dist/img/logo-favicon/' . $value) : null;
    }
}
