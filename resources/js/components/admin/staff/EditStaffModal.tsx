import { useForm } from "@inertiajs/react";
import { StaffRow } from "./Staff"; // Sesuaikan jika dalam folder yang sama
import { useEffect } from "react";
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogFooter } from "@/components/ui/dialog";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Switch } from "@/components/ui/switch";

interface EditStaffModalProps {
    isOpen: boolean;
    onClose: () => void;
    staff: StaffRow;
}

export default function EditStaffModal({ isOpen, onClose, staff }: EditStaffModalProps) {
    const { data, setData, post, processing, errors } = useForm({
        name: staff.name,
        title: staff.title,
        division: staff.division || "",
        is_head: staff.is_head,
        order: staff.order,
        image: null as File | null,
        _method: 'PUT' // Spoofing method untuk Laravel file upload
    });

    // Sinkronisasi data saat staff yang dipilih berubah
    useEffect(() => {
        setData({
            name: staff.name,
            title: staff.title,
            division: staff.division || "",
            is_head: staff.is_head,
            order: staff.order,
            image: null,
            _method: 'PUT'
        });
    }, [staff]);

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        // Menggunakan POST karena membawa File, tapi Laravel membacanya sebagai PUT karena _method
        post(route('admin.staff.update', staff.id), {
            onSuccess: () => onClose(),
        });
    };

    return (
        <Dialog open={isOpen} onOpenChange={onClose}>
            <DialogContent className="sm:max-w-[425px]">
                <DialogHeader>
                    <DialogTitle>Edit Data Staf</DialogTitle>
                </DialogHeader>
                <form onSubmit={handleSubmit} className="space-y-4">
                    <div className="space-y-2">
                        <Label htmlFor="edit-name">Nama</Label>
                        <Input id="edit-name" value={data.name} onChange={e => setData("name", e.target.value)} />
                        {errors.name && <p className="text-red-500 text-xs">{errors.name}</p>}
                    </div>
                    <div className="space-y-2">
                        <Label htmlFor="edit-title">Jabatan</Label>
                        <Input id="edit-title" value={data.title} onChange={e => setData("title", e.target.value)} />
                        {errors.title && <p className="text-red-500 text-xs">{errors.title}</p>}
                    </div>
                    <div className="space-y-2">
                        <Label htmlFor="edit-division">Divisi (Opsional)</Label>
                        <Input id="edit-division" value={data.division} onChange={e => setData("division", e.target.value)} />
                    </div>
                    <div className="flex items-center space-x-2 py-2">
                        <Switch id="edit-head" checked={data.is_head} onCheckedChange={checked => setData("is_head", checked)} />
                        <Label htmlFor="edit-head">Kepala Perpustakaan</Label>
                    </div>
                    <div className="space-y-2">
                        <Label htmlFor="edit-image">Ganti Foto (Biarkan kosong jika tidak ingin mengubah)</Label>
                        <Input id="edit-image" type="file" accept="image/*" onChange={e => setData("image", e.target.files?.[0] || null)} />
                        {errors.image && <p className="text-red-500 text-xs">{errors.image}</p>}
                    </div>
                    <DialogFooter>
                        <Button type="button" variant="outline" onClick={onClose}>Batal</Button>
                        <Button type="submit" disabled={processing}>Simpan Perubahan</Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}