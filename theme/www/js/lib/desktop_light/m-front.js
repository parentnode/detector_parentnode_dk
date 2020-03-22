Util.Modules["front"] = new function() {
	this.init = function(scene) {
		// u.bug("scene init:", scene);

		scene.resized = function() {
			// u.bug("scene.resized:", this);

		}

		scene.scrolled = function() {
			// u.bug("scene.scrolled:", this);
		}

		scene.ready = function() {
			// u.bug("scene.ready:", this);

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
