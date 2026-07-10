import { Head, usePage } from '@inertiajs/react'; // Tambahkan usePage
import { Plus } from 'lucide-react';
import { useState, useEffect } from 'react'; // Tambahkan useEffect
import AppLayout from '@/layouts/app-layout';
import { Button } from '@/components/ui/button';
import { DataTable } from '@/components/admin/hero/data-table';
import { columns } from '@/components/admin/hero/columns';
import AddHeroModal from '@/components/admin/hero/AddHeroModal';
import EditHeroModal from '@/components/admin/hero/EditHeroModal';
import { Toaster, toast } from 'sonner'; // Import Sonner

export interface HeroRow {
    id: number;
    badge_text: string;
    title_line_1: string;
    title_highlight: string;
    subtitle: string;
    image_path: string;
    stats_label: string;
    stats_value: string;
    is_active: boolean;
}

interface Props {
    heroes?: HeroRow[];
}

export default function HeroCmsPage({ heroes = [] }: Props) {
    // 1. Ambil flash data dari global props Inertia
    const { flash } = usePage().props as any;

    const [addModalOpen, setAddModalOpen] = useState(false);
    const [editModalOpen, setEditModalOpen] = useState(false);
    const [selectedHero, setSelectedHero] = useState<HeroRow | null>(null);

    // 2. Gunakan useEffect untuk mendeteksi perubahan pada flash message
    useEffect(() => {
        if (flash?.success) {
            toast.success(flash.success);
        }
        if (flash?.error) {
            toast.error(flash.error);
        }
    }, [flash]);

    const onEdit = (item: HeroRow) => {
        setSelectedHero(item);
        setEditModalOpen(true);
    };

    return (
        <AppLayout breadcrumbs={[{ title: 'Banner Hero', href: '#' }]}>
            <Head title="Manajemen Banner" />

            {/* 3. Letakkan Toaster di sini agar notifikasi bisa muncul */}
            <Toaster position="top-right" richColors closeButton />

            <div className="flex flex-col gap-6 p-4">
                {/* HEADER */}
                <div className="flex justify-between items-center">
                    <div>
                        <h1 className="text-2xl font-bold tracking-tight">
                            Banner Hero
                        </h1>
                        <p className="text-sm text-muted-foreground">
                            Kelola Hero Section website
                        </p>
                    </div>

                    <Button onClick={() => setAddModalOpen(true)}>
                        <Plus className="h-4 w-4 mr-1" />
                        Tambah Banner
                    </Button>
                </div>

                {/* TABLE */}
                <div className="bg-white dark:bg-zinc-900 border rounded-lg p-4 shadow-sm">
                    <DataTable
                        columns={columns(onEdit)}
                        data={heroes}
                        searchKey="title_line_1"
                    />
                </div>
            </div>

            {/* MODAL TAMBAH */}
            <AddHeroModal
                isOpen={addModalOpen}
                onClose={() => setAddModalOpen(false)}
            />

            {/* MODAL EDIT */}
            {selectedHero && (
                <EditHeroModal
                    isOpen={editModalOpen}
                    hero={selectedHero}
                    onClose={() => {
                        setEditModalOpen(false);
                        setSelectedHero(null);
                    }}
                />
            )}
        </AppLayout>
    );
}