<?php

class cocktail_core_layer_LayerRenderer extends cocktail_core_dom_NodeBase {
	public function __construct($rootElementRenderer) {
		if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::new");
		$製pos = $GLOBALS['%s']->length;
		parent::__construct();
		$this->rootElementRenderer = $rootElementRenderer;
		$this->_zeroAndAutoZIndexChildLayerRenderers = new _hx_array(array());
		$this->_positiveZIndexChildLayerRenderers = new _hx_array(array());
		$this->_negativeZIndexChildLayerRenderers = new _hx_array(array());
		$this->hasOwnGraphicsContext = false;
		$this->_needsRendering = true;
		$this->_needsBitmapSizeUpdate = true;
		$this->_needsGraphicsContextUpdate = true;
		$this->_windowWidth = 0;
		$this->_windowHeight = 0;
		$this->_scrolledPoint = new cocktail_core_geom_PointVO(0.0, 0.0);
		$GLOBALS['%s']->pop();
	}}
	public function getChildRenderers() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getChildRenderers");
		$製pos = $GLOBALS['%s']->length;
		$childRenderers = new _hx_array(array());
		{
			$_g1 = 0; $_g = $this->_negativeZIndexChildLayerRenderers->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$childRenderer = $this->_negativeZIndexChildLayerRenderers[$i];
				$childRenderers->push($childRenderer->rootElementRenderer);
				unset($i,$childRenderer);
			}
		}
		{
			$_g1 = 0; $_g = $this->_zeroAndAutoZIndexChildLayerRenderers->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$childRenderer = $this->_zeroAndAutoZIndexChildLayerRenderers[$i];
				$childRenderers->push($childRenderer->rootElementRenderer);
				unset($i,$childRenderer);
			}
		}
		{
			$_g1 = 0; $_g = $this->_positiveZIndexChildLayerRenderers->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$childRenderer = $this->_positiveZIndexChildLayerRenderers[$i];
				$childRenderers->push($childRenderer->rootElementRenderer);
				unset($i,$childRenderer);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $childRenderers;
		}
		$GLOBALS['%s']->pop();
	}
	public function isWithinBounds($point, $bounds) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::isWithinBounds");
		$製pos = $GLOBALS['%s']->length;
		{
			$裨mp = $point->x >= $bounds->x && $point->x <= $bounds->x + $bounds->width && $point->y >= $bounds->y && $point->y <= $bounds->y + $bounds->height;
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementRenderersAtPointInChildRenderers($point, $childRenderers, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getElementRenderersAtPointInChildRenderers");
		$製pos = $GLOBALS['%s']->length;
		$elementRenderersAtPointInChildRenderers = new _hx_array(array());
		$length = $childRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$elementRenderersAtPointInChildRenderer = new _hx_array(array());
				if(_hx_array_get($childRenderers, $i)->createOwnLayer() === true) {
					if(_hx_array_get($childRenderers, $i)->isScrollBar() === true) {
						$elementRenderersAtPointInChildRenderer = _hx_array_get($childRenderers, $i)->layerRenderer->getElementRenderersAtPoint($point, $scrollX, $scrollY);
					} else {
						if(_hx_array_get($childRenderers, $i)->coreStyle->getKeyword(_hx_array_get($childRenderers, $i)->coreStyle->get_position()) == cocktail_core_css_CSSKeywordValue::$FIXED) {
							$elementRenderersAtPointInChildRenderer = _hx_array_get($childRenderers, $i)->layerRenderer->getElementRenderersAtPoint($point, $scrollX, $scrollY);
						} else {
							$elementRenderersAtPointInChildRenderer = _hx_array_get($childRenderers, $i)->layerRenderer->getElementRenderersAtPoint($point, $scrollX + $this->rootElementRenderer->get_scrollLeft(), $scrollY + $this->rootElementRenderer->get_scrollTop());
						}
					}
				}
				$childLength = $elementRenderersAtPointInChildRenderer->length;
				{
					$_g1 = 0;
					while($_g1 < $childLength) {
						$j = $_g1++;
						$elementRenderersAtPointInChildRenderers->push($elementRenderersAtPointInChildRenderer[$j]);
						unset($j);
					}
					unset($_g1);
				}
				unset($i,$elementRenderersAtPointInChildRenderer,$childLength);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $elementRenderersAtPointInChildRenderers;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementRenderersAtPointInLayer($renderer, $point, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getElementRenderersAtPointInLayer");
		$製pos = $GLOBALS['%s']->length;
		$elementRenderersAtPointInLayer = new _hx_array(array());
		$this->_scrolledPoint->x = $point->x + $scrollX;
		$this->_scrolledPoint->y = $point->y + $scrollY;
		if($this->isWithinBounds($this->_scrolledPoint, $renderer->get_globalBounds()) === true) {
			if($renderer->isVisible() === true) {
				$elementRenderersAtPointInLayer->push($renderer);
			}
		}
		$scrollX += $renderer->get_scrollLeft();
		$scrollY += $renderer->get_scrollTop();
		$length = $renderer->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $renderer->childNodes[$i];
				if($child->layerRenderer === $this) {
					if($child->hasChildNodes() === true) {
						$childElementRenderersAtPointInLayer = $this->getElementRenderersAtPointInLayer($child, $point, $scrollX, $scrollY);
						$childLength = $childElementRenderersAtPointInLayer->length;
						{
							$_g1 = 0;
							while($_g1 < $childLength) {
								$j = $_g1++;
								if(_hx_array_get($childElementRenderersAtPointInLayer, $j)->isVisible() === true) {
									$elementRenderersAtPointInLayer->push($childElementRenderersAtPointInLayer[$j]);
								}
								unset($j);
							}
							unset($_g1);
						}
						unset($childLength,$childElementRenderersAtPointInLayer);
					} else {
						$this->_scrolledPoint->x = $point->x + $scrollX;
						$this->_scrolledPoint->y = $point->y + $scrollY;
						if($this->isWithinBounds($this->_scrolledPoint, $child->get_globalBounds()) === true) {
							if($child->isVisible() === true) {
								$elementRenderersAtPointInLayer->push($child);
							}
						}
					}
				}
				unset($i,$child);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $elementRenderersAtPointInLayer;
		}
		$GLOBALS['%s']->pop();
	}
	public function getElementRenderersAtPoint($point, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getElementRenderersAtPoint");
		$製pos = $GLOBALS['%s']->length;
		$elementRenderersAtPoint = $this->getElementRenderersAtPointInLayer($this->rootElementRenderer, $point, $scrollX, $scrollY);
		if($this->rootElementRenderer->hasChildNodes() === true) {
			$childRenderers = $this->getChildRenderers();
			$elementRenderersAtPointInChildRenderers = $this->getElementRenderersAtPointInChildRenderers($point, $childRenderers, $scrollX, $scrollY);
			$length = $elementRenderersAtPointInChildRenderers->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$elementRenderersAtPoint->push($elementRenderersAtPointInChildRenderers[$i]);
					unset($i);
				}
			}
		}
		{
			$GLOBALS['%s']->pop();
			return $elementRenderersAtPoint;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTopMostElementRendererAtPoint($point, $scrollX, $scrollY) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getTopMostElementRendererAtPoint");
		$製pos = $GLOBALS['%s']->length;
		$elementRenderersAtPoint = $this->getElementRenderersAtPoint($point, $scrollX, $scrollY);
		{
			$裨mp = $elementRenderersAtPoint[$elementRenderersAtPoint->length - 1];
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewStackingContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::establishesNewStackingContext");
		$製pos = $GLOBALS['%s']->length;
		$裨 = ($this->rootElementRenderer->coreStyle->get_zIndex());
		switch($裨->index) {
		case 4:
		$value = $裨->params[0];
		{
			if($value === cocktail_core_css_CSSKeywordValue::$AUTO) {
				$GLOBALS['%s']->pop();
				return false;
			}
		}break;
		default:{
		}break;
		}
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function insertNegativeZIndexChildRenderer($childLayerRenderer, $rootElementRendererZIndex) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::insertNegativeZIndexChildRenderer");
		$製pos = $GLOBALS['%s']->length;
		$newNegativeZIndexChildRenderers = new _hx_array(array());
		$isInserted = false;
		$length = $this->_negativeZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$currentRendererZIndex = 0;
				$裨 = (_hx_array_get($this->_negativeZIndexChildLayerRenderers, $i)->rootElementRenderer->coreStyle->get_zIndex());
				switch($裨->index) {
				case 0:
				$value = $裨->params[0];
				{
					$currentRendererZIndex = $value;
				}break;
				default:{
				}break;
				}
				if($currentRendererZIndex > $rootElementRendererZIndex && $isInserted === false) {
					$newNegativeZIndexChildRenderers->push($childLayerRenderer);
					$isInserted = true;
				}
				$newNegativeZIndexChildRenderers->push($this->_negativeZIndexChildLayerRenderers[$i]);
				unset($i,$currentRendererZIndex);
			}
		}
		if($isInserted === false) {
			$newNegativeZIndexChildRenderers->push($childLayerRenderer);
		}
		$this->_negativeZIndexChildLayerRenderers = $newNegativeZIndexChildRenderers;
		$GLOBALS['%s']->pop();
	}
	public function insertPositiveZIndexChildRenderer($childLayerRenderer, $rootElementRendererZIndex) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::insertPositiveZIndexChildRenderer");
		$製pos = $GLOBALS['%s']->length;
		$newPositiveZIndexChildRenderers = new _hx_array(array());
		$isInserted = false;
		$length = $this->_positiveZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$currentRendererZIndex = 0;
				$裨 = (_hx_array_get($this->_positiveZIndexChildLayerRenderers, $i)->rootElementRenderer->coreStyle->get_zIndex());
				switch($裨->index) {
				case 0:
				$value = $裨->params[0];
				{
					$currentRendererZIndex = $value;
				}break;
				default:{
				}break;
				}
				if($rootElementRendererZIndex < $currentRendererZIndex && $isInserted === false) {
					$newPositiveZIndexChildRenderers->push($childLayerRenderer);
					$isInserted = true;
				}
				$newPositiveZIndexChildRenderers->push($this->_positiveZIndexChildLayerRenderers[$i]);
				unset($i,$currentRendererZIndex);
			}
		}
		if($isInserted === false) {
			$newPositiveZIndexChildRenderers->push($childLayerRenderer);
		}
		$this->_positiveZIndexChildLayerRenderers = $newPositiveZIndexChildRenderers;
		$GLOBALS['%s']->pop();
	}
	public function getConcatenatedMatrix($matrix, $relativeOffset) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getConcatenatedMatrix");
		$製pos = $GLOBALS['%s']->length;
		$currentMatrix = new cocktail_core_geom_Matrix(null);
		$globalBounds = $this->rootElementRenderer->get_globalBounds();
		$currentMatrix->translate($globalBounds->x + $relativeOffset->x, $globalBounds->y + $relativeOffset->y);
		$currentMatrix->concatenate($matrix);
		$currentMatrix->translate(($globalBounds->x + $relativeOffset->x) * -1, ($globalBounds->y + $relativeOffset->y) * -1);
		{
			$GLOBALS['%s']->pop();
			return $currentMatrix;
		}
		$GLOBALS['%s']->pop();
	}
	public function getTransformationMatrix($graphicContext) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::getTransformationMatrix");
		$製pos = $GLOBALS['%s']->length;
		$relativeOffset = $this->rootElementRenderer->getRelativeOffset();
		$concatenatedMatrix = $this->getConcatenatedMatrix($this->rootElementRenderer->coreStyle->usedValues->transform, $relativeOffset);
		$concatenatedMatrix->translate($relativeOffset->x, $relativeOffset->y);
		{
			$GLOBALS['%s']->pop();
			return $concatenatedMatrix;
		}
		$GLOBALS['%s']->pop();
	}
	public function render($windowWidth, $windowHeight) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::render");
		$製pos = $GLOBALS['%s']->length;
		if($this->_needsBitmapSizeUpdate === true) {
			if($this->hasOwnGraphicsContext === true) {
				$this->graphicsContext->initBitmapData($windowWidth, $windowHeight);
			}
			$this->_needsBitmapSizeUpdate = false;
			$this->invalidateRendering();
		} else {
			if($windowWidth !== $this->_windowWidth || $windowHeight !== $this->_windowHeight) {
				if($this->hasOwnGraphicsContext === true) {
					$this->graphicsContext->initBitmapData($windowWidth, $windowHeight);
					$this->_needsBitmapSizeUpdate = false;
				}
				$this->invalidateRendering();
			}
		}
		$this->_windowWidth = $windowWidth;
		$this->_windowHeight = $windowHeight;
		if($this->_needsRendering === true) {
			if($this->hasOwnGraphicsContext === true) {
				$this->graphicsContext->clear();
			}
		}
		if($this->rootElementRenderer->isTransparent() === true) {
			$coreStyle = $this->rootElementRenderer->coreStyle;
			$opacity = 0.0;
			$裨 = ($coreStyle->get_opacity());
			switch($裨->index) {
			case 1:
			$value = $裨->params[0];
			{
				$opacity = $value;
			}break;
			case 17:
			$value = $裨->params[0];
			{
				$opacity = $value;
			}break;
			default:{
			}break;
			}
			$this->graphicsContext->beginTransparency($opacity);
		}
		$negativeChildLength = $this->_negativeZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $negativeChildLength) {
				$i = $_g++;
				_hx_array_get($this->_negativeZIndexChildLayerRenderers, $i)->render($windowWidth, $windowHeight);
				unset($i);
			}
		}
		if($this->_needsRendering === true || $this->hasOwnGraphicsContext === false) {
			$this->rootElementRenderer->render($this->graphicsContext);
		}
		$childLength = $this->_zeroAndAutoZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $childLength) {
				$i = $_g++;
				_hx_array_get($this->_zeroAndAutoZIndexChildLayerRenderers, $i)->render($windowWidth, $windowHeight);
				unset($i);
			}
		}
		$positiveChildLength = $this->_positiveZIndexChildLayerRenderers->length;
		{
			$_g = 0;
			while($_g < $positiveChildLength) {
				$i = $_g++;
				_hx_array_get($this->_positiveZIndexChildLayerRenderers, $i)->render($windowWidth, $windowHeight);
				unset($i);
			}
		}
		if($this->rootElementRenderer->isTransparent() === true) {
			$this->graphicsContext->endTransparency();
		}
		$this->rootElementRenderer->renderScrollBars($this->graphicsContext, $windowWidth, $windowHeight);
		if($this->_needsRendering === true || $this->hasOwnGraphicsContext) {
			if($this->rootElementRenderer->isTransformed() === true) {
				cocktail_core_layout_computer_VisualEffectStylesComputer::compute($this->rootElementRenderer->coreStyle);
				$this->graphicsContext->transform($this->getTransformationMatrix($this->graphicsContext));
			}
		}
		$this->_needsRendering = false;
		$GLOBALS['%s']->pop();
	}
	public function isCompositingLayer() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::isCompositingLayer");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasLowerZIndex($siblingLayer) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::hasLowerZIndex");
		$製pos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return true;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasCompositingLayerSibling() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::hasCompositingLayerSibling");
		$製pos = $GLOBALS['%s']->length;
		$parentChildNodes = $this->parentNode->childNodes;
		{
			$_g1 = 0; $_g = $parentChildNodes->length;
			while($_g1 < $_g) {
				$i = $_g1++;
				$child = $parentChildNodes[$i];
				if($child !== $this) {
					if($child->isCompositingLayer() === true) {
						$裨mp = $this->hasLowerZIndex($child);
						$GLOBALS['%s']->pop();
						return $裨mp;
						unset($裨mp);
					}
				}
				unset($i,$child);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function hasCompositingLayerDescendant($rootLayerRenderer) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::hasCompositingLayerDescendant");
		$製pos = $GLOBALS['%s']->length;
		$layerLength = $rootLayerRenderer->childNodes->length;
		{
			$_g = 0;
			while($_g < $layerLength) {
				$i = $_g++;
				$childLayer = $rootLayerRenderer->childNodes[$i];
				if($childLayer->isCompositingLayer() === true) {
					$GLOBALS['%s']->pop();
					return true;
				} else {
					if($childLayer->hasChildNodes() === true) {
						$hasCompositingLayer = $this->hasCompositingLayerDescendant($childLayer);
						if($hasCompositingLayer === true) {
							$GLOBALS['%s']->pop();
							return true;
						}
						unset($hasCompositingLayer);
					}
				}
				unset($i,$childLayer);
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function establishesNewGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::establishesNewGraphicsContext");
		$製pos = $GLOBALS['%s']->length;
		if($this->hasCompositingLayerDescendant($this) === true) {
			$GLOBALS['%s']->pop();
			return true;
		} else {
			if($this->hasCompositingLayerSibling() === true) {
				$GLOBALS['%s']->pop();
				return true;
			}
		}
		{
			$GLOBALS['%s']->pop();
			return false;
		}
		$GLOBALS['%s']->pop();
	}
	public function createGraphicsContext($parentGraphicsContext) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::createGraphicsContext");
		$製pos = $GLOBALS['%s']->length;
		if($this->establishesNewGraphicsContext() === true) {
			if($this->hasOwnGraphicsContext === false) {
				$this->graphicsContext = new cocktail_core_graphics_AbstractGraphicsContext($this, null);
				$this->_needsBitmapSizeUpdate = true;
				$this->hasOwnGraphicsContext = true;
			}
			$parentGraphicsContext->appendChild($this->graphicsContext);
		} else {
			$this->graphicsContext = $parentGraphicsContext;
		}
		$GLOBALS['%s']->pop();
	}
	public function detachGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::detachGraphicsContext");
		$製pos = $GLOBALS['%s']->length;
		if($this->hasOwnGraphicsContext === true) {
			$this->parentNode->graphicsContext->removeChild($this->graphicsContext);
			if($this->establishesNewGraphicsContext() === false) {
				$this->graphicsContext->dispose();
				$this->hasOwnGraphicsContext = false;
				$this->graphicsContext = null;
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function attachGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::attachGraphicsContext");
		$製pos = $GLOBALS['%s']->length;
		if($this->parentNode !== null) {
			$this->createGraphicsContext($this->parentNode->graphicsContext);
		}
		$GLOBALS['%s']->pop();
	}
	public function detach() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::detach");
		$製pos = $GLOBALS['%s']->length;
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $this->childNodes[$i];
				$child->detach();
				unset($i,$child);
			}
		}
		$this->detachGraphicsContext();
		$GLOBALS['%s']->pop();
	}
	public function attach() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::attach");
		$製pos = $GLOBALS['%s']->length;
		$this->attachGraphicsContext();
		$length = $this->childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $this->childNodes[$i];
				$child->attach();
				unset($i,$child);
			}
		}
		$this->_needsGraphicsContextUpdate = false;
		$GLOBALS['%s']->pop();
	}
	public function removeChild($oldChild) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::removeChild");
		$製pos = $GLOBALS['%s']->length;
		if($this->establishesNewStackingContext() === false) {
			$裨mp = $this->parentNode->removeChild($oldChild);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		$removed = false;
		$removed = $this->_zeroAndAutoZIndexChildLayerRenderers->remove($oldChild);
		if($removed === false) {
			$removed = $this->_positiveZIndexChildLayerRenderers->remove($oldChild);
			if($removed === false) {
				$this->_negativeZIndexChildLayerRenderers->remove($oldChild);
			}
		}
		$this->invalidateGraphicsContext();
		parent::removeChild($oldChild);
		{
			$GLOBALS['%s']->pop();
			return $oldChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function appendChild($newChild) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::appendChild");
		$製pos = $GLOBALS['%s']->length;
		if($this->establishesNewStackingContext() === false) {
			$裨mp = $this->parentNode->appendChild($newChild);
			$GLOBALS['%s']->pop();
			return $裨mp;
		}
		parent::appendChild($newChild);
		$裨 = ($newChild->rootElementRenderer->coreStyle->get_zIndex());
		switch($裨->index) {
		case 4:
		$value = $裨->params[0];
		{
			if($value !== cocktail_core_css_CSSKeywordValue::$AUTO) {
				throw new HException("Illegal value for z-index style");
			}
			$this->_zeroAndAutoZIndexChildLayerRenderers->push($newChild);
		}break;
		case 0:
		$value = $裨->params[0];
		{
			if($value === 0) {
				$this->_zeroAndAutoZIndexChildLayerRenderers->push($newChild);
			} else {
				if($value > 0) {
					$this->insertPositiveZIndexChildRenderer($newChild, $value);
				} else {
					if($value < 0) {
						$this->insertNegativeZIndexChildRenderer($newChild, $value);
					}
				}
			}
		}break;
		default:{
			throw new HException("Illegal value for z-index style");
		}break;
		}
		$this->invalidateGraphicsContext();
		{
			$GLOBALS['%s']->pop();
			return $newChild;
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateChildLayerRenderer($rootLayer) {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::invalidateChildLayerRenderer");
		$製pos = $GLOBALS['%s']->length;
		$rootLayer->invalidateRendering();
		$childNodes = $rootLayer->childNodes;
		$length = $childNodes->length;
		{
			$_g = 0;
			while($_g < $length) {
				$i = $_g++;
				$child = $childNodes[$i];
				if($child->hasOwnGraphicsContext === false) {
					$this->invalidateChildLayerRenderer($child);
				}
				unset($i,$child);
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateRendering() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::invalidateRendering");
		$製pos = $GLOBALS['%s']->length;
		$this->_needsRendering = true;
		if($this->hasOwnGraphicsContext === true) {
			$length = $this->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					$child = $this->childNodes[$i];
					if($child->hasOwnGraphicsContext === false) {
						$this->invalidateChildLayerRenderer($child);
					}
					unset($i,$child);
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public function invalidateGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::invalidateGraphicsContext");
		$製pos = $GLOBALS['%s']->length;
		$this->_needsGraphicsContextUpdate = true;
		$htmlDocument = $this->rootElementRenderer->domNode->ownerDocument;
		$htmlDocument->invalidateGraphicsContextTree();
		$GLOBALS['%s']->pop();
	}
	public function updateGraphicsContext() {
		$GLOBALS['%s']->push("cocktail.core.layer.LayerRenderer::updateGraphicsContext");
		$製pos = $GLOBALS['%s']->length;
		if($this->_needsGraphicsContextUpdate === true) {
			if($this->graphicsContext !== null) {
				$this->detach();
			}
			$this->attach();
		} else {
			$length = $this->childNodes->length;
			{
				$_g = 0;
				while($_g < $length) {
					$i = $_g++;
					_hx_array_get($this->childNodes, $i)->updateGraphicsContext();
					unset($i);
				}
			}
		}
		$GLOBALS['%s']->pop();
	}
	public $_scrolledPoint;
	public $_needsBitmapSizeUpdate;
	public $_needsGraphicsContextUpdate;
	public $_needsRendering;
	public $hasOwnGraphicsContext;
	public $_windowHeight;
	public $_windowWidth;
	public $graphicsContext;
	public $_negativeZIndexChildLayerRenderers;
	public $_positiveZIndexChildLayerRenderers;
	public $_zeroAndAutoZIndexChildLayerRenderers;
	public $rootElementRenderer;
	public function __call($m, $a) {
		if(isset($this->$m) && is_callable($this->$m))
			return call_user_func_array($this->$m, $a);
		else if(isset($this->蜿ynamics[$m]) && is_callable($this->蜿ynamics[$m]))
			return call_user_func_array($this->蜿ynamics[$m], $a);
		else if('toString' == $m)
			return $this->__toString();
		else
			throw new HException('Unable to call �'.$m.'�');
	}
	static $__properties__ = array("get_firstChild" => "get_firstChild","get_lastChild" => "get_lastChild","get_nextSibling" => "get_nextSibling","get_previousSibling" => "get_previousSibling","set_onclick" => "set_onClick","set_ondblclick" => "set_onDblClick","set_onmousedown" => "set_onMouseDown","set_onmouseup" => "set_onMouseUp","set_onmouseover" => "set_onMouseOver","set_onmouseout" => "set_onMouseOut","set_onmousemove" => "set_onMouseMove","set_onmousewheel" => "set_onMouseWheel","set_onkeydown" => "set_onKeyDown","set_onkeyup" => "set_onKeyUp","set_onfocus" => "set_onFocus","set_onblur" => "set_onBlur","set_onresize" => "set_onResize","set_onfullscreenchange" => "set_onFullScreenChange","set_onscroll" => "set_onScroll","set_onload" => "set_onLoad","set_onerror" => "set_onError","set_onloadstart" => "set_onLoadStart","set_onprogress" => "set_onProgress","set_onsuspend" => "set_onSuspend","set_onemptied" => "set_onEmptied","set_onstalled" => "set_onStalled","set_onloadedmetadata" => "set_onLoadedMetadata","set_onloadeddata" => "set_onLoadedData","set_oncanplay" => "set_onCanPlay","set_oncanplaythrough" => "set_onCanPlayThrough","set_onplaying" => "set_onPlaying","set_onwaiting" => "set_onWaiting","set_onseeking" => "set_onSeeking","set_onseeked" => "set_onSeeked","set_onended" => "set_onEnded","set_ondurationchange" => "set_onDurationChanged","set_ontimeupdate" => "set_onTimeUpdate","set_onplay" => "set_onPlay","set_onpause" => "set_onPause","set_onvolumechange" => "set_onVolumeChange","set_ontransitionend" => "set_onTransitionEnd");
	function __toString() { return 'cocktail.core.layer.LayerRenderer'; }
}
