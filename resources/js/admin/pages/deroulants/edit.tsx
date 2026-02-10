import { Head, useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { ArrowLeft, Loader2 } from 'lucide-react';
import type { Deroulant } from '@/types';

export default function Edit({ deroulant }: { deroulant: Deroulant }) {
    const { data, setData, put, processing, errors } = useForm({
        title: deroulant.title,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/deroulants/${deroulant.id}`);
    };

    return (
        <AdminLayout title="Modifier le déroulant">
            <Head title="Modifier le déroulant" />
            <div className="max-w-2xl">
                <div className="mb-4">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/deroulants"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                </div>
                <Card>
                    <CardHeader><CardTitle>Modifier le déroulant</CardTitle></CardHeader>
                    <CardContent>
                        <form onSubmit={submit} className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="title">Titre</Label>
                                <Input id="title" value={data.title} onChange={(e) => setData('title', e.target.value)} />
                                {errors.title && <p className="text-sm text-destructive">{errors.title}</p>}
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
