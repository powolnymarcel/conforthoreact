import { Head, Link, router } from '@inertiajs/react';
import { useState } from 'react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import type { PaginatedData, Contact } from '@/types';

const columns: Column<Contact>[] = [
    { key: 'name', label: 'Nom', sortable: true },
    { key: 'email', label: 'Email', sortable: true },
    { key: 'subject', label: 'Sujet', sortable: true },
    {
        key: 'created_at',
        label: 'Date',
        sortable: true,
        render: (item) => new Date(item.created_at).toLocaleDateString('fr-BE', {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
        }),
    },
];

export default function Index({ contacts }: { contacts: PaginatedData<Contact> }) {
    return (
        <AdminLayout title="Messages de contact">
            <Head title="Messages de contact" />
            <DataTable
                data={contacts}
                columns={columns}
                editHref={(item) => `/admin/contacts/${item.id}`}
                deleteRoute={(item) => `/admin/contacts/${item.id}`}
                routePrefix="/admin/contacts"
                title="Messages reçus"
            />
        </AdminLayout>
    );
}
