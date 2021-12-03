<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
	        	[
	        		'name' => 'Line 1',
	        		'slug' => 'line-1',
	        		'value' => 'text'
	        	],
	        	[
	        		'name' => 'Line 2',
	        		'slug' => 'line-2',
	        		'value' => 'text'
	        	],
	        	[
	        		'name' => 'Line 3',
	        		'slug' => 'line-3',
	        		'value' => 'text'
	        	],
                [
                    'name' => 'Btn Text',
                    'slug' => 'btn-text',
                    'value' => 'text'
                ],
                [
                    'name' => 'Btn Link',
                    'slug' => 'btn-link',
                    'value' => 'link'
                ],
                [
                    'name' => 'Btn Blow Text',
                    'slug' => 'btn-blow-text',
                    'value' => 'text'
                ],
                [
                    'name' => 'Facebook Link',
                    'slug' => 'facebook-link',
                    'value' => 'https://www.facebook.com/communityfeaturesheet/'
                ],
                [
                    'name' => 'Twitter Link',
                    'slug' => 'twitter-link',
                    'value' => 'https://twitter.com/FeatureSheets'
                ],
                [
                    'name' => 'Instagram Link',
                    'slug' => 'instagram-link',
                    'value' => 'https://www.instagram.com/communityfeaturesheets/'
                ],
                [
                    'name' => 'Linkedin Link',
                    'slug' => 'linkedin-link',
                    'value' => 'https://www.linkedin.com/authwall?trk=gf&trkInfo=AQH-bXQLwisIGgAAAXcFtooobVKlER_0bsVBTD65MrKAhGOYeK57IwrAGscpig7snMLRgqCGMXVcbolsgqQDFYTpw5cR6hv8VtrUsVL7MLP29FAjo2H23CZz7l75CHG7XU2s91k=&originalReferer=http://localhost:8000/&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fvooy-marketing-inc%2F'
                ],
                [
                    'name' => 'How It Work Line 1',
                    'slug' => 'how-it-work-line-1',
                    'value' => 'Gather everyone into your virtual conference using your existing meeting tool (eg.Zoom or Skype).'
                ],
                [
                    'name' => 'How It Work Line 2',
                    'slug' => 'how-it-work-line-2',
                    'value' => 'Pick a Brightful meeting game to host.No signup or download required.'
                ],
                [
                    'name' => 'How It Work Line 3',
                    'slug' => 'how-it-work-line-3',
                    'value' => 'Share the invitation to your team and you are good to go. Enjoy the game!'
                ],
                [
                    'name' => 'Home Slider Image',
                    'slug' => 'home-slider-image',
                    'value' => ''
                ],
                [
                    'name' => 'Property FeatureSheets',
                    'slug' => 'property-featuresheets',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
                ],
                [
                    'name' => 'Property FeatureSheets Image',
                    'slug' => 'property-featuresheets-image',
                    'value' => 'test.jpg'
                ],
                [
                    'name' => 'Market Sentiment Survey',
                    'slug' => 'market-sentiment-survey',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
                ],
                [
                    'name' => 'Market Sentiment Survey Image',
                    'slug' => 'market-sentiment-survey-image',
                    'value' => 'test.jpg'
                ],
                [
                    'name' => 'Home Details Infographic',
                    'slug' => 'home-details-infographic',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
                ],
                [
                    'name' => 'Home Details Infographic Image',
                    'slug' => 'home-details-infographic-image',
                    'value' => 'test.jpg'
                ],
                [
                    'name' => 'Community Feature Sheet Image',
                    'slug' => 'community-feature-sheet-image',
                    'value' => 'test.jpg'
                ],
                [
                    'name' => 'Popup Text',
                    'slug' => 'popup-text',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
                ],
                [
                    'name' => 'Popup Image',
                    'slug' => 'popup-image',
                    'value' => 'demo.png'
                ],
                [
                    'name' => 'Meta Deta Name',
                    'slug' => 'meta-deta-name',
                    'value' => 'Community Feature Sheet® - Create Unique Real Estate Flyers. No Design Skills Required'
                ],
                [
                    'name' => 'Home Product Gst',
                    'slug' => 'home-product-gst',
                    'value' => '5'
                ],
                [
                    'name' => 'Popup Home Model Btn Text',
                    'slug' => 'popup-home-model-btn-text',
                    'value' => 'Continue'
                ],
                [
                    'name' => 'Popup Home Model Btn Link',
                    'slug' => 'popup-home-model-btn-link',
                    'value' => 'test'
                ],
                [
                    'name' => 'Testimonial',
                    'slug' => 'testimonial',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
                ],
                [
                    'name' => 'Testimonial',
                    'slug' => 'testimonial',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
                ],
                [
                    'name' => 'Plan Title',
                    'slug' => 'plan-title',
                    'value' => 'Every plan starts off with a 14-day free trial.'
                ],
                [
                    'name' => 'Plan Sub Title',
                    'slug' => 'plan-sub-title',
                    'value' => 'Give Community Feature Sheet® a free 14-day test run and generate as many reports as you like, for as many addresses as you like.'
                ],
                [
                    'name' => 'Plan Box 1 Description',
                    'slug' => 'plan-box-1-description',
                    'value' => 'test'
                ],
                [
                    'name' => 'Plan Box 1 Price',
                    'slug' => 'plan-box-1-price',
                    'value' => '9.99/REPORT'
                ],
                [
                    'name' => 'Plan Box 1 Bottom Text',
                    'slug' => 'plan-box-1-bottom-text',
                    'value' => 'Test'
                ],
                [
                    'name' => 'Plan Box 2 Description',
                    'slug' => 'plan-box-2-description',
                    'value' => 'test'
                ],
                [
                    'name' => 'Plan Box 2 Price',
                    'slug' => 'plan-box-2-price',
                    'value' => '24.99/MTH'
                ],
                [
                    'name' => 'Plan Box 2 Bottom Text',
                    'slug' => 'plan-box-2-bottom-text',
                    'value' => 'Test'
                ],
                [
                    'name' => 'Plan Box 3 Description',
                    'slug' => 'plan-box-3-description',
                    'value' => 'test'
                ],
                [
                    'name' => 'Plan Box 3 Price',
                    'slug' => 'plan-box-3-price',
                    'value' => '19.99/MTH'
                ],
                [
                    'name' => 'Plan Box 3 Bottom Text',
                    'slug' => 'plan-box-3-bottom-text',
                    'value' => 'Test'
                ],
                [
                    'name' => 'Plan Box 4 Bottom Text',
                    'slug' => 'plan-box-4-bottom-text',
                    'value' => 'Test'
                ],
                [
                    'name' => 'Plan Box 4 Description',
                    'slug' => 'plan-box-4-description',
                    'value' => 'test'
                ],
                [
                    'name' => 'About Us',
                    'slug' => 'about-us',
                    'value' => 'VOOY Marketing Inc is a real estate marketing company that leverages the power of communities to inspire home buyers.'
                ],
                [
                    'name' => 'Product Detail',
                    'slug' => 'product-detail',
                    'value' => 'Get a complete neighborhood profile at a glance'
                ],
                [
                    'name' => 'Product Detail Image',
                    'slug' => 'product-detail-image',
                    'value' => 'test.jpg'
                ],
                [
                    'name' => 'Terms & Conditions',
                    'slug' => 'terms-conditions',
                    'value' => 'test'
                ],
                [
                    'name' => 'Logo Title Text',
                    'slug' => 'logo-title-text',
                    'value' => 'Trusted by teams, used by companies'
                ],
                [
                    'name' => 'Logo Sub Title Text',
                    'slug' => 'logo-sub-title-text',
                    'value' => 'Over 3000+ Individual Community Feature Sheet & created for REALTORS® in Canada and USA'
                ],
                [
                    'name' => 'Order Report Box 1 Text',
                    'slug' => 'order-report-box-1-text',
                    'value' => 'test'
                ],
                [
                    'name' => 'Order Report Box 2 Text',
                    'slug' => 'order-report-box-2-text',
                    'value' => 'test'
                ],
                [
                    'name' => 'Coverage',
                    'slug' => 'coverage',
                    'value' => 'We are currently working hard to make sure the The COMMUNITY FEATURE SHEET® LITE reports are available in all cities in the USA and Canada. Check back to see our progress.'
                ],
                [
                    'name' => 'Google Analytics Space',
                    'slug' => 'google-analytics-space',
                    'value' => 'test'
                ],
                [
                    'name' => 'Survey Share Image',
                    'slug' => 'survey-share-image',
                    'value' => 'test.jpg'
                ],
                [
                    'name' => 'Survey Invite Another realtor Body Text',
                    'slug' => 'survey-invite-another-realtor-body-text',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'
                ],
                [
                    'name' => 'Survey Invite Another realtor Mail Subject',
                    'slug' => 'survey-invite-another-realtor-mail-subject',
                    'value' => 'Invite for Survey Notification'
                ],
            ];

        foreach ($settings as $key => $value) {
            $find = Setting::where('slug', $value['slug'])->first();
            if (is_null($find)) {
                Setting::create($value);
            }
        }
    }
}
