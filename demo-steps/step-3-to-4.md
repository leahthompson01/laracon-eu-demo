# Step 3 → Step 4: Container Queries

**Feature:** The layout adapts to the component's container width, not the viewport.

---

## CSS changes (`cake-step-4.css`)

### 1. Clean up `:root` — remove the unused tokens

```css
/* Before */
:root {
    color-scheme: light dark;
    --cake-width: clamp(180px, 25vw, 320px);
    --cake-height: clamp(140px, 20vw, 260px);
    --cake-scale: clamp(0.7, 0.5 + 0.5vw, 1.3);
}

/* After — only keep --cake-scale, which is still used */
:root {
    color-scheme: light dark;
    --cake-scale: clamp(0.7, 0.5 + 0.5vw, 1.3);
}
```

### 2. Add the container query context

Replace the old `.cake-container` full-screen wrapper approach with a new `.cake-scene` wrapper:

```css
.cake-scene {
    container-type: inline-size;
    container-name: cake-scene;
    position: fixed;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 24px;
}
```

### 3. Add the container query breakpoint

```css
@container cake-scene (max-width: 600px) {
    .info {
        position: relative;
        bottom: auto;
        left: auto;
        max-width: 100%;
        margin: 0 16px;
        order: 2;
    }

    .controls {
        position: relative;
        top: auto;
        right: auto;
        transform: none;
        order: 3;
        text-align: center;
    }

    .cake-container {
        position: relative;
        inset: auto;
        order: 1;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
}
```

When `.cake-scene` is narrower than 600px, the layout stacks vertically: cake on top, info in the middle, controls below.

---

## HTML changes (`step-4.blade.php`)

### 1. Wrap everything in `.cake-scene`

The `<div class="info">` moves **inside** `.cake-scene`, and `.cake-container` (with the cake, checkbox, and controls) also sits inside it. Only `.theme-toggle` stays outside:

```html
<body>
    <button class="theme-toggle" onclick="toggleTheme()">...</button>

    <div class="cake-scene">
        <div class="info">
            <h2>Step 4 — Container Queries</h2>
            ...
        </div>

        <div class="cake-container">
            <input type="checkbox" id="candle-lit" checked>

            <div class="cake">
                ...
            </div>

            <div class="controls">
                ...
            </div>
        </div>
    </div>

    <script>...</script>
</body>
```

---

## Key difference vs viewport media queries

| Media query | Container query |
|-------------|-----------------|
| `@media (max-width: 600px)` | `@container cake-scene (max-width: 600px)` |
| Responds to the **browser window** | Responds to the **parent element** |
| Can't be reused in different contexts | Works wherever the component is placed |

Narrow the browser window — the cake layout adapts. This would also work if you embedded this component in a sidebar, a modal, or any narrow context.
