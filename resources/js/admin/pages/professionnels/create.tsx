import { Head, useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { FileUpload } from '@/components/file-upload';
import { RichEditor } from '@/components/rich-editor';
import { ArrowLeft, Loader2 } from 'lucide-react';

export default function Create() {
    const { data, setData, post, processing, errors } = useForm({
        title: '',
        category: '',
        subtitle: '',
        description: '',
        file_1: '',
        file_2: '',
        external_link: '',
        image: '',
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/admin/professionnels');
    };

    return (
        <AdminLayout title="Créer un professionnel">
            <Head title="Créer un professionnel" />
            <div className="max-w-2xl">
                <div className="mb-4">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/professionnels"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                </div>
                <Card>
                    <CardHeader><CardTitle>Nouveau professionnel</CardTitle></CardHeader>
                    <CardContent>
                        <form onSubmit={submit} className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="title">Titre</Label>
                                <Input id="title" value={data.title} onChange={(e) => setData('title', e.target.value)} />
                                {errors.title && <p className="text-sm text-destructive">{errors.title}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label htmlFor="category">Catégorie</Label>
                                <Input id="category" value={data.category} onChange={(e) => setData('category', e.target.value)} />
                                {errors.category && <p className="text-sm text-destructive">{errors.category}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label htmlFor="subtitle">Sous-titre</Label>
                                <Input id="subtitle" value={data.subtitle} onChange={(e) => setData('subtitle', e.target.value)} />
                                {errors.subtitle && <p className="text-sm text-destructive">{errors.subtitle}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Description</Label>
                                <RichEditor value={data.description} onChange={(val) => setData('description', val)} />
                                {errors.description && <p className="text-sm text-destructive">{errors.description}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Fichier 1</Label>
                                <FileUpload value={data.file_1} onChange={(path) => setData('file_1', path)} accept="*" preview={false} />
                                {errors.file_1 && <p className="text-sm text-destructive">{errors.file_1}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Fichier 2</Label>
                                <FileUpload value={data.file_2} onChange={(path) => setData('file_2', path)} accept="*" preview={false} />
                                {errors.file_2 && <p className="text-sm text-destructive">{errors.file_2}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label htmlFor="external_link">Lien externe</Label>
                                <Input id="external_link" type="url" value={data.external_link} onChange={(e) => setData('external_link', e.target.value)} placeholder="https://" />
                                {errors.external_link && <p className="text-sm text-destructive">{errors.external_link}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Image</Label>
                                <FileUpload value={data.image} onChange={(path) => setData('image', path)} accept="image/*" />
                                {errors.image && <p className="text-sm text-destructive">{errors.image}</p>}
                            </div>
                            <Button type="submit" disabled={processing}>
                                {processing && <Loader2 className="h-4 w-4 animate-spin mr-2" />}
                                Créer
                            </Button>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </AdminLayout>
    );
}
