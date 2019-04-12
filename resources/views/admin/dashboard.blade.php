@extends('..layouts/admin')
@section('content')
<div class="row">
		<div class="col-sm-1 purple-gradient text-white " id="num_users" style="border-style:ridge; border-radius:10%;">
			<p class="d-flex justify-content-center">Total Users</p>
			<div v-if="loading" class="d-flex justify-content-center">
				<p >Loading...</p>
			</div>
			<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
				<h5><b>{users}</b></h5>
			</div>
			
			{getUserCount()}
		</div>
		<div class="col-sm-1 purple-gradient text-white " id="num_students" style="border-style:ridge; border-radius:10%;">
			
		</div>
</div>
<script>
	var vm = new Vue({
		el:'#num_users',
		data: {
			users:0,
			loading:false,
		},
		delimiters: ['{', '}'],
		methods: {
				getUserCount: function(){
					var url='{{ route("num_users") }}'
					loading=true;
					axios.get(url)
					.then(res => {
						loading=false;
						this.users = res.data.num_users;
					}).catch(error => {
						loading=false;
						console.dir(error)
					})
					if(this.users>=1000){
						this.users=1000+'+';
					}
				}
		},
	})


</script>
</div>
@endsection