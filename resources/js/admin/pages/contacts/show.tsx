import { Head, Link, router } from '@inertiajs/react';
import { useState } from 'react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { ConfirmDialog } from '@/components/confirm-dialog';
import { ArrowLeft, Trash2, Mail, Phone, Calendar } from 'lucide-react';
import type { Contact } from '@/types';

export default function Show({ contact }: { contact: Contact }) {
    const [showDelete, setShowDelete] = useState(false);
    const [deleting, setDeleting] = useState(false);

    const handleDelete = () => {
        setDeleting(true);
        router.delete(`/admin/contacts/${contact.id}`, {
            onFinish: () => setDeleting(false),
        });
    };

    const formattedDate = new Date(contact.created_at).toLocaleDateString('fr-BE', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    });

    return (
        <AdminLayout title="Détail du message">
            <Head title="Détail du message" />
            <div className="max-w-2xl">
                <div className="mb-4 flex items-center justify-between">
                    <Button variant="ghost" size="sm" asChild>
                        <Link href="/admin/contacts"><ArrowLeft className="h-4 w-4 mr-1" />Retour</Link>
                    </Button>
                    <Button variant="destructive" size="sm" onClick={() => setShowDelete(true)}>
                        <Trash2 className="h-4 w-4 mr-1" />Supprimer
                    </Button>
                </div>
                <Card>
                    <CardHeader>
                        <CardTitle>{contact.subject}</CardTitle>
                    </CardHeader>
                    <CardContent className="space-y-4">
                        <div className="flex flex-wrap gap-4 text-sm text-muted-foreground">
                            <span className="flex items-center gap-1">
                                <strong className="text-foreground">{contact.name}</strong>
                            </span>
                            <a href={`mailto:${contact.email}`} className="flex items-center gap-1 hover:text-foreground">
                                <Mail className="h-3.5 w-3.5" />{contact.email}
                            </a>
                            {contact.phone && (
                                <a href={`tel:${contact.phone}`} className="flex items-center gap-1 hover:text-foreground">
                                    <Phone className="h-3.5 w-3.5" />{contact.phone}
                                </a>
                            )}
                            <span className="flex items-center gap-1">
                                <Calendar className="h-3.5 w-3.5" />{formattedDate}
                            </span>
                        </div>
                        <hr />
                        <div className="whitespace-pre-wrap text-sm leading-relaxed">
                            {contact.message}
                        </div>
                    </CardContent>
                </Card>
            </div>
            <ConfirmDialog
                open={showDelete}
                onClose={() => setShowDelete(false)}
                onConfirm={handleDelete}
                loading={deleting}
                title="Confirmer la suppression"
                description="Êtes-vous sûr de vouloir supprimer ce message ? Cette action est irréversible."
            />
        </AdminLayout>
    );
}
