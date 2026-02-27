# Step 4 → Step 5: Anchor Positioning

**Feature:** UI elements attach declaratively to other elements — no hardcoded offsets, no positioning math.

---

## CSS changes only (`cake-step-5.css`)

No HTML changes needed for this step.

### 1. Make `.cake` an anchor

```css
.cake {
    position: absolute;
    width: 250px;
    height: 200px;
    top: 50%;
    left: 50%;
    margin-top: -70px;
    margin-left: -125px;
    transform: scale(var(--cake-scale));

    anchor-name: --cake; /* add this */
}
```

### 2. Make `.candle` an anchor

```css
.candle {
    width: 16px;
    height: 50px;
    background-color: #cc1a2a;
    border-radius: 8px / 4px;
    top: -20px;
    left: 50%;
    margin-left: -8px;
    z-index: 10;

    anchor-name: --candle; /* add this */
}
```

### 3. Anchor `.controls` to the candle

```css
/* Before */
.controls {
    position: fixed;
    top: 50%;
    right: min(32px, 4vw);
    transform: translateY(-50%);
}

/* After */
.controls {
    position: fixed;
    z-index: 50;

    position-anchor: --candle;
    left: anchor(right);
    top: anchor(center);
    margin-left: 32px;
}
```

The button now sits to the right of the candle, vertically centered with it.

### 4. Anchor `.info` to the cake

```css
/* Before */
.info {
    position: fixed;
    bottom: min(32px, 4vw);
    left: min(32px, 4vw);
    max-width: clamp(280px, 35vw, 400px);
    padding: clamp(16px, 2.5vw, 24px);
    ...
}

/* After — remove bottom/left, add anchor properties */
.info {
    position: fixed;
    max-width: clamp(280px, 35vw, 400px);
    padding: clamp(16px, 2.5vw, 24px);
    ...

    position-anchor: --cake;
    bottom: anchor(bottom);
    right: anchor(right);
    translate: 0 100%;
    margin-top: 32px;
}
```

The info panel now sits below the cake, aligned to its right edge.

### 5. Reset anchor positioning in the narrow container query

When the container is narrow, the layout switches to flow positioning, so anchor values must be cleared:

```css
@container cake-scene (max-width: 600px) {
    .info {
        position: relative;
        bottom: auto;
        right: auto;           /* was left: auto */
        max-width: 100%;
        margin: 0 16px;
        order: 2;
        position-anchor: auto; /* add this */
        translate: none;       /* add this */
    }

    .controls {
        position: relative;
        top: auto;
        left: auto;            /* was right: auto */
        transform: none;
        order: 3;
        text-align: center;
        position-anchor: auto; /* add this */
        margin-top: 0;         /* add this */
    }

    /* .cake-container stays the same as step 4 */
}
```

---

## How anchor positioning works

```css
/* 1. Name the anchor element */
.candle {
    anchor-name: --candle;
}

/* 2. Attach another element to it */
.controls {
    position: fixed;          /* must be positioned */
    position-anchor: --candle;
    left: anchor(right);      /* align my left edge to anchor's right edge */
    top: anchor(center);      /* align my top to anchor's vertical center */
}
```

`anchor()` accepts the same values as regular inset properties (`top`, `right`, `bottom`, `left`, `center`, or a `%`), but they resolve relative to the named anchor element's position on screen.

No more calculating `calc(50% + 125px + 16px)`. The browser does the geometry.
