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
        image: '',
        date: new Date().toISOString().split('T')[0],
        user_name: '',
        user_firstname: '',
        content: '',
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        post('/admin/actualites');
    };

    return (
        <AdminLayout title="Créer un article">
            <Head title="Créer un article" />
            <div className="max-w-2xl">
                <div className="mb-4">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/actualites"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                </div>
                <Card>
                    <CardHeader><CardTitle>Nouvel article</CardTitle></CardHeader>
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
                                <Label>Image</Label>
                                <FileUpload value={data.image} onChange={(path) => setData('image', path)} accept="image/*" />
                                {errors.image && <p className="text-sm text-destructive">{errors.image}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label htmlFor="date">Date</Label>
                                <Input id="date" type="date" value={data.date} onChange={(e) => setData('date', e.target.value)} />
                                {errors.date && <p className="text-sm text-destructive">{errors.date}</p>}
                            </div>
                            <div className="grid grid-cols-2 gap-4">
                                <div className="space-y-2">
                                    <Label htmlFor="user_name">Nom de l'auteur</Label>
                                    <Input id="user_name" value={data.user_name} onChange={(e) => setData('user_name', e.target.value)} />
                                    {errors.user_name && <p className="text-sm text-destructive">{errors.user_name}</p>}
                                </div>
                                <div className="space-y-2">
                                    <Label htmlFor="user_firstname">Prénom de l'auteur</Label>
                                    <Input id="user_firstname" value={data.user_firstname} onChange={(e) => setData('user_firstname', e.target.value)} />
                                    {errors.user_firstname && <p className="text-sm text-destructive">{errors.user_firstname}</p>}
                                </div>
                            </div>
                            <div className="space-y-2">
                                <Label>Contenu</Label>
                                <RichEditor value={data.content} onChange={(val) => setData('content', val)} />
                                {errors.content && <p className="text-sm text-destructive">{errors.content}</p>}
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
