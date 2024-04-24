<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  df-messenger-button-titlebar-color: #e8eff4;
  intent="WELCOME"
  chat-title="COINTESA"
  agent-id="3210bba5-1786-4647-8368-ab0dfb8a5f3e"
  chat-icon="assets/img/COINTESA1.png"
  language-code="es">
</df-messenger>

<div class="container-boton">
  <a href="https://wa.me/9212129413?text=Quiero%20realizar%20un%20proyecto%20web%20php" target="_blank">
    <img class="boton" data-src="assets/img/whatsapp.png" src="assets/img/whatsapp.png" >
  </a>
</div>


<style>
  df-messenger {
   --df-messenger-bot-message: #0051b3;
   --df-messenger-button-titlebar-color: #efeded;
   --df-messenger-chat-background-color: #efeded;
   --df-messenger-font-color: rgb(255, 255, 255);
   --df-messenger-send-icon: #878fac;
   --df-messenger-user-message: #0051b3;
   }
   .container-boton {
    position: fixed;
    bottom: 20px;
    left: 30px; /* Cambia 'right' por 'left' para posicionarlo a la izquierda */
    width: 40px;
    height: 40px;
    background-color: #0df053;
    border-radius: 50%;
    overflow: hidden; /* Añade esta propiedad para asegurarte de que el logotipo de WhatsApp no se salga del contenedor */
    box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.3);
  }

  .boton {
      width: 100%;
      height: auto;
      max-width: 100%;
      max-height: 100%;
      transition: ease 1s;
  }
</style>