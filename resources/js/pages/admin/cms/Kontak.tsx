import { Head } from '@inertiajs/react';
import { Mail, Clock, MessageSquare, ShieldAlert } from 'lucide-react';
import { useState, useCallback, useMemo } from 'react';

import { columns } from '@/components/admin/messages/columns';
import { DataTable } from '@/components/admin/messages/data-table';
import ReplyMessageModal from '@/components/admin/messages/ReplyMessageModal';
import AppLayout from '@/layouts/app-layout';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import type { BreadcrumbItem } from '@/types';

export interface Message {
    id: number;
    nama_lengkap: string;
    nim_nidn: string | null;
    email: string;
    subjek: string;
    pesan: string;
    balasan_admin: string | null;
    status: 'pending' | 'selesai';
    tgl_dibalas: string | null;
    created_at: string;
    updated_at: string;
}

export default function MessagesIndex({ messages }: { messages: Message[] }) {
    const [isReplyModalOpen, setIsReplyModalOpen] = useState(false);
    const [selectedMessage, setSelectedMessage] = useState<Message | null>(null);

    const handleReply = useCallback((message: Message) => {
        setSelectedMessage(message);
        setIsReplyModalOpen(true);
    }, []);

    const closeReplyModal = useCallback(() => {
        setIsReplyModalOpen(false);
        setTimeout(() => setSelectedMessage(null), 300);
    }, []);

    const pendingCount = useMemo(() => 
        messages.filter(m => m.status === 'pending').length, 
    [messages]);

    const breadcrumbs: BreadcrumbItem[] = [
        { label: 'Dashboard', href: '/admin' },
        { label: 'Pesan Kontak', href: '#' },
    ];

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Manajemen Pesan" />

            <div className="flex flex-col gap-8 p-6 max-w-[1600px] mx-auto w-full">
                
                {/* HEADER SECTION */}
                <div className="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div className="flex items-center gap-4">
                        <div className="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-600/10 text-indigo-600 ring-1 ring-indigo-600/20">
                            <Mail className="h-6 w-6" />
                        </div>
                        <div>
                            <h1 className="text-3xl font-extrabold tracking-tight">Pesan Masuk</h1>
                            <p className="text-muted-foreground text-sm flex items-center gap-2 mt-1">
                                <MessageSquare className="h-4 w-4" />
                                Kelola masukan dan pertanyaan pengguna.
                            </p>
                        </div>
                    </div>

                    {/* STATUS PENDING (Hanya muncul jika > 0) */}
                    {pendingCount > 0 && (
                        <div className="flex items-center gap-3 px-4 py-2 bg-amber-50 border border-amber-200 rounded-xl animate-in fade-in slide-in-from-right-4">
                            <div className="p-1.5 bg-white rounded-lg shadow-sm">
                                <Clock className="h-4 w-4 text-amber-600 animate-pulse" />
                            </div>
                            <div>
                                <p className="text-[10px] uppercase font-bold text-amber-600/70 leading-none">Menunggu</p>
                                <p className="text-lg font-bold text-amber-700 leading-none mt-1">{pendingCount}</p>
                            </div>
                        </div>
                    )}
                </div>

                {/* TABLE AREA */}
                <Card className="border shadow-xl bg-card/50 backdrop-blur-sm overflow-hidden">
                    <CardHeader className="border-b bg-muted/30 px-6 py-4">
                        <div className="flex items-center justify-between">
                            <CardTitle className="text-lg font-semibold flex items-center gap-2">
                                Daftar Pesan
                                <Badge variant="secondary" className="font-mono text-[10px]">v1.0</Badge>
                            </CardTitle>
                            {pendingCount > 5 && (
                                <div className="flex items-center gap-2 text-xs font-medium text-destructive">
                                    <ShieldAlert className="h-4 w-4" />
                                    Prioritas: Segera balas pesan pending.
                                </div>
                            )}
                        </div>
                    </CardHeader>
                    <CardContent className="p-0 relative">
                        <div className="absolute inset-0 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none" />
                        <DataTable
                            // @ts-ignore
                            columns={columns(handleReply)}
                            data={messages}
                            searchKey="nama_lengkap"
                        />
                    </CardContent>
                </Card>
            </div>

            <ReplyMessageModal
                isOpen={isReplyModalOpen}
                message={selectedMessage}
                onClose={closeReplyModal}
            />
        </AppLayout>
    );
}