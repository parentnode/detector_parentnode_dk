Util.Objects["front"] = new function() {
	this.init = function(scene) {
//		u.bug("scene init:" + u.nodeId(scene))

		scene.resized = function() {
//			u.bug("scene.resized:" + u.nodeId(this));

		}

		scene.scrolled = function() {
//			u.bug("scrolled:" + u.nodeId(this))
		}

		scene.ready = function() {
//			u.bug("scene.ready:" + u.nodeId(this));

			page.cN.scene = this;


			var ul_actions = u.qs("ul.actions", this);
			var place_holder = u.qs("div.articlebody .placeholder.build", this);

			if(ul_actions && place_holder) {
				place_holder.parentNode.replaceChild(ul_actions, place_holder);
			}

		}


		// scene is ready
		scene.ready();

	}

}
