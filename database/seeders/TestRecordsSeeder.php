<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\StudyRecord;
use App\Models\StudySchedule;

class TestRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = date('Y-m-d');
        $config = [
            [
                'name' => '英単語①',
                'subject' => 8,
                'detail' => '英単語帳10～20ページ',
                'schedule' => [
                    [
                        'date' => date('Y-m-d'),
                        'scheduled_seconds' => 600,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +1 day')),
                        'scheduled_seconds' => 540,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +7 day')),
                        'scheduled_seconds' => 480,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +14 day')),
                        'scheduled_seconds' => 400,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +1 month')),
                        'scheduled_seconds' => 300,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +2 month')),
                        'scheduled_seconds' => 200,
                    ],
                ],
            ],
            [
                'name' => '物理公式',
                'subject' => 14,
                'detail' => 'モーメントとかそのあたり',
                'schedule' => [
                    [
                        'date' => date('Y-m-d', strtotime($today . '-1 day')),
                        'scheduled_seconds' => 600,
                        'completed_at' => date('Y-m-d', strtotime($today . '-1 day')),
                        'executed_seconds' => 750,
                        'text' => 'いまいち'
                    ],
                    [
                        'date' => date('Y-m-d'),
                        'scheduled_seconds' => 540,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +6 day')),
                        'scheduled_seconds' => 480,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +13 day')),
                        'scheduled_seconds' => 400,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +1 month')),
                        'scheduled_seconds' => 300,
                    ],
                    [
                        'date' => date('Y-m-d', strtotime($today . ' +2 month')),
                        'scheduled_seconds' => 200,
                    ],
                ],
            ],
            // [
            //     'name' => '英単語①',
            //     'subject' => 8,
            //     'detail' => '英単語帳10～20ページ',
            //     'schedule' => [
            //         [
            //             'date' => date('Y-m-d'),
            //             'scheduled_seconds' => 600,
            //         ],
            //         [
            //             'date' => date('Y-m-d', strtotime($today . ' +1 day')),
            //             'scheduled_seconds' => 540,
            //         ],
            //         [
            //             'date' => date('Y-m-d', strtotime($today . ' +7 day')),
            //             'scheduled_seconds' => 480,
            //         ],
            //         [
            //             'date' => date('Y-m-d', strtotime($today . ' +14 day')),
            //             'scheduled_seconds' => 400,
            //         ],
            //         [
            //             'date' => date('Y-m-d', strtotime($today . ' +1 month')),
            //             'scheduled_seconds' => 300,
            //         ],
            //         [
            //             'date' => date('Y-m-d', strtotime($today . ' +2 month')),
            //             'scheduled_seconds' => 200,
            //         ],
            //     ],
            // ]
        ];

        // ユーザー登録
        $user = User::query()->create([
            'name' => '中山テスト',
            'email' => 'test@gmail.com',
            'password' => \Hash::make('Test1234'),
        ]);

        foreach ($config as $array) {
            // 学習記録
            $record = StudyRecord::query()->create([
                'user_id' => $user->id,
                'name' => $array['name'],
                'subject' => $array['subject'],
                'detail' => $array['detail'],
                'text' => isset($array['text']) ? $array['text'] : '',
            ]);

            foreach ($array['schedule'] as $schedule) {
                // 学習予定
                StudySchedule::query()->create([
                    'record_id' => $record->id,
                    'schedule' => $schedule['date'],
                    'completed_at' => isset($schedule['completed_at']) ? $schedule['completed_at'] : NULL,
                    'scheduled_seconds' => $schedule['scheduled_seconds'],
                    'executed_seconds' => isset($schedule['executed_seconds']) ? $schedule['executed_seconds'] : 0,
                    'text' => isset($schedule['text']) ? $schedule['text'] : '',
                ]);
            }
        }
    }
}
