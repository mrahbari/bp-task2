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

class TransactionDBService implements TransactionSource
{

    public function retrieve()
    {
        return Transaction::query()->get();
    }
}
