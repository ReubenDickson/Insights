<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // User Alerts
    Route::apiResource('user-alerts', 'UserAlertsApiController');

    // Course Category
    Route::apiResource('course-categories', 'CourseCategoryApiController', ['except' => ['destroy']]);

    // All Courses 
    Route::apiResource('all-courses', 'CoursesApiController', ['except' => ['destroy']]);

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::apiResource('courses', 'CoursesApiController');

    // First Tier Afilliates
    Route::apiResource('first-tier-afilliates', 'FirstTierAfilliatesApiController', ['except' => ['store', 'update', 'destroy']]);

    // Second Tier Afilliates
    Route::apiResource('second-tier-afilliates', 'SecondTierAfilliatesApiController', ['except' => ['store', 'update', 'destroy']]);

    // Third Tier Afilliates
    Route::apiResource('third-tier-afilliates', 'ThirdTierAfilliatesApiController', ['except' => ['store', 'update', 'destroy']]);

    // Referal Count
    Route::apiResource('referal-counts', 'ReferalCountApiController', ['except' => ['store', 'update', 'destroy']]);

    // First Tier Points
    Route::apiResource('first-tier-points', 'FirstTierPointsApiController', ['except' => ['store', 'update', 'destroy']]);

    // Second Tier Points
    Route::apiResource('second-tier-points', 'SecondTierPointsApiController', ['except' => ['store', 'update', 'destroy']]);

    // Third Tier Points
    Route::apiResource('third-tier-points', 'ThirdTierPointsApiController', ['except' => ['store', 'update', 'destroy']]);

    // User Activity
    Route::post('user-activities/media', 'UserActivityApiController@storeMedia')->name('user-activities.storeMedia');
    Route::apiResource('user-activities', 'UserActivityApiController');

    // Course Reviews
    Route::post('course-reviews/media', 'CourseReviewsApiController@storeMedia')->name('course-reviews.storeMedia');
    Route::apiResource('course-reviews', 'CourseReviewsApiController');

    // Review Reply
    Route::post('review-replies/media', 'ReviewReplyApiController@storeMedia')->name('review-replies.storeMedia');
    Route::apiResource('review-replies', 'ReviewReplyApiController');

    // Course Topics
    Route::post('course-topics/media', 'CourseTopicsApiController@storeMedia')->name('course-topics.storeMedia');
    Route::apiResource('course-topics', 'CourseTopicsApiController');

    // Discussion Question
    Route::post('discussion-questions/media', 'DiscussionQuestionApiController@storeMedia')->name('discussion-questions.storeMedia');
    Route::apiResource('discussion-questions', 'DiscussionQuestionApiController');

    // Discussion Answers
    Route::post('discussion-answers/media', 'DiscussionAnswersApiController@storeMedia')->name('discussion-answers.storeMedia');
    Route::apiResource('discussion-answers', 'DiscussionAnswersApiController');

    // Bank Accounts
    Route::apiResource('bank-accounts', 'BankAccountsApiController', ['except' => ['show', 'destroy']]);

    // Period
    Route::post('periods/media', 'PeriodApiController@storeMedia')->name('periods.storeMedia');
    Route::apiResource('periods', 'PeriodApiController', ['except' => ['update', 'destroy']]);

    // Announcements
    Route::post('announcements/media', 'AnnouncementsApiController@storeMedia')->name('announcements.storeMedia');
    Route::apiResource('announcements', 'AnnouncementsApiController');

    // Pool Earnings
    Route::apiResource('pool-earnings', 'PoolEarningsApiController', ['except' => ['store', 'update', 'destroy']]);

    // Trade Signals
    Route::post('trade-signals/media', 'TradeSignalsApiController@storeMedia')->name('trade-signals.storeMedia');
    Route::apiResource('trade-signals', 'TradeSignalsApiController');

    // Signal Update
    Route::post('signal-updates/media', 'SignalUpdateApiController@storeMedia')->name('signal-updates.storeMedia');
    Route::apiResource('signal-updates', 'SignalUpdateApiController');

    // Wallet
    Route::apiResource('wallets', 'WalletApiController', ['except' => ['show', 'update', 'destroy']]);

    // Wallet Transactions
    Route::post('wallet-transactions/media', 'WalletTransactionsApiController@storeMedia')->name('wallet-transactions.storeMedia');
    Route::apiResource('wallet-transactions', 'WalletTransactionsApiController', ['except' => ['store', 'show', 'update', 'destroy']]);
});
