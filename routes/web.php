<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Http\Request;
use App\Http\Controllers\OtpEmailController;
use App\Http\Controllers\Disable2fa;
use App\Http\Controllers\OtpCookieController;

Route::get('ecards/demo', 'EcardController@frontEcardsDemo')->name('front.ecards.demo');
Route::post('ecards/demo/store', 'EcardController@frontEcardsDemoStore')->name('front.ecards.demo.store');

Route::get('ecards/create', 'EcardController@frontEcardsCreate')->name('front.ecards.create');

Route::group(['middleware' => 'isUserCheckPlan'], function () {
    Route::get('/community-feature-sheet', 'HomeController@communityFeatureSheet')->name('communityFeatureSheet');
    Route::get('/account/manage', 'ManageAccountController@manage');
    Route::post('/account/manage', 'ManageAccountController@manageInfo');
    Route::get('/account/transactions', 'TransactionController@transactions')->name('orders');
    Route::get('/account/surveys', 'SurveyController@mySurvey')->name('my.surveys');

    Route::get('/account/property-feature-sheets', 'FlyerController@flyersList')->name('flyers-list');
    Route::post('/property-feature-sheet/generate-pfs', 'FlyerController@generateFlyer')->name('generateFlyer');

    Route::match(['get', 'post'], '/property-feature-sheet/id/{flyerId}/user/{userId}/update-image', [
        'as' => 'updateFlyerImage',
        'uses' => 'FlyerController@updateImage',
    ])->middleware('auth');

    Route::get('/account/house-details-infographic', 'HdiController@hdisList')->name('hdis-list');
    Route::post('/house-details-infographic/generate-hdi', 'HdiController@generateHdi')->name('generateHdi');

    Route::match(['get', 'post'], '/house-details-infographic/id/{hdiId}/user/{userId}/update-image', [
        'as' => 'updateHdiImage',
        'uses' => 'HdiController@updateImage',
    ])->middleware('auth');

    Route::match(['get', 'post'], '/house-details-infographic/user/{userId}/icon-gallery-process', [
        'as' => 'iconGalleryProcess',
        'uses' => 'HdiController@iconGalleryProcess',
    ])->middleware('auth');

    Route::match(['get', 'post'], '/house-details-infographic/user/{userId}/icon-tags', [
        'as' => 'getIconTags',
        'uses' => 'HdiController@getIconTags',
    ])->middleware('auth');

    Route::match(['get', 'post'], '/invoices', [
        'as' => 'user.invoices',
        'uses' => 'HomeController@invoices',
    ])->middleware('notTeamLeader');

    Route::get('account/invoice/{invoice}', function (Request $request, $invoiceId) {
        return $request->user()->downloadInvoice($invoiceId, [
            'vendor'  => 'Community Feature Sheet&reg;',
            'product' => 'Feature Sheet',
        ]);
    });
    Route::match(['get', 'post'], '/account/referrals', [
        'as' => 'user.referrals-list',
        'uses' => 'ReferralController@referralsList',
    ])->middleware('notTeamLeader');

    Route::match(['get', 'post'], '/account/credits', [
        'as' => 'user.credits-list',
        'uses' => 'CreditController@creditsList',
    ])->middleware('notTeamLeader');

    Route::get('/property-feature-sheet', 'HomeController@propertyFeatureSheet')->name('propertyFeatureSheet');
    Route::get('/house-details-infographic', 'HomeController@houseDetailsInfographic')->name('houseDetailsInfographic');
    Route::get('/purchase-plan', 'HomeController@purchasePlan')->name('purchase.plan');
    Route::get('/create-plan', 'HomeController@createPlan')->name('create.plan');

    Route::get('/order/{slug}', 'CategoryController@order')->name('order');

    Route::get('/order/detail/{id}', 'CategoryController@orderDetail')->name('order.detail');
    Route::post('/cart/fileUpload', 'ProductController@fileUpload')->name('cart.fileUpload');

    // PaymentController
    Route::post('payment/coupon-code/verify', 'PaymentController@renewCouponCodeVerify')->name('coupon.code.verify');
    Route::get('payment', 'PaymentController@payment')->name('payment');
});

Route::get('/account/surveys/show/{survey}', 'SurveyController@mySurveyShow')->name('my.surveys.show');

// PFS Report
Route::match(['get', 'post'], '/property-feature-sheet/id/{flyerId}/user/{userId}', [
    'as' => 'flyerDetails',
    'uses' => 'FlyerController@viewFlyer',
]);
// HDI Report
Route::match(['get', 'post'], '/house-details-infographic/id/{hdiId}/user/{userId}', [
    'as' => 'hdiDetails',
    'uses' => 'HdiController@viewHdi',
]);

Route::group(['prefix' => 'admin', 'middleware' => ['checkAdmin']], function () {

    Route::get('survey/test', 'SurveyController@surveyShowTest')->name('my.surveys.test');

    //Route::get('dashboard','AdminController@dashboardShow');
    Route::get('old-customers', 'AdminController@oldCustomerList')->name('old-customers');

    Route::match(['get', 'post'], 'customers', [
        'as' => 'customers',
        'uses' => 'AdminController@customerList',
    ]);
    Route::delete('customers/{id}', 'AdminController@customerDelete');
    Route::get('customers-Detail/{id}', 'AdminController@customerDetail');
    Route::get('updateCustomerForm/{id}', 'AdminController@editCustomer');
    Route::post('updateCustomerForm', 'AdminController@updateCustomer');

    Route::match(['get', 'post'], 'update-customer-plan/{id}', [
        'as' => 'updateCustomerPlan',
        'uses' => 'AdminController@updateCustomerPlan',
    ]);

    Route::get('plans', 'AdminController@plans');
    Route::get('deletePlan/{id}', 'AdminController@deletePlan');
    Route::get('editPlan/{id}', 'AdminController@editPlan');
    Route::post('updatePlan/{id}', 'AdminController@updatePlan');
    Route::get('addPlan', 'AdminController@addPlan');
    Route::post('addNewPlan', 'AdminController@addNewPlan');
    Route::get('cfs-sales', 'AdminController@cfsSales');
    Route::get('weekly', 'AdminController@weekly');

    Route::get('pfs-sales', 'AdminController@pfsSales');
    Route::get('hdi-sales', 'AdminController@hdiSales');

    //Settings 
    Route::get('smtp-settings', 'AdminController@smtp_settings')->name('smtp.settings');
    Route::post('smtp-settings-store', 'AdminController@smtp_settings_store')->name('smtp.settings.store');
    Route::post('smtp-settings-mail', 'AdminController@smtp_settings_mail')->name('smtp.settings.mail');

    // discounts
    Route::get('discounts', 'AdminController@discounts');
    Route::get('addDiscount', 'AdminController@addDiscount');
    Route::get('deleteDiscount/{id}', 'AdminController@deleteDiscount');
    Route::get('editDiscount/{id}', 'AdminController@editDiscount');
    Route::post('updateDiscountc', 'AdminController@updateDiscount');
    Route::post('addNewDiscount', 'AdminController@addNewDiscount');

    //faq-qustion-title
    Route::resource('faq-question-title', 'FaqQuestionTitleController');
    Route::resource('fr-faq-question-title', 'FrFaqQuestionTitleController');
    //faq-qustion-title
    Route::resource('faq-question-answer', 'FaqQuestionAnswerController');
    Route::resource('fr-faq-question-answer', 'FrFaqQuestionAnswerController');
    //subscribe-us list
    Route::get('/subscribe-us/list', 'SubscribeUsController@subscribeUsList')->name('subscribe.us.list');
    // LogoController
    Route::get('logo', 'LogoController@index')->name('logo.index');
    Route::post('logo/store', 'LogoController@store')->name('logo.store');
    Route::post('logo/show', 'LogoController@show')->name('logo.show');
    Route::post('logo/delete', 'LogoController@destroy')->name('logo.destroy');

    // EcardPhoto Controller
    Route::match(['get', 'post'], 'ecard/photo', [
        'as' => 'ecard.photo',
        'uses' => 'EcardPhotoController@index',
    ]);
    Route::get('ecard/photo/create', 'EcardPhotoController@create')->name('ecard.photo.create');
    Route::post('ecard/photo/store', 'EcardPhotoController@store')->name('ecard.photo.store');
    Route::get('ecard/photo/edit/{id}', 'EcardPhotoController@edit')->name('ecard.photo.edit');
    Route::post('ecard/photo/update/{id}', 'EcardPhotoController@update')->name('ecard.photo.update');
    Route::get('ecard/photo/show/{id}', 'EcardPhotoController@show')->name('ecard.photo.show');
    Route::delete('ecard/photo/delete/{id}', 'EcardPhotoController@delete');

    // EcardCategory Controller
    Route::match(['get', 'post'], 'ecard/categories', [
        'as' => 'ecard.categorys',
        'uses' => 'EcardCategoryController@ecardCategorysList',
    ]);
    Route::get('ecard/categories/create', 'EcardCategoryController@ecardCategoryCreate')->name('ecard.category.create');
    Route::post('ecard/categories/store', 'EcardCategoryController@ecardCategoryStore')->name('ecard.category.store');
    Route::get('ecard/categories/edit/{id}', 'EcardCategoryController@ecardCategoryEdit')->name('ecard.category.edit');
    Route::post('ecard/categories/update/{id}', 'EcardCategoryController@ecardCategoryUpdate')->name('ecard.category.update');
    Route::delete('ecard/categories/delete/{id}', 'EcardCategoryController@ecardCategoryDelete');

    // Category Controller
    Route::match(['get', 'post'], 'categorys', [
        'as' => 'categorys',
        'uses' => 'AdminController@categorysList',
    ]);
    Route::get('category/create', 'AdminController@categoryCreate')->name('category.create');
    Route::post('category/store', 'AdminController@categoryStore')->name('category.store');
    Route::get('category/edit/{id}', 'AdminController@categoryEdit')->name('category.edit');
    Route::post('category/update/{id}', 'AdminController@categoryUpdate')->name('category.update');
    Route::get('category/show/{id}', 'AdminController@categoryShow')->name('category.show');
    Route::delete('category/delete/{id}', 'AdminController@categoryDelete');

    // ProfileColorController
    Route::match(['get', 'post'], 'profile-colours', [
        'as' => 'profileColours',
        'uses' => 'ProfileColorController@profileColorList',
    ]);
    Route::get('profile/colour/create', 'ProfileColorController@profileColorCreate')->name('profile.colour.create');
    Route::post('profile/colour/store', 'ProfileColorController@profileColorStore')->name('profile.colour.store');
    Route::get('profile/colour/edit/{id}', 'ProfileColorController@profileColorEdit')->name('profile.colour.edit');
    Route::post('profile/colour/update/{id}', 'ProfileColorController@profileColorUpdate')->name('profile.colour.update');
    Route::get('profile/colour/show/{id}', 'ProfileColorController@profileColorShow')->name('profile.colour.show');
    Route::delete('profile/color/delete/{id}', 'ProfileColorController@profileColorDelete')->name('profile.colour.delete');

    // SettingController
    Route::match(['get', 'post'], 'setting', [
        'as' => 'setting',
        'uses' => 'SettingController@index',
    ]);
    Route::post('setting/update', 'SettingController@update')->name('setting.update');

    // French SettingController
    Route::match(['get', 'post'], 'frsetting', [
        'as' => 'frsetting',
        'uses' => 'FrsettingController@index',
    ]);
    Route::post('frsetting/update', 'FrsettingController@update')->name('frsetting.update');



    // ContactUsController
    Route::match(['get', 'post'], 'contact-us', [
        'as' => 'contactUs',
        'uses' => 'ContactUsController@index',
    ]);
    Route::delete('contactUs/delete/{id}', 'ContactUsController@delete')->name('contactUs.delete');

    // Product Controller
    Route::match(['get', 'post'], 'purches/products', [
        'as' => 'purches.products',
        'uses' => 'AdminController@purchesProductsList',
    ]);
    Route::post('purches/products/delete', 'AdminController@purchesProductsDelete')->name('purches.products.delete');

    // Video Controller
    Route::match(['get', 'post'], 'video', [
        'as' => 'video',
        'uses' => 'VideoController@index',
    ]);
    Route::get('video/create', 'VideoController@create')->name('video.create');
    Route::post('video/store', 'VideoController@store')->name('video.store');
    Route::get('video/edit/{id}', 'VideoController@edit')->name('video.edit');
    Route::post('video/update/{id}', 'VideoController@update')->name('video.update');
    Route::get('video/show/{id}', 'VideoController@show')->name('video.show');
    Route::delete('video/delete/{id}', 'VideoController@delete')->name('video.delete');

    // TestimonialController
    Route::match(['get', 'post'], 'testimonial', [
        'as' => 'testimonial',
        'uses' => 'TestimonialController@testimonialList',
    ]);
    Route::get('testimonial/create', 'TestimonialController@create')->name('testimonial.create');
    Route::post('testimonial/store', 'TestimonialController@store')->name('testimonial.store');
    Route::get('testimonial/edit/{id}', 'TestimonialController@edit')->name('testimonial.edit');
    Route::post('testimonial/update/{id}', 'TestimonialController@update')->name('testimonial.update');
    Route::get('testimonial/show/{id}', 'TestimonialController@show')->name('testimonial.show');
    Route::delete('testimonial/delete/{id}', 'TestimonialController@delete')->name('testimonial.delete');

    // Product Controller
    Route::match(['get', 'post'], 'products', [
        'as' => 'products',
        'uses' => 'AdminController@productsList',
    ]);
    Route::get('product/create', 'AdminController@productCreate')->name('product.create');
    Route::post('product/store', 'AdminController@productStore')->name('product.store');
    Route::get('product/edit/{id}', 'AdminController@productEdit')->name('product.edit');
    Route::post('product/update/{id}', 'AdminController@productUpdate')->name('product.update');
    Route::get('product/show/{id}', 'AdminController@productShow')->name('product.show');
    Route::delete('product/delete/{id}', 'AdminController@productDelete');

    // ProductDocumentController
    Route::get('product/document/index', 'ProductDocumentController@index')->name('product.document.index');
    Route::get('product/document/create', 'ProductDocumentController@create')->name('product.document.create');
    Route::post('product/document/store', 'ProductDocumentController@store')->name('product.document.store');
    Route::delete('product/document/delete/{id}', 'ProductDocumentController@destroy')->name('product.document.destory');

    //ProductGallery Controller
    Route::get('product-gallery/{id}', array('as' => 'product.gallery.index', 'uses' => 'AdminController@productGalleryindex'));
    Route::post('product/gallery/store', 'AdminController@productGalleryStore')->name('dropzone.store');
    Route::post('product/gallery/delete', 'AdminController@productGalleryDelete')->name('product.gallery.delete');
    Route::post('product/gallery/image', 'AdminController@productGalleryImage')->name('product.gallery.image');

    //UserPurchesProductController
    Route::get('user/product/detail/{id}', array('as' => 'user.product.detail.index', 'uses' => 'UserPurchesProductController@userProductDetailIndex'));
    Route::get('user/product/detail/create/{id}', array('as' => 'user.product.detail.create', 'uses' => 'UserPurchesProductController@userProductDetailCreate'));
    Route::post('user/product/detail/store', array('as' => 'user.product.detail.store', 'uses' => 'UserPurchesProductController@userProductDetailStore'));
    Route::get('user/product/detail/edit/{id}', array('as' => 'user.product.detail.edit', 'uses' => 'UserPurchesProductController@userProductDetailEdit'));
    Route::post('user/product/detail/update/{id}', array('as' => 'user.product.detail.update', 'uses' => 'UserPurchesProductController@userProductDetailUpdate'));
    Route::delete('user/product/detail/{id}', array('as' => 'user.product.detail.destroy', 'uses' => 'UserPurchesProductController@userProductDetailDestroy'));

    Route::match(['get', 'post'], 'update-profiles', [
        'as' => 'adminUpdateProfileUserNameEmail',
        'uses' => 'AdminController@adminUpdateProfileUserNameEmail',
    ]);

    Route::match(['get', 'post'], 'update-profile', [
        'as' => 'adminUpdateProfile',
        'uses' => 'AdminController@adminUpdateProfile',
    ]);

    Route::match(['get', 'post'], 'view-email-jobs', [
        'as' => 'viewEmailJobs',
        'uses' => 'AdminController@viewEmailJobs',
    ]);

    Route::match(['get', 'post'], 'view-fail-email-jobs', [
        'as' => 'viewFailEmailJobs',
        'uses' => 'AdminController@viewFailEmailJobs',
    ]);

    Route::match(['get', 'post'], 'register-links', [
        'as' => 'registerLinks',
        'uses' => 'AdminController@registerLinks',
    ]);


    Route::match(['get', 'post'], 'hdi-icons', [
        'as' => 'HdiIcons',
        'uses' => 'AdminController@icons',
    ]);
    Route::match(['get', 'post'], 'hdi-icons/upsert/{id?}', [
        'as' => 'upsertHdiIcons',
        'uses' => 'AdminController@upsertIcons',
    ]);

    Route::match(['get', 'post'], 'hdi-icon-tags', [
        'as' => 'HdiIconTags',
        'uses' => 'AdminController@tags',
    ]);
    Route::match(['get', 'post'], 'hdi-icon-tags/upsert/{id?}', [
        'as' => 'upsertHdiIconTags',
        'uses' => 'AdminController@upsertTags',
    ]);

    Route::match(['get', 'post'], '/report-address-update/report/{reportId}/user/{userId}', [
        'as' => 'reportAddressUpdate',
        'uses' => 'AdminController@reportAddressUpdate',
    ]);

    Route::match(['get', 'post'], 'user-credits', [
        'as' => 'userCredits',
        'uses' => 'AdminController@userCredits',
    ]);
    Route::match(['get', 'post'], 'user-credits/view-detail/{userId}', [
        'as' => 'userCreditsDetail',
        'uses' => 'AdminController@userCreditsDetail',
    ]);

    Route::match(['get', 'post'], 'user-credits/upsert/{userId}', [
        'as' => 'userCreditsUpsert',
        'uses' => 'AdminController@userCreditsUpsert',
    ]);

    Route::match(['get', 'post'], 'login-as/{userId}', [
        'as' => 'userLoginAs',
        'uses' => 'AdminController@userLoginAs',
    ]);

    Route::match(['get', 'post'], 'surveyList', [
        'as' => 'surveyList',
        'uses' => 'AdminController@survey',
    ]);

    // allow multiple add survey
    Route::post('user/change-status/{id}', array('as' => 'user.change.status', 'uses' => 'AdminController@userChangeStatus'));

    Route::get('user/survey/show/{id}', array('as' => 'user.survey.show', 'uses' => 'AdminController@surveyShow'));
    Route::get('user/survey/edit-created-date/{id}', array('as' => 'user.survey.edit.created.date', 'uses' => 'AdminController@surveyEditCreatedDate'));
    Route::post('user/survey/update-created-date/{id}', 'AdminController@surveyCreatedDateUpdate')->name('user.survey.update.created.date');
    Route::delete('user/survey/delete/{id}', 'AdminController@surveyDelete')->name('user.survey.delete');
});

Route::match(['get', 'post'], 'something-wrong', [
    'as' => 'notFoundPage',
    'uses' => 'HomeController@notFoundPage',
]);

Route::get('doc/download', 'ProductDocumentController@downloadFile')->name('doc.download');

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index'])->name('home');

Route::get('/videos', ['as' => 'video', 'uses' => 'HomeController@video'])->name('video');

Route::get('/survey', ['as' => 'survey', 'uses' => 'SurveyController@survey'])->middleware('auth');
Route::post('/survey/store', ['as' => 'survey.store', 'uses' => 'SurveyController@surveyStore']);

Route::get('/test', ['as' => 'test', 'uses' => 'TestController@index'])->name('testEmail?mail=');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/comingsoon', function () {
    return view('comingsoon');
    //return view('emails.userSignup');
    //return view('emails.firstReminder');
    //return view('emails.secondReminder');
    //return view('emails.buyReport');
    //return view('emails.userRenewal');

});

Route::match(['get', 'post'], '/new-template', [
    'as' => 'page.newTemplate',
    'uses' => 'PageController@newTemplate',
]);

Route::match(['get', 'post'], '/flyer', [
    'as' => 'page.flyer',
    'uses' => 'PageController@flyer',
]);
Route::match(['get', 'post'], '/house-details-infographic-html', [
    'as' => 'page.hdi',
    'uses' => 'PageController@houseDetailsInfographic',
]);


// Auth::routes();
// Authentication Routes...

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('match-email-code', 'OtpEmailController@verifyOtpCodeView')->name('match_email_code');

Route::post('verify', 'OtpEmailController@verifyOtpCode')->name('verify_email_code');

Route::get('resend', 'OtpEmailController@resendOtp')->name('resend/otp');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register/{plan?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');





Route::get('/refresh', function () {
    //$exitCode = Artisan::call('migrate:refresh');
    //$exitCode = Artisan::call('db:seed');
    //Storage::deleteDirectory('/reports');
    //Storage::deleteDirectory('/vendors');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('migrate');
    //$exitCode = Artisan::call('config:cache');
    //$exitCode = Artisan::call('plansUpdate:run');
    /*
    $exitCode = Artisan::call('queue:work', [
        //'user' => 1, '--queue' => 'default'
        '--queue' => 'high,low'
    ]);
    */


    return redirect(url('login'));
});

Route::get('/refresh-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return redirect(url('/'));
});

Route::get('survey/detail', 'HomeController@surveyDetail')->name('survey-detail');
Route::get('survey/invite/realtor', 'SurveyController@inviteAnotherRealtor')->name('invite.another.realtor');
Route::post('invite/realtor', 'SurveyController@inviteRealtor')->name('invite.realtor');

Route::get('property-feature-sheets/detail', 'HomeController@propertyFeatureSheetsDetail')->name('property.feature.sheets.detail');
Route::get('home-details-infographic/detail', 'HomeController@homeDetailsInfographicDetail')->name('home.details.infographic.detail');

Route::post('payment/store', 'PaymentController@paymentStore')->name('payment.store');

Route::post('purchase/store', 'PaymentController@purchaseStore')->name('purchase.store');

Route::get('cart', 'ProductsController@cart');

Route::post('add-to-cart', 'ProductController@addToCart')->name('add-to-cart');
Route::post('delete-to-cart', 'ProductController@deleteToCart')->name('delete-to-cart');

Route::post('view-cart-popup', 'ProductController@ajaxViewPopup')->name('view-cart-popup');

Route::get('/about', function () {
    return view('about');
});
Route::get('/pricing', function () {
    return view('pricing');
});
Route::get('/sample-report', function () {
    return view('sample-report');
});
Route::get('/productdetail', function () {
    return view('productdetail');
});

Route::get('/faqs', 'HomeController@faqs')->name('faqs');

Route::get('/not-active', 'HomeController@notActiveUser')->name('notActiveuser');

Route::get('/termsconditions', function () {
    return view('termsconditions');
});
Route::get('/terms', function () {
    return view('termsconditions');
});
Route::get('/privacy', function () {
    return view('privacy');
});

// Blog Front
Route::get('blog', 'BlogFrontController@index')->name('blog');
Route::get('post/view/{id}', 'BlogFrontController@show')->name('post.view');
Route::get('search/{keyword}', 'BlogFrontController@search')->name('search');
Route::get('autocomplete', 'BlogFrontController@autocomplete')->name('autocomplete');
Route::get('tag/posts/{id}', 'BlogFrontController@getTagPosts')->name('tag.posts');
Route::get('category/posts/{id}', 'BlogFrontController@getCategoryPosts')->name('category.posts');


Route::middleware(['auth'])->group(function () {
    Route::get('blog/tags', 'BlogTagsController@index')->name('blog.tags');
    Route::get('tag/create', 'BlogTagsController@create')->name('tag.create');
    Route::post('tag/store', 'BlogTagsController@store')->name('tag.store');
    Route::get('tag/edit/{id}', 'BlogTagsController@edit')->name('tag.edit');
    Route::post('tag/update/{id}', 'BlogTagsController@update')->name('tag.update');
    Route::get('tag/delete/{id}', 'BlogTagsController@destroy')->name('tag.delete');


    Route::get('blog/categories', 'BlogPostController@getBlogCategories')->name('blog.categories');
    Route::get('blog/category/create', 'BlogPostController@createBlogCategory')->name('blog.category.create');
    Route::post('blog/category/store', 'BlogPostController@storeCategory')->name('blog.category.store');
    Route::get('blog/category/edit/{id}', 'BlogPostController@editCategory')->name('blog.category.edit');
    Route::post('blog/category/update/{id}', 'BlogPostController@updateCategory')->name('blog.category.update');
    Route::get('blog/category/delete/{id}', 'BlogPostController@deleteCategory')->name('blog.category.delete');
    Route::get('blog/posts', 'BlogPostController@getBlogPosts')->name('blog.posts');
    Route::get('post/create', 'BlogPostController@createBlogPost')->name('post.create');
    Route::post('post/store', 'BlogPostController@storePost')->name('post.store');
    Route::get('post/edit/{id}', 'BlogPostController@editPost')->name('post.edit');
    Route::post('post/update/{id}', 'BlogPostController@updatePost')->name('post.update');
    Route::get('post/delete/{id}', 'BlogPostController@deletePost')->name('post.delete');
});

// Route::get('/testimonials', function(){
//     return view('testimonials');
// });
/*
Route::match(['get', 'post'], '/contact-us', function () {
    
})->name('contact-us');
*/
Route::match(['get', 'post'], '/contact-us', [
    'as' => 'page.contact-us',
    'uses' => 'PageController@contactUs',
]);

Route::match(['get', 'post'], '/coverage', [
    'as' => 'page.coverage',
    'uses' => 'PageController@commingNext',
]);

Route::match(['get', 'post'], '/how-it-works', [
    'as' => 'page.how-it-works',
    'uses' => 'PageController@howItWorks',
]);


Route::get('/transactions/pdf', 'AccountCont@transactionsPDF');

// Route::get('/subscribe','SubscribeCont@showRegistrationForm')->name('subscribe');
Route::post('/subscribe', 'HomeController@processSubscribe');

Route::get('/testimonials', 'HomeController@testimonials');

Route::post('/regitser-user', 'SubscribeCont@registerUser')->name('register.user');

Route::post('/subscribe-us', 'SubscribeUsController@subscribeUs');

Route::get('/register-success', 'SubscribeCont@registerSuccess')->name('registerSuccess');

Route::get('/verify-email/{token}', 'SubscribeCont@verifyEmail')->name('verifyEmail');

Route::get('/active-account/{token}', 'SubscribeCont@activeAccount')->name('active.account');
Route::post('change-verified/{id}', array('as' => 'change.verified', 'uses' => 'CreateNewUserController@verified'));

// Route::group(['middleware' => ['checkSubscription']], function () {

Route::post('/checkUserReportAccess', 'ReportCont@checkUserReportAccess')->name('checkUserReportAccess');
Route::post('/generateReport', 'ReportCont@generateReport')->name('generateReport');
//Route::get('/report/id/{reportId}/user/{userId}','ReportApiCont@viewReport')->name('reportDetails');
Route::match(['get'], '/report/id/{reportId}/user/{userId}/{template?}/{edit?}', [
    'as' => 'reportDetails',
    'uses' => 'ReportApiCont@viewReport',
]);
Route::match(['get', 'post'], '/report-notes/report/{reportId}', [
    'as' => 'reportNotes',
    'uses' => 'AccountCont@reportNotes',
]);

Route::get('/report/detailed/{reportId}', 'ReportCont@viewDetailedReport');
Route::get('/report/getApiData/{reportId}/{apiId}', 'ReportCont@getApiData');
Route::get('/report/getDemographyAgeChart/{reportId}', 'ReportApiCont@getAgeChart');
Route::get('/report/getDemographyEducationChart/{reportId}', 'ReportApiCont@getEduChart');
Route::get('/report/getDemography/{reportId}', 'ReportCont@getDemography');
Route::post('/report/getMap/{reportId}', 'ReportCont@getMap');
Route::get('/report/getShopsMap/{reportId}', 'ReportCont@getShopsMap');
Route::get('/report/getCommunity/{reportId}', 'ReportApiCont@getCommunity');
Route::get('/report/getAverageIncome/{reportId}', 'ReportApiCont@getAverageIncome');
Route::get('/report/getMedianAge/{reportId}', 'ReportApiCont@getMedianAge');
Route::get('/report/getHousehold/{reportId}', 'ReportApiCont@getHousehold');
Route::get('/report/getElementerySchool/{reportId}', 'ReportApiCont@getElementerySchool');
Route::get('/report/getHighSchool/{reportId}', 'ReportApiCont@getHighSchool');
Route::get('/report/getLibrary/{reportId}', 'ReportApiCont@getLibrary');
Route::get('/report/getPlayground/{reportId}', 'ReportApiCont@getPlayground');
Route::get('/report/getTransit/{reportId}', 'ReportApiCont@getTransit');
Route::get('/report/getTransitStation/{reportId}', 'ReportApiCont@getTransitStation');
Route::get('/report/getCatholicSchools/{reportId}', 'ReportApiCont@getCatholicSchools');

Route::get('/report/getApi/{api}/{reportId}', 'ReportApiCont@getView');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/admin-dashboard', 'AdminController@adminDashboard')->name('adminDashboard')->middleware('auth');

Route::get('/order-report/{name}', 'HomeController@orderReport')->name('orderReport');

//Route::get('/account','AccountCont@index');

Route::get('/account/product/detail/{id}', 'TransactionController@transactioProductDetail')->name('product.detail');

Route::get('download-pdf/{id}', array('as' => 'user.product.detail.download.pdf', 'uses' => 'TransactionController@userProductDetailDownloadPdf'));

Route::get('/account/charge', 'AccountCont@charge');
Route::get('/account/recharge', 'AccountCont@recharge');
Route::post('/account/recharge', 'AccountCont@rechargeAccount');

Route::get('/account/updateCard', 'AccountCont@updateCard');
Route::post('/account/updateCard', 'AccountCont@updateCardInfo');

Route::get('/account/cancelSubscription', 'HomeController@cancelSubscription')->middleware('auth');
Route::post('/account/updateSubscription', 'HomeController@updateSubscription')->middleware('auth');
Route::get('/account/profileview', 'HomeController@profileview')->name('profileview')->middleware('auth');

// disable 2FA route
Route::post('/disable', 'Disable2fa@disableOtpAuth')->name('2fa/change')->middleware('auth');

Route::get('/account/profile', 'AccountCont@profile')->middleware('auth');
Route::get('/account/update-user-info', 'AccountController@updateUserInfo')->middleware('auth');
Route::post('/account/update-user-photos', 'HomeController@updateUserPhotos')->middleware('auth');
Route::post('/account/profile', 'AccountController@updateProfile')->middleware('auth');
Route::get('/account/password', 'AccountController@changePassword')->middleware('auth');
Route::post('/account/password', 'AccountController@storeChangePassword')->middleware('auth');
Route::get('/users/list', 'CreateNewUserController@usersList')->name('users.list')->middleware('auth');

Route::get('/account/select/colour-name', 'AccountController@selectColourName')->middleware('auth');

//urls of property-feature-sheets

//urls of house-details-infographic

Route::match(['get', 'post'], '/account/refer-a-colleague', [
    'as' => 'user.refer-a-colleague',
    'uses' => 'HomeController@referAColleague',
])->middleware('auth');

Route::match(['get', 'post'], '/account/create/sub/user', [
    'as' => 'create.sub.user',
    'uses' => 'CreateNewUserController@createSubUser',
])->middleware('auth');

Route::match(['get', 'post'], '/account/create/sub/user/register', [
    'as' => 'create.new.user.register',
    'uses' => 'CreateNewUserController@createNewUserRegister',
]);

// });

Route::match(['post'], '/stripe-webhook', [
    'as' => 'strip.webhool',
    //'uses' => 'WebhookController@stripeWebhookAction',
    'uses' => 'WebhookController@handleWebhook',
]);

/*Cron Jobs*/
Route::get('/first-reminder', function () {
    $exitCode = Artisan::call('firstReminder:send', [
        //'user' => 1, '--queue' => 'default'
    ]);
});
Route::get('/second-reminder', function () {
    $exitCode = Artisan::call('secondReminder:send', [
        //'user' => 1, '--queue' => 'default'
    ]);
});

Route::get('/plans-update', function () {
    $exitCode = Artisan::call('plansUpdate:run', [
        //'user' => 1, '--queue' => 'default'
    ]);
});




/* Queue Jobs */
Route::get('/queue-worker-start', function () {
    $exitCode = Artisan::call('queue:work', [
        //'user' => 1, '--queue' => 'default'
        '--queue' => 'high,low'
    ]);
});

Route::get('/queue-worker-restart', function () {
    $exitCode = Artisan::call('queue:restart', [
        //'user' => 1, '--queue' => 'default'
        //'--queue' => 'high,low'
    ]);
});

Route::get('/queue-retry', function () {
    $exitCode = Artisan::call('queue:retry', [
        'id' => ['all'],
        //'--queue' => 'default'
        //'--queue' => 'high,low'
    ]);
});

Route::get('/queue-flush', function () {
    $exitCode = Artisan::call('queue:flush', [
        //'user' => 1, '--queue' => 'default'
        //'--queue' => 'high,low'
    ]);
});

Route::get('/schedule-run', function () {
    $exitCode = Artisan::call('schedule:run');
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Route::get('generate-pdf', 'PdfGenerateController@pdfview')->name('generate-pdf');

Route::get('en', function () {
    Session::put('locale', 'en');
    return redirect(url('/'));
});

Route::get('fr', function () {
    Session::put('locale', 'fr');
    return redirect(url('/'));
});

Route::get('report/edit/{id}', 'ReportEditController@show');
Route::post('report/save/{id}', 'ReportEditController@save');
Route::get('report/json/{id}', 'ReportEditController@json');
