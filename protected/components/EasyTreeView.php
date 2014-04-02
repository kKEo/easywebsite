<?php
class EasyTreeView extends CTreeView {
	
	
	public function init() {
		if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$id=$this->htmlOptions['id']=$this->getId();
		if($this->url!==null)
			$this->url=CHtml::normalizeUrl($this->url);
		$cs=Yii::app()->getClientScript();
		$cs->registerCoreScript('treeview');
		$options=$this->getClientOptions();
		$options=$options===array()?'{}' : CJavaScript::encode($options);
		$cs->registerScript('Yii.CTreeView#'.$id,"jQuery(\"#{$id}\").treeview($options);");
		if($this->cssFile===null)
			$cs->registerCssFile($cs->getCoreScriptUrl().'/treeview/jquery.treeview.css');
		else if($this->cssFile!==false)
			$cs->registerCssFile($this->cssFile);

		echo CHtml::tag('ul',$this->htmlOptions,false,false)."\n";
		echo self::saveDataAsHtml($this->data);
	}
	
	public static function saveDataAsHtml($data)
	{
		$html=' ';
		if(is_array($data))
		{
			foreach($data as $node)
			{
				if(!isset($node['text']))
				continue;
				$id=isset($node['id']) ? (' id="'.$node['id'].'"') : '';
				if(isset($node['expanded']))
				$css=$node['expanded'] ? 'open' : 'closed';
				else
				$css='';
				if(isset($node['hasChildren']) && $node['hasChildren'])
				{
					if($css!=='')
					$css.=' ';
					$css.='hasChildren';
				}
				
				if($css!=='')
					$css=' class="'.$css.'"';
					
				// make URL	
				if (isset($node['url'])){
					$link = CHtml::link($node['text'], $node['url']); 
					$html.="<li{$id}{$css}>{$link}";
				} else
					$html.="<li{$id}{$css}>{$node['text']}";
					
				if(!empty($node['children']))
				{
					$html.="\n<ul>\n";
					$html.=self::saveDataAsHtml($node['children']);
					$html.="</ul>\n";
				}
				$html.="</li>\n";
			}
		}
		return $html;
	}
}
?>