<?php

namespace Tests\Unit\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected $product;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->product = new Product();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->product);
    }

    public function test_table_name()
    {
        $this->assertEquals('products', $this->product->getTable());
    }

    public function test_fillable(){
        $this->assertEquals([
            'id',
            'name',
            'category_id',
            'suplier_id',
            'price',
            'price_discount',
            'description',
            'weight_item',
            'weight_available',
        ], $this->product->getFillable());
    }

    public function test_product_hasMany_images()
    {
        $this->test_hasMany_relation(
            Image::class,
            'product_id',
            $this->product->images()
        );
    }

    public function test_product_hasMany_rates()
    {
        $this->test_hasMany_relation(
            Rate::class,
            'product_id',
            $this->product->rates()
        );
    }

    public function test_product_belongs_to_supplier()
    {
        $this->test_belongsTo_relation(
            Supplier::class,
            'suplier_id',
            'id',
            $this->product->supplier()
        );
    }

    public function test_product_belongs_to_category()
    {
        $this->test_belongsTo_relation(
            Category::class,
            'category_id',
            'id',
            $this->product->category()
        );
    }
}
