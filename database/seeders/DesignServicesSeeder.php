<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
            [
                'name' => 'logo_design', 'slug' =>'logo-design', 'label' => 'Logo Design', 'heading' => 'Custom Logo Design Pricing',
                'plans' => [
                    // Logo Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 1, 'price' => 210.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 1 day\n✅ 5 custom logos\n✅ Up to 5 revisions\n✅ High-quality, custom logo designs\n✅ Delivered in PNG, JPG, and vector formats\n✅ 100% ownership rights"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 3, 'price' => 160.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ 10 custom logos\n✅ Up to 10 revisions\n✅ High-quality, custom logo designs\n✅ Multiple unique logo concepts\n✅ Delivered in PNG, JPG, and vector formats\n✅ 100% ownership rights"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 6, 'price' => 130.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ 10 custom logos\n✅ Up to 10 revisions\n✅ High-quality, custom logo designs\n✅ Delivered in PNG, JPG, and vector formats\n✅ 100% ownership rights"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 99.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 custom logos\n✅ Up to 10 revisions\n✅ High-quality, custom logo designs\n✅ Delivered in PNG, JPG, and vector formats\n✅ 100% ownership rights"],
                ]
                ],
            [
                'name' => 'website_design', 'slug' =>'website-design', 'label' => 'Website Design', 'heading' => 'Website Design Pricing',
                'plans' => [
                    // Website Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 2299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Prototyping included\n✅ Custom, user-friendly website design\n✅ Responsive design for all devices"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 20, 'price' => 1799.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Prototyping included\n✅ Custom, user-friendly website design\n✅ Responsive design for all devices"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1199.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Custom, user-friendly website design\n✅ Responsive design for all devices"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 20, 'price' => 999.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Custom, user-friendly website design\n✅ Responsive design for all devices"],
                ]
            ],
            [
                'name' => 'ecommerce_website_design', 'slug' =>'ecommerce-website-design', 'label' => 'Ecommerce Website Design', 'heading' => 'Ecommerce Website Design Pricing',
                'plans' => [
                    // Ecommerce Website Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 2299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Prototyping included\n✅ Custom, user-friendly ecommerce design\n✅ Responsive design for all devices"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 20, 'price' => 1799.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Prototyping included\n✅ Custom, user-friendly ecommerce design\n✅ Responsive design for all devices"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1199.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Custom, user-friendly ecommerce design\n✅ Responsive design for all devices"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 20, 'price' => 999.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Custom, user-friendly ecommerce design\n✅ Responsive design for all devices"],
                ]
            ],
            [
                'name' => 'real_estate_website_design', 'slug' =>'real-estate-website-design', 'label' => 'Real Estate Website Design', 'heading' => 'Real Estate Website Design Pricing',
                'plans' => [
                    // Real Estate Website Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 2299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Prototyping included\n✅ Custom, user-friendly real estate design\n✅ Responsive design for all devices"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 20, 'price' => 1799.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Prototyping included\n✅ Custom, user-friendly real estate design\n✅ Responsive design for all devices"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1199.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Custom, user-friendly real estate design\n✅ Responsive design for all devices"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 20, 'price' => 999.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Custom, user-friendly real estate design\n✅ Responsive design for all devices"],

                ]
            ],
            [
                'name' => 'healthcare_website_design', 'slug' =>'healthcare-website-design', 'label' => 'Healthcare Website Design', 'heading' => 'Healthcare Website Design Pricing',
                'plans' => [
                                // Healthcare Website Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 2299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Prototyping included\n✅ Custom, user-friendly healthcare design\n✅ Responsive design for all devices"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 20, 'price' => 1799.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Prototyping included\n✅ Custom, user-friendly healthcare design\n✅ Responsive design for all devices"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1199.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Custom, user-friendly healthcare design\n✅ Responsive design for all devices"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 20, 'price' => 999.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Custom, user-friendly healthcare design\n✅ Responsive design for all devices"],
  
                    
                ]
            ],
            [
                'name' => 'landing_page_design', 'slug' =>'landing-page-design', 'label' => 'Landing Page Design', 'heading' => 'Landing Page Design Pricing',
                'plans' => [
                    // Landing Page Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 1, 'price' => 110.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 1 day\n✅ Up to 3 revisions\n✅ Custom, high-converting landing page design"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 3, 'price' => 99.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ Up to 10 revisions\n✅ Custom, high-converting landing page design\n✅ Mobile-friendly and responsive layout"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 6, 'price' => 79.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Up to 10 revisions\n✅ Custom, high-converting landing page design\n✅ Mobile-friendly and responsive layout"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 59.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Up to 10 revisions\n✅ Custom, high-converting landing page design\n✅ Mobile-friendly and responsive layout"],

                ]
            ],
            [
                'name' => 'design_icon', 'slug' =>'design-icon', 'label' => 'Design Icon', 'heading' => 'Design Icon Pricing',
                'plans' => [
                        // Design Icon
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 1, 'price' => 299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 1 day\n✅ 10 flat icons\n✅ 5 3D icons"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 3, 'price' => 249.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ 15 flat icons\n✅ 5 3D icons"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 6, 'price' => 199.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ 20 flat icons\n✅ 10 3D icons"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 149.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 25 flat icons\n✅ 15 3D icons"],

                ]
            ],
            [
                'name' => 'dashboard_design', 'slug' =>'dashboard-design', 'label' => 'Dashboard Design', 'heading' => 'Dashboard Design Pricing',
                'plans' => [
                            // Dashboard Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 7, 'price' => 699.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ Advanced design\n✅ UI/UX optimization"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 14, 'price' => 499.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 14 days\n✅ Basic design\n✅ UI/UX optimization\n✅ Prototyping included"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 25, 'price' => 399.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 25 days\n✅ Basic design\n✅ UI/UX optimization\n✅ Prototyping included"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 25, 'price' => 299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 25 days\n✅ Advanced design\n✅ UI/UX optimization"],

                ]
            ],
            [
                'name' => 'infographic_design', 'slug' =>'infographic-design', 'label' => 'Infographic Design', 'heading' => 'Infographic Design Pricing',
                'plans' => [
                    // Infographic Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 8, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 6 infographics\n✅ Up to 6 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 6, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ 3 infographics\n✅ Up to 6 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 80.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 infographics\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 1, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 1 day\n✅ 1 infographic\n✅ Up to 2 revisions"],
 
                ]
            ],
            [
                'name' => 'footer_design', 'slug' =>'footer-design', 'label' => 'Footer Design', 'heading' => 'Footer Design Pricing',
                'plans' => [
                     // Footer Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 1, 'price' => 140.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 1 day\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 3, 'price' => 110.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ Up to 6 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 6, 'price' => 80.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Up to 9 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 9, 'price' => 60.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 9 days\n✅ Up to 12 revisions"],

                ]
            ],
            [
                'name' => 'website_header_design', 'slug' =>'website-header-design', 'label' => 'Website Header Design', 'heading' => 'Website Header Design Pricing',
                'plans' => [
                     // Website Header Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 1, 'price' => 140.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 1 day\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 3, 'price' => 110.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ Up to 6 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 6, 'price' => 80.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Up to 9 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 9, 'price' => 60.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 9 days\n✅ Up to 12 revisions"],

                ]
            ],
            [
                'name' => 'uiux_design','slug' =>'uiux-design', 'label' => 'UI/UX Design', 'heading' => 'UI/UX Design Pricing',
                'plans' => [
                     // UI/UX Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 2299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Prototyping included\n✅ Custom, user-friendly UI/UX design\n✅ Responsive design for all devices"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 20, 'price' => 1799.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Prototyping included\n✅ Custom, user-friendly UI/UX design\n✅ Responsive design for all devices"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1199.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Custom, user-friendly UI/UX design\n✅ Responsive design for all devices"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 20, 'price' => 999.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Custom, user-friendly UI/UX design\n✅ Responsive design for all devices"],

                ]
            ],
            [
                'name' => 'ux_design', 'slug' =>'ux-design', 'label' => 'UX Design', 'heading' => 'UX Design Pricing',
                'plans' => [
                    // UX Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 2299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Prototyping included\n✅ Custom, user-friendly UX design\n✅ Responsive design for all devices"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 20, 'price' => 1799.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Prototyping included\n✅ Custom, user-friendly UX design\n✅ Responsive design for all devices"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1199.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Custom, user-friendly UX design\n✅ Responsive design for all devices"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 20, 'price' => 999.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Custom, user-friendly UX design\n✅ Responsive design for all devices"],

                ]
            ],
            [
                'name' => 'ui_design', 'slug' =>'ui-design', 'label' => 'UI Design', 'heading' => 'UI Design Pricing',
                'plans' => [
                    // UI Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 2299.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Prototyping included\n✅ Custom, user-friendly UI design\n✅ Responsive design for all devices"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 20, 'price' => 1799.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Prototyping included\n✅ Custom, user-friendly UI design\n✅ Responsive design for all devices"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1199.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ 20-30 pages included\n✅ Custom, user-friendly UI design\n✅ Responsive design for all devices"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 20, 'price' => 999.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 20 days\n✅ 10-20 pages included\n✅ Custom, user-friendly UI design\n✅ Responsive design for all devices"],

                ]
            ],
            [
                'name' => 'mobile_app_design', 'slug' =>'mobile-app-design', 'label' => 'Mobile App Design', 'heading' => 'Mobile App Design Pricing',
                'plans' => [
                    // Mobile App Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 5000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Complete app design"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 60, 'price' => 3000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 60 days\n✅ Complete app design"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Basic layout design"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 60, 'price' => 1200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 60 days\n✅ Basic layout design"],

                ]
            ],
            [
                'name' => 'ios_app_design', 'slug' =>'ios-app-design', 'label' => 'Ios App Design', 'heading' => 'iOS App Design Pricing',
                'plans' => [
                    // iOS App Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 5000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Complete iOS app design"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 60, 'price' => 3000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 60 days\n✅ Complete iOS app design"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Basic iOS layout design"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 60, 'price' => 1200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 60 days\n✅ Basic iOS layout design"],

                ]
            ],
            [
                'name' => 'android_app_design', 'slug' =>'android-app-design', 'label' => 'Android App Design', 'heading' => 'Android App Design Pricing',
                'plans' => [
                    // Android App Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 30, 'price' => 5000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Complete Android app design"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 60, 'price' => 3000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 60 days\n✅ Complete Android app design"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 1500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Basic Android layout design"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 60, 'price' => 1200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 60 days\n✅ Basic Android layout design"],

                ]
            ],
            [
                'name' => 'business_card_design', 'slug' =>'business-card-design', 'label' => 'Business Card Design', 'heading' => 'Business Card Design Pricing',
                'plans' => [
                    // Business Card Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 50.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 3 design variations\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 3 design variations\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 30.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 design variations\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 6, 'price' => 25.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ 2 design variations\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'birthday_card_design', 'slug' =>'birthday-card-design', 'label' => 'Birthday Card Design', 'heading' => 'Birthday Card Design Pricing',
                'plans' => [
                    // Birthday Card Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 50.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 3 design variations\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 3 design variations\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 30.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 design variations\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 6, 'price' => 25.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ 2 design variations\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'greeting_card_design', 'slug' =>'greeting-card-design', 'label' => 'Greeting Card Design', 'heading' => 'Greeting Card Design Pricing',
                'plans' => [
                     // Greeting Card Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 50.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 3 design variations\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 3 design variations\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 30.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 design variations\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 6, 'price' => 25.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ 2 design variations\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'wedding_invitation_design', 'slug' =>'wedding-invitation-design', 'label' => 'Wedding Invitation Design', 'heading' => 'Wedding Invitation Design Pricing',
                'plans' => [
                    // Wedding Invitation Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 80.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ Custom design\n✅ Up to 5 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 60.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ Custom design\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 6, 'price' => 50.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Custom design\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ Custom design\n✅ Up to 3 revisions"],

                ]
            ],
            [
                'name' => 'postcard_design', 'slug' =>'postcard-design', 'label' => 'Postcard Design', 'heading' => 'Postcard Design Pricing',
                'plans' => [
                    // Postcard Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 80.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ Custom design\n✅ Up to 5 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 60.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ Custom design\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 6, 'price' => 50.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Custom design\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ Custom design\n✅ Up to 3 revisions"],

                ]
            ],
            [
                'name' => 'packaging_design', 'slug' =>'packaging-design', 'label' => 'Packaging Design', 'heading' => 'Packaging Design Pricing',
                'plans' => [
                    // Packaging Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 4, 'price' => 1200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ Custom design\n✅ Up to 6 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 6, 'price' => 1000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Premium design\n✅ Up to 8 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 10, 'price' => 800.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Premium design\n✅ Up to 10 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 600.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Custom design\n✅ Up to 5 revisions"],

                ]
            ],
            [
                'name' => 'box_design', 'slug' =>'box-design', 'label' => 'Box Design', 'heading' => 'Box Design Pricing',
                'plans' => [
                    // Box Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 4, 'price' => 1200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ Custom design\n✅ Up to 6 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 6, 'price' => 1000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Premium design\n✅ Up to 8 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 10, 'price' => 800.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Premium design\n✅ Up to 10 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 600.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Custom design\n✅ Up to 5 revisions"],

                ]
            ],
            [
                'name' => 'label_design', 'slug' =>'label-design', 'label' => 'Label Design', 'heading' => 'Label Design Pricing',
                'plans' => [
                    // Label Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 4, 'price' => 1200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ Custom design\n✅ Up to 6 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 6, 'price' => 1000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Premium design\n✅ Up to 8 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 10, 'price' => 800.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Premium design\n✅ Up to 10 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 600.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Custom design\n✅ Up to 5 revisions"],

                ]
            ],
            [
                'name' => 'food_packaging_design', 'slug' =>'food-packaging-design', 'label' => 'Food Packaging Design', 'heading' => 'Food Packaging Design Pricing',
                'plans' => [
                     // Food Packaging Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 4, 'price' => 1200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ Custom design\n✅ Up to 6 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 6, 'price' => 1000.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 6 days\n✅ Premium design\n✅ Up to 8 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 10, 'price' => 800.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Premium design\n✅ Up to 10 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 600.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Custom design\n✅ Up to 5 revisions"],

                ]
            ],
            [
                'name' => 't_shirt_design', 'slug' =>'t-shirt-design', 'label' => 'T Shirt Design', 'heading' => 'T-Shirt Design Pricing',
                'plans' => [
                    // T-Shirt Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'hoodie_design', 'slug' =>'hoodie-design', 'label' => 'Hoodie Design', 'heading' => 'Hoodie Design Pricing',
                'plans' => [
                    // Hoodie Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'jersey_design', 'slug' =>'jersey-design', 'label' => 'Jersey Design', 'heading' => 'Jersey Design Pricing',
                'plans' => [
                    // Jersey Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'custom_design_polo', 'slug' =>'custom-design-polo', 'label' => 'Custom Design Polo', 'heading' => 'Custom Design Polo Pricing',
                'plans' => [
                    // Custom Design Polo
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'tote_bag_design', 'slug' =>'tote-bag-design', 'label' => 'Tote Bag Design', 'heading' => 'Tote Bag Design Pricing',
                'plans' => [
                    // Tote Bag Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

  
                ]
            ],
            [
                'name' => 'cup_design', 'slug' =>'cup-design', 'label' => 'Cup Design', 'heading' => 'Cup Design Pricing',
                'plans' => [
                      // Cup Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'mug_design', 'slug' =>'mug-design', 'label' => 'Mug Design', 'heading' => 'Mug Design Pricing',
                'plans' => [
                    // Mug Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'cap_design', 'slug' =>'cap-design', 'label' => 'Cap Design', 'heading' => 'Cap Design Pricing',
                'plans' => [
                    // Cap Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'flyer_design', 'slug' =>'flyer-design', 'label' => 'Flyer Design', 'heading' => 'Flyer Design Pricing',
                'plans' => [
                    // Flyer Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'poster_design', 'slug' =>'poster-design', 'label' => 'Poster Design', 'heading' => 'Poster Design Pricing',
                'plans' => [
                    // Poster Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],


                ]
            ],
            [
                'name' => 'magazine_design', 'slug' =>'magazine-design', 'label' => 'Magazine Design', 'heading' => 'Magazine Design Pricing',
                'plans' => [
                    // Magazine Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 7, 'price' => 500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ Unlimited pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 14, 'price' => 400.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 14 days\n✅ Unlimited pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Up to 50 pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 30, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Up to 30 pages\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'brochure_design', 'slug' =>'brochure-design', 'label' => 'Brochure Design', 'heading' => 'Brochure Design Pricing',
                'plans' => [
                    // Brochure Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'pamphlet_design', 'slug' =>'pamphlet-design', 'label' => 'Pamphlet Design', 'heading' => 'Pamphlet Design Pricing',
                'plans' => [
                    // Pamphlet Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 7, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ Unlimited pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 14, 'price' => 250.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 14 days\n✅ Unlimited pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Up to 20 pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 30, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Up to 10 pages\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'banner_design', 'slug' =>'banner-design', 'label' => 'Banner Design', 'heading' => 'Banner Design Pricing',
                'plans' => [
                    // Banner Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'sticker_design', 'slug' =>'sticker-design', 'label' => 'Sticker Design', 'heading' => 'Sticker Design Pricing',
                'plans' => [
                    // Sticker Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 90.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 10.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'envelope_design', 'slug' =>'envelope-design', 'label' => 'Envelope Design', 'heading' => 'Envelope Design Pricing',
                'plans' => [
                    // Envelope Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 10 unique designs\n✅ Up to 10 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 90.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 5 unique designs\n✅ Up to 5 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 2, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 unique design\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'magazine_cover_design', 'slug' =>'magazine-cover-design', 'label' => 'Magazine Cover Design', 'heading' => 'Magazine Cover Design Pricing',
                'plans' => [
                    // Magazine Cover Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'ebook_cover_design', 'slug' =>'ebook-cover-design', 'label' => 'Ebook Cover Design', 'heading' => 'Ebook Cover Design Pricing',
                'plans' => [
                     // Ebook Cover Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'book_design', 'slug' =>'book-design', 'label' => 'Book Design', 'heading' => 'Book Design Pricing',
                'plans' => [
                    // Book Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 7, 'price' => 500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ Unlimited pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 14, 'price' => 400.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 14 days\n✅ Unlimited pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Up to 50 pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 30, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Up to 30 pages\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'book_cover_design', 'slug' =>'book-cover-design', 'label' => 'Book Cover Design', 'heading' => 'Book Cover Design Pricing',
                'plans' => [
                    // Book Cover Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'booklet_design', 'slug' =>'booklet-design', 'label' => 'Booklet Design', 'heading' => 'Booklet Design Pricing',
                'plans' => [
                    // Booklet Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 7, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ Unlimited pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 14, 'price' => 250.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 14 days\n✅ Unlimited pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 30, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Up to 20 pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 30, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 30 days\n✅ Up to 10 pages\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'album_cover_design', 'slug' =>'album-cover-design', 'label' => 'Album Cover Design', 'heading' => 'Album Cover Design Pricing',
                'plans' => [
                    // Album Cover Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'letter_design', 'slug' =>'letter-design', 'label' => 'Letter Design', 'heading' => 'Letter Design Pricing',
                'plans' => [
                    // Letter Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 50.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 30.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 8, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 8 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'menu_design', 'slug' =>'menu-design', 'label' => 'Menu Design', 'heading' => 'Menu Design Pricing',
                'plans' => [
                    // Menu Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 3, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 5, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 80.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'powerpoint_design', 'slug' =>'powerpoint-design', 'label' => 'Powerpoint Design', 'heading' => 'PowerPoint Design Pricing',
                'plans' => [
                    // PowerPoint Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 3, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ Up to 20 slides\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 5, 'price' => 250.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ Up to 20 slides\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 7, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ Up to 15 slides\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ Up to 10 slides\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'timeline_design', 'slug' =>'timeline-design', 'label' => 'Timeline Design', 'heading' => 'Timeline Design Pricing',
                'plans' => [
                    // Timeline Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 3, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 5, 'price' => 120.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 5, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 70.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'resume_design', 'slug' =>'resume-design', 'label' => 'Resume Design', 'heading' => 'Resume Design Pricing',
                'plans' => [
                    // Resume Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 100.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 80.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 60.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 7, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'portfolio_design', 'slug' =>'portfolio-design', 'label' => 'Portfolio Design', 'heading' => 'Portfolio Design Pricing',
                'plans' => [
                    // Portfolio Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 7, 'price' => 500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ Up to 20 pages\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 14, 'price' => 400.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 14 days\n✅ Up to 20 pages\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 14, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 14 days\n✅ Up to 15 pages\n✅ Up to 2 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 21, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 21 days\n✅ Up to 10 pages\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'billboard_design', 'slug' =>'billboard-design', 'label' => 'Billboard Design', 'heading' => 'Billboard Design Pricing',
                'plans' => [
                    // Billboard Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 3, 'price' => 600.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 3 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 5, 'price' => 500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 7, 'price' => 400.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 10, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'artwork_design', 'slug' =>'artwork-design', 'label' => 'Artwork Design', 'heading' => 'Artwork Design Pricing',
                'plans' => [
                    // Artwork Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 400.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 10, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 15, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 15 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'design_quotes', 'slug' =>'design-quotes', 'label' => 'Design Quotes', 'heading' => 'Design Quotes Pricing',
                'plans' => [
                    // Design Quotes
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 2, 'price' => 50.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 2 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 4, 'price' => 40.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 1 concept\n✅ Up to 2 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 4, 'price' => 30.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 4 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 7, 'price' => 20.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 7 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'graffiti_design', 'slug' =>'graffiti-design', 'label' => 'Graffiti Design', 'heading' => 'Graffiti Design Pricing',
                'plans' => [
                    // Graffiti Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 500.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 400.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 10, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 15, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 15 days\n✅ 2 concepts\n✅ Up to 2 revisions"],

                ]
            ],
            [
                'name' => 'tattoo_design', 'slug' =>'tattoo-design', 'label' => 'Tattoo Design', 'heading' => 'Tattoo Design Pricing',
                'plans' => [
                    // Tattoo Design
                    [ 'name' => 'priority_design', 'label' => 'Priority Design', 'duration_days' => 5, 'price' => 300.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 5 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'mega_design_pack', 'label' => 'Mega Design Pack', 'duration_days' => 10, 'price' => 250.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 1 concept\n✅ Up to 3 revisions"],
                    [ 'name' => 'ultra_design', 'label' => 'Ultra Design', 'duration_days' => 10, 'price' => 200.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 10 days\n✅ 2 concepts\n✅ Up to 4 revisions"],
                    [ 'name' => 'fundamental_design', 'label' => 'Fundamental Design', 'duration_days' => 15, 'price' => 150.00, 'currency' => 'USD', 'symbol' => '$', 'features' => "✅ Delivery within 15 days\n✅ 2 concepts\n✅ Up to 2 revisions"]

                ]
            ],
        ];


        // DB::table('design_services')->insert($services);

        // Insert Service Plans
        


        // Create Stripe products and prices, then insert with price IDs
        foreach ($services as $service) {
            // \Log::info("Creating Stripe product for service: " . $service);
            // break;
            try {
                $product = $this->stripe->products->create([
                    'name' => $service['label'],
                    'description' => "Design service for " . $service['label'],
                ]);
                
                // Insert into design_services
                $designService = DB::table('design_services')->insertGetId([
                    'name' => $service['name'],
                    'label' => $service['label'],
                    'slug' => $service['slug'],
                    'heading' => $service['heading'],
                    'stripe_product_id' => $product->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            
                foreach ($service['plans'] as $plan) {
                    try {
                        $price = $this->stripe->prices->create([
                            'product' => $product->id,
                            'unit_amount' => $plan['price'] * 100, // Convert to cents
                            'currency' => 'usd',
                        ]);
            
                        $half_price = $this->stripe->prices->create([
                            'product' => $product->id,
                            'unit_amount' => ($plan['price'] * 100) / 2, // Convert to cents
                            'currency' => 'usd',
                        ]);
            
                        $servicePlan = [
                            'design_service_id' => $designService, // Use the inserted ID
                            'name' => $plan['name'],
                            'label' => $plan['label'],
                            'duration_days' => $plan['duration_days'],
                            'stripe_price_id' => $price->id,
                            'stripe_half_price_id' => $half_price->id,
                            'price' => $plan['price'],
                            'currency' => $plan['currency'],
                            'symbol' => $plan['symbol'],
                            'features' => $plan['features'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        DB::table('design_service_plans')->insert($servicePlan);
                    } catch (\Exception $e) {
                        // Log the error and continue with the next plan
                        Log::error("Failed to create Stripe price for plan {$plan['name']}: " . $e->getMessage());
                        continue;
                    }
                }
            } catch (\Exception $e) {
                Log::error("Failed to create Stripe product for service {$service['label']}: " . $e->getMessage());
                throw $e; // Or handle as needed
            }
        }

        
    }
}
