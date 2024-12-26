import { Link } from '@inertiajs/react';

export default function Index({ products }) {
    return (
        <div className="p-6 max-w-6xl mx-auto">
            <h1 className="text-4xl font-bold mb-6 text-center">Product List</h1>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                {products.map((product) => (
                    <div
                        key={product.id}
                        className="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300"
                    >
                        <img
                            src={`/storage/${product.image}`}
                            alt={product.name}
                            className="w-48 h-48 object-cover rounded-lg mx-auto mt-4" // ปรับขนาดรูปที่นี่
                        />
                        <div className="p-4">
                            <h2 className="text-xl font-semibold mb-2">{product.name}</h2>
                            <p className="text-gray-600 text-sm">{product.description}</p>
                            <p className="font-semibold mt-4 text-lg">Price: ${product.price}</p>
                            <Link
                                href={`/show/${product.id}`}
                                className="mt-4 inline-block text-white bg-blue-600 hover:bg-blue-800 px-4 py-2 rounded transition-colors duration-300"
                            >
                                View Details
                            </Link>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}
