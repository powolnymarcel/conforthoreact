import { Head, useForm, Link } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { FileUpload } from '@/components/file-upload';
import { RichEditor } from '@/components/rich-editor';
import { ArrowLeft, Loader2, Plus, Trash2 } from 'lucide-react';
import type { APropos } from '@/types';

export default function Edit({ apropos }: { apropos: APropos }) {
    const { data, setData, put, processing, errors } = useForm({
        title: apropos.title,
        description: apropos.description,
        sentences: apropos.sentences || [{ sentence: '' }],
        image_1: apropos.image_1,
        image_2: apropos.image_2,
    });

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put(`/admin/a-propos/${apropos.id}`);
    };

    const addSentence = () => {
        setData('sentences', [...data.sentences, { sentence: '' }]);
    };

    const removeSentence = (index: number) => {
        if (data.sentences.length <= 1) return;
        setData('sentences', data.sentences.filter((_, i) => i !== index));
    };

    const updateSentence = (index: number, value: string) => {
        const updated = [...data.sentences];
        updated[index] = { sentence: value };
        setData('sentences', updated);
    };

    return (
        <AdminLayout title="Modifier À propos">
            <Head title="Modifier À propos" />
            <div className="max-w-2xl">
                <div className="mb-4">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/a-propos"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                </div>
                <Card>
                    <CardHeader><CardTitle>Modifier la page À propos</CardTitle></CardHeader>
                    <CardContent>
                        <form onSubmit={submit} className="space-y-4">
                            <div className="space-y-2">
                                <Label htmlFor="title">Titre</Label>
                                <Input id="title" value={data.title} onChange={(e) => setData('title', e.target.value)} />
                                {errors.title && <p className="text-sm text-destructive">{errors.title}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Description</Label>
                                <RichEditor value={data.description} onChange={(val) => setData('description', val)} />
                                {errors.description && <p className="text-sm text-destructive">{errors.description}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Phrases</Label>
                                <div className="space-y-2">
                                    {data.sentences.map((s, i) => (
                                        <div key={i} className="flex items-center gap-2">
                                            <Input
                                                value={s.sentence}
                                                onChange={(e) => updateSentence(i, e.target.value)}
                                                placeholder={`Phrase ${i + 1}`}
                                            />
                                            {data.sentences.length > 1 && (
                                                <Button type="button" variant="ghost" size="icon" onClick={() => removeSentence(i)}>
                                                    <Trash2 className="h-4 w-4 text-destructive" />
                                                </Button>
                                            )}
                                        </div>
                                    ))}
                                </div>
                                <Button type="button" variant="outline" size="sm" onClick={addSentence}>
                                    <Plus className="h-4 w-4 mr-1" />
                                    Ajouter une phrase
                                </Button>
                                {errors.sentences && <p className="text-sm text-destructive">{errors.sentences}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Image 1</Label>
                                <FileUpload value={data.image_1} onChange={(path) => setData('image_1', path)} accept="image/*" />
                                {errors.image_1 && <p className="text-sm text-destructive">{errors.image_1}</p>}
                            </div>
                            <div className="space-y-2">
                                <Label>Image 2</Label>
                                <FileUpload value={data.image_2} onChange={(path) => setData('image_2', path)} accept="image/*" />
                                {errors.image_2 && <p className="text-sm text-destructive">{errors.image_2}</p>}
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
