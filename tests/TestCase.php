<?php

namespace Tests;

use App\Models\User;
use App\Repositories\Users\UserRepository;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    //use RefreshDatabase;

    private bool $withSeedData = true;
    private bool $doFresh = true;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('optimize:clear');
        if ($this->doFresh) {
            $this->artisan('migrate:fresh');
            //$this->artisan('migrate:refresh');
        }

        if ($this->withSeedData) {
            $this->artisan('db:seed', ['--class' => 'TransactionSeeder']);
        }
    }
}
