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
      let bodyContainer = document.querySelector('#main');
        var message_container = document.createElement('div');
        message_container.id = 'cookies';
        var html_code = '<div id="cookies-message"><p>Strona korzysta z cookies (ciasteczek) zgodnie z <a href="/polityka-prywatnosci/">Polityką Prywatności</a>. Możesz określić warunki przechowywania lub dostępu do plików cookies w Twojej przeglądarce internetowej.</p><a href="javascript:GPCloseCookiesWindow();" id="accept-cookies" name="accept-cookies">x</a></div>';
        message_container.innerHTML = html_code;
        bodyContainer.appendChild(message_container);
    }
}

function GPCloseCookiesWindow() {
    GPCreateCookie('GP_Cookie', 'T', 365);
    document.getElementById('cookies').remove();
    // document.getElementById('cookies').removeChild(document.getElementById('cookies'));
}
