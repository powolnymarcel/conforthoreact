import { useState, useRef, useCallback } from 'react';
import { Upload, X, Loader2, FileIcon } from 'lucide-react';
import { Button } from '@/components/ui/button';
import { cn } from '@/lib/utils';

interface FileUploadProps {
    value?: string;
    onChange: (path: string) => void;
    accept?: string;
    label?: string;
    preview?: boolean;
}

function extractFilename(path: string): string {
    return path.split('/').pop() || path;
}

export function FileUpload({ value, onChange, accept = 'image/*', label, preview = true }: FileUploadProps) {
    const [uploading, setUploading] = useState(false);
    const [progress, setProgress] = useState(0);
    const [previewUrl, setPreviewUrl] = useState<string | null>(null);
    const [error, setError] = useState<string | null>(null);
    const [originalFilename, setOriginalFilename] = useState<string | null>(null);
    const inputRef = useRef<HTMLInputElement>(null);

    const isImage = accept.includes('image');

    const displayUrl = previewUrl || (value ? `/storage/${value}` : null);

    const handleFileSelect = useCallback((e: React.ChangeEvent<HTMLInputElement>) => {
        const file = e.target.files?.[0];
        if (!file) return;

        setError(null);
        setOriginalFilename(file.name);

        // Show preview for images
        if (isImage && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (ev) => setPreviewUrl(ev.target?.result as string);
            reader.readAsDataURL(file);
        }

        // Upload via XMLHttpRequest for progress tracking
        const formData = new FormData();
        formData.append('file', file);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/admin/upload');

        // Get CSRF token from meta tag (plain token → X-CSRF-TOKEN)
        const metaCsrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (metaCsrf) {
            xhr.setRequestHeader('X-CSRF-TOKEN', metaCsrf);
        } else {
            // Fallback: encrypted cookie → X-XSRF-TOKEN
            const cookieCsrf = document.cookie.match(/XSRF-TOKEN=([^;]+)/)?.[1];
            if (cookieCsrf) {
                xhr.setRequestHeader('X-XSRF-TOKEN', decodeURIComponent(cookieCsrf));
            }
        }
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('Accept', 'application/json');

        xhr.upload.onprogress = (ev) => {
            if (ev.lengthComputable) {
                setProgress(Math.round((ev.loaded / ev.total) * 100));
            }
        };

        xhr.onloadstart = () => {
            setUploading(true);
            setProgress(0);
        };

        xhr.onload = () => {
            setUploading(false);
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                onChange(response.path);
            } else {
                setError('Erreur lors de l\'upload du fichier.');
                setPreviewUrl(null);
            }
        };

        xhr.onerror = () => {
            setUploading(false);
            setError('Erreur lors de l\'upload du fichier.');
            setPreviewUrl(null);
        };

        xhr.send(formData);
    }, [isImage, onChange]);

    const handleRemove = () => {
        onChange('');
        setPreviewUrl(null);
        setOriginalFilename(null);
        if (inputRef.current) inputRef.current.value = '';
    };

    return (
        <div className="space-y-2">
            {label && <p className="text-sm font-medium">{label}</p>}

            {/* Preview */}
            {preview && displayUrl && !uploading && (
                <div className="relative inline-block">
                    {isImage ? (
                        <img src={displayUrl} alt="Preview" className="h-32 w-32 rounded-md object-cover border" />
                    ) : (
                        <div className="flex items-center gap-2 rounded-md border p-3">
                            <FileIcon className="h-8 w-8 text-muted-foreground" />
                            <span className="text-sm text-muted-foreground truncate max-w-[200px]">{originalFilename || extractFilename(value!)}</span>
                        </div>
                    )}
                    <button
                        type="button"
                        onClick={handleRemove}
                        className="absolute -top-2 -right-2 rounded-full bg-destructive p-1 text-destructive-foreground shadow-sm hover:bg-destructive/90"
                    >
                        <X className="h-3 w-3" />
                    </button>
                </div>
            )}

            {/* Upload area */}
            {uploading ? (
                <div className="space-y-2">
                    <div className="flex items-center gap-2 text-sm text-muted-foreground">
                        <Loader2 className="h-4 w-4 animate-spin" />
                        <span>Upload en cours... {progress}%</span>
                    </div>
                    <div className="h-2 w-full overflow-hidden rounded-full bg-secondary">
                        <div
                            className="h-full bg-primary transition-all duration-300 ease-in-out rounded-full"
                            style={{ width: `${progress}%` }}
                        />
                    </div>
                </div>
            ) : (
                <div>
                    <input
                        ref={inputRef}
                        type="file"
                        accept={accept}
                        onChange={handleFileSelect}
                        className="hidden"
                        id={`file-upload-${label || 'default'}`}
                    />
                    <Button
                        type="button"
                        variant="outline"
                        onClick={() => inputRef.current?.click()}
                        className="gap-2"
                    >
                        <Upload className="h-4 w-4" />
                        {value ? 'Changer le fichier' : 'Choisir un fichier'}
                    </Button>
                </div>
            )}

            {error && <p className="text-sm text-destructive">{error}</p>}
        </div>
    );
}
