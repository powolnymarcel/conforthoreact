import { Head, Link } from '@inertiajs/react';
import AdminLayout from '@/components/admin-layout';
import { Button } from '@/components/ui/button';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import { Pencil } from 'lucide-react';
import type { APropos } from '@/types';

export default function Index({ items }: { items: APropos[] }) {
    return (
        <AdminLayout title="À propos">
            <Head title="À propos" />
            <div className="space-y-4">
                <h2 className="text-2xl font-bold tracking-tight">À propos</h2>
                <div className="rounded-md border">
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>Titre</TableHead>
                                <TableHead>Image 1</TableHead>
                                <TableHead>Image 2</TableHead>
                                <TableHead className="w-[80px]">Actions</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {items.length === 0 ? (
                                <TableRow>
                                    <TableCell colSpan={4} className="h-24 text-center text-muted-foreground">
                                        Aucun contenu trouvé.
                                    </TableCell>
                                </TableRow>
                            ) : (
                                items.map((item) => (
                                    <TableRow key={item.id}>
                                        <TableCell>{item.title}</TableCell>
                                        <TableCell>
                                            {item.image_1 && <img src={`/storage/${item.image_1}`} alt="Image 1" className="h-10 w-10 rounded object-cover" />}
                                        </TableCell>
                                        <TableCell>
                                            {item.image_2 && <img src={`/storage/${item.image_2}`} alt="Image 2" className="h-10 w-10 rounded object-cover" />}
                                        </TableCell>
                                        <TableCell>
                                            <Button variant="ghost" size="icon" asChild>
                                                <Link href={`/admin/a-propos/${item.id}/edit`}>
                                                    <Pencil className="h-4 w-4" />
                                                </Link>
                                            </Button>
                                        </TableCell>
                                    </TableRow>
                                ))
                            )}
                        </TableBody>
                    </Table>
                </div>
            </div>
        </AdminLayout>
    );
}
