import { Head, useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { FileUpload } from '@/components/file-upload';
import { RichEditor } from '@/components/rich-editor';
import { ArrowLeft, Loader2 } from 'lucide-react';
import type { ProductCategory } from '@/types';

export default function Edit({ category }: { category: ProductCategory }) {
    const { data, setData, put, processing, errors } = useForm({
        title: category.title,
        picture: category.picture,
        description: category.description,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/categories/${category.id}`);
    };

    return (
        <AdminLayout title="Modifier la catégorie">
            <Head title="Modifier la catégorie" />
            <div className="max-w-2xl">
                <div className="mb-4">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/categories"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                </div>
                <Card>
                    <CardHeader><CardTitle>Modifier la catégorie</CardTitle></CardHeader>
                    <CardContent>
                        <form onSubmit={submit} className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="title">Titre</Label>
                                <Input id="title" value={data.title} onChange={(e) => setData('title', e.target.value)} />
                                {errors.title && <p className="text-sm text-destructive">{errors.title}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Image</Label>
                                <FileUpload value={data.picture} onChange={(path) => setData('picture', path)} accept="image/*" />
                                {errors.picture && <p className="text-sm text-destructive">{errors.picture}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Description</Label>
                                <RichEditor value={data.description} onChange={(val) => setData('description', val)} />
                                {errors.description && <p className="text-sm text-destructive">{errors.description}</p>}
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
