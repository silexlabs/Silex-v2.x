package silex.ui.list;

import js.Lib;
import js.Dom;

import org.slplayer.component.navigation.Layer;
import org.slplayer.component.list.List;
import org.slplayer.util.DomTools;

import silex.layer.LayerModel;
import silex.publication.PublicationModel;
import silex.property.PropertyModel;

/**
 * list component used to visualize and manipulate layers 
 * by default it displays only the masters, i.e. the layers which nodes have a "data-master" attribute
 * listen to the model events to update the list 
 * @example 	<ul class="LayersList"><li>::rootElement.className:: (::status::)</li></ul> displays the name of the items
 */
@tagNameFilter("ul")
class LayersList extends List<Layer>
{
	/**
	 * Information for debugging, e.g. the class name
	 */ 
	public static inline var DEBUG_INFO = "LayersList class";
	/**
	 * prevent the refresh action generated by our modifications on the model
	 */
	private var propertyChangePending:Bool = false;
	/**
	 * constructor
	 */
	public function new(rootElement:HtmlDom, SLPId:String){
		super(rootElement, SLPId);

		// store a reference to the model
		var layerModel = LayerModel.getInstance();

		// update the data when the publication data changed
		layerModel.addEventListener(LayerModel.ON_LIST_CHANGE, onListChange, DEBUG_INFO);

		// update the selection
		layerModel.addEventListener(LayerModel.ON_SELECTION_CHANGE, onListChange, DEBUG_INFO);

		// update the selection
		PropertyModel.getInstance().addEventListener(PropertyModel.ON_PROPERTY_CHANGE, onListChange, DEBUG_INFO);

		// open the page when the selection changes
		onChange = onSelectLayer;
	}
	/**
	 * refreh list data, and then redraw the display by calling doRedraw
	 * to be overriden to handle the model or do nothing if you manipulate the list and dataProvider by composition
	 * if you override this, either call super.reloadData() to redraw immediately, or call doRedraw() when the data is ready
	 */
	override public function reloadData(){
		if (propertyChangePending == true) return;

		var publicationModel = PublicationModel.getInstance();
		// if a publication is loaded only
		if(publicationModel.application != null){
			// get the list of all layers
			var nodes = DomTools.getElementsByAttribute(publicationModel.viewHtmlDom, "data-master", "*");
			// get a list of instances 
			var layers:Array<Layer> = new Array();
			// browse all nodes
			for (idx in 0...nodes.length){
				// retrieve the class instance associated with this node
				var instances = publicationModel.application.getAssociatedComponents(nodes[idx], Layer);

				if (instances.length == 1){
					// store the first instance
					layers.push(instances.first());
				}
				else{
					throw ("Error: there should be 1 and only 1 instance of Layer associated with this node, and there is "+instances.length);
				}
			}

			dataProvider = layers;

			propertyChangePending =true;
			selectedItem = LayerModel.getInstance().selectedItem;
		}
		super.reloadData();
			propertyChangePending = false;
		//haxe.Timer.delay(doRedraw, 2000);
	}
	public function onListChange(e:CustomEvent){
		trace("onListChange("+e+")");
		reloadData();
	}
	/**
	 * selection changed, open the selected page
	 */
	override function setSelectedIndex(idx:Int):Int {
		trace("setSelectedIndex "+idx);
		if (propertyChangePending == true) return idx;
		return super.setSelectedIndex(idx);
	}
	/**
	 * callback for the list, dispatched when the user selection changed
	 */
	private function onSelectLayer(layer:Layer){
		if (propertyChangePending == true) return;
		if (LayerModel.getInstance().selectedItem != layer){
			trace("onSelectLayer("+layer+")");
			LayerModel.getInstance().selectedItem = layer;
		}
	}
}