<template>
	<div tabindex="-1" role="dialog" :class="openmodal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">{{ name }}'s Details</h5>
	        <button type="button" class="close" @click="close" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>
	        	
	        	<div class="form-group">
				    <label for="Name">Name</label>
				    <input type="text" class="form-control" id="Name" placeholder="Name" v-model='user.name'>
				    <span class="alert-danger" v-if='errors.name'>{{ errors.name[0] }}</span>
				</div>

	        	<div class="form-group">
				    <label for="exampleInputPassword1">Phone</label>
				    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone" v-model='user.phone'>
				    <span class="alert-danger" v-if='errors.phone'>{{ errors.phone[0] }}</span>
				</div>
	        	
	        	<div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model='user.email'>
				    <span class="alert-danger" v-if='errors.email'>{{ errors.email[0] }}</span>
				</div>
				
				
		  </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" @click="close">Close</button>
	        <button type="button" class="btn btn-primary" @click='Edit'>Edit</button>
	      </div>
	    </div>
	  </div>
	</div>
</template>

<script>
	export default{
		props:['openmodal'],
		data(){
			return{
				user:{},
				errors:'',
				name:'',
			}
		},
		methods:{

			close(){
				this.$emit('closeRequest');
			},
			Edit(){
				axios.put('/new-phonebook/public/phonebook/' + this.user.id , this.user)
				.then( (response)=>{
					this.close();
					this.$parent.users.splice( this.$parent.users.indexOf(this.user) , 1 );
					this.$parent.users.push(this.user);
					this.$parent.users.sort(function(a,b){
						return a.name > b.name ? 1 : -1;
					});
				})
				.catch( (error)=>{
					this.errors = error.response.data.errors;
				});
			}	
		}
	};
</script>