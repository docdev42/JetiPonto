<template>
  <div>
    <p class="error">{{ error }}</p>

    <p class="decode-result">Last result: <b>{{ result }}</b></p>
    {{ result }}

    {{ email }}
    
      

    <qrcode-stream @decode="onDecode" @init="onInit" />
  </div>
</template>

<script>
import { QrcodeStream } from 'vue-qrcode-reader'

export default {

  components: { QrcodeStream },
  props:{
    email : String,
    id : String},
   

  data () {
    return {
      result: '',
      error: '',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),                     
    }    
  },
  
  
 

  methods: {
    onDecode (result) {
        this.result = result              
        if(result === this.email ){
          fetch(`/scan/${this.id}`, {
            method: 'post',
            headers: {
              'content-type' : 'application/json',
              'X-CSRF-TOKEN' : this.csrf,
            }
          })
          .then(res => res.json())
          .then(res => {
            console.log(res);
          }).catch (err => console.log(err));          
                               
        }else{
          this.result = 'não deu'
        }     
             
    },  

    async onInit (promise) {
      try {
        await promise
      } catch (error) {
        if (error.name === 'NotAllowedError') {
          this.error = "Você precisa dar acesso a camera."
        } else if (error.name === 'NotFoundError') {
          this.error = "ERROR: no camera on this device"
        } else if (error.name === 'NotSupportedError') {
          this.error = "ERROR: secure context required (HTTPS, localhost)"
        } else if (error.name === 'NotReadableError') {
          this.error = "ERROR: is the camera already in use?"
        } else if (error.name === 'OverconstrainedError') {
          this.error = "ERROR: installed cameras are not suitable"
        } else if (error.name === 'StreamApiNotSupportedError') {
          this.error = "ERROR: Stream API is not supported in this browser"
        }
      }
    }
  }
}
</script>

<style scoped>
.error {
  font-weight: bold;
  color: red;
}
</style>