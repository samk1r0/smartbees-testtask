<script>
    export default {
      props: ['name','placeholder','type','required'],
      data(){
        return{
          passwordIcon : 'eye-off-outline'
        }
      },
      methods: {
        showPassword(){
          if(this.$refs.password.type!='text'){
            this.$refs.password.type = 'text';
            this.passwordIcon='eye-outline'
          }
          else{
            this.$refs.password.type='password';
            this.passwordIcon='eye-off-outline'
          }
        },
        inputEntered(){
          if(this.type=='password'){
            this.$emit("emit-result", [this.$refs.password.value,this.$refs.password.name])
          }
          else if(this.name=='additional_address'|| this.name=='code'){
            this.$emit("emit-result", this.$refs.password.value)
          }
          ;
        }
      }
    };
</script>

<template>
  <div class="inline">
    <input @change="inputEntered" ref="password" v-bind:name="name" v-bind:placeholder="placeholder" class="mt-6 w-full p-1 rounded border-grey border-solid border" v-bind:type="type" required>
    <ion-icon 
      ref="password-eye"
      @click="showPassword"
      v-if="type=='password'" 
      class="float-right relative -top-[1.6rem] right-4" :name="passwordIcon"></ion-icon>
  </div>
</template>