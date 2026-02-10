export interface User {
    id: number;
    name: string;
    email: string;
}

export interface PageProps {
    auth: {
        user: User | null;
    };
    flash: {
        success: string | null;
        error: string | null;
    };
    ziggy: {
        url: string;
        port: number | null;
        defaults: Record<string, unknown>;
        routes: Record<string, unknown>;
        location: string;
    };
}

export interface PaginatedData<T> {
    data: T[];
    links: PaginationLink[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    from: number;
    to: number;
}

export interface PaginationLink {
    url: string | null;
    label: string;
    active: boolean;
}

export interface Specialiste {
    id: number;
    uuid: string;
    slug: string;
    name: string;
    firstname: string;
    picture: string;
    job: string;
    short_description?: string;
    created_at: string;
    updated_at: string;
}

export interface Slide {
    id: number;
    title: string;
    category: string;
    short_description: string;
    image: string;
    created_at: string;
    updated_at: string;
}

export interface Pro {
    id: number;
    title: string;
    description: string;
    category: string;
    subtitle: string | null;
    file_1: string;
    file_2: string;
    external_link: string | null;
    image: string;
    created_at: string;
    updated_at: string;
}

export interface ProductCategory {
    id: number;
    title: string;
    slug: string;
    picture: string;
    description: string;
    products?: Product[];
    created_at: string;
    updated_at: string;
}

export interface Product {
    id: number;
    product_category_id: number;
    picture: string;
    title: string;
    slug: string;
    description: string;
    mettre_en_avant: boolean;
    afficher: boolean;
    category?: ProductCategory;
    created_at: string;
    updated_at: string;
}

export interface Blog {
    id: number;
    title: string;
    category: string;
    image: string;
    date: string;
    user_name: string;
    user_firstname: string;
    content: string;
    slug: string;
    created_at: string;
    updated_at: string;
}

export interface Deroulant {
    id: number;
    title: string;
    created_at: string;
    updated_at: string;
}

export interface APropos {
    id: number;
    title: string;
    description: string;
    sentences: { sentence: string }[];
    image_1: string;
    image_2: string;
    created_at: string;
    updated_at: string;
}

export interface Settings {
    [key: string]: string;
}
