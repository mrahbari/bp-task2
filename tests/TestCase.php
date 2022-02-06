<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

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
        }

        if ($this->withSeedData) {
            $this->artisan('db:seed', ['--class' => 'TransactionSeeder']);
        }
    }
}
