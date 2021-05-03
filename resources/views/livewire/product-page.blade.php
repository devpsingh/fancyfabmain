<div>

<div class="container-fluid" style="margin-top:300px;">
	<div class="row">
			<div class="col-md-8 pdp-image-gallery-block" >
				<!-- Gallery  Thumbnail Images-->
				<div class="gallery_pdp_container">
					<div id="gallery_pdp">
						@if($products)
							@foreach($products as $pd)
								@foreach(json_decode($pd->thumbnail_path) as $key=>$image)
								@if($pd->available==1)
								<a href="#"  data-image="{{ asset('/storage/products/'.$image)}}" data-zoom-image="{{ asset('/storage/products/'.$image)}}">
								<img id=""  style="max-width:100px;border:1px solid black;margin:4px;margin-left:10%;" src="{{ asset('/storage/products/'.$image)}}" />
								</a>
								@endif
								@endforeach
							@endforeach
						@endif
					</div>
					<!-- Up and down button for vertical carousel -->
					<a href="#" id="ui-carousel-next" style="display: inline;"></a>
					<a href="#" id="ui-carousel-prev" style="display: inline;"></a>
				</div>

				<!-- Gallery -->

				<!-- gallery Viewer medium image -->
				<div class="gallery-viewer">
					@if($products)
						@foreach($products as $pd)
							@foreach(json_decode($pd->thumbnail_path) as $key=>$image)
							@if($key==0 && $pd->available==1)
							<img id="zoom_10"  src="{{ asset('/storage/products/'.$image)}}" data-zoom-image="{{ asset('/storage/products/'.$image)}}" />
									<p class="hint-pdp-img">Roll over the image to zoom in</p>
							@endif
							@endforeach
						@endforeach
					@endif
				</div>

				<!-- gallery Viewer -->
			</div>
			<div id="enlarge_gallery_pdp">
				<div class="enl_butt">
					<a class="enl_but enl_fclose" title="Close"></a>
					<a class="enl_but enl_fright" title="Next"></a>
					<a class="enl_but enl_fleft" title="Prev"></a>
				</div>
				<div class="mega_enl"></div>
			</div>
			
		<div class="col-md-4">
			right side
		</div>
	</div>
</div>
			


</div>
