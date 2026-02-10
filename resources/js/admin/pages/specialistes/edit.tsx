import { Head, useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { FileUpload } from '@/components/file-upload';
import { ArrowLeft, Loader2 } from 'lucide-react';
import type { Specialiste } from '@/types';

export default function Edit({ specialiste }: { specialiste: Specialiste }) {
    const { data, setData, put, processing, errors } = useForm({
        name: specialiste.name,
        firstname: specialiste.firstname,
        picture: specialiste.picture,
        job: specialiste.job,
        short_description: specialiste.short_description,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/specialistes/${specialiste.id}`);
    };

    return (
        <AdminLayout title="Modifier le spécialiste">
            <Head title="Modifier le spécialiste" />
            <div className="max-w-2xl">
                <div className="mb-4">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/specialistes"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                </div>
                <Card>
                    <CardHeader><CardTitle>Modifier le spécialiste</CardTitle></CardHeader>
                    <CardContent>
                        <form onSubmit={submit} className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="name">Nom</Label>
                                <Input id="name" value={data.name} onChange={(e) => setData('name', e.target.value)} />
                                {errors.name && <p className="text-sm text-destructive">{errors.name}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label htmlFor="firstname">Prénom</Label>
                                <Input id="firstname" value={data.firstname} onChange={(e) => setData('firstname', e.target.value)} />
                                {errors.firstname && <p className="text-sm text-destructive">{errors.firstname}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Photo</Label>
                                <FileUpload value={data.picture} onChange={(path) => setData('picture', path)} accept="image/*" />
                                {errors.picture && <p className="text-sm text-destructive">{errors.picture}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label htmlFor="job">Fonction</Label>
                                <Input id="job" value={data.job} onChange={(e) => setData('job', e.target.value)} />
                                {errors.job && <p className="text-sm text-destructive">{errors.job}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label htmlFor="short_description">Description courte</Label>
                                <Input id="short_description" value={data.short_description} onChange={(e) => setData('short_description', e.target.value)} />
                                {errors.short_description && <p className="text-sm text-destructive">{errors.short_description}</p>}
                            </div>
                            <Button type="submit" disabled={processing}>
                                {processing && <Loader2 className="h-4 w-4 animate-spin mr-2" />}
                                Enregistrer
                            </Button>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </AdminLayout>
    );
}
