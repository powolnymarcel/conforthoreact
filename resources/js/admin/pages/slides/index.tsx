import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import type { PaginatedData, Slide } from '@/types';

const columns: Column<Slide>[] = [
    { key: 'title', label: 'Titre', sortable: true },
    { key: 'category', label: 'Catégorie', sortable: true },
    {
        key: 'image',
        label: 'Image',
        render: (item) => item.image ? (
            <img src={`/storage/${item.image}`} alt={item.title} className="h-10 w-16 rounded object-cover" />
        ) : null,
    },
    { key: 'short_description', label: 'Description' },
];

export default function Index({ slides }: { slides: PaginatedData<Slide> }) {
    return (
        <AdminLayout title="Déroulant accueil">
            <Head title="Déroulant accueil" />
            <DataTable
                data={slides}
                columns={columns}
                createHref="/admin/slides/create"
                editHref={(item) => `/admin/slides/${item.id}/edit`}
                deleteRoute={(item) => `/admin/slides/${item.id}`}
                routePrefix="/admin/slides"
                title="Déroulant accueil (Carousel)"
            />
        </AdminLayout>
    );
}
