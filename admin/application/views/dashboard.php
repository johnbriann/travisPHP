<div class="app-page-title">
	<div class="page-title-wrapper">
		<div class="page-title-heading">
			<div>Welcome to Shop</div>
		</div>
	</div>
</div>
<div class="main-card mb-3 card">

</div>
<?php /**/ ?>

<div class="row">
	<!--<div class="col-md-4">
		<a href="<?= base_url()?>orders/pending" style="text-decoration: none; color: #000;">
		<div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-primary border-primary card">
			<div class="widget-chat-wrapper-outer">
				<div class="widget-chart-content">
					<div class="widget-title opacity-5 text-uppercase">Total Orders</div>
					<div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
						<div class="widget-chart-flex align-items-center">
							<div>
								<span class="opacity-10 text-success pr-2">
									<i class="fa fa-fw" aria-hidden="true" title="Total Orders"></i>
								</span>
								<?= @$total_orders?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>-->
	<div class="col-md-4">
		<a href="<?= base_url()?>orders/pending" style="text-decoration: none; color: #000;">
		<div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-primary border-primary card">
			<div class="widget-chat-wrapper-outer">
				<div class="widget-chart-content">
					<div class="widget-title opacity-5 text-uppercase">Total Income</div>
					<div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
						<div class="widget-chart-flex align-items-center">
							<div>
								<span class="opacity-10 text-success pr-2">
									<i class="fa fa-dollar" aria-hidden="true" title="Total Income"></i>
								</span>
								$<?= @number_format($total_income,2)?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?= base_url()?>products" style="text-decoration: none; color: #000;">
		<div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-danger border-danger card">
			<div class="widget-chat-wrapper-outer">
				<div class="widget-chart-content">
					<div class="widget-title opacity-5 text-uppercase">Total Porducts</div>
					<div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
						<div class="widget-chart-flex align-items-center">
							<div>
								<span class="opacity-10 text-danger pr-2">
									<i class="fa fa-fw" aria-hidden="true" title="Total Porducts"></i>
								</span>
								<?= @$total_products?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?= base_url()?>customers" style="text-decoration: none; color: #000;">
		<div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-success border-success card">
			<div class="widget-chat-wrapper-outer">
				<div class="widget-chart-content">
					<div class="widget-title opacity-5 text-uppercase">Total Customers</div>
					<div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
						<div class="widget-chart-flex align-items-center">
							<div>
								<span class="opacity-10 text-primary pr-2">
									<i class="fa fa-users" aria-hidden="true" title="Total Customer"></i>
								</span>
								<?= @$total_customers?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?= base_url()?>orders/pending" style="text-decoration: none; color: #000;">
		<div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-warning border-warning card">
			<div class="widget-chat-wrapper-outer">
				<div class="widget-chart-content">
					<div class="widget-title opacity-5 text-uppercase">Pending Orders</div>
					<div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
						<div class="widget-chart-flex align-items-center">
							<div>
								<span class="opacity-10 text-info pr-2">
									<i class="fa fa-fw" aria-hidden="true" title="Total Pending Orders"></i>
								</span>
								<?= @$total_pending_orders?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="<?= base_url()?>orders/delivered" style="text-decoration: none; color: #000;">
		<div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-warning border-warning card">
			<div class="widget-chat-wrapper-outer">
				<div class="widget-chart-content">
					<div class="widget-title opacity-5 text-uppercase">Completed Orders</div>
					<div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
						<div class="widget-chart-flex align-items-center">
							<div>
								<span class="opacity-10 text-info pr-2">
									<i class="fa fa-shoppping-cart" aria-hidden="true" title="Total Delivery"></i>
								</span>
								<?= @$total_completed_orders?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>
	
	<div class="col-md-4">
		<a href="<?= base_url()?>orders/delivered" style="text-decoration: none; color: #000;">
		<div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-warning border-warning card">
			<div class="widget-chat-wrapper-outer">
				<div class="widget-chart-content">
					<div class="widget-title opacity-5 text-uppercase">Returned Orders</div>
					<div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
						<div class="widget-chart-flex align-items-center">
							<div>
								<span class="opacity-10 text-info pr-2">
									<i class="fa fa-shoppping-cart" aria-hidden="true" title="Total Delivery"></i>
								</span>
								<?= @$total_returned_orders?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</a>
	</div>
	
</div>