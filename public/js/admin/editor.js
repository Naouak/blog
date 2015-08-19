(function(){
    "use strict";

    function tabs(tabtarget){
        var tabStrip = tabtarget.querySelector('.tab-strip');
        var tabContent = tabtarget.querySelector('.tab-content');

        function switchTo(target){
            tabStrip.querySelector(".selected").classList.remove("selected");
            tabContent.querySelector(".selected").classList.remove("selected");

            target.classList.add("selected");
            tabContent.querySelector("#"+target.dataset.target).classList.add("selected");
        }

        tabStrip.addEventListener("click", function(e){
            var target = e.target;
            if(target.matches(".tab-tag, .tab-tag *")){
                while(!target.matches(".tab-tag")){
                    target = target.parentNode;
                }
            } else {
                return;
            }
            switchTo(target);
        });
    }
    [].forEach.call(document.querySelectorAll(".column"),tabs);


    function markdownWatcher(source, dest){
        source.addEventListener("input", function(){
            dest.innerHTML = marked(source.value);
        })
    }

    var textEditor = document.querySelector(".content-editor");
    var preview = document.querySelector(".content-preview");
    markdownWatcher(textEditor, preview);
    markdownWatcher(document.querySelector(".excerpt-editor"), document.querySelector(".excerpt-preview"));
}());