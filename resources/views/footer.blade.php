
<div class="copyright text-center">
    Desenvolvido por <strong>Vazquez Soluções</strong>
        <br>
    &copy; Copyright. All Rights Reserved.
        <br>Agathon Psicologia
</div>
<script>
    window.addEventListener("load", _ => {
        $("[required]").each((_, e) => {
            let span = $("<span/>", {class:"text-danger",text:"*"});
            let label = $(`label[for=${e.id}]`);

            label.html([span, label.text()]);
        });
    });
</script>