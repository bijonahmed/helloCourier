<?php 
      $setting = $this->db->query("SELECT * FROM tbl_global_setting")->row();
?>
<img src="<?php echo base_url();?><?php echo $setting->image;?>">