// resources/js/Pages/admin/cms/EditProfile.tsx

import { Head, useForm, router } from '@inertiajs/react';
import { ArrowLeft, Save, Info, Target, Clock, LibraryBig, Trash2, Plus } from 'lucide-react';
import AppLayout from '@/layouts/app-layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Label } from '@/components/ui/label';
import { toast } from 'sonner';
import { route } from 'ziggy-js';

interface LibraryProfile {
    id: number;
    about_title: string;
    about_description: string;
    vision: string;
    mission: string[] | string;
    total_books: number;
    total_staff: number;
    service_hours_weekday: string;
    service_hours_weekend: string;
}

interface Props {
    profile: LibraryProfile;
}

export default function EditProfilePage({ profile }: Props) {
    // Parsing mission awal agar selalu array
    const parsedMission = Array.isArray(profile.mission) 
        ? profile.mission 
        : (typeof profile.mission === 'string' ? JSON.parse(profile.mission) : []);

    const { data, setData, put, processing, errors, reset } = useForm({
        about_title: profile.about_title || '',
        about_description: profile.about_description || '',
        vision: profile.vision || '',
        mission: parsedMission,
        total_books: profile.total_books || 0,
        total_staff: profile.total_staff || 0,
        service_hours_weekday: profile.service_hours_weekday || '',
        service_hours_weekend: profile.service_hours_weekend || '',
    });

    const breadcrumbs = [
        { title: 'Manajemen Profil', href: route('admin.profile.index') },
        { title: 'Edit Profil', href: '#' },
    ];

    const addMission = () => setData("mission", [...data.mission, ""]);
    
    const removeMission = (index: number) => {
        const newMission = [...data.mission];
        newMission.splice(index, 1);
        setData("mission", newMission);
    };

    const updateMission = (index: number, value: string) => {
        const newMission = [...data.mission];
        newMission[index] = value;
        setData("mission", newMission);
    };

    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        put(route('admin.profile.update', profile.id), {
            onSuccess: () => toast.success('Profil berhasil diperbarui'),
            onError: () => toast.error('Terjadi kesalahan saat menyimpan data'),
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title={`Edit Profil - ${data.about_title}`} />

            <div className="p-4 md:p-8">
                <form onSubmit={submit} className="max-w-5xl mx-auto space-y-6">
                    <div className="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b pb-6">
                        <div className="flex items-center gap-4">
                            <Button
                                type="button"
                                variant="outline"
                                size="icon"
                                onClick={() => router.get(route('admin.profile.index'))}
                            >
                                <ArrowLeft className="h-5 w-5" />
                            </Button>
                            <div>
                                <h1 className="text-2xl font-bold tracking-tight">Edit Profil Institusi</h1>
                                <p className="text-muted-foreground text-sm">Sesuaikan informasi detail perpustakaan.</p>
                            </div>
                        </div>
                        <div className="flex items-center gap-3 w-full md:w-auto">
                            <Button type="button" variant="ghost" onClick={() => reset()} disabled={processing}>
                                Reset
                            </Button>
                            <Button type="submit" disabled={processing} className="gap-2 bg-blue-600 hover:bg-blue-700">
                                <Save className="h-4 w-4" />
                                {processing ? 'Menyimpan...' : 'Simpan Perubahan'}
                            </Button>
                        </div>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div className="space-y-6">
                            <Card>
                                <CardHeader className="pb-3">
                                    <CardTitle className="text-sm font-medium flex items-center gap-2">
                                        <LibraryBig className="h-4 w-4 text-blue-500" /> Statistik
                                    </CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label>Total Buku</Label>
                                        <Input
                                            type="number"
                                            value={data.total_books}
                                            onChange={e => setData('total_books', parseInt(e.target.value) || 0)}
                                        />
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Jumlah Staff</Label>
                                        <Input
                                            type="number"
                                            value={data.total_staff}
                                            onChange={e => setData('total_staff', parseInt(e.target.value) || 0)}
                                        />
                                    </div>
                                </CardContent>
                            </Card>

                            <Card>
                                <CardHeader className="pb-3">
                                    <CardTitle className="text-sm font-medium flex items-center gap-2">
                                        <Clock className="h-4 w-4 text-orange-500" /> Jam Layanan
                                    </CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label>Senin - Jumat</Label>
                                        <Input
                                            value={data.service_hours_weekday}
                                            onChange={e => setData('service_hours_weekday', e.target.value)}
                                        />
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Sabtu - Minggu</Label>
                                        <Input
                                            value={data.service_hours_weekend}
                                            onChange={e => setData('service_hours_weekend', e.target.value)}
                                        />
                                    </div>
                                </CardContent>
                            </Card>
                        </div>

                        <div className="md:col-span-2 space-y-6">
                            <Card>
                                <CardHeader>
                                    <CardTitle className="flex items-center gap-2 text-lg">
                                        <Info className="h-5 w-5 text-blue-600" /> Informasi Umum
                                    </CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-4">
                                    <div className="space-y-2">
                                        <Label>Judul Profil</Label>
                                        <Input
                                            value={data.about_title}
                                            onChange={e => setData('about_title', e.target.value)}
                                            className={errors.about_title ? "border-red-500" : ""}
                                        />
                                    </div>
                                    <div className="space-y-2">
                                        <Label>Deskripsi</Label>
                                        <Textarea
                                            rows={6}
                                            value={data.about_description}
                                            onChange={e => setData('about_description', e.target.value)}
                                        />
                                    </div>
                                </CardContent>
                            </Card>

                            <Card>
                                <CardHeader>
                                    <CardTitle className="flex items-center gap-2 text-lg">
                                        <Target className="h-5 w-5 text-emerald-600" /> Visi & Misi
                                    </CardTitle>
                                </CardHeader>
                                <CardContent className="space-y-6">
                                    <div className="space-y-2">
                                        <Label className="font-semibold">Visi</Label>
                                        <Input
                                            value={data.vision}
                                            onChange={e => setData('vision', e.target.value)}
                                        />
                                    </div>
                                    <div className="space-y-3">
                                        <div className="flex justify-between items-center">
                                            <Label className="font-semibold">Misi</Label>
                                            <Button type="button" variant="outline" size="sm" onClick={addMission}>
                                                <Plus className="h-4 w-4 mr-1" /> Tambah
                                            </Button>
                                        </div>
                                        <div className="space-y-3">
                                            {data.mission.map((m: string, idx: number) => (
                                                <div key={idx} className="flex gap-2">
                                                    <Textarea 
                                                        value={m} 
                                                        onChange={(e) => updateMission(idx, e.target.value)}
                                                    />
                                                    <Button 
                                                        variant="ghost" 
                                                        size="icon" 
                                                        onClick={() => removeMission(idx)}
                                                        className="text-red-500"
                                                    >
                                                        <Trash2 className="h-4 w-4" />
                                                    </Button>
                                                </div>
                                            ))}
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}