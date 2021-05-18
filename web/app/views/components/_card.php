<section>
	<h2>Sản phẩm nổi bật</h2>
	<div class="row">
		<div class="col-rp sm-6 md-4 lg-3 xl-2">
			<a class="card" href="/product">
				<div class="ratio-1-1">
					<img class="ratio-elm" src="/assets/img/iphone.jpg" alt="" />
					<div class="discount">
						<svg height="30" width="40">
							<polygon points="0,0 40,0 40,20 20,30 0,20" style="fill:#fdd600C0;stroke:#000000;stroke-width:0" />
						</svg>
						<span class="abs-center">-15%</span>
					</div>
				</div>
				<span class="title">This is image from my website</span>
				<div class="price middle space">
					<span>12.000đ</span>
					<img src="/assets/img/payment-icons/free-delivery.svg" alt="" />
				</div>
				<div class="star middle space">
					<div class="flex">
						<i class="g-icons round">&#xf0ec;</i>
						<i class="g-icons round">&#xf0ec;</i>
						<i class="g-icons round">&#xf0ec;</i>
						<i class="g-icons round">&#xe839;</i>
						<i class="g-icons round">&#xf06f;</i>
					</div>
					<span>Đã bán 130</span>
				</div>
				<span class="seller">Shopee</span>
			</a>
		</div>
		<div class="col-rp sm-6 md-4 lg-3 xl-2">
			<a class="card" href="">
				<div class="ratio-1-1">
					<img class="ratio-elm" src="/assets/img/paris.jpg" alt="" />
				</div>
				<span class="title">This is image from my website</span>
				<div class="price middle space">
					<span>12.000đ</span>
					<img src="/assets/img/payment-icons/free-delivery.svg" alt="" />
				</div>
				<div class="star middle space">
					<div class="flex">
						<i class="g-icons round">&#xf0ec;</i>
						<i class="g-icons round">&#xf0ec;</i>
						<i class="g-icons round">&#xf0ec;</i>
						<i class="g-icons round">&#xf0ec;</i>
						<i class="g-icons round">&#xf0ec;</i>
					</div>
					<span>Đã bán 130</span>
				</div>
				<span class="seller">Shopee</span>
			</a>
		</div>
		<?php foreach ($data['items'] as $item) { ?>
			<div class="col-rp sm-6 md-4 lg-3 xl-2">
				<a class="card" href="">
					<div class="ratio-1-1">
						<img class="ratio-elm fakeimg" src="" alt="" />
					</div>
					<span class="title">This is image from fds fds fdsfds website</span>
					<div class="price middle space">
						<span>12.000đ</span>
						<img src="/assets/img/payment-icons/free-delivery.svg" alt="" /></div>
					<div class="star middle space">
						<div class="flex">
							<i class="g-icons round">&#xf0ec;</i>
							<i class="g-icons round">&#xf0ec;</i>
							<i class="g-icons round">&#xe839;</i>
							<i class="g-icons round">&#xf06f;</i>
							<i class="g-icons round">&#xf06f;</i>
						</div>
						<span>Đã bán 130</span>
					</div>
					<span class="seller">Shopee</span>
				</a>
			</div>
		<?php } ?>
	</div>
</section>