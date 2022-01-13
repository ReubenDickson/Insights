<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            MYCIA
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('profile_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/manage-profiles*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.profile.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('manage_profile_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.manage-profiles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/manage-profiles") || request()->is("admin/manage-profiles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.manageProfile.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/admins*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/user-activities*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/admins") || request()->is("admin/admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.admin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_activity_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-activities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-activities") || request()->is("admin/user-activities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-md c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userActivity.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('academy_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/course-categories*") ? "c-show" : "" }} {{ request()->is("admin/courses*") ? "c-show" : "" }} {{ request()->is("admin/course-topics*") ? "c-show" : "" }} {{ request()->is("admin/course-reviews*") ? "c-show" : "" }} {{ request()->is("admin/review-replies*") ? "c-show" : "" }} {{ request()->is("admin/course-ratings*") ? "c-show" : "" }} {{ request()->is("admin/discussion-questions*") ? "c-show" : "" }} {{ request()->is("admin/discussion-answers*") ? "c-show" : "" }} {{ request()->is("admin/pro-courses*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.academy.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('course_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.course-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/course-categories") || request()->is("admin/course-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.courseCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('course_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.courses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.course.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('course_topic_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.course-topics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/course-topics") || request()->is("admin/course-topics/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.courseTopic.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('course_review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.course-reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/course-reviews") || request()->is("admin/course-reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-comment-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.courseReview.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('review_reply_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.review-replies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/review-replies") || request()->is("admin/review-replies/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comment-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reviewReply.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('course_rating_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.course-ratings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/course-ratings") || request()->is("admin/course-ratings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-star c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.courseRating.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('discussion_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.discussion-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/discussion-questions") || request()->is("admin/discussion-questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.discussionQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('discussion_answer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.discussion-answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/discussion-answers") || request()->is("admin/discussion-answers/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.discussionAnswer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pro_course_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pro-courses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pro-courses") || request()->is("admin/pro-courses/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-user-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.proCourse.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('affiliate_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/periods*") ? "c-show" : "" }} {{ request()->is("admin/first-tier-afilliates*") ? "c-show" : "" }} {{ request()->is("admin/first-tier-points*") ? "c-show" : "" }} {{ request()->is("admin/second-tier-afilliates*") ? "c-show" : "" }} {{ request()->is("admin/second-tier-points*") ? "c-show" : "" }} {{ request()->is("admin/third-tier-afilliates*") ? "c-show" : "" }} {{ request()->is("admin/third-tier-points*") ? "c-show" : "" }} {{ request()->is("admin/referal-counts*") ? "c-show" : "" }} {{ request()->is("admin/pool-earnings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.affiliate.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('period_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.periods.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/periods") || request()->is("admin/periods/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clock c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.period.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('first_tier_afilliate_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.first-tier-afilliates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/first-tier-afilliates") || request()->is("admin/first-tier-afilliates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.firstTierAfilliate.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('first_tier_point_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.first-tier-points.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/first-tier-points") || request()->is("admin/first-tier-points/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.firstTierPoint.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('second_tier_afilliate_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.second-tier-afilliates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/second-tier-afilliates") || request()->is("admin/second-tier-afilliates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.secondTierAfilliate.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('second_tier_point_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.second-tier-points.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/second-tier-points") || request()->is("admin/second-tier-points/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.secondTierPoint.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('third_tier_afilliate_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.third-tier-afilliates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/third-tier-afilliates") || request()->is("admin/third-tier-afilliates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.thirdTierAfilliate.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('third_tier_point_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.third-tier-points.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/third-tier-points") || request()->is("admin/third-tier-points/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.thirdTierPoint.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('referal_count_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.referal-counts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/referal-counts") || request()->is("admin/referal-counts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list-ol c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.referalCount.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pool_earning_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pool-earnings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pool-earnings") || request()->is("admin/pool-earnings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.poolEarning.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('manage_wallet_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/bank-accounts*") ? "c-show" : "" }} {{ request()->is("admin/wallets*") ? "c-show" : "" }} {{ request()->is("admin/wallet-transactions*") ? "c-show" : "" }} {{ request()->is("admin/mybanks*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.manageWallet.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('bank_account_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.bank-accounts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bank-accounts") || request()->is("admin/bank-accounts/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-credit-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bankAccount.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('wallet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.wallets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/wallets") || request()->is("admin/wallets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-wallet c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.wallet.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('wallet_transaction_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.wallet-transactions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/wallet-transactions") || request()->is("admin/wallet-transactions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.walletTransaction.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mybank_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mybanks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mybanks") || request()->is("admin/mybanks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.mybank.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('signal_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/trade-signals*") ? "c-show" : "" }} {{ request()->is("admin/signal-updates*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.signal.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('trade_signal_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.trade-signals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/trade-signals") || request()->is("admin/trade-signals/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tradeSignal.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('signal_update_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.signal-updates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/signal-updates") || request()->is("admin/signal-updates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chart-bar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.signalUpdate.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('announcement_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.announcements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/announcements") || request()->is("admin/announcements/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bullhorn c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.announcement.title') }}
                </a>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('faq_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/faq-categories*") ? "c-show" : "" }} {{ request()->is("admin/faq-questions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.faqManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('faq_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('faq_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.faq-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-question c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.faqQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('content_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/content-categories*") ? "c-show" : "" }} {{ request()->is("admin/content-tags*") ? "c-show" : "" }} {{ request()->is("admin/content-pages*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contentManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('content_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('content_page_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.content-pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.contentPage.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>