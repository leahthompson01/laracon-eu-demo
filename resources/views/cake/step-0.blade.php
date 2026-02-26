<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Cake — Step 0: Bare Cake</title>
    @vite(['resources/css/cake-step-0.css'])
</head>

<body>
    <div class="info">
        <h2>Step 0 — Bare Cake</h2>
        <ul>
            <li>Hardcoded hex colors</li>
            <li>Fixed pixel sizes</li>
            <li>No interactivity</li>
            <li>No dark mode</li>
        </ul>
        <p class="hint">This is the "before" starting point.</p>
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
</body>

</html>
