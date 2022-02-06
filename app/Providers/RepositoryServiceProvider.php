<?php
/**
 * App\Providers\RepositoryServiceProvider.php
 *
 * @author Mojtaba Rahbari <mojtaba.rahbari@gmail.com | mojtabarahbari.ir>
 * @copyright Copyright &copy; from 2022 Mojtaba.
 * @version 1.0.0
 * @date 2022/02/05 15:00 PM
 */

namespace App\Providers;

use App\Repositories\Users\Interfaces\UserRepositoryInterface;
use App\Repositories\Users\UserRepository;
use App\Services\Transactions\Interfaces\TransactionRepositoryInterface;
use App\Services\Transactions\TransactionFactory;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        /*$this->app->bind(
            UserDetailRepositoryInterface::class,
            UserDetailRepository::class
        ); */

        $this->app->bind(
            TransactionRepositoryInterface::class,
            TransactionFactory::class
        );

    }
}
