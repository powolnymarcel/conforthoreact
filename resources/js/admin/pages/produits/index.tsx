import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import { Badge } from '@/components/ui/badge';
import type { PaginatedData, Product } from '@/types';

const columns: Column<Product>[] = [
    { key: 'title', label: 'Titre', sortable: true },
    {
        key: 'picture',
        label: 'Image',
        render: (item) => item.picture ? (
            <img src={`/storage/${item.picture}`} alt={item.title} className="h-10 w-10 rounded object-cover" />
        ) : null,
    },
    {
        key: 'category',
        label: 'Catégorie',
        sortable: true,
        render: (item) => item.category?.title || '-',
    },
    {
        key: 'mettre_en_avant',
        label: 'Mis en avant',
        render: (item) => (
            <Badge variant={item.mettre_en_avant ? 'default' : 'secondary'}>
                {item.mettre_en_avant ? 'Oui' : 'Non'}
            </Badge>
        ),
    },
    {
        key: 'afficher',
        label: 'Visible',
        render: (item) => (
            <Badge variant={item.afficher ? 'default' : 'secondary'}>
                {item.afficher ? 'Oui' : 'Non'}
            </Badge>
        ),
    },
];

export default function Index({ produits }: { produits: PaginatedData<Product> }) {
    return (
        <AdminLayout title="Produits">
            <Head title="Produits" />
            <DataTable
                data={produits}
                columns={columns}
                createHref="/admin/produits/create"
                editHref={(item) => `/admin/produits/${item.id}/edit`}
                deleteRoute={(item) => `/admin/produits/${item.id}`}
                routePrefix="/admin/produits"
                title="Produits"
            />
        </AdminLayout>
    );
}
