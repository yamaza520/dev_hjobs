$(document).ready(function(){
	// 施設から探す、タブ切り替え＆スライド
	var sliders = [];
	var elm = $('#sec03 .tab_slider .tab_in');
	if(elm.length){
		$('#sec03 .tab_box a').click(function () {
			$('#sec03 .tab_slider').hide().filter(this.hash).fadeIn(300);
			$('#sec03 .tab_box a').removeClass('active').filter(this).addClass('active');
			sliders[ $(this).attr('href') ].reloadSlider();
			return false;
		});
		elm.each(function(i){
			var id = $(this).parents('.tab_slider').attr('id');
			sliders['#' + id] = $(this).bxSlider({
				adaptiveHeight: true,
				controls: false,
				infiniteLoop: true,
				useCSS: true
			});
		});
	}
});

$(function(){
	
	// slider複数表示（レスポンシブ）
	// slider
	$('#slide01 ul').bxSlider({
		pager: false,
		maxSlides:3,
		minSlides:3,
		slideWidth:120,
		moveSlides:3,
		adaptiveHeight:true,
		controls:false,
		slideMargin:10
	});
	
	
	$('.tab_box2 a').click(function () {
		$('.tab_slider2').hide().filter(this.hash).fadeIn(300);
		$('.tab_box2 a').removeClass('active').filter(this).addClass('active');
		return false;
	}).filter(':eq(0)').click();
	
	
	// こだわり＄＆資格検索
	$("#sec06 .check_wrap td").on("click", function() {
		$(this).toggleClass("active");
	});

	$("#sec06 .tit").on("click", function() {
		$(this).next().slideToggle();
	});

	$(".modal-content li").on("click", function() {
		$(this).toggleClass("active");
	});
	$(".recruit dl dd ul.list li").on("click", function() {
		$(this).toggleClass("active");
	});
	
	$(".signup .form_tbl dl dd.check ul li").on("click", function() {
		$(this).toggleClass("active");
	});
	
	
	// footerメルマガ登録
	$("#footer_form .left_box span.bnr").on("click", function() {
		$("#footer_form .form_box").slideToggle();
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


	$('#search01').animatedModal({
		modalTarget:'content01',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
	});
	$('#search02').animatedModal({
		modalTarget:'content02',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
	});
	$('#search03').animatedModal({
		modalTarget:'content03',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
	});
	$('#search04').animatedModal({
		modalTarget:'content04',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
	});
	$('#search05').animatedModal({
		modalTarget:'content05',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
	});
	$('#search06').animatedModal({
		modalTarget:'content06',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
	});
	$('#search07').animatedModal({
		modalTarget:'content07',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
	});
	$('#search08').animatedModal({
		modalTarget:'content08',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
	});
	$('#search09').animatedModal({
		modalTarget:'content09',
		animatedIn:'bounceInUp', //表示する時のアニメーション
		animatedOut:'bounceOutDown', //閉じる時のアニメーション
		animationDuration:'1s', //アニメーションにかける秒数
		color:'#fff', //背景色
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

	// Login Form
	$(".login .memo").on("click", function() {
		$(".login .form_tbl .slide_down_box").slideToggle();
	});
	
	
    /* selectボックスの選択が変更したら中の処理を実行 */
	if($('#select_area').length){
		var target = $('#select_area').find(':selected').attr('data');
		$('#'+target).show();
	}
	$('#select_area').change(function(){
		var target = $(this).find(':selected').attr('data');
		$(this).parents('dd').find('ul').hide();
		$('#'+target).show();
	});
	

    /* radioボタンの選択が変更したら中の処理を実行 */
	if($('#select_job').length){
		var target2 = $('#select_job').find(':checked').attr('data');
		$('#'+target2).show();
	}
	$('#select_job').change(function(){
		var target2 = $(this).find(':checked').attr('data');
		$(this).parents('dd').find('ul').hide();
		$('#'+target2).show();
	});
	

	$(".slide_down_form dt").on("click", function() {
		$(this).next().slideToggle();
		$(this).toggleClass("active");
	});
	

	// recruit_list slide_down
	$(".slide_down_form .btn_more").on("click", function() {
		$(".slide_down_form .slide_down_box").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('もっと見る');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});
	
	$(".slide_down_form .btn_more2").on("click", function() {
		$(".slide_down_form .slide_down_box2").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('その他');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});

	$(".slide_down_form .btn_more3").on("click", function() {
		$(".slide_down_form .slide_down_box3").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('もっと見る');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});
	
	$(".slide_down_form .btn_more4").on("click", function() {
		$(".slide_down_form .slide_down_box4").slideToggle();
		if($(this).hasClass('active')){
			$(this).find('span').html('その他');
		} else {
			$(this).find('span').html('閉じる');
		}
		$(this).toggleClass("active");
	});

	
	
	// recruit_detail slide_down
	$(".recruit .rec_slide_down dt").on("click", function() {
		$(this).next().slideToggle();
		$(this).toggleClass("active");
	});
	
    // 郵便番号で住所自動入力
	$(window).ready( function() {
      $('#postcode').jpostal({
         postcode : [
            '#postcode'
         ],		
			address : {
				'#address1'  : '%3',
				'#address2'  : '%4',
				'#address3'  : '%5'
			}
		});
	});

	
	
	
});

