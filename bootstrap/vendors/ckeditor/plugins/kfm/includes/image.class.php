<?php
$imageInstances=array();
class kfmImage extends kfmFile{
	var $caption='';
	var $width;
	var $height;
	var $thumb_url;
	var $thumb_id;
	var $thumb_path;
	var $info=array(); # info from getimagesize
	function kfmImage($file){
		if(is_object($file) && $file->isImage())parent::kfmFile($file->id);
		else if(is_numeric($file))parent::kfmFile($file);
		else return false;
		if(!$this->exists()){
			$this->delete();
			return false;
		}
		$this->image_id=$this->getImageId();
		if($this->getSize()){
			$this->info=getimagesize($this->path);
			$this->type=str_replace('image/','',$this->info['mime']);
			$this->width=$this->info[0];
			$this->height=$this->info[1];
		}
		else{
			$this->type='null';
			$this->width=0;
			$this->height=0;
		}
	}
	function createResizedCopy($to,$width,$height){
		$load='imagecreatefrom'.$this->type;
		$save='image'.$this->type;
		if(!function_exists($load)||!function_exists($save))return $this->error('server cannot handle image of type "'.$this->type.'"');
		$im=$load($this->path);
		$imresized=imagecreatetruecolor($width,$height);
		imagealphablending($imresized,false);
		imagecopyresampled($imresized,$im,0,0,0,0,$width,$height,$this->width,$this->height);
		imagesavealpha($imresized,true);
		$save($imresized,$to,($this->type=='jpeg'?100:9));
		imagedestroy($imresized);
		imagedestroy($im);
	}
	function createThumb($width=64,$height=64,$id=0){
		global $kfm_use_imagemagick;
		if(!is_dir(WORKPATH.'thumbs'))mkdir(WORKPATH.'thumbs');
		$ratio=min($width/$this->width,$height/$this->height);
		$thumb_width=$this->width*$ratio;
		$thumb_height=$this->height*$ratio;
		if(!$id){
			$this->db->exec("INSERT INTO ".KFM_DB_PREFIX."files_images_thumbs (image_id,width,height) VALUES(".$this->id.",".$thumb_width.",".$thumb_height.")");
			$id=$this->db->lastInsertId(KFM_DB_PREFIX.'files_images_thumbs','id');
		}
		$file=WORKPATH.'thumbs/'.$id;
		if(!$kfm_use_imagemagick || $this->useImageMagick($this->path,'resize '.$thumb_width.'x'.$thumb_height,$file))$this->createResizedCopy($file,$thumb_width,$thumb_height);
		return $id;
	}
	function delete(){
		if(!$GLOBALS['kfm_allow_file_delete'])return $this->error(kfm_lang('permissionDeniedDeleteFile'));
		if(!parent::delete())return false;
		$this->deleteThumbs();
		$this->db->exec('DELETE FROM '.KFM_DB_PREFIX.'files_images WHERE file_id='.$this->id);
		return !$this->hasErrors();
	}
	function deleteThumbs(){
		$rs=db_fetch_all("SELECT id FROM ".KFM_DB_PREFIX."files_images_thumbs WHERE image_id=".$this->id);
		foreach($rs as $r){
			$icons=glob(WORKPATH.'thumbs/'.$r['id'].'*');
			foreach($icons as $f)unlink($f);
		}
		$this->db->exec("DELETE FROM ".KFM_DB_PREFIX."files_images_thumbs WHERE image_id=".$this->id);
	}
	function getImageId(){
		$row=db_fetch_row("SELECT id,caption FROM ".KFM_DB_PREFIX."files_images WHERE file_id='".$this->id."'");
		if(!$row){ # db record not found. create it
			# TODO: retrieve caption generation code from get.php
			$sql="INSERT INTO ".KFM_DB_PREFIX."files_images (file_id, caption) VALUES ('".$this->id."','".$this->name."')";
			$this->caption=$this->name;
			$this->db->exec($sql);
			return $this->db->lastInsertId(KFM_DB_PREFIX.'files_images','id');
		}
		$this->caption=$row['caption'];
		return $row['id'];
	}
	function getInstance($id=0){
		if(!$id)return false;
		global $imageInstances;
		if(is_object($id)){
			if($id->isImage())$id=$id->id;
			else return false;
		}
		if(!isset($imageInstances[$id]))$imageInstances[$id]=new kfmImage($id);
		return $imageInstances[$id];
	}
	function resize($new_width, $new_height=-1){
		global $kfm_use_imagemagick,$kfm_allow_image_manipulation;
		if(!$kfm_allow_image_manipulation)$this->error(kfm_lang('permissionDeniedManipImage'));
		if(!$this->isWritable())$this->error(kfm_lang('imageNotWritable'));
		if($this->hasErrors())return false;
		$this->deleteThumbs();
		if($new_height==-1)$new_height=$this->height*$new_width/$this->width;
		if($kfm_use_imagemagick && !$this->useImageMagick($this->path,'resize '.$new_width.'x'.$new_height,$this->path))return;
		$this->createResizedCopy($this->path,$new_width,$new_height);
	}
	function rotate($direction){
		global $kfm_use_imagemagick,$kfm_allow_image_manipulation;
		if(!$kfm_allow_image_manipulation)$this->error(kfm_lang('permissionDeniedManipImage'));
		if(!$this->isWritable())$this->error(kfm_lang('imageNotWritable'));
		if($this->hasErrors())return false;
		$this->deleteThumbs();
		if($kfm_use_imagemagick && !$this->useImageMagick($this->path,'rotate -'.$direction,$this->path))return;
		{ # else use GD
			$load='imagecreatefrom'.$this->type;
			$save='image'.$this->type;
			$im=$load($this->path);
			$im=imagerotate($im,$direction,0);
			$save($im,$this->path,($this->type=='jpeg'?100:9));
			imagedestroy($im);
		}
	}
	function crop($x1, $y1, $width, $height, $newname=false){
		global $kfm_use_imagemagick,$kfm_allow_image_manipulation;
		if(!$kfm_allow_image_manipulation)return $this->error(kfm_lang('permissionDeniedManipImage'));
		
		if(!$newname){
			$this->deleteThumbs();
			if(!$this->isWritable())return $this->error(kfm_lang('imageNotWritable'));
		}
		if($kfm_use_imagemagick && $newname && !$this->useImageMagick($this->path,'crop '.$width.'x'.$height.'+'.$x1.'+'.$y1, dirname($this->path).'/'.$newname))return;
		else if($kfm_use_imagemagick && !$this->useImageMagick($this->path,'crop '.$width.'x'.$height.'+'.$x1.'+'.$y1, $this->path))return;
		{ # else use GD
			$load='imagecreatefrom'.$this->type;
			$save='image'.$this->type;
			$im=$load($this->path);
			$cropped = imagecreatetruecolor($width, $height);
			imagecopyresized($cropped, $im, 0, 0, $x1, $y1, $width, $height, $width, $height);
			imagedestroy($im);
			if($newname){
				$save($cropped, dirname($this->path).'/'.$newname, ($this->type=='jpeg'?100:9));
			}else{
				$save($cropped,$this->path,($this->type=='jpeg'?100:9));
			}
			imagedestroy($cropped);
		}
	}
	function setCaption($caption){
		$this->db->exec("UPDATE ".KFM_DB_PREFIX."files_images SET caption='".sql_escape($caption)."' WHERE file_id=".$this->id);
		$this->caption=$caption;
	}
	function setThumbnail($width=64,$height=64){
		$thumbname=$this->id.' '.$width.'x'.$height.' '.$this->name;
		if(!isset($this->info['mime'])||!in_array($this->info['mime'],array('image/jpeg','image/gif','image/png')))return false;
		$r=db_fetch_row("SELECT id FROM ".KFM_DB_PREFIX."files_images_thumbs WHERE image_id=".$this->id." and width<=".$width." and height<=".$height." and (width=".$width." or height=".$height.")");
		if($r){
			$id=$r['id'];
			if(!file_exists(WORKPATH.'thumbs/'.$id))$this->createThumb($width,$height,$id); // missing thumb file - recreate it
		}
		else{
			$id=$this->createThumb($width,$height);
		}
		$this->thumb_url='get.php?type=thumb&id='.$id.GET_PARAMS;
		$this->thumb_id=$id;
		$this->thumb_path=str_replace('//','/',WORKPATH.'thumbs/'.$id);
		if(!file_exists($this->thumb_path)){
			copy(WORKPATH.'thumbs/'.$id.'.'.preg_replace('/.*\//','',$this->info['mime']),$this->thumb_path);
			unlink(WORKPATH.'thumbs/'.$id.'.'.preg_replace('/.*\//','',$this->info['mime']));
		}
		if(!file_exists($this->thumb_path))$this->createThumb();
	}
	function useImageMagick($from,$action,$to){
		if(!file_exists(IMAGEMAGICK_PATH))return true;
		$retval=true;
		$arr=array();
		exec(IMAGEMAGICK_PATH.' "'.$from.'" -'.$action.' "'.$to.'"',$arr,$retval);
		return $retval;
	}
}
?>
