import { Head } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Users, Package, FolderTree, Newspaper, Image, Briefcase, Mail } from 'lucide-react';

interface Props {
    stats: {
        specialistes: number;
        produits: number;
        categories: number;
        articles: number;
        slides: number;
        professionnels: number;
        contacts: number;
    };
}

const statCards = [
    { key: 'specialistes', label: 'Spécialistes', icon: Users, color: 'text-blue-600' },
    { key: 'produits', label: 'Produits', icon: Package, color: 'text-green-600' },
    { key: 'categories', label: 'Catégories', icon: FolderTree, color: 'text-purple-600' },
    { key: 'articles', label: 'Articles', icon: Newspaper, color: 'text-orange-600' },
    { key: 'slides', label: 'Slides', icon: Image, color: 'text-pink-600' },
    { key: 'professionnels', label: 'Professionnels', icon: Briefcase, color: 'text-indigo-600' },
    { key: 'contacts', label: 'Contacts', icon: Mail, color: 'text-red-600' },
] as const;

export default function Dashboard({ stats }: Props) {
    return (
        <AdminLayout title="Dashboard">
            <Head title="Dashboard" />
            <div className="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                {statCards.map(({ key, label, icon: Icon, color }) => (
                    <Card key={key}>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-sm font-medium">{label}</CardTitle>
                            <Icon className={`h-4 w-4 ${color}`} />
                        </CardHeader>
                        <CardContent>
                            <div className="text-2xl font-bold">{stats[key]}</div>
                        </CardContent>
                    </Card>
                ))}
            </div>
        </AdminLayout>
    );
}
