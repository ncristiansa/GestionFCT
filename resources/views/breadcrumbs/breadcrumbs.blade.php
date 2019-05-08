<nav style="justify-content: center;text-align: center;margin:0 auto;padding:10px;">
   <li style="list-style-type: none; background-color:#00334e;text-decoration: none;">
       <i class="fa fa-home"></i>
       <a href="#" onclick="location.href = '{{ url('/')}}'">HOME</a>
   </li>

   @for($i = 2; $i <= count(Request::segments()); $i++)
      <li style="list-style-type: none;text-decoration: none; background-color:white;">
         <a style="color:black;" href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
            {{strtoupper(Request::segment($i))}}
         </a>
      </li>
   @endfor
</nav>