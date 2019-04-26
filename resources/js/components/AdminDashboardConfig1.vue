<template>
<div class="row text-info">
	<div class="col-sm" >
		{{ refreshComponent() }}
		<p class="d-flex justify-content-left">Registered Users</p>
		<div v-if="loading" class="d-flex justify-content-center">
			<p >Loading...</p>
		</div>
		<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
			<h5 class="orange-text"><b>{{ users }}</b></h5>
		</div>
	</div>
	<div class="col-sm">
		<p class="d-flex justify-content-left">Students</p>
		<div v-if="loading" class="d-flex justify-content-center">
			<p >Loading...</p>
		</div>
		<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
			<h5 class="purple-text"><b>{{ students }}</b></h5>
		</div>
	</div>
	<div class="col-sm">
		<p class="d-flex justify-content-left">Administrators</p>
		<div v-if="loading" class="d-flex justify-content-center">
			<p >Loading...</p>
		</div>
		<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
			<h5 class="red-text"><b>{{ admin }}</b></h5>
		</div>
	</div>
	<div class="col-sm">
		<p class="d-flex justify-content-left">Logged Devices</p>
		<div v-if="loading" class="d-flex justify-content-center">
			<p >Loading...</p>
		</div>
		<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
			<h5 class="blue-text"><b>{{ logged_devices }}</b></h5>
		</div>
	</div>
	<div class="col-sm">
		<p class="d-flex justify-content-left">Online Users</p>
		<div v-if="loading" class="d-flex justify-content-center">
			<p >Loading...</p>
		</div>
		<div v-else class="d-flex justify-content-center" style="padding-top:9px;">
			<h5 class="green-text"><b>{{ logged_users }}</b></h5>
		</div>
	</div>
</div>
</template>
<script>
	export default {
		data (){
			return {
				users:0,
				students:0,
				admin:0,
				logged_devices:0,
				logged_users:0,
				loading:false,
			}
		},
		mounted(){
			console.log("Unable to master")
		},
		methods: {
			refreshComponent(){
				setInterval(function(){
				var url=$("meta[name='clostro']").attr('content');
					this.loading=true;
					axios.get(url)
					.then(res => {
						this.loading=false;
						this.users = res.data.num_users;
						this.students = res.data.num_students
						this.admin = res.data.num_admin
						this.logged_devices=res.data.logged_devices
						this.logged_users=res.data.logged_users

					}).catch(error => {
						this.loading=false;
						console.dir(error)
					})
					if(this.users>=1000){
						this.users=1000+'+';
					}		
				this.$methods.refreshComponent();
				},2500)
			}
		}
	}
</script>