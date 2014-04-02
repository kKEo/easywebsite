<?php
class UploadForm extends CFormModel{

	public $file;
	public $target;
	
	public function rules(){
		return array(
		 	array('file', 'required'),
		 	
//		 	array('image', 'file',
//                'types'=>'jpg, gif, png',
//                'maxSize'=>1024 * 1024 * 50, // 50MB
//                'tooLarge'=>'The file was larger than 50MB. Please upload a smaller file.',
//            ),
		 	
		 ); 
	}
	
}