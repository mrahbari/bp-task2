<?php
/**
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/06 23:00 PM
 */

namespace Tests\Feature;

use App\Enums\SourceEnum;
use Tests\TestCase;

class TransactionFeatureTest extends TestCase
{
    /**
     * get all db transactions
     */
    public function test_get_all_db_transactions()
    {
        $this->getJson(route('api.transactions.invoke', ['source' => SourceEnum::DB]))
            ->assertStatus(200)
            ->assertJsonCount(100, 'data');
    }

    /**
     * get all csv transactions
     */
    public function test_get_all_csv_transactions()
    {
        $this->getJson(route('api.transactions.invoke', ['source' => SourceEnum::CSV]))
            ->assertStatus(200)
            ->assertJsonCount(100, 'data');
    }

    /**
     * get all transactions via invalid source parameter
     */
    public function test_get_transactions_with_invalid_source()
    {
        $this->getJson(route('api.transactions.invoke', ['source' => 'html']))
            ->assertStatus(400)
            ->assertJson([
                'data' => [
                    "error" => "Transaction source does not match with the expected value.",
                ]
            ]);
    }
}
