"use client"

import { router } from "@inertiajs/react"
import type { ColumnDef } from "@tanstack/react-table"
import { MoreHorizontal, Edit, Trash2, CheckCircle2, XCircle, Image as ImageIcon } from "lucide-react"
import { route } from "ziggy-js"
import { Badge } from "@/components/ui/badge"
import { Button } from "@/components/ui/button"
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu"
import type { HeroRow } from "@/pages/admin/cms/Hero"

export const columns = (onEdit: (item: HeroRow) => void): ColumnDef<HeroRow>[] => [
    {
        accessorKey: "image_path",
        header: "Preview",
        cell: ({ row }) => {
            const imagePath = row.getValue("image_path") as string;

            // Logika: Jika path mengandung 'http' gunakan langsung, jika tidak tambahkan prefix /storage/
            const imageUrl = imagePath?.startsWith('http')
                ? imagePath
                : imagePath ? `/storage/${imagePath}` : null;

            return (
                <div className="relative h-12 w-20 overflow-hidden rounded-md border bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center">
                    {imageUrl ? (
                        <img
                            src={imageUrl}
                            alt="Hero Thumbnail"
                            className="object-cover w-full h-full"
                            onError={(e) => {
                                (e.target as HTMLImageElement).src = "/images/Perpustakaan Kampus.jpg";
                            }}
                        />
                    ) : (
                        <ImageIcon className="h-5 w-5 text-zinc-400" />
                    )}
                </div>
            );
        },
    },
    {
        accessorKey: "title_line_1",
        header: "Konten Banner",
        cell: ({ row }) => {
            return (
                <div className="flex flex-col max-w-62.5 truncate">
                    <span className="font-semibold text-zinc-900 dark:text-zinc-100 truncate">
                        {row.original.title_line_1}
                    </span>
                    <span className="text-[11px] text-primary font-medium italic truncate">
                        {row.original.title_highlight}
                    </span>
                    <span className="text-[10px] text-zinc-500 truncate mt-0.5">
                        {row.original.badge_text}
                    </span>
                </div>
            )
        }
    },
    {
        accessorKey: "stats_label",
        header: "Statistik",
        cell: ({ row }) => (
            <div className="flex flex-col border-l pl-3">
                <span className="text-[10px] uppercase tracking-wider text-zinc-500 font-bold">
                    {row.original.stats_label}
                </span>
                <span className="text-sm font-black text-zinc-800 dark:text-zinc-200">
                    {row.original.stats_value}
                </span>
            </div>
        ),
    },
    {
        accessorKey: "is_active",
        header: "Status",
        cell: ({ row }) => {
            // Konversi ke boolean jika dari DB datang sebagai 0/1 (number)
            const isActive = Boolean(row.getValue("is_active"));
            return (
                <Badge
                    variant={isActive ? "outline" : "secondary"}
                    className={isActive
                        ? "bg-emerald-50 border-emerald-200 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 dark:border-emerald-500/20"
                        : "opacity-60"
                    }
                >
                    {isActive ? (
                        <CheckCircle2 className="mr-1.5 h-3 w-3" />
                    ) : (
                        <XCircle className="mr-1.5 h-3 w-3" />
                    )}
                    {isActive ? "Aktif" : "Draft"}
                </Badge>
            );
        },
    },
    {
        id: "actions",
        header: () => <div className="text-right">Aksi</div>,
        cell: ({ row }) => {
            const hero = row.original;

            const onDelete = () => {
                if (confirm("Hapus banner ini? Tindakan ini tidak dapat dibatalkan.")) {
                    // Gunakan route('hero.destroy') sesuai mapping resource di Laravel
                    router.delete(route('hero.destroy', hero.id), {
                        preserveScroll: true,
                    });
                }
            };

            return (
                <div className="flex justify-end gap-2">
                    <Button
                        variant="ghost"
                        size="icon"
                        className="h-8 w-8 text-blue-500 hover:text-blue-600 hover:bg-blue-50"
                        onClick={() => onEdit(hero)}
                        title="Edit Banner"
                    >
                        <Edit className="h-4 w-4" />
                    </Button>

                    <Button
                        variant="ghost"
                        size="icon"
                        className="h-8 w-8 text-destructive hover:text-red-600 hover:bg-destructive/10"
                        onClick={onDelete}
                        title="Hapus"
                    >
                        <Trash2 className="h-4 w-4" />
                    </Button>
                </div>
            );
        },
    },
];  