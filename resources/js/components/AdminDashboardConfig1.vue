<template>
<div class="row text-info">
	<div class="col-sm" >
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
	<!-- <div class="col-sm">
												<button class="btn btn-primary" v-on:click="refreshDashboard">Refresh</button>
	</div> -->
	
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
				intervalid1:'',



			}
		},
		mounted (){
			this.refreshDashboard()
		},
		methods: {
			refreshDashboard(){
					this.loading=true;
					this.intervalid1 = setInterval(() => {
						var url=$("meta[name='clostro']").attr('content');
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
					},1000)
			},
		},
		
		watch: {
			users: function(newVal, oldVal){
				if(newVal>oldVal){
					this.$toasted.show((newVal-oldVal)+' users has registered.')
				}
			},
			logged_users: function(newVal, oldVal){
				if(newVal>oldVal){
					this.$toasted.show((newVal-oldVal)+ ' user/s has logged in.')
				}
				else if(newVal<oldVal){
					this.$toasted.show((oldVal-newVal)+' user/s has signed out.')
				}
			},
			logged_devices: function(newVal, oldVal){
				if(newVal>oldVal){
					this.$toasted.show((newVal-oldVal)+ ' registered devices/s.')
				}
				else if(newVal<oldVal){
					this.$toasted.show((oldVal-newVal)+' device/s removed.')
				}
			},
			admin: function(newVal, oldVal){
				if(newVal>oldVal){
					this.$toasted.show((newVal-oldVal)+ ' newly assgned admin.')
				}
				else if(newVal<oldVal){
					this.$toasted.show((oldVal-newVal)+' removed admin.')
				}
			},
			students: function(newVal, oldVal){
				if(newVal>oldVal){
					this.$toasted.show((newVal-oldVal)+ ' new student/s registered to the system.')
				}
				else if(newVal<oldVal){
					this.$toasted.show((oldVal-newVal)+' removed student/s from the system.')
				}
			}
		},
		
	}
</script>