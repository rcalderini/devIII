<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Image_lib extends CI_Image_lib {

	public function __construct($props = array()) {
		$this->CI =& get_instance();
	}

	/**
	 * Faz upload de uma imagem
	 * @param string $field Nome do campo
	 * @param int $width Largura que a imagem deverá ter. Se 0 largura infinita.
	 * @param int $height Altura que a imagem deverá ter. Se 0 altura infinita.
	 * @param string $diretorio Diretório que será salva a imagem
	 * @param array $params
	 * aceitaMenor - true | false
	 * @return mixed
	 * Array em caso de erro<br />
	 * String em caso de sucesso
	 */
	function upload_foto($field,$width,$height,$diretorio,$params = array()) {
		$dir = "./uploads/$diretorio";


		$config['upload_path']    = $dir;
		$config['allowed_types']  = 'gif|jpg|png';
		$config['encrypt_name']   = TRUE;
		$config['max_size']       = '20000';
		$config['max_width']      = '10024';
		$config['max_height']     = '7068';

		$this->CI->load->library('upload');
		$this->CI->upload->initialize($config);

		$field_name = $field;

		if ($this->CI->upload->do_upload($field_name)) {
			$dados = $this->CI->upload->data();
			$size = getimagesize($dados['full_path']);

			if (isset($params['thumb'])) {
				$config_img['image_library']  = 'GD2';
				$config_img['source_image']   = $dados['full_path'];
				$config_img['maintain_ratio'] = TRUE;
				$config_img['encrypt_name']  =  TRUE;
				$config_img['max_size']      = '20000';
				$config_img['max_width']     = '10024';
				$config_img['max_height']    = '7068';
				$config_img['orig_width']    = $size[0];
				$config_img['orig_height']   = $size[1];
				$config_img['width']         = $params['thumb']['width'];
				$config_img['height']        = $params['thumb']['height'];
				$config_img['new_image']     = $dir."/thumb_".$dados['file_name'];

				$this->CI->image_lib->initialize($config_img);
				$this->CI->image_lib->resize();
			}

			if (isset($params['aceitaMenor'])) {
				if ($params['aceitaMenor'] == true && (($size[0] <= $width) && ($size[1] <= $height))) {
					return $dados['file_name'];
				}
			}

			if ($width != 0 && $height != 0) {
				if (isset($config_img))
					unset($config_img);
				$config_img['image_library']  = 'GD2';
				$config_img['source_image']   = $dados['full_path'];
				$config_img['create_thumb']   = TRUE;
				$config_img['maintain_ratio'] = TRUE;
				$config_img['encrypt_name']  =  TRUE;
				$config_img['max_size']      = '20000';
				$config_img['max_width']     = '10024';
				$config_img['max_height']    = '7068';
				$config_img['orig_width']    = $size[0];
				$config_img['orig_height']   = $size[1];
				$config_img['width']         = $width;
				$config_img['height']        = $height;
				$config_img['new_image']     = false;

				$this->CI->image_lib->initialize($config_img);
				$this->CI->image_lib->resize();
			}

			// Returns the photo name
			return $dados['file_name'];
		}
		else {
			$error = array('error' => $this->CI->upload->display_errors());
			return $error;
		}
	}

	function upload_array_imagens($array_definicoes, &$data, $old_registro = null) {
		foreach($array_definicoes as $key => $value) {
			$img_nome = $this->upload_foto($key, $value['width'], $value['height'], $value['dir'], $value['params']);

			if(!is_array($img_nome)) {
				if ($old_registro) {
					if ($old_registro->$key) {
						if (file_exists('uploads/'.$value['dir'].'/' . $old_registro->$key))
							unlink('uploads/'.$value['dir'].'/' . $old_registro->$key);
						if (file_exists('uploads/'.$value['dir'].'/thumb_' . $old_registro->$key))
							unlink('uploads/'.$value['dir'].'/thumb_' . $old_registro->$key);
					}
				}

				$data[$key] = $img_nome;
			}
		}
	}

	function deleta_imagens($array_definicoes, $old_registro) {
		foreach ($array_definicoes as $key => $value) {
			if ($old_registro->$key) {
				if (file_exists('uploads/'.$value['dir'].'/' . $old_registro->$key))
					unlink('uploads/'.$value['dir'].'/' . $old_registro->$key);
				if (file_exists('uploads/'.$value['dir'].'/thumb_' . $old_registro->$key))
					unlink('uploads/'.$value['dir'].'/thumb_' . $old_registro->$key);
			}
		}
	}

}