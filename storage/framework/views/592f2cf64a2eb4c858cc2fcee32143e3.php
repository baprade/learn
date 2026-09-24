<?php $__env->startSection('content'); ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8" x-data="{ 
    track: 'all',
    filterCategory: 'All', 
    solvedCount: 0,
    solvedSlugs: JSON.parse(localStorage.getItem('learn_solved_challenges') || '[]'),
    init() {
        this.solvedCount = this.solvedSlugs.length;
    }
}">

    
    <div class="max-w-3xl mx-auto text-center space-y-3 pt-4">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-slate-900 border border-slate-800 text-slate-300 text-xs font-medium">
            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
            <span x-show="lang === 'id'">Platform Latihan Coding PHP & Query SQL Interaktif</span>
            <span x-show="lang === 'en'">Interactive PHP & SQL Coding Sandbox</span>
        </div>

        <h1 class="text-3xl sm:text-4xl font-extrabold font-heading text-white tracking-tight">
            <span x-show="lang === 'id'">Latihan Coding PHP & SQL <span class="text-emerald-400">Langsung di Browser</span></span>
            <span x-show="lang === 'en'">Practice PHP & SQL <span class="text-emerald-400">Directly in Browser</span></span>
        </h1>

        <p class="text-xs sm:text-sm text-slate-400 max-w-2xl mx-auto leading-relaxed">
            <span x-show="lang === 'id'">Asah logika koding, manipulasi array, OOP, dan query database (SELECT, GROUP BY, INNER JOIN) dengan instant evaluator engine. Gratis tanpa install.</span>
            <span x-show="lang === 'en'">Master coding logic, arrays, OOP, and database querying (SELECT, GROUP BY, INNER JOIN) with our sandbox test runner. Free and no setup needed.</span>
        </p>

        
        <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 max-w-md mx-auto flex items-center justify-between gap-4 text-xs">
            <div class="flex items-center gap-2.5">
                <div class="w-7 h-7 rounded bg-emerald-500/10 border border-emerald-500/30 flex items-center justify-center text-emerald-400 font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="text-left">
                    <div class="font-semibold text-white">
                        <span x-show="lang === 'id'">Progres Latihan</span>
                        <span x-show="lang === 'en'">Your Progress</span>
                    </div>
                    <div class="text-slate-400 text-[11px]">
                        <span x-text="solvedCount"></span> / <?php echo e(count($challenges)); ?> 
                        <span x-show="lang === 'id'">Tantangan Selesai</span>
                        <span x-show="lang === 'en'">Challenges Solved</span>
                    </div>
                </div>
            </div>
            <div class="w-28 bg-slate-800 h-2 rounded-full overflow-hidden">
                <div class="bg-emerald-400 h-full transition-all duration-300" :style="'width: ' + Math.min(100, Math.round((solvedCount / <?php echo e(count($challenges)); ?>) * 100)) + '%'"></div>
            </div>
        </div>
    </div>

    
    <div class="flex flex-col sm:flex-row items-center justify-between gap-3 border-b border-slate-800/80 pb-4">
        
        <div class="flex items-center p-1 bg-slate-900 border border-slate-800 rounded-lg gap-1 text-xs">
            <button type="button" @click="track = 'all'; filterCategory = 'All'" :class="track === 'all' ? 'bg-slate-800 text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white'" class="px-3 py-1.5 rounded transition-all">
                <span x-show="lang === 'id'">Semua Track</span>
                <span x-show="lang === 'en'">All Tracks</span>
            </button>
            <button type="button" @click="track = 'sql'; filterCategory = 'All'" :class="track === 'sql' ? 'bg-emerald-600 text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white'" class="px-3 py-1.5 rounded transition-all flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400"></span>
                <span>SQL Database</span>
            </button>
            <button type="button" @click="track = 'php'; filterCategory = 'All'" :class="track === 'php' ? 'bg-emerald-600 text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white'" class="px-3 py-1.5 rounded transition-all flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                <span>PHP Language</span>
            </button>
        </div>

        
        <div class="flex flex-wrap items-center gap-1.5 text-[11px]">
            <button type="button" @click="filterCategory = 'All'" :class="filterCategory === 'All' ? 'bg-slate-800 text-white border-slate-700 font-semibold' : 'bg-transparent text-slate-400 hover:text-white border-transparent'" class="px-2.5 py-1 rounded border transition-all">
                Semua Kategori
            </button>
            <template x-if="track === 'all' || track === 'sql'">
                <button type="button" @click="filterCategory = 'SQL Basics & Querying'" :class="filterCategory === 'SQL Basics & Querying' ? 'bg-slate-800 text-white border-slate-700 font-semibold' : 'bg-transparent text-slate-400 hover:text-white border-transparent'" class="px-2.5 py-1 rounded border transition-all">
                    SQL Basics
                </button>
            </template>
            <template x-if="track === 'all' || track === 'sql'">
                <button type="button" @click="filterCategory = 'SQL Joins & Relational'" :class="filterCategory === 'SQL Joins & Relational' ? 'bg-slate-800 text-white border-slate-700 font-semibold' : 'bg-transparent text-slate-400 hover:text-white border-transparent'" class="px-2.5 py-1 rounded border transition-all">
                    SQL Joins
                </button>
            </template>
            <template x-if="track === 'all' || track === 'php'">
                <button type="button" @click="filterCategory = 'PHP Basics'" :class="filterCategory === 'PHP Basics' ? 'bg-slate-800 text-white border-slate-700 font-semibold' : 'bg-transparent text-slate-400 hover:text-white border-transparent'" class="px-2.5 py-1 rounded border transition-all">
                    PHP Basics
                </button>
            </template>
            <template x-if="track === 'all' || track === 'php'">
                <button type="button" @click="filterCategory = 'SOLID Architecture & OOP'" :class="filterCategory === 'SOLID Architecture & OOP' ? 'bg-slate-800 text-white border-slate-700 font-semibold' : 'bg-transparent text-slate-400 hover:text-white border-transparent'" class="px-2.5 py-1 rounded border transition-all">
                    SOLID & OOP
                </button>
            </template>
        </div>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php $__currentLoopData = $challenges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div x-show="(track === 'all' || track === '<?php echo e($ch['language'] ?? 'php'); ?>') && (filterCategory === 'All' || filterCategory === '<?php echo e($ch['category']); ?>')" 
             class="bg-[#0e1422] p-5 rounded-xl border border-slate-800 hover:border-slate-700 flex flex-col justify-between space-y-4 transition-all">
            
            <div class="space-y-2.5">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-1.5">
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded font-mono <?php echo e(($ch['language'] ?? 'php') === 'sql' ? 'bg-cyan-950 text-cyan-400 border border-cyan-800' : 'bg-indigo-950 text-indigo-400 border border-indigo-800'); ?>">
                            <?php echo e(strtoupper($ch['language'] ?? 'php')); ?>

                        </span>
                        <span class="text-[10px] text-slate-400 px-1.5 py-0.5 rounded bg-slate-900 border border-slate-800">
                            <?php echo e($ch['category']); ?>

                        </span>
                    </div>

                    <div class="flex items-center gap-1.5">
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded <?php echo e($ch['difficulty'] === 'Easy' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/30' : 'bg-amber-500/10 text-amber-400 border border-amber-500/30'); ?>">
                            <?php echo e($ch['difficulty']); ?>

                        </span>
                        <span class="text-[10px] text-slate-400 font-mono">+<?php echo e($ch['points']); ?> pts</span>
                    </div>
                </div>

                <h2 class="text-sm font-bold font-heading text-white">
                    <span x-show="lang === 'id'"><?php echo e($ch['title_id']); ?></span>
                    <span x-show="lang === 'en'"><?php echo e($ch['title_en']); ?></span>
                </h2>

                <p class="text-slate-400 text-xs leading-relaxed line-clamp-3">
                    <span x-show="lang === 'id'"><?php echo e($ch['summary_id'] ?? ''); ?></span>
                    <span x-show="lang === 'en'"><?php echo e($ch['summary_en'] ?? ''); ?></span>
                </p>
            </div>

            <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between">
                <div class="text-[11px]" :class="solvedSlugs.includes('<?php echo e($ch['slug']); ?>') ? 'text-emerald-400 font-semibold' : 'text-slate-500'">
                    <span x-show="solvedSlugs.includes('<?php echo e($ch['slug']); ?>')" class="inline-flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Solved</span>
                    </span>
                    <span x-show="!solvedSlugs.includes('<?php echo e($ch['slug']); ?>')">Unsolved</span>
                </div>

                <a href="<?php echo e(route('challenge.show', $ch['slug'])); ?>" class="inline-flex items-center px-3.5 py-1.5 rounded border border-emerald-500/80 text-xs font-semibold text-white bg-emerald-600 hover:bg-emerald-500 transition-all">
                    <span x-show="lang === 'id'">Buka Latihan</span>
                    <span x-show="lang === 'en'">Solve</span>
                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Bagas\Priv\learn\resources\views/index.blade.php ENDPATH**/ ?>