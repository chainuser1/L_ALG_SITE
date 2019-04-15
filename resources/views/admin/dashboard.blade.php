@extends('..layouts/admin')
@section('content')
<div class="row"  id="num_users">
		<div class="col-sm">
			<p class="d-flex justify-content-left">Registered Users</p>
			<div v-if="loading" class="d-flex justify-content-center">
				<p >Loading...</p>
			</div>
			<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
				<h5><b>{users}</b></h5>
			</div>
		</div>
		<div class="col-sm">
			<p class="d-flex justify-content-left">Students</p>
			<div v-if="loading" class="d-flex justify-content-center">
				<p >Loading...</p>
			</div>
			<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
				<h5><b>{students}</b></h5>
			</div>
		</div>
		<div class="col-sm">
			<p class="d-flex justify-content-left">Administrators</p>
			<div v-if="loading" class="d-flex justify-content-center">
				<p >Loading...</p>
			</div>
			<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
				<h5><b>{admin}</b></h5>
			</div>
		</div>
		<div class="col-sm">
			<p class="d-flex justify-content-left">Logged Devices</p>
			<div v-if="loading" class="d-flex justify-content-center">
				<p >Loading...</p>
			</div>
			<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
				<h5><b>{logged_devices}</b></h5>
			</div>
		</div>
		<div class="col-sm">
			<p class="d-flex justify-content-left">Online Users</p>
			<div v-if="loading" class="d-flex justify-content-center">
				<p >Loading...</p>
			</div>
			<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
				<h5><b>{logged_users}</b></h5>
			</div>
		</div>
</div>
<script>
	var vm = new Vue({
		el:'#num_users',
		data: {
			users:0,
			students:0,
			admin:0,
			logged_devices:1,
			logged_users:1,
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
						this.students = res.data.num_students
						this.admin = res.data.num_admin
						this.logged_devices=res.data.logged_devices
						this.logged_users=res.data.logged_users
					}).catch(error => {
						loading=false;
						console.dir(error)
					})
					if(this.users>=1000){
						this.users=1000+'+';
					}
				}
		},
		computed: {
			//
		}
	})
	setInterval(function(){
		vm.getUserCount();
	},2500);

</script>
</div>
@endsection