<?php



class ClassUpload
{
    private $name_img;

    public function uploadLogo($img1, $img2, $teste)
    {
        $formatosP = array("png", "jpeg", "jpg", "gif");
        if (in_array($teste, $formatosP)) {
            $ext = strtolower(substr($img1, -4)); //Pegando extensão do arquivo
            $this->name_img = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = '../img/up/'; //Diretório para uploads 
            move_uploaded_file($img2, $dir . $this->name_img); //Fazer upload do arquivo

            return $this->name_img;
        }
        else{
            return false;
        }
    }
}
