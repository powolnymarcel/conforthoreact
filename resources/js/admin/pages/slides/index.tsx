import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { DataTable, type Column } from '@/components/data-table';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Lightbulb, Sparkles } from 'lucide-react';
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
            <div className="space-y-4">
                <Card className="border-amber-200 bg-amber-50/60">
                    <CardHeader className="pb-3">
                        <CardTitle className="flex items-center gap-2 text-base">
                            <Lightbulb className="h-4 w-4 text-amber-600" />
                            Aide rapide: les dérouleurs d'accueil
                        </CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-2 text-sm text-slate-700">
                        <p>
                            Les dérouleurs d'accueil sont les bannières qui s'affichent en premier sur la page d'accueil.
                            Ils servent à mettre en avant une offre, un service ou une information importante.
                        </p>
                        <div className="grid gap-1 sm:grid-cols-2">
                            <p className="flex items-start gap-2">
                                <Sparkles className="mt-0.5 h-3.5 w-3.5 text-amber-600" />
                                1 slide = 1 message clair et court
                            </p>
                            <p className="flex items-start gap-2">
                                <Sparkles className="mt-0.5 h-3.5 w-3.5 text-amber-600" />
                                Format conseillé: image horizontale (ex. 1920x900)
                            </p>
                            <p className="flex items-start gap-2">
                                <Sparkles className="mt-0.5 h-3.5 w-3.5 text-amber-600" />
                                Titre court + description simple
                            </p>
                            <p className="flex items-start gap-2">
                                <Sparkles className="mt-0.5 h-3.5 w-3.5 text-amber-600" />
                                3 à 5 slides suffisent pour rester efficace
                            </p>
                        </div>
                    </CardContent>
                </Card>

                <DataTable
                    data={slides}
                    columns={columns}
                    createHref="/admin/slides/create"
                    editHref={(item) => `/admin/slides/${item.id}/edit`}
                    deleteRoute={(item) => `/admin/slides/${item.id}`}
                    routePrefix="/admin/slides"
                    title="Déroulant accueil (Carousel)"
                />
            </div>
        </AdminLayout>
    );
}
