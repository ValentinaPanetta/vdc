@extends('layouts.default')

@section('content')
<div class="m-3 bg-dark-t">
	<div class="">
		<h1 class="pt-4 mb-2 text-lightcyan text-center">Confirm unsubscription</h1>
	</div>
	<div class="px-5 text-white">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo viverra maecenas accumsan lacus. Nulla pharetra diam sit amet nisl suscipit adipiscing bibendum. Non quam lacus suspendisse faucibus. Sed viverra tellus in hac habitasse. At erat pellentesque adipiscing commodo elit. Nunc congue nisi vitae suscipit tellus mauris a. Dapibus ultrices in iaculis nunc sed augue lacus viverra. Magna sit amet purus gravida quis blandit turpis cursus in. At varius vel pharetra vel turpis nunc eget lorem. Ut faucibus pulvinar elementum integer enim neque volutpat ac. Habitant morbi tristique senectus et netus.

            Placerat in egestas erat imperdiet sed euismod nisi porta lorem. Congue eu consequat ac felis. Viverra orci sagittis eu volutpat odio. Viverra tellus in hac habitasse platea. Pretium lectus quam id leo in vitae. Viverra mauris in aliquam sem. Amet purus gravida quis blandit turpis cursus in hac habitasse. Consectetur adipiscing elit ut aliquam purus. Sit amet consectetur adipiscing elit ut. Et ultrices neque ornare aenean euismod elementum nisi quis. Velit euismod in pellentesque massa placerat duis ultricies. Eu nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper. Pellentesque adipiscing commodo elit at imperdiet.

            Sed enim ut sem viverra aliquet eget. Sodales ut etiam sit amet nisl purus in mollis nunc. Dignissim convallis aenean et tortor at risus. Potenti nullam ac tortor vitae. A pellentesque sit amet porttitor eget dolor morbi non arcu. Auctor eu augue ut lectus arcu bibendum at varius vel. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien. Tempor orci dapibus ultrices in iaculis. Semper auctor neque vitae tempus quam pellentesque nec nam aliquam. Cum sociis natoque penatibus et magnis. Id diam maecenas ultricies mi. Aliquam ut porttitor leo a. Leo vel fringilla est ullamcorper eget nulla facilisi etiam. Nunc sed augue lacus viverra vitae congue eu. Id neque aliquam vestibulum morbi. Pellentesque habitant morbi tristique senectus et netus et. Enim ut sem viverra aliquet eget sit amet. Duis convallis convallis tellus id interdum velit. Blandit turpis cursus in hac.
		</p>
	</div>
	<h2 class="text-center text-lightcyan py-3">Are you sure you want to unsubscribe?</h2>
	<div class="pb-5 d-flex justify-content-center">
		<div>
			<a href="{{ url('../consultings/'.$consult) }}">
				<button class="mx-3 btn-custom btn-custom-cyan">Cancel</button>
			</a>
		</div>
		<div>
			<form method="POST" action="{{ route('ClientsToConsulting.delete', $piv_id) }}">
				@csrf
				{{ method_field('DELETE') }} 
				<button type="submit" value="delete" class="mx-3 btn-custom btn-custom-grey" onclick="return confirm('Are you sure?')" >Yes </button>
			</form>
		</div>
	</div>
</div>
@endsection