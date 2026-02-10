import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import type { PaginatedData, Pro } from '@/types';

const columns: Column<Pro>[] = [
    { key: 'title', label: 'Titre', sortable: true },
    { key: 'category', label: 'Catégorie', sortable: true },
    { key: 'subtitle', label: 'Sous-titre' },
    {
        key: 'image',
        label: 'Image',
        render: (item) => item.image ? (
            <img src={`/storage/${item.image}`} alt={item.title} className="h-10 w-10 rounded object-cover" />
        ) : null,
    },
];

export default function Index({ professionnels }: { professionnels: PaginatedData<Pro> }) {
    return (
        <AdminLayout title="Professionnels">
            <Head title="Professionnels" />
            <DataTable
                data={professionnels}
                columns={columns}
                createHref="/admin/professionnels/create"
                editHref={(item) => `/admin/professionnels/${item.id}/edit`}
                deleteRoute={(item) => `/admin/professionnels/${item.id}`}
                routePrefix="/admin/professionnels"
                title="Professionnels"
            />
        </AdminLayout>
    );
}
