<div class="row">
	<div class="col-xl-12">
		<!-- Sorting -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<?php if ($check_table): ?>
						<table id="slideshow_datatable" class="table mb-0">
							<thead>
								<tr>
									<th>#</th>
									<th>Tên</th>
									<th class="text-right">Chức năng</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					<?php else: ?>
						<p>Không có dữ liệu</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- End Sorting -->
	</div>
</div>
