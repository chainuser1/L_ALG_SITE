@extends('..layouts/admin')
@section('content')
<div class="row">
		<div class="col-md-3" id="num_users" style="border-style:ridge; border-radius:50%;">
			<div v-if="loading">
				<p class="orange-text">Loading...</p>
			</div>
			<div v-else>
				<h1  class="orange-text" >{users}</h1>
			</div>
			<p class="orange-text">No. of Users</p>
			{getUserCount()}
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
				}
		},
	})


</script>
</div>
@endsection