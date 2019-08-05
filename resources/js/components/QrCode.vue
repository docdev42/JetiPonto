<template>
  <div class="hero is-fullheight is-medium is-primary is-bold">  
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <article class="card is-rounded">
            <div class="card-content">  
                <div class="column has-text-centered">
                  <h1>{{ user }}</h1>
                  <p class="error">{{ error }}</p>
                  
                  <p class="decode-result"><b>{{ worked }}</b></p>
                  <p class="decode-result"><b>{{ notworked }}</b></p>   
                   
                
                  <qrcode-stream @decode="onDecode" @init="onInit" />
                </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { QrcodeStream } from 'vue-qrcode-reader'

export default {

  components: { QrcodeStream },
  props:{
    email : String,
    id : String,
    user : String},
   

  data () {
    return {
      result: '',
      error: '',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      worked: '',
      notworked: '',                     
    }    
  },
  
  
 

  methods: {
    onDecode (result) {
        this.result = result              
        if(result === this.email ){
          this.worked = 'Ponto Registrado com Sucesso.',
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
          this.notworked = 'QrCode não corresponde ao usuário.'
        }     
             
    },  

    async onInit (promise) {
      try {
        await promise
      } catch (error) {
        if (error.name === 'NotAllowedError') {
          this.error = "ERRO: Você precisa dar acesso à camera."
        } else if (error.name === 'NotFoundError') {
          this.error = "ERRO: Dispositivo sem camera."
        } else if (error.name === 'NotSupportedError') {
          this.error = "ERROR: secure context required (HTTPS, localhost)"
        } else if (error.name === 'NotReadableError') {
          this.error = "ERRO: certifique-se de que a camera não está em uso."
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