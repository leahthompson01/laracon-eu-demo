<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Cake - Modern CSS Showcase</title>
    @vite(['resources/css/app.css', 'resources/css/base-cake.css', 'resources/js/app.js'])
</head>

<body>
    <button class="theme-toggle" onclick="toggleTheme()">
        <span class="light-mode-text">🌙 Dark Mode</span>
        <span class="dark-mode-text" style="display: none;">☀️ Light Mode</span>
    </button>

    <div class="info">
        <h2>🎂 Modern CSS Features</h2>
        <ul>
            <li><strong>:has()</strong> - State-aware CSS (candle controls flame & confetti)</li>
            <li><strong>oklch()</strong> - Perceptually uniform colors</li>
            <li><strong>light-dark()</strong> - Automatic theming</li>
            <li><strong>Custom properties</strong> - Design tokens & animation timing</li>
            <li><strong>color-scheme</strong> - Native light/dark mode</li>
        </ul>
        <p style="margin-top: 1rem; font-size: 0.8rem; opacity: 0.7;">
            Click "Blow out candle" to trigger confetti!
        </p>
    </div>

    <div class="cake-container">
        <input type="checkbox" id="candle-lit" checked>

        <div class="cake">
            <div class="plate"></div>
            <div class="layer layer-bottom"></div>
            <div class="layer layer-middle"></div>
            <div class="layer layer-top"></div>
            <div class="icing"></div>
            <div class="drip drip1"></div>
            <div class="drip drip2"></div>
            <div class="drip drip3"></div>
            <div class="candle">
                <div class="flame"></div>
            </div>

            <!-- Confetti -->
            <div class="confetti-wrapper">
                <div class="confetti"
                    style="--x: -200px; --y: -300px; --r: 180deg; --delay: 0s; --color: oklch(0.7 0.2 330);"></div>
                <div class="confetti"
                    style="--x: 200px; --y: -350px; --r: -150deg; --delay: 0.1s; --color: oklch(0.7 0.2 60);"></div>
                <div class="confetti"
                    style="--x: -160px; --y: -400px; --r: 200deg; --delay: 0.2s; --color: oklch(0.7 0.2 240);"></div>
                <div class="confetti"
                    style="--x: 240px; --y: -320px; --r: -120deg; --delay: 0.15s; --color: oklch(0.7 0.2 120);"></div>
                <div class="confetti"
                    style="--x: -120px; --y: -440px; --r: 160deg; --delay: 0.25s; --color: oklch(0.7 0.2 300);"></div>
                <div class="confetti"
                    style="--x: 180px; --y: -380px; --r: -180deg; --delay: 0.05s; --color: oklch(0.7 0.2 180);"></div>
                <div class="confetti"
                    style="--x: -220px; --y: -340px; --r: 220deg; --delay: 0.3s; --color: oklch(0.7 0.2 30);"></div>
                <div class="confetti"
                    style="--x: 140px; --y: -420px; --r: -90deg; --delay: 0.12s; --color: oklch(0.7 0.2 270);"></div>
                <div class="confetti"
                    style="--x: -260px; --y: -360px; --r: 240deg; --delay: 0.18s; --color: oklch(0.7 0.2 150);"></div>
                <div class="confetti"
                    style="--x: 280px; --y: -390px; --r: -200deg; --delay: 0.08s; --color: oklch(0.7 0.2 210);"></div>
                <div class="confetti"
                    style="--x: -180px; --y: -450px; --r: 190deg; --delay: 0.22s; --color: oklch(0.7 0.2 90);"></div>
                <div class="confetti"
                    style="--x: 220px; --y: -410px; --r: -160deg; --delay: 0.14s; --color: oklch(0.7 0.2 270);"></div>
            </div>
        </div>

        <div class="controls">
            <label for="candle-lit" class="candle-toggle">
                <span class="lit-text">💨 Blow out candle</span>
                <span class="unlit-text">🔥 Light candle</span>
            </label>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.style.colorScheme === 'dark';
            html.style.colorScheme = isDark ? 'light' : 'dark';

            document.querySelector('.light-mode-text').style.display = isDark ? 'inline' : 'none';
            document.querySelector('.dark-mode-text').style.display = isDark ? 'none' : 'inline';
        }

        // Check system preference on load
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.style.colorScheme = 'dark';
            document.querySelector('.light-mode-text').style.display = 'none';
            document.querySelector('.dark-mode-text').style.display = 'inline';
        }
    </script>
</body>

</html>
