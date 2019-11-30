<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('common/header');?>
		<?php $this->load->view('common/header_scripts');?>
	</head>
	<body>
		<?php $pageData['settings'] = get_settings();?>
		<?php $pageData['all_categories'] = get_categories();?>
		<!--Lower Header Section -->
		<?php $this->load->view('common/top_bar',$pageData);?>
		<!-- Upper Header Section -->
		<?php $this->load->view('common/top_nav',$pageData);?>
		
		<!--Navigation Bar Section -->
		<?php $this->load->view('common/navigation',$pageData);?>
		<!-- Body Section -->
		<?php $this->load->view($page_content);?>
		<!--Footer-->
		<?php $this->load->view('common/footer',$pageData);?>

		<?php $this->load->view('common/footer_scripts',$pageData);?>
	</body>
</html>