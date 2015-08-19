(function(){
    "use strict";

    function markdownWatcher(source, dest){
        source.addEventListener("input", function(){
            dest.innerHTML = marked(source.value);
        })
    }

    var textEditor = document.querySelector(".content-editor");
    var preview = document.querySelector(".content-preview");

    markdownWatcher(textEditor, preview);
}());