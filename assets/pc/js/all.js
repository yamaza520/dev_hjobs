$(function(){
	
	// slider
	$('#slide01 .slide ul').bxSlider({
		auto: false,
		pager: false,
		maxSlides:5,
		minSlides:5,
		slideWidth:172,
		moveSlides:1
	});

	// タブ切替	
	$('.tab_box a').click(function () {
		$('.tab_in').hide().filter(this.hash).fadeIn(300);
		$('.tab_box a').removeClass('active').filter(this).addClass('active');
		return false;
	}).filter(':eq(0)').click();
	
	$('.tab_box2 a').click(function () {
		$('.tab_in2').hide().filter(this.hash).fadeIn(300);
		$('.tab_box2 a').removeClass('active').filter(this).addClass('active');
		return false;
	}).filter(':eq(0)').click();
	
	// head仕事を探す_slidedown
	$("#head2 .menu01").hover(function(){
		$("#head2 .slide_down_menu").slideToggle();
		$("#head2 .menu01").toggleClass("active");
	});

	// sideメルマガ登録
	$("#side img.ezine_btn").on("click", function() {
		$("#side .ezine").slideToggle();
		$(this).toggleClass("active");
	});
	
	// footerメルマガ登録
	$("#footer_form .left_box span.bnr").on("click", function() {
		$("#footer_form .form_box").slideToggle();
	});

	// mypage こだわり検索
	$(".mypage .keyword .btn_more").on("click", function() {
		$(".mypage .keyword .check_wrap").slideToggle();
		$(this).toggleClass("active");
	});
	
	// mypage slide_down
	$(".mypage .sec_in div.btn_more").on("click", function() {
		$(".mypage .slide_down_box").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('すべて見る');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});
	
	$(".mypage .sec_in div.btn_more2").on("click", function() {
		$(".mypage .slide_down_box2").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('すべて見る');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});
	
	$(".recruit .sec_in div.btn_more").on("click", function() {
		$(".recruit .slide_down_box").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('もっと見る');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});
	
	$(".recruit .sec_in div.btn_more2").on("click", function() {
		$(".recruit .slide_down_box2").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('その他');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});

	$(".setting .sec_in div.btn_down1").on("click", function() {
		$(".setting .slide_down_box3").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('もっと見る');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});
	
	$(".setting .sec_in div.btn_down2").on("click", function() {
		$(".setting .slide_down_box4").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('その他');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});
	
	
	
	// ページトップボタン
	$("a[href^=#container]").click(function() {
	  var speed = 700; // ミリ秒
	  var href= $(this).attr("href");
	  var target = $(href === "#" || href === "" ? 'html' : href);
	  var position = target.offset().top -0;
	  $('body,html').animate({scrollTop:position}, speed, 'swing');
	  return false;
	});
	
	// ページ内スクロール
	$("a[href^=#sec01]").click(function() {
	  var speed = 700; // ミリ秒
	  var href= $(this).attr("href");
	  var target = $(href === "#" || href === "" ? 'html' : href);
	  var position = target.offset().top -0;
	  $('body,html').animate({scrollTop:position}, speed, 'swing');
	  return false;
	});
	$("a[href^=#sec02]").click(function() {
	  var speed = 700; // ミリ秒
	  var href= $(this).attr("href");
	  var target = $(href === "#" || href === "" ? 'html' : href);
	  var position = target.offset().top -0;
	  $('body,html').animate({scrollTop:position}, speed, 'swing');
	  return false;
	});
	$("a[href^=#sec03]").click(function() {
	  var speed = 700; // ミリ秒
	  var href= $(this).attr("href");
	  var target = $(href === "#" || href === "" ? 'html' : href);
	  var position = target.offset().top -0;
	  $('body,html').animate({scrollTop:position}, speed, 'swing');
	  return false;
	});
	$("a[href^=#sec04]").click(function() {
	  var speed = 700; // ミリ秒
	  var href= $(this).attr("href");
	  var target = $(href === "#" || href === "" ? 'html' : href);
	  var position = target.offset().top -0;
	  $('body,html').animate({scrollTop:position}, speed, 'swing');
	  return false;
	});
	

	// POP UP
	// スクロールバーの横幅を取得
    $('html').append('<div class="scrollbar" style="overflow:scroll;"></div>');
    $('.scrollbar').hide();
    // 「.modal-open」をクリック
    $('.modal-open').click(function(){
        var id = $(this).attr('data-target');
        var wS = $(window).scrollTop() + 50;
        $('.modal-overlay').fadeIn('fast');
        $('#' + id).css('top',wS).fadeIn('fast');
    });
    $('.modal-overlay, .modal-close').click(function () {
        $('.modal-overlay, .modal-content').fadeOut('fast');
    });
	
	
    /* selectボックスの選択が変更したら中の処理を実行 */
	if($('#select_area').length){
		var target = $('#select_area').find(':selected').attr('data');
		$('#'+target).show();
	}
	$('#select_area').change(function(){
		var target = $(this).find(':selected').attr('data');
		$(this).parents('td').find('ul').hide();
		$('#'+target).show();
	});

    /* radioボタンの選択が変更したら中の処理を実行 */
	if($('#radio_job_cat').length){
		var target2 = $('#radio_job_cat').find(':checked').attr('data');
		$('#'+target2).show();
	}
	$('#radio_job_cat').change(function(){
		var target2 = $(this).find(':checked').attr('data');
		$(this).parents('td').find('ul').hide();
		$('#'+target2).show();
	});
	
    // クリックで画像拡大
	$('.subImg .img_box_sub:first-child img').addClass("active");
    $('.subImg .img_box_sub img').click(function(){
        $('.mainImg img').attr('src', $(this).attr('src'));
		$(this).addClass("active");
		$('.subImg .img_box_sub img').not(this).removeClass("active");
		
    });
	
    // 郵便番号で住所自動入力
	$(window).ready( function() {
      $('#postcode').jpostal({
         postcode : [
            '#postcode'
         ],		
			address : {
				'#address1'  : '%3',
				'#address2'  : '%4%5'
			}
		});
	});

    // selectbox 省略をせない
    var ua = navigator.userAgent;
    if (ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 ) {
            var selects = document.querySelectorAll("select");
            for (var i = 0; i < selects.length; i++ ){
                selects[i].appendChild(document.createElement("optgroup"));
            }
    }
    // mypage slide_down and slide_up for browsing jobs
    browsing();
    $(".mypage .sec_in div.btn_more ").on("click", function() {
        if($(this).hasClass('active')){
            $('dl.list').fadeIn();
        } else {
           browsing();
        }
    });
    
    // mypage slide_down and slide_up for favorite jobs
    favorite();
    $(".mypage .sec_in div.btn_more2 ").on("click", function() {
        if($(this).hasClass('active')){
            $('li').fadeIn();
        } else {
           favorite();
        }
    });
});

    browsing = function() {
        var n = 5;
        $('.browsing_list').each(function() {
            var dl = $(this).find('dl');
            if(dl.length > n) {
               dl.slice(n).hide();
            }
        });
    };

    favorite = function() {
        var n = 5;
        $('.fav_list').each(function() {
            var li = $(this).find('ul.list_favorite li.list');
            if(li.length > n) {
               li.slice(n).hide();
            }
        });
    };
