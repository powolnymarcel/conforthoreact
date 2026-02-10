import { Link, router } from '@inertiajs/react';
import { useState } from 'react';
import { ArrowUpDown, Pencil, Trash2, Plus, Search } from 'lucide-react';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { ConfirmDialog } from '@/components/confirm-dialog';
import type { PaginatedData } from '@/types';

export interface Column<T> {
    key: string;
    label: string;
    sortable?: boolean;
    render?: (item: T) => React.ReactNode;
}

interface DataTableProps<T> {
    data: PaginatedData<T>;
    columns: Column<T>[];
    createHref?: string;
    editHref?: (item: T) => string;
    deleteRoute?: (item: T) => string;
    searchable?: boolean;
    routePrefix: string;
    title: string;
}

export function DataTable<T extends { id: number }>({
    data,
    columns,
    createHref,
    editHref,
    deleteRoute,
    searchable = true,
    routePrefix,
    title,
}: DataTableProps<T>) {
    const [search, setSearch] = useState('');
    const [deleteItem, setDeleteItem] = useState<T | null>(null);
    const [deleting, setDeleting] = useState(false);

    const handleSearch = (e: React.FormEvent) => {
        e.preventDefault();
        router.get(routePrefix, { search }, { preserveState: true, preserveScroll: true });
    };

    const handleSort = (key: string) => {
        const url = new URL(window.location.href);
        const currentSort = url.searchParams.get('sort');
        const currentDirection = url.searchParams.get('direction');
        const direction = currentSort === key && currentDirection === 'asc' ? 'desc' : 'asc';
        router.get(routePrefix, { sort: key, direction, search: url.searchParams.get('search') || '' }, { preserveState: true, preserveScroll: true });
    };

    const handleDelete = () => {
        if (!deleteItem || !deleteRoute) return;
        setDeleting(true);
        router.delete(deleteRoute(deleteItem), {
            onFinish: () => {
                setDeleting(false);
                setDeleteItem(null);
            },
        });
    };

    return (
        <div className="space-y-4">
            <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h2 className="text-2xl font-bold tracking-tight">{title}</h2>
                <div className="flex items-center gap-2">
                    {searchable && (
                        <form onSubmit={handleSearch} className="flex items-center gap-2">
                            <div className="relative">
                                <Search className="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
                                <Input
                                    placeholder="Rechercher..."
                                    value={search}
                                    onChange={(e) => setSearch(e.target.value)}
                                    className="pl-8 w-[200px] sm:w-[300px]"
                                />
                            </div>
                            <Button type="submit" variant="secondary" size="sm">Rechercher</Button>
                        </form>
                    )}
                    {createHref && (
                        <Button asChild>
                            <Link href={createHref}>
                                <Plus className="h-4 w-4 mr-1" />
                                Créer
                            </Link>
                        </Button>
                    )}
                </div>
            </div>

            <div className="rounded-md border">
                <Table>
                    <TableHeader>
                        <TableRow>
                            {columns.map((col) => (
                                <TableHead key={col.key}>
                                    {col.sortable ? (
                                        <button
                                            className="flex items-center gap-1 hover:text-foreground"
                                            onClick={() => handleSort(col.key)}
                                        >
                                            {col.label}
                                            <ArrowUpDown className="h-3 w-3" />
                                        </button>
                                    ) : (
                                        col.label
                                    )}
                                </TableHead>
                            ))}
                            {(editHref || deleteRoute) && <TableHead className="w-[100px]">Actions</TableHead>}
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        {data.data.length === 0 ? (
                            <TableRow>
                                <TableCell colSpan={columns.length + (editHref || deleteRoute ? 1 : 0)} className="h-24 text-center text-muted-foreground">
                                    Aucun résultat trouvé.
                                </TableCell>
                            </TableRow>
                        ) : (
                            data.data.map((item) => (
                                <TableRow key={item.id}>
                                    {columns.map((col) => (
                                        <TableCell key={col.key}>
                                            {col.render
                                                ? col.render(item)
                                                : String((item as Record<string, unknown>)[col.key] ?? '')}
                                        </TableCell>
                                    ))}
                                    {(editHref || deleteRoute) && (
                                        <TableCell>
                                            <div className="flex items-center gap-1">
                                                {editHref && (
                                                    <Button variant="ghost" size="icon" asChild>
                                                        <Link href={editHref(item)}>
                                                            <Pencil className="h-4 w-4" />
                                                        </Link>
                                                    </Button>
                                                )}
                                                {deleteRoute && (
                                                    <Button variant="ghost" size="icon" onClick={() => setDeleteItem(item)}>
                                                        <Trash2 className="h-4 w-4 text-destructive" />
                                                    </Button>
                                                )}
                                            </div>
                                        </TableCell>
                                    )}
                                </TableRow>
                            ))
                        )}
                    </TableBody>
                </Table>
            </div>

            {/* Pagination */}
            {data.last_page > 1 && (
                <div className="flex items-center justify-between">
                    <p className="text-sm text-muted-foreground">
                        {data.from} - {data.to} sur {data.total}
                    </p>
                    <div className="flex items-center gap-1">
                        {data.links.map((link, i) => (
                            <Button
                                key={i}
                                variant={link.active ? 'default' : 'outline'}
                                size="sm"
                                disabled={!link.url}
                                onClick={() => link.url && router.get(link.url, {}, { preserveState: true })}
                                dangerouslySetInnerHTML={{ __html: link.label }}
                                className="min-w-[36px]"
                            />
                        ))}
                    </div>
                </div>
            )}

            {/* Delete confirmation */}
            <ConfirmDialog
                open={!!deleteItem}
                onClose={() => setDeleteItem(null)}
                onConfirm={handleDelete}
                loading={deleting}
                title="Confirmer la suppression"
                description="Êtes-vous sûr de vouloir supprimer cet élément ? Cette action est irréversible."
            />
        </div>
    );
}
