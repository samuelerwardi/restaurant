$(function () {
    $.initForm = function (callback) {
        var formVisible = false;
        $("#form").hide();
        var showHideForm = function () {
            var form = $("#form");
            if (!form.is(":visible")) {
                form.stop(true, true).slideDown("fast", function () {
                    formVisible = true;

                });
            } else if (formVisible) {
                form.stop(true, true).slideUp("fast", function () {
                    formVisible = false;
                });
            }
        }

        $("#btn_addnew").click(function () {
            showHideForm();
            return false;
        });
        $(document).on("click", ".btn_edit", function () {
            var form = $("#form");
            if (!form.is(":visible")) {
                showHideForm();
            }
            callback.call(this);
        });
    }
    if($("#modal-message").length != null){
        $("#modal-message").modal('show');
    }
});