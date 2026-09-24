<!-- Built by Bagas (Baprade) - Day 3: Master layout, Google SSO Auth controls, canvas background particle setup, and SEO optimizations - 28 Jul 2026 -->
<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <title><?php echo e($seo['title'] ?? config('learn_seo.title')); ?></title>
    <meta name="description" content="<?php echo e($seo['description'] ?? config('learn_seo.description')); ?>">
    <meta name="keywords" content="<?php echo e($seo['keywords'] ?? config('learn_seo.keywords')); ?>">
    <meta name="author" content="<?php echo e($seo['author'] ?? config('learn_seo.author')); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo e($seo['canonical_url'] ?? config('learn_seo.canonical_url')); ?>">

    
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo e($seo['site_name'] ?? config('learn_seo.site_name')); ?>">
    <meta property="og:title" content="<?php echo e($seo['title'] ?? config('learn_seo.title')); ?>">
    <meta property="og:description" content="<?php echo e($seo['description'] ?? config('learn_seo.description')); ?>">
    <meta property="og:url" content="<?php echo e($seo['canonical_url'] ?? config('learn_seo.canonical_url')); ?>">
    <meta property="og:image" content="<?php echo e($seo['og_image'] ?? config('learn_seo.og_image')); ?>">
    <meta property="og:locale" content="id_ID">

    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e($seo['title'] ?? config('learn_seo.title')); ?>">
    <meta name="twitter:description" content="<?php echo e($seo['description'] ?? config('learn_seo.description')); ?>">
    <meta name="twitter:image" content="<?php echo e($seo['og_image'] ?? config('learn_seo.og_image')); ?>">

    
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favico.ico')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('favico.ico')); ?>">
    <meta name="theme-color" content="#090d16">

    
    <?php if(!empty($jsonLd)): ?>
    <script type="application/ld+json">
    <?php echo $jsonLd; ?>

    </script>
    <?php endif; ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body x-data="{ 
    lang: localStorage.getItem('learn_lang') || 'id',
    mouseX: -600,
    mouseY: -600,
    setLang(l) {
        this.lang = l;
        localStorage.setItem('learn_lang', l);
    }
}" 
@mousemove.window="mouseX = $event.clientX; mouseY = $event.clientY"
@touchmove.window="if($event.touches.length) { mouseX = $event.touches[0].clientX; mouseY = $event.touches[0].clientY; }"
class="bg-[#090d16] text-slate-200 antialiased selection:bg-emerald-500 selection:text-white relative min-h-screen flex flex-col justify-between">

    
    <canvas id="bg-canvas" class="fixed inset-0 pointer-events-none z-0 opacity-40 md:opacity-60 transition-opacity duration-500"></canvas>

    
    <div class="pointer-events-none fixed inset-0 z-30 transition-opacity duration-300"
         :style="'background: radial-gradient(600px circle at ' + mouseX + 'px ' + mouseY + 'px, rgba(16, 185, 129, 0.08), transparent 80%)'">
    </div>

    
    <header class="fixed top-0 left-0 right-0 z-50 bg-[#090d16]/90 backdrop-blur-md border-b border-slate-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2.5 group">
                    <img src="<?php echo e(asset('favico.ico')); ?>" alt="Learn Baprade Logo" class="w-8 h-8 rounded object-contain bg-slate-900 border border-slate-800 p-0.5 shadow-sm group-hover:border-emerald-500/50 transition-all">
                    <span class="text-base sm:text-lg font-bold font-heading tracking-tight text-white">
                        Learn <span class="text-emerald-400">Baprade</span>
                    </span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-semibold hidden sm:inline-block">Code Sandbox for Beginners</span>
                </a>

                
                <nav class="hidden md:flex items-center gap-6 text-xs font-medium text-slate-300">
                    <a href="<?php echo e(route('home')); ?>" class="hover:text-emerald-400 transition-colors">
                        <span x-show="lang === 'id'">Katalog Tantangan</span>
                        <span x-show="lang === 'en'">Challenge Catalog</span>
                    </a>
                    <a href="<?php echo e(config('learn_seo.jasa_site')); ?>" target="_blank" rel="noopener" class="hover:text-emerald-400 transition-colors flex items-center gap-1">
                        <span x-show="lang === 'id'">Jasa Web & App</span>
                        <span x-show="lang === 'en'">Web Dev Services</span>
                    </a>
                    <a href="<?php echo e(config('learn_seo.personal_site')); ?>" target="_blank" rel="noopener" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1">
                        <span x-show="lang === 'id'">Portofolio (baprade.my.id)</span>
                        <span x-show="lang === 'en'">Portfolio (baprade.my.id)</span>
                        <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </nav>

                
                <div class="flex items-center gap-3">
                    
                    <div class="flex items-center p-0.5 bg-slate-900 border border-slate-800 rounded gap-0.5">
                        <button type="button" @click="setLang('id')" :class="lang === 'id' ? 'bg-emerald-600/90 text-white font-semibold' : 'text-slate-400 hover:text-white'" class="flex items-center gap-1.5 px-2 py-1 text-[11px] rounded transition-all">
                            <svg class="w-4 h-3 rounded-[2px] overflow-hidden shrink-0 shadow-xs" viewBox="0 0 640 480"><path fill="#e70011" d="M0 0h640v240H0z"/><path fill="#fff" d="M0 240h640v240H0z"/></svg>
                            <span>ID</span>
                        </button>
                        <button type="button" @click="setLang('en')" :class="lang === 'en' ? 'bg-emerald-600/90 text-white font-semibold' : 'text-slate-400 hover:text-white'" class="flex items-center gap-1.5 px-2 py-1 text-[11px] rounded transition-all">
                            <svg class="w-4 h-3 rounded-[2px] overflow-hidden shrink-0 shadow-xs" viewBox="0 0 640 480"><path fill="#012169" d="M0 0h640v480H0z"/><path fill="#fff" d="m75 0 245 180L565 0h75v55L395 240l245 185v55h-75L320 300 75 480H0v-55l245-185L0 55V0h75z"/><path fill="#C8102E" d="m0 0 285 210h60L640 0h-45L320 180 65 0H0zm0 480 285-210h60l295 210h-45L320 300 65 480H0z"/><path fill="#fff" d="M240 0h160v480H240zM0 160h640v160H0z"/><path fill="#C8102E" d="M267 0h106v480H267zM0 187h640v106H0z"/></svg>
                            <span>EN</span>
                        </button>
                    </div>

                    
                    <?php if(auth()->guard()->check()): ?>
                    <div x-data="{ userMenu: false }" class="relative">
                        <button type="button" @click="userMenu = !userMenu" class="flex items-center gap-2 p-1 rounded-lg bg-slate-900 border border-slate-800 hover:border-emerald-500/50 transition-all">
                            <img src="<?php echo e(auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=10b981&color=fff'); ?>" alt="<?php echo e(auth()->user()->name); ?>" class="w-6 h-6 rounded-full object-cover">
                            <span class="text-xs font-semibold text-white hidden sm:inline-block max-w-[100px] truncate"><?php echo e(auth()->user()->name); ?></span>
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div x-show="userMenu" @click.away="userMenu = false" x-collapse class="absolute right-0 mt-2 w-48 rounded-xl bg-slate-900 border border-slate-800 shadow-xl p-2 z-50 text-xs space-y-1">
                            <div class="px-3 py-1.5 border-b border-slate-800 text-slate-400">
                                <div class="font-bold text-white truncate"><?php echo e(auth()->user()->name); ?></div>
                                <div class="text-[10px] truncate"><?php echo e(auth()->user()->email); ?></div>
                            </div>
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="w-full text-left px-3 py-1.5 rounded hover:bg-red-500/10 text-red-400 font-semibold transition-colors flex items-center gap-2">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    <span>Logout Session</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php else: ?>
                    <a href="<?php echo e(route('auth.google')); ?>" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded bg-white text-slate-900 hover:bg-slate-100 text-xs font-bold transition-all shadow-sm">
                        <svg class="w-4 h-4" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/></svg>
                        <span class="hidden sm:inline">Login Google</span>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    
    <main class="relative z-10 pt-20 pb-12 flex-1">
        <?php if(session('success')): ?>
        <div class="max-w-7xl mx-auto px-4 mb-4">
            <div class="p-3 rounded-xl bg-emerald-950/60 border border-emerald-500/40 text-emerald-400 text-xs font-semibold flex items-center justify-between">
                <span><?php echo e(session('success')); ?></span>
            </div>
        </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
        <div class="max-w-7xl mx-auto px-4 mb-4">
            <div class="p-3 rounded-xl bg-red-950/60 border border-red-500/40 text-red-400 text-xs font-semibold flex items-center justify-between">
                <span><?php echo e(session('error')); ?></span>
            </div>
        </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="bg-slate-950 border-t border-slate-900 py-6 relative z-10 text-xs text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <img src="<?php echo e(asset('favico.ico')); ?>" alt="Learn Baprade Logo" class="w-5 h-5 rounded object-contain">
                <span>&copy; <?php echo e(date('Y')); ?> Learn Baprade by Bagas. Built with Laravel 13 & SOLID Architecture.</span>
            </div>
            <div class="flex items-center gap-4 text-slate-400">
                <a href="<?php echo e(config('learn_seo.personal_site')); ?>" target="_blank" class="hover:text-white transition-colors">baprade.my.id</a>
                <a href="<?php echo e(config('learn_seo.jasa_site')); ?>" target="_blank" class="hover:text-white transition-colors">jasa.baprade.my.id</a>
            </div>
        </div>
    </footer>

    
    <script>
        (function() {
            const canvas = document.getElementById('bg-canvas');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            let width, height;
            let particles = [];
            let mouse = { x: -1000, y: -1000, radius: 180 };

            function resize() {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
                initParticles();
            }

            function initParticles() {
                particles = [];
                const count = Math.min(Math.floor((width * height) / 22000), window.innerWidth < 768 ? 22 : 45);
                for (let i = 0; i < count; i++) {
                    particles.push({
                        x: Math.random() * width,
                        y: Math.random() * height,
                        vx: (Math.random() - 0.5) * 0.4,
                        vy: (Math.random() - 0.5) * 0.4,
                        radius: Math.random() * 1.5 + 1,
                        baseAlpha: Math.random() * 0.3 + 0.15
                    });
                }
            }

            function onMouseMove(e) {
                mouse.x = e.clientX;
                mouse.y = e.clientY;
            }

            window.addEventListener('resize', resize);
            window.addEventListener('mousemove', onMouseMove);
            resize();

            function animate() {
                ctx.clearRect(0, 0, width, height);

                for (let i = 0; i < particles.length; i++) {
                    let p = particles[i];
                    p.x += p.vx;
                    p.y += p.vy;

                    if (p.x < 0 || p.x > width) p.vx *= -1;
                    if (p.y < 0 || p.y > height) p.vy *= -1;

                    let dx = mouse.x - p.x;
                    let dy = mouse.y - p.y;
                    let dist = Math.sqrt(dx * dx + dy * dy);
                    let alpha = p.baseAlpha;

                    if (dist < mouse.radius) {
                        const force = (1 - dist / mouse.radius);
                        alpha = Math.min(0.8, p.baseAlpha + force * 0.5);
                        p.x -= (dx / dist) * force * 0.6;
                        p.y -= (dy / dist) * force * 0.6;
                    }

                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                    ctx.fillStyle = 'rgba(16, 185, 129, ' + alpha + ')';
                    ctx.fill();

                    for (let j = i + 1; j < particles.length; j++) {
                        let p2 = particles[j];
                        let pdx = p.x - p2.x;
                        let pdy = p.y - p2.y;
                        let pdist = Math.sqrt(pdx * pdx + pdy * pdy);
                        const maxDist = window.innerWidth < 768 ? 100 : 140;

                        if (pdist < maxDist) {
                            let lineAlpha = (1 - pdist / maxDist) * 0.15;
                            ctx.beginPath();
                            ctx.moveTo(p.x, p.y);
                            ctx.lineTo(p2.x, p2.y);
                            ctx.strokeStyle = 'rgba(16, 185, 129, ' + lineAlpha + ')';
                            ctx.lineWidth = 0.8;
                            ctx.stroke();
                        }
                    }
                }

                requestAnimationFrame(animate);
            }

            requestAnimationFrame(animate);
        })();
    </script>
</body>
</html>
<?php /**PATH D:\Bagas\Priv\learn\resources\views/layouts/app.blade.php ENDPATH**/ ?>