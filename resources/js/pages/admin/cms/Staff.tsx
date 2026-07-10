import { Head, usePage } from '@inertiajs/react';
import { Plus } from 'lucide-react';
import { useState, useEffect } from 'react';
import AppLayout from '@/layouts/app-layout';
import { Button } from '@/components/ui/button';
import { DataTable } from '@/components/admin/staff/data-table'; 
import { columns } from '@/components/admin/staff/columns';      
import AddStaffModal from '@/components/admin/staff/AddStaffModal';
import EditStaffModal from '@/components/admin/staff/EditStaffModal';
import { Toaster, toast } from 'sonner';

// Pastikan export interface ini agar bisa diimport di columns.tsx
export interface StaffRow {
    id: number;
    name: string;
    title: string;
    division: string | null;
    image: string | null;
    is_head: boolean;
    order: number;
}

interface Props {
    staff?: StaffRow[];
}

export default function StaffCmsPage({ staff = [] }: Props) {
    const { flash } = usePage().props as any;

    const [addModalOpen, setAddModalOpen] = useState(false);
    const [editModalOpen, setEditModalOpen] = useState(false);
    const [selectedStaff, setSelectedStaff] = useState<StaffRow | null>(null);

    useEffect(() => {
        if (flash?.success) toast.success(flash.success);
        if (flash?.error) toast.error(flash.error);
    }, [flash]);

    const onEdit = (item: StaffRow) => {
        setSelectedStaff(item);
        setEditModalOpen(true);
    };

    return (
        <AppLayout breadcrumbs={[{ title: 'Manajemen Staf', href: '#' }]}>
            <Head title="Manajemen Staf Perpustakaan" />
            <Toaster position="top-right" richColors closeButton />

            <div className="flex flex-col gap-6 p-4">
                <div className="flex justify-between items-center">
                    <div>
                        <h1 className="text-2xl font-bold tracking-tight">Staf Perpustakaan</h1>
                        <p className="text-sm text-muted-foreground">Kelola data pegawai perpustakaan</p>
                    </div>
                    <Button onClick={() => setAddModalOpen(true)}>
                        <Plus className="h-4 w-4 mr-1" /> Tambah Staf
                    </Button>
                </div>

                <div className="bg-white dark:bg-zinc-900 border rounded-lg p-4 shadow-sm">
                    <DataTable
                        columns={columns(onEdit)}
                        data={staff}
                        searchKey="name" 
                    />
                </div>
            </div>

            <AddStaffModal isOpen={addModalOpen} onClose={() => setAddModalOpen(false)} />

            {selectedStaff && (
                <EditStaffModal
                    isOpen={editModalOpen}
                    staff={selectedStaff}
                    onClose={() => {
                        setEditModalOpen(false);
                        setSelectedStaff(null);
                    }}
                />
            )}
        </AppLayout>
    );
}