import { useForm } from "@inertiajs/react";
import { Button } from "@/components/ui/button";
import {
    Dialog,
    DialogContent,
    DialogHeader,
    DialogTitle,
    DialogFooter,
    DialogDescription,
} from "@/components/ui/dialog";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { useState } from "react";
import { Plus, Trash2 } from "lucide-react";

interface AddProfileModalProps {
    isOpen: boolean;
    onClose: () => void;
}

export default function AddProfileModal({ isOpen, onClose }: AddProfileModalProps) {
    // 1. Inisialisasi Form sesuai dengan struktur DATABASE LibraryProfile
    const { data, setData, post, processing, errors, reset, clearErrors } = useForm({
        about_title: "",
        about_description: "",
        vision: "",
        mission: [] as string[], // Disimpan sebagai array untuk dikelola di form
        total_books: 0,
        total_staff: 0,
        service_hours_weekday: "08:00 - 17:00",
        service_hours_weekend: "Tutup",
    });

    const handleClose = () => {
        reset();
        clearErrors();
        onClose();
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post(route('admin.profile.store'), {
            onSuccess: () => handleClose(),
        });
    };

    // Helper untuk mengelola array Mission
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

    return (
        <Dialog open={isOpen} onOpenChange={(open) => !open && handleClose()}>
            <DialogContent className="sm:max-w-[700px] max-h-[90vh] overflow-y-auto">
                <DialogHeader>
                    <DialogTitle>Tambah Profil Perpustakaan</DialogTitle>
                    <DialogDescription>
                        Isi informasi profil institusi perpustakaan, visi, misi, dan statistik layanan.
                    </DialogDescription>
                </DialogHeader>

                <form onSubmit={handleSubmit} className="grid gap-5 py-4">
                    {/* Section: Tentang Kami */}
                    <div className="grid gap-4 border-b pb-4">
                        <div className="grid gap-2">
                            <Label htmlFor="about_title">Judul Profil</Label>
                            <Input
                                id="about_title"
                                placeholder="Contoh: Profil Perpustakaan Pusat"
                                value={data.about_title}
                                onChange={(e) => setData("about_title", e.target.value)}
                            />
                            {errors.about_title && <p className="text-xs text-destructive">{errors.about_title}</p>}
                        </div>
                        <div className="grid gap-2">
                            <Label htmlFor="about_description">Deskripsi Singkat</Label>
                            <Textarea
                                id="about_description"
                                placeholder="Jelaskan sejarah atau profil singkat perpustakaan..."
                                value={data.about_description}
                                onChange={(e) => setData("about_description", e.target.value)}
                                rows={3}
                            />
                            {errors.about_description && <p className="text-xs text-destructive">{errors.about_description}</p>}
                        </div>
                    </div>

                    {/* Section: Visi & Misi */}
                    <div className="grid gap-4 border-b pb-4">
                        <div className="grid gap-2">
                            <Label htmlFor="vision">Visi</Label>
                            <Input
                                id="vision"
                                placeholder="Visi perpustakaan..."
                                value={data.vision}
                                onChange={(e) => setData("vision", e.target.value)}
                            />
                        </div>
                        <div className="grid gap-2">
                            <Label className="flex justify-between items-center">
                                Misi
                                <Button type="button" variant="outline" size="sm" onClick={addMission}>
                                    <Plus className="h-3 w-3 mr-1" /> Tambah Misi
                                </Button>
                            </Label>
                            <div className="space-y-2">
                                {data.mission.map((m, idx) => (
                                    <div key={idx} className="flex gap-2">
                                        <Input
                                            value={m}
                                            onChange={(e) => updateMission(idx, e.target.value)}
                                            placeholder={`Misi ke-${idx + 1}`}
                                        />
                                        <Button variant="ghost" size="icon" onClick={() => removeMission(idx)}>
                                            <Trash2 className="h-4 w-4 text-destructive" />
                                        </Button>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>

                    {/* Section: Stats & Jam Layanan */}
                    <div className="grid grid-cols-2 gap-6">
                        <div className="space-y-4">
                            <div className="grid gap-2">
                                <Label htmlFor="total_books">Total Koleksi Buku</Label>
                                <Input
                                    id="total_books"
                                    type="number"
                                    value={data.total_books}
                                    onChange={(e) => setData("total_books", parseInt(e.target.value))}
                                />
                            </div>
                            <div className="grid gap-2">
                                <Label htmlFor="total_staff">Jumlah Staff</Label>
                                <Input
                                    id="total_staff"
                                    type="number"
                                    value={data.total_staff}
                                    onChange={(e) => setData("total_staff", parseInt(e.target.value))}
                                />
                            </div>
                        </div>
                        <div className="space-y-4">
                            <div className="grid gap-2">
                                <Label htmlFor="service_hours_weekday">Jam Kerja (Senin - Jumat)</Label>
                                <Input
                                    id="service_hours_weekday"
                                    value={data.service_hours_weekday}
                                    onChange={(e) => setData("service_hours_weekday", e.target.value)}
                                />
                            </div>
                            <div className="grid gap-2">
                                <Label htmlFor="service_hours_weekend">Jam Kerja (Akhir Pekan)</Label>
                                <Input
                                    id="service_hours_weekend"
                                    value={data.service_hours_weekend}
                                    onChange={(e) => setData("service_hours_weekend", e.target.value)}
                                />
                            </div>
                        </div>
                    </div>

                    <DialogFooter className="pt-4 border-t gap-2">
                        <Button type="button" variant="outline" onClick={handleClose}>
                            Batal
                        </Button>
                        <Button
                            type="submit"
                            disabled={processing}
                            className="bg-blue-600 hover:bg-blue-700 text-white"
                        >
                            {processing ? "Menyimpan..." : "Simpan Profil"}
                        </Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}

function route(arg0: string): string {
    throw new Error("Function not implemented.");
}
