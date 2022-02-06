<?php
/**
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/06 23:00 PM
 */

namespace App\Http\Controllers\Api\V1;

use App\Base\Http\Controllers\BaseApiController;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionCollection;
use App\Models\Transaction;
use App\Services\TransactionFactory;

class TransactionController extends BaseApiController
{

    /**
     * Returns a listing of Transactions.
     *
     */
    public function __invoke(TransactionRequest $request, TransactionFactory $factory): TransactionCollection
    {
        $source = $request->filled('source') ? $request->get('source') : null;
        $transactions = $factory->create($source)->retrieve();
        return new TransactionCollection($transactions);
    }
}
