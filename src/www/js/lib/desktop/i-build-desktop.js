Util.Objects["build"] = new function() {
	this.init = function(scene) {
		u.bug("scene init:" + u.nodeId(scene))
		

		scene.resized = function() {
//			u.bug("scene.resized:" + u.nodeId(this));


			// refresh dom
			//this.offsetHeight;
		}

		scene.scrolled = function() {
//			u.bug("scrolled:" + u.nodeId(this))
		}

		scene.ready = function() {
//			u.bug("scene.ready:" + u.nodeId(this));


			this.form_build = u.qs("form.group", this);
			u.f.init(this.form_build);

			this.form_build = u.qs("form.segment", this);
			u.f.init(this.form_build);

			this.form_download = u.qs("form.download", this);
			u.f.init(this.form_download);



			// this.div_custom = u.qs("div.custom", this);
			// this.div_custom.scene = this;
			//
			// this.div_custom.h2 = u.qs("h3", this.div_custom);
			// this.div_custom.h2.div = this.div_custom;
			//
			//
			//
			// this.div_custom.collapsed_height = this.div_custom.h2.offsetHeight;
			// this.div_custom.expanded_height = u.actualH(this.div_custom);
			//
			// u.as(this.div_custom, "height", this.div_custom.collapsed_height+"px");
			//
			// u.ce(this.div_custom.h2);
			// this.div_custom.h2.clicked = function() {
			// 	if(this.div.is_open) {
			// 		this.div.is_open = false;
			// 		u.a.to(this.div, "all 0.5s ease-in-out", {"height":this.div.collapsed_height+"px"});
			// 	}
			// 	else {
			// 		this.div.is_open = true;
			// 		u.a.to(this.div, "all 0.5s ease-in-out", {"height":this.div.expanded_height+"px"});
			// 		this.div.scene.form_download.fields["scripttype"].val("custom");
			//
			// 		this.div.scene.div_default.is_open = false;
			// 		u.a.to(this.div.scene.div_default, "all 0.5s ease-in-out", {"height":this.div.scene.div_default.collapsed_height+"px"});
			// 	}
			// }
			//
			// this.div_default = u.qs("div.default", this);
			// this.div_default.scene = this;
			//
			// this.div_default.h2 = u.qs("h3", this.div_default);
			// this.div_default.h2.div = this.div_default;
			//
			// this.div_default.collapsed_height = this.div_default.h2.offsetHeight;
			// this.div_default.expanded_height = u.actualH(this.div_default);
			//
			// u.as(this.div_default, "height", this.div_default.collapsed_height+"px");
			//
			// u.ce(this.div_default.h2);
			// this.div_default.h2.clicked = function() {
			// 	if(this.div.is_open) {
			// 		this.div.is_open = false;
			// 		u.a.to(this.div, "all 0.5s ease-in-out", {"height":this.div.collapsed_height+"px"});
			// 	}
			// 	else {
			// 		this.div.is_open = true;
			// 		u.a.to(this.div, "all 0.5s ease-in-out", {"height":this.div.expanded_height+"px"});
			// 		this.div.scene.form_download.fields["scripttype"].val("default");
			//
			// 		this.div.scene.div_custom.is_open = false;
			// 		u.a.to(this.div.scene.div_custom, "all 0.5s ease-in-out", {"height":this.div.scene.div_custom.collapsed_height+"px"});
			// 	}
			// }



			page.cN.scene = this;
			page.resized();
		}


		// scene is ready
		scene.ready();

	}

}
