# Step 0 → Step 1: `light-dark()` & `color-scheme`

**Feature:** Native dark mode without media queries or class toggling.

---

## CSS changes (`cake-step-1.css`)

### 1. Add `color-scheme` to `:root`

```css
:root {
    color-scheme: light dark;
}
```

### 2. Replace hardcoded colors with `light-dark()`

```css
/* Before */
body {
    background-color: #f5f0eb;
    color: #333;
}

/* After */
body {
    background-color: light-dark(#f5f0eb, #1a1520);
    color: light-dark(#333, #e0dce5);
}
```

Do the same for `.plate`, `.info`, and the box-shadow on `.info`:

```css
.plate {
    background-color: light-dark(#e8e8e8, #3a3545);
    box-shadow: 0 4px 12px light-dark(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3));
}

.info {
    background-color: light-dark(#ffffff, #2a2535);
    border: 1px solid light-dark(#ddd, #444);
    box-shadow: 0 4px 24px light-dark(rgba(0, 0, 0, 0.08), rgba(0, 0, 0, 0.3));
}
```

### 3. Add the theme toggle button styles

```css
.theme-toggle {
    position: fixed;
    top: 32px;
    right: 32px;
    padding: 12px 24px;
    background-color: light-dark(#fff, #2a2535);
    color: light-dark(#333, #e0dce5);
    border: 1px solid light-dark(#ddd, #444);
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s;
    z-index: 100;
}

.theme-toggle:hover {
    transform: scale(1.05);
}
```

---

## HTML changes (`step-1.blade.php`)

### 1. Add the theme toggle button (top of `<body>`)

```html
<button class="theme-toggle" onclick="toggleTheme()">
    <span class="light-mode-text">Toggle Dark Mode</span>
    <span class="dark-mode-text" style="display: none;">Toggle Light Mode</span>
</button>
```

### 2. Add the toggle script (bottom of `<body>`)

```html
<script>
    function toggleTheme() {
        const html = document.documentElement;
        const isDark = html.style.colorScheme === 'dark';
        html.style.colorScheme = isDark ? 'light' : 'dark';

        document.querySelector('.light-mode-text').style.display = isDark ? 'inline' : 'none';
        document.querySelector('.dark-mode-text').style.display = isDark ? 'none' : 'inline';
    }
</script>
```

The key insight: `html.style.colorScheme = 'dark'` is all it takes. The `light-dark()` function re-evaluates automatically — no class toggling, no JS color management.
