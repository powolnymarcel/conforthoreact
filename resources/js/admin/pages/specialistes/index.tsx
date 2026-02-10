import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import type { PaginatedData, Specialiste } from '@/types';

const columns: Column<Specialiste>[] = [
    { key: 'name', label: 'Nom', sortable: true },
    { key: 'firstname', label: 'Prénom', sortable: true },
    {
        key: 'picture',
        label: 'Photo',
        render: (item) => item.picture ? (
            <img src={`/storage/${item.picture}`} alt={item.name} className="h-10 w-10 rounded-full object-cover" />
        ) : null,
    },
    { key: 'job', label: 'Fonction', sortable: true },
];

export default function Index({ specialistes }: { specialistes: PaginatedData<Specialiste> }) {
    return (
        <AdminLayout title="Spécialistes">
            <Head title="Spécialistes" />
            <DataTable
                data={specialistes}
                columns={columns}
                createHref="/admin/specialistes/create"
                editHref={(item) => `/admin/specialistes/${item.id}/edit`}
                deleteRoute={(item) => `/admin/specialistes/${item.id}`}
                routePrefix="/admin/specialistes"
                title="Spécialistes"
            />
        </AdminLayout>
    );
}
