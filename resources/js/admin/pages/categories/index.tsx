import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import type { PaginatedData, ProductCategory } from '@/types';

const columns: Column<ProductCategory>[] = [
    { key: 'title', label: 'Titre', sortable: true },
    { key: 'slug', label: 'Slug', sortable: true },
    {
        key: 'picture',
        label: 'Image',
        render: (item) => item.picture ? (
            <img src={`/storage/${item.picture}`} alt={item.title} className="h-10 w-10 rounded object-cover" />
        ) : null,
    },
];

export default function Index({ categories }: { categories: PaginatedData<ProductCategory> }) {
    return (
        <AdminLayout title="Catégories produits">
            <Head title="Catégories produits" />
            <DataTable
                data={categories}
                columns={columns}
                createHref="/admin/categories/create"
                editHref={(item) => `/admin/categories/${item.id}/edit`}
                deleteRoute={(item) => `/admin/categories/${item.id}`}
                routePrefix="/admin/categories"
                title="Catégories produits"
            />
        </AdminLayout>
    );
}
