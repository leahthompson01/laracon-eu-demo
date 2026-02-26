<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Cake — Step 4: Container Queries</title>
    @vite(['resources/css/cake-step-4.css'])
</head>

<body>
    <button class="theme-toggle" onclick="toggleTheme()">
        <span class="light-mode-text">Toggle Dark Mode</span>
        <span class="dark-mode-text" style="display: none;">Toggle Light Mode</span>
    </button>

    <div class="cake-scene">
        <div class="info">
            <h2>Step 4 — Container Queries</h2>
            <ul>
                <li><strong>container-type: inline-size</strong> on wrapper</li>
                <li>Info stacks below cake in narrow containers</li>
                <li>Controls reposition in narrow containers</li>
                <li>Component adapts to <em>where it's placed</em></li>
            </ul>
            <p class="hint">Narrow the browser to see the layout adapt.</p>
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

                <div class="confetti-wrapper">
                    <div class="confetti" style="--x: -200px; --y: -300px; --r: 180deg; --delay: 0s; --color: #e84393;"></div>
                    <div class="confetti" style="--x: 200px; --y: -350px; --r: -150deg; --delay: 0.1s; --color: #e17055;"></div>
                    <div class="confetti" style="--x: -160px; --y: -400px; --r: 200deg; --delay: 0.2s; --color: #0984e3;"></div>
                    <div class="confetti" style="--x: 240px; --y: -320px; --r: -120deg; --delay: 0.15s; --color: #00b894;"></div>
                    <div class="confetti" style="--x: -120px; --y: -440px; --r: 160deg; --delay: 0.25s; --color: #a29bfe;"></div>
                    <div class="confetti" style="--x: 180px; --y: -380px; --r: -180deg; --delay: 0.05s; --color: #00cec9;"></div>
                    <div class="confetti" style="--x: -220px; --y: -340px; --r: 220deg; --delay: 0.3s; --color: #fd79a8;"></div>
                    <div class="confetti" style="--x: 140px; --y: -420px; --r: -90deg; --delay: 0.12s; --color: #6c5ce7;"></div>
                    <div class="confetti" style="--x: -260px; --y: -360px; --r: 240deg; --delay: 0.18s; --color: #55efc4;"></div>
                    <div class="confetti" style="--x: 280px; --y: -390px; --r: -200deg; --delay: 0.08s; --color: #74b9ff;"></div>
                    <div class="confetti" style="--x: -180px; --y: -450px; --r: 190deg; --delay: 0.22s; --color: #ffeaa7;"></div>
                    <div class="confetti" style="--x: 220px; --y: -410px; --r: -160deg; --delay: 0.14s; --color: #6c5ce7;"></div>
                </div>
            </div>

            <div class="controls">
                <label for="candle-lit" class="candle-toggle">
                    <span class="lit-text">Blow out candle</span>
                    <span class="unlit-text">Light candle</span>
                </label>
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
