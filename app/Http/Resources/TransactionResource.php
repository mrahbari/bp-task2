<?php
/**
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/06 15:00 PM
 */

namespace App\Http\Resources;

use App\Base\Http\Resources\AbstractResource;

class TransactionResource extends AbstractResource
{
    public function payload(): array
    {
        return [
            'id' => hashids_encode($this->id),
            'code' => $this->code,
            'amount' => $this->amount,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            //'updated_at' => $this->updated_at,
        ];
    }
}
