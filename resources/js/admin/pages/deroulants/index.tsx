import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import type { PaginatedData, Deroulant } from '@/types';

const columns: Column<Deroulant>[] = [
    { key: 'title', label: 'Titre', sortable: true },
];

export default function Index({ deroulants }: { deroulants: PaginatedData<Deroulant> }) {
    return (
        <AdminLayout title="Déroulants">
            <Head title="Déroulants" />
            <DataTable
                data={deroulants}
                columns={columns}
                createHref="/admin/deroulants/create"
                editHref={(item) => `/admin/deroulants/${item.id}/edit`}
                deleteRoute={(item) => `/admin/deroulants/${item.id}`}
                routePrefix="/admin/deroulants"
                title="Textes déroulants"
            />
        </AdminLayout>
    );
}
