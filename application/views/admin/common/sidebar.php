<?php
$setting = $this->db->query("SELECT * FROM tbl_global_setting")->row();
?>
<div class="brand-logo">
	<a href="<?php echo base_url(); ?>dashboard/dashboard">
		<?php 
			if(isset($setting->image)){
		?>
		<img src="<?php echo base_url(); ?><?php echo $setting->image;?>" class=" logo-icon" alt="logo icon">
		<?php } ?>
		<h5 class="logo-text"><?php echo $setting->company_name;?></h5>
	</a>
</div>
<ul class="sidebar-menu do-nicescrol">
	<li>
		<a href="<?php echo base_url(); ?>dashboard/dashboard" class="waves-effect">
			<i class="icon-home"></i><span>Dashboard</span>
		</a>
	</li>
	<?php
	 $role_id = $this->session->userdata('role_id');
    if ($role_id == 1) {
        ?>
	<li><a href="<?php echo base_url(); ?>booking/booking/getbookingList" class="waves-effect"><i class="icon-list"></i>Booking List</a></li>
	<li><a href="<?php echo base_url(); ?>pickup/pickup/getpickupList" class="waves-effect"><i class="icon-list"></i>Pickup List</a></li>
	<li><a href="<?php echo base_url(); ?>report/report" class="waves-effect"><i class="icon-list"></i><span>Report</span></a></li>
	<li>
		<a href="javaScript:void();" class="waves-effect">
			<i class="icon-briefcase"></i><span>User</span> <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="sidebar-submenu">
			<li><a href="<?php echo base_url(); ?>user/user"><i class="icon-list"></i>User Role</a></li>
			<li><a href="<?php echo base_url(); ?>user/user/getUserList"><i class="icon-list"></i>User List</a>
		</ul>
	</li>
	<li>
		<a href="javaScript:void();" class="waves-effect">
			<i class="icon-briefcase"></i><span>Message</span> <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="sidebar-submenu">
			<li><a href="<?php echo base_url(); ?>subscribe"><i class="icon-list"></i>Subscribers List</a>
			<li><a href="<?php echo base_url(); ?>message/seen_message" class="waves-effect"><i class="icon-list"></i>Contact
					Message</span></a></li>
		</ul>
	</li>
	<li>
		<a href="javaScript:void();" class="waves-effect">
			<i class="icon-map"></i><span>My Expense</span> <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="sidebar-submenu">
			<li><a href="<?php echo base_url(); ?>expense/expense/getExpense"><i class="fa fa-circle-o"></i>Expense</a>
			</li>
			<li><a href="<?php echo base_url(); ?>expense/category/getCategoryList"><i class="fa fa-circle-o"></i>Expense Category</a></li>
			<li style="display: none;"><a href="<?php echo base_url(); ?>expense/category/getSubCategoryList"><i class="fa fa-circle-o"></i> Expense Sub Category</a></li>
		   <li><a href="<?php echo base_url(); ?>customer_payment/customerpayment/getpaymentlist" class="waves-effect"><i class="icon-list"></i>Customer Payment</a></li>
		   <li><a href="<?php echo base_url(); ?>customer_due/Customerdue/getcustomerdue" class="waves-effect"><i class="icon-list"></i>Customer Due</a></li>
		
		</ul>
	</li>
	<li>
		<a href="javaScript:void();" class="waves-effect">
			<i class="icon-briefcase"></i><span>System Management </span> <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="sidebar-submenu">
			<li><a href="<?php echo base_url(); ?>category/category/getCategoryList"><i class="fa fa-circle-o"></i>Category</a></li>
			<li><a href="<?php echo base_url(); ?>category/category/getSubCategoryList"><i class="fa fa-circle-o"></i>Sub Category</a></li>
			<li><a href="<?php echo base_url(); ?>category/category/getSubInSubCategoryList"><i class="fa fa-circle-o"></i>Sub In Sub Category</a></li>
			<li><a href="<?php echo base_url(); ?>category/category/ratelist"><i class="fa fa-circle-o"></i>Rate</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="javaScript:void();" class="waves-effect">
			<i class="icon-map"></i><span>Employee </span> <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="sidebar-submenu">
			<li><a href="<?php echo base_url(); ?>employee/employee/getemployeelist"><i class="fa fa-circle-o"></i>Employee List</a>
			</li>
			<li><a href="<?php echo base_url(); ?>employee/employee/getdepatmentlist"><i class="fa fa-circle-o"></i>Department</a></li>
			<li><a href="<?php echo base_url(); ?>employee/employee/getdesignationlist"><i class="fa fa-circle-o"></i>Designation</a></li>
		</ul>
	</li>
	<li>
		<a href="javaScript:void();" class="waves-effect">
			<i class="icon-briefcase"></i><span>Fronted Setting</span> <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="sidebar-submenu">
			<li><a href="<?php echo base_url(); ?>menu_setting/menu"><i class="fa fa-circle-o"></i>Menu</a></li>
			<li><a href="<?php echo base_url(); ?>post/post/post_list"><i class="fa fa-circle-o"></i>Post</a></li>
			<li><a href="<?php echo base_url(); ?>slider/slider"><i class="fa fa-circle-o"></i>Slider</a></li>
		</ul>
	</li>
	<li><a href="<?php echo base_url(); ?>setting/mysetting"><i class="icon-list"></i>Global Setting</a></li>
	<?php } ?>
</ul>