# Step 2 → Step 3: `clamp()` & Fluid Sizing

**Feature:** The cake and UI scale smoothly across viewport sizes — no media query breakpoints.

---

## CSS changes only (`cake-step-3.css`)

No HTML changes needed for this step.

### 1. Add fluid sizing tokens to `:root`

```css
:root {
    color-scheme: light dark;

    /* Fluid sizing tokens */
    --cake-width: clamp(180px, 25vw, 320px);
    --cake-height: clamp(140px, 20vw, 260px);
    --cake-scale: clamp(0.7, 0.5 + 0.5vw, 1.3);
}
```

### 2. Apply fluid sizing to `.theme-toggle`

```css
/* Before */
.theme-toggle {
    top: 32px;
    right: 32px;
    padding: 12px 24px;
    font-size: 14px;
}

/* After */
.theme-toggle {
    top: min(32px, 4vw);
    right: min(32px, 4vw);
    padding: clamp(8px, 1.5vw, 12px) clamp(16px, 2.5vw, 24px);
    font-size: clamp(12px, 1.5vw, 14px);
}
```

### 3. Apply fluid sizing to `.info`

```css
/* Before */
.info {
    bottom: 32px;
    left: 32px;
    max-width: 380px;
    padding: 24px;
    font-size: 14px;
}

/* After */
.info {
    bottom: min(32px, 4vw);
    left: min(32px, 4vw);
    max-width: clamp(280px, 35vw, 400px);
    padding: clamp(16px, 2.5vw, 24px);
    font-size: clamp(12px, 1.4vw, 14px);
}
```

Also update the heading and hint text:

```css
.info h2 {
    font-size: clamp(14px, 1.8vw, 18px);
}

.info .hint {
    font-size: clamp(11px, 1.2vw, 13px);
}
```

### 4. Apply scale to `.cake`

```css
/* Before */
.cake {
    position: absolute;
    width: 250px;
    height: 200px;
    top: 50%;
    left: 50%;
    margin-top: -70px;
    margin-left: -125px;
}

/* After — add transform */
.cake {
    position: absolute;
    width: 250px;
    height: 200px;
    top: 50%;
    left: 50%;
    margin-top: -70px;
    margin-left: -125px;
    transform: scale(var(--cake-scale)); /* add this */
}
```

### 5. Apply fluid sizing to `.controls` and `.candle-toggle`

```css
/* Before */
.controls {
    right: 32px;
}

/* After */
.controls {
    right: min(32px, 4vw);
}

/* Before */
.candle-toggle {
    padding: 16px 24px;
    font-size: 16px;
}

/* After */
.candle-toggle {
    padding: clamp(12px, 1.8vw, 16px) clamp(16px, 2.5vw, 24px);
    font-size: clamp(14px, 1.6vw, 16px);
}
```

---

## How `clamp()` works

```
clamp(MIN, PREFERRED, MAX)
```

- `MIN` — never go smaller than this
- `PREFERRED` — use this value when possible (usually viewport-relative like `vw`)
- `MAX` — never go larger than this

The result: the cake scales down on small viewports, up on large ones, and stays within sensible bounds — with no `@media` queries at all.
