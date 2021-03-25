<div id="modal_create_post" onclick="modal_create_post.close()" data-close="yes">

  <div class="container">
    <div class="top" onclick="modal_create_post.close()" data-close="yes">
      X
    </div> 
    <div class="middle">
      <div class="left">
        <img src="https://source.unsplash.com/random?sig=1/50x50">
      </div>
      <div class="right">
        <div class="top" contenteditable>
          What is happening ?
        </div>
        <div class="bottom">
          Everyone can reply       
        </div>        
      </div>
    </div>
    <div class="bottom">
      <button class="primary" onclick="modal_create_post.send()">
        Send out
      </button>
    </div>
  </div>

</div>