<?php

namespace Tests\Unit\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class RateTest extends TestCase
{
    protected $rate;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rate = new Rate();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->rate);
    }

    public function test_table_name()
    {
        $this->assertEquals('rates', $this->rate->getTable());
    }

    public function test_fillable(){
        $this->assertEquals([
            'user_id',
            'product_id',
            'content',
            'rating',
        ], $this->rate->getFillable());
    }

    public function test_rate_belongs_to_user()
    {
        $this->test_belongsTo_relation(
            User::class,
            'user_id',
            'id',
            $this->rate->user()
        );
    }

    public function test_rate_belongs_to_product()
    {
        $this->test_belongsTo_relation(
            Product::class,
            'product_id',
            'id',
            $this->rate->product()
        );
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
