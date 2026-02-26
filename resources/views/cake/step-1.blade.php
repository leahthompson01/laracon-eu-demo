<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Cake — Step 1: light-dark()</title>
    @vite(['resources/css/cake-step-1.css'])
</head>

<body>
    <button class="theme-toggle" onclick="toggleTheme()">
        <span class="light-mode-text">Toggle Dark Mode</span>
        <span class="dark-mode-text" style="display: none;">Toggle Light Mode</span>
    </button>

    <div class="info">
        <h2>Step 1 — light-dark() & color-scheme</h2>
        <ul>
            <li><strong>color-scheme: light dark</strong> on :root</li>
            <li><strong>light-dark()</strong> for plate, background, info box</li>
            <li>Theme toggle sets <code>colorScheme</code> — no class juggling</li>
        </ul>
        <p class="hint">Click the toggle to switch themes.</p>
    </div>

    <div class="cake-container">
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
    </script>
</body>

</html>
