<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Laptop',
            'description' => 'High-performance laptop',
            'price' => 1500,
            'image' => '/images/laptop.jpg',
        ],
        [
            'id' => 2,
            'name' => 'Smartphone',
            'description' => 'Latest smartphone with great features',
            'price' => 800,
            'image' =>'/images/smartphone.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Tablet',
            'description' => 'Portable tablet for everyday use',
            'price' => 500,
            'image' =>'/images/tablet.jpg'
        ],
        [
            'id' => 4,
            'name' => 'Gaming Mouse',
            'description' => 'Precision gaming mouse with RGB lighting',
            'price' => 60,
            'image' =>'/images/1574065017-Glorious-Model-D-MB2.jpg'
        ],
        [
            'id' => 5,
            'name' => 'Mechanical Keyboard',
            'description' => 'Durable mechanical keyboard with tactile switches',
            'price' => 120,
            'image' =>'/images/havit_retro_mechanical_keyboard_2.jpg'
        ],
        [
            'id' => 6,
            'name' => 'Monitor',
            'description' => '27-inch 4K UHD monitor with HDR support',
            'price' => 400,
            'image' => '/images/samsung_s27c350h_27_16_9_led_971590.jpg'
        ],
        [
            'id' => 7,
            'name' => 'External Hard Drive',
            'description' => '1TB external hard drive for backup and storage',
            'price' => 70,
            'image' =>'/images/R.jpg'
        ],
        [
            'id' => 8,
            'name' => 'Wireless Earbuds',
            'description' => 'True wireless earbuds with noise cancellation',
            'price' => 150
        ],
        [
            'id' => 9,
            'name' => 'Smartwatch',
            'description' => 'Fitness tracking smartwatch with heart rate monitoring',
            'price' => 250
        ],
        [
            'id' => 10,
            'name' => 'Portable Speaker',
            'description' => 'Compact Bluetooth speaker with powerful sound',
            'price' => 90
        ],
    ];

    /**
     * Display      a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = collect($this->products)->firstWhere('id', $id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        return Inertia::render('Products/Show', ['product' => $product]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
