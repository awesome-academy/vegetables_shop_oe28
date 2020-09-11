<?php

namespace Tests\Unit\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class OrderTest extends TestCase
{
    protected $order;

    protected function setUp(): void
    {
        parent::setUp();
        $this->order = new Order();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->order);
    }

    public function test_table_name()
    {
        $this->assertEquals('orders', $this->order->getTable());
    }

    public function test_fillable(){
        $this->assertEquals([
            'user_id',
            'status',
            'price_order',
            'note',
            'payment_method',
            'name',
            'address',
            'phone',
            'email',
        ], $this->order->getFillable());
    }

    public function test_order_hasMany_order_item()
    {
        $this->test_hasMany_relation(
            OrderItem::class,
            'order_id',
            $this->order->orderItems()
        );
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
