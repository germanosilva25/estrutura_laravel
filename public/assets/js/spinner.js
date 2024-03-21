let spinner_text = "";
let remove_spinner = true;
let spinner_target = "body";
var anamnese = false


const removeSpinner = (remove = remove_spinner) => {
    spinner_text = "";

    let spinner = $(".container-spinner");

    if (remove) {
        $("body").css("overflow", "");

        spinner.fadeOut(_ => {
            spinner.remove();
        });
    }
};

const addSpinner = (target = spinner_target) => {
    if (window.no_spinner) return;

    let bar = $("<div/>", { class: "spinner-bar" });
    let cover = $("<div/>", { class: "spinner-cover" });
    let frame = $("<div/>", { class: "spinner-frame" }).append([cover, bar]);
    let text = $("<div/>", { class: "d-flex flex-column justify-content-center h-100" });

    let span = $("<span/>", {
        text: spinner_text,
        top: "calc(-50% + 50px)",
        class: "d-flex justify-content-center position-relative lighter"
    });

    cover.append(text.text(app_name));
    spinner_target = target;

    let spinner = $("<div/>", { class: "container-spinner prevent-select" }).append([ frame, span ]);

    if (!$(".container-spinner").length) {
        $(target).append(spinner);

        $("body").css("overflow", "hidden");

        window.scrollTo(0, 0);
    } else if (!$(".container-spinner").is(":visible"))
        $(".container-spinner").show();
};

$(function ($) {
    if(anamnese)
        return false
    $(document).ajaxSend(_ => addSpinner());
    $(document).ajaxComplete(_ => removeSpinner());
});
