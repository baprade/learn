@extends('layouts.app')

{{-- Built by Bagas (Baprade) - Day 3: UI refinement, KAKAP CSIRT system showcase, and responsive updates - 28 Jul 2026 --}}

@section('content')

{{-- Hero Section --}}
<section id="hero" class="relative pt-32 pb-20 md:pt-36 md:pb-24 overflow-hidden bg-grid-subtle bg-hero-glow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto space-y-6">
            
            {{-- Status Pill --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded bg-slate-900 border border-slate-800 text-slate-300 text-xs font-medium">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span x-show="lang === 'id'">Open Project & Free 3 Bulan Support</span>
                <span x-show="lang === 'en'">Open for New Projects & 3 Months Free Support</span>
            </div>

            {{-- Main H1 Heading --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold font-heading tracking-tight text-white leading-tight">
                <span x-show="lang === 'id'">Bikin Web Modern <span class="text-emerald-400">Which Is Super Fast & Effortless</span></span>
                <span x-show="lang === 'en'">Custom Web Development & <span class="text-emerald-400">Laravel SSR Engine</span></span>
            </h1>

            {{-- Subtitle --}}
            <p class="text-base sm:text-lg text-slate-300 leading-relaxed font-normal">
                <span x-show="lang === 'id'">Honestly gausah pusing mikirin kodingan. Gw bantu bikin website & web app custom pake stack <strong class="text-white">Laravel SSR</strong> berstandar <strong class="text-emerald-400">SOLID Principles</strong>. Ultra fast, secure, & Google SEO ready.</span>
                <span x-show="lang === 'en'">Engineered for high performance, top-tier security, and search engine visibility. Built adhering strictly to <strong class="text-emerald-400">SOLID Principles</strong> powered by <strong class="text-white">Laravel SSR</strong>.</span>
            </p>

            {{-- Minimalist Buttons --}}
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('seo.whatsapp')) }}?text={{ urlencode('Halo Bagas, mau diskusi bikin website bro!') }}" target="_blank" rel="noopener" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded border border-emerald-500 text-xs font-semibold text-white bg-emerald-600 hover:bg-emerald-500 transition-all">
                    <svg class="w-4 h-4 mr-2 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    <span x-show="lang === 'id'">Gas Diskusi di WA</span>
                    <span x-show="lang === 'en'">Chat on WhatsApp</span>
                </a>
                <a href="{{ config('seo.personal_site') }}" target="_blank" rel="noopener" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded border border-slate-800 text-xs font-semibold text-slate-300 bg-slate-900 hover:border-slate-700 hover:text-white transition-all">
                    <span x-show="lang === 'id'">Pengalaman & Portofolio</span>
                    <span x-show="lang === 'en'">Track Record & Experience</span>
                    <svg class="w-3.5 h-3.5 ml-2 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            </div>

            {{-- Trust Highlights --}}
            <div class="pt-6 flex flex-wrap items-center justify-center gap-6 text-xs font-medium text-slate-400 border-t border-slate-900 mt-8">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span>SOLID Principles Architecture</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span x-show="lang === 'id'">Free 3 Bulan Support</span>
                    <span x-show="lang === 'en'">Free 3 Months Support</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span x-show="lang === 'id'">Full cPanel & DB Access Request</span>
                    <span x-show="lang === 'en'">cPanel & DB Access On Request</span>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Featured Live Enterprise Showcase: KAKAP CSIRT --}}
<section id="showcase" class="py-16 bg-slate-950 border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h2 class="text-xs uppercase font-bold tracking-widest text-emerald-400 mb-1">
                <span x-show="lang === 'id'">Featured Enterprise Project</span>
                <span x-show="lang === 'en'">Featured Enterprise Project</span>
            </h2>
            <p class="text-2xl sm:text-3xl font-bold font-heading text-white">
                <span x-show="lang === 'id'">Live Enterprise & Security System</span>
                <span x-show="lang === 'en'">Live Enterprise & Security System</span>
            </p>
            <p class="text-slate-400 text-xs mt-2">
                <span x-show="lang === 'id'">Salah satu karya sistem keamanan enterprise live. Note: Aplikasi kantor internal & enterprise bersifat NDA & proprietary license sehingga tidak dipublish publik di GitHub.</span>
                <span x-show="lang === 'en'">Featured live security response system. Note: Internal enterprise & corporate systems operate under strict NDA & proprietary licensing.</span>
            </p>
        </div>

        <div class="natural-card p-6 sm:p-8 rounded-2xl border border-slate-800 max-w-4xl mx-auto relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                
                <div class="lg:col-span-8 space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span class="text-xs font-bold text-emerald-400 uppercase tracking-wide">Live Enterprise System</span>
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold font-heading text-white">
                        {{ $featuredProject['name'] }}
                    </h3>

                    <p class="text-slate-300 text-xs leading-relaxed">
                        <span x-show="lang === 'id'">{{ $featuredProject['desc_id'] }}</span>
                        <span x-show="lang === 'en'">{{ $featuredProject['desc_en'] }}</span>
                    </p>

                    <div class="flex flex-wrap items-center gap-2 pt-2">
                        <template x-if="lang === 'id'">
                            @foreach($featuredProject['highlights_id'] as $hl)
                            <span class="text-[11px] font-semibold text-slate-300 bg-slate-900 border border-slate-800 px-2.5 py-1 rounded">
                                ✓ {{ $hl }}
                            </span>
                            @endforeach
                        </template>
                        <template x-if="lang === 'en'">
                            @foreach($featuredProject['highlights_en'] as $hl)
                            <span class="text-[11px] font-semibold text-slate-300 bg-slate-900 border border-slate-800 px-2.5 py-1 rounded">
                                ✓ {{ $hl }}
                            </span>
                            @endforeach
                        </template>
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col items-center lg:items-end justify-center pt-4 lg:pt-0 border-t lg:border-t-0 lg:border-l border-slate-800 lg:pl-6">
                    <div class="text-center lg:text-right space-y-3 w-full">
                        <div class="text-[11px] text-slate-400 font-mono">
                            https://kakap-csirt.plecoenergy.co.id/
                        </div>
                        <a href="{{ $featuredProject['url'] }}" target="_blank" rel="noopener" class="w-full inline-flex items-center justify-center px-5 py-2.5 rounded border border-emerald-500 text-xs font-semibold text-white bg-emerald-600 hover:bg-emerald-500 transition-all">
                            <span x-show="lang === 'id'">Kunjungi Platform Live</span>
                            <span x-show="lang === 'en'">Visit Live Platform</span>
                            <svg class="w-3.5 h-3.5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

{{-- Development Options Section --}}
<section id="opsi" class="py-16 bg-[#090d16] border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-xs uppercase font-bold tracking-widest text-emerald-400 mb-1">
                <span x-show="lang === 'id'">Opsi Pengerjaan</span>
                <span x-show="lang === 'en'">Development Options</span>
            </h2>
            <p class="text-2xl sm:text-3xl font-bold font-heading text-white">
                <span x-show="lang === 'id'">Pilih Metode Pengerjaan Sesuai Kebutuhan</span>
                <span x-show="lang === 'en'">Flexible Execution Tailored To Your Needs</span>
            </p>
            <p class="text-slate-400 text-xs mt-2">
                <span x-show="lang === 'id'">Kamu bisa pilih pake template modern yang udah ready (pengerjaan cepat) atau full custom buatan tangan berstandar SOLID. Semua opsi dapet free support & akses cPanel/DB kalo butuh.</span>
                <span x-show="lang === 'en'">Choose between pre-made high-performance templates for fast delivery or complete custom development adhering to SOLID principles.</span>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            {{-- Option 1: Template Ready --}}
            <div class="natural-card p-7 rounded-2xl border border-slate-800 space-y-4">
                <div class="w-10 h-10 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-emerald-400 bg-slate-900 border border-slate-800 px-2 py-0.5 rounded">Fast Delivery</span>
                    <h3 class="text-lg font-bold font-heading text-white mt-2">
                        <span x-show="lang === 'id'">Template Ready-to-Use</span>
                        <span x-show="lang === 'en'">Ready-to-Use Templates</span>
                    </h3>
                    <p class="text-slate-400 text-xs leading-relaxed mt-1">
                        <span x-show="lang === 'id'">Pake pilihan template modern yang udah ready. Tinggal masukin teks, gambar, & materi kamu. Which is kilat 1-2 hari langsung live!</span>
                        <span x-show="lang === 'en'">Leverage pre-designed high-speed modern templates. Simply supply your copy and assets for 1-2 days rapid deployment.</span>
                    </p>
                </div>
                <ul class="space-y-2 text-xs text-slate-300 border-t border-slate-800 pt-3">
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span x-show="lang === 'id'">Pengerjaan Kilat 1-2 Hari</span>
                        <span x-show="lang === 'en'">Rapid 1-2 Days Turnaround</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span x-show="lang === 'id'">Desain Modern & Mobile Responsive</span>
                        <span x-show="lang === 'en'">Modern & Mobile Responsive Layouts</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span x-show="lang === 'id'">Termasuk Free 3 Bulan Support & Akses cPanel/DB</span>
                        <span x-show="lang === 'en'">Includes 3 Months Support & cPanel/DB Access</span>
                    </li>
                </ul>
            </div>

            {{-- Option 2: Full Custom --}}
            <div class="natural-card p-7 rounded-2xl border border-slate-800 space-y-4">
                <div class="w-10 h-10 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                </div>
                <div>
                    <span class="text-[10px] font-bold text-emerald-400 bg-slate-900 border border-slate-800 px-2 py-0.5 rounded">Tailored Build (SOLID)</span>
                    <h3 class="text-lg font-bold font-heading text-white mt-2">
                        <span x-show="lang === 'id'">Full Custom Development</span>
                        <span x-show="lang === 'en'">Full Custom Development</span>
                    </h3>
                    <p class="text-slate-400 text-xs leading-relaxed mt-1">
                        <span x-show="lang === 'id'">Bikin dari nol pake kodingan Laravel SSR & SOLID principles. Bebas request alur, UI/UX kustom, integrasi API, & fitur spesifik bisnis kamu.</span>
                        <span x-show="lang === 'en'">Custom engineered from scratch using Laravel SSR & SOLID Principles. Complete freedom over business logic, custom UI/UX, and enterprise integrations.</span>
                    </p>
                </div>
                <ul class="space-y-2 text-xs text-slate-300 border-t border-slate-800 pt-3">
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span x-show="lang === 'id'">Arsitektur SOLID & Clean Code Standard</span>
                        <span x-show="lang === 'en'">SOLID Architecture & Clean Code Standard</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span x-show="lang === 'id'">Laravel 13 SSR Performance & Security</span>
                        <span x-show="lang === 'en'">Laravel 13 SSR Performance & Security</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span x-show="lang === 'id'">Full Control Akses cPanel, Server, & Database</span>
                        <span x-show="lang === 'en'">Full Control over cPanel, Server, & Database</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>

{{-- Services Section --}}
<section id="layanan" class="py-16 bg-slate-950 border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-xs uppercase font-bold tracking-widest text-emerald-400 mb-1">
                <span x-show="lang === 'id'">Layanan Utama</span>
                <span x-show="lang === 'en'">Core Services</span>
            </h2>
            <p class="text-2xl sm:text-3xl font-bold font-heading text-white">
                <span x-show="lang === 'id'">Scope Project Which Is Flexible</span>
                <span x-show="lang === 'en'">Tailored Web Development Services</span>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach(config('seo.services') as $svc)
            <div class="natural-card p-6 rounded-xl flex flex-col justify-between">
                <div>
                    <div class="w-9 h-9 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400 mb-4">
                        @if($svc['icon'] == 'zap')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        @elseif($svc['icon'] == 'building')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011 v5m-4 0h4"></path></svg>
                        @elseif($svc['icon'] == 'code-2')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        @else
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        @endif
                    </div>
                    <h3 class="text-base font-bold font-heading text-white mb-1.5">
                        <span x-show="lang === 'id'">{{ $svc['title_id'] }}</span>
                        <span x-show="lang === 'en'">{{ $svc['title_en'] }}</span>
                    </h3>
                    <p class="text-slate-400 text-xs leading-relaxed mb-4">
                        <span x-show="lang === 'id'">{{ $svc['desc_id'] }}</span>
                        <span x-show="lang === 'en'">{{ $svc['desc_en'] }}</span>
                    </p>
                </div>
                <div class="pt-3 border-t border-slate-800">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('seo.whatsapp')) }}?text={{ urlencode('Halo Bagas, mau diskusi soal ' . $svc['title_id']) }}" target="_blank" rel="noopener" class="text-xs font-semibold text-emerald-400 hover:underline flex items-center justify-between">
                        <span x-show="lang === 'id'">Diskusi via WA</span>
                        <span x-show="lang === 'en'">Discuss via WhatsApp</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- Advantages Section --}}
<section id="keunggulan" class="py-16 bg-[#090d16] border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-6 space-y-5">
                <h2 class="text-xs uppercase font-bold tracking-widest text-emerald-400">
                    <span x-show="lang === 'id'">Keunggulan Kode</span>
                    <span x-show="lang === 'en'">Core Advantages</span>
                </h2>
                <h3 class="text-2xl sm:text-3xl font-bold font-heading text-white leading-tight">
                    <span x-show="lang === 'id'">Struktur Kodingan SOLID Principles & Blade SSR</span>
                    <span x-show="lang === 'en'">SOLID Principles & Blade SSR Architecture</span>
                </h3>
                <p class="text-slate-300 text-xs leading-relaxed">
                    <span x-show="lang === 'id'">Maksimalin potensi bawaan Laravel Blade SSR dengan standar SOLID Principles. Kode modular, tidak berantakan, gampang dikembangkan, & aman.</span>
                    <span x-show="lang === 'en'">Unleashing native Laravel Blade SSR built on SOLID Principles. Clean, modular, extensible, and secure software design.</span>
                </p>

                <div class="space-y-3.5 pt-1 text-xs">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400 shrink-0 mt-0.5 font-bold">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-bold text-white">SOLID Code Principles</h4>
                            <p class="text-slate-400 mt-0.5">
                                <span x-show="lang === 'id'">Single Responsibility, Open-Closed, Liskov, Interface Segregation, & Dependency Inversion.</span>
                                <span x-show="lang === 'en'">Single Responsibility, Open-Closed, Liskov, Interface Segregation, & Dependency Inversion.</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400 shrink-0 mt-0.5 font-bold">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-bold text-white">
                                <span x-show="lang === 'id'">Full Akses cPanel & Database On Request</span>
                                <span x-show="lang === 'en'">cPanel & Database Access On Request</span>
                            </h4>
                            <p class="text-slate-400 mt-0.5">
                                <span x-show="lang === 'id'">Gausah takut dikunci. Akses cPanel, hosting server, & DB bisa diserahin full.</span>
                                <span x-show="lang === 'en'">Full credentials for cPanel, server hosting, and DB handed over on request.</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400 shrink-0 mt-0.5 font-bold">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-bold text-white">
                                <span x-show="lang === 'id'">Free 3 Bulan Support</span>
                                <span x-show="lang === 'en'">3 Months Free Support</span>
                            </h4>
                            <p class="text-slate-400 mt-0.5">
                                <span x-show="lang === 'id'">Pendampingan gratis 3 bulan pertama setelah website diluncurkan.</span>
                                <span x-show="lang === 'en'">Complimentary technical maintenance for 3 months post-launch.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4 Clean Feature Cards --}}
            <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="natural-card p-5 rounded-xl border border-slate-800 space-y-2">
                    <div class="w-8 h-8 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h4 class="font-bold text-sm text-white">SOLID Architecture</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        <span x-show="lang === 'id'">Kode rapi, modular, & mudah dikembangkan jangka panjang.</span>
                        <span x-show="lang === 'en'">Clean, modular code designed for long-term scalability.</span>
                    </p>
                </div>

                <div class="natural-card p-5 rounded-xl border border-slate-800 space-y-2">
                    <div class="w-8 h-8 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 0121 9z"></path></svg>
                    </div>
                    <h4 class="font-bold text-sm text-white">cPanel & DB Credentials</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        <span x-show="lang === 'id'">Akses server & database diserahin full kalo request.</span>
                        <span x-show="lang === 'en'">Server & DB credentials handed over upon request.</span>
                    </p>
                </div>

                <div class="natural-card p-5 rounded-xl border border-slate-800 space-y-2">
                    <div class="w-8 h-8 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="font-bold text-sm text-white">
                        <span x-show="lang === 'id'">Ultra Fast Speed</span>
                        <span x-show="lang === 'en'">Ultra Fast Load</span>
                    </h4>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        <span x-show="lang === 'id'">Load time kenceng biar visitor betah & nyaman.</span>
                        <span x-show="lang === 'en'">Optimized TTFB and compressed WebP assets.</span>
                    </p>
                </div>

                <div class="natural-card p-5 rounded-xl border border-slate-800 space-y-2">
                    <div class="w-8 h-8 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h4 class="font-bold text-sm text-white">Hyper Care 3 Months</h4>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        <span x-show="lang === 'id'">Pendampingan gratis 3 bulan penuh beres launch.</span>
                        <span x-show="lang === 'en'">Complimentary 3-month post-launch maintenance.</span>
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- Hyper Care Support Section --}}
<section id="hypercare" class="py-16 bg-slate-950 border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-xs uppercase font-bold tracking-widest text-emerald-400 mb-1">
                <span x-show="lang === 'id'">After-Sales Support</span>
                <span x-show="lang === 'en'">After-Sales Guarantee</span>
            </h2>
            <p class="text-2xl sm:text-3xl font-bold font-heading text-white">Free 3 Months Hyper Care Support</p>
            <p class="text-slate-400 text-xs mt-2">
                <span x-show="lang === 'id'">Literally beres launch web ga langsung ditinggal. Gw jagain 3 bulan gratis & akses cPanel/DB bisa diserahkan!</span>
                <span x-show="lang === 'en'">Post-launch peace of mind with 3 months of complimentary technical care and full access handover.</span>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($hyperCareFeatures as $hc)
            <div class="natural-card p-6 rounded-xl space-y-3.5">
                <div class="w-9 h-9 rounded bg-slate-900 border border-slate-800 flex items-center justify-center text-emerald-400">
                    @if($hc['icon'] == 'shield-check')
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    @elseif($hc['icon'] == 'database')
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79-8-4m0 5c0 2.21-3.582 4-8 4s8-1.79-8-4"></path></svg>
                    @elseif($hc['icon'] == 'key')
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 0121 9z"></path></svg>
                    @else
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    @endif
                </div>

                <div>
                    <span class="text-[10px] font-semibold text-emerald-400 bg-slate-900 border border-slate-800 px-2 py-0.5 rounded">
                        <span x-show="lang === 'id'">{{ $hc['category_id'] }}</span>
                        <span x-show="lang === 'en'">{{ $hc['category_en'] }}</span>
                    </span>
                    <h3 class="text-base font-bold font-heading text-white mt-2 mb-1.5">
                        <span x-show="lang === 'id'">{{ $hc['title_id'] }}</span>
                        <span x-show="lang === 'en'">{{ $hc['title_en'] }}</span>
                    </h3>
                    <p class="text-slate-400 text-xs leading-relaxed mb-3">
                        <span x-show="lang === 'id'">{{ $hc['desc_id'] }}</span>
                        <span x-show="lang === 'en'">{{ $hc['desc_en'] }}</span>
                    </p>
                </div>

                <ul class="space-y-1.5 text-[11px] text-slate-300 pt-3 border-t border-slate-800">
                    <template x-if="lang === 'id'">
                        @foreach($hc['highlights_id'] as $hl)
                        <li class="flex items-center gap-1.5">
                            <svg class="w-3 h-3 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ $hl }}</span>
                        </li>
                        @endforeach
                    </template>
                    <template x-if="lang === 'en'">
                        @foreach($hc['highlights_en'] as $hl)
                        <li class="flex items-center gap-1.5">
                            <svg class="w-3 h-3 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ $hl }}</span>
                        </li>
                        @endforeach
                    </template>
                </ul>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- FAQ Section --}}
<section id="faq" class="py-16 bg-[#090d16] border-t border-slate-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-xs uppercase font-bold tracking-widest text-emerald-400 mb-1">
                <span x-show="lang === 'id'">Informasi FAQ</span>
                <span x-show="lang === 'en'">Frequently Asked Questions</span>
            </h2>
            <p class="text-2xl font-bold font-heading text-white">
                <span x-show="lang === 'id'">FAQ Santai & Jawaban Developer</span>
                <span x-show="lang === 'en'">Common Questions & Developer Answers</span>
            </p>
        </div>

        <div class="space-y-3" x-data="{ openFaq: 0 }">
            @foreach($faqs as $idx => $f)
            <div class="natural-card rounded-xl border border-slate-800 overflow-hidden">
                <button type="button" @click="openFaq = (openFaq === {{ $idx }} ? null : {{ $idx }})" class="w-full text-left p-4 sm:p-5 flex items-center justify-between gap-4 font-bold text-white text-sm hover:text-emerald-400 transition-colors">
                    <span x-show="lang === 'id'">{{ $f['q_id'] }}</span>
                    <span x-show="lang === 'en'">{{ $f['q_en'] }}</span>
                    <svg :class="openFaq === {{ $idx }} ? 'rotate-180 text-emerald-400' : 'text-slate-500'" class="w-4 h-4 transition-transform shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="openFaq === {{ $idx }}" x-collapse class="px-4 sm:px-5 pb-5 pt-0 text-xs text-slate-300 leading-relaxed border-t border-slate-800/80">
                    <p class="pt-3" x-show="lang === 'id'">{!! nl2br(e($f['a_id'])) !!}</p>
                    <p class="pt-3" x-show="lang === 'en'">{!! nl2br(e($f['a_en'])) !!}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

{{-- Contact Section --}}
<section id="kontak" class="py-16 bg-slate-950 border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-5 space-y-4">
                <h2 class="text-xs uppercase font-bold tracking-widest text-emerald-400">
                    <span x-show="lang === 'id'">Direct Contact</span>
                    <span x-show="lang === 'en'">Get In Touch</span>
                </h2>
                <h3 class="text-2xl sm:text-3xl font-bold font-heading text-white leading-tight">
                    <span x-show="lang === 'id'">Gas Diskusi Project Sekarang Bro!</span>
                    <span x-show="lang === 'en'">Let's Discuss Your Project</span>
                </h3>
                <p class="text-slate-300 text-xs leading-relaxed">
                    <span x-show="lang === 'id'">Directly hit me up via WA. Open buat Jabodetabek & regional APAC clients. Kodingan berstandar SOLID Principles & full cPanel/DB access on request!</span>
                    <span x-show="lang === 'en'">Reach out via WhatsApp or email. Serving clients across Jabodetabek & the APAC region with SOLID architecture standards & full cPanel/DB access.</span>
                </p>

                <div class="pt-2">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('seo.whatsapp')) }}?text={{ urlencode('Halo Bagas, mau diskusi bikin website bro!') }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center px-6 py-3 rounded border border-emerald-500 text-xs font-semibold text-white bg-emerald-600 hover:bg-emerald-500 transition-all">
                        <svg class="w-4 h-4 mr-2 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.893 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span x-show="lang === 'id'">Chat Direct WhatsApp</span>
                        <span x-show="lang === 'en'">Direct WhatsApp Chat</span>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="natural-card p-6 sm:p-8 rounded-2xl">
                    <h4 class="text-base font-bold font-heading text-white mb-1">
                        <span x-show="lang === 'id'">Formulir Pesan Quick</span>
                        <span x-show="lang === 'en'">Quick Inquiry Form</span>
                    </h4>
                    <p class="text-slate-400 text-xs mb-4">
                        <span x-show="lang === 'id'">Isi nama & pesan kamu, otomatis ke-redirect ke WA dengan format rapi.</span>
                        <span x-show="lang === 'en'">Fill out your details below to directly connect via pre-formatted WhatsApp message.</span>
                    </p>

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-3">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label for="nama" class="block text-xs font-medium text-slate-300 mb-1">
                                    <span x-show="lang === 'id'">Nama Kamu *</span>
                                    <span x-show="lang === 'en'">Your Name *</span>
                                </label>
                                <input type="text" id="nama" name="nama" required placeholder="Name" class="w-full px-3.5 py-2 rounded bg-slate-900 border border-slate-800 text-white text-xs focus:outline-none focus:border-emerald-500">
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-medium text-slate-300 mb-1">Email</label>
                                <input type="email" id="email" name="email" placeholder="name@email.com" class="w-full px-3.5 py-2 rounded bg-slate-900 border border-slate-800 text-white text-xs focus:outline-none focus:border-emerald-500">
                            </div>
                        </div>

                        <div>
                            <label for="layanan" class="block text-xs font-medium text-slate-300 mb-1">
                                <span x-show="lang === 'id'">Opsi & Kebutuhan Web *</span>
                                <span x-show="lang === 'en'">Service & Option Required *</span>
                            </label>
                            <select id="layanan" name="layanan" required class="w-full px-3.5 py-2 rounded bg-slate-900 border border-slate-800 text-white text-xs focus:outline-none focus:border-emerald-500">
                                <option value="Full Custom Web Development (SOLID Architecture)">Full Custom Web Development (SOLID Principles)</option>
                                <option value="Template Ready-to-Use Web">Template Ready-to-Use Web (Pengerjaan Kilat)</option>
                                <option value="Landing Page High Conversion">Landing Page High Conversion</option>
                                <option value="Company Profile / Business Web">Company Profile / Enterprise Web</option>
                                <option value="3 Months Free Support & Care">3 Months Support & cPanel/DB Access</option>
                            </select>
                        </div>

                        <div>
                            <label for="pesan" class="block text-xs font-medium text-slate-300 mb-1">
                                <span x-show="lang === 'id'">Pesan / Brief *</span>
                                <span x-show="lang === 'en'">Message / Project Brief *</span>
                            </label>
                            <textarea id="pesan" name="pesan" rows="3" required placeholder="Project details or brief..." class="w-full px-3.5 py-2 rounded bg-slate-900 border border-slate-800 text-white text-xs focus:outline-none focus:border-emerald-500"></textarea>
                        </div>

                        <button type="submit" class="w-full py-2.5 rounded border border-emerald-500 font-semibold text-xs text-white bg-emerald-600 hover:bg-emerald-500 transition-all flex items-center justify-center gap-2">
                            <span x-show="lang === 'id'">Kirim ke WhatsApp</span>
                            <span x-show="lang === 'en'">Send via WhatsApp</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
