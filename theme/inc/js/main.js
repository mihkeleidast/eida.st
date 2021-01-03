function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
}

var ajaxLoading = false;
function doAjax(action, data, success) {
	if(!ajaxLoading) {
		ajaxLoading = true;
		jQuery.ajax({
			type: "POST",
			url: gtap.ajax_path,
			data: {
				nonce: gtap.nonce,
				action: action,
				data: data
			}
		}).done(function(data) {
			if(typeof(success) == "function") {
				success(data);
			}
		}).fail(function(data) {
			location.reload();
		}).always(function() {
			ajaxLoading = false;
		});
		return true;
	} else {
		return false;
	}
}

$(document).ready(function(){


	$('.js-like-post').on('click', function(event){
		event.preventDefault();

		var self = $(this);
		var post_id = self.attr('data-post-id');
		var hearts = self.prev('.hearts');

		self.addClass('js-like-post--liked');

		var countElement = self.next('.post-likes-count');
		var count = parseInt(countElement.text());
		var cookie = getCookie('eidast_liked_' + post_id);
		setCookie('wtf_cookie', 'true', 10);
		if( cookie == "" ) {
			countElement.text(count+1);

			doAjax('update_post_likes', {'ID': post_id }, function (data) {});

			setCookie('eidast_liked_' + post_id, true, 30);
			console.log('eidast_liked_' + post_id);
		}

		for(var i = 0; i < 10; i++) {
			animateHearts(hearts)
		}
	});

	function animateHearts(hearts) {
		var b = Math.floor((Math.random() * 100) + 1);
		var d = ["flowOne", "flowTwo", "flowThree"];
		var a = ["colOne", "colTwo", "colThree", "colFour", "colFive", "colSix"];
		var c = (Math.random() * (1.6 - 1.2) + 1.2).toFixed(1);
		$('<div class="heart part-' + b + " " + a[Math.floor((Math.random() * 6))] + '" style="font-size:' + Math.floor(Math.random() * (50 - 22) + 22) + 'px;"><svg class="icon js-like-post__icon" viewBox="0 0 176.104 176.104"><path d="M150.383,18.301c-7.13-3.928-15.308-6.187-24.033-6.187c-15.394,0-29.18,7.015-38.283,18.015 c-9.146-11-22.919-18.015-38.334-18.015c-8.704,0-16.867,2.259-24.013,6.187C10.388,26.792,0,43.117,0,61.878 C0,67.249,0.874,72.4,2.457,77.219c8.537,38.374,85.61,86.771,85.61,86.771s77.022-48.396,85.571-86.771 c1.583-4.819,2.466-9.977,2.466-15.341C176.104,43.124,165.716,26.804,150.383,18.301z"/></svg></div>').appendTo(hearts).css({
			animation: "" + d[Math.floor((Math.random() * 3))] + " " + c + "s linear"
		});
		$(".part-" + b).show();
		setTimeout(function() {
			$(".part-" + b).remove()
		}, c * 900);
	};
});
