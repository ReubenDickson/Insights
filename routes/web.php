<?php

Route::view('/', 'welcome');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

// My Route

Route::get('/admin/allCourses/index', [CoursesController::class, 'showAllCourses']);

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

// Show Courses
Route::resource('/', 'ShowCoursesController');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // 
    
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::get('users/{id}/editProfile', 'UsersController@editProfile')->name('users.editProfile');
    Route::post('users', 'UsersController@updateProfile');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Course Category
    Route::resource('course-categories', 'CourseCategoryController', ['except' => ['destroy']]);

    //All Courses
    Route::resource('all-courses', 'CoursesController', ['except' => ['destroy']]);

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // Admin
    Route::delete('admins/destroy', 'AdminController@massDestroy')->name('admins.massDestroy');
    Route::resource('admins', 'AdminController');

    // First Tier Afilliates
    Route::resource('first-tier-afilliates', 'FirstTierAfilliatesController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Second Tier Afilliates
    Route::resource('second-tier-afilliates', 'SecondTierAfilliatesController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Third Tier Afilliates
    Route::resource('third-tier-afilliates', 'ThirdTierAfilliatesController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Referal Count
    Route::resource('referal-counts', 'ReferalCountController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // First Tier Points
    Route::resource('first-tier-points', 'FirstTierPointsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Second Tier Points
    Route::resource('second-tier-points', 'SecondTierPointsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Third Tier Points
    Route::resource('third-tier-points', 'ThirdTierPointsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Activity
    Route::delete('user-activities/destroy', 'UserActivityController@massDestroy')->name('user-activities.massDestroy');
    Route::post('user-activities/media', 'UserActivityController@storeMedia')->name('user-activities.storeMedia');
    Route::post('user-activities/ckmedia', 'UserActivityController@storeCKEditorImages')->name('user-activities.storeCKEditorImages');
    Route::resource('user-activities', 'UserActivityController');

    // Course Reviews
    Route::delete('course-reviews/destroy', 'CourseReviewsController@massDestroy')->name('course-reviews.massDestroy');
    Route::post('course-reviews/media', 'CourseReviewsController@storeMedia')->name('course-reviews.storeMedia');
    Route::post('course-reviews/ckmedia', 'CourseReviewsController@storeCKEditorImages')->name('course-reviews.storeCKEditorImages');
    Route::resource('course-reviews', 'CourseReviewsController');

    // Review Reply
    Route::delete('review-replies/destroy', 'ReviewReplyController@massDestroy')->name('review-replies.massDestroy');
    Route::post('review-replies/media', 'ReviewReplyController@storeMedia')->name('review-replies.storeMedia');
    Route::post('review-replies/ckmedia', 'ReviewReplyController@storeCKEditorImages')->name('review-replies.storeCKEditorImages');
    Route::resource('review-replies', 'ReviewReplyController');

    // Course Ratings
    Route::delete('course-ratings/destroy', 'CourseRatingsController@massDestroy')->name('course-ratings.massDestroy');
    Route::resource('course-ratings', 'CourseRatingsController');

    // Course Topics
    Route::delete('course-topics/destroy', 'CourseTopicsController@massDestroy')->name('course-topics.massDestroy');
    Route::post('course-topics/media', 'CourseTopicsController@storeMedia')->name('course-topics.storeMedia');
    Route::post('course-topics/ckmedia', 'CourseTopicsController@storeCKEditorImages')->name('course-topics.storeCKEditorImages');
    Route::resource('course-topics', 'CourseTopicsController');

    // Discussion Question
    Route::delete('discussion-questions/destroy', 'DiscussionQuestionController@massDestroy')->name('discussion-questions.massDestroy');
    Route::post('discussion-questions/media', 'DiscussionQuestionController@storeMedia')->name('discussion-questions.storeMedia');
    Route::post('discussion-questions/ckmedia', 'DiscussionQuestionController@storeCKEditorImages')->name('discussion-questions.storeCKEditorImages');
    Route::resource('discussion-questions', 'DiscussionQuestionController');

    // Discussion Answers
    Route::delete('discussion-answers/destroy', 'DiscussionAnswersController@massDestroy')->name('discussion-answers.massDestroy');
    Route::post('discussion-answers/media', 'DiscussionAnswersController@storeMedia')->name('discussion-answers.storeMedia');
    Route::post('discussion-answers/ckmedia', 'DiscussionAnswersController@storeCKEditorImages')->name('discussion-answers.storeCKEditorImages');
    Route::resource('discussion-answers', 'DiscussionAnswersController');

    // Bank Accounts
    Route::resource('bank-accounts', 'BankAccountsController', ['except' => ['show', 'destroy']]);

    // Period
    Route::post('periods/media', 'PeriodController@storeMedia')->name('periods.storeMedia');
    Route::post('periods/ckmedia', 'PeriodController@storeCKEditorImages')->name('periods.storeCKEditorImages');
    Route::resource('periods', 'PeriodController', ['except' => ['edit', 'update', 'destroy']]);

    // Announcements
    Route::delete('announcements/destroy', 'AnnouncementsController@massDestroy')->name('announcements.massDestroy');
    Route::post('announcements/media', 'AnnouncementsController@storeMedia')->name('announcements.storeMedia');
    Route::post('announcements/ckmedia', 'AnnouncementsController@storeCKEditorImages')->name('announcements.storeCKEditorImages');
    Route::resource('announcements', 'AnnouncementsController');

    // Pool Earnings
    Route::resource('pool-earnings', 'PoolEarningsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Trade Signals
    Route::delete('trade-signals/destroy', 'TradeSignalsController@massDestroy')->name('trade-signals.massDestroy');
    Route::post('trade-signals/media', 'TradeSignalsController@storeMedia')->name('trade-signals.storeMedia');
    Route::post('trade-signals/ckmedia', 'TradeSignalsController@storeCKEditorImages')->name('trade-signals.storeCKEditorImages');
    Route::resource('trade-signals', 'TradeSignalsController');

    // Signal Update
    Route::delete('signal-updates/destroy', 'SignalUpdateController@massDestroy')->name('signal-updates.massDestroy');
    Route::post('signal-updates/media', 'SignalUpdateController@storeMedia')->name('signal-updates.storeMedia');
    Route::post('signal-updates/ckmedia', 'SignalUpdateController@storeCKEditorImages')->name('signal-updates.storeCKEditorImages');
    Route::resource('signal-updates', 'SignalUpdateController');

    // Wallet
    Route::resource('wallets', 'WalletController', ['except' => ['edit', 'update', 'show', 'destroy']]);

    // Wallet Transactions
    Route::post('wallet-transactions/media', 'WalletTransactionsController@storeMedia')->name('wallet-transactions.storeMedia');
    Route::post('wallet-transactions/ckmedia', 'WalletTransactionsController@storeCKEditorImages')->name('wallet-transactions.storeCKEditorImages');
    Route::resource('wallet-transactions', 'WalletTransactionsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Manage Profile
    Route::get('manage-profile', 'ManageProfileController@index')->name('manageProfiles.index');
    Route::post('users/{id}', 'ManageProfileController@updateProfile')->name('manageProfiles.updateProfile');
    Route::delete('manage-profiles/destroy', 'ManageProfileController@massDestroy')->name('manage-profiles.massDestroy');
    Route::resource('manage-profiles', 'ManageProfileController');
    

    // Pro Courses
    Route::delete('pro-courses/destroy', 'ProCoursesController@massDestroy')->name('pro-courses.massDestroy');
    Route::resource('pro-courses', 'ProCoursesController');

    // Mybank
    Route::delete('mybanks/destroy', 'MybankController@massDestroy')->name('mybanks.massDestroy');
    Route::resource('mybanks', 'MybankController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');

    //my route
    // Route::get('users/{id}/updateProfile', 'UsersController@updateProfile')->name('users.updateProfile');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});

// Custom Routes

Route::get('/admin/allCourses/index', [CoursesController::class, 'showAllCourses']);

// Route example - QuickAdmin

// Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');