<?php

namespace Tests\Feature\Sms;

use App\Models\Sms;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SmsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_correct_data()
    {
        $sms = Sms::factory()->create();

        $this->graphQL(/** @lang GraphQL */ '
            {
                sms(page: 1) {
                    data {
                        id
                        body
                        transaction_id
                    }
                    paginatorInfo {
                        hasMorePages
                    }
                }
            }
            ')->assertJson([
                'data' => [
                    'sms' => [
                        "data" => [
                            [
                                'id' => $sms->id,
                                'body' => $sms->body,
                                'transaction_id' => $sms->transaction_id,
                            ],
                        ],
                        "paginatorInfo" => [
                            "hasMorePages" => false
                        ]
                    ],
                ],
            ]);
    }
}
