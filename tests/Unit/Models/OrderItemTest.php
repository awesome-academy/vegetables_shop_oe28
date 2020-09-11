<?php

namespace Tests\Unit\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class OrderItemTest extends TestCase
{
    protected $orderItem;

    protected function setUp(): void
    {
        parent::setUp();
        $this->orderItem = new OrderItem();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->orderItem);
    }

    public function test_table_name()
    {
        $this->assertEquals('order_items', $this->orderItem->getTable());
    }

    public function test_fillable(){
        $this->assertEquals([
            'order_id',
            'product_id',
            'total_price',
            'weight',
        ], $this->orderItem->getFillable());
    }

    public function test_order_item_belongs_to_order()
    {
        $this->test_belongsTo_relation(
            Order::class,
            'order_id',
            'id',
            $this->orderItem->order()
        );
    }

    public function test_order_item_belongs_to_product()
    {
        $this->test_belongsTo_relation(
            Product::class,
            'product_id',
            'id',
            $this->orderItem->product()
        );
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
