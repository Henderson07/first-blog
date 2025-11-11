<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralSettings;

class GeneralSettingsSeeder extends Seeder
{
    public function run()
    {
        GeneralSettings::firstOrCreate(
            ['blog_name' => 'Meu Blog'],
            [
                'blog_email' => 'contato@meublog.com',
                'blog_description' => 'Descrição do meu blog',
                'blog_logo' => 'logo.png',
                'blog_logo_dark' => 'logo-dark.png',
                'blog_favicon' => 'favicon.ico'
            ]
        );
    }
}
