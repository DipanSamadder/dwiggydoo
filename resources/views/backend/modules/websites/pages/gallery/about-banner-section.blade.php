@if(dsld_page_meta_value_by_meta_key('setting_page_slider_image', $page->id) !='') 
	@if(dsld_page_meta_value_by_meta_key('setting_page_banner_slider', $page->id) == 'banner') 

		<section class="abtBanner" style="background: url({{ dsld_uploaded_asset($page->banner) }}) 0 0 no-repeat;">
			<div class="container">
				<div class="abtBnrCnt">
					<div class="abtBnrRow">
						<div class="abtBnrBox">
							<div class="abtBnrBoxCnt pos-rel">
								<div class="abtBnrBoxImg"><img src="{{ dsld_static_asset('frontend/assets/images/newImg/leaf.png') }}" class="img-fluid"> </div>
								<span>Ranked</span>
								<h1 class="mb-0" style="margin-left: 12px;">93<sup>rd</sup> </h1>
							</div>
							<p class="mb-0 mt-4">in Management</p>
						</div>
						<div class="abtBnrBox">
							<div class="abtBnrBoxCnt pos-rel">
								<div class="abtBnrBoxImg"><img src="{{ dsld_static_asset('frontend/assets/images/newImg/leaf.png') }}" class="img-fluid"> </div>
								<span>Ranked</span>
								<h1 class="mb-0" style="margin-left: 12px;">59<sup>th</sup> </h1>
							</div>
							<p class="mb-0 mt-4">in Pharmacy</p>
						</div>
						<div class="abtBnrBox">
							<div class="abtBnrBoxCnt pos-rel">
								<div class="abtBnrBoxImg"><img src="{{ dsld_static_asset('frontend/assets/images/newImg/leaf.png') }}" class="img-fluid"> </div>
								<span>Ranked</span>
								<h1 class="mb-0" style="margin-left: 12px;">147<sup>th</sup> </h1>
							</div>
							<p class="mb-0 mt-4">in Engineering</p>
						</div>
					</div>
					@if(dsld_page_meta_value_by_meta_key('setting_page_name_hide', $page->id) != 'yes') 
						<h2 class="mb-0 m-auto" style="width: 80%">
							{{ $page->title }}
							@auth()
								<a href="{{ route('pages.edit', [$page->id]) }}"><i class="fas fa-edit"></i> </a>
							@endauth
							</h2>
					@endif
				</div>
			</div>
		</section>

	@else
	
		<style type="text/css">
			.smtTab {margin-top: 83px;}
		</style>

	@endif
@else
	<style type="text/css">
		.smtTab {margin-top: 83px;}
	</style>
@endif
