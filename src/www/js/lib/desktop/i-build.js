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
			var i, segment, draggable, li, _default, x;


			this.customize_div = u.qs("div.customize", this);
			this.customize_defaults = [
				{
					"name":"Modern cross-platform",
					"groupings":{
						"desktop":[
							"desktop",
							"desktop_edge",
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
							"desktop_edge",
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
							"desktop_edge",
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
							"desktop_edge",
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
							"desktop_edge"
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


			this.bn_reset = u.qs("ul.actions li.reset", this.customize_div);


			// reference segments html
			this.segments_div = u.qs("div.segments", this.customize_div);
			this.segments = u.qsa("ul.segments li", this.segments_div);


			// create grouping area
			this.groups_div = u.ae(this.customize_div, "div", {"class":"groups"});
			this.customize_div.insertBefore(this.groups_div, this.bn_reset.parentNode);
			u.ae(this.groups_div, "h3", {"html":"Grouping area"});
			this.groups_div.list = u.ae(this.groups_div, "ul", {"class":"groups"});

			// create default set list
			this.defaults_div = u.ie(this.customize_div, "div", {"class":"defaults"});
//			u.ae(this.defaults_div, "h4", {"html":"Predefined groupings"});
			this.defaults_div.list = u.ae(this.defaults_div, "ul", {"class":"defaults"});
			for(i = 0; _default = this.customize_defaults[i]; i++) {
				li = u.ae(this.defaults_div.list, "li", {"html":_default.name});
				li.definition = _default.groupings;
				u.ce(li);
				li.clicked = function() {
					// u.bug("default set:" + this.definition);
					// u.xInObject(this.definition)

					var form = new FormData();
					form.append("detector_groups", JSON.stringify(this.definition));

					this.response = function(response) {
						u.bug("done - should reload")
						location.reload();
					}
					u.request(this, "/build/groups", {"params":form, "method":"post"});
				}
			}

			// get any saved group definition
			this.current_definition = JSON.parse(decodeURIComponent(this.customize_div.getAttribute("data-detector-groups")));

			// u.bug(this.current_definition);
			// u.xInObject(this.current_definition);



			this.groups = [];
			this.segment_names = [];

			for(i = 0; segment = this.segments[i]; i++) {

				// store segment name before modifying html
				segment._name = segment.innerHTML;
				segment.scene = this;

				// store reference to segment based on name
				this.segment_names[segment._name] = segment;

				// wrap segment text
				u.wc(segment, "div", {"class":"name"})

				// add dragable duplicate
				segment.drag_node = u.ae(segment, "div", {"class":"draggable", "html":segment._name});
				segment.drag_node._name = segment._name;
				segment.drag_node.segment = segment;
				segment.drag_node.scene = this;


			
				// enable dragging
				u.e.drag(segment.drag_node, this, {"dropout":true});

				// handle dragging
				segment.drag_node.picked = function(event) {
					u.as(this, "zIndex", 20);

					this.segment.is_dragged = true;
					this.scene.segmentPicked();
				}
				segment.drag_node.moved = function(event) {
	//					u.bug("move")

					var i, group;
					// loop through grups
					for(i = 0; group = this.scene.groups[i]; i++) {

						// dragging over group segments dropzone
						if(u.e.overlap(this, group.segments)) {
	//								u.bug("over group")

							if(this.segment.group != group) {

								// add segment to this group
								this.scene.addToGroup(this.segment, group);
							}

							// business is done
							return;
						}
					}
					// segment is added to group, but currently not dragged over it
					if(this.segment.group) {
//						u.bug("segment added to group but not dragged over it")

						this.scene.removeFromGroup(this.segment);
					}

					// segment is not added to group yet and temp group does not exist
					else if(!this.segment.group && !this.scene.temp_group) {

						//u.bug("segment not added to group yet")
						this.scene.temp_group = this.scene.addGroup("click_to_rename_group_"+(this.scene.groups.length+1));
					}

				}
				segment.drag_node.dropped = function(event) {
					u.bug("dropped on:" + this.segment.group );

					// restore z-index
					u.as(this, "zIndex", 10);

					this.segment.is_dragged = false;
					this.scene.segmentDropped();

					// move draggable node back to original position
//					u.a.translate(this, 0, 0);

					// hide draggable node if it has been added to group
					// if(this.segment.group) {
					// 	u.as(this, "display", "none");
					// }


					// remove temp group if segment was not added to it
					// if(this.scene.temp_group && this.scene.temp_group != this.segment.group) {
					//
					// 	this.scene.removeGroup(this.scene.temp_group);
					// }



					// update definitions
					this.scene.updateGroupDefinitions();

					// align height of columns
					this.scene.alignHeights();
				}

			}

			// create current groups
			if(this.current_definition) {
				for(x in this.current_definition) {
					u.bug("add group:" + this.current_definition[x])
					group = this.addGroup(x);
					for(i = 0; segment = this.current_definition[x][i]; i++) {

						u.bug("find segment:" + segment)
						this.addToGroup(this.segment_names[segment], group);
					}
				}

				this.segmentDropped();
			}


			// align column heights
			this.alignHeights();

			page.cN.scene = this;
			page.resized();
		}

		// additional updates on pick
		scene.segmentPicked = function() {

			var i, segment;
			for(i = 0; segment = this.segments[i]; i++) {
				if(!segment.is_dragged && segment.group) {
					u.as(segment.drag_node, "display", "none", false);
				}
				else if(segment.is_dragged) {
					u.as(segment.drag_node, "opacity", 1, false);
				}
			}
		}

		// additional updates on drop
		scene.segmentDropped = function() {

			var i, segment, group;

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


			// position all grouped segments correctly
			for(i = 0; segment = this.segments[i]; i++) {
				if(!segment.is_dragged && segment.group) {

					// position 
					u.a.translate(segment.drag_node, u.absX(segment.group_segment) - u.absX(segment), u.absY(segment.group_segment) - u.absY(segment));
					u.as(segment.drag_node, "opacity", 0);
					u.as(segment.drag_node, "display", "block");
				}
				else {
					u.as(segment.drag_node, "opacity", 1);
					u.a.translate(segment.drag_node, 0, 0);
				}
			}

		}


		scene.addGroup = function(name) {
//			u.bug("add  group:" + name);

			var group = u.ae(this.groups_div.list, "li", {"class":"group"});
			group.scene = this;
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
				this.group.scene.updateGroupDefinitions();
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

		// remove group
		scene.removeGroup = function(group) {
//			u.bug("remove group:" + group._name)

			group.parentNode.removeChild(group);
			this.groups.splice(this.groups.indexOf(group), 1);
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
			bn_remove.scene = this;

			u.ce(bn_remove);
			bn_remove.clicked = function() {
				this.scene.removeFromGroup(this.segment);
			}

			// align column heights
			this.alignHeights();
		}


		scene.removeFromGroup = function(segment) {
			u.bug("remove from group:" + segment._name + ", " + (segment.group ? segment.group._name : "no group"))

			// var keep = false;
			//
			// // additional info passed to function as JSON object
			// if(typeof(_options) == "object") {
			// 	var _argument;
			// 	for(_argument in _options) {
			//
			// 		switch(_argument) {
			// 			case "keep"			: keep			= _options[_argument]; break;
			// 		}
			// 	}
			// }


			if(segment.group) {
			
				segment.group.segments.removeChild(segment.group_segment);

				segment.group = false;
				segment.group_segment = false;
			}

		}


		scene.updateGroupDefinitions = function() {
			
			u.bug("update group definitions")
			
			var definition = {};
			var groups = u.qsa("ul.groups li.group", this.groups_div);
			var i, group, j, group_segment;
			for(i = 0; group = groups[i]; i++) {

				definition[group._name] = [];

				var segments = u.qsa("ul.segments li.segment", group);
				for(j = 0; group_segment = segments[j]; j++) {
					definition[group._name].push(group_segment.segment._name);
				}

			}

			var form = new FormData();
			form.append("detector_groups", JSON.stringify(definition));

			this.response = function(response) {
//				u.bug("response")
			}
			u.request(this, "/build/groups", {"params":form, "method":"post"});
			// form.action = "/build/groups";
			// form.method = "post";

			// send to server
			u.xInObject(definition);
		}

		// align heights of columns
		scene.alignHeights = function() {

			// set height to auto to get the real heights
			u.as(this.groups_div, "minHeight", "auto", false);
			u.as(this.segments_div, "minHeight", "auto", false);

			// adjust heights to fit highest column
			if(this.segments_div.offsetHeight > this.groups_div.offsetHeight) {
				u.as(this.groups_div, "minHeight", this.segments_div.offsetHeight+"px", false);
			}
			else {
				u.as(this.segments_div, "minHeight", this.groups_div.offsetHeight+"px", false);
			}
		}

		// scene is ready
		scene.ready();

	}

}
