import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import type { PaginatedData, Blog } from '@/types';

const columns: Column<Blog>[] = [
    { key: 'title', label: 'Titre', sortable: true },
    { key: 'category', label: 'Catégorie', sortable: true },
    {
        key: 'image',
        label: 'Image',
        render: (item) => item.image ? (
            <img src={`/storage/${item.image}`} alt={item.title} className="h-10 w-10 rounded object-cover" />
        ) : null,
    },
    { key: 'date', label: 'Date', sortable: true },
    {
        key: 'user_name',
        label: 'Auteur',
        render: (item) => `${item.user_firstname} ${item.user_name}`,
    },
];

export default function Index({ actualites }: { actualites: PaginatedData<Blog> }) {
    return (
        <AdminLayout title="Actualités">
            <Head title="Actualités" />
            <DataTable
                data={actualites}
                columns={columns}
                createHref="/admin/actualites/create"
                editHref={(item) => `/admin/actualites/${item.id}/edit`}
                deleteRoute={(item) => `/admin/actualites/${item.id}`}
                routePrefix="/admin/actualites"
                title="Actualités / Blog"
            />
        </AdminLayout>
    );
}
