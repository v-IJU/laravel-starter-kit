<style>
    #alert__box {
    opacity: 1;
    transition: opacity 0.6s; /* 600ms to fade out */
  }
  </style>
  
  @if(session()->has('error'))
  <div class="alert alert-danger mb-3" id="alert__box" role="alert">
      <b class="font-weight-bold">{{session("error")}}</b>
  </div>
  @endif
  
 