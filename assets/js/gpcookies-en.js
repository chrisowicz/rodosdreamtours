function GPCreateCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + (days*24*60*60*1000));
    var expires = "; expires=" + date.toGMTString();
	document.cookie = name+"="+value+expires+"; path=/"+"; SameSite=Strict; Secure";
}
function GPReadCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

window.onload = GPCheckCookies;

function GPCheckCookies() {
    if(GPReadCookie('GP_Cookie') != 'T') {
        var message_container = document.createElement('div');
        message_container.id = 'cookies';
        var html_code = '<div id="cookies-message"><p>This website uses cookies to provide services at the highest level. By continuing to use the site, you agree to their use. <a href="https://app.wedding/privacy-policy/">Privacy policy</a>.</p><a href="javascript:GPCloseCookiesWindow();" id="accept-cookies" name="accept-cookies" aria-label="Close popup"></a></div>';
        message_container.innerHTML = html_code;
        document.body.appendChild(message_container);
    }
}

function GPCloseCookiesWindow() {
    GPCreateCookie('GP_Cookie', 'T', 365);
    document.getElementById('cookies').removeChild(document.getElementById('cookies-message'));
}
