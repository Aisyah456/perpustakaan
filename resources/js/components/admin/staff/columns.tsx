import { ColumnDef } from "@tanstack/react-table";
import { StaffRow } from "@/Pages/admin/cms/Staff"; 
import { Button } from "@/components/ui/button";
import { Edit, MoreHorizontal, Trash, UserCheck } from "lucide-react";
import { 
    DropdownMenu, 
    DropdownMenuContent, 
    DropdownMenuItem, 
    DropdownMenuLabel, 
    DropdownMenuTrigger 
} from "@/components/ui/dropdown-menu";
import { Badge } from "@/components/ui/badge";
import { router } from "@inertiajs/react";

export const columns = (onEdit: (staff: StaffRow) => void): ColumnDef<StaffRow>[] => [
    {
        accessorKey: "image",
        header: "Foto",
        cell: ({ row }) => {
            const image = row.getValue("image") as string;
            const name = row.original.name;
            
            // Logika Penentuan URL:
            // 1. Jika mengandung 'http', gunakan langsung (DiceBear/External)
            // 2. Jika ada string tapi bukan http, gunakan path storage lokal
            // 3. Jika kosong, gunakan DiceBear sebagai fallback instan
            let imageUrl = `https://api.dicebear.com/7.x/avataaars/svg?seed=${name}`;

            if (image) {
                if (image.startsWith('http')) {
                    imageUrl = image;
                } else {
                    imageUrl = `/storage/${image}`;
                }
            }

            return (
                <div className="h-10 w-10 overflow-hidden rounded-full border bg-slate-50 shadow-sm">
                    <img 
                        src={imageUrl} 
                        alt={name} 
                        className="h-full w-full object-cover"
                        onError={(e) => {
                            // Mencegah infinite loop jika image error, balikkan ke DiceBear
                            const target = e.currentTarget;
                            if (target.src !== `https://api.dicebear.com/7.x/avataaars/svg?seed=${name}`) {
                                target.src = `https://api.dicebear.com/7.x/avataaars/svg?seed=${name}`;
                            }
                        }}
                    />
                </div>
            );
        }
    },
    { accessorKey: "name", header: "Nama Lengkap" },
    { accessorKey: "title", header: "Jabatan" },
    {
        accessorKey: "division",
        header: "Divisi",
        cell: ({ row }) => row.getValue("division") || <span className="text-muted-foreground italic text-[10px]">Pimpinan</span>
    },
    {
        accessorKey: "is_head",
        header: "Status",
        cell: ({ row }) => (
            row.getValue("is_head") ? 
            <Badge className="bg-amber-500 hover:bg-amber-600 text-white border-none shadow-sm">
                <UserCheck className="w-3 h-3 mr-1"/> Kepala
            </Badge> : 
            <Badge variant="outline" className="text-slate-500 border-slate-200">Staf</Badge>
        )
    },
    {
        id: "actions",
        cell: ({ row }) => {
            const staff = row.original;
            return (
                <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                        <Button variant="ghost" className="h-8 w-8 p-0 focus-visible:ring-0">
                            <MoreHorizontal className="h-4 w-4" />
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end" className="w-32">
                        <DropdownMenuLabel>Aksi</DropdownMenuLabel>
                        <DropdownMenuItem onClick={() => onEdit(staff)} className="cursor-pointer">
                            <Edit className="mr-2 h-4 w-4 text-blue-600" /> Edit
                        </DropdownMenuItem>
                        <DropdownMenuItem 
                            onClick={() => {
                                if (confirm(`Hapus data staf "${staff.name}"?`)) {
                                    router.delete(route('admin.staff.destroy', staff.id));
                                }
                            }} 
                            className="text-red-600 cursor-pointer focus:bg-red-50 focus:text-red-700"
                        >
                            <Trash className="mr-2 h-4 w-4" /> Hapus
                        </DropdownMenuItem>
                    </DropdownMenuContent>
                </DropdownMenu>
            );
        },
    },
];