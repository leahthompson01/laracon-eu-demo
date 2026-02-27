//enables default background but not fully unlocking light dark styling
### Step 1
bring in light dark background styling 

//enables light dark styling for all other elements so do this then hit the toggle to show the big difference
### step 2 light-dark
add in the css variables for light dark
add in all of the css declarations for other elements using light-dark

### step 3 

#candle-lit:checked ~ .controls .lit-text {
    display: inline;
}

#candle-lit:checked ~ .controls .unlit-text {
    display: none;
}

#candle-lit:not(:checked) ~ .controls .lit-text {
    display: none;
}

#candle-lit:not(:checked) ~ .controls .unlit-text {
    display: inline;
}

/* Hide flame when candle is blown out - no JavaScript needed! */
.cake-container:has(#candle-lit:not(:checked)) .flame {
    opacity: 0;
    animation: none;
}

then show how now when we click the button the candle blows out and we just had to use has for this. 

