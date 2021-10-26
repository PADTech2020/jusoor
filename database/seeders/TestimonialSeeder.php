<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Slug\Models\Slug;
use Botble\Testimonial\Models\Testimonial;

class TestimonialSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('testimonials');

        $data = [
            'en_US' => [
                [
                    'name'    => 'Adam Williams',
                    'company' => 'CEO Of Microsoft',
                ],
                [
                    'name'    => 'Retha Deowalim',
                    'company' => 'CEO Of Apple',
                ],
                [
                    'name'    => 'Sam J. Wasim',
                    'company' => 'Pio Founder',
                ],
                [
                    'name'    => 'Usan Gulwarm',
                    'company' => 'CEO Of Facewarm',
                ],
            ],
            'vi'    => [
                [
                    'name'    => 'Adam Williams',
                    'company' => 'Giám đốc Microsoft',
                ],
                [
                    'name'    => 'Retha Deowalim',
                    'company' => 'Giám đốc Apple',
                ],
                [
                    'name'    => 'Sam J. Wasim',
                    'company' => 'Nhà sáng lập Pio',
                ],
                [
                    'name'    => 'Usan Gulwarm',
                    'company' => 'Giám đốc Facewarm',
                ],
            ],
        ];

        Testimonial::truncate();
        Slug::where('reference_type', Testimonial::class)->delete();
        MetaBox::where('reference_type', Testimonial::class)->delete();
        LanguageMeta::where('reference_type', Testimonial::class)->delete();

        foreach ($data as $locale => $testimonials) {
            foreach ($testimonials as $index => $item) {
                $item['image'] = 'testimonials/' . ($index + 1) . '.jpg';
                $item['content'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';

                $testimonial = Testimonial::create($item);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => MenuModel::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($testimonial, $locale, $originValue);
            }
        }
    }
}
