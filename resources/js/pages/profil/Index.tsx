import Footer from '@/components/home/Footer';
import Navbar from '@/components/home/Navbar';
import { Head } from '@inertiajs/react';
import { BookOpen, Users, Target, ShieldCheck, Briefcase } from 'lucide-react';

// 1. Interface disesuaikan dengan Schema Database Laravel
export interface LibraryStaff {
    id: number;
    name: string;
    title: string;
    division: string | null;
    image: string | null;
    is_head: boolean | number | string; // Diperluas agar toleran terhadap tipe data database
    order: number;
    created_at?: string;
    updated_at?: string;
}

interface ProfileProps {
    libraryStaff?: LibraryStaff[];
    library_staff?: LibraryStaff[]; // Proteksi jika Laravel mengirimkan format snake_case
}

export default function Profile({ libraryStaff, library_staff }: ProfileProps) {
    // Menggabungkan data secara aman dari kedua kemungkinan nama prop Inertia
    const staffList = libraryStaff || library_staff || [];

    // Helper untuk mendeteksi status Kepala Perpustakaan secara akurat
    const checkIsHead = (staff: LibraryStaff) => {
        return (
            staff.is_head === true ||
            staff.is_head === 1 ||
            String(staff.is_head) === '1' ||
            String(staff.is_head).toLowerCase() === 'true'
        );
    };

    // Helper untuk menangani URL Gambar dari Laravel Storage
    const getStaffImage = (imagePath: string | null, name: string) => {
        if (!imagePath) {
            return `https://api.dicebear.com/7.x/avataaars/svg?seed=${encodeURIComponent(name)}`;
        }
        return imagePath.startsWith('http') ? imagePath : `/storage/${imagePath}`;
    };

    // 2. Mengambil data Kepala Perpustakaan
    const headStaff = staffList.find(staff => checkIsHead(staff));

    const head = {
        name: headStaff?.name || "Belum Ada Data",
        title: headStaff?.title || "Kepala Perpustakaan",
        image: getStaffImage(headStaff?.image || null, headStaff?.name || 'Head')
    };

    // 3. Memfilter staf biasa yang memiliki divisi
    const staffMembers = staffList.filter(staff => !checkIsHead(staff) && staff.division);

    // 4. Mengelompokkan staf berdasarkan divisi secara aman
    const uniqueDivisions = [...new Set(staffMembers.map(staff => staff.division).filter(Boolean))] as string[];

    const staffGrouped = uniqueDivisions.map(division => {
        return {
            division: division,
            members: staffMembers
                .filter(staff => staff.division === division)
                .sort((a, b) => Number(a.order) - Number(b.order))
                .map(staff => ({
                    name: staff.name,
                    title: staff.title,
                    image: getStaffImage(staff.image, staff.name)
                }))
        };
    });

    return (
        <>
            <Head title="Profil - Perpustakaan UMHT" />

            <div className="min-h-screen bg-slate-50/50">
                <Navbar auth={undefined} />

                <main className="pt-32 pb-16">
                    <div className="mx-auto max-w-7xl px-6 lg:px-8">

                        {/* HERO SECTION - PROFIL */}
                        <div className="relative overflow-hidden rounded-[2.5rem] bg-slate-900/5 border border-slate-200/60 backdrop-blur-md p-8 md:p-16 mb-12 shadow-sm text-center">
                            <div className="absolute -top-24 -right-24 h-64 w-64 rounded-full bg-indigo-500/10 blur-3xl"></div>
                            <div className="absolute -bottom-24 -left-24 h-64 w-64 rounded-full bg-blue-500/10 blur-3xl"></div>

                            <div className="relative z-10">
                                <h1 className="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-6xl mb-6">
                                    Profil <span className="text-indigo-600">Perpustakaan</span>
                                </h1>
                                <p className="mx-auto max-w-2xl text-lg leading-8 text-slate-600">
                                    Mengenal lebih dekat visi, misi, dan dedikasi Perpustakaan UMHT dalam mendukung ekosistem literasi dan riset akademik.
                                </p>
                            </div>
                        </div>

                        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
                            {/* SEJARAH & TENTANG (Kiri) */}
                            <div className="lg:col-span-2 space-y-8">
                                <section className="rounded-[2rem] bg-white border border-slate-200 p-8 md:p-10 shadow-sm transition-all hover:shadow-md">
                                    <h2 className="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                                        <BookOpen className="text-indigo-600" /> Tentang Kami
                                    </h2>
                                    <div className="prose prose-slate max-w-none text-slate-600 leading-relaxed">
                                        <p className="mb-4">
                                            Perpustakaan Universitas Mohammad Husni Thamrin (UMHT) didirikan sebagai pusat sumber belajar utama bagi sivitas akademika. Kami berkomitmen untuk menyediakan akses informasi yang komprehensif, mulai dari literatur medis hingga teknologi informasi.
                                        </p>
                                        <p>
                                            Hingga saat ini, kami terus bertransformasi menjadi perpustakaan digital yang modern dengan koleksi fisik yang tetap terjaga kualitasnya, memberikan kenyamanan maksimal bagi setiap pengunjung.
                                        </p>
                                    </div>
                                </section>

                                {/* VISI & MISI */}
                                <section className="grid md:grid-cols-2 gap-8">
                                    <div className="rounded-[2rem] bg-indigo-600 p-8 text-white shadow-lg shadow-indigo-200">
                                        <Target className="mb-4 h-8 w-8 text-indigo-200" />
                                        <h3 className="text-xl font-bold mb-4">Visi</h3>
                                        <p className="text-indigo-100 text-sm leading-relaxed">
                                            Menjadi pusat literasi berbasis teknologi informasi yang unggul dan menjadi rujukan utama riset ilmiah di tingkat nasional pada tahun 2030.
                                        </p>
                                    </div>
                                    <div className="rounded-[2rem] bg-white border border-slate-200 p-8 shadow-sm">
                                        <ShieldCheck className="mb-4 h-8 w-8 text-indigo-600" />
                                        <h3 className="text-xl font-bold text-slate-900 mb-4">Misi</h3>
                                        <ul className="text-slate-600 text-sm space-y-3">
                                            <li className="flex gap-2">• Menyediakan koleksi literatur yang mutakhir.</li>
                                            <li className="flex gap-2">• Mengembangkan layanan berbasis digital.</li>
                                            <li className="flex gap-2">• Meningkatkan minat baca dan budaya riset.</li>
                                        </ul>
                                    </div>
                                </section>
                            </div>

                            {/* INFORMASI TAMBAHAN (Kanan) */}
                            <div className="space-y-8">
                                <div className="rounded-[2rem] bg-white border border-slate-200 p-8 shadow-sm">
                                    <h3 className="text-lg font-bold text-slate-900 mb-6">Informasi Cepat</h3>
                                    <div className="space-y-6">
                                        <div className="flex items-center gap-4">
                                            <div className="h-10 w-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold">15k</div>
                                            <div>
                                                <p className="text-xs text-slate-400 font-medium">Koleksi Buku</p>
                                                <p className="text-sm font-bold text-slate-700">Judul Tersedia</p>
                                            </div>
                                        </div>
                                        <div className="flex items-center gap-4">
                                            <div className="h-10 w-10 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold">
                                                {staffList.length > 0 ? staffMembers.length.toString().padStart(2, '0') : '00'}
                                            </div>
                                            <div>
                                                <p className="text-xs text-slate-400 font-medium">Staf Ahli</p>
                                                <p className="text-sm font-bold text-slate-700">Pustakawan Berlisensi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div className="rounded-[2rem] bg-slate-900 p-8 text-white">
                                    <h3 className="text-lg font-bold mb-4">Jam Layanan</h3>
                                    <div className="space-y-3 text-sm">
                                        <div className="flex justify-between border-b border-slate-800 pb-2">
                                            <span className="text-slate-400">Senin - Jumat</span>
                                            <span className="font-medium">08:00 - 17:00</span>
                                        </div>
                                        <div className="flex justify-between text-rose-400">
                                            <span>Minggu / Libur</span>
                                            <span className="font-medium">Tutup</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* STRUKTUR ORGANISASI SECTION */}
                        <section className="mt-20 pt-16 border-t border-slate-200">
                            <div className="text-center mb-16">
                                <h2 className="text-3xl font-bold text-slate-900 mb-4 flex items-center justify-center gap-3">
                                    <Users className="text-indigo-600" /> Struktur Organisasi
                                </h2>
                                <p className="text-slate-500 max-w-xl mx-auto">
                                    Tim profesional kami yang berdedikasi untuk memberikan layanan informasi dan literasi terbaik.
                                </p>
                            </div>

                            {/* KEPALA PERPUSTAKAAN (CENTER) */}
                            <div className="flex justify-center mb-24">
                                <div className="bg-white p-6 rounded-[2.5rem] border border-slate-200 shadow-xl w-full max-w-xs text-center relative group hover:border-indigo-600 transition-all duration-300">
                                    <div className="absolute inset-x-0 -top-12 flex justify-center">
                                        <img
                                            src={head.image}
                                            alt={head.name}
                                            className="h-24 w-24 rounded-3xl bg-indigo-50 border-4 border-white shadow-md object-cover"
                                        />
                                    </div>
                                    <div className="pt-12">
                                        <h4 className="text-lg font-bold text-slate-900 mb-1">{head.name}</h4>
                                        <p className="text-indigo-600 text-sm font-semibold uppercase tracking-wider">{head.title}</p>
                                    </div>
                                </div>
                            </div>

                            {/* DIV STAFF PERBAGIAN */}
                            {staffGrouped.length > 0 ? (
                                <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                                    {staffGrouped.map((dept, index) => (
                                        <div key={index} className="space-y-6">
                                            {/* Header Divisi */}
                                            <div className="flex items-center gap-2 px-4 py-2 bg-slate-100 rounded-xl w-fit mx-auto md:mx-0">
                                                <Briefcase size={16} className="text-slate-500" />
                                                <span className="text-xs font-bold text-slate-600 uppercase tracking-widest">{dept.division}</span>
                                            </div>

                                            {/* Anggota Divisi */}
                                            <div className="space-y-4">
                                                {dept.members.map((member, mIndex) => (
                                                    <div key={mIndex} className="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                                                        <img
                                                            src={member.image}
                                                            alt={member.name}
                                                            className="h-12 w-12 rounded-xl bg-slate-50 object-cover"
                                                        />
                                                        <div>
                                                            <h5 className="text-sm font-bold text-slate-900">{member.name}</h5>
                                                            <p className="text-[11px] text-slate-500">{member.title}</p>
                                                        </div>
                                                    </div>
                                                ))}
                                            </div>
                                        </div>
                                    ))}
                                </div>
                            ) : (
                                <p className="text-center text-slate-500">Belum ada data staf divisi yang ditambahkan.</p>
                            )}
                        </section>

                    </div>
                </main>

                <Footer />
            </div>
        </>
    );
}