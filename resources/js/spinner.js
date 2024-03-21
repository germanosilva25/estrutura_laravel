$(function ($) {
    let host = window.location.host;

    $(document).ajaxSend((event, xhr, options) => {
        let bar = $("<div/>", { class: "spinner-bar" });
        let cover = $("<div/>", { class: "spinner-cover" });
        let frame = $("<div/>", { class: "spinner-frame" }).append([cover, bar]);
        let text = $("<div/>", { class: "d-flex flex-column justify-content-center h-100" });
        let url = options.url.includes("//") ? new URL(options.url) : null;

        let span = $("<span/>", {
            text: spinner_text,
            top: "calc(-50% + 50px)",
            class: "d-flex justify-content-center position-relative lighter"
        });

        cover.append(text.text(app_name));

        let spinner = $("<div/>", { class: "container-spinner prevent-select" }).append([ frame, span ]);

        remove_spinner = url && url.host !== host;

        if (options.spinner) {
            $('body').addClass("no-events prevent-select");

            if (!$(".container-spinner").length)
                $("main .container:last").append(spinner);
            else if (!$(".container-spinner").is(":visible"))
                $(".container-spinner").show();
        }
    });

    $(document).ajaxComplete(_ => removeSpinner(remove_spinner));
});
