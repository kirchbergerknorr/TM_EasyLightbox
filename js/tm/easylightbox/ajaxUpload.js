AIM = {

	frame : function(c) {

		var n = 'f' + Math.floor(Math.random() * 99999);
		var d = document.createElement('DIV');
		d.innerHTML = '<iframe style="display:none" src="about:blank" id="'+n+'" name="'+n+'" onload="AIM.loaded(\''+n+'\')"></iframe>';
		document.body.appendChild(d);

		var i = document.getElementById(n);
        i.onComplete = this.onComplete;

		return n;
	},

	form : function(f, name) {
		f.setAttribute('target', name);
	},

	submit : function(f, c) {
        $('loading-mask').setStyle({
            zIndex: 1005
        }).show();
        $$('input[name="parameters[imagepath]"]')[0].value = '';
        this.formEl = f;
        this.formAction = f.getAttribute('action');
        f.setAttribute('action', c.action);
        f.setAttribute('enctype', 'multipart/form-data');
		AIM.form(f, AIM.frame(c));
        f.submit();
        $('loading_mask_loader').show();
		if (c && typeof(c.onStart) == 'function') {
			return c.onStart();
		} else {
			return true;
		}
	},

	loaded : function(id) {
        this.formEl.setAttribute('action', this.formAction);
        $('loading-mask').hide();
		var i = document.getElementById(id);
		if (i.contentDocument) {
			var d = i.contentDocument;
		} else if (i.contentWindow) {
			var d = i.contentWindow.document;
		} else {
			var d = window.frames[id].document;
		}
		if (d.location.href == "about:blank") {
			return;
		}

		if (typeof(i.onComplete) == 'function') {
			i.onComplete(d.body.innerHTML);
		}
	},

    onComplete: function(response) {
        response = response.evalJSON();
        $$('input[name="parameters[imagepath]"]')[0].value = response.imagepath;
    }
}