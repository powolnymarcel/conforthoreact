import { Link, usePage, router } from '@inertiajs/react';
import { useState, type ReactNode } from 'react';
import {
    LayoutDashboard, Users, Image, Briefcase, FolderTree, Package,
    Newspaper, Info, Settings, LogOut, Menu, X, ChevronLeft, MessageSquare,
} from 'lucide-react';
import { Button } from '@/components/ui/button';
import { cn } from '@/lib/utils';
import type { PageProps } from '@/types';

interface NavItem {
    label: string;
    href: string;
    icon: React.ComponentType<{ className?: string }>;
    routePrefix: string;
}

const navItems: NavItem[] = [
    { label: 'Dashboard', href: '/admin', icon: LayoutDashboard, routePrefix: '/admin$' },
    { label: 'Spécialistes', href: '/admin/specialistes', icon: Users, routePrefix: '/admin/specialistes' },
    { label: 'Déroulant accueil', href: '/admin/slides', icon: Image, routePrefix: '/admin/slides' },
    { label: 'Professionnels', href: '/admin/professionnels', icon: Briefcase, routePrefix: '/admin/professionnels' },
    { label: 'Catégories produits', href: '/admin/categories', icon: FolderTree, routePrefix: '/admin/categories' },
    { label: 'Produits', href: '/admin/produits', icon: Package, routePrefix: '/admin/produits' },
{ label: 'Actualités', href: '/admin/actualites', icon: Newspaper, routePrefix: '/admin/actualites' },
    { label: 'À propos', href: '/admin/a-propos', icon: Info, routePrefix: '/admin/a-propos' },
    { label: 'Messages', href: '/admin/contacts', icon: MessageSquare, routePrefix: '/admin/contacts' },
    { label: 'Paramètres', href: '/admin/parametres', icon: Settings, routePrefix: '/admin/parametres' },
];

function isActive(routePrefix: string, currentPath: string): boolean {
    if (routePrefix === '/admin$') {
        return currentPath === '/admin' || currentPath === '/admin/';
    }
    return currentPath.startsWith(routePrefix);
}

export default function AdminLayout({ children, title }: { children: ReactNode; title?: string }) {
    const { auth, flash } = usePage<PageProps>().props;
    const [sidebarOpen, setSidebarOpen] = useState(false);
    const currentPath = typeof window !== 'undefined' ? window.location.pathname : '';

    const handleLogout = () => {
        router.post('/admin/logout');
    };

    return (
        <div className="min-h-screen bg-background">
            {/* Mobile overlay */}
            {sidebarOpen && (
                <div className="fixed inset-0 z-40 bg-black/50 lg:hidden" onClick={() => setSidebarOpen(false)} />
            )}

            {/* Sidebar */}
            <aside className={cn(
                'fixed inset-y-0 left-0 z-50 w-64 bg-sidebar-background text-sidebar-foreground transform transition-transform duration-200 ease-in-out lg:translate-x-0',
                sidebarOpen ? 'translate-x-0' : '-translate-x-full'
            )}>
                <div className="flex h-16 items-center justify-between px-4 border-b border-sidebar-border">
                    <Link href="/admin" className="text-lg font-bold text-sidebar-primary">
                        Admin Panel
                    </Link>
                    <button onClick={() => setSidebarOpen(false)} className="lg:hidden text-sidebar-foreground hover:text-white">
                        <X className="h-5 w-5" />
                    </button>
                </div>
                <nav className="flex-1 overflow-y-auto py-4 px-3">
                    <ul className="space-y-1">
                        {navItems.map((item) => {
                            const active = isActive(item.routePrefix, currentPath);
                            const Icon = item.icon;
                            return (
                                <li key={item.href}>
                                    <Link
                                        href={item.href}
                                        className={cn(
                                            'flex items-center gap-3 rounded-md px-3 py-2 text-sm font-medium transition-colors',
                                            active
                                                ? 'bg-sidebar-accent text-sidebar-primary'
                                                : 'text-sidebar-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground'
                                        )}
                                        onClick={() => setSidebarOpen(false)}
                                    >
                                        <Icon className="h-4 w-4 shrink-0" />
                                        {item.label}
                                    </Link>
                                </li>
                            );
                        })}
                    </ul>
                </nav>
                <div className="border-t border-sidebar-border p-4">
                    <div className="flex items-center gap-3 mb-3">
                        <div className="h-8 w-8 rounded-full bg-sidebar-primary flex items-center justify-center text-sm font-bold text-sidebar-primary-foreground">
                            {auth.user?.name?.charAt(0).toUpperCase()}
                        </div>
                        <div className="min-w-0 flex-1">
                            <p className="text-sm font-medium truncate">{auth.user?.name}</p>
                            <p className="text-xs text-sidebar-foreground/70 truncate">{auth.user?.email}</p>
                        </div>
                    </div>
                    <button
                        onClick={handleLogout}
                        className="flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm text-sidebar-foreground hover:bg-sidebar-accent hover:text-sidebar-accent-foreground transition-colors"
                    >
                        <LogOut className="h-4 w-4" />
                        Déconnexion
                    </button>
                </div>
            </aside>

            {/* Main content */}
            <div className="lg:pl-64">
                {/* Top bar */}
                <header className="sticky top-0 z-30 flex h-16 items-center gap-4 border-b bg-background px-4 sm:px-6">
                    <button onClick={() => setSidebarOpen(true)} className="lg:hidden">
                        <Menu className="h-5 w-5" />
                    </button>
                    {title && <h1 className="text-lg font-semibold">{title}</h1>}
                </header>

                {/* Flash messages */}
                {(flash.success || flash.error) && (
                    <div className="px-4 sm:px-6 pt-4">
                        {flash.success && (
                            <div className="rounded-md bg-green-50 border border-green-200 p-4 text-sm text-green-800">
                                {flash.success}
                            </div>
                        )}
                        {flash.error && (
                            <div className="rounded-md bg-red-50 border border-red-200 p-4 text-sm text-red-800">
                                {flash.error}
                            </div>
                        )}
                    </div>
                )}

                {/* Page content */}
                <main className="p-4 sm:p-6">{children}</main>
            </div>
        </div>
    );
}
