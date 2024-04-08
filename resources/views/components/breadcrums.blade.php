 <nav>
     <ul class="flex space-x-1 py-2 font-semibold">
         <li>
             <a href="http:/" target="_self" >Home</a>
         </li>
         @foreach ($links as $label => $link)
             <li>/</li>
             <li>
                 <a href="{{ $link }}" target="_self" rel="noopener noreferrer"> {{$label}} </a>
             </li>
         @endforeach
     </ul>
 </nav>
