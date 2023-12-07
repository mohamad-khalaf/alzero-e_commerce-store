// =========================HiddenPlaceholder=========================
( () => {
    document.querySelectorAll(" input").forEach( (inputTag) => {
        // On Focus
        inputTag.addEventListener("focus", () => {
            let placeholderValue = inputTag.getAttribute("placeholder");
            inputTag.setAttribute("data-placeholder", placeholderValue);
            inputTag.setAttribute("placeholder", "");
        });
        // On Blur
        inputTag.addEventListener("blur", () => inputTag.setAttribute("placeholder", inputTag.getAttribute("data-placeholder")));
    });
}) ();
// =========================EndHiddenPlaceholder========================

// =========================StartAddAstricsInput========================
( () => {
    document.querySelectorAll("input").forEach( (inputTag) => {
        inputTag.addEventListener("focus", () => {
            let reguiredAttr = inputTag.getAttribute("required");
            if ( reguiredAttr == "required" || typeof reguiredAttr == 'string' ) {
                let span = document.createElement("span");
                span.classList.add("astricks");
                inputTag.after(span);
            }
        });
    });
}) ();
// =========================EndtAddAstricsInput=========================
