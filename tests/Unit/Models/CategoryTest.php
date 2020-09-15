<?php

namespace Tests\Unit\Models;
namespace App\Models;
use Illuminate\Database\Eloquent\Collection;

use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = new Category();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->category);
    }

    public function test_table_name()
    {
        $this->assertEquals('categories', $this->category->getTable());
    }

    public function test_fillable(){
        $this->assertEquals([
            'name',
        ], $this->category->getFillable());
    }

    public function test_category_hasMany_products()
    {
        $this->test_hasMany_relation(
            Product::class,
            'category_id',
            $this->category->products()
        );
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}
