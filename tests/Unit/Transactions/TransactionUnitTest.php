<?php
/**
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/06 23:00 PM
 */

namespace Tests\Unit\Transactions;

use App\Exceptions\Transactions\TransactionInvalidArgumentException;
use App\Exceptions\Transactions\TransactionNotFoundException;
use App\Models\Transaction;
use App\Services\Transactions\TransactionFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionUnitTest extends TestCase
{
    use WithFaker;

    /**
     * transaction can be created by faker
     */
    public function test_it_can_create_the_transaction()
    {
        $transactionISOAlpha3 = $this->faker->unique()->transactionISOAlpha3();
        $data = [
            "name" => $this->faker->unique()->transaction() . '[' . $transactionISOAlpha3 . ']',
            "iso2" => substr($transactionISOAlpha3, 0, 2),
            "iso3" => $transactionISOAlpha3,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $transactionRepo = new TransactionFactory(new Transaction);
        $transaction = $transactionRepo->createTransaction($data);

        $this->assertNotNull($transaction);
        $this->assertNotEmpty($transaction->name);
        $this->assertNotEmpty($transaction->iso2);
        $this->assertNotEmpty($transaction->iso3);
    }

    /**
     * Raise error during updating
     *
     * @throws TransactionNotFoundException
     */
    public function test_fire_errors_when_updating_the_transaction()
    {
        $transaction = Transaction::factory()->create();
        $this->expectException(TransactionInvalidArgumentException::class);

        $transactionRepo = new TransactionFactory($transaction);
        $transactionRepo->updateTransaction(['name' => null]);
    }

    /**
     * Transaction updating is possible with valid params
     *
     * @throws TransactionNotFoundException
     */
    public function test_it_can_update_the_transaction()
    {
        $transaction = Transaction::factory()->create();
        $transactionRepo = new TransactionFactory($transaction);

        $update = ['name' => 'Iran'];
        $transactionRepo->updateTransaction($update);

        $this->assertEquals('Iran', $transaction->name);
    }

    /**
     * Raise error when transaction id is invalid
     *
     * @throws TransactionNotFoundException
     */
    public function test_fire_errors_when_the_transaction_is_not_found()
    {
        $this->expectException(TransactionNotFoundException::class);
        $transactionRepo = new TransactionFactory(new Transaction);
        $transactionRepo->findTransactionById(999);
    }

    /**
     * Find one transaction
     *
     * @throws TransactionNotFoundException
     */
    public function test_it_can_find_the_transaction()
    {
        $transaction = Transaction::factory()->create();
        $transactionRepo = new TransactionFactory($transaction);
        $found = $transactionRepo->findTransactionById($transaction->id);
        $this->assertEquals($transaction->name, $found->name);
    }

    /**
     * Get all Transactions
     */
    public function test_it_can_list_all_Transactions()
    {
        $transaction = Transaction::factory()->create();
        $transactionRepo = new TransactionFactory($transaction);
        $count = $transactionRepo->countTransactions();    //7

        $this->assertCount($count, $transactionRepo->listTransactions());
    }
}
