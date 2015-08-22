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


    var Markdown = {
        reader: new commonmark.Parser(),
        writer: new commonmark.HtmlRenderer()
    };

    function markdownWatcher(source, dest){
        source.addEventListener("input", function(){
            dest.innerHTML = Markdown.writer.render(Markdown.reader.parse(source.value));
        })
    }

    var textEditor = document.querySelector(".content-editor");
    var preview = document.querySelector(".content-preview article");
    markdownWatcher(textEditor, preview);
    markdownWatcher(document.querySelector(".excerpt-editor"), document.querySelector(".excerpt-preview article"));
}());