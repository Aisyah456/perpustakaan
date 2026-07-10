import { router } from "@inertiajs/react";
import type { ColumnDef } from "@tanstack/react-table";
import { Edit, Trash2, ImageOff } from "lucide-react";
import { toast } from "sonner";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Service } from "@/pages/admin/cms/Services";

/* ======================
   DELETE LOGIC
====================== */
const handleDelete = (id: number, title: string) => {
    // Gunakan toast.warning sebagai dialog konfirmasi yang lebih elegan
    toast.warning(`Hapus layanan "${title}"?`, {
        description: "Tindakan ini juga akan menghapus file gambar terkait dan tidak dapat dibatalkan.",
        duration: 8000,
        action: {
            label: "Ya, Hapus",
            onClick: () => {
                router.delete(`/admin/services/${id}`, {
                    preserveScroll: true,
                    onError: () => {
                        toast.error("Gagal menghapus layanan.", {
                            description: "Silakan coba lagi.",
                        });
                    },
                });
            },
        },
        cancel: {
            label: "Batal",
            onClick: () => {}, // Cukup dismiss toast
        },
    });
};

/* ======================
   COLUMNS DEFINITION
====================== */
export const columns = (
    onEdit: (service: Service) => void
): ColumnDef<Service>[] => [
    {
        accessorKey: "icon",
        header: "Icon/Foto",
        cell: ({ row }) => {
            const iconUrl = row.original.icon;
            return (
                <div className="flex h-12 w-12 items-center justify-center rounded-lg border bg-muted overflow-hidden">
                    {iconUrl ? (
                        <img
                            src={iconUrl}
                            alt={row.original.title}
                            className="h-full w-full object-cover"
                            onError={(e) => {
                                (e.target as HTMLImageElement).src =
                                    "https://placehold.co/100x100?text=Error";
                            }}
                        />
                    ) : (
                        <ImageOff className="h-5 w-5 text-muted-foreground" />
                    )}
                </div>
            );
        },
    },
    {
        accessorKey: "title",
        header: "Informasi Layanan",
        cell: ({ row }) => (
            <div className="flex flex-col max-w-[250px]">
                <span className="font-semibold truncate">{row.original.title}</span>
                <span className="text-xs text-muted-foreground line-clamp-2">
                    {row.original.subtitle}
                </span>
            </div>
        ),
    },
    {
        accessorKey: "order",
        header: "Urutan",
        cell: ({ row }) => (
            <div className="font-mono text-sm">{row.original.order}</div>
        ),
    },
    {
        accessorKey: "is_active",
        header: "Status",
        cell: ({ row }) => {
            const isActive = row.original.is_active;
            return (
                <Badge
                    variant={isActive ? "default" : "secondary"}
                    className={isActive ? "bg-green-500 hover:bg-green-600" : ""}
                >
                    {isActive ? "Aktif" : "Nonaktif"}
                </Badge>
            );
        },
    },
    {
        id: "actions",
        header: "Aksi",
        cell: ({ row }) => (
            <div className="flex items-center gap-1">
                <Button
                    variant="ghost"
                    size="icon"
                    onClick={() => onEdit(row.original)}
                    className="h-8 w-8 text-blue-600 hover:text-blue-700 hover:bg-blue-50"
                >
                    <Edit className="h-4 w-4" />
                </Button>
                <Button
                    variant="ghost"
                    size="icon"
                    onClick={() => handleDelete(row.original.id, row.original.title)}
                    className="h-8 w-8 text-red-600 hover:text-red-700 hover:bg-red-50"
                >
                    <Trash2 className="h-4 w-4" />
                </Button>
            </div>
        ),
    },
];