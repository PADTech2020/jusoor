<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Setting\Models\Setting as SettingModel;
use Theme;

class ThemeOptionSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('general');

        $theme = Theme::getThemeName();
        SettingModel::where('key', 'LIKE', 'theme-' . $theme . '-%')->delete();

        SettingModel::insertOrIgnore([
            [
                'key'   => 'admin_logo',
                'value' => 'general/logo-light.png',
            ],
            [
                'key'   => 'admin_favicon',
                'value' => 'general/favicon.png',
            ],
            [
                'key'   => 'theme',
                'value' => $theme,
            ],
            [
                'key'   => 'theme-' . $theme . '-site_title',
                'value' => 'Shopwise - Laravel Ecommerce system',
            ],
            [
                'key'   => 'theme-' . $theme . '-copyright',
                'value' => '© ' . now()->format('Y') . ' Botble Technologies. All Rights Reserved.',
            ],
            [
                'key'   => 'theme-' . $theme . '-favicon',
                'value' => 'general/favicon.png',
            ],
            [
                'key'   => 'theme-' . $theme . '-logo',
                'value' => 'general/logo.png',
            ],
            [
                'key'   => 'theme-' . $theme . '-logo_footer',
                'value' => 'general/logo-light.png',
            ],
            [
                'key'   => 'theme-' . $theme . '-address',
                'value' => '123 Street, Old Trafford, NewYork, USA',
            ],
            [
                'key'   => 'theme-' . $theme . '-hotline',
                'value' => '123-456-7890',
            ],
            [
                'key'   => 'theme-' . $theme . '-email',
                'value' => 'info@sitename.com',
            ],
            [
                'key'   => 'theme-' . $theme . '-facebook',
                'value' => 'https://facebook.com',
            ],
            [
                'key'   => 'theme-' . $theme . '-twitter',
                'value' => 'https://twitter.com',
            ],
            [
                'key'   => 'theme-' . $theme . '-youtube',
                'value' => 'https://youtube.com',
            ],
            [
                'key'   => 'theme-' . $theme . '-instagram',
                'value' => 'https://instagram.com',
            ],
            [
                'key'   => 'theme-' . $theme . '-payment_methods',
                'value' => json_encode([
                    'general/visa.png',
                    'general/paypal.png',
                    'general/master-card.png',
                    'general/discover.png',
                    'general/american-express.png',
                ]),
            ],
            [
                'key'   => 'theme-' . $theme . '-newsletter_image',
                'value' => 'general/newsletter.jpg',
            ],
            [
                'key'   => 'theme-' . $theme . '-homepage_id',
                'value' => '1',
            ],
            [
                'key'   => 'theme-' . $theme . '-blog_page_id',
                'value' => '3',
            ],
            [
                'key'   => 'theme-' . $theme . '-cookie_consent_message',
                'value' => 'Your experience on this site will be improved by allowing cookies ',
            ],
            [
                'key'   => 'theme-' . $theme . '-cookie_consent_learn_more_url',
                'value' => url('cookie-policy'),
            ],
            [
                'key'   => 'theme-' . $theme . '-cookie_consent_learn_more_text',
                'value' => 'Cookie Policy',
            ],
        ]);

        SettingModel::insertOrIgnore([
            [
                'key'   => 'theme-' . $theme . '-vi-primary_font',
                'value' => 'Roboto Condensed',
            ],
            [
                'key'   => 'theme-' . $theme . '-vi-copyright',
                'value' => '© 2021 Botble Technologies. Tất cả quyền đã được bảo hộ.',
            ],
            [
                'key'   => 'theme-' . $theme . '-vi-cookie_consent_message',
                'value' => 'Trải nghiệm của bạn trên trang web này sẽ được cải thiện bằng cách cho phép cookie ',
            ],
            [
                'key'   => 'theme-' . $theme . '-vi-cookie_consent_learn_more_url',
                'value' => url('cookie-policy'),
            ],
            [
                'key'   => 'theme-' . $theme . '-vi-cookie_consent_learn_more_text',
                'value' => 'Chính sách cookie',
            ],
            [
                'key'   => 'theme-' . $theme . '-vi-homepage_id',
                'value' => '10',
            ],
            [
                'key'   => 'theme-' . $theme . '-vi-blog_page_id',
                'value' => '12',
            ],
        ]);
    }
}
