<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Page\Models\Page;
use Botble\Slug\Models\Slug;
use Faker\Factory;
use Html;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use MetaBox;
use SlugHelper;

class PageSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $data = [
            'en_US' => [
                [
                    'name'     => 'Homepage',
                    'content' => Html::tag('div', '[simple-slider key="home-slider"][/simple-slider]') .
                        Html::tag('div',
                            '[featured-product-categories title="Top Categories" subtitle="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius."][/featured-product-categories]') .
                        Html::tag('div', '[flash-sale title="Best deals for you"][/flash-sale]') .
                        Html::tag('div',
                            '[product-collections title="Exclusive Products"][/product-collections]') .
                        Html::tag('div',
                            '[theme-ads key_1="IZ6WU8KUALYD" key_2="ILSFJVYFGCPZ" key_3="ZDOZUZZIU7FT"][/theme-ads]') .
                        Html::tag('div',
                            '[trending-products title="Trending Products"][[/trending-products]') .
                        Html::tag('div', '[product-blocks featured_product_title="Featured Products" top_rated_product_title="Top Rated Products" on_sale_product_title="On Sale Products"][/product-blocks]') .
                        Html::tag('div',
                            '[featured-brands title="Our Brands"][/featured-brands]') .
                        Html::tag('div', '[featured-news title="Visit Our Blog" subtitle="Our Blog updated the newest trend of the world regularly"][/featured-news]') .
                        Html::tag('div', '[testimonials title="Our Client Say!"][/testimonials]') .
                        Html::tag('div', '[our-features icon1="flaticon-shipped" title1="Free Delivery" subtitle1="Free shipping on all US order or order above $200" icon2="flaticon-money-back" title2="30 Day Returns Guarantee" subtitle2="Simply return it within 30 days for an exchange" icon3="flaticon-support" title3="27/4 Online Support" subtitle3="Contact us 24 hours a day, 7 days a week"][/our-features]') .
                        Html::tag('div', '[newsletter-form title="Join Our Newsletter Now" subtitle="Register now to get updates on promotions."][/newsletter-form]')
                    ,
                    'template' => 'homepage',
                ],
                [
                    'name'     => 'Contact us',
                    'content'  => Html::tag('p', '[contact-form][/contact-form]'),
                ],
                [
                    'name'     => 'Blog',
                    'content'  => Html::tag('p', '---'),
                    'template' => 'blog-sidebar',
                ],
                [
                    'name'     => 'About us',
                    'content'  => Html::tag('p', $faker->realText(500)),
                ],
                [
                    'name'     => 'FAQ',
                    'content'  => Html::tag('p', $faker->realText(500)),
                ],
                [
                    'name'     => 'Location',
                    'content'  => Html::tag('p', $faker->realText(500)),
                ],
                [
                    'name'     => 'Affiliates',
                    'content'  => Html::tag('p', $faker->realText(500)),
                ],
                [
                    'name'     => 'Brands',
                    'content'  => Html::tag('p', '[all-brands][/all-brands]'),
                ],
                [
                    'name'     => 'Cookie Policy',
                    'content'  => Html::tag('h3', 'EU Cookie Consent') .
                        Html::tag('p', 'To use this website we are using Cookies and collecting some data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.') .
                        Html::tag('h4', 'Essential Data') .
                        Html::tag('p', 'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.') .
                        Html::tag('p', '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.') .
                        Html::tag('p', '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'),
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Trang ch???',
                    'content' => Html::tag('div', '[simple-slider key="slider-trang-chu"][/simple-slider]') .
                        Html::tag('div',
                            '[featured-product-categories title="Danh m???c n???i b???t" subtitle="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius."][/featured-product-categories]') .
                        Html::tag('div', '[flash-sale title="Khuy???n m??i t???t nh???t cho b???n"][/flash-sale]') .
                        Html::tag('div',
                            '[product-collections title="S???n ph???m ?????c quy???n"][/product-collections]') .
                        Html::tag('div',
                            '[theme-ads key_1="IZ6WU8KUALYD" key_2="ILSFJVYFGCPZ" key_3="ZDOZUZZIU7FT"][/theme-ads]') .
                        Html::tag('div',
                            '[trending-products title="S???n ph???m xu h?????ng"][[/trending-products]') .
                        Html::tag('div', '[product-blocks featured_product_title="N???i b???t" top_rated_product_title="X???p h???ng cao nh???t" on_sale_product_title="??ang khuy???n m??i"][/product-blocks]') .
                        Html::tag('div',
                            '[featured-brands title="Th????ng hi???u"][/featured-brands]') .
                        Html::tag('div', '[featured-news title="Tin t???c" subtitle="Blog c???a ch??ng t??i c???p nh???t c??c xu h?????ng m???i nh???t c???a th??? gi???i th?????ng xuy??n"][/featured-news]') .
                        Html::tag('div', '[testimonials title="Nh???n x??t t??? kh??ch h??ng!"][/testimonials]') .
                        Html::tag('div', '[our-features icon1="flaticon-shipped" title1="Mi???n ph?? v???n chuy???n" subtitle1="Giao h??ng mi???n ph?? cho t???t c??? c??c ????n ?????t h??ng t???i Hoa K??? ho???c ????n h??ng tr??n $200" icon2="flaticon-money-back" title2="?????m b???o ho??n tr??? trong 30 ng??y" subtitle2="Ch??? c???n tr??? l???i n?? trong v??ng 30 ng??y ????? ?????i" icon3="flaticon-support" title3="H??? tr??? tr???c tuy???n 27/4" subtitle3="Li??n h??? v???i ch??ng t??i 24 gi??? m???t ng??y, 7 ng??y m???t tu???n"][/our-features]') .
                        Html::tag('div', '[newsletter-form title="Theo d??i b???n tin ngay b??y gi???" subtitle="????ng k?? ngay ????? c???p nh???t c??c ch????ng tr??nh khuy???n m??i."][/newsletter-form]')
                    ,
                    'template' => 'homepage',
                ],
                [
                    'name'     => 'Li??n h???',
                    'content'  => Html::tag('p', '[contact-form][/contact-form]'),
                ],
                [
                    'name'     => 'Tin t???c',
                    'content'  => Html::tag('p', '---'),
                    'template' => 'blog-sidebar',
                ],
                [
                    'name'     => 'V??? ch??ng t??i',
                    'content'  => Html::tag('p', $faker->realText(500)),
                ],
                [
                    'name'     => 'H???i ????p',
                    'content'  => Html::tag('p', $faker->realText(500)),
                ],
                [
                    'name'     => 'V??? tr??',
                    'content'  => Html::tag('p', $faker->realText(500)),
                ],
                [
                    'name'     => 'Chi nh??nh',
                    'content'  => Html::tag('p', $faker->realText(500)),
                ],
                [
                    'name'     => 'Th????ng hi???u',
                    'content'  => Html::tag('p', '[all-brands][/all-brands]'),
                ],
                [
                    'name'     => 'Ch??nh s??ch cookie',
                    'content'  => Html::tag('h3', 'EU Cookie Consent') .
                        Html::tag('p', 'To use this website we are using Cookies and collecting some data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.') .
                        Html::tag('h4', 'Essential Data') .
                        Html::tag('p', 'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.') .
                        Html::tag('p', '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.') .
                        Html::tag('p', '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'),
                ],
            ],
        ];

        Page::truncate();
        Slug::where('reference_type', Page::class)->delete();
        MetaBoxModel::where('reference_type', Page::class)->delete();
        LanguageMeta::where('reference_type', Page::class)->delete();

        foreach ($data as $locale => $pages) {
            foreach ($pages as $index => $item) {
                $item['user_id'] = 1;

                if (!isset($item['template'])) {
                    $item['template'] = 'default';
                }

                $page = Page::create($item);

                Slug::create([
                    'reference_type' => Page::class,
                    'reference_id'   => $page->id,
                    'key'            => Str::slug($page->name),
                    'prefix'         => SlugHelper::getPrefix(Page::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Page::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($page, $locale, $originValue);
            }
        }
    }
}
