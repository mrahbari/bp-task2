<?php
/**
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/06 23:00 PM
 */

namespace App\Services;

use App\Contracts\TransactionSource;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Collection;

class TransactionCSVService implements TransactionSource
{
    /**
     * @return Collection
     */
    public function retrieve(): Collection
    {
        $transactions = collect();
        try {
            $transactionsCSV = csv_to_array(storage_path('uploaded_files/transactions.csv'));
            if (is_array($transactionsCSV) && count($transactionsCSV)) {
                foreach ($transactionsCSV as $transaction) {
                    $transactions->push(new Transaction($transaction));
                }
            }
            return $transactions;
        } catch (Exception $e) {
            abort('404', 'Can not open the file.');
        }

    }
}
