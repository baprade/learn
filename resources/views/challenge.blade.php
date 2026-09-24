@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{
    code: @js($challenge['starter_code']),
    running: false,
    results: null,
    showHint: false,
    showSolution: false,
    showAuthModal: false,
    solvedSlugs: JSON.parse(localStorage.getItem('learn_solved_challenges') || '[]'),
    
    runCode() {
        this.running = true;
        this.results = null;

        fetch('{{ route("challenge.run", $challenge["slug"]) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ code: this.code })
        })
        .then(async res => {
            const data = await res.json().catch(() => null);
            if (!data) {
                throw new Error('Server mengembalikan respons yang tidak valid.');
            }
            return data;
        })
        .then(data => {
            this.running = false;
            
            if (data.status === 'unauthenticated') {
                this.showAuthModal = true;
                return;
            }

            this.results = data;

            if (data.status === 'all_passed') {
                if (!this.solvedSlugs.includes('{{ $challenge["slug"] }}')) {
                    this.solvedSlugs.push('{{ $challenge["slug"] }}');
                    localStorage.setItem('learn_solved_challenges', JSON.stringify(this.solvedSlugs));
                }
            }
        })
        .catch(err => {
            this.running = false;
            this.results = {
                status: 'error',
                message: err.message || 'Terjadi kesalahan saat mengeksekusi kodingan.',
                results: []
            };
        });
    }
}">

    {{-- Breadcrumb Nav --}}
    <div class="mb-5 flex items-center justify-between">
        <a href="{{ route('home') }}" class="inline-flex items-center text-xs text-slate-400 hover:text-emerald-400 transition-colors">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span x-show="lang === 'id'">Kembali ke Katalog</span>
            <span x-show="lang === 'en'">Back to Catalog</span>
        </a>

        <div class="flex items-center gap-2">
            <template x-if="solvedSlugs.includes('{{ $challenge['slug'] }}')">
                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Solved</span>
                </span>
            </template>
            <span class="text-xs font-mono px-2 py-0.5 rounded bg-slate-900 border border-slate-800 text-slate-300">
                +{{ $challenge['points'] }} pts
            </span>
        </div>
    </div>

    {{-- 2-Column Clean Workspace --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-start">
        
        {{-- Left Pane: Instructions & Schema --}}
        <div class="lg:col-span-5 bg-[#0e1422] p-5 rounded-xl border border-slate-800 space-y-5">
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded font-mono {{ ($challenge['language'] ?? 'php') === 'sql' ? 'bg-cyan-950 text-cyan-400 border border-cyan-800' : 'bg-indigo-950 text-indigo-400 border border-indigo-800' }}">
                        {{ strtoupper($challenge['language'] ?? 'php') }}
                    </span>
                    <span class="text-[10px] text-slate-400 px-2 py-0.5 rounded bg-slate-900 border border-slate-800">
                        {{ $challenge['category'] }}
                    </span>
                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded {{ $challenge['difficulty'] === 'Easy' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30' : 'bg-amber-500/10 text-amber-400 border border-amber-500/30' }}">
                        {{ $challenge['difficulty'] }}
                    </span>
                </div>

                <h1 class="text-lg font-bold font-heading text-white">
                    <span x-show="lang === 'id'">{{ $challenge['title_id'] }}</span>
                    <span x-show="lang === 'en'">{{ $challenge['title_en'] }}</span>
                </h1>
            </div>

            <div class="text-xs text-slate-300 leading-relaxed space-y-2 border-t border-slate-800 pt-4">
                <h3 class="text-xs font-semibold text-slate-200 uppercase tracking-wide">
                    <span x-show="lang === 'id'">Deskripsi Soal</span>
                    <span x-show="lang === 'en'">Instructions</span>
                </h3>
                <p>
                    <span x-show="lang === 'id'">{{ $challenge['description_id'] }}</span>
                    <span x-show="lang === 'en'">{{ $challenge['description_en'] }}</span>
                </p>
            </div>

            {{-- SQL Schema Table Definition (if SQL challenge) --}}
            @if(!empty($challenge['schema_setup']))
            <div class="space-y-2 border-t border-slate-800 pt-4">
                <h3 class="text-xs font-semibold text-slate-200 uppercase tracking-wide flex items-center justify-between">
                    <span>Database Schema Setup</span>
                    <span class="text-[10px] font-normal text-slate-400">In-Memory SQLite</span>
                </h3>
                <div class="p-3 rounded bg-[#060910] border border-slate-800 text-[11px] font-mono text-cyan-300 overflow-x-auto">
                    <pre><code>{{ $challenge['schema_setup'] }}</code></pre>
                </div>
            </div>
            @endif

            {{-- Expected Target Output --}}
            <div class="space-y-2 border-t border-slate-800 pt-4">
                <h3 class="text-xs font-semibold text-slate-200 uppercase tracking-wide">
                    <span x-show="lang === 'id'">Target Output yang Diharapkan</span>
                    <span x-show="lang === 'en'">Expected Output</span>
                </h3>
                <div class="p-3 rounded bg-[#060910] border border-slate-800 text-xs font-mono text-slate-300 overflow-x-auto">
                    <pre><code>{{ json_encode($challenge['test_cases'][0]['expected'] ?? [], JSON_PRETTY_PRINT) }}</code></pre>
                </div>
            </div>

            {{-- Hints & Solution --}}
            <div class="border-t border-slate-800 pt-4 space-y-3">
                <div class="flex items-center gap-2">
                    <button type="button" @click="showHint = !showHint" class="px-2.5 py-1 rounded border border-slate-800 text-xs text-slate-300 hover:text-white hover:bg-slate-900 transition-all flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        <span x-text="showHint ? 'Tutup Hint' : 'Buka Hint'"></span>
                    </button>
                    
                    <button type="button" @click="showSolution = !showSolution" class="px-2.5 py-1 rounded border border-slate-800 text-xs text-slate-300 hover:text-white hover:bg-slate-900 transition-all flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        <span x-text="showSolution ? 'Tutup Solusi' : 'Lihat Solusi'"></span>
                    </button>
                </div>

                <div x-show="showHint" class="p-3 rounded bg-amber-950/20 border border-amber-500/30 text-amber-300 text-xs space-y-1">
                    <div class="font-semibold">Petunjuk:</div>
                    <ul class="list-disc list-inside space-y-1 text-[11px]">
                        @foreach($challenge['hints_id'] as $hint)
                        <li>{{ $hint }}</li>
                        @endforeach
                    </ul>
                </div>

                <div x-show="showSolution" class="p-3 rounded bg-[#060910] border border-slate-800 font-mono text-xs text-emerald-400 overflow-x-auto">
                    <pre><code>{{ $challenge['solution_code'] }}</code></pre>
                </div>
            </div>

        </div>

        {{-- Right Pane: Code Editor & Execution Results --}}
        <div class="lg:col-span-7 space-y-4">
            
            <div class="bg-[#0e1422] rounded-xl border border-slate-800 overflow-hidden">
                <div class="bg-slate-900/90 border-b border-slate-800 p-2.5 px-4 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500/80"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-yellow-500/80"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500/80"></span>
                        <span class="text-xs font-mono text-slate-400 ml-2">
                            {{ ($challenge['language'] ?? 'php') === 'sql' ? 'query.sql' : 'solution.php' }}
                        </span>
                    </div>

                    <button type="button" @click="runCode()" :disabled="running" class="inline-flex items-center px-3.5 py-1.5 rounded border border-emerald-500 text-xs font-semibold text-white bg-emerald-600 hover:bg-emerald-500 disabled:opacity-50 transition-all">
                        <svg x-show="!running" class="w-3.5 h-3.5 mr-1.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        <svg x-show="running" class="w-3.5 h-3.5 mr-1.5 animate-spin text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        <span x-show="!running" x-text="lang === 'id' ? 'Jalankan Query & Test' : 'Run & Test'"></span>
                        <span x-show="running">Evaluating...</span>
                    </button>
                </div>

                <div class="p-3 bg-[#060910]">
                    <textarea x-model="code" rows="13" spellcheck="false" class="w-full bg-transparent font-mono text-xs text-slate-200 focus:outline-none leading-relaxed resize-none"></textarea>
                </div>
            </div>

            {{-- Execution Results Panel --}}
            <template x-if="results">
                <div class="bg-[#0e1422] p-4 rounded-xl border space-y-3" :class="{
                    'border-emerald-500/50 bg-emerald-950/20': results.status === 'all_passed',
                    'border-amber-500/50 bg-amber-950/20': results.status === 'partially_passed',
                    'border-red-500/50 bg-red-950/20': results.status === 'security_blocked' || results.status === 'error'
                }">
                    <div class="flex items-center justify-between border-b border-slate-800 pb-2.5">
                        <div class="flex items-center gap-2">
                            <span class="text-[11px] font-semibold uppercase tracking-wide px-2 py-0.5 rounded" :class="{
                                'bg-emerald-500/20 text-emerald-400': results.status === 'all_passed',
                                'bg-amber-500/20 text-amber-400': results.status === 'partially_passed',
                                'bg-red-500/20 text-red-400': results.status === 'security_blocked' || results.status === 'error'
                            }" x-text="results.status.replace('_', ' ')"></span>
                            <span class="text-xs font-semibold text-white" x-text="results.message"></span>
                        </div>
                        <div class="text-[11px] font-mono text-slate-400" x-text="results.execution_time_ms + ' ms'"></div>
                    </div>

                    <div class="space-y-2 pt-1 font-mono text-xs">
                        <template x-for="r in results.results" :key="r.test_case">
                            <div class="p-2.5 rounded bg-[#060910] border border-slate-800 space-y-1">
                                <div class="flex items-center justify-between text-[11px]">
                                    <span class="font-semibold text-slate-300">Evaluasi Case #<span x-text="r.test_case"></span></span>
                                    <span class="px-1.5 py-0.5 rounded text-[10px] font-semibold" :class="r.status === 'passed' ? 'bg-emerald-500/20 text-emerald-400' : 'bg-red-500/20 text-red-400'" x-text="r.status.toUpperCase()"></span>
                                </div>
                                <div class="text-[11px] text-emerald-400">Target Output: <pre class="text-slate-300 inline" x-text="r.expected"></pre></div>
                                <template x-if="r.actual !== undefined && r.actual !== null">
                                    <div class="text-[11px] text-slate-400">Hasil Output: <pre class="text-white inline" x-text="r.actual"></pre></div>
                                </template>
                                <template x-if="r.message">
                                    <div class="text-[11px] text-red-400">Pesan: <span x-text="r.message"></span></div>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </template>

        </div>

    </div>

    {{-- Google SSO Auth Modal --}}
    <div x-show="showAuthModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
        <div @click.away="showAuthModal = false" class="max-w-md w-full p-6 rounded-xl border border-slate-800 bg-[#0e1422] space-y-4 text-center shadow-2xl relative">
            <button type="button" @click="showAuthModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="w-10 h-10 rounded-xl bg-emerald-500/10 border border-emerald-500/30 mx-auto flex items-center justify-center text-emerald-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>

            <div class="space-y-1">
                <h3 class="text-base font-bold font-heading text-white">Login Diperlukan</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Masuk dengan akun Google untuk mengeksekusi kodingan & query sandbox di server.
                </p>
            </div>

            <div class="space-y-2 pt-2">
                <a href="{{ route('auth.google') }}" class="w-full inline-flex items-center justify-center gap-2 p-2.5 rounded-lg bg-white text-slate-900 hover:bg-slate-100 font-bold text-xs transition-all">
                    <svg class="w-4 h-4" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/></svg>
                    <span>Masuk dengan Google</span>
                </a>

                <a href="{{ route('auth.demo') }}" class="w-full inline-flex items-center justify-center p-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-300 hover:text-white hover:bg-slate-800 text-xs font-semibold transition-all">
                    <span>Quick Learner Demo Login</span>
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
