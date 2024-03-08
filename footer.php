</div>
</div>
</div>
<footer class="footer text-center">
    All Rights Reserved by ArogyaSair. Designed and Developed by
    <a href="https://www.wrappixel.com">ArogyaSair</a>.
</footer>
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/extra-libs/sparkline/sparkline.js"></script>
<script src="dist/js/waves.js"></script>
<script src="dist/js/sidebarmenu.js"></script>
<script src="dist/js/custom.min.js"></script>
<script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="assets/libs/flot/excanvas.js"></script>
<script src="assets/libs/flot/jquery.flot.js"></script>
<script src="assets/libs/flot/jquery.flot.pie.js"></script>
<script src="assets/libs/flot/jquery.flot.time.js"></script>
<script src="assets/libs/flot/jquery.flot.stack.js"></script>
<script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="dist/js/pages/chart/chart-page-init.js"></script>
<script src="assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="dist/js/pages/mask/mask.init.js"></script>
<script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="assets/libs/select2/dist/js/select2.min.js"></script>
<script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
<script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
<script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
<script src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
<script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="assets/libs/quill/dist/quill.min.js"></script>
<script>
$("#zero_config").DataTable();
</script>
<script>
    $(".select2").select2();
    $(".demo").each(function () {
    $(this).minicolors({
        control: $(this).attr("data-control") || "hue",
        position: $(this).attr("data-position") || "bottom left",

        change: function (value, opacity) {
        if (!value) return;
        if (opacity) value += ", " + opacity;
        if (typeof console === "object") {
            console.log(value);
        }
        },
        theme: "bootstrap",
    });
    });
    jQuery(".mydatepicker").datepicker();
    jQuery("#datepicker-autoclose").datepicker({
    autoclose: true,
    todayHighlight: true,
    });
</script>

</body>

</html>