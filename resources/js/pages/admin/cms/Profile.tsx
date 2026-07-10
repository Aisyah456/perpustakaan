import { Head, usePage, router } from '@inertiajs/react'; // Tambahkan router
import { Plus } from 'lucide-react';
import { useEffect, useState } from 'react';
import AppLayout from '@/layouts/app-layout';
import { Button } from '@/components/ui/button';
import { DataTable } from '@/components/admin/profile/data-table';
import { columns, type ProfileRow as ProfileRowType } from '@/components/admin/profile/columns';
import AddProfileModal from '@/components/admin/profile/AddProfileModal';
import { Toaster, toast } from 'sonner';
import { route } from 'ziggy-js';

export type ProfileRow = ProfileRowType;

interface Props {
    profiles?: ProfileRow[];
}

export default function ProfileCmsPage({ profiles = [] }: Props) {
    const { flash } = usePage().props as any;
    const [addModalOpen, setAddModalOpen] = useState(false);

    useEffect(() => {
        if (flash?.success) toast.success(flash.success);
        if (flash?.error) toast.error(flash.error);
    }, [flash]);

    // Navigasi ke halaman edit terpisah
    const onEdit = (item: ProfileRow) => {
        router.get(route('admin.profile.edit', item.id));
    };

    return (
        <AppLayout breadcrumbs={[{ title: 'Manajemen Profil', href: '#' }]}>
            <Head title="Manajemen Profil" />
            <Toaster position="top-right" richColors closeButton />

            <div className="flex flex-col gap-6 p-4">
                <div className="flex justify-between items-center">
                    <div>
                        <h1 className="text-2xl font-bold tracking-tight">Data Profil</h1>
                        <p className="text-sm text-muted-foreground">Kelola profil institusi perpustakaan</p>
                    </div>

                    <Button onClick={() => setAddModalOpen(true)}>
                        <Plus className="h-4 w-4 mr-1" />
                        Tambah Profil
                    </Button>
                </div>

                <div className="bg-white dark:bg-zinc-900 border rounded-lg p-4 shadow-sm">
                    <DataTable
                        columns={columns(onEdit)}
                        data={profiles}
                        searchKey="about_title" 
                    />
                </div>
            </div>

            {/* Modal Tambah tetap ada jika diinginkan, atau bisa diubah ke halaman juga */}
            <AddProfileModal
                isOpen={addModalOpen}
                onClose={() => setAddModalOpen(false)}
            />
        </AppLayout>
    );
}