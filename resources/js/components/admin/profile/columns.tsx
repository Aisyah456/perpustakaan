import { router } from "@inertiajs/react";
import type { ColumnDef } from "@tanstack/react-table";
import { Edit, Trash2, Info, BookOpen, Clock, Users } from "lucide-react";
import { Badge } from "@/components/ui/badge";
import { Button } from "@/components/ui/button";
import { Checkbox } from "@/components/ui/checkbox";

/* 1. TIPE DATA DISESUAIKAN DENGAN DATABASE LIBRARYPROFILE */
export type ProfileRow = {
  id: number;
  about_title: string;
  about_description: string;
  vision: string;
  mission: string | string[];
  total_books: number;
  total_staff: number;
  service_hours_weekday: string;
  service_hours_weekend: string;
  created_at: string;
};

/* 2. FUNGSI DELETE (Route disesuaikan ke admin.profile.destroy) */
const handleDelete = (id: number) => {
  if (confirm("Apakah Anda yakin ingin menghapus data profil ini?")) {
    router.delete(`/admin/profile/${id}`, {
      preserveScroll: true,
      onSuccess: () => {
        // Notifikasi biasanya diatur di usePage flash
      }
    });
  }
};

export const columns = (
  onEdit: (profile: ProfileRow) => void
): ColumnDef<ProfileRow>[] => [
    {
      id: "select",
      header: ({ table }) => (
        <Checkbox
          checked={table.getIsAllPageRowsSelected()}
          onCheckedChange={(value) => table.toggleAllPageRowsSelected(!!value)}
        />
      ),
      cell: ({ row }) => (
        <Checkbox
          checked={row.getIsSelected()}
          onCheckedChange={(value) => row.toggleSelected(!!value)}
        />
      ),
    },
    {
      accessorKey: "about_title",
      header: "Judul Profil",
      cell: ({ row }) => (
        <div className="flex flex-col max-w-[200px]">
          <span className="font-semibold text-sm truncate">{row.original.about_title}</span>
          <span className="text-[11px] text-muted-foreground line-clamp-1">
            {row.original.about_description}
          </span>
        </div>
      ),
    },
    {
      accessorKey: "stats",
      header: "Kapasitas",
      cell: ({ row }) => (
        <div className="flex flex-col gap-1 text-xs">
          <div className="flex items-center gap-1.5 text-blue-600">
            <BookOpen className="h-3 w-3" /> {row.original.total_books} Buku
          </div>
          <div className="flex items-center gap-1.5 text-amber-600">
            <Users className="h-3 w-3" /> {row.original.total_staff} Staff
          </div>
        </div>
      ),
    },
    {
      accessorKey: "service_hours",
      header: "Jam Layanan",
      cell: ({ row }) => (
        <div className="flex flex-col gap-1 text-[11px]">
          <div className="flex items-center gap-1">
            <Clock className="h-3 w-3 text-slate-400" />
            <span className="font-medium">Sen-Jum:</span> {row.original.service_hours_weekday}
          </div>
          <div className="flex items-center gap-1">
            <div className="w-3" /> {/* Spacer */}
            <span className="font-medium text-red-500">Sab-Min:</span> {row.original.service_hours_weekend}
          </div>
        </div>
      ),
    },
    {
      accessorKey: "vision",
      header: "Visi",
      cell: ({ row }) => (
        <div className="max-w-[150px] truncate text-xs italic text-muted-foreground">
          "{row.original.vision}"
        </div>
      ),
    },
    {
      id: "actions",
      header: "Aksi",
      cell: ({ row }) => (
        <div className="flex items-center gap-1">
          <Button
            variant="ghost"
            size="icon"
            className="h-8 w-8"
            onClick={() => onEdit(row.original)}
            title="Edit Profil"
          >
            <Edit className="h-4 w-4 text-blue-600" />
          </Button>
          <Button
            variant="ghost"
            size="icon"
            className="h-8 w-8 hover:bg-red-50"
            onClick={() => handleDelete(row.original.id)}
            title="Hapus Profil"
          >
            <Trash2 className="h-4 w-4 text-red-600" />
          </Button>
        </div>
      ),
    },
  ];