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
                'name' => 'logo_design',
                'slug' => 'logo-design-services',
                'label' => 'Logo Design',
                'heading' => 'Custom Logo Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 1,
                        'price' => 210.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 24 hours\n5 custom logos\nUp to 5 revisions\nHigh-quality, custom logo designs\nDelivered in PNG, JPG, and vector formats\n100% ownership rights"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 3,
                        'price' => 160.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "High-quality, custom logo designs\nMultiple unique logo concepts\nRevisions for refinements\nDelivered in PNG, JPG, and vector formats",
                        'plus' => "100% ownership rights\nDesigned by experienced professionals",
                        'features' => "Delivery within 3 days\n15 custom logos\nUp to 15 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 130.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "High-quality, custom logo designs\nMultiple unique logo concepts\nRevisions for refinements\nDelivered in PNG, JPG, and vector formats",
                        'plus' => "100% ownership rights\nDesigned by experienced professionals",
                        'features' => "Delivery within 6 days\n12 custom logos\nUp to 12 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 10,
                        'price' => 99.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Multiple unique logo concepts\nRevisions for refinements\nDelivered in PNG, JPG, and vector formats",
                        'plus' => "100% ownership rights",
                        'features' => "Delivery within 10 days\n10 custom logos\nUp to 10 revisions"
                    ],
                ]
            ],
            [
                'name' => 'website_design',
                'slug' => 'website-design-service',
                'label' => 'Website Design',
                'heading' => 'Website Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 15,
                        'price' => 2299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 15 days\n20-30 pages included\nPrototyping included\nCustom, user-friendly website design"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 25,
                        'price' => 1799.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery within 25 days\nCustom, user-friendly website design",
                        'plus' => "Responsive design for all devices\nClear navigation and professional layout",
                        'features' => "Advanced website design\n20-30 pages included\nPrototyping included"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 1199.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery within 30 days\nCustom, user-friendly website design",
                        'plus' => "Responsive design for all devices",
                        'features' => "Basic professional website design\n20-25 pages included\nPrototyping included"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 40,
                        'price' => 999.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom, user-friendly website design\nResponsive design for all devices",
                        'plus' => null,
                        'features' => "Basic website design\n10-15 pages included\nDelivery within 40 days"
                    ],
                ]
            ],
            [
                'name' => 'ecommerce_website_design',
                'slug' => 'e-commerce-website-design-service',
                'label' => 'Ecommerce Website Design',
                'heading' => 'Ecommerce Website Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 15,
                        'price' => 2299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 15 days\n20-30 pages included\nPrototyping included\nCustom, user-friendly ecommerce design"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 25,
                        'price' => 1799.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery within 25 days\nCustom, user-friendly ecommerce design",
                        'plus' => "Responsive design for all devices\nClear navigation and professional layout",
                        'features' => "Advanced website design\n20-30 pages included\nPrototyping included"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 1199.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery within 30 days\nCustom, user-friendly ecommerce design",
                        'plus' => "Responsive design for all devices",
                        'features' => "Basic professional website design\n20-25 pages included\nPrototyping included"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 40,
                        'price' => 999.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom, user-friendly ecommerce design\nResponsive design for all devices",
                        'plus' => null,
                        'features' => "Basic website design\n10-15 pages included\nDelivery within 40 days"
                    ],
                ]
            ],
            [
                'name' => 'real_estate_website_design',
                'slug' => 'real-estate-website-design-service',
                'label' => 'Real Estate Website Design',
                'heading' => 'Real Estate Website Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 15,
                        'price' => 2299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 15 days\n20-30 pages included\nPrototyping included\nCustom, user-friendly real estate design"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 25,
                        'price' => 1799.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery within 25 days\nCustom, user-friendly real estate design",
                        'plus' => "Responsive design for all devices\nClear navigation and professional layout",
                        'features' => "Advanced website design\n20-30 pages included\nPrototyping included"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 1199.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery within 30 days\nCustom, user-friendly real estate design",
                        'plus' => "Responsive design for all devices",
                        'features' => "Basic professional website design\n20-25 pages included\nPrototyping included"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 40,
                        'price' => 999.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom, user-friendly real estate design\nResponsive design for all devices",
                        'plus' => null,
                        'features' => "Basic website design\n10-15 pages included\nDelivery within 40 days"
                    ],
                ]
            ],
            [
                'name' => 'healthcare_website_design',
                'slug' => 'healthcare-website-design-service',
                'label' => 'Healthcare Website Design',
                'heading' => 'Healthcare Website Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 15,
                        'price' => 2299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 15 days\n20-30 pages included\nPrototyping included\nCustom, user-friendly healthcare design"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 25,
                        'price' => 1799.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery within 25 days\nCustom, user-friendly healthcare design",
                        'plus' => "Responsive design for all devices\nClear navigation and professional layout",
                        'features' => "Advanced website design\n20-30 pages included\nPrototyping included"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 1199.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery within 30 days\nCustom, user-friendly healthcare design",
                        'plus' => "Responsive design for all devices",
                        'features' => "Basic professional website design\n20-25 pages included\nPrototyping included"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 40,
                        'price' => 999.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom, user-friendly healthcare design\nResponsive design for all devices",
                        'plus' => null,
                        'features' => "Basic website design\n10-15 pages included\nDelivery within 40 days"
                    ],
                ]
            ],
            [
                'name' => 'landing_page_design',
                'slug' => 'landing-page-design-service',
                'label' => 'Landing Page Design',
                'heading' => 'Landing Page Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 1,
                        'price' => 110.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Advanced design\nDelivery within 1 day\nUp to 3 revisions\nCustom, high-converting landing page design"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 3,
                        'price' => 99.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom, high-converting landing page design\nMobile-friendly and responsive layout\nClear call-to-action (CTA) for better conversions\nFast loading and SEO-friendly structure\nUser-friendly and visually engaging design",
                        'plus' => "Delivered in your preferred format (Figma, PSD, or coded)\n100% ownership rights",
                        'features' => "Advanced design\nDelivery within 3 days\nUp to 10 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 79.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom, high-converting landing page design\nMobile-friendly and responsive layout\nUser-friendly and visually engaging design",
                        'plus' => "Delivered in your preferred format (Figma, PSD, or coded)\n100% ownership rights",
                        'features' => "Basic professional design\nDelivery within 6 days\nUp to 10 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 10,
                        'price' => 59.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Mobile-friendly and responsive layout\nUser-friendly and visually engaging design\n100% ownership rights",
                        'plus' => null,
                        'features' => "Basic design\nDelivery within 10 days\nUp to 6 revisions"
                    ],
                ]
            ],
            [
                'name' => 'design_icon',
                'slug' => 'icon-design-service',
                'label' => 'Design Icon',
                'heading' => 'Design Icon Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 1,
                        'price' => 299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 1 day\n10 flat icons\n5 3D icons\nCustom-designed icons tailored to your brand"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 3,
                        'price' => 249.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom-designed icons tailored to your brand\nPixel-perfect and scalable for all uses\nDelivered in multiple formats (PNG, SVG, AI, PSD)\nClear, minimal, and visually appealing designs",
                        'plus' => "Fully responsive for web, app, and print use\n100% ownership rights after delivery",
                        'features' => "Delivery within 3 days\n15 flat icons\n5 3D icons"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 199.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom-designed icons tailored to your brand\nDelivery in multiple formats (PNG, SVG, AI, PSD)",
                        'plus' => "Fully responsive for web, app, and print use\n100% ownership rights after delivery",
                        'features' => "Delivery within 6 days\n20 flat icons\n10 3D icons"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 10,
                        'price' => 149.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery in multiple formats (PNG, SVG, AI, PSD)",
                        'plus' => "100% ownership rights after delivery",
                        'features' => "Delivery within 10 days\n25 flat icons\n15 3D icons"
                    ],
                ]
            ],
            [
                'name' => 'dashboard_design',
                'slug' => 'dashboard-design-service',
                'label' => 'Dashboard Design',
                'heading' => 'Dashboard Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 7,
                        'price' => 699.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 7 days\nAdvanced design\nUI/UX optimization\nCustom, user-friendly dashboard UI design\nResponsive layout for desktop, tablet, and mobile"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 14,
                        'price' => 499.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Prototyping\nCustom, user-friendly dashboard UI design\nResponsive layout for desktop, tablet, and mobile\nClear data visualization with charts and graphs\nOrganized and intuitive navigation structure",
                        'plus' => "Delivered in Figma, PSD, or preferred design format\n100% ownership rights after project completion",
                        'features' => "Delivery within 14 days\nAdvanced design\nUI/UX optimization"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 25,
                        'price' => 399.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Prototyping\nCustom, user-friendly dashboard UI design\nResponsive layout for desktop, tablet, and mobile",
                        'plus' => "Delivered in Figma, PSD, or preferred design format\n100% ownership rights after project completion",
                        'features' => "Delivery within 25 days\nBasic professional design\nUI/UX optimization"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 40,
                        'price' => 299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Responsive layout for desktop, tablet, and mobile",
                        'plus' => "Delivered in Figma, PSD, or preferred design format\n100% ownership rights after project completion",
                        'features' => "Delivery within 40 days\nBasic design\nUI/UX optimization"
                    ],
                ]
            ],
            [
                'name' => 'infographic_design',
                'slug' => 'infographic-design-service',
                'label' => 'Infographic Design',
                'heading' => 'Infographic Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 1,
                        'price' => 40.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 1 day\n1 professional infographic design\n2 revisions\nDelivered in PNG, JPG, PDF, and editable formats"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 8,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Clear and easy-to-understand data presentation\nHigh-resolution files for print and digital use\nDelivery in PNG, JPG, PDF, and editable formats\nUnique icons, illustrations, and graphics",
                        'plus' => "Designed to match your branding and style\n100% ownership rights after project completion",
                        'features' => "6 infographic designs\nDelivery within 8 days\nUp to 10 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "High-resolution files for print and digital use\nDelivery in PNG, JPG, PDF, and editable formats\nUnique icons, illustrations, and graphics",
                        'plus' => "100% ownership rights after project completion",
                        'features' => "3 infographic designs\nDelivery within 6 days\nUp to 6 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 4,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery in PNG, JPG, PDF, and editable formats",
                        'plus' => "100% ownership rights after project completion",
                        'features' => "Delivery within 4 days\n2 basic infographic designs\nUp to 4 revisions"
                    ],
                ]
            ],
            [
                'name' => 'footer_design',
                'slug' => 'footer-design-service',
                'label' => 'Footer Design',
                'heading' => 'Footer Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 1,
                        'price' => 140.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 1 day\n2 revisions included\nDelivered in Figma, PSD, or preferred format\n100% ownership rights after delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 3,
                        'price' => 110.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Responsive layout for all screen sizes\nLinks, contact info, social icons, and more\nClean, modern, and user-friendly design\nDelivery in Figma, PSD, or preferred format",
                        'plus' => "Matches your website’s branding and style\n100% ownership rights after delivery",
                        'features' => "Delivery within 3 days\nUp to 6 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Responsive layout for all screen sizes\nLinks, contact info, social icons, and more\nDelivery in Figma, PSD, or preferred format",
                        'plus' => "100% ownership rights after delivery",
                        'features' => "Delivery within 6 days\nUp to 9 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 9,
                        'price' => 60.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Delivery in Figma, PSD, or preferred format",
                        'plus' => "100% ownership rights after delivery",
                        'features' => "Delivery within 9 days\nUp to 3 revisions"
                    ],
                ]
            ],
            [
                'name' => 'website_header_design',
                'slug' => 'website-header-design-service',
                'label' => 'Website Header Design',
                'heading' => 'Website Header Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 1,
                        'price' => 140.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 1 day\n2 revisions included\nDelivered in Figma, PSD, or preferred format\n100% ownership rights after delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 3,
                        'price' => 110.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Responsive layout for all screen sizes\nLinks, contact info, social icons, and more\nClean, modern, and user-friendly design\nDelivery in Figma, PSD, or preferred format",
                        'plus' => "Matches your website’s branding and style\n100% ownership rights after delivery",
                        'features' => "Delivery within 3 days\nUp to 6 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Responsive layout for all screen sizes\nLinks, contact info, social icons, and more\nDelivery in Figma, PSD, or preferred format",
                        'plus' => "100% ownership rights after delivery",
                        'features' => "Delivery within 6 days\nUp to 9 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 9,
                        'price' => 60.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => "Delivery in Figma, PSD, or preferred format\n100% ownership rights after delivery",
                        'features' => "Delivery within 9 days\nUp to 3 revisions"
                    ],
                ]
            ],
            [
                'name' => 'uiux_design',
                'slug' => 'ui-ux-design-service',
                'label' => 'UI/UX Design',
                'heading' => 'UI/UX Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 20,
                        'price' => 2299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Advanced design UI/UX design for web or mobile apps\n20-30 pages designed\nDelivery within 20 days\nDelivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 30,
                        'price' => 1799.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "User-friendly layouts focused on smooth navigation\nWireframes and high-fidelity mockups\nResponsive designs for all screen sizes",
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Advanced design UI/UX design for web or mobile apps\n20-30 pages designed\nAdvanced prototyping for each page\nDelivery within 30 days"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 40,
                        'price' => 1199.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Responsive designs for all screen sizes",
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Basic design UI/UX design for web or mobile apps\n10-20 pages designed\nDelivery within 40 days"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 40,
                        'price' => 999.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Basic design UI/UX design for web or mobile apps\n5-10 pages designed\nDelivery within 40 days"
                    ],
                ]
            ],
            [
                'name' => 'ux_design',
                'slug' => 'ux-design-service',
                'label' => 'UX Design',
                'heading' => 'UX Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 20,
                        'price' => 2299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Advanced design UI/UX design for web or mobile apps\n20-30 pages designed\nDelivery within 20 days\nDelivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 30,
                        'price' => 1799.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "User-friendly layouts focused on smooth navigation\nWireframes and high-fidelity mockups\nResponsive designs for all screen sizes",
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Advanced design UI/UX design for web or mobile apps\n20-30 pages designed\nAdvanced prototyping for each page\nDelivery within 30 days"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 40,
                        'price' => 1199.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Responsive designs for all screen sizes",
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Basic design UI/UX design for web or mobile apps\n10-20 pages designed\nDelivery within 40 days"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 40,
                        'price' => 999.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Basic design UI/UX design for web or mobile apps\n5-10 pages designed\nDelivery within 40 days"
                    ],
                ]
            ],
            [
                'name' => 'ui_design',
                'slug' => 'ui-design-service',
                'label' => 'UI Design',
                'heading' => 'UI Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 20,
                        'price' => 2299.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Advanced design UI/UX design for web or mobile apps\n20-30 pages designed\nDelivery within 20 days\nDelivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 30,
                        'price' => 1799.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "User-friendly layouts focused on smooth navigation\nWireframes and high-fidelity mockups\nResponsive designs for all screen sizes",
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Advanced design UI/UX design for web or mobile apps\n20-30 pages designed\nAdvanced prototyping for each page\nDelivery within 30 days"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 40,
                        'price' => 1199.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Responsive designs for all screen sizes",
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Basic design UI/UX design for web or mobile apps\n10-20 pages designed\nDelivery within 40 days"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 40,
                        'price' => 999.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => "Delivered in Figma, XD, or PSD formats\n100% ownership rights after final delivery",
                        'features' => "Basic design UI/UX design for web or mobile apps\n5-10 pages designed\nDelivery within 40 days"
                    ],
                ]
            ],
            [
                'name' => 'mobile_app_design',
                'slug' => 'mobile-app-design-service',
                'label' => 'Mobile App Design',
                'heading' => 'Mobile App Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 30,
                        'price' => 5000.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Custom Complete App design tailored for iOS or Android\nDelivery within 1 month\nScreen-by-screen design for core app flows\nTap-friendly layouts for easy navigation\nDelivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 60,
                        'price' => 3000.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Screen-by-screen design for core app flows\nTap-friendly layouts for easy navigation\nConsistent design system across all screens\nIcons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom Complete App design tailored for iOS or Android\nDelivery within 2 months"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 1500.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Screen-by-screen design for core app flows\nIcons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom App layout for your app\nDelivery within 1 month"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 60,
                        'price' => 1200.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Icons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom App layout for your app\nDelivery within 2 months"
                    ],
                ]
            ],
            [
                'name' => 'ios_app_design',
                'slug' => 'ios-app-design-service',
                'label' => 'Ios App Design',
                'heading' => 'iOS App Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 30,
                        'price' => 5000.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Custom Complete App design tailored for iOS or Android\nDelivery within 1 month\nScreen-by-screen design for core app flows\nTap-friendly layouts for easy navigation\nDelivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 45,
                        'price' => 3000.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Screen-by-screen design for core app flows\nTap-friendly layouts for easy navigation\nConsistent design system across all screens\nIcons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom Complete App design tailored for iOS or Android\nDelivery within 45 days"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 60,
                        'price' => 1500.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Screen-by-screen design for core app flows\nIcons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom App layout for your app\nDelivery within 2 months"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 60,
                        'price' => 1200.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Icons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom App layout for your app\nDelivery within 2 months"
                    ],
                ]
            ],
            [
                'name' => 'android_app_design',
                'slug' => 'android-app-design-service',
                'label' => 'Android App Design',
                'heading' => 'Android App Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 30,
                        'price' => 5000.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Custom Complete App design tailored for iOS or Android\nDelivery within 1 month\nScreen-by-screen design for core app flows\nTap-friendly layouts for easy navigation\nDelivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 45,
                        'price' => 3000.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Screen-by-screen design for core app flows\nTap-friendly layouts for easy navigation\nConsistent design system across all screens\nIcons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom Complete App design tailored for iOS or Android\nDelivery within 45 days"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 1500.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Screen-by-screen design for core app flows\nIcons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom App layout for your app\nDelivery within 1 month"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 60,
                        'price' => 1200.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Icons, buttons, and elements designed from scratch",
                        'plus' => "Delivered in Figma, XD, or Sketch formats\n100% ownership rights after final delivery",
                        'features' => "Custom App layout for your app\nDelivery within 2 months"
                    ],
                ]
            ],
            [
                'name' => 'business_card_design',
                'slug' => 'business-card-design',
                'label' => 'Business Card Design',
                'heading' => 'Business Card Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 50.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "3 advanced design variations\nDelivery within 2 days\n3 revisions included\nPrint-ready files (CMYK, 300 DPI) included\n100% ownership rights after delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 40.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom front and back design tailored to your brand\nClean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\nDesigned for both standard and custom card sizes\n100% ownership rights after delivery",
                        'features' => "3 advanced design variations\nDelivery within 4 days\nUp to 3 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 4,
                        'price' => 30.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Clean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\nDesigned for both standard and custom card sizes\n100% ownership rights after delivery",
                        'features' => "2 basic design variations\nDelivery within 4 days\nUp to 2 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 6,
                        'price' => 20.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Clean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\n100% ownership rights after delivery",
                        'features' => "1 basic design\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'birthday_card_design',
                'slug' => 'birthday-card-design-service',
                'label' => 'Birthday Card Design',
                'heading' => 'Birthday Card Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 50.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "3 advanced design variations\nDelivery within 2 days\n3 revisions included\nPrint-ready files (CMYK, 300 DPI) included\n100% ownership rights after delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 40.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom front and back design tailored to your brand\nClean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\nDesigned for both standard and custom card sizes\n100% ownership rights after delivery",
                        'features' => "3 advanced design variations\nDelivery within 4 days\nUp to 3 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 4,
                        'price' => 30.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Clean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\nDesigned for both standard and custom card sizes\n100% ownership rights after delivery",
                        'features' => "2 basic design variations\nDelivery within 4 days\nUp to 2 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 6,
                        'price' => 20.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Clean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\n100% ownership rights after delivery",
                        'features' => "1 basic design\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'greeting_card_design',
                'slug' => 'greeting-card-design-service',
                'label' => 'Greeting Card Design',
                'heading' => 'Greeting Card Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 50.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "3 advanced design variations\nDelivery within 2 days\n3 revisions included\nPrint-ready files (CMYK, 300 DPI) included\n100% ownership rights after delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 40.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom front and back design tailored to your brand\nClean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\nDesigned for both standard and custom card sizes\n100% ownership rights after delivery",
                        'features' => "3 advanced design variations\nDelivery within 4 days\nUp to 3 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 4,
                        'price' => 30.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Clean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\nDesigned for both standard and custom card sizes\n100% ownership rights after delivery",
                        'features' => "2 basic design variations\nDelivery within 4 days\nUp to 2 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 6,
                        'price' => 20.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Clean layout with easy-to-read contact details\nPrint-ready files (CMYK, 300 DPI)",
                        'plus' => "Delivered in PDF, PNG, and editable formats (AI, PSD)\n100% ownership rights after delivery",
                        'features' => "1 basic design\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'wedding_invitation_design',
                'slug' => 'wedding-invitation-design-service',
                'label' => 'Wedding Invitation Design',
                'heading' => 'Wedding Invitation Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Advanced invitation matching your wedding theme\nDelivery within 2 days\nUp to 5 revisions\nPrint-ready files (CMYK, 300 DPI) in PDF, PNG, JPG formats\n100% ownership rights after delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 60.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Advanced invitation matching your wedding theme\nFront and back design with names, date, venue & RSVP info\nElegant typography and handcrafted decorative elements\nOptions for single card, folded, or multiple inserts",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, PNG, JPG formats\nDigital version available for online sharing\n100% ownership rights after design completion",
                        'features' => "Advanced invitation matching your wedding theme\nDelivery within 4 days\nUp to 4 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 50.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Basic invitation matching your wedding theme\nFront and back design with names, date, venue & RSVP info\nElegant typography and handcrafted decorative elements\nOptions for single card, folded, or multiple inserts",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, PNG, JPG formats\nℹ️ 100% ownership rights after design completion",
                        'features' => "Basic invitation matching your wedding theme\nDelivery within 6 days\nUp to 3 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 8,
                        'price' => 30.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Basic invitation matching your wedding theme\nFront and back design with names, date, venue & RSVP info\nElegant typography and handcrafted decorative elements",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, PNG, JPG formats\n100% ownership rights after design completion",
                        'features' => "Basic invitation matching your wedding theme\nDelivery within 8 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'postcard_design',
                'slug' => 'postcard-design-service',
                'label' => 'Postcard Design',
                'heading' => 'Postcard Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Advanced design according to theme\nDelivery within 2 days\nUp to 5 revisions\nCustom front and back postcard design\nPrint-ready files (CMYK, 300 DPI) in PDF, PNG, and JPG formats\n100% ownership rights after delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 60.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Custom front and back postcard design\nEye-catching layout with clear messaging and strong visuals\nDesign for standard or custom postcard sizes\nSpace for address, stamp, and optional QR code",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, PNG, and JPG formats\nEditable source files (AI, PSD) included if needed\n100% ownership rights after delivery",
                        'features' => "Advanced design according to theme\nDelivery within 4 days\nUp to 3 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 50.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Design for standard or custom postcard sizes\nSpace for address, stamp, and optional QR code",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, PNG, and JPG formats\nEditable source files (AI, PSD) included if needed\n100% ownership rights after delivery",
                        'features' => "Basic design according to theme\nDelivery within 6 days\nUp to 4 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 8,
                        'price' => 40.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Space for address, stamp, and optional QR code",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, PNG, and JPG formats\n100% ownership rights after delivery",
                        'features' => "Basic design according to theme\nDelivery within 8 days\nUp to 3 revisions"
                    ],
                ]
            ],
            [
                'name' => 'packaging_design',
                'slug' => 'packaging-design-service',
                'label' => 'Packaging Design',
                'heading' => 'Packaging Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 4,
                        'price' => 1200.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Advanced packaging design tailored to your product and brand\nDelivery within 4 days\n6 revisions included\nIncludes front, back, sides, and top/bottom panel designs\nPrint-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 6,
                        'price' => 1000.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs\nBarcode, nutrition, ingredients, and legal info placement",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n3D mockups or realistic previews for visual reference\n100% ownership rights after final delivery",
                        'features' => "Advanced packaging design tailored to your product and brand\nDelivery within 6 days\nUp to 8 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 10,
                        'price' => 800.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n3D mockups or realistic previews for visual reference\n100% ownership rights after final delivery",
                        'features' => "Basic packaging design tailored to your product and brand\nDelivery within 10 days\nUp to 6 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 15,
                        'price' => 600.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs",
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n100% ownership rights after final delivery",
                        'features' => "Basic packaging design tailored to your product and brand\nDelivery within 15 days\nUp to 4 revisions"
                    ],
                ]
            ],

            [
                'name' => 'box_design', 
                'slug' => 'box-design-service', 
                'label' => 'Box Design', 
                'heading' => 'Box Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 4, 
                        'price' => 1200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "Advanced packaging design tailored to your product and brand\nDelivery within 4 days\nUp to 6 revisions\nFront, back, sides, and top/bottom panel designs\nPrint-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 6, 
                        'price' => 1000.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs\nBarcode, nutrition, ingredients, and legal info placement", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n3D mockups or realistic previews for visual reference\n100% ownership rights after final delivery", 
                        'features' => "Advanced packaging design tailored to your product and brand\nDelivery within 6 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 10, 
                        'price' => 800.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n3D mockups or realistic previews for visual reference\n100% ownership rights after final delivery", 
                        'features' => "Basic packaging design tailored to your product and brand\nDelivery within 10 days\nUp to 6 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 10, 
                        'price' => 600.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n100% ownership rights after final delivery", 
                        'features' => "Basic packaging design tailored to your product and brand\nDelivery within 15 days\nUp to 4 revisions"
                    ],
                ]
            ],
            [
                'name' => 'label_design', 
                'slug' => 'label-design-service', 
                'label' => 'Label Design', 
                'heading' => 'Label Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 4, 
                        'price' => 1200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "Advanced label design tailored to your product and brand\nDelivery within 4 days\n6 revisions included\nIncludes front, back, sides, and top/bottom panel designs\nPrint-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 6, 
                        'price' => 1000.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs\nBarcode, nutrition, ingredients, and legal info placement", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n3D mockups or realistic previews for visual reference\n100% ownership rights after final delivery", 
                        'features' => "Advanced label design tailored to your product and brand\nDelivery within 6 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 10, 
                        'price' => 800.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n3D mockups or realistic previews for visual reference\n100% ownership rights after final delivery", 
                        'features' => "Basic label design tailored to your product and brand\nDelivery within 10 days\nUp to 6 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 10, 
                        'price' => 600.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n100% ownership rights after final delivery", 
                        'features' => "Basic label design tailored to your product and brand\nDelivery within 15 days\nUp to 4 revisions"
                    ],
                ]
            ],
            [
                'name' => 'food_packaging_design', 
                'slug' => 'food-packaging-design-service', 
                'label' => 'Food Packaging Design', 
                'heading' => 'Food Packaging Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 4, 
                        'price' => 1200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "Advanced packaging design tailored to your product and brand\nDelivery within 4 days\n6 revisions included\nIncludes front, back, sides, and top/bottom panel designs\nPrint-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 6, 
                        'price' => 1000.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs\nBarcode, nutrition, ingredients, and legal info placement", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n3D mockups or realistic previews for visual reference\n100% ownership rights after final delivery", 
                        'features' => "Advanced packaging design tailored to your product and brand\nDelivery within 6 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 10, 
                        'price' => 800.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n3D mockups or realistic previews for visual reference\n100% ownership rights after final delivery", 
                        'features' => "Basic packaging design tailored to your product and brand\nDelivery within 10 days\nUp to 6 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 10, 
                        'price' => 600.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Die-line based designs ready for print and production\nFront, back, sides, and top/bottom panel designs", 
                        'plus' => "Print-ready files (CMYK, 300 DPI) in PDF, AI, and EPS formats\n100% ownership rights after final delivery", 
                        'features' => "Basic packaging design tailored to your product and brand\nDelivery within 15 days\nUp to 4 revisions"
                    ],
                ]
            ],
            [
                'name' => 't_shirt_design', 
                'slug' => 't-shirt-design-service', 
                'label' => 'T Shirt Design', 
                'heading' => 'T-Shirt Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 unique design variations\nDelivery within 5 days\n10 revisions included\nAdvanced t-shirt graphics based on your theme or idea\nFront, back, and sleeve design options included\nDesigned for screen printing, DTG, or heat press\nHigh-resolution print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Advanced t-shirt graphics based on your theme or idea\nFront, back, and sleeve design options\nDesign for screen printing, DTG, or heat press\nClean placement and sizing based on t-shirt type", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\nMockups included for visual preview on apparel\n100% ownership rights after final delivery", 
                        'features' => "8 unique design variations\nDelivery within 10 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Custom t-shirt graphics based on your theme or idea\nFront, back, and sleeve design options\nDesign for screen printing, DTG, or heat press", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\nMockups included for visual preview on apparel\n100% ownership rights after final delivery", 
                        'features' => "5 unique design variations\nDelivery within 10 days\nUp to 5 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Custom t-shirt graphics based on your theme or idea\nDesign for screen printing, DTG, or heat press", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery", 
                        'features' => "1 unique design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'hoodie_design', 
                'slug' => 'hoodie-design-service', 
                'label' => 'Hoodie Design', 
                'heading' => 'Hoodie Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 unique design variations\nDelivery within 5 days\n10 revisions included\nAdvanced graphics based on your theme or idea\nFront, back, and sleeve design options included\nDesigned for screen printing, DTG, or heat press\nHigh-resolution print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Advanced graphics based on your theme or idea\nFront, back, and sleeve design options\nDesign for screen printing, DTG, or heat press\nClean placement and sizing based on t-shirt type", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\nMockups included for visual preview on apparel\n100% ownership rights after final delivery", 
                        'features' => "8 unique design variations\nDelivery within 10 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Custom graphics based on your theme or idea\nFront, back, and sleeve design options\nDesign for screen printing, DTG, or heat press", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\nMockups included for visual preview on apparel\n100% ownership rights after final delivery", 
                        'features' => "5 unique design variations\nDelivery within 10 days\nUp to 5 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Custom graphics based on your theme or idea\nDesign for screen printing, DTG, or heat press", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery", 
                        'features' => "1 unique design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'jersey_design', 
                'slug' => 'jersey-design-service', 
                'label' => 'Jersey Design', 
                'heading' => 'Jersey Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 unique design variations\nDelivery within 5 days\n10 revisions included\nAdvanced graphics based on your theme or idea\nFront, back, and sleeve design options included\nDesigned for screen printing, DTG, or heat press\nHigh-resolution print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Advanced graphics based on your theme or idea\nFront, back, and sleeve design options\nDesign for screen printing, DTG, or heat press\nClean placement and sizing based on t-shirt type", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\nMockups included for visual preview on apparel\n100% ownership rights after final delivery", 
                        'features' => "8 unique design variations\nDelivery within 10 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Custom graphics based on your theme or idea\nFront, back, and sleeve design options\nDesign for screen printing, DTG, or heat press", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\nMockups included for visual preview on apparel\n100% ownership rights after final delivery", 
                        'features' => "5 unique design variations\nDelivery within 10 days\nUp to 5 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Custom graphics based on your theme or idea\nDesign for screen printing, DTG, or heat press", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery", 
                        'features' => "1 unique design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'custom_design_polo', 
                'slug' => 'polo-design-service', 
                'label' => 'Custom Design Polo', 
                'heading' => 'Custom Design Polo Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 unique design variations\nDelivery within 5 days\n10 revisions included\nAdvanced graphics based on your theme or idea\nFront, back, and sleeve design options included\nDesigned for screen printing, DTG, or heat press\nHigh-resolution print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Advanced graphics based on your theme or idea\nFront, back, and sleeve design options\nDesign for screen printing, DTG, or heat press\nClean placement and sizing based on t-shirt type", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\nMockups included for visual preview on apparel\n100% ownership rights after final delivery", 
                        'features' => "8 unique design variations\nDelivery within 10 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Custom graphics based on your theme or idea\nFront, back, and sleeve design options\nDesign for screen printing, DTG, or heat press", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\nMockups included for visual preview on apparel\n100% ownership rights after final delivery", 
                        'features' => "5 unique design variations\nDelivery within 10 days\nUp to 5 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Custom graphics based on your theme or idea\nDesign for screen printing, DTG, or heat press", 
                        'plus' => "High-resolution print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery", 
                        'features' => "1 unique design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'tote_bag_design', 
                'slug' => 'tote-bag-design-service', 
                'label' => 'Tote Bag Design', 
                'heading' => 'Tote Bag Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 unique design variations\nDelivery within 5 days\n10 revisions included\nPrint-ready files (PNG, PDF, AI, PSD) in high-resolution\n100% ownership rights after final design delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Front and back design options\nDesign for screen printing, embroidery, or digital print\nAccurate sizing and placement for standard tote dimensions", 
                        'plus' => "Print-ready files (PNG, PDF, AI, PSD) in high resolution\nIncludes mockups for real-world preview\n100% ownership rights after final design delivery", 
                        'features' => "8 unique design variations\nDelivery within 10 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Front and back design options\nDesign for screen printing, embroidery, or digital print\nAccurate sizing and placement for standard tote dimensions", 
                        'plus' => "Print-ready files (PNG, PDF, AI, PSD) in high resolution\n100% ownership rights after final design delivery", 
                        'features' => "5 unique design variations\nDelivery within 10 days\nUp to 5 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Accurate sizing and placement for standard tote dimensions", 
                        'plus' => "Print-ready files (PNG, PDF, AI, PSD) in high resolution\n100% ownership rights after final design delivery", 
                        'features' => "1 unique design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'cup_design', 
                'slug' => 'cup-design-service', 
                'label' => 'Cup Design', 
                'heading' => 'Cup Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 unique design variations\nDelivery within 5 days\n10 revisions included\nPrint-ready files (CMYK, 300 DPI) in PNG, PDF, AI, PSD formats\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Wrap-around and single-side artwork options\nDesign for mugs, paper cups, travel cups, and more\nPrint-ready files (CMYK, 300 DPI) in PNG, PDF, AI, PSD formats\nAccurate layout based on cup size and print method", 
                        'plus' => "Mockups included to preview the design on cups\n100% ownership rights after final delivery", 
                        'features' => "8 unique design variations\nDelivery within 10 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Wrap-around and single-side artwork options\nDesign for mugs, paper cups, travel cups, and more\nPrint-ready files (CMYK, 300 DPI) in PNG, PDF, AI, PSD formats\nAccurate layout based on cup size and print method", 
                        'plus' => "100% ownership rights after final delivery", 
                        'features' => "5 unique design variations\nDelivery within 10 days\nUp to 5 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Print-ready files (CMYK, 300 DPI) in PNG, PDF, AI, PSD formats\nAccurate layout based on cup size and print method", 
                        'plus' => "100% ownership rights after final delivery", 
                        'features' => "1 unique design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'mug_design', 
                'slug' => 'mug-design-service', 
                'label' => 'Mug Design', 
                'heading' => 'Mug Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 unique design variations\nDelivery within 5 days\nUp to 10 revisions\nPrint-ready files (CMYK, 300 DPI) in PNG, PDF, AI, PSD formats\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Wrap-around and single-side artwork options\nDesign for mugs, paper cups, travel cups, and more\nPrint-ready files (CMYK, 300 DPI) in PNG, PDF, AI, PSD formats\nAccurate layout based on mug size and print method", 
                        'plus' => "Mockups included to preview the design on mugs\n100% ownership rights after final delivery", 
                        'features' => "8 unique design variations\nDelivery within 10 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Wrap-around and single-side artwork options\nDesign for mugs, paper cups, travel cups, and more\nPrint-ready files (CMYK, 300 DPI) in PNG, PDF, AI, PSD formats\nAccurate layout based on mug size and print method", 
                        'plus' => "100% ownership rights after final delivery", 
                        'features' => "5 unique design variations\nDelivery within 10 days\nUp to 5 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Print-ready files (CMYK, 300 DPI) in PNG, PDF, AI, PSD formats\nAccurate layout based on mug size and print method", 
                        'plus' => "100% ownership rights after final delivery", 
                        'features' => "1 unique design\nDelivery within 2 days\nUp to 2 revisions included"
                    ],
                ]
            ],
            [
                'name' => 'cap_design', 
                'slug' => 'cap-design-service', 
                'label' => 'Cap Design', 
                'heading' => 'Cap Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 unique design variations\nDelivery within 5 days\n10 revisions included\nPrint-ready files (AI, PSD, PNG, PDF) in high resolution\n100% ownership rights after design completion"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Front, side, and back panel artwork options\nDesign for embroidery, screen printing, or heat transfer\nPrint-ready files (AI, PSD, PNG, PDF) in high resolution\nAccurate placement and sizing based on cap type and fit", 
                        'plus' => "Includes mockups to visualize the design on different cap styles\n100% ownership rights after design completion", 
                        'features' => "8 unique design variations\nDelivery within 10 days\nUp to 8 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Front, side, and back panel artwork options\nPrint-ready files (AI, PSD, PNG, PDF) in high resolution\nAccurate placement and sizing based on cap type and fit\nMockups to visualize the design on different cap styles", 
                        'plus' => "100% ownership rights after design completion", 
                        'features' => "5 unique design variations\nDelivery within 10 days\nUp to 5 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' =>  2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Print-ready files (AI, PSD, PNG, PDF) in high resolution\nAccurate placement and sizing based on cap type and fit", 
                        'plus' => "100% ownership rights after design completion", 
                        'features' => "1 unique design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'flyer_design', 
                'slug' => 'flyer-design-service', 
                'label' => 'Flyer Design', 
                'heading' => 'Flyer Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 2, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 4, 
                        'price' => 120.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery", 
                        'features' => "3 advanced and customized design concepts\nDelivery within 4 days\nUp to 4 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 4, 
                        'price' => 100.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "2 basic and customized design concepts\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 8, 
                        'price' => 70.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision"
                    ],
                ]
            ],
            [
                'name' => 'poster_design', 
                'slug' => 'poster-design-service', 
                'label' => 'Poster Design', 
                'heading' => 'Poster Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 2, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 4, 
                        'price' => 120.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery", 
                        'features' => "2 advanced and customized design concepts\nDelivery within 4 days\nUp to 4 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 4, 
                        'price' => 100.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 8, 
                        'price' => 70.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision"
                    ],
                ]
            ],
            [
                'name' => 'magazine_design', 
                'slug' => 'magazine-design-service', 
                'label' => 'Magazine Design', 
                'heading' => 'Magazine Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 7, 
                        'price' => 500.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "Design and Layout for Unlimited pages\nDelivery within 7 days\nIncludes up to 2 revisions\nDesigned for both print and digital publishing\nDelivered in print-ready formats (PDF, INDD) + source files\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 14, 
                        'price' => 400.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Cover design + inner pages with clean visual flow\nDesign for both print and digital publishing\nTypography and grid system for easy readability\nTOC, article styling, ad space layout, and more", 
                        'plus' => "Delivered in print-ready formats (PDF, INDD) + source files\n100% ownership rights after final delivery", 
                        'features' => "Design and Layout for Unlimited pages\nDelivery within 14 days\nUp to 6 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 30, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Cover design + inner pages with clean visual flow\nDesign for both print and digital publishing\nTypography and grid system for easy readability", 
                        'plus' => "Delivered in print-ready formats (PDF, INDD) + source files\n100% ownership rights after final delivery", 
                        'features' => "Design and Layout for up to 50 pages\nDelivery within 30 days\nUp to 4 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 30, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Design for both print and digital publishing\nTypography and grid system for easy readability", 
                        'plus' => "Delivered in print-ready formats (PDF, INDD) + source files\n100% ownership rights after final delivery", 
                        'features' => "Design and Layout for up to 30 pages\nDelivery within 20 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'brochure_design', 
                'slug' => 'brochure-design-service', 
                'label' => 'Brochure Design', 
                'heading' => 'Brochure Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 2, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 4, 
                        'price' => 120.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery", 
                        'features' => "2 advanced and customized design concepts\nDelivery within 4 days\nUp to 4 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 4, 
                        'price' => 100.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 8, 
                        'price' => 70.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision"
                    ],
                ]
            ],
            [
                'name' => 'pamphlet_design', 
                'slug' => 'pamphlet-design-service', 
                'label' => 'Pamphlet Design', 
                'heading' => 'Pamphlet Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 7, 
                        'price' => 300.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "Design and Layout for Unlimited pages\nDelivery within 7 days\nIncludes up to 2 revisions\nDesign for both print and digital publishing\nDelivered in print-ready formats (PDF, INDD) + source files\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 14, 
                        'price' => 250.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Cover design + inner pages with clean visual flow\nDesign for both print and digital publishing\nTypography and grid system for easy readability\nTOC, article styling, ad space layout, and more", 
                        'plus' => "Delivered in print-ready formats (PDF, INDD) + source files\n100% ownership rights after final delivery", 
                        'features' => "Design and Layout for Unlimited pages\nDelivery within 14 days\nUp to 6 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 30, 
                        'price' => 200.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Cover design + inner pages with clean visual flow\nDesign for both print and digital publishing\nTypography and grid system for easy readability", 
                        'plus' => "Delivered in print-ready formats (PDF, INDD) + source files\n100% ownership rights after final delivery", 
                        'features' => "Design and Layout for up to 20 pages\nDelivery within 30 days\nUp to 4 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 30, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Design for both print and digital publishing\nTypography and grid system for easy readability", 
                        'plus' => "Delivered in print-ready formats (PDF, INDD) + source files\n100% ownership rights after final delivery", 
                        'features' => "Design and Layout for up to 10 pages\nDelivery within 20 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'banner_design', 
                'slug' => 'banner-design-service', 
                'label' => 'Banner Design', 
                'heading' => 'Banner Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 2, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 4, 
                        'price' => 120.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery", 
                        'features' => "2 advanced and customized design concepts\nDelivery within 4 days\nUp to 4 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 4, 
                        'price' => 100.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 8, 
                        'price' => 70.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision"
                    ],
                ]
            ],
            [
                'name' => 'sticker_design', 
                'slug' => 'sticker-design-service', 
                'label' => 'Sticker Design', 
                'heading' => 'Sticker Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 custom sticker designs based on your brand, theme, or idea\nDelivery within 5 days\nIncludes 10 revisions\nHigh-resolution, print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 120.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Unique shapes and styles (die-cut, round, square, label, etc.)\nHigh-resolution, print-ready files (PNG, PDF, AI, PSD)\nDesign for various uses—product labels, packaging, branding, or personal use\nWhite border or bleed area setup for precise cutting", 
                        'plus' => "Mockups included to preview sticker look on surfaces\n100% ownership rights after final delivery", 
                        'features' => "10 custom sticker designs based on your brand, theme, or idea\nDelivery within 10 days\nUp to 10 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 90.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Unique shapes and styles (die-cut, round, square, label, etc.)\nHigh-resolution, print-ready files (PNG, PDF, AI, PSD)\nDesign for various uses—product labels, packaging, branding, or personal use\nWhite border or bleed area setup for precise cutting", 
                        'plus' => "100% ownership rights after final delivery", 
                        'features' => "7 custom sticker designs based on your brand, theme, or idea\nDelivery within 7 days\nUp to 7 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 10.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-resolution, print-ready files (PNG, PDF, AI, PSD)\nDesign for various uses—product labels, packaging, branding, or personal use", 
                        'plus' => "100% ownership rights after final delivery", 
                        'features' => "1 custom sticker design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'envelope_design', 
                'slug' => 'envelope-design-service', 
                'label' => 'Envelope Design', 
                'heading' => 'Envelope Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 5, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "10 custom sticker designs based on your brand, theme, or idea\nDelivery within 5 days\nIncludes 10 revisions\nHigh-resolution, print-ready files (PNG, PDF, AI, PSD)\n100% ownership rights after final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 10, 
                        'price' => 120.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Front and back design with proper alignment for printing\nOptions for standard sizes (DL, A2, A7, etc.)\nLogo placement, return address, and message area\nPrint-ready files (CMYK, 300 DPI) in PDF, PNG, AI formats\nDesign for corporate, marketing, or personal use", 
                        'plus' => "Mockups included for visual preview before printing\n100% ownership rights after final delivery", 
                        'features' => "10 Custom envelope designs tailored to your brand or occasion\nDelivery within 10 days\nUp to 10 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 5, 
                        'price' => 90.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Front and back design with proper alignment for printing\nOptions for standard sizes (DL, A2, A7, etc.)\nPrint-ready files (CMYK, 300 DPI) in PDF, PNG, AI formats\nDesigned for corporate, marketing, or personal use", 
                        'plus' => "100% ownership rights after final delivery", 
                        'features' => "7 Custom envelope design tailored to your brand or occasion\nDelivery within 7 days\nUp to 7 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 2, 
                        'price' => 20.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "Options for standard sizes (DL, A2, A7, etc.)\nPrint-ready files (CMYK, 300 DPI) in PDF, PNG, AI formats", 
                        'plus' => "100% ownership rights after final delivery", 
                        'features' => "1 custom sticker design\nDelivery within 2 days\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'magazine_cover_design', 
                'slug' => 'magazine-cover-design-service', 
                'label' => 'Magazine Cover Design', 
                'heading' => 'Magazine Cover Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 2, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 4, 
                        'price' => 120.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery", 
                        'features' => "2 advanced and customized design concepts\nDelivery within 4 days\nUp to 4 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 4, 
                        'price' => 100.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 8, 
                        'price' => 70.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision"
                    ],
                ]
            ],
            [
                'name' => 'ebook_cover_design', 
                'slug' => 'ebook-cover-design', 
                'label' => 'Ebook Cover Design', 
                'heading' => 'Ebook Cover Design Pricing',
                'plans' => [
                    [ 
                        'priority' => 4, 
                        'name' => 'priority_design', 
                        'label' => 'Priority Design', 
                        'duration_days' => 2, 
                        'price' => 150.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => null, 
                        'plus' => null, 
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [ 
                        'priority' => 3, 
                        'name' => 'gold_plan', 
                        'label' => 'Gold Plan', 
                        'duration_days' => 4, 
                        'price' => 120.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery", 
                        'features' => "2 advanced and customized design concepts\nDelivery within 4 days\nUp to 4 revisions"
                    ],
                    [ 
                        'priority' => 2, 
                        'name' => 'silver_plan', 
                        'label' => 'Silver Plan', 
                        'duration_days' => 4, 
                        'price' => 100.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 6 days\nUp to 2 revisions"
                    ],
                    [ 
                        'priority' => 1, 
                        'name' => 'bronze_plan', 
                        'label' => 'Bronze Plan', 
                        'duration_days' => 8, 
                        'price' => 70.00, 
                        'currency' => 'USD', 
                        'symbol' => '$', 
                        'include' => "High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)", 
                        'plus' => "100% ownership rights upon final delivery", 
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision"
                    ],
                ]
                ],
            
            [
                'name' => 'book_design',
                'slug' => 'book-design-service',
                'label' => 'Book Design',
                'heading' => 'Book Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 7,
                        'price' => 2000.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => 'Print-ready files (PDF for print, ePub/MOBI for digital)\n100% ownership rights after final delivery',
                        'features' => "Custom design of unlimited pages (front, spine, and back) based on your genre and audience\nDelivery within 7 days\n2 revisions included\nDesigned for print and digital formats (paperback, hardcover, eBook)\nPrint-ready files (PDF for print, ePub/MOBI for digital)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 14,
                        'price' => 1500.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Interior layout design for chapters, headings, and body text\nDesign for print and digital formats (paperback, hardcover, eBook)\nProfessional typography and spacing for easy reading\nPage numbering, margins, and alignment set for publishing standards\nTOC, copyright, author bio, and other standard pages',
                        'plus' => 'Print-ready files (PDF for print, ePub/MOBI for digital)\n100% ownership rights after final delivery',
                        'features' => "Custom design of unlimited pages (front, spine, and back) based on your genre and audience\nDelivery within 14 days\nUp to 4 revisions\nInterior layout design for chapters, headings, and body text\nDesign for print and digital formats (paperback, hardcover, eBook)\nProfessional typography and spacing for easy reading\nPage numbering, margins, and alignment set for publishing standards\nTOC, copyright, author bio, and other standard pages\nPrint-ready files (PDF for print, ePub/MOBI for digital)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 1200.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Interior layout design for chapters, headings, and body text\nDesign for print and digital formats (paperback, hardcover, eBook)\nTOC, copyright, author bio, and other standard pages',
                        'plus' => 'Print-ready files (PDF for print, ePub/MOBI for digital)\n100% ownership rights after final delivery',
                        'features' => "Custom design of up to 50 pages (front, spine, and back) based on your genre and audience\nDelivery within 30 days\nUp to 2 revisions\nInterior layout design for chapters, headings, and body text\nDesign for print and digital formats (paperback, hardcover, eBook)\nTOC, copyright, author bio, and other standard pages\nPrint-ready files (PDF for print, ePub/MOBI for digital)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 30,
                        'price' => 900.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Design for print and digital formats (paperback, hardcover, eBook)\nTOC, copyright, author bio, and other standard pages',
                        'plus' => 'Print-ready files (PDF for print, ePub/MOBI for digital)\n100% ownership rights after final delivery',
                        'features' => "Custom design of up to 30 pages (front, spine, and back) based on your genre and audience\nDelivery within 30 days\nSingle revision\nDesign for print and digital formats (paperback, hardcover, eBook)\nTOC, copyright, author bio, and other standard pages\nPrint-ready files (PDF for print, ePub/MOBI for digital)\n100% ownership rights after final delivery"
                    ],
                ]
            ],
            [
                'name' => 'book_cover_design',
                'slug' => 'book-cover-design-service',
                'label' => 'Book Cover Design',
                'heading' => 'Book Cover Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 120.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => 'Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery',
                        'features' => "2 advanced and customized design concepts\nDelivery within 4 days\nUp to 4 revisions\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\nMockups included for visualizing the final design in context\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 basic and customized design concept\nDelivery within 6 days\nUp to 2 revisions\nHigh-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 8,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                ]
            ],
            [
                'name' => 'booklet_design',
                'slug' => 'booklet-design-service',
                'label' => 'Booklet Design',
                'heading' => 'Booklet Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 7,
                        'price' => 300.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights after final delivery',
                        'features' => "Design for unlimited pages\nDelivery within 7 days\n4 revisions included\nMultiple size options (A5, A4, square, etc.) with proper bleed and margins\nPrint-ready formats (PDF, AI, INDD) designed for saddle-stitch or perfect binding\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 14,
                        'price' => 250.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Custom cover and inside page design based on your purpose (marketing, info, event, etc.)\nClean, professional layout with page flow that suits your content\nMultiple size options (A5, A4, square, etc.) with proper bleed and margins\nPrint-ready formats (PDF, AI, INDD) designed for saddle-stitch or perfect binding\nTypography and image placement designed for easy reading and strong visual appeal\nTable of contents, contact details, and call-to-action sections included if needed',
                        'plus' => 'Mockups included to preview final booklet appearance\n100% ownership rights after final delivery',
                        'features' => "Design for unlimited pages\nDelivery within 14 days\nUp to 4 revisions\nCustom cover and inside page design based on your purpose (marketing, info, event, etc.)\nClean, professional layout with page flow that suits your content\nMultiple size options (A5, A4, square, etc.) with proper bleed and margins\nPrint-ready formats (PDF, AI, INDD) designed for saddle-stitch or perfect binding\nTypography and image placement designed for easy reading and strong visual appeal\nTable of contents, contact details, and call-to-action sections included if needed\nMockups included to preview final booklet appearance\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 200.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Clean, professional layout with page flow that suits your content\nMultiple size options (A5, A4, square, etc.) with proper bleed and margins\nPrint-ready formats (PDF, AI, INDD) designed for saddle-stitch or perfect binding\nTypography and image placement designed for easy reading and strong visual appeal',
                        'plus' => 'Mockups included to preview final booklet appearance\n100% ownership rights after final delivery',
                        'features' => "Design for up to 20 pages\nDelivery within 30 days\nUp to 2 revisions\nClean, professional layout with page flow that suits your content\nMultiple size options (A5, A4, square, etc.) with proper bleed and margins\nPrint-ready formats (PDF, AI, INDD) designed for saddle-stitch or perfect binding\nTypography and image placement designed for easy reading and strong visual appeal\nMockups included to preview final booklet appearance\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 30,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Clean, professional layout with page flow that suits your content\nMultiple size options (A5, A4, square, etc.) with proper bleed and margins\nPrint-ready formats (PDF, AI, INDD) designed for saddle-stitch or perfect binding\nTypography and image placement designed for easy reading and strong visual appeal',
                        'plus' => '100% ownership rights after final delivery',
                        'features' => "Design for up to 10 pages\nDelivery within 30 days\nSingle revision\nClean, professional layout with page flow that suits your content\nMultiple size options (A5, A4, square, etc.) with proper bleed and margins\nPrint-ready formats (PDF, AI, INDD) designed for saddle-stitch or perfect binding\nTypography and image placement designed for easy reading and strong visual appeal\n100% ownership rights after final delivery"
                    ],
                ]
            ],
            [
                'name' => 'album_cover_design',
                'slug' => 'album-cover-design-service',
                'label' => 'Album Cover Design',
                'heading' => 'Album Cover Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 120.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => 'Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery',
                        'features' => "2 advanced and customized design concepts\nDelivery within 4 days\nUp to 4 revisions\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\nMockups included for visualizing the final design in context\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 basic and customized design concept\nDelivery within 6 days\nUp to 2 revisions\nHigh-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 8,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                ]
            ],
            [
                'name' => 'letter_design',
                'slug' => 'letter-design-service',
                'label' => 'Letter Design',
                'heading' => 'Letter Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 10,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights after final delivery',
                        'features' => "10 unique designs\nDelivery within 10 days\n10 revisions included\nSuitable for both print and digital use (PDF, DOCX formats)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 10,
                        'price' => 120.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Professionally designed letterhead layout with your branding\nCustom header and footer with logo, contact info, and date space\nClean typography and spacing for formal and readable content\nSuitable for both print and digital use (PDF, DOCX formats)\nMultiple layout options – corporate, creative, or minimal',
                        'plus' => 'Designed to match your business identity or stationery set\n100% ownership rights after final delivery',
                        'features' => "10 unique designs\nDelivery within 10 days\nUp to 10 revisions\nProfessionally designed letterhead layout with your branding\nCustom header and footer with logo, contact info, and date space\nClean typography and spacing for formal and readable content\nSuitable for both print and digital use (PDF, DOCX formats)\nMultiple layout options – corporate, creative, or minimal\nDesigned to match your business identity or stationery set\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 5,
                        'price' => 90.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Custom header and footer with logo, contact info, and date space\nClean typography and spacing for formal and readable content\nSuitable for both print and digital use (PDF, DOCX formats)',
                        'plus' => 'Designed to match your business identity or stationery set\n100% ownership rights after final delivery',
                        'features' => "5 unique designs\nDelivery within 5 days\nUp to 5 revisions\nCustom header and footer with logo, contact info, and date space\nClean typography and spacing for formal and readable content\nSuitable for both print and digital use (PDF, DOCX formats)\nDesigned to match your business identity or stationery set\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 2,
                        'price' => 15.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Clean typography and spacing for formal and readable content\nSuitable for both print and digital use (PDF, DOCX formats)',
                        'plus' => 'Designed to match your business identity or stationery set\n100% ownership rights after final delivery',
                        'features' => "1 uniquely designed letter\nDelivery within 2 days\nUp to 2 revisions\nClean typography and spacing for formal and readable content\nSuitable for both print and digital use (PDF, DOCX formats)\nDesigned to match your business identity or stationery set\n100% ownership rights after final delivery"
                    ],
                ]
            ],
            [
                'name' => 'menu_design',
                'slug' => 'menu-design-service',
                'label' => 'Menu Design',
                'heading' => 'Menu Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 7,
                        'price' => 300.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights after final delivery',
                        'features' => "Custom menu design of unlimited pages based on your food brand theme\nDelivery within 7 days\nClear sections for food categories, pricing, and specials\nHigh-resolution, print-ready files (PDF, PNG, AI)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 7,
                        'price' => 250.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Menu board design\nMultiple size and fold options (single page, bi-fold, tri-fold, digital)\nClear sections for food categories, pricing, and specials\nDesign for easy readability and quick decision-making\nHigh-resolution, print-ready files (PDF, PNG, AI)\nOption to include QR code for digital menus',
                        'plus' => 'Visual elements like icons or food images (if provided) for added appeal\n100% ownership rights after final delivery',
                        'features' => "Custom menu design of unlimited pages based on your food brand theme\nDelivery within 7 days\nMenu board design\nMultiple size and fold options (single page, bi-fold, tri-fold, digital)\nClear sections for food categories, pricing, and specials\nDesign for easy readability and quick decision-making\nHigh-resolution, print-ready files (PDF, PNG, AI)\nOption to include QR code for digital menus\nVisual elements like icons or food images (if provided) for added appeal\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 10,
                        'price' => 200.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Menu board design\nClear sections for food categories, pricing, and specials\nDesign for easy readability and quick decision-making\nHigh-resolution, print-ready files (PDF, PNG, AI)',
                        'plus' => 'Visual elements like icons or food images (if provided) for added appeal\n100% ownership rights after final delivery',
                        'features' => "Custom menu design of up to 6 pages based on your food brand theme\nDelivery within 10 days\nMenu board design\nClear sections for food categories, pricing, and specials\nDesign for easy readability and quick decision-making\nHigh-resolution, print-ready files (PDF, PNG, AI)\nVisual elements like icons or food images (if provided) for added appeal\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 14,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Clear sections for food categories, pricing, and specials\nDesign for easy readability and quick decision-making\nHigh-resolution, print-ready files (PDF, PNG, AI)',
                        'plus' => 'Visual elements like icons or food images (if provided) for added appeal\n100% ownership rights after final delivery',
                        'features' => "Custom menu design of up to 3 pages based on your food brand theme\nDelivery within 14 days\nClear sections for food categories, pricing, and specials\nDesign for easy readability and quick decision-making\nHigh-resolution, print-ready files (PDF, PNG, AI)\nVisual elements like icons or food images (if provided) for added appeal\n100% ownership rights after final delivery"
                    ],
                ]
            ],
            [
                'name' => 'powerpoint_design',
                'slug' => 'powerpoint-design-service',
                'label' => 'Powerpoint Design',
                'heading' => 'PowerPoint Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 7,
                        'price' => 300.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights after final delivery',
                        'features' => "Unlimited custom-designed slides based on your content and brand style\nDelivery within 7 days\n2 revisions included\nDelivered in editable PPTX format + PDF version\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 14,
                        'price' => 250.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Professional layout with clear visuals and consistent formatting\nTitle slides, content slides, charts, infographics, and icons\nDesign for business, pitch decks, reports, webinars, or events\nAnimation and transitions added',
                        'plus' => 'Delivered in editable PPTX format + PDF version\nOptimized for both screen presentation and print\n100% ownership rights after final delivery',
                        'features' => "Unlimited custom-designed slides based on your content and brand style\nDelivery within 14 days\nUp to 4修订\nProfessional layout with clear visuals and consistent formatting\nTitle slides, content slides, charts, infographics, and icons\nDesign for business, pitch decks, reports, webinars, or events\nAnimation and transitions added\nDelivered in editable PPTX format + PDF version\nOptimized for both screen presentation and print\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 30,
                        'price' => 200.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Professional layout with clear visuals and consistent formatting\nDesigned for business, pitch decks, reports, webinars, or events',
                        'plus' => 'Delivered in editable PPTX format + PDF version\nOptimized for both screen presentation and print\n100% ownership rights after final delivery',
                        'features' => "20 Custom-designed slides based on your content and brand style\nDelivery within 30 days\nUp to 2 revisions\nProfessional layout with clear visuals and consistent formatting\nDesigned for business, pitch decks, reports, webinars, or events\nDelivered in editable PPTX format + PDF version\nOptimized for both screen presentation and print\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 30,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Professional layout with clear visuals and consistent formatting',
                        'plus' => 'Delivered in editable PPTX format + PDF version\n100% ownership rights after final delivery',
                        'features' => "10 Custom-designed slides based on your content and brand style\nDelivery within 30 days\nUp to 2 revisions\nProfessional layout with clear visuals and consistent formatting\nDelivered in editable PPTX format + PDF version\n100% ownership rights after final delivery"
                    ],
                ]
            ],
            [
                'name' => 'timeline_design',
                'slug' => 'timeline-design-service',
                'label' => 'Timeline Design',
                'heading' => 'Timeline Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 7,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights after final delivery',
                        'features' => "3 custom timeline designs tailored to your purpose (project, history, event, roadmap, etc.)\nDelivery within 7 days\n4 revisions included\nDelivered in high-resolution print and web-friendly formats (PDF, PNG, AI)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 14,
                        'price' => 120.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Visual layout that clearly shows stages, dates, or milestones\nChoice of vertical, horizontal, circular, or creative formats\nBranded colors, icons, and fonts to match your style\nDelivery in high-resolution print and web-friendly formats (PDF, PNG, AI)',
                        'plus' => 'Designed for use in reports, presentations, websites, or prints\n100% ownership rights after final delivery',
                        'features' => "3 custom timeline designs tailored to your purpose (project, history, event, roadmap, etc.)\nProfessional graphs and charts included\nDelivery within 14 days\nUp to 3 revisions\nVisual layout that clearly shows stages, dates, or milestones\nChoice of vertical, horizontal, circular, or creative formats\nBranded colors, icons, and fonts to match your style\nDelivery in high-resolution print and web-friendly formats (PDF, PNG, AI)\nDesigned for use in reports, presentations, websites, or prints\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 14,
                        'price' => 90.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Visual layout that clearly shows stages, dates, or milestones\nBranded colors, icons, and fonts to match your style\nDelivery in high-resolution print and web-friendly formats (PDF, PNG, AI)',
                        'plus' => 'Designed for use in reports, presentations, websites, or prints\n100% ownership rights after final delivery',
                        'features' => "2 custom timeline designs tailored to your purpose (project, history, event, roadmap, etc.)\nDelivery within 14 days\n2 revisions included\nVisual layout that clearly shows stages, dates, or milestones\nBranded colors, icons, and fonts to match your style\nDelivery in high-resolution print and web-friendly formats (PDF, PNG, AI)\nDesigned for use in reports, presentations, websites, or prints\n100% ownership rights",   'features' => "2 custom timeline designs tailored to your purpose (project, history, event, roadmap, etc.)\nDelivery within 14 days\n2 revisions included\nVisual layout that clearly shows stages, dates, or milestones\nBranded colors, icons, and fonts to match your style\nDelivery in high-resolution print and web-friendly formats (PDF, PNG, AI)\nDesigned for use in reports, presentations, websites, or prints\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 20,
                        'price' => 50.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Branded colors, icons, and fonts to match your style\nDelivery in high-resolution print and web-friendly formats (PDF, PNG, AI)',
                        'plus' => 'Designed for use in reports, presentations, websites, or prints\n100% ownership rights after final delivery',
                        'features' => "1 custom timeline design tailored to your purpose (project, history, event, roadmap, etc.)\nDelivery within 20 days\nSingle revision\nBranded colors, icons, and fonts to match your style\nDelivery in high-resolution print and web-friendly formats (PDF, PNG, AI)\nDesigned for use in reports, presentations, websites, or prints\n100% ownership rights after final delivery"
                    ],
                ]
            ],
            [
                'name' => 'resume_design',
                'slug' => 'resume-design-service',
                'label' => 'Resume Design',
                'heading' => 'Resume Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 3,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => 'Print-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery',
                        'features' => "6 page professionally designed resume tailored to your industry and role\nDelivery within 3 days\n3 revisions included\nDelivery in editable formats (DOCX, PDF, AI)\nPrint-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 5,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Custom styling for fonts, colors, and sections to highlight your strengths\nFormats available: Modern, Creative, Minimal, or Corporate\nSections like profile summary, experience, skills, education, and contact\nDelivery in editable formats (DOCX, PDF, AI)',
                        'plus' => 'Print-ready and ATS (Applicant Tracking System) friendly versions available\nOptional add-on: matching cover letter or portfolio page\n100% ownership rights after final delivery',
                        'features' => "6 page professionally designed resume tailored to your industry and role\nDelivery within 5 days\nUp to 3 revisions\nCustom styling for fonts, colors, and sections to highlight your strengths\nFormats available: Modern, Creative, Minimal, or Corporate\nSections like profile summary, experience, skills, education, and contact\nDelivery in editable formats (DOCX, PDF, AI)\nPrint-ready and ATS (Applicant Tracking System) friendly versions available\nOptional add-on: matching cover letter or portfolio page\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 7,
                        'price' => 60.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Custom styling for fonts, colors, and sections to highlight your strengths\nFormats available: Modern, Creative, Minimal, or Corporate\nDelivery in editable formats (DOCX, PDF, AI)',
                        'plus' => 'Print-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery',
                        'features' => "3 page professionally designed resume tailored to your industry and role\nDelivery within 7 days\nUp to 2 revisions\nCustom styling for fonts, colors, and sections to highlight your strengths\nFormats available: Modern, Creative, Minimal, or Corporate\nDelivery in editable formats (DOCX, PDF, AI)\nPrint-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 5,
                        'price' => 30.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Custom styling for fonts, colors, and sections to highlight your strengths\nDelivery in editable formats (DOCX, PDF, AI)',
                        'plus' => 'Print-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery',
                        'features' => "Single page resume design for resume tailored to your industry and role\nDelivery within 5 days\nSingle revision\nCustom styling for fonts, colors, and sections to highlight your strengths\nDelivery in editable formats (DOCX, PDF, AI)\nPrint-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery"
                    ],
                ]
            ],
            [
                'name' => 'portfolio_design',
                'slug' => 'portfolio-design-service',
                'label' => 'Portfolio Design',
                'heading' => 'Portfolio Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 3,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => 'Print-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery',
                        'features' => "6 page professionally designed portfolio tailored to your industry and role\nDelivery within 3 days\n3 revisions included\nDelivered in editable formats (DOCX, PDF, AI)\nPrint-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 5,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Custom styling for fonts, colors, and sections to highlight your strengths\nFormats available: Modern, Creative, Minimal, or Corporate\nSections like profile summary, experience, skills, education, and contact\nDelivery in editable formats (DOCX, PDF, AI)',
                        'plus' => 'Print-ready and ATS (Applicant Tracking System) friendly versions available\nOptional add-on: matching cover letter\n100% ownership rights after final delivery',
                        'features' => "6 page professionally designed portfolio tailored to your industry and role\nDelivery within 5 days\nUp to 3 revisions\nCustom styling for fonts, colors, and sections to highlight your strengths\nFormats available: Modern, Creative, Minimal, or Corporate\nSections like profile summary, experience, skills, education, and contact\nDelivery in editable formats (DOCX, PDF, AI)\nPrint-ready and ATS (Applicant Tracking System) friendly versions available\nOptional add-on: matching cover letter\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 7,
                        'price' => 60.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Custom styling for fonts, colors, and sections to highlight your strengths\nFormats available: Modern, Creative, Minimal, or Corporate\nDelivery in editable formats (DOCX, PDF, AI)',
                        'plus' => 'Print-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery',
                        'features' => "3 page professionally designed portfolio tailored to your industry and role\nDelivery within 7 days\nUp to 2 revisions\nCustom styling for fonts, colors, and sections to highlight your strengths\nFormats available: Modern, Creative, Minimal, or Corporate\nDelivery in editable formats (DOCX, PDF, AI)\nPrint-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 5,
                        'price' => 30.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Custom styling for fonts, colors, and sections to highlight your strengths\nDelivery in editable formats (DOCX, PDF, AI)',
                        'plus' => 'Print-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery',
                        'features' => "Single page resume design for portfolio tailored to your industry and role\nDelivery within 5 days\nSingle revision\nCustom styling for fonts, colors, and sections to highlight your strengths\nDelivery in editable formats (DOCX, PDF, AI)\nPrint-ready and ATS (Applicant Tracking System) friendly versions available\n100% ownership rights after final delivery"
                    ],
                ]
            ],
            [
                'name' => 'billboard_design',
                'slug' => 'billboard-design-service',
                'label' => 'Billboard Design',
                'heading' => 'Billboard Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 120.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => 'Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery',
                        'features' => "3 advanced and customized design concepts\nDelivery within 4 days\nUp to 3 revisions\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\nMockups included for visualizing the final design in context\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "2 basic and customized design concept\nDelivery within 6 days\nUp to 2 revisions\nHigh-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 8,
                        'price' => 80.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                ]
            ],
            [
                'name' => 'artwork_design',
                'slug' => 'artwork-design-service',
                'label' => 'Artwork Design',
                'heading' => 'Artwork Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 120.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => 'Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery',
                        'features' => "3 advanced and customized design concepts\nDelivery within 4 days\nUp to 3 revisions\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\nMockups included for visualizing the final design in context\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "2 basic and customized design concepts\nDelivery within 6 days\nUp to 2 revisions\nHigh-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 8,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                ]
            ],
            [
                'name' => 'design_quotes',
                'slug' => 'quotes-design-service',
                'label' => 'Design Quotes',
                'heading' => 'Design Quotes Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 50.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 2 days\n1 concept\nUp to 2 revisions"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 40.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 4 days\n1 concept\nUp to 2 revisions"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 4,
                        'price' => 30.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 4 days\n2 concepts\nUp to 4 revisions"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 7,
                        'price' => 20.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => null,
                        'features' => "Delivery within 7 days\n2 concepts\nUp to 2 revisions"
                    ],
                ]
            ],
            [
                'name' => 'graffiti_design',
                'slug' => 'graffiti-design-service',
                'label' => 'Graffiti Design',
                'heading' => 'Graffiti Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 2,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 advanced and customized design concept\nDelivery within 2 days\n2 revisions included\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 4,
                        'price' => 120.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => 'Mockups included for visualizing the final design in context\n100% ownership rights upon final delivery',
                        'features' => "3 advanced and customized design concepts\nDelivery within 4 days\nUp to 3 revisions\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\nMockups included for visualizing the final design in context\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 6,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "2 basic and customized design concepts\nDelivery within 6 days\nUp to 2 revisions\nHigh-quality artwork with a focus on visual impact\nDesigned for both print and digital formats (PDF, PNG, JPG, AI, PSD)\nClean typography and visual hierarchy for easy readability\nColor schemes and branding aligned with your identity\n100% ownership rights upon final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 8,
                        'price' => 100.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'High-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)',
                        'plus' => '100% ownership rights upon final delivery',
                        'features' => "1 basic and customized design concept\nDelivery within 8 days\nSingle revision\nHigh-quality artwork with a focus on visual impact\nDesign for both print and digital formats (PDF, PNG, JPG, AI, PSD)\n100% ownership rights upon final delivery"
                    ],
                ]
            ],
            [
                'name' => 'tattoo_design',
                'slug' => 'tattoo-design-service',
                'label' => 'Tattoo Design',
                'heading' => 'Tattoo Design Pricing',
                'plans' => [
                    [
                        'priority' => 4,
                        'name' => 'priority_design',
                        'label' => 'Priority Design',
                        'duration_days' => 5,
                        'price' => 150.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => null,
                        'plus' => 'Delivered in high-resolution formats (JPG, PNG, PDF)\n100% ownership rights after final delivery',
                        'features' => "10 Custom tattoo designs based on your idea, theme, or concept\nDelivery within 5 days\n5 revisions included\nMultiple size options (small, medium, large) with clear line work\nDelivered in high-resolution formats (JPG, PNG, PDF)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 3,
                        'name' => 'gold_plan',
                        'label' => 'Gold Plan',
                        'duration_days' => 10,
                        'price' => 120.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Hand-drawn or digitally illustrated design as per your style preference\nMultiple size options (small, medium, large) with clear line work\nChoice of black & grey, full color, or minimal line art style\nFront-view and stencil-ready version for tattoo artist use',
                        'plus' => 'Delivered in high-resolution formats (JPG, PNG, PDF)\n100% ownership rights after final delivery',
                        'features' => "10 Custom tattoo designs based on your idea, theme, or concept\nDelivery within 10 days\nUp to 5 revisions\nHand-drawn or digitally illustrated design as per your style preference\nMultiple size options (small, medium, large) with clear line work\nChoice of black & grey, full color, or minimal line art style\nFront-view and stencil-ready version for tattoo artist use\nDelivered in high-resolution formats (JPG, PNG, PDF)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 2,
                        'name' => 'silver_plan',
                        'label' => 'Silver Plan',
                        'duration_days' => 5,
                        'price' => 90.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Hand-drawn or digitally illustrated design as per your style preference\nMultiple size options (small, medium, large) with clear line work\nChoice of black & grey, full color, or minimal line art style',
                        'plus' => 'Delivered in high-resolution formats (JPG, PNG, PDF)\n100% ownership rights after final delivery',
                        'features' => "5 Custom tattoo designs based on your idea, theme, or concept\nDelivery within 5 days\nUp to 2 revisions\nHand-drawn or digitally illustrated design as per your style preference\nMultiple size options (small, medium, large) with clear line work\nChoice of black & grey, full color, or minimal line art style\nDelivered in high-resolution formats (JPG, PNG, PDF)\n100% ownership rights after final delivery"
                    ],
                    [
                        'priority' => 1,
                        'name' => 'bronze_plan',
                        'label' => 'Bronze Plan',
                        'duration_days' => 3,
                        'price' => 10.00,
                        'currency' => 'USD',
                        'symbol' => '$',
                        'include' => 'Multiple size options (small, medium, large) with clear line work\nChoice of black & grey, full color, or minimal line art style',
                        'plus' => 'Delivered in high-resolution formats (JPG, PNG, PDF)\n100% ownership rights after final delivery',
                        'features' => "1 Custom tattoo design based on your idea, theme, or concept\nDelivery within 3 days\nSingle revision\nMultiple size options (small, medium, large) with clear line work\nChoice of black & grey, full color, or minimal line art style\nDelivered in high-resolution formats (JPG, PNG, PDF)\n100% ownership rights after final delivery"
                    ],
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
                            'priority' => $plan['priority'],
                            'duration_days' => $plan['duration_days'],
                            'stripe_price_id' => $price->id,
                            'stripe_half_price_id' => $half_price->id,
                            'price' => $plan['price'],
                            'currency' => $plan['currency'],
                            'symbol' => $plan['symbol'],
                            'include'=>$plan['include'], 
                            'plus'=>$plan['plus'], 
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
