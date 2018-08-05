<template>
	<div tabindex="-1" role="dialog" :class="openmodal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">{{ user.name }}'s Details</h5>
	        <button type="button" class="close" @click="close" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>
	        	
	        	<div class="form-group">
				    <label for="Name">Name</label>
				    <input type="text" class="form-control" id="Name" placeholder="Name" v-model='user.name' readonly>
				    
				</div>

	        	<div class="form-group">
				    <label for="exampleInputPassword1">Phone</label>
				    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone" v-model='user.phone' readonly>
				    
				</div>
	        	
	        	<div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model='user.email' readonly>
				    
				</div>
				
				
		  </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" @click="close">Close</button>
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
			}
		},
		methods:{

			close(){
				this.$emit('closeRequest');
			},
		}
	};
</script>