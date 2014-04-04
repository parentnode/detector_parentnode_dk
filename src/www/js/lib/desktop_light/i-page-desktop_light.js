u.bug_console_only = true;

Util.Objects["page"] = new function() {
	this.init = function(page) {

		//if(u.hc(page, "i:page")) {
			//alert("wop");
			// header reference
			page.hN = u.qs("#header");
			page.hN.service = u.qs(".servicenavigation", page.hN);

			// add logo to navigation
			page.logo = u.ie(page.hN, "div", {"class":"logo", "html":"Detector"});
			u.ce(page.logo);
			page.logo.clicked = function(event) {
				location.href = '/';
			}

			// content reference
			page.cN = u.qs("#content", page);

			// navigation reference
			page.nN = u.qs("#navigation", page);
			page.nN.list = u.qs("ul", page.nN);
			page.nN = u.ie(page.hN, page.nN);

			// footer reference
			page.fN = u.qs("#footer");
			// move li to #header .servicenavigation
			page.fN.service = u.qs(".servicenavigation", page.fN);

			page.fN.slogan = u.qs("p", page.fN);
			u.ce(page.fN.slogan);
			page.fN.slogan.clicked = function(event) {
				window.open("http://parentnode.dk");
			}


			// Page is ready - called from several places, evaluates when page is ready to be shown
			page.ready = function() {
//				u.bug("page ready")

				// page is ready to be shown - only initalize if not already shown
				if(!u.hc(this, "ready")) {

					// page is ready
					u.addClass(this, "ready");
				}
			}

			// ready to start page builing process
			page.ready();

		//}
	}
}

u.e.addDOMReadyEvent(u.init);

