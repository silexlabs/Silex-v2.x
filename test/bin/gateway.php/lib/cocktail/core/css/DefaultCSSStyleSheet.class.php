<?php

class cocktail_core_css_DefaultCSSStyleSheet extends cocktail_core_css_CSSStyleSheet {
	public function __construct() { if(!php_Boot::$skip_constructor) {
		$GLOBALS['%s']->push("cocktail.core.css.DefaultCSSStyleSheet::new");
		$�spos = $GLOBALS['%s']->length;
		parent::__construct($this->getDefaultStyleSheet(),cocktail_core_css_PropertyOriginValue::$USER_AGENT,null,null,null,null);
		$GLOBALS['%s']->pop();
	}}
	public function getDefaultStyleSheet() {
		$GLOBALS['%s']->push("cocktail.core.css.DefaultCSSStyleSheet::getDefaultStyleSheet");
		$�spos = $GLOBALS['%s']->length;
		{
			$GLOBALS['%s']->pop();
			return "\x0A\x09\x09\x09\x09html, address,\x0A\x09\x09\x09\x09blockquote,\x0A\x09\x09\x09\x09body, dd, div,\x0A\x09\x09\x09\x09dl, dt, fieldset, form,\x0A\x09\x09\x09\x09frame, frameset,\x0A\x09\x09\x09\x09h1, h2, h3, h4,\x0A\x09\x09\x09\x09h5, h6, noframes,\x0A\x09\x09\x09\x09ol, p, ul, center,\x0A\x09\x09\x09\x09dir, hr, menu, pre   { display: block; unicode-bidi: embed }\x0A\x09\x09\x09\x09li              { display: block }\x0A\x09\x09\x09\x09head            { display: none }\x0A\x09\x09\x09\x09table           { display: table }\x0A\x09\x09\x09\x09tr              { display: table-row }\x0A\x09\x09\x09\x09thead           { display: table-header-group }\x0A\x09\x09\x09\x09tbody           { display: table-row-group }\x0A\x09\x09\x09\x09tfoot           { display: table-footer-group }\x0A\x09\x09\x09\x09col             { display: table-column }\x0A\x09\x09\x09\x09colgroup        { display: table-column-group }\x0A\x09\x09\x09\x09td, th          { display: table-cell }\x0A\x09\x09\x09\x09caption         { display: table-caption }\x0A\x09\x09\x09\x09th              { font-weight: bolder; text-align: center }\x0A\x09\x09\x09\x09caption         { text-align: center }\x0A\x09\x09\x09\x09body            { margin: 8px }\x0A\x09\x09\x09\x09h1              { font-size: 2em; margin: .67em 0 }\x0A\x09\x09\x09\x09h2              { font-size: 1.5em; margin: .75em 0 }\x0A\x09\x09\x09\x09h3              { font-size: 1.17em; margin: .83em 0 }\x0A\x09\x09\x09\x09h4, p,\x0A\x09\x09\x09\x09blockquote, ul,\x0A\x09\x09\x09\x09fieldset, form,\x0A\x09\x09\x09\x09ol, dl, dir,\x0A\x09\x09\x09\x09menu            { margin: 1.12em 0 }\x0A\x09\x09\x09\x09h5              { font-size: .83em; margin: 1.5em 0 }\x0A\x09\x09\x09\x09h6              { font-size: .75em; margin: 1.67em 0 }\x0A\x09\x09\x09\x09h1, h2, h3, h4,\x0A\x09\x09\x09\x09h5, h6, b,\x0A\x09\x09\x09\x09strong          { font-weight: bolder }\x0A\x09\x09\x09\x09blockquote      { margin-left: 40px; margin-right: 40px }\x0A\x09\x09\x09\x09i, cite, em,\x0A\x09\x09\x09\x09var, address    { font-style: italic }\x0A\x09\x09\x09\x09pre, tt, code,\x0A\x09\x09\x09\x09kbd, samp       { font-family: monospace }\x0A\x09\x09\x09\x09pre             { white-space: pre }\x0A\x09\x09\x09\x09button, textarea,\x0A\x09\x09\x09\x09input, select   { display: inline-block }\x0A\x09\x09\x09\x09big             { font-size: 1.17em }\x0A\x09\x09\x09\x09small, sub, sup { font-size: .83em }\x0A\x09\x09\x09\x09sub             { vertical-align: sub }\x0A\x09\x09\x09\x09sup             { vertical-align: super }\x0A\x09\x09\x09\x09table           { border-spacing: 2px; }\x0A\x09\x09\x09\x09thead, tbody,\x0A\x09\x09\x09\x09tfoot           { vertical-align: middle }\x0A\x09\x09\x09\x09td, th, tr      { vertical-align: inherit }\x0A\x09\x09\x09\x09s, strike, del  { text-decoration: line-through }\x0A\x09\x09\x09\x09hr              { border: 1px inset }\x0A\x09\x09\x09\x09ol, ul, dir,\x0A\x09\x09\x09\x09menu, dd        { margin-left: 40px }\x0A\x09\x09\x09\x09ol              { list-style-type: decimal }\x0A\x09\x09\x09\x09ol ul, ul ol,\x0A\x09\x09\x09\x09ul ul, ol ol    { margin-top: 0; margin-bottom: 0 }\x0A\x09\x09\x09\x09u, ins          { text-decoration: underline }\x0A\x09\x09\x09\x09\x0A\x09\x09\x09\x09center          { text-align: center }\x0A\x09\x09\x09\x09:link, :visited { text-decoration: underline; cursor:pointer; }\x0A\x09\x09\x09\x09:focus          { outline: thin dotted invert }\x0A\x09\x09";
		}
		$GLOBALS['%s']->pop();
	}
	function __toString() { return 'cocktail.core.css.DefaultCSSStyleSheet'; }
}
