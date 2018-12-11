(function(win, doc, $) {
    var Application = {
        baseUrl: '',
        xhr: null
    };

    Application.showLoading = function() {
        return false; // currently do nothing
        if ($('#throbber-overlay').size() === 0 && $('#throbber-loading').size() === 0) {
            $('body').append('<div id="throbber-overlay" style="display:none"></div>');
            $('body').append('<div id="throbber-loading" style="display:none"></div>');
            $('#throbber-overlay').width($(window).width()).height($(window).height()).show();
            $('#throbber-loading').show();
        } else {
            $('#throbber-overlay').show();
            $('#throbber-loading').show();
        }
        $('body').addClass('throbber-lock');
    };

    Application.hideLoading = function() {
        return false; // currently do nothing
        $('#throbber-overlay').hide().remove();
        $('#throbber-loading').hide().remove();
        $('body').removeClass('throbber-lock');
    };

    Application.ajaxError = function() {
        Application.hideLoading();
        alert('Oops! 何かが間違っていました。');
    };

    /**
     * Job favourite (add/remove/re-add)
     */
    Application.JobFavoritor = function() {
        var baseUrl = Application.baseUrl;
        // Add to favorites
        $('.fav-add, .fav-remove').click(function(e) {
            e.preventDefault();

            var $this = $(this),
                id = $this.attr('rel');

            if ($this.hasClass('fav-add')) {
                Application.showLoading();
                $.post(baseUrl + 'favorite/add', {'job_id': [id]}, function(response) {
                    Application.hideLoading();
                    if (response.success) {
                        var $buttons = $('a[rel='+ id +'].fav-add');
                        $buttons.removeClass('fav-add').addClass('fav-list');
                        $buttons.attr('href', baseUrl + 'favorite-jobs');
                        $buttons.unbind('click').html('お気に入り求人');

                        var count = parseInt($('#head #fav-count').text());
                        $('#head #fav-count').text(count + 1);
                    } else {
                        Application.ajaxError();
                    }
                });
            } else if ($this.hasClass('fav-remove')) {
                Application.showLoading();
                $this.unbind('click');
                $.post(baseUrl + 'favorite/remove', {'job_id': [id]}, function(response) {
                    Application.hideLoading();
                    if (response.success) {
                        window.location = window.location.href;
                    } else {
                        Application.ajaxError();
                    }
                });
            }
        })
    };

    Application.quickUserRegistration = function ($form) {
        $form.on('submit', function(e){
            e.preventDefault();

            Application.showLoading();

            $form.find('.error-msg').html('');
            $.post($(this).attr('action'), $(this).serialize(), function(response){
                Application.hideLoading();
                if (response.success === false) {
                    $('form .error-msg').html('<dl class="validation mgnT">' + response.error + '</dl>');
                } else {
                    window.location = Application.baseUrl + 'login';
                }
             }, 'json');
        });
    };

    Application.TypeCounter = function () {
        $(document).on('keyup', '.type-counter', function(e) {
            max = $(this).attr('maxlength') || $(this).data('length');
            var value = $(this).val();
            var invisibles = ["\n\n", " "];
            for (var i = 0; i < invisibles.length; i++) {
                var regexp = new RegExp(invisibles[i] + '{2,}', 'g');
                value = value.replace(regexp, invisibles[i]);
            }
            var len = value.length;
            $(this).val(value);

            if (len > max) {
                $(this).val($(this).val().substring(0, max));
                $(this).next().children(':first').text(max);
            } else {
                $(this).next().children(':first').text(len);
            }
        });
    };

    Application.ChildSelectUpdater = function ($parent, ajaxUrl, callback) {
        ajaxUrl = Application.baseUrl + ajaxUrl;
        if ($parent.val()) {
            var $child = $parent.parent().next().find('select');
            $child.prop('disabled', true);
            $.ajax({
                type    : 'POST',
                url     : ajaxUrl,
                data    : { 'parent_id': $parent.val() },
                success : function(response) {
                    $child.empty();
                    $child.append($('<option />', { value : 0, text :' -- '}));
                    $.each(response, function(key, value) {
                        $child.append($('<option />', { value : key, text : value}));
                    });
                    $child.prop('disabled', false);

                    if (callback) {
                        callback();
                    }
                },
                dataType : 'json',
                async :false
            });
        }
    };

    Application.InstantJobSearchCount = function () {
        function findCount($form) {
            if (Application.xhr) {
                Application.xhr.abort();
            }

            var data = $form.serialize();
            Application.xhr = $.post(Application.baseUrl + 'ajax/search_job_count', data, function (response) {
                var caption = $form.find('input[type=submit]').val();
                $form.find('input[type=submit]').val(caption.replace(/(\d+件)/, response.count + '件'));
            }, 'json');
        }

        $('.form-instant-count').each(function (i, form) {
            var $form = $(form);

            $form.find('input[type=checkbox], select').on('change', function () {
                findCount($form);
            });

            $form.find('input[type=text]').on('keyup', function () {
                findCount($form);
            });
        })
    }

    $(function() {
        Application.JobFavoritor();
        Application.TypeCounter();
        Application.InstantJobSearchCount();

        if ($('.type-counter').size()) {
            $('.type-counter').each(function() {
                $(this).keyup();
            });
        }
    });

    win.Application = Application;
}(window, document, jQuery));
