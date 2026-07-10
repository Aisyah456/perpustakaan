import { useForm } from "@inertiajs/react";
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogFooter } from "@/components/ui/dialog";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Switch } from "@/components/ui/switch";

export default function AddStaffModal({ isOpen, onClose }: { isOpen: boolean; onClose: () => void }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: "",
        title: "",
        division: "",
        image: null as File | null,
        is_head: false,
        order: 0,
    });

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        post(route('admin.staff.store'), {
            onSuccess: () => {
                reset();
                onClose();
            },
        });
    };

    return (
        <Dialog open={isOpen} onOpenChange={onClose}>
            <DialogContent className="sm:max-w-[425px]">
                <DialogHeader>
                    <DialogTitle>Tambah Staf Baru</DialogTitle>
                </DialogHeader>
                <form onSubmit={handleSubmit} className="space-y-4">
                    <div className="space-y-2">
                        <Label htmlFor="name">Nama</Label>
                        <Input id="name" value={data.name} onChange={e => setData("name", e.target.value)} placeholder="Nama Lengkap" />
                        {errors.name && <p className="text-red-500 text-xs">{errors.name}</p>}
                    </div>
                    <div className="space-y-2">
                        <Label htmlFor="title">Jabatan</Label>
                        <Input id="title" value={data.title} onChange={e => setData("title", e.target.value)} placeholder="Contoh: Pustakawan Ahli" />
                        {errors.title && <p className="text-red-500 text-xs">{errors.title}</p>}
                    </div>
                    <div className="space-y-2">
                        <Label htmlFor="division">Divisi (Opsional)</Label>
                        <Input id="division" value={data.division} onChange={e => setData("division", e.target.value)} placeholder="Contoh: Layanan Teknis" />
                    </div>
                    <div className="flex items-center space-x-2 py-2">
                        <Switch id="is_head" checked={data.is_head} onCheckedChange={checked => setData("is_head", checked)} />
                        <Label htmlFor="is_head">Kepala Perpustakaan</Label>
                    </div>
                    <div className="space-y-2">
                        <Label htmlFor="image">Foto</Label>
                        <Input id="image" type="file" accept="image/*" onChange={e => setData("image", e.target.files?.[0] || null)} />
                        {errors.image && <p className="text-red-500 text-xs">{errors.image}</p>}
                    </div>
                    <DialogFooter>
                        <Button type="button" variant="outline" onClick={onClose}>Batal</Button>
                        <Button type="submit" disabled={processing}>Simpan</Button>
                    </DialogFooter>
                </form>
            </DialogContent>
        </Dialog>
    );
}