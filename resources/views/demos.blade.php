<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSS Features — Before & After</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/demos.css'])
</head>

<body class="bg-surface text-text min-h-screen p-6 lg:p-10 font-sans">

    <header class="max-w-5xl mx-auto mb-8">
        <h1 class="text-3xl font-bold tracking-tight">Modern CSS Features</h1>
        <p class="text-text-muted mt-1">Before & After — see how new CSS simplifies your code</p>
    </header>

    <main class="demo-tabs max-w-5xl mx-auto">
        {{-- Tab radios --}}
        <input type="radio" name="tab" id="tab-has" checked>
        <input type="radio" name="tab" id="tab-container">
        <input type="radio" name="tab" id="tab-anchor">
        <input type="radio" name="tab" id="tab-clamp">
        <input type="radio" name="tab" id="tab-lightdark">

        {{-- Tab labels --}}
        <nav class="flex flex-wrap gap-1 border-b border-border mb-0">
            <label for="tab-has" class="visited"><code>:has()</code></label>
            <label for="tab-container">Container Queries</label>
            <label for="tab-anchor">Anchor Positioning</label>
            <label for="tab-clamp"><code>clamp()</code></label>
            <label for="tab-lightdark"><code>light-dark()</code></label>
        </nav>

        {{-- Tab content --}}
        <div class="demo-content bg-surface border border-border border-t-0 rounded-b-xl p-6">

            {{-- ===== 1. :has() ===== --}}
            <section class="demo-section demo-has">
                <h2 class="text-xl font-bold mb-1">:has() — Parent Selector</h2>
                <p class="text-text-muted mb-6 text-sm">Style a parent based on its children's state — no JavaScript required.</p>

                {{-- Example 1: Checkbox selection --}}
                <h3 class="text-sm font-semibold text-text-muted uppercase tracking-wide mb-3">Card Selection</h3>
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    {{-- BEFORE --}}
                    <div class="panel">
                        <div class="panel-header before">Before — JavaScript</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-3">Click the checkbox — JS toggles <code class="bg-code-bg text-code-text px-1 rounded text-xs">.is-selected</code> on the parent card.</p>

                            <div class="has-before-card mb-4" id="js-card">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="checkbox" id="js-checkbox" class="w-4 h-4 accent-accent">
                                    <span class="card-title font-semibold">Select this item</span>
                                </label>
                                <p class="text-sm text-text-muted mt-2">Card highlights when checked</p>
                            </div>

                            <div class="code-block text-xs">// JavaScript required
checkbox.addEventListener('change', () => {
    card.classList.toggle('is-selected',
        checkbox.checked);
});</div>
                        </div>
                    </div>

                    {{-- AFTER --}}
                    <div class="panel">
                        <div class="panel-header after">After — Pure CSS :has()</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-3">Same result — zero JavaScript. CSS detects the checked child.</p>

                            <div class="has-after-card mb-4">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input type="checkbox" class="w-4 h-4 accent-accent">
                                    <span class="card-title font-semibold">Select this item</span>
                                </label>
                                <p class="text-sm text-text-muted mt-2">Card highlights when checked</p>
                            </div>

                            <div class="code-block text-xs">/* No JavaScript! */
.card:has(input:checked) {
    border-color: var(--accent);
    background: var(--accent-light);
}</div>
                        </div>
                    </div>
                </div>

                {{-- Example 2: Category filter --}}
                <h3 class="text-sm font-semibold text-text-muted uppercase tracking-wide mb-3">Category Filter</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- BEFORE --}}
                    <div class="panel">
                        <div class="panel-header before">Before — JavaScript</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-3">JS listens for clicks, loops items, toggles classes to show/hide matches.</p>

                            <div class="filter-before-container" id="js-filter">
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <button class="filter-before-btn active" data-filter="all">All</button>
                                    <button class="filter-before-btn" data-filter="css">CSS</button>
                                    <button class="filter-before-btn" data-filter="js">JS</button>
                                    <button class="filter-before-btn" data-filter="html">HTML</button>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <span class="filter-before-tag" data-tag="css">Flexbox</span>
                                    <span class="filter-before-tag" data-tag="js">React</span>
                                    <span class="filter-before-tag" data-tag="css">Grid</span>
                                    <span class="filter-before-tag" data-tag="html">Dialog</span>
                                    <span class="filter-before-tag" data-tag="js">Vue</span>
                                    <span class="filter-before-tag" data-tag="css">:has()</span>
                                    <span class="filter-before-tag" data-tag="html">Popover</span>
                                </div>
                            </div>

                            <div class="code-block text-xs mt-4">// JavaScript required
btns.forEach(btn => {
    btn.addEventListener('click', () => {
        const filter = btn.dataset.filter;
        items.forEach(item => {
            item.classList.toggle('dimmed',
                filter !== 'all'
                && item.dataset.tag !== filter);
        });
    });
});</div>
                        </div>
                    </div>

                    {{-- AFTER --}}
                    <div class="panel">
                        <div class="panel-header after">After — Pure CSS :has()</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-3">Click a filter — <code class="bg-code-bg text-code-text px-1 rounded text-xs">:has()</code> detects which radio is checked and dims non-matching items.</p>

                            <div class="filter-after-container">
                                <input type="radio" name="cat-filter" id="filter-all" checked class="hidden">
                                <input type="radio" name="cat-filter" id="filter-css" class="hidden">
                                <input type="radio" name="cat-filter" id="filter-js" class="hidden">
                                <input type="radio" name="cat-filter" id="filter-html" class="hidden">

                                <div class="flex flex-wrap gap-2 mb-3">
                                    <label for="filter-all" class="filter-after-btn">All</label>
                                    <label for="filter-css" class="filter-after-btn">CSS</label>
                                    <label for="filter-js" class="filter-after-btn">JS</label>
                                    <label for="filter-html" class="filter-after-btn">HTML</label>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <span class="filter-tag" data-tag="css">Flexbox</span>
                                    <span class="filter-tag" data-tag="js">React</span>
                                    <span class="filter-tag" data-tag="css">Grid</span>
                                    <span class="filter-tag" data-tag="html">Dialog</span>
                                    <span class="filter-tag" data-tag="js">Vue</span>
                                    <span class="filter-tag" data-tag="css">:has()</span>
                                    <span class="filter-tag" data-tag="html">Popover</span>
                                </div>
                            </div>

                            <div class="code-block text-xs mt-4">/* No JavaScript! */
.container:has(#filter-css:checked)
    [data-tag]:not([data-tag="css"]) {
    opacity: 0.2;
}
/* One rule per filter — done. */</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ===== 2. Container Queries ===== --}}
            <section class="demo-section demo-container">
                <h2 class="text-xl font-bold mb-1">Container Queries</h2>
                <p class="text-text-muted mb-6 text-sm">Components adapt to their container's width, not the viewport. Drag the handle to resize.</p>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- BEFORE --}}
                    <div class="panel">
                        <div class="panel-header before">Before — Media Queries</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-3">Cards only respond to the viewport width — useless inside a sidebar.</p>

                            <div class="cq-before-grid">
                                <div class="cq-before-card"><strong>Card A</strong><p class="text-sm text-text-muted mt-1">Always same layout</p></div>
                                <div class="cq-before-card"><strong>Card B</strong><p class="text-sm text-text-muted mt-1">regardless of parent</p></div>
                            </div>

                            <div class="code-block text-xs mt-4">@media (min-width: 600px) {
    .grid { grid-template-columns: 1fr 1fr; }
}
/* Responds to viewport only */</div>
                        </div>
                    </div>

                    {{-- AFTER --}}
                    <div class="panel">
                        <div class="panel-header after">After — @container</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-3">Resize the dashed box — cards reflow based on <em>container</em> width.</p>

                            <div class="resizable-wrapper cq-container" style="width: 100%;">
                                <div class="cq-after-grid">
                                    <div class="cq-after-card"><strong>Card A</strong><p class="text-sm text-text-muted mt-1">Adapts to container</p></div>
                                    <div class="cq-after-card"><strong>Card B</strong><p class="text-sm text-text-muted mt-1">Not viewport!</p></div>
                                    <div class="cq-after-card"><strong>Card C</strong><p class="text-sm text-text-muted mt-1">Drag to resize →</p></div>
                                </div>
                            </div>

                            <div class="code-block text-xs mt-4">.wrapper { container-type: inline-size; }

@container (min-width: 400px) {
    .grid { grid-template-columns: 1fr 1fr; }
}
/* Responds to parent container! */</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ===== 3. Anchor Positioning ===== --}}
            <section class="demo-section demo-anchor">
                <h2 class="text-xl font-bold mb-1">Anchor Positioning</h2>
                <p class="text-text-muted mb-6 text-sm">Attach elements to other elements declaratively — no offset math needed.</p>

                {{-- Tooltip example --}}
                <h3 class="text-sm font-semibold text-text-muted uppercase tracking-wide mb-3">Tooltip</h3>
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    {{-- BEFORE --}}
                    <div class="panel">
                        <div class="panel-header before">Before — Manual Positioning</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-4">Tooltip requires a wrapper, <code class="bg-code-bg text-code-text px-1 rounded text-xs">position: relative</code>, and hardcoded offsets.</p>

                            <div class="flex justify-center py-8">
                                <div class="anchor-before-wrapper">
                                    <button class="px-4 py-2 bg-accent text-white rounded-lg font-medium hover:opacity-90 transition-opacity">
                                        Hover me
                                    </button>
                                    <div class="anchor-before-tooltip">Old-school tooltip!</div>
                                </div>
                            </div>

                            <div class="code-block text-xs">.wrapper { position: relative; }
.tooltip {
    position: absolute;
    bottom: calc(100% + 8px);
    left: 50%;
    transform: translateX(-50%);
}
/* Fragile, breaks on scroll/resize */</div>
                        </div>
                    </div>

                    {{-- AFTER --}}
                    <div class="panel">
                        <div class="panel-header after">After — CSS Anchor Positioning</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-4">No wrapper needed. The tooltip finds its anchor by name.</p>

                            <div class="flex justify-center py-8">
                                <button class="anchor-trigger px-4 py-2 bg-accent text-white rounded-lg font-medium hover:opacity-90 transition-opacity">
                                    Hover me
                                </button>
                                <div class="anchor-tooltip">Anchored tooltip!</div>
                            </div>

                            <div class="code-block text-xs">.button { anchor-name: --my-anchor; }
.tooltip {
    position: fixed;
    position-anchor: --my-anchor;
    bottom: anchor(top);
    left: anchor(center);
}
/* Declarative, no wrapper needed! */</div>
                        </div>
                    </div>
                </div>

                {{-- Popover menu example --}}
                <h3 class="text-sm font-semibold text-text-muted uppercase tracking-wide mb-3">Popover Menu</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- BEFORE --}}
                    <div class="panel">
                        <div class="panel-header before">Before — JS Toggle + Absolute Positioning</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-4">JS to toggle visibility, a wrapper for positioning, and manual offset calc.</p>

                            <div class="flex justify-center py-6">
                                <div class="popover-before-wrapper">
                                    <button id="popover-before-btn" class="px-4 py-2 bg-accent text-white rounded-lg font-medium hover:opacity-90 transition-opacity">
                                        Actions ▾
                                    </button>
                                    <div id="popover-before-menu" class="popover-before-menu">
                                        <a href="#" class="popover-menu-item">Edit</a>
                                        <a href="#" class="popover-menu-item">Duplicate</a>
                                        <a href="#" class="popover-menu-item popover-menu-item--danger">Delete</a>
                                    </div>
                                </div>
                            </div>

                            <div class="code-block text-xs">// JavaScript required
btn.addEventListener('click', () => {
    menu.classList.toggle('is-open');
});
document.addEventListener('click', (e) => {
    if (!wrapper.contains(e.target))
        menu.classList.remove('is-open');
});

/* CSS */
.wrapper { position: relative; }
.menu {
    position: absolute;
    top: calc(100% + 4px);
    right: 0;
    display: none;
}
.menu.is-open { display: block; }</div>
                        </div>
                    </div>

                    {{-- AFTER --}}
                    <div class="panel">
                        <div class="panel-header after">After — Popover API + Anchor Positioning</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-4">The Popover API handles open/close & light-dismiss. Anchor positioning handles placement. Zero JS.</p>

                            <div class="flex justify-center py-6">
                                <button class="popover-anchor-trigger px-4 py-2 bg-accent text-white rounded-lg font-medium hover:opacity-90 transition-opacity" popovertarget="popover-after-menu">
                                    Actions ▾
                                </button>
                                <div id="popover-after-menu" popover class="popover-after-menu">
                                    <a href="#" class="popover-menu-item">Edit</a>
                                    <a href="#" class="popover-menu-item">Duplicate</a>
                                    <a href="#" class="popover-menu-item popover-menu-item--danger">Delete</a>
                                </div>
                            </div>

                            <div class="code-block text-xs">/* Zero JavaScript! */
.button {
    anchor-name: --actions-btn;
}
[popover] {
    position: fixed;
    position-anchor: --actions-btn;
    top: anchor(bottom);
    left: anchor(left);
    margin: 4px 0 0;
}

&lt;button popovertarget="menu">Actions&lt;/button>
&lt;div id="menu" popover>...&lt;/div>
/* Browser handles open, close & light-dismiss */</div>
                        </div>
                    </div>
                </div>

                <p class="text-xs text-text-muted mt-4 italic">Note: Anchor Positioning is supported in Chrome/Edge. Firefox & Safari support is in progress.</p>
            </section>

            {{-- ===== 4. clamp() ===== --}}
            <section class="demo-section demo-clamp">
                <h2 class="text-xl font-bold mb-1">clamp() & CSS Value Functions</h2>
                <p class="text-text-muted mb-6 text-sm">Fluid typography and spacing in a single line — no breakpoints required.</p>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- BEFORE --}}
                    <div class="panel">
                        <div class="panel-header before">Before — Multiple Breakpoints</div>
                        <div class="panel-body bg-surface-alt">
                            <h2 class="clamp-before-heading font-bold mb-2">Fluid Heading</h2>
                            <p class="clamp-before-text">This text jumps between fixed sizes at specific breakpoints. Resize the window to see the steps.</p>

                            <div class="clamp-before-spacing flex flex-wrap bg-white/50 rounded-lg mt-4">
                                <div class="bg-accent/10 rounded px-3 py-1 text-sm">Fixed</div>
                                <div class="bg-accent/10 rounded px-3 py-1 text-sm">Spacing</div>
                                <div class="bg-accent/10 rounded px-3 py-1 text-sm">Too!</div>
                            </div>

                            <div class="code-block text-xs mt-4">h2 { font-size: 1rem; }

@media (min-width: 480px) {
    h2 { font-size: 1.25rem; }
}
@media (min-width: 768px) {
    h2 { font-size: 1.75rem; }
}
@media (min-width: 1024px) {
    h2 { font-size: 2.25rem; }
}
/* 4 declarations for one property! */</div>
                        </div>
                    </div>

                    {{-- AFTER --}}
                    <div class="panel">
                        <div class="panel-header after">After — clamp(), min(), max()</div>
                        <div class="panel-body bg-surface-alt">
                            <h2 class="clamp-after-heading font-bold mb-2">Fluid Heading</h2>
                            <p class="clamp-after-text">This text scales smoothly between min and max. One line does the work of four media queries.</p>

                            <div class="clamp-after-spacing flex flex-wrap bg-white/50 rounded-lg mt-4">
                                <div class="bg-accent/10 rounded px-3 py-1 text-sm">Fluid</div>
                                <div class="bg-accent/10 rounded px-3 py-1 text-sm">Spacing</div>
                                <div class="bg-accent/10 rounded px-3 py-1 text-sm">Too!</div>
                            </div>

                            <div class="code-block text-xs mt-4">h2 {
    font-size: clamp(1rem, 2.5vw + 0.5rem, 2.5rem);
}
.box {
    padding: min(3rem, 5vw);
    gap: clamp(0.5rem, 2vw, 2rem);
}
/* One line. Smooth. Done. */</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ===== 5. light-dark() ===== --}}
            <section class="demo-section demo-lightdark">
                <h2 class="text-xl font-bold mb-1">light-dark() Function</h2>
                <p class="text-text-muted mb-6 text-sm">One declaration per property instead of duplicated media query blocks.</p>

                <div class="grid md:grid-cols-2 gap-6">
                    {{-- BEFORE --}}
                    <div class="panel">
                        <div class="panel-header before">Before — Duplicated @media Blocks</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-3">Every property needs a duplicate inside <code class="bg-code-bg text-code-text px-1 rounded text-xs">@media (prefers-color-scheme: dark)</code>.</p>

                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div>
                                    <p class="text-xs text-text-muted mb-1 font-medium">Light</p>
                                    <div class="bg-white text-gray-900 border border-gray-200 p-3 rounded-lg">
                                        <span class="inline-block bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs font-medium mb-1">Badge</span>
                                        <p class="text-sm">Card content</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-xs text-text-muted mb-1 font-medium">Dark</p>
                                    <div class="bg-[#1a1a2e] text-gray-200 border border-[#333355] p-3 rounded-lg">
                                        <span class="inline-block bg-[#2a2a4e] text-[#b0b0d0] px-2 py-0.5 rounded text-xs font-medium mb-1">Badge</span>
                                        <p class="text-sm">Card content</p>
                                    </div>
                                </div>
                            </div>

                            <div class="code-block text-xs">.card {
    background: #ffffff;
    color: #1a1a1a;
    border: 1px solid #e0e0e0;
}
@media (prefers-color-scheme: dark) {
    .card {
        background: #1a1a2e;
        color: #e0e0e0;
        border-color: #333355;
    }
}
/* Every property duplicated! */</div>
                        </div>
                    </div>

                    {{-- AFTER --}}
                    <div class="panel">
                        <div class="panel-header after">After — light-dark()</div>
                        <div class="panel-body bg-surface-alt">
                            <p class="text-sm text-text-muted mb-3">Toggle the scheme to see both modes — one declaration handles both.</p>

                            <div class="flex gap-2 mb-4">
                                <button onclick="document.getElementById('ld-demo').className='ld-after-area force-light'" class="px-3 py-1 text-sm bg-white border border-border rounded-lg hover:bg-surface-alt transition-colors">Light</button>
                                <button onclick="document.getElementById('ld-demo').className='ld-after-area force-dark'" class="px-3 py-1 text-sm bg-code-bg text-code-text border border-border rounded-lg hover:opacity-80 transition-opacity">Dark</button>
                            </div>

                            <div id="ld-demo" class="ld-after-area force-light">
                                <div class="ld-after-card">
                                    <span class="badge inline-block px-2 py-0.5 rounded text-xs font-medium mb-1">Badge</span>
                                    <p class="text-sm">Card content</p>
                                </div>
                            </div>

                            <div class="code-block text-xs mt-4">:root { color-scheme: light dark; }
.card {
    background: light-dark(#fff, #1a1a2e);
    color: light-dark(#1a1a1a, #e0e0e0);
    border: 1px solid light-dark(#e0e0e0, #333);
}
/* One block. Both themes. Done. */</div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    {{-- Mark tabs as visited when clicked --}}
    <script>
        document.querySelectorAll('.demo-tabs nav label').forEach(label => {
            label.addEventListener('click', () => label.classList.add('visited'));
        });
    </script>

    {{-- Minimal JS for the "before" demos --}}
    <script>
        // :has() before demo — JS toggles parent class
        const jsCheckbox = document.getElementById('js-checkbox');
        const jsCard = document.getElementById('js-card');
        if (jsCheckbox && jsCard) {
            jsCheckbox.addEventListener('change', () => {
                jsCard.classList.toggle('is-selected', jsCheckbox.checked);
            });
        }

        // Category filter before demo — JS dims non-matching tags
        const jsFilter = document.getElementById('js-filter');
        if (jsFilter) {
            jsFilter.querySelectorAll('.filter-before-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    jsFilter.querySelectorAll('.filter-before-btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    const filter = btn.dataset.filter;
                    jsFilter.querySelectorAll('.filter-before-tag').forEach(tag => {
                        tag.classList.toggle('dimmed', filter !== 'all' && tag.dataset.tag !== filter);
                    });
                });
            });
        }

        // Popover before demo — JS toggles menu + outside-click dismiss
        const popoverBtn = document.getElementById('popover-before-btn');
        const popoverMenu = document.getElementById('popover-before-menu');
        const popoverWrapper = popoverBtn?.closest('.popover-before-wrapper');
        if (popoverBtn && popoverMenu) {
            popoverBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                popoverMenu.classList.toggle('is-open');
            });
            document.addEventListener('click', (e) => {
                if (popoverWrapper && !popoverWrapper.contains(e.target)) {
                    popoverMenu.classList.remove('is-open');
                }
            });
        }
    </script>

</body>
</html>
