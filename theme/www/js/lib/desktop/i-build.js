Util.Objects["build"] = new function() {
	this.init = function(scene) {
//		u.bug("scene init:" + u.nodeId(scene));
		

		scene.resized = function() {
//			u.bug("scene.resized:" + u.nodeId(this));;


			// refresh dom
			//this.offsetHeight;
		}

		scene.scrolled = function() {
//			u.bug("scrolled:" + u.nodeId(this));
		}

		scene.ready = function() {
//			u.bug("scene.ready:" + u.nodeId(this));

			var i, segment, draggable, li, _default, x;

			// reference elements
			this.div_defaults = u.qs("div.defaults", this);

			this.div_projects = u.qs("div.projects", this);
			this.div_projects.ul = u.qs("ul.projects", this.div_projects);

			this.div_customize = u.qs("div.customize", this);
			this.div_customize.ul_actions = u.qs("ul.actions", this.div_customize);

			// reset button
			this.bn_reset = u.qs("li.reset", this.div_customize.ul_actions);
			this.bn_reset.div = this;

			// look for "new" button
			this.bn_new = u.qs("li.new", this.div_projects);


			// reference segments html
			this.div_segments = u.qs("div.segments", this.div_customize);
			this.segments = u.qsa("ul.segments li", this.div_segments);

			// reference form
			this.form = u.qs("form", this);
			u.f.init(this.form);




			// get any saved group definition
			var project_groups = this.form.inputs["grouping"].val();
			this.project_groups = project_groups ? JSON.parse(decodeURIComponent(project_groups)) : "";

			this.project_name = decodeURIComponent(this.div_customize.getAttribute("data-project-name"));
			this.project_id = this.div_customize.getAttribute("data-project-id");
			this.project_language = this.div_customize.getAttribute("data-project-language");
			this.project_save_url = this.div_customize.getAttribute("data-save-project-url");


			// default definitions
			this.customize_defaults = [
				{
					"name":"Modern cross-platform",
					"groupings":{
						"desktop":[
							"desktop",
							"desktop_ie10",
							"desktop_ie11"
						],
						"tablet":[
							"tablet",
							"tablet_light"
						],
						"smartphone":[
							"smartphone"
						],
						"unsupported":[
							"desktop_ie9",
							"desktop_light",
							"mobile",
							"mobile_light",
							"tv",
							"seo"
						]
					}
				},
				{
					"name":"Modern desktop-only site",
					"groupings":{
						"desktop": [
							"desktop",
							"desktop_ie11",
							"desktop_ie10"
						],
						"unsupported":[
							"desktop_ie9",
							"desktop_light",
							"tablet",
							"tablet_light",
							"smartphone",
							"mobile_light",
							"mobile",
							"tv",
							"seo"
						]
					}
				},
				{
					"name":"Cross-mobile site",
					"groupings":{
						"smartphone": [
							"smartphone"
						],
						"mobile": [
							"mobile"
						],
						"mobile_light": [
							"mobile_light"
						],
						"unsupported":[
							"desktop",
							"desktop_ie11",
							"desktop_ie10",
							"desktop_ie9",
							"desktop_light",
							"tablet",
							"tablet_light",
							"tv",
							"seo"
						]
					}
				},
				{
					"name":"Simple all devices",
					"groupings":{
						"desktop": [
							"desktop",
							"desktop_ie11",
							"desktop_ie10"
						],
						"desktop_light": [
							"desktop_ie9",
							"desktop_light",
							"tv"
						],
						"tablet": [
							"tablet",
							"tablet_light"
						],
						"smartphone": [
							"smartphone"
						],
						"mobile": [
							"mobile",
							"mobile_light"
						],
						"unsupported":[
							"seo"
						]
					}
				},
				{
					"name":"Detector v2",
					"groupings":{
						"desktop":[
							"desktop",
						],
						"desktop_ie":[
							"desktop_ie9",
							"desktop_ie10",
							"desktop_ie11"
						],
						"tablet":[
							"tablet",
							"tablet_light"
						],
						"mobile_touch":[
							"smartphone"
						],
						"basic":[
							"seo"
						]
					}
				}
			];



			// enable reset button
			u.ce(this.bn_reset);
			this.bn_reset.clicked = function() {

				this.div.resetGroups();

				// align height of columns
				this.div.alignHeights();

				// reset name + id
				this.div.project_name = "";
				this.div.div_customize.setAttribute("data-project-name", "");

				this.div.project_id = "";
				this.div.div_customize.setAttribute("data-project-id", "");

				// remove any save button
				this.div.removeSaveButton();

				// remove any existing selection
				if(this.div.current_project) {
					u.rc(this.div.current_project, "selected");
				}

				// send reset to server
				this.response = function(response) {
					// do nothing for now
				}
				u.request(this, this.url);

			}


			// is new project option available (only if user is logged in)
			if(this.bn_new && this.project_save_url) {

				this.bn_new.div = this;

				u.ce(this.bn_new);
				this.bn_new.clicked = function(event) {

					// inject pseudo form for project creation
					var form = u.ae(this.div.div_projects, "form", {class:"labelstyle:inject"})
					form.div = this.div;

					// add field and button
					u.f.addField(form, {name:"csrf-token", type:"hidden", value:this.div.form.inputs["csrf-token"].val()});
					u.f.addField(form, {name:"name", type:"string", label:"Name of project"})
					u.f.addAction(form, {value:"Save", class:"button primary"});

					u.f.init(form);
					form.inputs["name"].focus();

					form.submitted = function() {

						this.response = function(response) {
							page.notify(response);

							if(response.cms_status == "success") {

								// update UI variables
								this.div.project_name = response.cms_object["name"];
								this.div.div_customize.setAttribute("data-project-name", this.div.project_name);

								this.div.project_id = response.cms_object["id"];
								this.div.div_customize.setAttribute("data-project-id", this.div.project_id);

								// add element to projects
								var li = u.ie(this.div.div_projects.ul, "li", {html:'<a class="button">'+this.div.project_name+'</a>'});
								li.setAttribute("data-project-name", this.div.project_name);
								li.setAttribute("data-project-id", this.div.project_id);
								this.div.initProjectLi(li);

								// add save button for the new project
								this.div.addSaveButton();

								// remove form again
								this.parentNode.removeChild(this);

							}
						}
						u.request(this, this.div.project_save_url, {method:"post", data:u.f.getParams(this)});

					}

				}

				// add save button
				this.addSaveButton();
			}
			// hide button if save url is not available
			else if(this.bn_new) {
				this.bn_new.parentNode.removeChild(this.bn_new);
			}


			// update language on change
			this.form.inputs["language"].changed = function(event) {

				var form = new FormData();
				form.append("project_language", this.val());

				this.response = function(response) {
					// do nothing for now
				}
				u.request(this, "/build/setLanguage", {"params":form, "method":"post"});

			}


			var i, project, _default, segment;

			// create grouping area
			this.div_groups = u.ae(this.div_customize, "div", {class:"groups"});
			this.div_customize.insertBefore(this.div_groups, this.div_customize.ul_actions);
			u.ae(this.div_groups, "h3", {html:"Grouping area"});
			this.div_groups.ul = u.ae(this.div_groups, "ul", {class:"groups"});


			// create default set list
			this.div_defaults.ul = u.ae(this.div_defaults, "ul", {class:"defaults actions"});
			for(i = 0; _default = this.customize_defaults[i]; i++) {
				li = u.ae(this.div_defaults.ul, "li", {"html":'<a class="button">'+_default.name+'</a>'});
				li.definition = _default.groupings;
				li.div = this;
				u.ce(li);
				li.clicked = function() {

					// update project groups
					this.div.project_groups = this.definition;

					// build
					this.div.buildCurrentGroups();

					// update server
					this.div.updateGroupDefinitions();

					// scroll builder into view
					u.scrollTo(window, {node:this.div.div_customize});

				}
			}


			if(this.div_projects.ul) {

				// keep the new button out of this
				this.projects = u.qsa("li:not(.new)", this.div_projects.ul);

				// initiate projects list
				for(i = 0; project = this.projects[i]; i++) {

					this.initProjectLi(project);

				}

			}

			this.groups = [];
			this.segment_names = [];

			for(i = 0; segment = this.segments[i]; i++) {

				// store segment name before modifying html
				segment._name = segment.innerHTML;
				segment.div = this;

				// store reference to segment based on name
				this.segment_names[segment._name] = segment;

				// wrap segment text
				u.wc(segment, "div", {"class":"name"})

				// add dragable duplicate
				segment.drag_node = u.ae(segment, "div", {"class":"draggable", "html":segment._name});
				segment.drag_node._name = segment._name;
				segment.drag_node.segment = segment;
				segment.drag_node.div = this;


			
				// enable dragging
				u.e.drag(segment.drag_node, this, {"dropout":true});

				// handle dragging
				segment.drag_node.picked = function(event) {
					u.as(this, "zIndex", 20);

					this.segment.is_dragged = true;


					var i, segment;
					for(i = 0; segment = this.div.segments[i]; i++) {
						if(!segment.is_dragged && segment.group) {
							u.as(segment.drag_node, "display", "none", false);
						}
						else if(segment.is_dragged) {
							u.as(segment.drag_node, "opacity", 1, false);
						}
					}

				}
				segment.drag_node.moved = function(event) {
	//					u.bug("move")

					var i, group;
					// loop through grups
					for(i = 0; group = this.div.groups[i]; i++) {

						// dragging over group segments dropzone
						if(u.e.overlap(this, group.segments)) {
	//								u.bug("over group")

							if(this.segment.group != group) {

								// add segment to this group
								this.div.addToGroup(this.segment, group);
							}

							// business is done
							return;
						}
					}
					// segment is added to group, but currently not dragged over it
					if(this.segment.group) {
//						u.bug("segment added to group but not dragged over it")

						this.div.removeFromGroup(this.segment);
					}

					// segment is not added to group yet and temp group does not exist
					else if(!this.segment.group && !this.div.temp_group) {

						//u.bug("segment not added to group yet")
						this.div.temp_group = this.div.addGroup("click_to_rename_group_"+(this.div.groups.length+1));
					}

				}
				segment.drag_node.dropped = function(event) {
//					u.bug("dropped on:" + this.segment.group );

					// restore z-index
					u.as(this, "zIndex", 10);

					this.segment.is_dragged = false;


					// remove empty groups
					this.div.removeEmptyGroups();

					// repostion segments
					this.div.repositionSegments();

					// update definitions
					this.div.updateGroupDefinitions();

					// align height of columns
					this.div.alignHeights();

				}

			}


			// render current groups
			this.buildCurrentGroups();


			// align column heights
			this.alignHeights();

			// make sure sessions doesn't timeout in build process
			this.keepAlive = function() {
				u.request(this, "/build/keepAlive");
			}
			u.t.setInterval(this, "keepAlive", 60000);


			page.cN.scene = this;


			u.showScene(this);

			// accept cookies?
			page.acceptCookies();

			page.resized();

		}


		// init project button
		scene.initProjectLi = function(project) {
			
			// add selected class if this project is currently selected
			if(project.getAttribute("data-project-id") == this.project_id) {
				u.ac(project, "selected");

				// remove any existing selection
				if(this.current_project) {
					u.rc(this.current_project, "selected");
				}

				// remember which button is selected
				this.current_project = project;
			}

			project.div = this;
			u.ce(project);
			project.clicked = function() {

				// update project groups
				var projects_groups = this.getAttribute("data-project-groups");
				if(projects_groups) {
					this.div.project_groups = JSON.parse(decodeURIComponent(projects_groups));
				}
				else {
					this.div.project_groups = {};
				}

				this.div.project_name = decodeURIComponent(this.getAttribute("data-project-name"));
				this.div.project_id = this.getAttribute("data-project-id");

				// only update language if project has one defined
				var projects_language = this.getAttribute("data-project-language");
				if(projects_language) {
					this.div.form.inputs["language"].val(projects_language);
					// make sure language is updated in session
					this.div.form.inputs["language"].changed();
				}

				// add selected state
				u.ac(this, "selected");

				// remove any existing selection
				if(this.div.current_project) {
					u.rc(this.div.current_project, "selected");
				}

				// remember which button is selected
				this.div.current_project = this;

				// add save button for this project
				this.div.addSaveButton();

				// build
				this.div.buildCurrentGroups();

				// update server
				this.div.updateGroupDefinitions();

				// align heights
				this.div.alignHeights();

				// scroll builder into view
				u.scrollTo(window, {node:this.div.div_customize});
			}

		}

		// add save button if project is active
		scene.addSaveButton = function() {

			this.removeSaveButton();

			if(this.project_name && this.project_id) {

				this.bn_save = u.ie(this.div_customize.ul_actions, "li", {html:'<a class="button primary">Save ' + decodeURIComponent(this.project_name) + '</a>', class:"save"});
				this.bn_save.div = this;

				u.ce(this.bn_save);
				this.bn_save.clicked = function(event) {

					// update date on related project button to keep things aligned
					this.div.current_project.setAttribute("data-project-groups", encodeURIComponent(JSON.stringify(this.div.project_groups)));
					this.div.current_project.setAttribute("data-project-language", this.div.form.inputs["language"].val());

					this.response = function(response) {
						page.notify(response);
					}
					u.request(this, this.div.project_save_url+"/"+this.div.project_id, {"method":"post", 
						data:"grouping="+JSON.stringify(this.div.project_groups)+"&language="+this.div.form.inputs["language"].val()+"&csrf-token="+this.div.form.inputs["csrf-token"].val()
					});

				}

			}

		}

		// remove any save button
		scene.removeSaveButton = function() {

			// remove save button
			if(this.bn_save) {
				this.bn_save.parentNode.removeChild(this.bn_save);
				delete this.bn_save;
			}

		}


		// set UI back to starting point
		scene.resetGroups = function() {
//			u.bug("resetGroups");

			var i, segment;
			for(i = 0; segment = this.segments[i]; i++) {

				this.removeFromGroup(segment);

			}

			// remove empty groups
			this.removeEmptyGroups();

			// repostion segments
			this.repositionSegments();

		}

		// build current group settings
		scene.buildCurrentGroups = function() {
//			u.bug("buildSegmentGroups");

			// clear any existing groups
			this.resetGroups();

			// create current groups
			if(this.project_groups) {
				var x, i, group, segment;
				for(x in this.project_groups) {
//					u.bug("add group:" + this.project_groups[x])
					group = this.addGroup(x);
					for(i = 0; segment = this.project_groups[x][i]; i++) {
//						u.bug("find segment:" + segment)
						this.addToGroup(this.segment_names[segment], group);
					}
				}
			}

			// repostion segments
			this.repositionSegments();

		}



		// add now group as target
		scene.addGroup = function(name) {
//			u.bug("add  group:" + name);

			var group = u.ae(this.div_groups.ul, "li", {"class":"group"});
			group.div = this;
			group._name = name;

			// add group header
			group.header = u.ae(group, "h4", {"html":group._name, "contentEditable":"true"});
			group.header.group = group;

			// add group segments list
			group.segments = u.ae(group, "ul", {"class":"segments"});


			// internal focus handler - attatched to inputs
			group._focus = function(event) {
				// u.bug("this._focus:" + u.nodeId(this) + ", " + typeof(this.focused))

				var selection = window.getSelection();
				range = selection.getRangeAt(0);
				range.selectNodeContents(this);
				selection.addRange(range);


				this.is_focused = true;
				u.ac(this, "focus");
			}
			// internal blur handler - attatched to inputs
			group._blur = function(event) {
				//u.bug("this._blur:" + u.nodeId(this))

				this.is_focused = false;
				u.rc(this, "focus");

				this.group._name = this.innerHTML.replace(/<br.*>/, "").replace(/[^a-zA-Z1-9_]+/g, "_");
				this.innerHTML = this.group._name;
				this.group.div.updateGroupDefinitions();
			}

			// add focus and blur event handlers to taxonomy input
			u.e.addEvent(group.header, "focus", group._focus);
			u.e.addEvent(group.header, "blur", group._blur);

			// add group to global groups array
			this.groups.push(group);

			// align column heights
			this.alignHeights();
			return group;
		}

		// add segment to group
		scene.addToGroup = function(segment, group) {
//			u.bug("add to group:" + segment._name + ", " + group._name);

			// remove from existing group first
			this.removeFromGroup(segment);

			// map group to segment node
			segment.group = group;
			segment.group_segment = u.ae(group.segments, "li", {"class":"segment", "html":segment._name});
			u.wc(segment.group_segment, "div", {"class":"name"});

			segment.group_segment.segment = segment;


			// add delete from group button
			var bn_remove;
			bn_remove = u.ae(segment.group_segment, "span", {"class":"remove", "html":"x"});
			bn_remove.segment = segment;
			bn_remove.div = this;

			u.ce(bn_remove);
			bn_remove.clicked = function() {

				// remove element
				this.div.removeFromGroup(this.segment);

				// clean up
				this.div.removeEmptyGroups();

				// reposition segments
				this.div.repositionSegments();

				// update definitions and server
				this.div.updateGroupDefinitions();

				// align column heights
				this.div.alignHeights();

			}

			// align column heights
			this.alignHeights();
		}



		// remove group
		scene.removeGroup = function(group) {
//			u.bug("remove group:" + group._name);

			group.parentNode.removeChild(group);
			this.groups.splice(this.groups.indexOf(group), 1);

		}

		// remove element from group
		scene.removeFromGroup = function(segment) {
//			u.bug("remove from group:" + segment._name + ", " + (segment.group ? segment.group._name : "no group"));

			if(segment.group) {
			
				segment.group.segments.removeChild(segment.group_segment);

				segment.group = false;
				segment.group_segment = false;
			}

		}

		// remove any empty groups
		scene.removeEmptyGroups = function() {
//			u.bug("removeEmptyGroups");

			var i, group;

			// delete empty groups
			for(i = 0; group = this.groups[i]; i++) {
				// don't auto remove temp group
				if(!group.segments.childNodes.length) {
					this.removeGroup(group);
					i--;
				}

			}

			// remove temp group reference
			this.temp_group = false;

		}


		// update position of all segments (selected or not)
		scene.repositionSegments = function() {
//			u.bug("repositionSegments");

			// position all grouped segments correctly
			var i, segment;
			for(i = 0; segment = this.segments[i]; i++) {
				if(!segment.is_dragged && segment.group) {

					// position 
					u.a.translate(segment.drag_node, u.absX(segment.group_segment) - u.absX(segment), u.absY(segment.group_segment) - u.absY(segment));
					u.as(segment.drag_node, "opacity", 0);
					u.as(segment.drag_node, "display", "block");
				}
				// put back in original position
				else {
					u.as(segment.drag_node, "opacity", 1);
					u.a.translate(segment.drag_node, 0, 0);
				}
			}

		}


		// updates gorup JSON definition based on current layout and send to server
		scene.updateGroupDefinitions = function() {
//			u.bug("update group definitions");

			this.project_groups = {};

			// index all selections
			var groups = u.qsa("ul.groups li.group", this.div_groups);
			var i, group, j, group_segment;
			for(i = 0; group = groups[i]; i++) {

				this.project_groups[group._name] = [];

				var segments = u.qsa("ul.segments li.segment", group);
				for(j = 0; group_segment = segments[j]; j++) {
					this.project_groups[group._name].push(group_segment.segment._name);
				}

			}

			// update grouping input for download
			this.form.inputs["grouping"].val(encodeURIComponent(JSON.stringify(this.project_groups)));

			// submit definitions to server
			var form = new FormData();
			form.append("project_groups", JSON.stringify(this.project_groups));
			form.append("project_name", this.project_name);
			form.append("project_id", this.project_id);

			this.response = function(response) {
//				u.bug("response")
			}
			u.request(this, "/build/setGroups", {"params":form, "method":"post"});

		}

		// align heights of columns
		scene.alignHeights = function() {
//			u.bug("alignHeights");

			// set height to auto to get the real heights
			u.as(this.div_groups, "minHeight", "auto", false);
			u.as(this.div_segments, "minHeight", "auto", false);

			// adjust heights to fit highest column
			if(this.div_segments.offsetHeight > this.div_groups.offsetHeight) {
				u.as(this.div_groups, "minHeight", this.div_segments.offsetHeight+"px", false);
			}
			else {
				u.as(this.div_segments, "minHeight", this.div_groups.offsetHeight+"px", false);
			}
		}

		// scene is ready
		scene.ready();

	}

}
