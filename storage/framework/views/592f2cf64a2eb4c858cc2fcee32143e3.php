<?php $__env->startSection('content'); ?>



<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10" x-data="{ 
    filterCategory: 'All', 
    solvedCount: 0,
    solvedSlugs: JSON.parse(localStorage.getItem('learn_solved_challenges') || '[]'),
    init() {
        this.solvedCount = this.solvedSlugs.length;
    }
}">

    
    <div class="text-center max-w-3xl mx-auto space-y-4 pt-6">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-slate-900 border border-slate-800 text-slate-300 text-xs font-medium">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span x-show="lang === 'id'">Platform Belajar Coding PHP Pemula & Clean Code</span>
            <span x-show="lang === 'en'">Interactive PHP Syntax & Code Sandbox for Beginners</span>
        </div>

        <h1 class="text-3xl sm:text-5xl font-extrabold font-heading text-white tracking-tight leading-tight">
            <span x-show="lang === 'id'">Belajar Coding PHP Pemula <span class="text-emerald-400">Secara Interaktif & Fun</span></span>
            <span x-show="lang === 'en'">Master PHP Coding <span class="text-emerald-400">Step by Step from Scratch</span></span>
        </h1>

        <p class="text-xs sm:text-sm text-slate-300 max-w-2xl mx-auto leading-relaxed">
            <span x-show="lang === 'id'">Latihan koding PHP pemula dari nol. Pelajari syntax dasar, manipulasi array, fungsi, OOP, hingga <strong class="text-emerald-400">SOLID principles</strong> pake instant test runner di browser. Gratis & tanpa install!</span>
            <span x-show="lang === 'en'">Practice syntax, arrays, OOP, and <strong class="text-emerald-400">SOLID principles</strong> with an interactive sandbox test engine right in your browser. Free & no installation required.</span>
        </p>

        
        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 max-w-md mx-auto flex items-center justify-between gap-4 text-xs">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="text-left">
                    <div class="font-bold text-white">
                        <span x-show="lang === 'id'">Progres Belajar Coding Kamu</span>
                        <span x-show="lang === 'en'">Your Learning Progress</span>
                    </div>
                    <div class="text-slate-400 text-[11px]">
                        <span x-text="solvedCount"></span> / <?php echo e(count($challenges)); ?> 
                        <span x-show="lang === 'id'">Modul Tuntas</span>
                        <span x-show="lang === 'en'">Solved</span>
                    </div>
                </div>
            </div>
            <div class="w-32 bg-slate-800 h-2 rounded-full overflow-hidden">
                <div class="bg-emerald-400 h-full transition-all duration-500" :style="'width: ' + Math.min(100, Math.round((solvedCount / <?php echo e(count($challenges)); ?>) * 100)) + '%'"></div>
            </div>
        </div>
    </div>

    
    <div class="flex flex-wrap items-center justify-center gap-2 text-xs">
        <button type="button" @click="filterCategory = 'All'" :class="filterCategory === 'All' ? 'bg-emerald-600 text-white font-bold border-emerald-500' : 'bg-slate-900 text-slate-400 hover:text-white border-slate-800'" class="px-3 py-1.5 rounded border transition-all">
            <span x-show="lang === 'id'">Semua Modul Belajar</span>
            <span x-show="lang === 'en'">All Topics</span>
        </button>
        <button type="button" @click="filterCategory = 'PHP Basics'" :class="filterCategory === 'PHP Basics' ? 'bg-emerald-600 text-white font-bold border-emerald-500' : 'bg-slate-900 text-slate-400 hover:text-white border-slate-800'" class="px-3 py-1.5 rounded border transition-all">
            PHP Basics Pemula
        </button>
        <button type="button" @click="filterCategory = 'Arrays & Manipulation'" :class="filterCategory === 'Arrays & Manipulation' ? 'bg-emerald-600 text-white font-bold border-emerald-500' : 'bg-slate-900 text-slate-400 hover:text-white border-slate-800'" class="px-3 py-1.5 rounded border transition-all">
            Array & Logic
        </button>
        <button type="button" @click="filterCategory = 'SOLID Architecture & OOP'" :class="filterCategory === 'SOLID Architecture & OOP' ? 'bg-emerald-600 text-white font-bold border-emerald-500' : 'bg-slate-900 text-slate-400 hover:text-white border-slate-800'" class="px-3 py-1.5 rounded border transition-all">
            SOLID & OOP PHP
        </button>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__currentLoopData = $challenges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div x-show="filterCategory === 'All' || filterCategory === '<?php echo e($ch['category']); ?>'" class="natural-card p-6 rounded-2xl border border-slate-800 flex flex-col justify-between space-y-4 hover:border-emerald-500/50 transition-all group">
            
            <div class="space-y-3">
                <div class="flex items-center justify-between gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-slate-900 border border-slate-800 text-emerald-400">
                        <?php echo e($ch['category']); ?>

                    </span>
                    <div class="flex items-center gap-1.5">
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded <?php echo e($ch['difficulty'] === 'Easy' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30' : 'bg-amber-500/10 text-amber-400 border border-amber-500/30'); ?>">
                            <?php echo e($ch['difficulty']); ?>

                        </span>
                        <span class="text-[10px] font-semibold text-slate-400 font-mono">+<?php echo e($ch['points']); ?> pts</span>
                    </div>
                </div>

                <h2 class="text-base font-bold font-heading text-white group-hover:text-emerald-400 transition-colors">
                    <span x-show="lang === 'id'"><?php echo e($ch['title_id']); ?></span>
                    <span x-show="lang === 'en'"><?php echo e($ch['title_en']); ?></span>
                </h2>

                <p class="text-slate-400 text-xs leading-relaxed line-clamp-3">
                    <span x-show="lang === 'id'"><?php echo e($ch['description_id']); ?></span>
                    <span x-show="lang === 'en'"><?php echo e($ch['description_en']); ?></span>
                </p>
            </div>

            <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between">
                <div class="flex items-center gap-1 text-[11px]" :class="solvedSlugs.includes('<?php echo e($ch['slug']); ?>') ? 'text-emerald-400 font-semibold' : 'text-slate-500'">
                    <template x-if="solvedSlugs.includes('<?php echo e($ch['slug']); ?>')">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Solved</span>
                        </span>
                    </template>
                    <template x-if="!solvedSlugs.includes('<?php echo e($ch['slug']); ?>')">
                        <span>Unsolved</span>
                    </template>
                </div>

                <a href="<?php echo e(route('challenge.show', $ch['slug'])); ?>" class="inline-flex items-center px-4 py-2 rounded border border-emerald-500/80 text-xs font-semibold text-white bg-emerald-600 hover:bg-emerald-500 transition-all">
                    <span x-show="lang === 'id'">Mulai Koding</span>
                    <span x-show="lang === 'en'">Solve Challenge</span>
                    <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Bagas\Priv\learn\resources\views/index.blade.php ENDPATH**/ ?>