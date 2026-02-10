import { Head, useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Switch } from '@/components/ui/switch';
import { FileUpload } from '@/components/file-upload';
import { RichEditor } from '@/components/rich-editor';
import { ArrowLeft, Loader2 } from 'lucide-react';
import type { Pro } from '@/types';

export default function Edit({ professionnel }: { professionnel: Pro }) {
    const { data, setData, put, processing, errors } = useForm({
        title: professionnel.title,
        category: professionnel.category,
        subtitle: professionnel.subtitle || '',
        description: professionnel.description,
        file_1: professionnel.file_1 || '',
        file_1_visible: professionnel.file_1_visible,
        file_2: professionnel.file_2 || '',
        file_2_visible: professionnel.file_2_visible,
        external_link: professionnel.external_link || '',
        image: professionnel.image,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/professionnels/${professionnel.id}`);
    };

    return (
        <AdminLayout title="Modifier le professionnel">
            <Head title="Modifier le professionnel" />
            <div className="max-w-2xl">
                <div className="mb-4">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/professionnels"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                </div>
                <Card>
                    <CardHeader><CardTitle>Modifier le professionnel</CardTitle></CardHeader>
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
                                <FileUpload value={data.file_1} onChange={(path) => setData('file_1', path)} accept="*" />
                                {errors.file_1 && <p className="text-sm text-destructive">{errors.file_1}</p>}
                                {data.file_1 && (
                                    <div className="flex items-center gap-2 pt-1">
                                        <Switch
                                            id="file_1_visible"
                                            checked={data.file_1_visible}
                                            onCheckedChange={(checked) => setData('file_1_visible', checked)}
                                        />
                                        <Label htmlFor="file_1_visible" className="cursor-pointer text-sm font-normal">Afficher le document sur le site ?</Label>
                                    </div>
                                )}
                            </div>
                            <div className="space-y-2">
                                <Label>Fichier 2</Label>
                                <FileUpload value={data.file_2} onChange={(path) => setData('file_2', path)} accept="*" />
                                {errors.file_2 && <p className="text-sm text-destructive">{errors.file_2}</p>}
                                {data.file_2 && (
                                    <div className="flex items-center gap-2 pt-1">
                                        <Switch
                                            id="file_2_visible"
                                            checked={data.file_2_visible}
                                            onCheckedChange={(checked) => setData('file_2_visible', checked)}
                                        />
                                        <Label htmlFor="file_2_visible" className="cursor-pointer text-sm font-normal">Afficher le document sur le site ?</Label>
                                    </div>
                                )}
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
                                Enregistrer
                            </Button>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </AdminLayout>
    );
}
