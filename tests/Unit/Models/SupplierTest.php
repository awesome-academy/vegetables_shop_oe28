<?php

namespace Tests\Unit\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    protected $supplier;

    protected function setUp(): void
    {
        parent::setUp();
        $this->supplier = new Supplier();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->supplier);
    }

    public function test_table_name()
    {
        $this->assertEquals('supliers', $this->supplier->getTable());
    }

    public function test_fillable(){
        $this->assertEquals([
            'name',
            'email',
            'address',
            'phone',
        ], $this->supplier->getFillable());
    }

    public function test_supplier_hasMany_product()
    {
        $this->test_hasMany_relation(
            Product::class,
            'supplier_id',
            $this->supplier->products()
        );
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
