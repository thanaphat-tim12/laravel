import { Link } from '@inertiajs/react';

export default function Show({ product }) {
    return (
        <div className="p-6 max-w-3xl mx-auto">
            <h1 className="text-3xl font-bold">{product.name}</h1>
            <img
                src={`/storage/${product.image}`}  // แสดงรูปภาพจากที่เก็บ
                alt={product.name}
                className="w-64 h-64 object-cover rounded-lg mt-4" // ปรับขนาดรูปเล็กลงที่นี่
            />
            <p className="mt-2">{product.description}</p>
            <p className="mt-2 text-lg font-semibold">Price: ${product.price}</p>
            <Link href="/products" className="mt-4 inline-block text-blue-600 hover:text-blue-800">
                Back to All Products
            </Link>
        </div>
    );
}
