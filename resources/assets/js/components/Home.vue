<template>
	
<div class="container">
    
    	<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 style="margin-top:10px;" class="panel-title">Users <button class="btn btn-primary" @click='showAdd'>Add New</button> </h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="search" class="form-control" id="dev-table-filter" placeholder="Enter Name , Phone , Email" v-model='search' />
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th class="alert-heading">Name</th>
								<th class="alert-info">Update</th>
								<th class="alert-success">Show</th>
								<th class="alert-danger">Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for='user,key in Myusers'> 
								<td>{{ user.name }}</td>
								<td> 
									<i style="cursor:pointer" class="alert-info fa fa-edit" @click='showUpdate(key)'></i> 
								</td>
								<td>
								 	<i style="cursor:pointer" class="alert-success fa fa-eye" @click='showUser(key)'></i>   
								</td>
								<td> <i style="cursor:pointer" class="alert-danger fa fa-trash" @click='del(key,user.id)'></i> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		<Add :openmodal='addActive' @closeRequest='close'></Add>
		<Update :openmodal='updateActive' @closeRequest='close'></Update>
		<Show :openmodal='showActive' @closeRequest='close'></Show>
	</div>

</template>

<script>
	let Add = require('./Add.vue');
	let Update = require('./Update.vue');
	let Show = require('./Show.vue');

	export default{
		data(){
			return{
				addActive:'modal',
				updateActive:'modal',
				showActive:'modal',
				users:[],
				errors:'',
				search:'',
			}
		},
		computed:{
			Myusers(){
				return this.users.filter( (user) => {
						return Object.keys(user).some( (key)=>{
						
							let value = String(user[key]);

							return value.toLowerCase().match(this.search.toLowerCase());	
						});
						 
					});
			}
		},
		created(){
			axios.post('/new-phonebook/public/getData')
			.then( (response)=>{
				this.users = response.data;
			})
			.catch( (error) =>{
				this.errors = error.response.data.errors;
			});
		},

		components:{Add,Update,Show},

		methods:{
			showAdd(){
				this.addActive = 'show';
			},
			showUpdate(key){
				this.updateActive = 'show';
				this.$children[1].user = this.users[key];
				this.$children[1].name = this.users[key].name;
			},
			showUser(key){
				this.showActive = 'show';
				this.$children[2].user = this.users[key];
			},
			close(){
				this.addActive = this.showActive = this.updateActive = 'modal';
			},
			del(key,id){

				if (confirm('Are You Sure ?')) {
					axios.delete('/new-phonebook/public/phonebook/'+id)
					.then( (response)=>{
						this.users.splice( key , 1 );
					}).catch( (error)=>{
						this.errors = error.response.data.errors;
					});
				}
				
			}
		}
	};
</script>