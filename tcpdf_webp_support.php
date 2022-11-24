// Open tcpdf.php

// Find

if (($type == 'gif') OR ($type == 'png')) {
  $info = TCPDF_IMAGES::_toPNG($img, TCPDF_STATIC::getObjFilename('img', $this->file_id));
//....

// Replace with

if (($type == 'gif') OR ($type == 'png') or ($type == 'webp')) {
  $info = TCPDF_IMAGES::_toPNG($img, TCPDF_STATIC::getObjFilename('img', $this->file_id));
  if($type == 'webp'/* && $info == 'pngalpha'*/) {
      $webp = new Imagick($file);
      $webp->setFormat('png32');
      $tmpfile = TCPDF_STATIC::getObjFilename('img', $this->file_id);
      $webp->writeImageFile($tmpfile);
      $webppng = $this->ImagePngAlpha($file, $x, $y, $pixw, $pixh, $w, $h, 'PNG', $link, $align, $resize, $dpi, $palign, $filehash);
      unlink($tmpfile);
      return $webppng;
  }
}
