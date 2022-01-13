<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 22,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 23,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 24,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 25,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 26,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 27,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 28,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 29,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 30,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 31,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 32,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 33,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 34,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 35,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 36,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 37,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 38,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 39,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 40,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 41,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 42,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 43,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 44,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 45,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 46,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 47,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 48,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 49,
                'title' => 'academy_access',
            ],
            [
                'id'    => 50,
                'title' => 'course_category_create',
            ],
            [
                'id'    => 51,
                'title' => 'course_category_edit',
            ],
            [
                'id'    => 52,
                'title' => 'course_category_show',
            ],
            [
                'id'    => 53,
                'title' => 'course_category_access',
            ],
            [
                'id'    => 54,
                'title' => 'course_create',
            ],
            [
                'id'    => 55,
                'title' => 'course_edit',
            ],
            [
                'id'    => 56,
                'title' => 'course_show',
            ],
            [
                'id'    => 57,
                'title' => 'course_delete',
            ],
            [
                'id'    => 58,
                'title' => 'course_access',
            ],
            [
                'id'    => 59,
                'title' => 'admin_create',
            ],
            [
                'id'    => 60,
                'title' => 'admin_edit',
            ],
            [
                'id'    => 61,
                'title' => 'admin_show',
            ],
            [
                'id'    => 62,
                'title' => 'admin_delete',
            ],
            [
                'id'    => 63,
                'title' => 'admin_access',
            ],
            [
                'id'    => 64,
                'title' => 'affiliate_access',
            ],
            [
                'id'    => 65,
                'title' => 'first_tier_afilliate_show',
            ],
            [
                'id'    => 66,
                'title' => 'first_tier_afilliate_access',
            ],
            [
                'id'    => 67,
                'title' => 'second_tier_afilliate_show',
            ],
            [
                'id'    => 68,
                'title' => 'second_tier_afilliate_access',
            ],
            [
                'id'    => 69,
                'title' => 'third_tier_afilliate_show',
            ],
            [
                'id'    => 70,
                'title' => 'third_tier_afilliate_access',
            ],
            [
                'id'    => 71,
                'title' => 'referal_count_show',
            ],
            [
                'id'    => 72,
                'title' => 'referal_count_access',
            ],
            [
                'id'    => 73,
                'title' => 'first_tier_point_show',
            ],
            [
                'id'    => 74,
                'title' => 'first_tier_point_access',
            ],
            [
                'id'    => 75,
                'title' => 'second_tier_point_show',
            ],
            [
                'id'    => 76,
                'title' => 'second_tier_point_access',
            ],
            [
                'id'    => 77,
                'title' => 'third_tier_point_show',
            ],
            [
                'id'    => 78,
                'title' => 'third_tier_point_access',
            ],
            [
                'id'    => 79,
                'title' => 'user_activity_create',
            ],
            [
                'id'    => 80,
                'title' => 'user_activity_edit',
            ],
            [
                'id'    => 81,
                'title' => 'user_activity_show',
            ],
            [
                'id'    => 82,
                'title' => 'user_activity_delete',
            ],
            [
                'id'    => 83,
                'title' => 'user_activity_access',
            ],
            [
                'id'    => 84,
                'title' => 'course_review_create',
            ],
            [
                'id'    => 85,
                'title' => 'course_review_edit',
            ],
            [
                'id'    => 86,
                'title' => 'course_review_show',
            ],
            [
                'id'    => 87,
                'title' => 'course_review_delete',
            ],
            [
                'id'    => 88,
                'title' => 'course_review_access',
            ],
            [
                'id'    => 89,
                'title' => 'review_reply_create',
            ],
            [
                'id'    => 90,
                'title' => 'review_reply_edit',
            ],
            [
                'id'    => 91,
                'title' => 'review_reply_show',
            ],
            [
                'id'    => 92,
                'title' => 'review_reply_delete',
            ],
            [
                'id'    => 93,
                'title' => 'review_reply_access',
            ],
            [
                'id'    => 94,
                'title' => 'course_rating_create',
            ],
            [
                'id'    => 95,
                'title' => 'course_rating_edit',
            ],
            [
                'id'    => 96,
                'title' => 'course_rating_show',
            ],
            [
                'id'    => 97,
                'title' => 'course_rating_delete',
            ],
            [
                'id'    => 98,
                'title' => 'course_rating_access',
            ],
            [
                'id'    => 99,
                'title' => 'course_topic_create',
            ],
            [
                'id'    => 100,
                'title' => 'course_topic_edit',
            ],
            [
                'id'    => 101,
                'title' => 'course_topic_show',
            ],
            [
                'id'    => 102,
                'title' => 'course_topic_delete',
            ],
            [
                'id'    => 103,
                'title' => 'course_topic_access',
            ],
            [
                'id'    => 104,
                'title' => 'discussion_question_create',
            ],
            [
                'id'    => 105,
                'title' => 'discussion_question_edit',
            ],
            [
                'id'    => 106,
                'title' => 'discussion_question_show',
            ],
            [
                'id'    => 107,
                'title' => 'discussion_question_delete',
            ],
            [
                'id'    => 108,
                'title' => 'discussion_question_access',
            ],
            [
                'id'    => 109,
                'title' => 'discussion_answer_create',
            ],
            [
                'id'    => 110,
                'title' => 'discussion_answer_edit',
            ],
            [
                'id'    => 111,
                'title' => 'discussion_answer_show',
            ],
            [
                'id'    => 112,
                'title' => 'discussion_answer_delete',
            ],
            [
                'id'    => 113,
                'title' => 'discussion_answer_access',
            ],
            [
                'id'    => 114,
                'title' => 'manage_wallet_access',
            ],
            [
                'id'    => 115,
                'title' => 'bank_account_create',
            ],
            [
                'id'    => 116,
                'title' => 'bank_account_edit',
            ],
            [
                'id'    => 117,
                'title' => 'bank_account_access',
            ],
            [
                'id'    => 118,
                'title' => 'period_create',
            ],
            [
                'id'    => 119,
                'title' => 'period_show',
            ],
            [
                'id'    => 120,
                'title' => 'period_access',
            ],
            [
                'id'    => 121,
                'title' => 'announcement_create',
            ],
            [
                'id'    => 122,
                'title' => 'announcement_edit',
            ],
            [
                'id'    => 123,
                'title' => 'announcement_show',
            ],
            [
                'id'    => 124,
                'title' => 'announcement_delete',
            ],
            [
                'id'    => 125,
                'title' => 'announcement_access',
            ],
            [
                'id'    => 126,
                'title' => 'pool_earning_show',
            ],
            [
                'id'    => 127,
                'title' => 'pool_earning_access',
            ],
            [
                'id'    => 128,
                'title' => 'signal_access',
            ],
            [
                'id'    => 129,
                'title' => 'trade_signal_create',
            ],
            [
                'id'    => 130,
                'title' => 'trade_signal_edit',
            ],
            [
                'id'    => 131,
                'title' => 'trade_signal_show',
            ],
            [
                'id'    => 132,
                'title' => 'trade_signal_delete',
            ],
            [
                'id'    => 133,
                'title' => 'trade_signal_access',
            ],
            [
                'id'    => 134,
                'title' => 'signal_update_create',
            ],
            [
                'id'    => 135,
                'title' => 'signal_update_edit',
            ],
            [
                'id'    => 136,
                'title' => 'signal_update_show',
            ],
            [
                'id'    => 137,
                'title' => 'signal_update_delete',
            ],
            [
                'id'    => 138,
                'title' => 'signal_update_access',
            ],
            [
                'id'    => 139,
                'title' => 'wallet_create',
            ],
            [
                'id'    => 140,
                'title' => 'wallet_access',
            ],
            [
                'id'    => 141,
                'title' => 'wallet_transaction_access',
            ],
            [
                'id'    => 142,
                'title' => 'profile_access',
            ],
            [
                'id'    => 143,
                'title' => 'manage_profile_create',
            ],
            [
                'id'    => 144,
                'title' => 'manage_profile_edit',
            ],
            [
                'id'    => 145,
                'title' => 'manage_profile_show',
            ],
            [
                'id'    => 146,
                'title' => 'manage_profile_delete',
            ],
            [
                'id'    => 147,
                'title' => 'manage_profile_access',
            ],
            [
                'id'    => 148,
                'title' => 'pro_course_create',
            ],
            [
                'id'    => 149,
                'title' => 'pro_course_edit',
            ],
            [
                'id'    => 150,
                'title' => 'pro_course_show',
            ],
            [
                'id'    => 151,
                'title' => 'pro_course_delete',
            ],
            [
                'id'    => 152,
                'title' => 'pro_course_access',
            ],
            [
                'id'    => 153,
                'title' => 'mybank_create',
            ],
            [
                'id'    => 154,
                'title' => 'mybank_edit',
            ],
            [
                'id'    => 155,
                'title' => 'mybank_show',
            ],
            [
                'id'    => 156,
                'title' => 'mybank_delete',
            ],
            [
                'id'    => 157,
                'title' => 'mybank_access',
            ],
            [
                'id'    => 158,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
