<x-warga-layout title="Portal Pelaporan Kerusakan Infrastruktur Kota Bandung">
    <!-- HERO SECTION (Sustainable Infrastructure Dribbble Theme - Screenshot 1) -->
    <div class="relative bg-[#0A1628] text-white overflow-hidden min-h-[620px] lg:min-h-[720px] flex items-center">
        <!-- Background Hero Panoramic Image with Dark Overlay -->
        <div class="absolute inset-0 z-0">
            <img
                src="{{ asset('images/hero-infrastructure.jpg') }}"
                alt="Infrastruktur Berkelanjutan Kota Bandung"
                class="w-full h-full object-cover object-center"
            >
            <!-- Cinematic Dark Gradient Overlay (Deep Navy Palette of INFRA-DAYA) -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#0A1628]/95 via-[#0A1628]/85 to-[#0A1628]/55"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0A1628] via-transparent to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 relative z-10 w-full">
            <div class="max-w-3xl space-y-8">
                <!-- Civic & SDG Institutional Tag Capsule -->
                <div class="inline-flex flex-wrap items-center gap-2.5 font-mono text-[11px]">
                    <span class="px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20 uppercase tracking-widest text-slate-200 font-bold">
                        SDG 9 KOTA BANDUNG
                    </span>
                    <span class="px-3 py-1 rounded-full bg-amber-400/20 backdrop-blur-md border border-amber-400/40 text-amber-300 font-semibold flex items-center gap-2">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-400"></span>
                        </span>
                        STATUS: SIAGA AKTIF URC DSDABM
                    </span>
                </div>

                <!-- High-Impact Editorial Headline (Sans + Italic Serif Combination) -->
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-[1.08]">
                    Masa Depan Kota dengan <br>
                    Infrastruktur <span class="font-serif italic font-normal text-amber-400 underline decoration-amber-400/40 decoration-wavy decoration-1 underline-offset-8">Berkelanjutan</span>
                </h1>

                <!-- Subtitle -->
                <p class="text-base sm:text-lg text-slate-200 max-w-2xl leading-relaxed font-light">
                    Membantu masyarakat dan Pemerintah Kota Bandung (<strong class="text-white font-semibold">INFRA-DAYA &bull; DSDABM</strong>) mewujudkan konektivitas kota tangguh, bebas genangan, dan ramah lingkungan melalui pelaporan cerdas berbasis geospasial real-time.
                </p>

                <!-- Action Controls (Vibrant Amber Pill Button + Quick Ticket Search) -->
                <div class="pt-3 flex flex-col sm:flex-row items-stretch sm:items-center gap-4 max-w-2xl">
                    <!-- Primary CTA Pill Button -->
                    <a
                        href="{{ route('warga.laporan.create', [], false) }}"
                        class="inline-flex items-center justify-center gap-2.5 rounded-full bg-amber-400 hover:bg-amber-300 text-slate-950 px-8 py-4 text-sm font-bold shadow-xl shadow-amber-500/25 transition-all hover:scale-102 cursor-pointer whitespace-nowrap group"
                    >
                        <span>Lapor Kerusakan</span>
                        <span class="text-base font-black transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5">&nearr;</span>
                    </a>

                    <!-- Direct Ticket Tracker Console Form (Pill Container) -->
                    <form action="{{ route('tracking.publik', [], false) }}" method="GET" class="flex-1 relative flex items-center">
                        <input
                            type="text"
                            name="nomor_tiket"
                            placeholder="Lacak Tiket: INFRA-2026..."
                            class="w-full rounded-full bg-white/10 hover:bg-white/15 backdrop-blur-md border border-white/25 px-5 py-3.5 text-sm text-white placeholder-slate-300 font-mono focus:outline-none focus:border-amber-400 focus:ring-1 focus:ring-amber-400 transition-colors uppercase font-bold"
                        >
                        <button
                            type="submit"
                            class="absolute right-2 px-4 py-2 rounded-full bg-white/20 hover:bg-white/30 text-xs font-semibold text-white transition-colors cursor-pointer"
                        >
                            Lacak Tiket
                        </button>
                    </form>
                </div>

                <!-- Civic Trust Data Line -->
                <div class="pt-8 border-t border-white/15 flex flex-wrap items-center gap-8 sm:gap-12 text-xs text-slate-200 font-mono">
                    <div>
                        <span class="text-white font-extrabold text-base block">30 Kecamatan</span>
                        <span class="text-slate-300 text-[11px]">Cakupan Wilayah</span>
                    </div>
                    <div class="border-l border-white/20 pl-8">
                        <span class="text-amber-300 font-extrabold text-base block">&lt; 24 Jam</span>
                        <span class="text-slate-300 text-[11px]">Standar Verifikasi SLA</span>
                    </div>
                    <div class="border-l border-white/20 pl-8">
                        <span class="text-emerald-300 font-extrabold text-base block">100% Terbuka</span>
                        <span class="text-slate-300 text-[11px]">Transparansi Publik</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: / ABOUT US - KOMITMEN & STATISTIK (Screenshot 2 Style) -->
    <section id="tentang" class="bg-white py-20 lg:py-28 border-b border-slate-200 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Tag -->
            <div class="mb-6">
                <span class="text-xs font-mono font-bold text-slate-400 uppercase tracking-widest">
                    / Tentang INFRA-DAYA
                </span>
            </div>

            <!-- Big Editorial Statement (High contrast: Dark bold text with muted gray) -->
            <div class="max-w-5xl mb-16 sm:mb-20">
                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-normal text-slate-400 leading-[1.3] tracking-tight">
                    INFRA-DAYA adalah platform infrastruktur terpadu Pemerintah Kota Bandung <strong class="text-slate-900 font-bold">menghadirkan solusi percepatan perbaikan fasilitas publik</strong> untuk konektivitas mobilitas kota yang aman, tanggap bencana, dan berkelanjutan bagi generasi masa depan.
                </h2>
            </div>

            <!-- 2-Column Layout: Portrait Photo Card + Stat Metric Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Left Column: Portrait Visual Card with Commitment Tag -->
                <div class="lg:col-span-5 space-y-3">
                    <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100 aspect-[3/4] relative group">
                        <img
                            src="{{ asset('images/about-commitment.jpg') }}"
                            alt="Komitmen Infrastruktur Tangguh Kota Bandung"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white">
                            <span class="px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-[11px] font-mono font-bold uppercase tracking-wider">
                                TARGET PRIORITAS 2026
                            </span>
                            <p class="text-sm font-semibold mt-2 text-slate-100">
                                Integrasi penataan drainase &amp; pedestrian berkelanjutan Kota Bandung.
                            </p>
                        </div>
                    </div>
                    <p class="text-xs font-mono text-slate-400 pl-1">
                        Komitmen Tanggap SDG 9 Kota Bandung 2026.
                    </p>
                </div>

                <!-- Right Column: 3 Stat Cards Grid (Numbered 01/, 02/, 03/) -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Card 01 -->
                    <div class="bg-slate-50/70 rounded-3xl border border-slate-200/80 p-8 flex flex-col justify-between hover:bg-white hover:shadow-xl hover:border-slate-300 transition-all duration-300">
                        <div class="flex justify-between items-start">
                            <span class="text-slate-300 font-mono text-sm font-bold">01/</span>
                        </div>
                        <div class="mt-8">
                            <span class="text-5xl sm:text-6xl font-extrabold text-slate-900 tracking-tight block">
                                98.4%
                            </span>
                            <p class="text-xs text-slate-500 font-medium mt-3 leading-relaxed">
                                Tingkat penyelesaian laporan tepat waktu sesuai standar Service Level Agreement (SLA).
                            </p>
                        </div>
                    </div>

                    <!-- Card 02 -->
                    <div class="bg-slate-50/70 rounded-3xl border border-slate-200/80 p-8 flex flex-col justify-between hover:bg-white hover:shadow-xl hover:border-slate-300 transition-all duration-300">
                        <div class="flex justify-between items-start">
                            <span class="text-slate-300 font-mono text-sm font-bold">02/</span>
                        </div>
                        <div class="mt-8">
                            <span class="text-5xl sm:text-6xl font-extrabold text-slate-900 tracking-tight block">
                                &lt; 24 Jam
                            </span>
                            <p class="text-xs text-slate-500 font-medium mt-3 leading-relaxed">
                                Standar batas waktu verifikasi administratif dan disposisi tim Unit Reaksi Cepat (URC).
                            </p>
                        </div>
                    </div>

                    <!-- Card 03 (Spans 2 columns on sm) -->
                    <div class="sm:col-span-2 bg-slate-50/70 rounded-3xl border border-slate-200/80 p-8 flex flex-col sm:flex-row justify-between items-start sm:items-end hover:bg-white hover:shadow-xl hover:border-slate-300 transition-all duration-300">
                        <div>
                            <span class="text-slate-300 font-mono text-sm font-bold block mb-4">03/</span>
                            <span class="text-5xl sm:text-6xl font-extrabold text-slate-900 tracking-tight block">
                                30 Wilayah
                            </span>
                            <p class="text-xs text-slate-500 font-medium mt-3 leading-relaxed max-w-md">
                                Jangkauan pemantauan terpadu mencakup seluruh 30 kecamatan dan 151 kelurahan di wilayah administratif Kota Bandung.
                            </p>
                        </div>
                        <div class="mt-6 sm:mt-0">
                            <a href="{{ route('peta.publik', [], false) }}" class="inline-flex items-center gap-2 text-xs font-bold text-blue-600 hover:text-blue-800 font-mono uppercase tracking-wider">
                                <span>Cek Peta Sebaran</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: / WHAT WE DO - SERVICES (Screenshot 3 Top Style) -->
    <section id="layanan" class="bg-[#0A1628] text-white py-20 lg:py-28 border-b border-white/10 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Tag & Title -->
            <div class="mb-14">
                <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-widest block mb-3">
                    / Bidang Penanganan
                </span>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight">
                    Layanan Infrastruktur
                </h2>
            </div>

            <!-- 4 Interactive Category Rows (01, 02, 03, 04) -->
            <div class="divide-y divide-white/10 border-t border-b border-white/10">
                <!-- ROW 01: Jalan Raya & Trotoar -->
                <div class="py-8 sm:py-10 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center group hover:bg-white/[0.02] transition-colors rounded-2xl px-4 -mx-4">
                    <div class="lg:col-span-1 font-mono text-xs sm:text-sm font-bold text-slate-400">
                        ( 01 )
                    </div>
                    <div class="lg:col-span-3">
                        <div class="rounded-2xl overflow-hidden aspect-[16/9] shadow-md border border-white/10">
                            <img
                                src="{{ asset('images/service-jalan.jpg') }}"
                                alt="Jalan Raya & Trotoar Kota Bandung"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >
                        </div>
                    </div>
                    <div class="lg:col-span-7 space-y-2">
                        <div class="flex items-center gap-3">
                            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-amber-400 transition-colors">
                                Jalan Raya &amp; Trotoar
                            </h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-400/20 text-amber-300 border border-amber-400/30 font-mono">
                                SLA: 3 Hari
                            </span>
                        </div>
                        <p class="text-xs font-mono text-slate-400">
                            Divisi Bina Marga Pemerintah Kota Bandung
                        </p>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                            Penanganan lubang aspal amblas, retak struktural, marka jalan luntur, serta perbaikan paving trotoar pejalan kaki yang nyaman dan ramah disabilitas.
                        </p>
                    </div>
                    <div class="lg:col-span-1 flex justify-end">
                        <a
                            href="{{ route('warga.laporan.create', ['kategori' => 'jalan'], false) }}"
                            class="h-12 w-12 rounded-full bg-amber-400 hover:bg-amber-300 text-slate-950 flex items-center justify-center font-bold text-lg shadow-md transition-all group-hover:scale-110"
                            title="Laporkan Kerusakan Jalan"
                        >
                            &nearr;
                        </a>
                    </div>
                </div>

                <!-- ROW 02: Drainase & Saluran Air -->
                <div class="py-8 sm:py-10 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center group hover:bg-white/[0.02] transition-colors rounded-2xl px-4 -mx-4">
                    <div class="lg:col-span-1 font-mono text-xs sm:text-sm font-bold text-slate-400">
                        ( 02 )
                    </div>
                    <div class="lg:col-span-3">
                        <div class="rounded-2xl overflow-hidden aspect-[16/9] shadow-md border border-white/10">
                            <img
                                src="{{ asset('images/service-drainase.jpg') }}"
                                alt="Drainase & Saluran Air Kota Bandung"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >
                        </div>
                    </div>
                    <div class="lg:col-span-7 space-y-2">
                        <div class="flex items-center gap-3">
                            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-amber-400 transition-colors">
                                Drainase &amp; Saluran Air
                            </h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-cyan-400/20 text-cyan-300 border border-cyan-400/30 font-mono">
                                SLA: 2 Hari
                            </span>
                        </div>
                        <p class="text-xs font-mono text-slate-400">
                            Divisi Sumber Daya Air (SDA) Kota Bandung
                        </p>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                            Normalisasi sumbatan gorong-gorong, pengerukan sedimentasi lumpur, mitigasi genangan banjir musiman, serta perkuatan dinding kirmir sungai.
                        </p>
                    </div>
                    <div class="lg:col-span-1 flex justify-end">
                        <a
                            href="{{ route('warga.laporan.create', ['kategori' => 'drainase'], false) }}"
                            class="h-12 w-12 rounded-full bg-amber-400 hover:bg-amber-300 text-slate-950 flex items-center justify-center font-bold text-lg shadow-md transition-all group-hover:scale-110"
                            title="Laporkan Kerusakan Drainase"
                        >
                            &nearr;
                        </a>
                    </div>
                </div>

                <!-- ROW 03: Penerangan Jalan Umum -->
                <div class="py-8 sm:py-10 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center group hover:bg-white/[0.02] transition-colors rounded-2xl px-4 -mx-4">
                    <div class="lg:col-span-1 font-mono text-xs sm:text-sm font-bold text-slate-400">
                        ( 03 )
                    </div>
                    <div class="lg:col-span-3">
                        <div class="rounded-2xl overflow-hidden aspect-[16/9] shadow-md border border-white/10">
                            <img
                                src="{{ asset('images/service-pju.jpg') }}"
                                alt="Penerangan Jalan Umum Kota Bandung"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >
                        </div>
                    </div>
                    <div class="lg:col-span-7 space-y-2">
                        <div class="flex items-center gap-3">
                            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-amber-400 transition-colors">
                                Penerangan Jalan Umum (PJU)
                            </h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-400/20 text-amber-300 border border-amber-400/30 font-mono">
                                SLA: 24 Jam
                            </span>
                        </div>
                        <p class="text-xs font-mono text-slate-400">
                            Divisi Kelistrikan &amp; Utilitas PJU
                        </p>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                            Peremajaan lampu jalan padam malam hari, tiang miring tersenggol kendaraan, kabel menjuntai berbahaya, dan pemeliharaan panel gardu.
                        </p>
                    </div>
                    <div class="lg:col-span-1 flex justify-end">
                        <a
                            href="{{ route('warga.laporan.create', ['kategori' => 'pju'], false) }}"
                            class="h-12 w-12 rounded-full bg-amber-400 hover:bg-amber-300 text-slate-950 flex items-center justify-center font-bold text-lg shadow-md transition-all group-hover:scale-110"
                            title="Laporkan Kerusakan PJU"
                        >
                            &nearr;
                        </a>
                    </div>
                </div>

                <!-- ROW 04: Jembatan & Tanggul Air -->
                <div class="py-8 sm:py-10 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center group hover:bg-white/[0.02] transition-colors rounded-2xl px-4 -mx-4">
                    <div class="lg:col-span-1 font-mono text-xs sm:text-sm font-bold text-slate-400">
                        ( 04 )
                    </div>
                    <div class="lg:col-span-3">
                        <div class="rounded-2xl overflow-hidden aspect-[16/9] shadow-md border border-white/10">
                            <img
                                src="{{ asset('images/service-jembatan.jpg') }}"
                                alt="Jembatan & Tanggul Air Kota Bandung"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >
                        </div>
                    </div>
                    <div class="lg:col-span-7 space-y-2">
                        <div class="flex items-center gap-3">
                            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-amber-400 transition-colors">
                                Jembatan &amp; Tanggul Air
                            </h3>
                            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-indigo-400/20 text-indigo-300 border border-indigo-400/30 font-mono">
                                SLA: 5 Hari
                            </span>
                        </div>
                        <p class="text-xs font-mono text-slate-400">
                            Tim Rekayasa Jembatan &amp; Struktur DSDABM
                        </p>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                            Inspeksi retak gelagar jembatan, expansion joint renggang, oprit amblas, serta penguatan dinding penahan tanggul tebing penahan longsor.
                        </p>
                    </div>
                    <div class="lg:col-span-1 flex justify-end">
                        <a
                            href="{{ route('warga.laporan.create', ['kategori' => 'jembatan'], false) }}"
                            class="h-12 w-12 rounded-full bg-amber-400 hover:bg-amber-300 text-slate-950 flex items-center justify-center font-bold text-lg shadow-md transition-all group-hover:scale-110"
                            title="Laporkan Kerusakan Jembatan"
                        >
                            &nearr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: METRICS & PROGRESS BARS (Screenshot 3 Bottom Style) -->
    <section class="bg-white py-20 lg:py-28 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Big Editorial Growth Statement -->
            <div class="max-w-4xl mb-16">
                <h2 class="text-2xl sm:text-4xl lg:text-5xl font-normal text-slate-400 leading-[1.3] tracking-tight">
                    Transparansi data mencerminkan <strong class="text-slate-900 font-bold">komitmen nyata terhadap inovasi, responsivitas, dan kualitas perbaikan fasilitas publik</strong>. <span class="font-serif italic text-slate-600 block mt-2 font-normal">Kami terus memperluas dampak penanganan demi kenyamanan seluruh warga Bandung.</span>
                </h2>
            </div>

            <!-- Horizontal Metric Progress Bars with Pill Badges (Exact Natur Style) -->
            <div class="max-w-3xl space-y-4">
                <!-- Metric 1 -->
                <div class="bg-slate-100/80 hover:bg-slate-100 rounded-full p-2 pl-6 sm:pl-8 flex items-center justify-between transition-colors shadow-xs">
                    <span class="text-xs sm:text-sm font-semibold text-slate-800">
                        Tingkat Kepuasan Warga (Rating Layanan)
                    </span>
                    <span class="rounded-full bg-slate-950 text-white font-mono font-bold text-xs sm:text-sm px-6 py-2.5 shadow-sm">
                        94%
                    </span>
                </div>

                <!-- Metric 2 -->
                <div class="bg-slate-100/80 hover:bg-slate-100 rounded-full p-2 pl-6 sm:pl-8 flex items-center justify-between transition-colors shadow-xs">
                    <span class="text-xs sm:text-sm font-semibold text-slate-800">
                        Tingkat Keberhasilan Penanganan Selesai Lapangan
                    </span>
                    <span class="rounded-full bg-white text-slate-900 border border-slate-200 font-mono font-bold text-xs sm:text-sm px-6 py-2.5 shadow-sm">
                        98%
                    </span>
                </div>

                <!-- Metric 3 -->
                <div class="bg-slate-100/80 hover:bg-slate-100 rounded-full p-2 pl-6 sm:pl-8 flex items-center justify-between transition-colors shadow-xs">
                    <span class="text-xs sm:text-sm font-semibold text-slate-800">
                        Kesesuaian Target SLA Tanggap Darurat (&lt; 24 Jam)
                    </span>
                    <span class="rounded-full bg-white text-slate-900 border border-slate-200 font-mono font-bold text-xs sm:text-sm px-6 py-2.5 shadow-sm">
                        92%
                    </span>
                </div>

                <!-- Metric 4 -->
                <div class="bg-slate-100/80 hover:bg-slate-100 rounded-full p-2 pl-6 sm:pl-8 flex items-center justify-between transition-colors shadow-xs">
                    <span class="text-xs sm:text-sm font-semibold text-slate-800">
                        Efisiensi Penyaluran Disposisi URC Lapangan
                    </span>
                    <span class="rounded-full bg-white text-slate-900 border border-slate-200 font-mono font-bold text-xs sm:text-sm px-6 py-2.5 shadow-sm">
                        88%
                    </span>
                </div>

                <!-- Metric 5 -->
                <div class="bg-slate-100/80 hover:bg-slate-100 rounded-full p-2 pl-6 sm:pl-8 flex items-center justify-between transition-colors shadow-xs">
                    <span class="text-xs sm:text-sm font-semibold text-slate-800">
                        Reduksi Risiko Kerusakan Berulang Melalui Pemeliharaan Berkala
                    </span>
                    <span class="rounded-full bg-white text-slate-900 border border-slate-200 font-mono font-bold text-xs sm:text-sm px-6 py-2.5 shadow-sm">
                        76%
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: / ALREADY DONE - PROJECTS & PANTAUAN LAPANGAN (Screenshot 4 Top Style) -->
    <section class="bg-[#F8FAFC] py-20 lg:py-28 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header with Tag & Subtitle -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14">
                <div>
                    <span class="text-xs font-mono font-bold text-slate-400 uppercase tracking-widest block mb-2">
                        / Pantauan Terbuka
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                        Portofolio &amp; Pantauan Lapangan
                    </h2>
                </div>
                <p class="text-xs sm:text-sm text-slate-500 max-w-md leading-relaxed font-light">
                    Sistem transparansi publik mendokumentasikan setiap penanganan laporan secara terbuka dan terverifikasi dari sebelum hingga tuntas.
                </p>
            </div>

            <!-- Interactive Live Leaflet Map Radar -->
            <div class="mb-14 rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-[#0A1628]">
                <div class="px-6 py-4 bg-[#060D17] border-b border-white/10 flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-rose-500"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                        <span class="ml-3 font-mono text-xs font-semibold text-slate-200">
                            PETA SEBARAN PAN-BANDUNG &bull; GIS RADAR 30 KECAMATAN
                        </span>
                    </div>
                    <a href="{{ route('peta.publik', [], false) }}" class="text-xs font-bold text-amber-400 hover:text-amber-300 font-mono">
                        Buka Peta Publik Layar Penuh &rarr;
                    </a>
                </div>
                <div id="home-preview-map" class="h-80 sm:h-96 w-full z-0"></div>
                <div class="px-6 py-3 bg-[#060D17] border-t border-white/10 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-400 font-mono">
                    <div class="flex items-center gap-4 text-[11px]">
                        <span class="flex items-center gap-1.5"><span class="h-2 w-2 rounded-full bg-blue-500"></span> Jalan Raya</span>
                        <span class="flex items-center gap-1.5"><span class="h-2 w-2 rounded-full bg-cyan-400"></span> Drainase</span>
                        <span class="flex items-center gap-1.5"><span class="h-2 w-2 rounded-full bg-amber-400"></span> PJU</span>
                        <span class="flex items-center gap-1.5"><span class="h-2 w-2 rounded-full bg-emerald-400"></span> Tuntas</span>
                    </div>
                    <span class="text-[11px] text-slate-300">Dinas Sumber Daya Air dan Bina Marga</span>
                </div>
            </div>

            <!-- 2x2 Clean Project Cards Grid (Exact Dribbble Style) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Project 01 -->
                <div class="space-y-3 group">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                            Rekonstruksi Jalan Pasteur - Dr. Djunjunan
                        </h3>
                        <span class="text-slate-400 font-bold">( 01 )</span>
                    </div>
                    <div class="rounded-3xl overflow-hidden aspect-[16/10] shadow-md border border-slate-200 relative">
                        <img
                            src="{{ asset('images/project-pasteur.jpg') }}"
                            alt="Rekonstruksi Jalan Pasteur"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-5 left-5 right-5 flex items-end justify-between text-white">
                            <div>
                                <span class="text-[10px] font-mono uppercase tracking-wider text-slate-300 block">Kategori Jalan</span>
                                <span class="text-xs font-bold text-white">Patching Hotmix 1.2 Km Tuntas</span>
                            </div>
                            <span class="rounded-full bg-white/20 backdrop-blur-md px-3 py-1.5 text-[11px] font-bold text-white border border-white/30 flex items-center gap-1">
                                Selesai 100% &nearr;
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Project 02 -->
                <div class="space-y-3 group">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                            Normalisasi Saluran Drainase Pagarsih
                        </h3>
                        <span class="text-slate-400 font-bold">( 02 )</span>
                    </div>
                    <div class="rounded-3xl overflow-hidden aspect-[16/10] shadow-md border border-slate-200 relative">
                        <img
                            src="{{ asset('images/project-pagarsih.jpg') }}"
                            alt="Normalisasi Saluran Drainase Pagarsih"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-5 left-5 right-5 flex items-end justify-between text-white">
                            <div>
                                <span class="text-[10px] font-mono uppercase tracking-wider text-slate-300 block">Kategori Drainase</span>
                                <span class="text-xs font-bold text-white">Pengerukan Sedimen &amp; Gorong-gorong</span>
                            </div>
                            <span class="rounded-full bg-white/20 backdrop-blur-md px-3 py-1.5 text-[11px] font-bold text-white border border-white/30 flex items-center gap-1">
                                Selesai 100% &nearr;
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Project 03 -->
                <div class="space-y-3 group">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                            Peremajaan Lampu PJU Cihampelas &amp; Dago
                        </h3>
                        <span class="text-slate-400 font-bold">( 03 )</span>
                    </div>
                    <div class="rounded-3xl overflow-hidden aspect-[16/10] shadow-md border border-slate-200 relative">
                        <img
                            src="{{ asset('images/project-dago.jpg') }}"
                            alt="Peremajaan Lampu PJU Cihampelas & Dago"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-5 left-5 right-5 flex items-end justify-between text-white">
                            <div>
                                <span class="text-[10px] font-mono uppercase tracking-wider text-slate-300 block">Kategori PJU</span>
                                <span class="text-xs font-bold text-white">Instalasi Smart LED Hemat Energi</span>
                            </div>
                            <span class="rounded-full bg-white/20 backdrop-blur-md px-3 py-1.5 text-[11px] font-bold text-white border border-white/30 flex items-center gap-1">
                                Selesai 100% &nearr;
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Project 04 -->
                <div class="space-y-3 group">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                            Perkuatan Tanggul Sungai Cikapundung
                        </h3>
                        <span class="text-slate-400 font-bold">( 04 )</span>
                    </div>
                    <div class="rounded-3xl overflow-hidden aspect-[16/10] shadow-md border border-slate-200 relative">
                        <img
                            src="{{ asset('images/project-cikapundung.jpg') }}"
                            alt="Perkuatan Tanggul Sungai Cikapundung"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent"></div>
                        <div class="absolute bottom-5 left-5 right-5 flex items-end justify-between text-white">
                            <div>
                                <span class="text-[10px] font-mono uppercase tracking-wider text-slate-300 block">Kategori Jembatan &amp; Tanggul</span>
                                <span class="text-xs font-bold text-white">Penguatan Kirmir Penahan Longsor</span>
                            </div>
                            <span class="rounded-full bg-white/20 backdrop-blur-md px-3 py-1.5 text-[11px] font-bold text-white border border-white/30 flex items-center gap-1">
                                Selesai 100% &nearr;
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: QUESTIONS AND ANSWERS / FAQ (Screenshot 4 Bottom Style) -->
    <section class="bg-white py-20 lg:py-28 border-b border-slate-200" x-data="{ active: null }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-16 pb-8 border-b border-slate-200">
                <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                    Pertanyaan <span class="font-serif italic font-normal text-amber-500">dan Jawaban</span>
                </h2>
                <span class="text-xs font-mono font-bold text-slate-400 uppercase tracking-widest">
                    Frequently asked question (FAQ)
                </span>
            </div>

            <!-- Accordion List (Numbered 01 to 05) -->
            <div class="divide-y divide-slate-200 max-w-5xl">
                <!-- FAQ 01 -->
                <div class="py-6 sm:py-8">
                    <button
                        @click="active = active === 1 ? null : 1"
                        class="w-full flex items-center justify-between text-left group cursor-pointer focus:outline-none"
                    >
                        <div class="flex items-center gap-6 sm:gap-10 pr-4">
                            <span class="font-mono text-sm sm:text-base font-bold text-slate-400 group-hover:text-slate-900 transition-colors">01</span>
                            <span class="text-base sm:text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                Bagaimana cara warga melaporkan kerusakan jalan atau fasilitas umum?
                            </span>
                        </div>
                        <span class="text-2xl font-light text-slate-400 group-hover:text-slate-900 transition-transform duration-300" :class="{ 'rotate-45': active === 1 }">
                            +
                        </span>
                    </button>
                    <div x-show="active === 1" x-collapse style="display: none;" class="mt-4 pl-12 sm:pl-16 pr-4 text-xs sm:text-sm text-slate-600 leading-relaxed font-light">
                        Warga cukup menekan tombol <strong>+ Lapor Kerusakan</strong>, mengunggah foto bukti fisik kerusakan di lapangan, menandai titik lokasi pada peta otomatis (GPS), mengisi deskripsi singkat, lalu mengirimkan laporan. Sistem akan menerbitkan <strong>Nomor Tiket resmi</strong> (contoh: INFRA-20261014-0001) untuk pelacakan langsung.
                    </div>
                </div>

                <!-- FAQ 02 -->
                <div class="py-6 sm:py-8">
                    <button
                        @click="active = active === 2 ? null : 2"
                        class="w-full flex items-center justify-between text-left group cursor-pointer focus:outline-none"
                    >
                        <div class="flex items-center gap-6 sm:gap-10 pr-4">
                            <span class="font-mono text-sm sm:text-base font-bold text-slate-400 group-hover:text-slate-900 transition-colors">02</span>
                            <span class="text-base sm:text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                Berapa lama waktu yang dibutuhkan hingga tim URC turun ke lokasi?
                            </span>
                        </div>
                        <span class="text-2xl font-light text-slate-400 group-hover:text-slate-900 transition-transform duration-300" :class="{ 'rotate-45': active === 2 }">
                            +
                        </span>
                    </button>
                    <div x-show="active === 2" x-collapse style="display: none;" class="mt-4 pl-12 sm:pl-16 pr-4 text-xs sm:text-sm text-slate-600 leading-relaxed font-light">
                        Setiap laporan diverifikasi oleh Admin DSDABM dalam waktu maksimal <strong>&lt; 24 jam</strong>. Laporan berprioritas tinggi dan darurat akan segera diterbitkan Surat Perintah Tugas (SPT) kepada regu teknis lapangan URC untuk langsung ditangani sesuai SLA kategori (1–3 hari kerja).
                    </div>
                </div>

                <!-- FAQ 03 -->
                <div class="py-6 sm:py-8">
                    <button
                        @click="active = active === 3 ? null : 3"
                        class="w-full flex items-center justify-between text-left group cursor-pointer focus:outline-none"
                    >
                        <div class="flex items-center gap-6 sm:gap-10 pr-4">
                            <span class="font-mono text-sm sm:text-base font-bold text-slate-400 group-hover:text-slate-900 transition-colors">03</span>
                            <span class="text-base sm:text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                Bagaimana cara memantau status perkembangan tiket pengerjaan saya?
                            </span>
                        </div>
                        <span class="text-2xl font-light text-slate-400 group-hover:text-slate-900 transition-transform duration-300" :class="{ 'rotate-45': active === 3 }">
                            +
                        </span>
                    </button>
                    <div x-show="active === 3" x-collapse style="display: none;" class="mt-4 pl-12 sm:pl-16 pr-4 text-xs sm:text-sm text-slate-600 leading-relaxed font-light">
                        Anda dapat memeriksa menu <strong>Lacak Tiket</strong> kapan saja tanpa perlu login, cukup masukkan nomor tiket laporan. Status akan diperbarui secara transparan: <em>Menunggu Verifikasi &rarr; Disetujui/Disposisi &rarr; Dalam Pengerjaan &rarr; Selesai</em> disertai foto bukti fisik perbaikan tuntas.
                    </div>
                </div>

                <!-- FAQ 04 -->
                <div class="py-6 sm:py-8">
                    <button
                        @click="active = active === 4 ? null : 4"
                        class="w-full flex items-center justify-between text-left group cursor-pointer focus:outline-none"
                    >
                        <div class="flex items-center gap-6 sm:gap-10 pr-4">
                            <span class="font-mono text-sm sm:text-base font-bold text-slate-400 group-hover:text-slate-900 transition-colors">04</span>
                            <span class="text-base sm:text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                Apakah pelaporan dikenakan biaya atau data identitas saya disebarkan?
                            </span>
                        </div>
                        <span class="text-2xl font-light text-slate-400 group-hover:text-slate-900 transition-transform duration-300" :class="{ 'rotate-45': active === 4 }">
                            +
                        </span>
                    </button>
                    <div x-show="active === 4" x-collapse style="display: none;" class="mt-4 pl-12 sm:pl-16 pr-4 text-xs sm:text-sm text-slate-600 leading-relaxed font-light">
                        Layanan INFRA-DAYA <strong>100% Gratis</strong> untuk seluruh warga masyarakat Kota Bandung. Data identitas pribadi pelapor dilindungi dan tidak dipublikasikan ke umum. Halaman publik hanya menampilkan titik koordinat kerusakan, foto kondisi fisik, dan progres perbaikan teknis.
                    </div>
                </div>

                <!-- FAQ 05 -->
                <div class="py-6 sm:py-8">
                    <button
                        @click="active = active === 5 ? null : 5"
                        class="w-full flex items-center justify-between text-left group cursor-pointer focus:outline-none"
                    >
                        <div class="flex items-center gap-6 sm:gap-10 pr-4">
                            <span class="font-mono text-sm sm:text-base font-bold text-slate-400 group-hover:text-slate-900 transition-colors">05</span>
                            <span class="text-base sm:text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                Apa saja jenis infrastruktur yang ditangani oleh DSDABM Kota Bandung?
                            </span>
                        </div>
                        <span class="text-2xl font-light text-slate-400 group-hover:text-slate-900 transition-transform duration-300" :class="{ 'rotate-45': active === 5 }">
                            +
                        </span>
                    </button>
                    <div x-show="active === 5" x-collapse style="display: none;" class="mt-4 pl-12 sm:pl-16 pr-4 text-xs sm:text-sm text-slate-600 leading-relaxed font-light">
                        Cakupan kewenangan DSDABM meliputi 4 pilar utama: <strong>Jalan Raya &amp; Trotoar</strong> (jalan kota), <strong>Drainase &amp; Saluran Air</strong> (gorong-gorong, kirmir, kolam retensi), <strong>Penerangan Jalan Umum (PJU)</strong> (tiang lampu &amp; instalasi kelistrikan jalan), serta <strong>Jembatan &amp; Tanggul Air</strong> (jembatan kota &amp; dinding penahan tebing sungai).
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: START YOUR JOURNEY TODAY / HUBUNGI & LAPORKAN (Screenshot 5 Style) -->
    <section class="bg-[#0A1628] text-white py-20 lg:py-28 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <!-- Left Column: Headline, Subtitle, Contact Info Box -->
                <div class="lg:col-span-6 space-y-8">
                    <div>
                        <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-[1.1]">
                            Wujudkan Bandung Nyaman <br>
                            <span class="font-serif italic font-normal text-amber-400">Mulai Hari Ini</span>
                        </h2>
                        <p class="mt-4 text-sm sm:text-base text-slate-300 leading-relaxed font-light">
                            Bergabung bersama ribuan warga Kota Bandung untuk memantau, melaporkan, dan menjaga keandalan infrastruktur publik kota tercinta.
                        </p>
                    </div>

                    <!-- Contact Details Box (Dark Slate-Navy Capsule) -->
                    <div class="bg-white/[0.04] border border-white/10 rounded-3xl p-6 sm:p-8 space-y-6">
                        <div>
                            <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Email Resmi</span>
                            <span class="text-sm font-semibold text-slate-100">dsdabm@bandung.go.id</span>
                        </div>
                        <div>
                            <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Telepon / Call Center Darurat</span>
                            <span class="text-sm font-semibold text-slate-100">112 (Bebas Pulsa) &bull; (022) 7278835</span>
                        </div>
                        <div>
                            <span class="text-[11px] font-mono text-slate-400 uppercase tracking-wider block">Kantor Dinas</span>
                            <span class="text-sm font-semibold text-slate-100">
                                Jl. Cianjur No. 34, Kel. Kacapiring, Kec. Batununggal, Kota Bandung, Jawa Barat 40271
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Clean White Floating Form Card (Fast Track & Lapor) -->
                <div class="lg:col-span-6">
                    <div class="bg-white text-slate-900 rounded-3xl p-8 sm:p-10 shadow-2xl space-y-6 border border-slate-100">
                        <div>
                            <span class="text-xs font-mono font-bold text-amber-600 uppercase tracking-wider block mb-1">
                                Partisipasi Warga
                            </span>
                            <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                                Cek Status atau Laporkan Kerusakan
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 mt-1 font-light">
                                Gunakan nomor tiket yang sudah Anda miliki atau ajukan laporan baru dengan foto bukti lapangan.
                            </p>
                        </div>

                        <!-- Ticket Tracking Form -->
                        <form action="{{ route('tracking.publik', [], false) }}" method="GET" class="space-y-4">
                            <div>
                                <label for="form_tiket" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                                    Nomor Tiket Pengaduan
                                </label>
                                <input
                                    type="text"
                                    id="form_tiket"
                                    name="nomor_tiket"
                                    placeholder="Contoh: INFRA-20261014-0001"
                                    class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm text-slate-900 placeholder-slate-400 font-mono focus:border-blue-600 focus:ring-1 focus:ring-blue-600 uppercase font-bold"
                                >
                            </div>

                            <button
                                type="submit"
                                class="w-full rounded-full bg-slate-100 hover:bg-slate-200 text-slate-900 font-bold py-3.5 px-6 text-xs uppercase tracking-wider transition-all flex items-center justify-center gap-2 cursor-pointer"
                            >
                                <span>Lacak Tiket</span>
                                <span>&nearr;</span>
                            </button>
                        </form>

                        <div class="relative flex items-center justify-center">
                            <div class="border-t border-slate-200 w-full"></div>
                            <span class="bg-white px-3 text-xs text-slate-400 font-mono uppercase">atau</span>
                        </div>

                        <!-- Full Report CTA Button -->
                        <div>
                            <a
                                href="{{ route('warga.laporan.create', [], false) }}"
                                class="w-full rounded-full bg-slate-950 hover:bg-slate-800 text-white font-bold py-4 px-6 text-sm text-center block shadow-lg shadow-slate-950/20 transition-all hover:scale-101 cursor-pointer"
                            >
                                + Ajukan Laporan Kerusakan Baru &nearr;
                            </a>
                            <p class="text-[11px] text-center text-slate-400 mt-2">
                                Dilengkapi penanda koordinat GPS akurat &amp; unggah foto langsung
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leaflet Script for Home Map -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mapElement = document.getElementById('home-preview-map');
            if (!mapElement) return;

            // Titik Pusat Kota Bandung (Kantor DSDABM Jl. Cianjur No. 34)
            const bandungCenter = [-6.9175, 107.6191];
            const map = L.map('home-preview-map', {
                scrollWheelZoom: false,
                attributionControl: false
            }).setView(bandungCenter, 12);

            // OpenStreetMap Standard Tiles
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '&copy; OpenStreetMap'
            }).addTo(map);

            // Command Center Pin
            const cmdIcon = L.divIcon({
                className: 'custom-cmd-marker',
                html: '<div style="background-color: #F59E0B; width: 16px; height: 16px; border-radius: 9999px; border: 3px solid #ffffff; box-shadow: 0 0 12px #F59E0B;"></div>',
                iconSize: [16, 16],
                iconAnchor: [8, 8]
            });

            L.marker(bandungCenter, { icon: cmdIcon })
                .addTo(map)
                .bindPopup('<strong style="font-size: 12px; color: #0A2240;">Komando DSDABM Kota Bandung</strong><br><span style="font-size: 11px; color: #64748B;">Jl. Cianjur No. 34, Kota Bandung</span>');

            // Sample Civic Telemetry Points
            const points = [
                { lat: -6.9218, lng: 107.6070, label: "Rekonstruksi Jalan Pasteur", cat: "Jalan", col: "#3B82F6" },
                { lat: -6.8905, lng: 107.6100, label: "Drainase Pagarsih", cat: "Drainase", col: "#06B6D4" },
                { lat: -6.9024, lng: 107.6186, label: "Smart LED PJU Dago", cat: "PJU", col: "#F59E0B" },
                { lat: -6.9380, lng: 107.6600, label: "Tanggul Sungai Cikapundung", cat: "Jembatan", col: "#6366F1" }
            ];

            points.forEach(p => {
                const icon = L.divIcon({
                    className: 'telemetry-marker',
                    html: `<div style="background-color: ${p.col}; width: 12px; height: 12px; border-radius: 9999px; border: 2.5px solid #ffffff; box-shadow: 0 0 10px ${p.col};"></div>`,
                    iconSize: [12, 12],
                    iconAnchor: [6, 6]
                });
                L.marker([p.lat, p.lng], { icon: icon })
                    .addTo(map)
                    .bindPopup(`<strong style="font-size: 12px; color: #0f172a;">${p.label}</strong><br><span style="font-size: 10px; color: ${p.col}; font-weight: bold;">Kategori: ${p.cat}</span>`);
            });
        });
    </script>
    @endpush
</x-warga-layout>
