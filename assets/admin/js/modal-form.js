(function ($) {
    "use strict";

    var AjaxFormModal = {
        url: null,
        data: [],
        callbacks: {
            load_edit_data: null,
            reset_form_fields: null,
            submit: null
        },
        /* Init */
        init: function (url) {
            AjaxFormModal.url = url || null;

            $('#form-modal').modal({
                show: false
            });

            $('#form-modal form').submit(function (e) {
                e.preventDefault();
                AjaxFormModal.submit();
            });

            $('#form-modal-add').click(function (e) {
                e.preventDefault();
                AjaxFormModal.reset_form_fields();
            });

            $('.form-modal-edit').click(function (e) {
                e.preventDefault();
                AjaxFormModal.load_edit_data($(this).attr('rel'));
            });
        },
        /* Load data on modal open */
        load_edit_data: function (index) {
            AjaxFormModal.reset_form_fields();

            if (typeof AjaxFormModal.data[index] !== undefined) {
                var data    = AjaxFormModal.data[index],
                    $form   = $('#form-modal form'),
                    $field  = null,
                    field   = null;

                for (field in data) {
                    $field = $form.find('[name=' + field + ']');
                    if ($field.size()) {
                        if ($field.attr('type') === 'checkbox') {
                            if ($field.val() === data[field]) {
                                $field.prop('checked', true);
                            } else {
                                $field.prop('checked', false);
                            }
                        } else if ($field.attr('type') === 'radio') {
                            $('input[name=' + field + '][value=' + data[field] + ']').prop('checked', true);
                        } else {
                            $field.val(data[field]);
                        }
                    }
                }

                if (AjaxFormModal.callbacks.load_edit_data) {
                    AjaxFormModal.callbacks.load_edit_data($form, data);
                }

                $('#form-modal').modal('show');
            }
        },
        /* Reset form fields on modal open */
        reset_form_fields: function () {
            $('#form-modal .dialog-msg').removeClass("alert alert-danger");
            $('#form-modal .dialog-msg').html('');

            $('#form-modal form')[0].reset();
            $('#form-modal').modal('show');

            if (AjaxFormModal.callbacks.reset_form_fields) {
                AjaxFormModal.callbacks.reset_form_fields($('#form-modal form'));
            }
        },
        /* Submit the modal form */
        submit: function () {
            if (AjaxFormModal.url) {
                var $form = $('#form-modal form');
                $form.find('[type=submit]').prop('disabled', true);
                $.post(AjaxFormModal.url, $form.serialize(), function (json) {
                    if (json.success === true) {
                        window.location = $form.attr('action');
                    } else {
                        $('#form-modal .dialog-msg').addClass("alert alert-danger");
                        $('#form-modal .dialog-msg').html(json.msg);
                    }

                    if (AjaxFormModal.callbacks.reset_form_fields) {
                        AjaxFormModal.callbacks.submit($form, json);
                    }

                    $form.find('[type=submit]').prop('disabled', false);
                }, 'json');
            } else {
                alert('Ajax URL missing.');
            }
        }
    };

    window.AjaxFormModal = AjaxFormModal;
})(jQuery);
