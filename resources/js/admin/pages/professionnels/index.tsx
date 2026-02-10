import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { BriefcaseBusiness, FileText, Sparkles } from 'lucide-react';
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
            <div className="space-y-4">
                <Card className="border-sky-200 bg-sky-50/60">
                    <CardHeader className="pb-3">
                        <CardTitle className="flex items-center gap-2 text-base">
                            <BriefcaseBusiness className="h-4 w-4 text-sky-700" />
                            Aide rapide: section professionnels
                        </CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-2 text-sm text-slate-700">
                        <p>
                            Cette section permet de présenter les professionnels avec qui vous travaillez
                            (partenaires, services spécialisés, collaborations), de façon claire pour le grand public.
                        </p>
                        <div className="grid gap-1 sm:grid-cols-2">
                            <p className="flex items-start gap-2">
                                <Sparkles className="mt-0.5 h-3.5 w-3.5 text-sky-700" />
                                Listez vos professionnels et leurs informations principales
                            </p>
                            <p className="flex items-start gap-2">
                                <FileText className="mt-0.5 h-3.5 w-3.5 text-sky-700" />
                                Partagez des fichiers publics utiles (documents, formulaires, fiches)
                            </p>
                        </div>
                    </CardContent>
                </Card>

                <DataTable
                    data={professionnels}
                    columns={columns}
                    createHref="/admin/professionnels/create"
                    editHref={(item) => `/admin/professionnels/${item.id}/edit`}
                    deleteRoute={(item) => `/admin/professionnels/${item.id}`}
                    routePrefix="/admin/professionnels"
                    title="Professionnels"
                />
            </div>
        </AdminLayout>
    );
}
