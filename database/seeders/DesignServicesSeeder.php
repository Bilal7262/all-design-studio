<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;
class DesignServicesSeeder extends Seeder
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'logo_design', 'label' => 'Logo Design'],
            ['name' => 'website_design', 'label' => 'Website Design'],
            ['name' => 'ecommerce_website_design', 'label' => 'Ecommerce Website Design'],
            ['name' => 'real_estate_website_design', 'label' => 'Real Estate Website Design'],
            ['name' => 'healthcare_website_design', 'label' => 'Healthcare Website Design'],
            ['name' => 'landing_page_design', 'label' => 'Landing Page Design'],
            ['name' => 'design_icon', 'label' => 'Design Icon'],
            ['name' => 'dashboard_design', 'label' => 'Dashboard Design'],
            ['name' => 'infographic_design', 'label' => 'Infographic Design'],
            ['name' => 'footer_design', 'label' => 'Footer Design'],
            ['name' => 'website_header_design', 'label' => 'Website Header Design'],
            ['name' => 'ui_ux_design', 'label' => 'UI/UX Design'],
            ['name' => 'ux_design', 'label' => 'UX Design'],
            ['name' => 'ui_design', 'label' => 'UI Design'],
            ['name' => 'mobile_app_design', 'label' => 'Mobile App Design'],
            ['name' => 'ios_app_design', 'label' => 'Ios App Design'],
            ['name' => 'android_app_design', 'label' => 'Android App Design'],
            ['name' => 'business_card_design', 'label' => 'Business Card Design'],
            ['name' => 'birthday_card_design', 'label' => 'Birthday Card Design'],
            ['name' => 'greeting_card_design', 'label' => 'Greeting Card Design'],
            ['name' => 'wedding_invitation_design', 'label' => 'Wedding Invitation Design'],
            ['name' => 'postcard_design', 'label' => 'Postcard Design'],
            ['name' => 'packaging_design', 'label' => 'Packaging Design'],
            ['name' => 'box_design', 'label' => 'Box Design'],
            ['name' => 'label_design', 'label' => 'Label Design'],
            ['name' => 'food_packaging_design', 'label' => 'Food Packaging Design'],
            ['name' => 't_shirt_design', 'label' => 'T Shirt Design'],
            ['name' => 'hoodie_design', 'label' => 'Hoodie Design'],
            ['name' => 'jersey_design', 'label' => 'Jersey Design'],
            ['name' => 'custom_design_polo', 'label' => 'Custom Design Polo'],
            ['name' => 'tote_bag_design', 'label' => 'Tote Bag Design'],
            ['name' => 'cup_design', 'label' => 'Cup Design'],
            ['name' => 'mug_design', 'label' => 'Mug Design'],
            ['name' => 'cap_design', 'label' => 'Cap Design'],
            ['name' => 'flyer_design', 'label' => 'Flyer Design'],
            ['name' => 'poster_design', 'label' => 'Poster Design'],
            ['name' => 'magazine_design', 'label' => 'Magazine Design'],
            ['name' => 'brochure_design', 'label' => 'Brochure Design'],
            ['name' => 'pamphlet_design', 'label' => 'Pamphlet Design'],
            ['name' => 'banner_design', 'label' => 'Banner Design'],
            ['name' => 'sticker_design', 'label' => 'Sticker Design'],
            ['name' => 'envelope_design', 'label' => 'Envelope Design'],
            ['name' => 'magazine_cover_design', 'label' => 'Magazine Cover Design'],
            ['name' => 'ebook_cover_design', 'label' => 'Ebook Cover Design'],
            ['name' => 'book_design', 'label' => 'Book Design'],
            ['name' => 'book_cover_design', 'label' => 'Book Cover Design'],
            ['name' => 'booklet_design', 'label' => 'Booklet Design'],
            ['name' => 'album_cover_design', 'label' => 'Album Cover Design'],
            ['name' => 'letter_design', 'label' => 'Letter Design'],
            ['name' => 'menu_design', 'label' => 'Menu Design'],
            ['name' => 'powerpoint_design', 'label' => 'Powerpoint Design'],
            ['name' => 'timeline_design', 'label' => 'Timeline Design'],
            ['name' => 'resume_design', 'label' => 'Resume Design'],
            ['name' => 'portfolio_design', 'label' => 'Portfolio Design'],
            ['name' => 'billboard_design', 'label' => 'Billboard Design'],
            ['name' => 'artwork_design', 'label' => 'Artwork Design'],
            ['name' => 'design_quotes', 'label' => 'Design Quotes'],
            ['name' => 'graffiti_design', 'label' => 'Graffiti Design'],
            ['name' => 'tattoo_design', 'label' => 'Tattoo Design'],
        ];

        DB::table('design_services')->insert($services);

        // Insert Service Plans
        $servicePlans = [
            // Logo Design
            ['design_service_id' => 1, 'duration_days' => 1, 'price' => 210, 'features' => '1 day + 5 logos + 5 revisions'],
            ['design_service_id' => 1, 'duration_days' => 3, 'price' => 160, 'features' => '3 days + 10 logos + 10 revisions'],
            ['design_service_id' => 1, 'duration_days' => 6, 'price' => 130, 'features' => '6 days + 10 logos + 10 revisions'],
            ['design_service_id' => 1, 'duration_days' => 10, 'price' => 99, 'features' => '10 days + 10 logos + 10 revisions'],

            // Website Design
            ['design_service_id' => 2, 'duration_days' => 30, 'price' => 2299, 'features' => 'Advanced design + 20-30 pages + prototyping + 30 days'],
            ['design_service_id' => 2, 'duration_days' => 20, 'price' => 1799, 'features' => 'Advanced design + 10-20 pages + prototyping + 20 days'],
            ['design_service_id' => 2, 'duration_days' => 30, 'price' => 1199, 'features' => 'Basic design + 20-30 pages + 30 days'],
            ['design_service_id' => 2, 'duration_days' => 20, 'price' => 999, 'features' => 'Basic design + 10-20 pages + 20 days'],

            // Ecommerce Website Design
            ['design_service_id' => 3, 'duration_days' => 30, 'price' => 2299, 'features' => 'Advanced design + 20-30 pages + prototyping + 30 days'],
            ['design_service_id' => 3, 'duration_days' => 20, 'price' => 1799, 'features' => 'Advanced design + 10-20 pages + prototyping + 20 days'],
            ['design_service_id' => 3, 'duration_days' => 30, 'price' => 1199, 'features' => 'Basic design + 20-30 pages + 30 days'],
            ['design_service_id' => 3, 'duration_days' => 20, 'price' => 999, 'features' => 'Basic design + 10-20 pages + 20 days'],

            // Real Estate Website Design
            ['design_service_id' => 4, 'duration_days' => 30, 'price' => 2299, 'features' => 'Advanced design + 20-30 pages + prototyping + 30 days'],
            ['design_service_id' => 4, 'duration_days' => 20, 'price' => 1799, 'features' => 'Advanced design + 10-20 pages + prototyping + 20 days'],
            ['design_service_id' => 4, 'duration_days' => 30, 'price' => 1199, 'features' => 'Basic design + 20-30 pages + 30 days'],
            ['design_service_id' => 4, 'duration_days' => 20, 'price' => 999, 'features' => 'Basic design + 10-20 pages + 20 days'],

            // Healthcare Website Design
            ['design_service_id' => 5, 'duration_days' => 30, 'price' => 2299, 'features' => 'Advanced design + 20-30 pages + prototyping + 30 days'],
            ['design_service_id' => 5, 'duration_days' => 20, 'price' => 1799, 'features' => 'Advanced design + 10-20 pages + prototyping + 20 days'],
            ['design_service_id' => 5, 'duration_days' => 30, 'price' => 1199, 'features' => 'Basic design + 20-30 pages + 30 days'],
            ['design_service_id' => 5, 'duration_days' => 20, 'price' => 999, 'features' => 'Basic design + 10-20 pages + 20 days'],

            // Landing Page Design
            ['design_service_id' => 6, 'duration_days' => 1, 'price' => 110, 'features' => '1 day, 3 revisions'],
            ['design_service_id' => 6, 'duration_days' => 3, 'price' => 99, 'features' => '3 days, 10 revisions'],
            ['design_service_id' => 6, 'duration_days' => 6, 'price' => 79, 'features' => '6 days, 10 revisions'],
            ['design_service_id' => 6, 'duration_days' => 10, 'price' => 59, 'features' => '10 days, 10 revisions'],

            // Design Icon
            ['design_service_id' => 7, 'duration_days' => 1, 'price' => 299, 'features' => '1 day, 10 flat icons, 5 3D icons'],
            ['design_service_id' => 7, 'duration_days' => 3, 'price' => 249, 'features' => '3 days, 15 flat icons, 5 3D icons'],
            ['design_service_id' => 7, 'duration_days' => 6, 'price' => 199, 'features' => '6 days, 20 flat icons, 10 3D icons'],
            ['design_service_id' => 7, 'duration_days' => 10, 'price' => 149, 'features' => '10 days, 25 flat icons, 15 3D icons'],

            // Dashboard Design
            ['design_service_id' => 8, 'duration_days' => 7, 'price' => 699, 'features' => '7 days, advanced design, UI/UX optimization'],
            ['design_service_id' => 8, 'duration_days' => 14, 'price' => 499, 'features' => '14 days, Basic design, UI/UX optimization, prototyping'],
            ['design_service_id' => 8, 'duration_days' => 25, 'price' => 399, 'features' => '25 days, basic design, UI/UX optimization, prototyping'],
            ['design_service_id' => 8, 'duration_days' => 25, 'price' => 299, 'features' => '25 days, advanced design, UI/UX optimization'],

            // Infographic Design
            ['design_service_id' => 9, 'duration_days' => 8, 'price' => 150, 'features' => '8 days + 6 infographics + 6 revisions'],
            ['design_service_id' => 9, 'duration_days' => 6, 'price' => 120, 'features' => '6 days + 3 infographics + 6 revisions'],
            ['design_service_id' => 9, 'duration_days' => 4, 'price' => 80, 'features' => '4 days + 2 infographics + 4 revisions'],
            ['design_service_id' => 9, 'duration_days' => 1, 'price' => 40, 'features' => '1 day + 1 infographic + 2 revisions'],

            // Footer Design
            ['design_service_id' => 10, 'duration_days' => 1, 'price' => 140, 'features' => '1 day, 3 revisions'],
            ['design_service_id' => 10, 'duration_days' => 3, 'price' => 110, 'features' => '3 days, 6 revisions'],
            ['design_service_id' => 10, 'duration_days' => 6, 'price' => 80, 'features' => '6 days, 9 revisions'],
            ['design_service_id' => 10, 'duration_days' => 9, 'price' => 60, 'features' => '9 days, 12 revisions'],

            // Website Header Design
            ['design_service_id' => 11, 'duration_days' => 1, 'price' => 140, 'features' => '1 day, 3 revisions'],
            ['design_service_id' => 11, 'duration_days' => 3, 'price' => 110, 'features' => '3 days, 6 revisions'],
            ['design_service_id' => 11, 'duration_days' => 6, 'price' => 80, 'features' => '6 days, 9 revisions'],
            ['design_service_id' => 11, 'duration_days' => 9, 'price' => 60, 'features' => '9 days, 12 revisions'],

            // UI/UX Design
            ['design_service_id' => 12, 'duration_days' => 30, 'price' => 2299, 'features' => 'Advanced design + 20-30 pages + prototyping + 30 days'],
            ['design_service_id' => 12, 'duration_days' => 20, 'price' => 1799, 'features' => 'Advanced design + 10-20 pages + prototyping + 20 days'],
            ['design_service_id' => 12, 'duration_days' => 30, 'price' => 1199, 'features' => 'Basic design + 20-30 pages + 30 days'],
            ['design_service_id' => 12, 'duration_days' => 20, 'price' => 999, 'features' => 'Basic design + 10-20 pages + 20 days'],

            // UX Design
            ['design_service_id' => 13, 'duration_days' => 30, 'price' => 2299, 'features' => 'Advanced design + 20-30 pages + prototyping + 30 days'],
            ['design_service_id' => 13, 'duration_days' => 20, 'price' => 1799, 'features' => 'Advanced design + 10-20 pages + prototyping + 20 days'],
            ['design_service_id' => 13, 'duration_days' => 30, 'price' => 1199, 'features' => 'Basic design + 20-30 pages + 30 days'],
            ['design_service_id' => 13, 'duration_days' => 20, 'price' => 999, 'features' => 'Basic design + 10-20 pages + 20 days'],

            // UI Design
            ['design_service_id' => 14, 'duration_days' => 30, 'price' => 2299, 'features' => 'Advanced design + 20-30 pages + prototyping + 30 days'],
            ['design_service_id' => 14, 'duration_days' => 20, 'price' => 1799, 'features' => 'Advanced design + 10-20 pages + prototyping + 20 days'],
            ['design_service_id' => 14, 'duration_days' => 30, 'price' => 1199, 'features' => 'Basic design + 20-30 pages + 30 days'],
            ['design_service_id' => 14, 'duration_days' => 20, 'price' => 999, 'features' => 'Basic design + 10-20 pages + 20 days'],

            // Mobile App Design
            ['design_service_id' => 15, 'duration_days' => 30, 'price' => 5000, 'features' => 'Complete app, 1 month'],
            ['design_service_id' => 15, 'duration_days' => 60, 'price' => 3000, 'features' => 'Complete app, 2 months'],
            ['design_service_id' => 15, 'duration_days' => 30, 'price' => 1500, 'features' => 'Basic Layout Design, 1 month'],
            ['design_service_id' => 15, 'duration_days' => 60, 'price' => 1200, 'features' => 'Basic Layout Design, 2 months'],

            // iOS App Design
            ['design_service_id' => 16, 'duration_days' => 30, 'price' => 5000, 'features' => 'Complete app, 1 month'],
            ['design_service_id' => 16, 'duration_days' => 60, 'price' => 3000, 'features' => 'Complete app, 2 months'],
            ['design_service_id' => 16, 'duration_days' => 30, 'price' => 1500, 'features' => 'Basic Layout Design, 1 month'],
            ['design_service_id' => 16, 'duration_days' => 60, 'price' => 1200, 'features' => 'Basic Layout Design, 2 months'],

            // Android App Design
            ['design_service_id' => 17, 'duration_days' => 30, 'price' => 5000, 'features' => 'Complete app, 1 month'],
            ['design_service_id' => 17, 'duration_days' => 60, 'price' => 3000, 'features' => 'Complete app, 2 months'],
            ['design_service_id' => 17, 'duration_days' => 30, 'price' => 1500, 'features' => 'Basic Layout Design, 1 month'],
            ['design_service_id' => 17, 'duration_days' => 60, 'price' => 1200, 'features' => 'Basic Layout Design, 2 months'],

            // Business Card Design
            ['design_service_id' => 18, 'duration_days' => 2, 'price' => 50, 'features' => '3 design variations, 2 days, 3 variations'],
            ['design_service_id' => 18, 'duration_days' => 4, 'price' => 40, 'features' => '3 design variations, 4 days, 3 revisions'],
            ['design_service_id' => 18, 'duration_days' => 4, 'price' => 30, 'features' => '2 design variations, 4 days, 2 revisions'],
            ['design_service_id' => 18, 'duration_days' => 6, 'price' => 25, 'features' => '2 design variations, 6 days, 2 revisions'],

            // Birthday Card Design
            ['design_service_id' => 19, 'duration_days' => 2, 'price' => 50, 'features' => '3 design variations, 2 days, 3 variations'],
            ['design_service_id' => 19, 'duration_days' => 4, 'price' => 40, 'features' => '3 design variations, 4 days, 3 revisions'],
            ['design_service_id' => 19, 'duration_days' => 4, 'price' => 30, 'features' => '2 design variations, 4 days, 2 revisions'],
            ['design_service_id' => 19, 'duration_days' => 6, 'price' => 25, 'features' => '2 design variations, 6 days, 2 revisions'],

            // Greeting Card Design
            ['design_service_id' => 20, 'duration_days' => 2, 'price' => 50, 'features' => '3 design variations, 2 days, 3 variations'],
            ['design_service_id' => 20, 'duration_days' => 4, 'price' => 40, 'features' => '3 design variations, 4 days, 3 revisions'],
            ['design_service_id' => 20, 'duration_days' => 4, 'price' => 30, 'features' => '2 design variations, 4 days, 2 revisions'],
            ['design_service_id' => 20, 'duration_days' => 6, 'price' => 25, 'features' => '2 design variations, 6 days, 2 revisions'],

            // Wedding Invitation Design
            ['design_service_id' => 21, 'duration_days' => 2, 'price' => 80, 'features' => 'Custom design, 2 days, 5 revisions'],
            ['design_service_id' => 21, 'duration_days' => 4, 'price' => 60, 'features' => 'Custom design, 4 days, 3 revisions'],
            ['design_service_id' => 21, 'duration_days' => 6, 'price' => 50, 'features' => 'Custom design, 6 days, 4 revisions'],
            ['design_service_id' => 21, 'duration_days' => 8, 'price' => 40, 'features' => 'Custom design, 8 days, 3 revisions'],

            // Postcard Design
            ['design_service_id' => 22, 'duration_days' => 2, 'price' => 80, 'features' => 'Custom design, 2 days, 5 revisions'],
            ['design_service_id' => 22, 'duration_days' => 4, 'price' => 60, 'features' => 'Custom design, 4 days, 3 revisions'],
            ['design_service_id' => 22, 'duration_days' => 6, 'price' => 50, 'features' => 'Custom design, 6 days, 4 revisions'],
            ['design_service_id' => 22, 'duration_days' => 8, 'price' => 40, 'features' => 'Custom design, 8 days, 3 revisions'],

            // Packaging Design
            ['design_service_id' => 23, 'duration_days' => 4, 'price' => 1200, 'features' => '4 days, custom design, 6 revisions'],
            ['design_service_id' => 23, 'duration_days' => 6, 'price' => 1000, 'features' => '6 days, premium design, 8 revisions'],
            ['design_service_id' => 23, 'duration_days' => 10, 'price' => 800, 'features' => '10 days, premium design, 10 revisions'],
            ['design_service_id' => 23, 'duration_days' => 10, 'price' => 600, 'features' => '10 days, custom design, 5 revisions'],

            // Box Design
            ['design_service_id' => 24, 'duration_days' => 4, 'price' => 1200, 'features' => '4 days, custom design, 6 revisions'],
            ['design_service_id' => 24, 'duration_days' => 6, 'price' => 1000, 'features' => '6 days, premium design, 8 revisions'],
            ['design_service_id' => 24, 'duration_days' => 10, 'price' => 800, 'features' => '10 days, premium design, 10 revisions'],
            ['design_service_id' => 24, 'duration_days' => 10, 'price' => 600, 'features' => '10 days, custom design, 5 revisions'],

            // Label Design
            ['design_service_id' => 25, 'duration_days' => 4, 'price' => 1200, 'features' => '4 days, custom design, 6 revisions'],
            ['design_service_id' => 25, 'duration_days' => 6, 'price' => 1000, 'features' => '6 days, premium design, 8 revisions'],
            ['design_service_id' => 25, 'duration_days' => 10, 'price' => 800, 'features' => '10 days, premium design, 10 revisions'],
            ['design_service_id' => 25, 'duration_days' => 10, 'price' => 600, 'features' => '10 days, custom design, 5 revisions'],

            // Food Packaging Design
            ['design_service_id' => 26, 'duration_days' => 4, 'price' => 1200, 'features' => '4 days, custom design, 6 revisions'],
            ['design_service_id' => 26, 'duration_days' => 6, 'price' => 1000, 'features' => '6 days, premium design, 8 revisions'],
            ['design_service_id' => 26, 'duration_days' => 10, 'price' => 800, 'features' => '10 days, premium design, 10 revisions'],
            ['design_service_id' => 26, 'duration_days' => 10, 'price' => 600, 'features' => '10 days, custom design, 5 revisions'],

            // T-Shirt Design
            ['design_service_id' => 27, 'duration_days' => 5, 'price' => 300, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 27, 'duration_days' => 10, 'price' => 200, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 27, 'duration_days' => 5, 'price' => 150, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 27, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Hoodie Design
            ['design_service_id' => 28, 'duration_days' => 5, 'price' => 300, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 28, 'duration_days' => 10, 'price' => 200, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 28, 'duration_days' => 5, 'price' => 150, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 28, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Jersey Design
            ['design_service_id' => 29, 'duration_days' => 5, 'price' => 300, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 29, 'duration_days' => 10, 'price' => 200, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 29, 'duration_days' => 5, 'price' => 150, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 29, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Custom Design Polo
            ['design_service_id' => 30, 'duration_days' => 5, 'price' => 300, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 30, 'duration_days' => 10, 'price' => 200, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 30, 'duration_days' => 5, 'price' => 150, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 30, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Tote Bag Design
            ['design_service_id' => 31, 'duration_days' => 5, 'price' => 300, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 31, 'duration_days' => 10, 'price' => 200, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 31, 'duration_days' => 5, 'price' => 150, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 31, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Cup Design
            ['design_service_id' => 32, 'duration_days' => 5, 'price' => 300, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 32, 'duration_days' => 10, 'price' => 200, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 32, 'duration_days' => 5, 'price' => 150, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 32, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Mug Design
            ['design_service_id' => 33, 'duration_days' => 5, 'price' => 300, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 33, 'duration_days' => 10, 'price' => 200, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 33, 'duration_days' => 5, 'price' => 150, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 33, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Cap Design
            ['design_service_id' => 34, 'duration_days' => 5, 'price' => 300, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 34, 'duration_days' => 10, 'price' => 200, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 34, 'duration_days' => 5, 'price' => 150, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 34, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Flyer Design
            ['design_service_id' => 35, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 35, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 35, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 35, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Poster Design
            ['design_service_id' => 36, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 36, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 36, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 36, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Magazine Design
            ['design_service_id' => 37, 'duration_days' => 7, 'price' => 500, 'features' => 'Unlimited pages, 7 days, 2 revisions'],
            ['design_service_id' => 37, 'duration_days' => 14, 'price' => 400, 'features' => 'Unlimited pages, 14 days, 2 revisions'],
            ['design_service_id' => 37, 'duration_days' => 30, 'price' => 300, 'features' => 'Upto 50 pages, 30 days, 2 revisions'],
            ['design_service_id' => 37, 'duration_days' => 30, 'price' => 200, 'features' => 'Upto 30 pages, 30 days, 2 revisions'],

            // Brochure Design
            ['design_service_id' => 38, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 38, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 38, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 38, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Pamphlet Design
            ['design_service_id' => 39, 'duration_days' => 7, 'price' => 300, 'features' => 'Unlimited pages, 7 days, 2 revisions'],
            ['design_service_id' => 39, 'duration_days' => 14, 'price' => 250, 'features' => 'Unlimited pages, 14 days, 2 revisions'],
            ['design_service_id' => 39, 'duration_days' => 30, 'price' => 200, 'features' => 'Upto 20 pages, 30 days, 2 revisions'],
            ['design_service_id' => 39, 'duration_days' => 30, 'price' => 150, 'features' => 'Upto 10 pages, 30 days, 2 revisions'],

            // Banner Design
            ['design_service_id' => 40, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 40, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 40, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 40, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Sticker Design
            ['design_service_id' => 41, 'duration_days' => 5, 'price' => 150, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 41, 'duration_days' => 10, 'price' => 120, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 41, 'duration_days' => 5, 'price' => 90, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 41, 'duration_days' => 2, 'price' => 10, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Envelope Design
            ['design_service_id' => 42, 'duration_days' => 5, 'price' => 150, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 42, 'duration_days' => 10, 'price' => 120, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 42, 'duration_days' => 5, 'price' => 90, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 42, 'duration_days' => 2, 'price' => 20, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Magazine Cover Design
            ['design_service_id' => 43, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 43, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 43, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 43, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Ebook Cover Design
            ['design_service_id' => 44, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 44, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 44, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 44, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Book Design
            ['design_service_id' => 45, 'duration_days' => 7, 'price' => 2000, 'features' => 'Unlimited pages, 7 days, 2 revisions'],
            ['design_service_id' => 45, 'duration_days' => 14, 'price' => 1500, 'features' => 'Unlimited pages, 14 days, 2 revisions'],
            ['design_service_id' => 45, 'duration_days' => 30, 'price' => 1200, 'features' => 'Upto 50 pages, 30 days, 2 revisions'],
            ['design_service_id' => 45, 'duration_days' => 30, 'price' => 900, 'features' => 'Upto 30 pages, 30 days, 2 revisions'],

            // Book Cover Design
            ['design_service_id' => 46, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 46, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 46, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 46, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Booklet Design
            ['design_service_id' => 47, 'duration_days' => 7, 'price' => 300, 'features' => 'Unlimited pages, 7 days, 2 revisions'],
            ['design_service_id' => 47, 'duration_days' => 14, 'price' => 250, 'features' => 'Unlimited pages, 14 days, 2 revisions'],
            ['design_service_id' => 47, 'duration_days' => 30, 'price' => 200, 'features' => 'Upto 20 pages, 30 days, 2 revisions'],
            ['design_service_id' => 47, 'duration_days' => 30, 'price' => 150, 'features' => 'Upto 10 pages, 30 days, 2 revisions'],

            // Album Cover Design
            ['design_service_id' => 48, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 48, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 48, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 48, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Letter Design
            ['design_service_id' => 49, 'duration_days' => 5, 'price' => 150, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 49, 'duration_days' => 10, 'price' => 120, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 49, 'duration_days' => 5, 'price' => 90, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 49, 'duration_days' => 2, 'price' => 10, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Menu Design
            ['design_service_id' => 50, 'duration_days' => 5, 'price' => 300, 'features' => 'Unlimited page menu + Menu board + 5 days'],
            ['design_service_id' => 50, 'duration_days' => 7, 'price' => 240, 'features' => 'Unlimited page menu + 7 days'],
            ['design_service_id' => 50, 'duration_days' => 7, 'price' => 200, 'features' => 'Upto 6 page menu + Menu board + 7 days'],
            ['design_service_id' => 50, 'duration_days' => 14, 'price' => 100, 'features' => 'Upto 3 page menu + 14 days'],

            // PowerPoint Design
            ['design_service_id' => 51, 'duration_days' => 7, 'price' => 300, 'features' => 'Unlimited slides, 7 days, 2 revisions'],
            ['design_service_id' => 51, 'duration_days' => 14, 'price' => 250, 'features' => 'Unlimited slides, 14 days, 2 revisions'],
            ['design_service_id' => 51, 'duration_days' => 30, 'price' => 200, 'features' => 'Upto 20 slides, 30 days, 2 revisions'],
            ['design_service_id' => 51, 'duration_days' => 30, 'price' => 150, 'features' => 'Upto 10 slides, 30 days, 2 revisions'],

            // Timeline Design
            ['design_service_id' => 52, 'duration_days' => 7, 'price' => 150, 'features' => '2 timelines + graphs and charts + 7 days + 4 revisions'],
            ['design_service_id' => 52, 'duration_days' => 14, 'price' => 120, 'features' => '2 timelines + 14 days + 2 revisions'],
            ['design_service_id' => 52, 'duration_days' => 14, 'price' => 90, 'features' => '1 design + graphs and charts + 2 revisions + 14 days'],
            ['design_service_id' => 52, 'duration_days' => 20, 'price' => 50, 'features' => '1 design + 2 revisions + 20 days'],

            // Resume Design
            ['design_service_id' => 53, 'duration_days' => 3, 'price' => 100, 'features' => 'Upto 6 pages + 3 revisions + 3 days'],
            ['design_service_id' => 53, 'duration_days' => 5, 'price' => 80, 'features' => 'Upto 6 pages + 2 revisions + 5 days'],
            ['design_service_id' => 53, 'duration_days' => 7, 'price' => 60, 'features' => 'Upto 3 pages + 2 revisions + 7 days'],
            ['design_service_id' => 53, 'duration_days' => 6, 'price' => 30, 'features' => '/page + 1 revison/page + 1day/page'],

            // Portfolio Design
            ['design_service_id' => 54, 'duration_days' => 3, 'price' => 100, 'features' => 'Upto 6 pages + 3 revisions + 3 days'],
            ['design_service_id' => 54, 'duration_days' => 5, 'price' => 80, 'features' => 'Upto 6 pages + 2 revisions + 5 days'],
            ['design_service_id' => 54, 'duration_days' => 7, 'price' => 60, 'features' => 'Upto 3 pages + 2 revisions + 7 days'],
            ['design_service_id' => 54, 'duration_days' => 6, 'price' => 30, 'features' => '/page + 1 revison/page + 1day/page'],

            // Billboard Design
            ['design_service_id' => 55, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 55, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 55, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 55, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Artwork Design
            ['design_service_id' => 56, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 56, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 56, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 56, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Design Quotes
            ['design_service_id' => 57, 'duration_days' => 5, 'price' => 150, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 57, 'duration_days' => 10, 'price' => 120, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 57, 'duration_days' => 5, 'price' => 90, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 57, 'duration_days' => 2, 'price' => 10, 'features' => '1 unique design, 2 days, 2 revisions'],

            // Graffiti Design
            ['design_service_id' => 58, 'duration_days' => 2, 'price' => 150, 'features' => '1 concept, 2 days, 2 revisions'],
            ['design_service_id' => 58, 'duration_days' => 4, 'price' => 120, 'features' => '1 concept, 4 days, 2 revisions'],
            ['design_service_id' => 58, 'duration_days' => 4, 'price' => 100, 'features' => '2 concepts, 4 days, 4 revisions'],
            ['design_service_id' => 58, 'duration_days' => 8, 'price' => 70, 'features' => '2 concepts, 8 days, 2 revisions'],

            // Tattoo Design
            ['design_service_id' => 59, 'duration_days' => 5, 'price' => 150, 'features' => '10 unique designs, 5 days, 10 revisions'],
            ['design_service_id' => 59, 'duration_days' => 10, 'price' => 120, 'features' => '10 unique designs, 10 days, 10 revisions'],
            ['design_service_id' => 59, 'duration_days' => 5, 'price' => 90, 'features' => '5 unique designs, 5 days, 5 revisions'],
            ['design_service_id' => 59, 'duration_days' => 2, 'price' => 10, 'features' => '1 unique design, 2 days, 2 revisions'],
        ];


        // Create Stripe products and prices, then insert with price IDs
        foreach ($servicePlans as &$plan) {
            try {
                // Get the service name for the product
                $service = $services[$plan['design_service_id'] - 1];
                $productName = $service['label'] . ' - ' . $plan['features'];

                // Create Stripe Product
                $product = $this->stripe->products->create([
                    'name' => $productName,
                    'description' => "Design service: {$service['label']} ({$plan['duration_days']} days)",
                ]);

                // Create Stripe Price
                $price = $this->stripe->prices->create([
                    'product' => $product->id,
                    'unit_amount' => $plan['price'] * 100, // Convert to cents
                    'currency' => 'usd',
                    // 'recurring' => 'day', // One-time payment
                ]);

                $half_price = $this->stripe->prices->create([
                    'product' => $product->id,
                    'unit_amount' => ($plan['price'] * 100)/2, // Convert to cents
                    'currency' => 'usd',
                    // 'recurring' => 'day', // One-time payment
                ]);
                // Add the Stripe price ID to the plan
                $plan['stripe_price_id'] = $price->id;
                $plan['stripe_half_price_id']=$half_price->id;

            } catch (\Exception $e) {
                // Log the error and continue with next plan
                \Log::error("Failed to create Stripe price for plan {$plan['features']}: " . $e->getMessage());
                $plan['stripe_price_id'] = null;
            }
        }

        DB::table('design_service_plans')->insert($servicePlans);
    }
}
