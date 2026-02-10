import { Head, useForm } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';
import { RichEditor } from '@/components/rich-editor';
import { FileUpload } from '@/components/file-upload';
import { Loader2 } from 'lucide-react';
import { Separator } from '@/components/ui/separator';

interface Props {
    settings: Record<string, string>;
}

export default function Index({ settings }: Props) {
    const { data, setData, put, processing } = useForm({
        settings: { ...settings },
    });

    const get = (key: string) => data.settings[key] || '';
    const set = (key: string, value: string) => {
        setData('settings', { ...data.settings, [key]: value });
    };

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put('/admin/parametres');
    };

    return (
        <AdminLayout title="Paramètres">
            <Head title="Paramètres" />
            <form onSubmit={submit}>
                <div className="space-y-4">
                    <div className="flex items-center justify-between">
                        <h2 className="text-2xl font-bold tracking-tight">Paramètres</h2>
                        <Button type="submit" disabled={processing}>
                            {processing && <Loader2 className="h-4 w-4 animate-spin mr-2" />}
                            Enregistrer
                        </Button>
                    </div>

                    <Tabs defaultValue="general" className="w-full">
                        <TabsList className="flex-wrap h-auto">
                            <TabsTrigger value="general">Général</TabsTrigger>
                            <TabsTrigger value="seo">SEO</TabsTrigger>
                            <TabsTrigger value="telephone">Téléphone</TabsTrigger>
                            <TabsTrigger value="contact">Contact</TabsTrigger>
                            <TabsTrigger value="conditions">Conditions</TabsTrigger>
                            <TabsTrigger value="horaires">Horaires</TabsTrigger>
                        </TabsList>

                        <TabsContent value="general">
                            <Card>
                                <CardHeader><CardTitle>Général</CardTitle></CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label>Nom de la marque</Label>
                                        <Input value={get('general.brand_name')} onChange={(e) => set('general.brand_name', e.target.value)} />
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Logo</Label>
                                        <FileUpload value={get('general.logo')} onChange={(path) => set('general.logo', path)} accept="image/*" />
                                    </div>
                                </CardContent>
                            </Card>
                        </TabsContent>

                        <TabsContent value="seo">
                            <Card>
                                <CardHeader><CardTitle>SEO (Google)</CardTitle></CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label>Titre SEO</Label>
                                        <Input value={get('seo.title')} onChange={(e) => set('seo.title', e.target.value)} />
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Description SEO</Label>
                                        <Input value={get('seo.description')} onChange={(e) => set('seo.description', e.target.value)} />
                                    </div>
                                </CardContent>
                            </Card>
                        </TabsContent>

                        <TabsContent value="telephone">
                            <Card>
                                <CardHeader><CardTitle>Téléphone</CardTitle></CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label>Tel Chênée</Label>
                                        <Input value={get('Tel Chênée')} onChange={(e) => set('Tel Chênée', e.target.value)} />
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Tel Aye</Label>
                                        <Input value={get('Tel Aye')} onChange={(e) => set('Tel Aye', e.target.value)} />
                                    </div>
                                </CardContent>
                            </Card>
                        </TabsContent>

                        <TabsContent value="contact">
                            <Card>
                                <CardHeader><CardTitle>Détails de contact</CardTitle></CardHeader>
                                <CardContent className="space-y-6">
                                    <div className="space-y-4">
                                        <h3 className="text-sm font-semibold">Informations générales</h3>
                                        <div className="grid grid-cols-2 gap-4">
                                            <div className="space-y-2">
                                                <Label>Email</Label>
                                                <Input value={get('contact.email')} onChange={(e) => set('contact.email', e.target.value)} />
                                            </div>
                                        </div>
                                    </div>
                                    <Separator />
                                    <div className="space-y-4">
                                        <h3 className="text-sm font-semibold">Site 1 — Chaudfontaine / Chênée</h3>
                                        <div className="grid grid-cols-2 gap-4">
                                            <div className="space-y-2">
                                                <Label>Nom du site</Label>
                                                <Input value={get('contact.address1.name')} onChange={(e) => set('contact.address1.name', e.target.value)} placeholder="Ex: Confortho Chaudfontaine" />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Téléphone</Label>
                                                <Input value={get('contact.address1.phone')} onChange={(e) => set('contact.address1.phone', e.target.value)} placeholder="04 263 53 73" />
                                            </div>
                                        </div>
                                        <div className="grid grid-cols-4 gap-4">
                                            <div className="space-y-2">
                                                <Label>Rue</Label>
                                                <Input value={get('contact.address1.street')} onChange={(e) => set('contact.address1.street', e.target.value)} />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Numéro</Label>
                                                <Input value={get('contact.address1.number')} onChange={(e) => set('contact.address1.number', e.target.value)} />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Code postal</Label>
                                                <Input value={get('contact.address1.postal_code')} onChange={(e) => set('contact.address1.postal_code', e.target.value)} />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Ville</Label>
                                                <Input value={get('contact.address1.city')} onChange={(e) => set('contact.address1.city', e.target.value)} placeholder="Chaudfontaine" />
                                            </div>
                                        </div>
                                        <div className="space-y-2">
                                            <Label>URL Google Map</Label>
                                            <Input value={get('contact.google_map1')} onChange={(e) => set('contact.google_map1', e.target.value)} type="url" />
                                        </div>
                                    </div>
                                    <Separator />
                                    <div className="space-y-4">
                                        <h3 className="text-sm font-semibold">Site 2 — Marche-en-Famenne</h3>
                                        <div className="grid grid-cols-2 gap-4">
                                            <div className="space-y-2">
                                                <Label>Nom du site</Label>
                                                <Input value={get('contact.address2.name')} onChange={(e) => set('contact.address2.name', e.target.value)} placeholder="Ex: Confortho Marche" />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Téléphone</Label>
                                                <Input value={get('contact.address2.phone')} onChange={(e) => set('contact.address2.phone', e.target.value)} placeholder="084 43 37 40" />
                                            </div>
                                        </div>
                                        <div className="grid grid-cols-4 gap-4">
                                            <div className="space-y-2">
                                                <Label>Rue</Label>
                                                <Input value={get('contact.address2.street')} onChange={(e) => set('contact.address2.street', e.target.value)} />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Numéro</Label>
                                                <Input value={get('contact.address2.number')} onChange={(e) => set('contact.address2.number', e.target.value)} />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Code postal</Label>
                                                <Input value={get('contact.address2.postal_code')} onChange={(e) => set('contact.address2.postal_code', e.target.value)} />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Ville</Label>
                                                <Input value={get('contact.address2.city')} onChange={(e) => set('contact.address2.city', e.target.value)} placeholder="Marche-en-Famenne" />
                                            </div>
                                        </div>
                                        <div className="space-y-2">
                                            <Label>URL Google Map</Label>
                                            <Input value={get('contact.google_map2')} onChange={(e) => set('contact.google_map2', e.target.value)} type="url" />
                                        </div>
                                    </div>
                                    <Separator />
                                    <div className="space-y-4">
                                        <h3 className="text-sm font-semibold">Réseaux sociaux</h3>
                                        <div className="space-y-4">
                                            <div className="space-y-2">
                                                <Label>Facebook</Label>
                                                <Input value={get('contact.facebook')} onChange={(e) => set('contact.facebook', e.target.value)} type="url" />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>Instagram</Label>
                                                <Input value={get('contact.instagram')} onChange={(e) => set('contact.instagram', e.target.value)} type="url" />
                                            </div>
                                            <div className="space-y-2">
                                                <Label>LinkedIn</Label>
                                                <Input value={get('contact.linkedin')} onChange={(e) => set('contact.linkedin', e.target.value)} type="url" />
                                            </div>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        </TabsContent>

                        <TabsContent value="conditions">
                            <Card>
                                <CardHeader><CardTitle>Conditions</CardTitle></CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label>Conditions Générales</Label>
                                        <RichEditor value={get('conditions.generales')} onChange={(val) => set('conditions.generales', val)} />
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Vie Privée</Label>
                                        <RichEditor value={get('conditions.vie_privee')} onChange={(val) => set('conditions.vie_privee', val)} />
                                    </div>
                                </CardContent>
                            </Card>
                        </TabsContent>

                        <TabsContent value="horaires">
                            <div className="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                <Card>
                                    <CardHeader><CardTitle>Horaires — Chaudfontaine / Chênée</CardTitle></CardHeader>
                                    <CardContent className="space-y-4">
                                        {['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'].map((day) => (
                                            <div key={day} className="space-y-2">
                                                <Label className="capitalize">{day}</Label>
                                                <Input
                                                    value={get(`horaires.chenee.${day}`)}
                                                    onChange={(e) => set(`horaires.chenee.${day}`, e.target.value)}
                                                    placeholder="Ex: 08:30 - 12:00 / 13:00 - 17:30"
                                                />
                                            </div>
                                        ))}
                                    </CardContent>
                                </Card>
                                <Card>
                                    <CardHeader><CardTitle>Horaires — Marche-en-Famenne</CardTitle></CardHeader>
                                    <CardContent className="space-y-4">
                                        {['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'].map((day) => (
                                            <div key={day} className="space-y-2">
                                                <Label className="capitalize">{day}</Label>
                                                <Input
                                                    value={get(`horaires.marche.${day}`)}
                                                    onChange={(e) => set(`horaires.marche.${day}`, e.target.value)}
                                                    placeholder="Ex: 08:30 - 12:00 / 13:00 - 17:30"
                                                />
                                            </div>
                                        ))}
                                    </CardContent>
                                </Card>
                            </div>
                        </TabsContent>
                    </Tabs>
                </div>
            </form>
        </AdminLayout>
    );
}
