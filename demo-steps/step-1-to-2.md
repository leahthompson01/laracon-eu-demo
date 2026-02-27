# Step 1 → Step 2: `:has()` Selector

**Feature:** Candle toggle with confetti — zero JavaScript for interactivity.

---

## CSS changes (`cake-step-2.css`)

### 1. Fix pointer events on `.cake-container`

The container is full-screen but we only want clicks on the cake and controls:

```css
.cake-container {
    position: fixed;
    inset: 0;
    pointer-events: none; /* add this */
}

.cake-container .cake,
.cake-container .controls {
    pointer-events: auto; /* add this */
}
```

### 2. Hide the checkbox

```css
#candle-lit {
    display: none;
}
```

### 3. Add `.controls` and `.candle-toggle` styles

```css
.controls {
    position: fixed;
    top: 50%;
    right: 32px;
    transform: translateY(-50%);
}

.candle-toggle {
    display: block;
    padding: 16px 24px;
    background-color: light-dark(#fff, #2a2535);
    color: light-dark(#333, #e0dce5);
    border: 1px solid light-dark(#ddd, #444);
    border-radius: 12px;
    cursor: pointer;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    user-select: none;
}

.candle-toggle:hover {
    transform: translateY(-2px);
}

.candle-toggle:active {
    transform: translateY(0);
}
```

### 4. Add the `:has()` rules (the magic part)

```css
/* Candle IS lit (checkbox checked) */
.cake-container:has(#candle-lit:checked) .flame {
    display: block;
}

.cake-container:has(#candle-lit:checked) .confetti-wrapper {
    opacity: 0;
}

.cake-container:has(#candle-lit:checked) .lit-text {
    display: inline;
}

.cake-container:has(#candle-lit:checked) .unlit-text {
    display: none;
}

/* Candle is NOT lit (checkbox unchecked) */
.cake-container:has(#candle-lit:not(:checked)) .flame {
    display: none;
}

.cake-container:has(#candle-lit:not(:checked)) .confetti-wrapper {
    opacity: 1;
}

.cake-container:has(#candle-lit:not(:checked)) .confetti {
    animation: confetti-fall 1.5s ease-out forwards;
    animation-delay: var(--delay);
}

.cake-container:has(#candle-lit:not(:checked)) .lit-text {
    display: none;
}

.cake-container:has(#candle-lit:not(:checked)) .unlit-text {
    display: inline;
}
```

### 5. Add confetti styles

```css
.confetti-wrapper {
    position: absolute;
    inset: 0;
    pointer-events: none;
    opacity: 0;
    overflow: visible;
    z-index: 100;
}

.confetti {
    position: absolute;
    width: 10px;
    height: 10px;
    background-color: var(--color);
    top: 50%;
    left: 50%;
    border-radius: 2px;
    opacity: 0;
}

@keyframes confetti-fall {
    from {
        transform: translate(0, 0) rotate(0deg);
        opacity: 1;
    }
    to {
        transform: translate(var(--x), var(--y)) rotate(var(--r));
        opacity: 0;
    }
}
```

---

## HTML changes (`step-2.blade.php`)

### 1. Add the hidden checkbox inside `.cake-container`

Place it as the first child of `.cake-container`, **before** `.cake`:

```html
<div class="cake-container">
    <input type="checkbox" id="candle-lit" checked>

    <div class="cake">
        ...
    </div>
```

### 2. Add confetti elements inside `.cake`

After the `.candle` div, add the confetti wrapper:

```html
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
```

Each inline `--x`, `--y`, `--r`, `--delay`, and `--color` drives the confetti-fall animation from CSS.

### 3. Add `.controls` after `.cake` (still inside `.cake-container`)

```html
    </div><!-- end .cake -->

    <div class="controls">
        <label for="candle-lit" class="candle-toggle">
            <span class="lit-text">Blow out candle</span>
            <span class="unlit-text">Light candle</span>
        </label>
    </div>
</div><!-- end .cake-container -->
```

The label's `for="candle-lit"` toggles the hidden checkbox. `:has()` does the rest — no JS needed.
