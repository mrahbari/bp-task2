<?php
/**
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/06 23:00 PM
 */

namespace App\Services;

use App\Contracts\TransactionSource;
use App\Enums\SourceEnum;
use App\Exceptions\Transactions\TransactionInvalidArgumentException;

class TransactionFactory
{
    /**
     * Handle source matches based on factory pattern
     *
     * @param string|null $source
     * @return TransactionSource|null
     */
    public function create(?string $source): ?TransactionSource
    {
        switch ($source) {
            case SourceEnum::CSV :
                return app(TransactionCSVService::class);

            case SourceEnum::DB :
                return app(TransactionDBService::class);

            default :
                throw new TransactionInvalidArgumentException('Transaction source does not match with the expected value.');

        }
    }
}
