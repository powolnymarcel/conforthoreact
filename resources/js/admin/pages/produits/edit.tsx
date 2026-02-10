import { Head, useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Switch } from '@/components/ui/switch';
import { FileUpload } from '@/components/file-upload';
import { RichEditor } from '@/components/rich-editor';
import { ArrowLeft, Loader2 } from 'lucide-react';
import type { Product, ProductCategory } from '@/types';

export default function Edit({ produit, categories }: { produit: Product; categories: ProductCategory[] }) {
    const { data, setData, put, processing, errors } = useForm({
        product_category_id: String(produit.product_category_id),
        picture: produit.picture,
        title: produit.title,
        description: produit.description,
        mettre_en_avant: produit.mettre_en_avant,
        afficher: produit.afficher,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/produits/${produit.id}`);
    };

    return (
        <AdminLayout title="Modifier le produit">
            <Head title="Modifier le produit" />
            <div className="max-w-2xl">
                <div className="mb-4">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/produits"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                </div>
                <Card>
                    <CardHeader><CardTitle>Modifier le produit</CardTitle></CardHeader>
                    <CardContent>
                        <form onSubmit={submit} className="space-y-4">
                            <div className="space-y-2">
                                <Label>Catégorie</Label>
                                <Select value={data.product_category_id} onValueChange={(val) => setData('product_category_id', val)}>
                                    <SelectTrigger><SelectValue placeholder="Sélectionner une catégorie" /></SelectTrigger>
                                    <SelectContent>
                                        {categories.map((cat) => (
                                            <SelectItem key={cat.id} value={String(cat.id)}>{cat.title}</SelectItem>
                                        ))}
                                    </SelectContent>
                                </Select>
                                {errors.product_category_id && <p className="text-sm text-destructive">{errors.product_category_id}</p>}
                            </div>
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
                            <div className="flex items-center gap-4">
                                <div className="flex items-center gap-2">
                                    <Switch checked={data.mettre_en_avant} onCheckedChange={(val) => setData('mettre_en_avant', val)} />
                                    <Label>Mettre en avant</Label>
                                </div>
                                <div className="flex items-center gap-2">
                                    <Switch checked={data.afficher} onCheckedChange={(val) => setData('afficher', val)} />
                                    <Label>Afficher</Label>
                                </div>
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
